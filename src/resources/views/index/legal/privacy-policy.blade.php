@extends('index.layout')

@section('title', 'Privacy Policy')

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
        {{ $t('legal.privacy_kicker', ['en' => 'Legal', 'zh' => '法律合规', 'fr' => 'Juridique', 'es' => 'Legal', 'ru' => 'Юридическая информация', 'ar' => 'الشؤون القانونية']) }}
      </span>
      <h1 class="font-serif text-4xl text-yideli-dark mb-4">
        {{ $t('legal.privacy_title', ['en' => 'Privacy Policy', 'zh' => '隐私政策', 'fr' => 'Politique de confidentialite', 'es' => 'Politica de privacidad', 'ru' => 'Политика конфиденциальности', 'ar' => 'سياسة الخصوصية']) }}
      </h1>
      <p class="text-sm text-gray-500">
        {{ $t('legal.effective_date', ['en' => 'Effective date: April 9, 2026', 'zh' => '生效日期：2026年4月9日', 'fr' => 'Date d effet : 9 avril 2026', 'es' => 'Fecha de vigencia: 9 de abril de 2026', 'ru' => 'Дата вступления в силу: 9 апреля 2026 г.', 'ar' => 'تاريخ السريان: 9 ابريل 2026']) }}
      </p>
    </div>
  </section>

  <section class="bg-yideli-base py-16">
    <div class="max-w-[980px] mx-auto px-6 lg:px-12 space-y-10 text-sm leading-7 text-gray-700">
      <article class="bg-white border border-yideli-line p-8">
        <h2 class="text-xl font-serif text-yideli-dark mb-4">1. {{ $t('legal.privacy_section_1_title', ['en' => 'Information We Collect', 'zh' => '我们收集的信息', 'fr' => 'Informations collectees', 'es' => 'Informacion que recopilamos', 'ru' => 'Какие данные мы собираем', 'ar' => 'المعلومات التي نجمعها']) }}</h2>
        <p>{{ $t('legal.privacy_section_1_body', ['en' => 'We collect contact details, inquiry content, and technical request context that you submit through inquiry forms, email, and direct business communication.', 'zh' => '我们会收集您通过询盘表单、邮件及商务沟通提交的联系方式、询盘内容和技术需求信息。', 'fr' => 'Nous collectons les coordonnees, le contenu des demandes et les informations techniques soumises via les formulaires, e-mails et echanges commerciaux.', 'es' => 'Recopilamos datos de contacto, contenido de consulta y contexto tecnico enviado por formularios, correo y comunicacion comercial.', 'ru' => 'Мы собираем контактные данные, содержание запросов и технические требования, переданные через формы, email и деловую коммуникацию.', 'ar' => 'نقوم بجمع بيانات الاتصال ومحتوى الاستفسار والسياق الفني المرسل عبر النماذج والبريد والتواصل التجاري.']) }}</p>
      </article>

      <article class="bg-white border border-yideli-line p-8">
        <h2 class="text-xl font-serif text-yideli-dark mb-4">2. {{ $t('legal.privacy_section_2_title', ['en' => 'How We Use Information', 'zh' => '信息使用方式', 'fr' => 'Utilisation des informations', 'es' => 'Como usamos la informacion', 'ru' => 'Как мы используем данные', 'ar' => 'كيف نستخدم المعلومات']) }}</h2>
        <p>{{ $t('legal.privacy_section_2_body', ['en' => 'Information is used to respond to inquiries, provide quotations, execute production and logistics communication, and improve service quality and compliance performance.', 'zh' => '相关信息用于回复询盘、提供报价、执行生产与物流沟通，以及改进服务质量与合规表现。', 'fr' => 'Les informations servent a repondre aux demandes, fournir des devis, gerer la production/logistique et ameliorer la qualite de service.', 'es' => 'La informacion se usa para responder consultas, cotizar, coordinar produccion/logistica y mejorar calidad y cumplimiento.', 'ru' => 'Данные используются для ответов на запросы, подготовки коммерческих предложений, координации производства/логистики и улучшения качества.', 'ar' => 'تُستخدم المعلومات للرد على الاستفسارات وتقديم عروض السعر والتنسيق للانتاج والشحن وتحسين جودة الخدمة والامتثال.']) }}</p>
      </article>

      <article class="bg-white border border-yideli-line p-8">
        <h2 class="text-xl font-serif text-yideli-dark mb-4">3. {{ $t('legal.privacy_section_3_title', ['en' => 'Sharing and Disclosure', 'zh' => '信息共享与披露', 'fr' => 'Partage et divulgation', 'es' => 'Comparticion y divulgacion', 'ru' => 'Передача и раскрытие данных', 'ar' => 'المشاركة والافصاح']) }}</h2>
        <p>{{ $t('legal.privacy_section_3_body', ['en' => 'We do not sell personal information. Data may be shared with logistics providers, compliance agencies, and payment/service partners only when necessary for contract execution or legal obligations.', 'zh' => '我们不会出售个人信息。仅在履约或法律义务需要时，才会与物流、合规机构及支付/服务伙伴共享必要数据。', 'fr' => 'Nous ne vendons pas les donnees personnelles. Les donnees peuvent etre partagees avec la logistique, la conformite ou des partenaires de service uniquement si necessaire.', 'es' => 'No vendemos informacion personal. Solo compartimos datos necesarios con logistica, cumplimiento o socios de servicio para ejecutar contratos u obligaciones legales.', 'ru' => 'Мы не продаем персональные данные. Передача возможна только при необходимости исполнения договора или юридических обязательств.', 'ar' => 'لا نقوم ببيع المعلومات الشخصية. قد تتم مشاركة البيانات الضرورية فقط مع شركاء الخدمات واللوجستيات والامتثال لتنفيذ العقود او الالتزامات القانونية.']) }}</p>
      </article>

      <article class="bg-white border border-yideli-line p-8">
        <h2 class="text-xl font-serif text-yideli-dark mb-4">4. {{ $t('legal.privacy_section_4_title', ['en' => 'Data Security and Retention', 'zh' => '数据安全与留存', 'fr' => 'Securite et conservation des donnees', 'es' => 'Seguridad y retencion de datos', 'ru' => 'Безопасность и хранение данных', 'ar' => 'امن البيانات والاحتفاظ بها']) }}</h2>
        <p>{{ $t('legal.privacy_section_4_body', ['en' => 'Reasonable technical and organizational controls are used to protect data. Records are retained only for necessary business, legal, tax, and compliance periods.', 'zh' => '我们采取合理的技术与管理措施保护数据安全。信息仅在必要的业务、法律、税务及合规周期内留存。', 'fr' => 'Des controles techniques et organisationnels raisonnables sont appliques. Les donnees sont conservees pour les durees necessaires.', 'es' => 'Aplicamos controles tecnicos y organizativos razonables. Los datos se retienen solo por periodos comerciales y legales necesarios.', 'ru' => 'Мы применяем разумные технические и организационные меры защиты. Данные хранятся только в необходимый срок.', 'ar' => 'نطبق ضوابط تقنية وتنظيمية معقولة لحماية البيانات. ويتم الاحتفاظ بالسجلات للفترات اللازمة فقط.']) }}</p>
      </article>

      <article class="bg-white border border-yideli-line p-8">
        <h2 class="text-xl font-serif text-yideli-dark mb-4">5. {{ $t('legal.privacy_section_5_title', ['en' => 'Your Rights and Contact', 'zh' => '您的权利与联系方式', 'fr' => 'Vos droits et contact', 'es' => 'Sus derechos y contacto', 'ru' => 'Ваши права и контакты', 'ar' => 'حقوقك ووسائل التواصل']) }}</h2>
        <p>{{ $t('legal.privacy_section_5_body', ['en' => 'You may request access, correction, or deletion of personal information where legally applicable. Contact us through the Contact Us page for privacy requests.', 'zh' => '在法律适用范围内，您可请求访问、更正或删除个人信息。请通过 Contact Us 页面提交隐私相关请求。', 'fr' => 'Vous pouvez demander l acces, la correction ou la suppression des donnees selon la loi applicable. Contactez-nous via la page Contact.', 'es' => 'Puede solicitar acceso, correccion o eliminacion de datos cuando la ley aplicable lo permita. Use la pagina Contact Us.', 'ru' => 'Вы можете запросить доступ, исправление или удаление данных в рамках применимого законодательства. Обращайтесь через Contact Us.', 'ar' => 'يمكنك طلب الوصول الى بياناتك او تصحيحها او حذفها وفقا للقانون المعمول به. يرجى التواصل عبر صفحة Contact Us.']) }}</p>
      </article>
    </div>
  </section>
@endsection

