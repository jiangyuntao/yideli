<?php

namespace App\Mail;

use App\Settings\GeneralSettings;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
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
        $settings = app(GeneralSettings::class);

        $subject = match ($this->locale) {
            'zh' => '产品目录 - ' . $settings->company_name['zh'],
            'fr' => 'Catalogue de produits - ' . $settings->company_name['fr'],
            'es' => 'Catálogo de productos - ' . $settings->company_name['es'],
            'ru' => 'Каталог продукции - ' . $settings->company_name['ru'],
            'ar' => 'كتالوج المنتجات - ' . $settings->company_name['ar'],
            default => 'Product Catalog - ' . $settings->company_name['en'],
        };

        return new Envelope(
            from: new Address($settings->contact_email, $settings->company_name[$this->locale]),
            subject: $subject,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.product_catalog',
            with: ['locale' => $this->locale, 'settings' => app(GeneralSettings::class)],
        );
    }

    public function attachments(): array
    {
        return [
            Attachment::fromData(fn() => base64_decode($this->pdfContent), $this->fileName)
                ->withMime('application/pdf'),
        ];
    }
}
