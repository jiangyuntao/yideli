@extends('index.layout')

@section('title', 'Terms of Use')

@section('main')
  @php
    $t = function (string $key, array $fallbacks) use ($lang) {
        $translated = __($key);

        if ($translated !== $key) {
            return $translated;
        }

        return $fallbacks[$lang] ?? $fallbacks['en'] ?? reset($fallbacks);
    };
  @endphp

  <section class="bg-yideli-base border-b border-yideli-line py-20">
    <div class="max-w-[980px] mx-auto px-6 lg:px-12">
      <span class="text-xs font-bold tracking-[0.2em] uppercase text-yideli-dark block mb-4">
        {{ $t('legal.terms_kicker', ['en' => 'Legal', 'zh' => '法律合规', 'fr' => 'Juridique', 'es' => 'Legal', 'ru' => 'Юридическая информация', 'ar' => 'الشؤون القانونية']) }}
      </span>
      <h1 class="font-serif text-4xl text-yideli-dark mb-4">
        {{ $t('legal.terms_title', ['en' => 'Terms of Use', 'zh' => '使用条款', 'fr' => "Conditions d'utilisation", 'es' => 'Terminos de uso', 'ru' => 'Условия использования', 'ar' => 'شروط الاستخدام']) }}
      </h1>
      <p class="text-sm text-gray-500">
        {{ $t('legal.effective_date', ['en' => 'Effective date: April 9, 2026', 'zh' => '生效日期：2026年4月9日', 'fr' => 'Date d effet : 9 avril 2026', 'es' => 'Fecha de vigencia: 9 de abril de 2026', 'ru' => 'Дата вступления в силу: 9 апреля 2026 г.', 'ar' => 'تاريخ السريان: 9 ابريل 2026']) }}
      </p>
    </div>
  </section>

  <section class="bg-yideli-base py-16">
    <div class="max-w-[980px] mx-auto px-6 lg:px-12 space-y-10 text-sm leading-7 text-gray-700">
      <article class="bg-white border border-yideli-line p-8">
        <h2 class="text-xl font-serif text-yideli-dark mb-4">1. {{ $t('legal.terms_section_1_title', ['en' => 'Acceptance of Terms', 'zh' => '条款接受', 'fr' => 'Acceptation des conditions', 'es' => 'Aceptacion de terminos', 'ru' => 'Принятие условий', 'ar' => 'قبول الشروط']) }}</h2>
        <p>{{ $t('legal.terms_section_1_body', ['en' => 'By accessing or using this website, you agree to these terms and all applicable laws. If you do not agree, please stop using the website.', 'zh' => '访问或使用本网站即表示您同意本条款及适用法律；如不同意，请停止使用。', 'fr' => 'En utilisant ce site, vous acceptez ces conditions et les lois applicables. Sinon, veuillez cesser son utilisation.', 'es' => 'Al acceder o usar este sitio, acepta estos terminos y leyes aplicables. Si no esta de acuerdo, deje de usarlo.', 'ru' => 'Используя сайт, вы соглашаетесь с этими условиями и применимым законодательством.', 'ar' => 'باستخدام هذا الموقع فإنك توافق على هذه الشروط والقوانين المعمول بها.']) }}</p>
      </article>

      <article class="bg-white border border-yideli-line p-8">
        <h2 class="text-xl font-serif text-yideli-dark mb-4">2. {{ $t('legal.terms_section_2_title', ['en' => 'Business Information and Quotations', 'zh' => '商务信息与报价', 'fr' => 'Informations commerciales et devis', 'es' => 'Informacion comercial y cotizaciones', 'ru' => 'Коммерческая информация и предложения', 'ar' => 'المعلومات التجارية وعروض السعر']) }}</h2>
        <p>{{ $t('legal.terms_section_2_body', ['en' => 'Product data, specifications, and timelines shown on this site are for reference. Final terms are subject to signed contracts, approved samples, and confirmed production plans.', 'zh' => '网站展示的产品信息、规格与周期仅供参考，最终以签署合同、确认样品及排产计划为准。', 'fr' => 'Les informations produits, specifications et delais sont indicatifs. Les conditions finales dependent du contrat et des echantillons approuves.', 'es' => 'Los datos de producto, especificaciones y plazos son referenciales. Los terminos finales dependen del contrato y muestras aprobadas.', 'ru' => 'Данные о продукции, спецификации и сроки носят справочный характер. Финальные условия определяются договором и утвержденными образцами.', 'ar' => 'بيانات المنتجات والمواصفات والجداول الزمنية المعروضة هي للمرجعية فقط، وتعتمد الشروط النهائية على العقد والعينات المعتمدة.']) }}</p>
      </article>

      <article class="bg-white border border-yideli-line p-8">
        <h2 class="text-xl font-serif text-yideli-dark mb-4">3. {{ $t('legal.terms_section_3_title', ['en' => 'Intellectual Property', 'zh' => '知识产权', 'fr' => 'Propriete intellectuelle', 'es' => 'Propiedad intelectual', 'ru' => 'Интеллектуальная собственность', 'ar' => 'الملكية الفكرية']) }}</h2>
        <p>{{ $t('legal.terms_section_3_body', ['en' => 'Website content, visuals, and brand assets are protected. Customer-provided artwork remains customer property, and production use follows authorization scope only.', 'zh' => '网站内容、视觉及品牌资产受保护。客户提供的设计稿归客户所有，仅在授权范围内用于生产。', 'fr' => 'Le contenu du site est protege. Les visuels clients restent leur propriete et sont utilises uniquement selon autorisation.', 'es' => 'El contenido del sitio esta protegido. El arte del cliente sigue siendo propiedad del cliente y se usa solo con autorizacion.', 'ru' => 'Контент и визуальные материалы сайта защищены. Макеты клиента остаются его собственностью и используются только в рамках разрешения.', 'ar' => 'محتوى الموقع والمواد البصرية محمية. وتبقى تصاميم العميل ملكا له وتستخدم فقط ضمن نطاق التفويض.']) }}</p>
      </article>

      <article class="bg-white border border-yideli-line p-8">
        <h2 class="text-xl font-serif text-yideli-dark mb-4">4. {{ $t('legal.terms_section_4_title', ['en' => 'Compliance and Export', 'zh' => '合规与出口', 'fr' => 'Conformite et export', 'es' => 'Cumplimiento y exportacion', 'ru' => 'Соответствие и экспорт', 'ar' => 'الامتثال والتصدير']) }}</h2>
        <p>{{ $t('legal.terms_section_4_body', ['en' => 'Both parties should comply with applicable import/export, product safety, and labeling regulations. Required compliance documents can be prepared based on destination market requirements.', 'zh' => '双方应遵守适用的进出口、产品安全及标签法规。可根据目的国要求准备相应合规文件。', 'fr' => 'Les parties doivent respecter les regles import/export et securite produit. Les documents conformite peuvent etre prepares selon le marche cible.', 'es' => 'Ambas partes deben cumplir normas de importacion/exportacion y seguridad del producto. Se pueden preparar documentos de cumplimiento segun destino.', 'ru' => 'Стороны обязаны соблюдать требования импорта/экспорта, безопасности продукции и маркировки. Документы соответствия готовятся по требованиям рынка назначения.', 'ar' => 'يلتزم الطرفان بلوائح الاستيراد والتصدير وسلامة المنتجات ووضع الملصقات، ويمكن تجهيز مستندات الامتثال حسب متطلبات سوق الوجهة.']) }}</p>
      </article>

      <article class="bg-white border border-yideli-line p-8">
        <h2 class="text-xl font-serif text-yideli-dark mb-4">5. {{ $t('legal.terms_section_5_title', ['en' => 'Liability and Governing Terms', 'zh' => '责任与适用条款', 'fr' => 'Responsabilite et droit applicable', 'es' => 'Responsabilidad y terminos aplicables', 'ru' => 'Ответственность и применимое право', 'ar' => 'المسؤولية والاحكام الحاكمة']) }}</h2>
        <p>{{ $t('legal.terms_section_5_body', ['en' => 'To the maximum extent allowed by law, this site is provided as-is for business reference. Specific liability, warranty, delivery, and dispute terms are governed by signed commercial agreements.', 'zh' => '在法律允许范围内，本网站按现状提供商业参考；具体责任、质保、交付及争议处理以签署的商务合同为准。', 'fr' => 'Dans la limite legale, le site est fourni a titre informatif. Les obligations detaillees sont regies par les contrats commerciaux signes.', 'es' => 'En el maximo permitido por ley, el sitio se ofrece como referencia. La responsabilidad y garantias se rigen por contratos firmados.', 'ru' => 'В пределах, допустимых законом, сайт предоставляется как справочный ресурс. Конкретные обязательства определяются подписанными коммерческими договорами.', 'ar' => 'في حدود ما يسمح به القانون، يُقدَّم هذا الموقع كمرجع تجاري، وتخضع المسؤوليات التفصيلية للعقود التجارية الموقعة.']) }}</p>
      </article>
    </div>
  </section>
@endsection

