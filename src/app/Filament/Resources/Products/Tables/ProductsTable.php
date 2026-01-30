<?php

namespace App\Filament\Resources\Products\Tables;

use App\Mail\ProductCatalogMail;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\MaintenanceMode;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('id', 'desc')
            ->columns([
                TextColumn::make('id')
                    ->label('ID'),
                TextColumn::make('name')
                    ->label('商品名称')
                    ->searchable(),
                TextColumn::make('category.name')
                    ->label('分类')
                    ->searchable(),
                ImageColumn::make('cover_image')
                    ->label('封面图')
                    ->disk('public')
                    ->imageHeight(50),
                ToggleColumn::make('is_visible')
                    ->label('是否可见'),
                TextColumn::make('created_at')
                    ->label('创建时间')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('更新时间')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    BulkAction::make('sendPdf')
                        ->label('生成 PDF 并发送')
                        ->icon('heroicon-o-paper-airplane')
                        ->color('success')
                        ->schema([
                            TextInput::make('email')
                                ->label('客户邮箱')
                                ->email()
                                ->required(),

                            // 修改：包含所有 6 种语言
                            Select::make('locale')
                                ->label('目标语言')
                                ->options([
                                    'en' => 'English (英语)',
                                    'zh' => '简体中文',
                                    'fr' => 'Français (法语)',
                                    'es' => 'Español (西语)',
                                    'ru' => 'Русский (俄语)',
                                    'ar' => 'العربية (阿语)',
                                ])
                                ->default('en')
                                ->required()
                                ->native(false),

                            TextInput::make('subject_name')
                                ->label('PDF 文件名')
                                ->default('Product_Catalog')
                                ->suffix('.pdf'),
                        ])
                        ->action(function (Collection $records, array $data) {
                            $originalLocale = App::getLocale();
                            $targetLocale = $data['locale'];
                            App::setLocale($targetLocale); // 切换语言环境

                            try {
                                $products = $records->load('category');

                                $pdf = Pdf::loadView('pdf.product_catalog', [
                                    'products' => $products,
                                    'locale' => $targetLocale
                                ]);

                                $pdfContent = $pdf->output();

                                Mail::to($data['email'])
                                    ->send(new ProductCatalogMail(
                                        base64_encode($pdfContent),
                                        $data['subject_name'] . '.pdf',
                                        $targetLocale
                                    ));

                                Notification::make()
                                    ->title('邮件发送成功')
                                    ->body("已向 {$data['email']} 发送了 " . strtoupper($targetLocale) . " 版本目录。")
                                    ->success()
                                    ->send();
                            } catch (\Exception $e) {
                                Notification::make()->title('失败')->body($e->getMessage())->danger()->send();
                            } finally {
                                App::setLocale($originalLocale); // 恢复语言
                            }
                        })
                        ->deselectRecordsAfterCompletion(),
                ]),
            ]);
    }
}
