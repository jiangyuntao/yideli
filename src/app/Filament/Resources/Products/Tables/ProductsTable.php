<?php

namespace App\Filament\Resources\Products\Tables;

use App\Mail\ProductCatalogMail;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use TCPDF;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('sort_order')
            ->reorderable('sort_order')
            ->columns([
                TextColumn::make('id')
                    ->label('ID'),
                TextColumn::make('sort_order')
                    ->label('排序')
                    ->sortable(),
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

                                $pdfContent = self::generatePdfContent($targetLocale, $products);

                                Mail::to($data['email'])
                                    ->send(new ProductCatalogMail(
                                        $pdfContent,
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

    /**
     * Summary of generatePdfContent
     * @param mixed $locale
     * @param mixed $products
     * @return string
     */
    protected static function generatePdfContent($locale, $products)
    {
        try {
            // 参数: 页面方向 (P=纵向), 单位 (mm), 纸张 (A4), Unicode (true), 编码 (UTF-8)
            $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

            // 关键：设置中文字体
            // 'stsongstdlight' 是 TCPDF 内置的简体中文字体 (宋体)
            // 如果需要繁体，可以使用 'msungstdlight'
            $pdf->SetFont('stsongstdlight', '', 14);

            // 添加页面
            $pdf->AddPage();

            $html = view('pdf.product_catalog', [
                'products' => $products,
                'locale' => $locale
            ])->render();

            // 使用 writeHTML 方法支持 HTML 标签
            $pdf->writeHTML($html, true, false, true, false, '');

            // 确定保存路径
            // 确保 storage/app/public/pdfs 目录存在
            $path = storage_path('app/public/pdfs/test.pdf');

            // 输出
            // 参数1: 文件名 (在使用 'S' 模式时，这个名字会被忽略，但必须填)
            // 参数2:
            // 'S': 返回文档内容字符串 (String)。
            // 'F': 保存到本地文件 (File)。
            // 'I': 直接在浏览器中显示 (Inline)。
            // 'D': 强制浏览器下载 (Download)。
            // 'E': 返回 base64 编码的邮件附件格式。
            return base64_encode($pdf->Output($path, 'S'));
        } catch (\Exception $e) {
            Log::error('PDF 生成失败: ' . $e->getMessage());
            return false;
        }
    }
}
