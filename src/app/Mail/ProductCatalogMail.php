<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ProductCatalogMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $pdfContent;
    public $fileName;
    public $locale;

    public function __construct($pdfContent, $fileName, $locale = 'en')
    {
        $this->pdfContent = $pdfContent;
        $this->fileName = $fileName;
        $this->locale = $locale;
    }

    public function envelope(): Envelope
    {
        // 6 种语言的邮件标题
        $subject = match ($this->locale) {
            'zh' => '产品目录 - ' . config('app.name'),
            'fr' => 'Catalogue de produits - ' . config('app.name'),
            'es' => 'Catálogo de productos - ' . config('app.name'),
            'ru' => 'Каталог продукции - ' . config('app.name'),
            'ar' => 'كتالوج المنتجات - ' . config('app.name'),
            default => 'Product Catalog - ' . config('app.name'), // en
        };

        return new Envelope(
            subject: $subject,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.product_catalog',
            with: ['locale' => $this->locale],
        );
    }

    public function attachments(): array
    {
        return [
            Attachment::fromData(fn() => $this->pdfContent, $this->fileName)
                ->withMime('application/pdf'),
        ];
    }
}
