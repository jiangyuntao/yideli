@extends('index.layout')

@section('title', 'OEM/ODM Notebook Factory')

@section('main')
  @php
    $t = function (string $key, array $fallbacks) use ($lang) {
        $translated = __($key);

        if ($translated !== $key) {
            return $translated;
        }

        return $fallbacks[$lang] ?? $fallbacks['en'] ?? reset($fallbacks);
    };

    $resolveLocalizedFaqText = function ($value) use ($lang) {
        if (is_array($value)) {
            $preferred = $value[$lang] ?? $value['en'] ?? reset($value);

            return is_string($preferred) ? trim($preferred) : '';
        }

        return is_string($value) ? trim($value) : '';
    };

    $faqItems = collect($settings->faqs ?? [])
        ->map(function ($faq) use ($resolveLocalizedFaqText) {
            $question = $resolveLocalizedFaqText(data_get($faq, 'question'));
            $answer = $resolveLocalizedFaqText(data_get($faq, 'answer'));

            if ($question === '' || $answer === '') {
                return null;
            }

            return [
                'question' => $question,
                'answer' => $answer,
            ];
        })
        ->filter()
        ->values();

    $factoryHighlights = [
        [
            'title' => 'FACTORY CAPABILITY',
            'body' => 'Founded in 1989, YIDELI specializes in high-quality diaries, notebooks, planners, journals, and wire-bound notebooks. We excel in crafting covers using printable PU, solid PU, PVC, and genuine leather.',
        ],
        [
            'title' => 'INTEGRATED MANUFACTURING',
            'body' => 'Our core strength is our modern facility in Taizhou, which features a fully integrated, end-to-end process covering printing, binding, inner-page production, and cover fabrication — ensuring quality control, efficiency, and reliable supply chain management.',
        ],
        [
            'title' => 'PROFESSIONAL R&D',
            'body' => 'We provide a professional R&D team and skilled craftsmen to efficiently develop samples into finished products based on customer requirements.',
        ],
        [
            'title' => 'QUALITY SYSTEM',
            'body' => 'YIDELI is committed to the highest standards of quality and responsibility. Our commitment is validated by global certifications including BSCI, SEDEX, GSV, WCA, SQP, ISO 9001, ISO 14001, and FSC.',
        ],
        [
            'title' => 'GLOBAL TRUST',
            'body' => 'Our products are trusted by partners across the US, Canada, Europe, Russia, South America, the Middle East, South Africa, and beyond, earning a reputation for superior quality and service.',
        ],
    ];

    $certSlideImages = [
        asset('images/index-cert-slides/0.png'),
        asset('images/index-cert-slides/1.png'),
        asset('images/index-cert-slides/2.png'),
        asset('images/index-cert-slides/3.png'),
        asset('images/index-cert-slides/4.png'),
        asset('images/index-cert-slides/5.png'),
        asset('images/index-cert-slides/6.png'),
        asset('images/index-cert-slides/7.png'),
    ];

    $productCategorySlices = [
        asset('images/index-product-categories-1.jpg'),
        asset('images/index-product-categories-2.jpg'),
        asset('images/index-product-categories-3.jpg'),
        asset('images/index-product-categories-4.jpg'),
    ];

    $productCategoryLinkOrder = [0, 2, 1, 3];

    $heroSlide = collect($settings->home_carousel ?? [])->first();
    $heroImagePath = data_get($heroSlide, 'image');
    $heroImage = asset('images/working-1.webp');

    if (is_string($heroImagePath) && $heroImagePath !== '') {
        $heroImage = str_starts_with($heroImagePath, 'http://') || str_starts_with($heroImagePath, 'https://') || str_starts_with($heroImagePath, '/')
            ? $heroImagePath
            : asset('storage/' . ltrim($heroImagePath, '/'));
    }

    $heroLink = trim((string) data_get($heroSlide, 'custom_url', ''));
    $heroHasLink = $heroLink !== '' && !in_array($heroLink, ['#', 'javascript:;'], true);
    $heroTarget = (int) data_get($heroSlide, 'in_new_windows', 0) === 1 ? '_blank' : '_self';
    $heroTitle = trim((string) data_get($heroSlide, 'title', 'Factory Slide')) ?: 'Factory Slide';
  @endphp

  <section class="relative w-full mx-auto overflow-hidden shadow-2xl">
    <div class="relative h-full w-full overflow-hidden">
      <img class="h-[980px] w-full object-cover sm:h-[900px] md:h-auto md:aspect-[21/9]"
           src="{{ $heroImage }}"
           alt="{{ $heroTitle }}">

      @if ($heroHasLink)
        <a class="absolute inset-0 z-10"
           href="{{ $heroLink }}"
           target="{{ $heroTarget }}"
           aria-label="{{ $heroTitle }}">
        </a>
      @endif
    </div>

    <div class="absolute inset-0 z-20 flex items-start pt-6 sm:pt-8 md:pt-10 lg:items-center lg:pt-0">
      <div class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto w-full px-4 sm:px-6 lg:px-12">
        <div class="grid items-center gap-6 lg:grid-cols-10 lg:gap-8 xl:gap-10">
          <div class="lg:col-span-6">
            <div class="max-w-3xl bg-yideli-text/62 p-6 text-white shadow-2xl backdrop-blur-[2px] sm:p-8 lg:p-10">
              <img class="mb-5 h-14 w-auto object-contain sm:h-16"
                   src="{{ asset('images/logo-light-bg.png') }}"
                   alt="Yideli logo">

              <p class="text-sm font-semibold uppercase tracking-[0.08em] text-white/90 sm:text-base">
                {{ $t('home_b2b.hero_intro_line_1', ['en' => "If You're Looking For", 'zh' => '如果您正在寻找', 'fr' => 'Si vous recherchez', 'es' => 'Si esta buscando', 'ru' => 'Если вы ищете', 'ar' => 'إذا كنت تبحث عن']) }}
              </p>

              <h1 class="mt-3 text-3xl font-black leading-tight text-white drop-shadow-[0_4px_18px_rgba(0,0,0,0.4)] sm:text-4xl lg:text-5xl">
                {{ $t('home_b2b.hero_intro_line_2', ['en' => 'A Reliable Manufacturer of', 'zh' => '一家可靠的制造商，专注于', 'fr' => 'Un fabricant fiable de', 'es' => 'Un fabricante confiable de', 'ru' => 'Надежного производителя', 'ar' => 'شركة تصنيع موثوقة لـ']) }}
                <span class="mt-2 block">
                  {{ $t('home_b2b.hero_intro_line_3', ['en' => 'Custom Diaries, Notebooks & Planners', 'zh' => '定制日记本、笔记本与计划本', 'fr' => 'Journaux, carnets et planners personnalises', 'es' => 'Diarios, cuadernos y planners personalizados', 'ru' => 'Ежедневников, блокнотов и планеров на заказ', 'ar' => 'اليوميات والدفاتر والمخططات المخصصة']) }}
                </span>
              </h1>

              <p class="mt-4 text-xl font-semibold text-white sm:text-2xl">
                {{ $t('home_b2b.hero_intro_line_4', ['en' => "Then You've Come To The Right Place.", 'zh' => '那么，您来对地方了。', 'fr' => 'Vous etes au bon endroit.', 'es' => 'Entonces ha llegado al lugar correcto.', 'ru' => 'Тогда вы пришли по адресу.', 'ar' => 'فأنت في المكان الصحيح.']) }}
              </p>

              <p class="mt-6 text-sm leading-relaxed text-white/90 sm:text-base">
                {{ $t('home_b2b.hero_intro_trust', ['en' => '35+ Years of OEM Experience | BSCI & FSC Certified | 7-Day Fast Sample', 'zh' => '35年以上 OEM 经验 | BSCI 与 FSC 认证 | 7天快速打样', 'fr' => '35+ ans d experience OEM | Certifie BSCI et FSC | Echantillon rapide en 7 jours', 'es' => '35+ anos de experiencia OEM | Certificacion BSCI y FSC | Muestra rapida en 7 dias', 'ru' => '35+ лет OEM опыта | Сертификация BSCI и FSC | Быстрый образец за 7 дней', 'ar' => 'أكثر من 35 عاما من خبرة OEM | معتمد من BSCI وFSC | عينة سريعة خلال 7 أيام']) }}
              </p>
            </div>
          </div>

          <div class="lg:col-span-4">
            @include('index.inquire.hero-form', [
                'heroInquiryId' => 'hero-inquiry',
                'heroInquiryReturnTo' => route('index', ['lang' => $lang]) . '#hero-inquiry',
            ])
          </div>
        </div>
      </div>
    </div>

  </section>

  <section class="overflow-hidden"
           style="background-image: url('{{ asset('images/index-product-categories-5.jpg') }}'); background-repeat: repeat-x; background-size: auto 100%; background-position: center top;">
    <div class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto">
      <div class="grid grid-cols-2 gap-0 py-2 sm:grid-cols-4">
        @foreach ($categories->take(count($productCategorySlices)) as $index => $category)
          @php
            $linkedCategory = $categories[$productCategoryLinkOrder[$index] ?? $index] ?? $category;
          @endphp
          <a class="flex h-16 items-center justify-center overflow-hidden sm:h-20 md:h-24 lg:h-28"
             href="{{ route('product.index', ['lang' => $lang, 'slug' => $linkedCategory->slug]) }}"
             aria-label="{{ $linkedCategory->name }}">
            <img class="block h-full w-auto max-w-full object-contain"
                 src="{{ $productCategorySlices[$index] }}"
                 alt="{{ $linkedCategory->name }}">
          </a>
        @endforeach
      </div>
    </div>
  </section>

  <section id="factory-capability"
           class="bg-yideli-base px-4 py-16 sm:px-6 lg:px-12 lg:py-32">
    <div
         class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto grid lg:grid-cols-12 gap-12 lg:gap-24">
      <div class="lg:col-span-5 flex flex-col justify-center">
        <div class="space-y-8">
          @foreach ($factoryHighlights as $highlight)
            <div>
              <h2 class="text-yideli-dark text-sm font-bold tracking-[0.18em] uppercase mb-3">
                {{ $highlight['title'] }}
              </h2>
              <p class="text-gray-800 text-base leading-relaxed">
                {{ $highlight['body'] }}
              </p>
            </div>
          @endforeach
        </div>
      </div>

      <div class="lg:col-span-7 flex flex-col gap-6">
        <video class="w-full h-auto object-contain rounded-lg shadow-lg"
               autoplay
               controls
               preload="metadata"
               muted
               playsinline>
          <source src="{{ asset('videos/output_720p_crf26.mp4') }}"
                  type="video/mp4">
          Your browser does not support HTML5 video playback. Please upgrade your browser.
        </video>

        <div class="grid grid-cols-2 gap-3 sm:grid-cols-4">
          <img class="w-full aspect-[9/16] object-cover rounded-sm"
               src="{{ asset('images/about-us/Your-Strategic-Partner-3.jpg') }}"
               alt="Factory line 1">
          <img class="w-full aspect-[9/16] object-cover rounded-sm"
               src="{{ asset('images/about-us/Your-Strategic-Partner-4.jpg') }}"
               alt="Factory line 2">
          <img class="w-full aspect-[9/16] object-cover rounded-sm"
               src="{{ asset('images/about-us/Your-Strategic-Partner-5.jpg') }}"
               alt="Factory line 3">
          <img class="w-full aspect-[9/16] object-cover rounded-sm"
               src="{{ asset('images/about-us/Your-Strategic-Partner-6.jpg') }}"
               alt="Factory line 4">
        </div>

        <div>
          <a class="inline-flex items-center px-8 py-4 border border-yideli-dark text-yideli-dark hover:bg-yideli-dark hover:text-white transition duration-300 uppercase text-sm tracking-wide"
             href="{{ route('page.show', ['lang' => $lang, 'slug' => 'about-us']) }}">
            {{ $t('home_b2b.factory_cta', ['en' => 'View Full Factory Capability', 'zh' => '查看完整工厂实力', 'fr' => 'Voir toutes les capacites de l usine', 'es' => 'Ver capacidad completa de fabrica', 'ru' => 'Смотреть полные возможности фабрики', 'ar' => 'عرض قدرات المصنع بالكامل']) }}
            <span class="ms-2">→</span>
          </a>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-yideli-dark px-4 sm:px-6 lg:px-12">
    <div
         class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-0">
      <article class="bg-yideli-dark p-6 text-left text-white">
        <p class="text-4xl font-bold text-white">35+</p>
        <h3 class="mt-2 text-sm uppercase tracking-[0.18em] text-white">
          {{ $t('home_b2b.metric_card_1_title', ['en' => 'Years in the Industry', 'zh' => '行业经验', 'fr' => 'Annees dans l industrie', 'es' => 'Anos en la industria', 'ru' => 'Лет в отрасли', 'ar' => 'سنوات في القطاع']) }}
        </h3>
        <p class="mt-3 text-sm text-white leading-relaxed">
          {{ $t('home_b2b.metric_card_1_desc', ['en' => 'Since 1989', 'zh' => '自 1989 年起', 'fr' => 'Depuis 1989', 'es' => 'Desde 1989', 'ru' => 'С 1989 года', 'ar' => 'منذ عام 1989']) }}
        </p>
      </article>

      <article class="bg-yideli-base p-6 text-left">
        <p class="text-4xl font-bold text-yideli-dark">35000+ m²</p>
        <h3 class="mt-2 text-sm uppercase tracking-[0.18em] text-yideli-dark">
          {{ $t('home_b2b.metric_card_2_title', ['en' => 'Modern Production Base', 'zh' => '现代化生产基地', 'fr' => 'Base de production moderne', 'es' => 'Base de produccion moderna', 'ru' => 'Современная производственная база', 'ar' => 'قاعدة انتاج حديثة']) }}
        </h3>
        <p class="mt-3 text-sm text-yideli-dark leading-relaxed">
          {{ $t('home_b2b.metric_card_2_desc', ['en' => 'In Taizhou, China', 'zh' => '位于中国台州', 'fr' => 'A Taizhou, Chine', 'es' => 'En Taizhou, China', 'ru' => 'В Тайчжоу, Китай', 'ar' => 'في تايتشو، الصين']) }}
        </p>
      </article>

      <article class="bg-yideli-dark p-6 text-left text-white">
        <p class="text-4xl font-bold text-white">20+</p>
        <h3 class="mt-2 text-sm uppercase tracking-[0.18em] text-white">
          {{ $t('home_b2b.metric_card_3_title', ['en' => 'Professional Designers', 'zh' => '专业设计师', 'fr' => 'Designers professionnels', 'es' => 'Disenadores profesionales', 'ru' => 'Профессиональные дизайнеры', 'ar' => 'مصممون محترفون']) }}
        </h3>
        <p class="mt-3 text-sm text-white leading-relaxed">
          {{ $t('home_b2b.metric_card_3_desc', ['en' => 'In Hangzhou R&D Center', 'zh' => '位于杭州研发中心', 'fr' => 'Au centre R&D de Hangzhou', 'es' => 'En el centro de I+D de Hangzhou', 'ru' => 'В R&D центре Ханчжоу', 'ar' => 'في مركز البحث والتطوير في هانغتشو']) }}
        </p>
      </article>

      <article class="bg-yideli-base p-6 text-left">
        <p class="text-4xl font-bold text-yideli-dark">30+</p>
        <h3 class="mt-2 text-sm uppercase tracking-[0.18em] text-yideli-dark">
          {{ $t('home_b2b.metric_card_4_title', ['en' => 'Export Countries', 'zh' => '出口国家', 'fr' => 'Pays d exportation', 'es' => 'Paises de exportacion', 'ru' => 'Стран экспорта', 'ar' => 'دول التصدير']) }}
        </h3>
        <p class="mt-3 text-sm text-yideli-dark leading-relaxed">
          {{ $t('home_b2b.metric_card_4_desc', ['en' => 'Global Distribution Network', 'zh' => '全球分销网络', 'fr' => 'Reseau mondial de distribution', 'es' => 'Red global de distribucion', 'ru' => 'Глобальная сеть дистрибуции', 'ar' => 'شبكة توزيع عالمية']) }}
        </p>
      </article>

      <article class="bg-yideli-dark p-6 text-left text-white">
        <p class="text-4xl font-bold text-white">300+</p>
        <h3 class="mt-2 text-sm uppercase tracking-[0.18em] text-white">
          {{ $t('home_b2b.metric_card_5_title', ['en' => 'Dedicated Professionals', 'zh' => '专业团队成员', 'fr' => 'Professionnels dedies', 'es' => 'Profesionales dedicados', 'ru' => 'Профильные специалисты', 'ar' => 'متخصصون متفرغون']) }}
        </h3>
        <p class="mt-3 text-sm text-white leading-relaxed">
          {{ $t('home_b2b.metric_card_5_desc', ['en' => 'In Our Team', 'zh' => '团队规模', 'fr' => 'Dans notre equipe', 'es' => 'En nuestro equipo', 'ru' => 'В нашей команде', 'ar' => 'ضمن فريقنا']) }}
        </p>
      </article>
    </div>
  </section>

  <section class="bg-yideli-base px-4 py-16 sm:px-6 lg:px-12">
    <div class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto">
      <div class="text-center mb-10">
        <h3 class="text-xl uppercase tracking-[0.08em] text-yideli-dark md:text-2xl lg:text-[1.7rem] lg:whitespace-nowrap">
          <span class="font-black">INTERNATIONAL CERTIFICATIONS</span>
          <span class="font-semibold"> FOR GLOBAL TRADE</span>
        </h3>
      </div>

      <div class="relative overflow-hidden py-4">
        <div class="cert-marquee-track flex w-max hover:[animation-play-state:paused]">
          @foreach ([0, 1] as $duplicate)
            <div class="flex shrink-0 gap-0 pe-0 overflow-visible">
              @foreach ($certSlideImages as $index => $image)
                <article class="flex h-44 w-28 shrink-0 items-center justify-center overflow-visible sm:h-56 sm:w-36 lg:h-60 lg:w-40">
                  <img class="h-full w-auto max-w-none object-contain"
                       src="{{ $image }}"
                       alt="Certification {{ $index + 1 }}">
                </article>
              @endforeach
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>

  <section class="bg-yideli-base py-20">
    <div class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto px-4 sm:px-6 lg:px-12">
      <div class="text-center mb-12">
        <h3 class="mb-2 text-xl uppercase tracking-[0.08em] text-yideli-dark md:text-2xl lg:text-[1.7rem] lg:whitespace-nowrap">
          <span class="font-black">FROM MATERIAL SELECTION TO</span>
          <span class="font-semibold"> MASS PRODUCTION DELIVERY</span>
        </h3>
      </div>

      <div class="grid gap-6 md:grid-cols-3 md:gap-8">
        <div class="border border-yideli-line bg-white p-6 sm:p-8">
          <h4 class="text-xl font-serif text-yideli-dark mb-3">{{ $t('home_b2b.capability_1_title', ['en' => 'Flexible Specs', 'zh' => '规格灵活定制', 'fr' => 'Specifications flexibles', 'es' => 'Especificaciones flexibles', 'ru' => 'Гибкие спецификации', 'ar' => 'مواصفات مرنة']) }}</h4>
          <p class="text-gray-600 text-sm leading-relaxed">
            {{ $t('home_b2b.capability_1_desc', ['en' => 'Cover material, inner paper, binding, size, printing, and packaging can be customized for your market.', 'zh' => '封面材质、内页纸张、装订方式、尺寸、印刷与包装均可按市场需求定制。', 'fr' => 'Materiau de couverture, papier interieur, reliure, taille, impression et emballage personnalisables.', 'es' => 'Material de cubierta, papel interior, encuadernacion, tamano, impresion y empaque personalizables.', 'ru' => 'Материал обложки, бумага, переплет, размер, печать и упаковка настраиваются под ваш рынок.', 'ar' => 'يمكن تخصيص مادة الغلاف والورق الداخلي والتجليد والمقاس والطباعة والتغليف حسب سوقك.']) }}
          </p>
        </div>

        <div class="border border-yideli-line bg-white p-6 sm:p-8">
          <h4 class="text-xl font-serif text-yideli-dark mb-3">{{ $t('home_b2b.capability_2_title', ['en' => 'Engineering team', 'zh' => '工程团队', 'fr' => 'Equipe d ingenierie', 'es' => 'Equipo de ingenieria', 'ru' => 'Инженерная команда', 'ar' => 'فريق الهندسة']) }}</h4>
          <p class="text-gray-600 text-sm leading-relaxed">
            {{ $t('home_b2b.capability_2_desc', ['en' => 'Engineering team supports artwork review and structural proofing with professional sample development service.', 'zh' => '工程团队支持稿件审核与结构打样，并提供专业样品开发服务。', 'fr' => 'L equipe d ingenierie prend en charge la verification des maquettes, l epreuve structurelle et un service professionnel de developpement d echantillons.', 'es' => 'El equipo de ingenieria respalda la revision de artes, la prueba estructural y un servicio profesional de desarrollo de muestras.', 'ru' => 'Инженерная команда поддерживает проверку макетов, конструктивную отработку и профессиональную разработку образцов.', 'ar' => 'يدعم فريق الهندسة مراجعة التصاميم والفحص الهيكلي مع خدمة احترافية لتطوير العينات.']) }}
          </p>
        </div>

        <div class="border border-yideli-line bg-white p-6 sm:p-8">
          <h4 class="text-xl font-serif text-yideli-dark mb-3">{{ $t('home_b2b.capability_3_title', ['en' => 'Stable Delivery', 'zh' => '稳定交付', 'fr' => 'Livraison stable', 'es' => 'Entrega estable', 'ru' => 'Стабильная поставка', 'ar' => 'تسليم مستقر']) }}</h4>
          <p class="text-gray-600 text-sm leading-relaxed">
            {{ $t('home_b2b.capability_3_desc', ['en' => 'Reliable production scheduling and stable mass production help you launch SKUs safely and efficiently.', 'zh' => '可靠排产与稳定量产，帮助客户安全高效地推进 SKU 上市。', 'fr' => 'Une planification de production fiable et une production de masse stable vous aident a lancer vos SKU de maniere sure et efficace.', 'es' => 'La planificacion de produccion fiable y la produccion masiva estable le ayudan a lanzar SKU de forma segura y eficiente.', 'ru' => 'Надежное планирование производства и стабильный массовый выпуск помогают безопасно и эффективно выводить SKU на рынок.', 'ar' => 'يساعدك التخطيط الموثوق للانتاج والانتاج الضخم المستقر على طرح وحدات SKU بكفاءة وامان.']) }}
          </p>
        </div>
      </div>

      <div class="mt-10 text-center">
        <a class="inline-flex items-center px-8 py-4 bg-yideli-dark text-white hover:bg-yideli-hover transition duration-300 uppercase text-sm tracking-wide"
           href="{{ route('production-process', ['lang' => $lang]) }}">
          {{ $t('home_b2b.oem_cta', ['en' => 'Explore OEM/ODM Service', 'zh' => '了解 OEM/ODM 服务', 'fr' => 'Voir le service OEM/ODM', 'es' => 'Ver servicio OEM/ODM', 'ru' => 'Изучить сервис OEM/ODM', 'ar' => 'استكشف خدمة OEM/ODM']) }}
          <span class="ms-2">→</span>
        </a>
      </div>
    </div>
  </section>

  <section class="bg-yideli-base py-20 overflow-hidden">
    <div
         class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto mb-12 flex flex-col items-start gap-4 px-4 sm:flex-row sm:items-end sm:justify-between sm:px-6 lg:px-12">
      <div>
        <h3 class="text-xl md:text-2xl lg:text-[1.7rem] uppercase tracking-[0.08em] text-yideli-dark mb-2">{{ __('home.curated_selection') }}</h3>
        <p class="text-gray-500 text-sm">{{ __('home.fine_stationery') }}</p>
      </div>
      <a class="btn-minimal text-sm font-medium text-yideli-dark pb-1"
         href="{{ route('product.index', ['lang' => $lang]) }}">{{ __('home.view_all_products') }}</a>
    </div>

    <div
         class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto grid grid-cols-2 gap-8 px-4 sm:px-6 md:grid-cols-2 lg:grid-cols-4 lg:px-12">
      @foreach ($categories as $category)
        @php
          $categoryCover = $category->cover_image ? asset('storage/' . $category->cover_image) : asset('images/placeholder.jpg');
        @endphp
        <a class="group cursor-pointer block w-full"
           href="{{ route('product.index', ['lang' => $lang, 'slug' => $category->slug]) }}">
          <div class="aspect-[4/5] bg-white mb-6 overflow-hidden relative w-full">
            <img class="w-full h-full object-cover group-hover:scale-105 transition duration-700"
                 src="{{ $categoryCover }}"
                 alt="{{ $category->name }}">
            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/5 transition duration-500"></div>
            <div
                 class="absolute bottom-4 start-0 w-full text-center opacity-0 group-hover:opacity-100 transition duration-500 translate-y-4 group-hover:translate-y-0">
              <span
                    class="bg-white/90 px-4 py-2 text-xs font-bold uppercase tracking-widest text-yideli-dark shadow-sm">{{ __('home.quick_view') }}</span>
            </div>
          </div>
          <h4 class="text-center font-bold text-yideli-dark text-lg group-hover:underline decoration-1 underline-offset-4">
            {{ $category->name }}
          </h4>
        </a>
      @endforeach
    </div>
  </section>

  <section class="bg-yideli-base py-20">
    <div class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto px-4 sm:px-6 lg:px-12">
      <div id="home-faq"
           class="mx-auto max-w-[1200px]">
        <div class="mb-[4rem]">
          <span class="text-xs font-bold tracking-[0.2em] uppercase text-yideli-dark mb-3 block">
            {{ $t('home_b2b.faq_kicker', ['en' => 'FAQ', 'zh' => '常见问题', 'fr' => 'FAQ', 'es' => 'FAQ', 'ru' => 'FAQ', 'ar' => 'الاسئلة الشائعة']) }}
          </span>
          <h2 class="text-xl md:text-2xl lg:text-[1.7rem] uppercase tracking-[0.08em] text-yideli-dark">
            {{ $t('home_b2b.faq_title', ['en' => 'Common Questions from OEM/ODM Buyers', 'zh' => '采购商常见问题', 'fr' => 'Questions frequentes des acheteurs OEM/ODM', 'es' => 'Preguntas frecuentes de compradores OEM/ODM', 'ru' => 'Частые вопросы OEM/ODM покупателей', 'ar' => 'اسئلة شائعة من مشترين OEM/ODM']) }}
          </h2>
        </div>

        <div class="grid gap-4 md:grid-cols-2"
             x-data="{ active: 0, toggle(index) { this.active = this.active === index ? null : index } }">
          @forelse ($faqItems->take(5) as $k => $faq)
            <div class="h-full bg-white border border-yideli-line rounded-sm">
              <button class="flex w-full items-start justify-between gap-4 p-5 text-start sm:p-6"
                      type="button"
                      @click="toggle({{ $k }})"
                      :aria-expanded="active === {{ $k }}">
                <span class="font-medium text-yideli-dark">{{ $faq['question'] }}</span>
                <span class="text-xl"
                      x-text="active === {{ $k }} ? '−' : '+'"></span>
              </button>
              <div x-show="active === {{ $k }}"
                   x-transition:enter="transition ease-out duration-200"
                   x-transition:enter-start="opacity-0 -translate-y-1"
                   x-transition:enter-end="opacity-100 translate-y-0"
                   x-transition:leave="transition ease-in duration-150"
                   x-transition:leave-start="opacity-100 translate-y-0"
                   x-transition:leave-end="opacity-0 -translate-y-1"
                   style="display:none;">
                <div class="px-6 pb-6 text-gray-600 font-light text-sm leading-relaxed">
                  {{ $faq['answer'] }}
                </div>
              </div>
            </div>
          @empty
            <div class="bg-white border border-yideli-line p-6 text-sm text-gray-600 text-center">
              {{ $t('home_b2b.faq_empty', ['en' => 'FAQ content can be managed in the admin settings.', 'zh' => 'FAQ 内容可在后台设置中维护。', 'fr' => 'Le contenu FAQ peut etre gere dans les parametres admin.', 'es' => 'El contenido FAQ se puede gestionar en la configuracion de admin.', 'ru' => 'FAQ можно настроить в админ-панели.', 'ar' => 'يمكن ادارة محتوى FAQ من اعدادات الادمن.']) }}
            </div>
          @endforelse
        </div>

        @if ($faqItems->isNotEmpty())
          <div class="mt-8">
            <a class="inline-flex items-center px-8 py-4 bg-yideli-dark text-white hover:bg-yideli-hover transition duration-300 uppercase text-sm tracking-wide"
               href="{{ route('faq.index', ['lang' => $lang]) }}">
              {{ $t('home_b2b.faq_find_out_more', ['en' => 'Find Out More', 'zh' => '了解更多', 'fr' => 'En savoir plus', 'es' => 'Descubrir mas', 'ru' => 'Узнать больше', 'ar' => 'اعرف المزيد']) }}
              <span class="ms-2">→</span>
            </a>
          </div>
        @endif
      </div>
    </div>
  </section>
@endsection

@once
  <style>
    @keyframes cert-marquee {
      from {
        transform: translateX(0);
      }

      to {
        transform: translateX(-50%);
      }
    }

    .cert-marquee-track {
      animation: cert-marquee 28s linear infinite;
    }
  </style>
@endonce
