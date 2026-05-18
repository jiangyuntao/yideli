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

    $heroCategoryImageMap = [
        'binding' => asset('images/binding-book-2.jpg'),
        'spiral' => asset('images/line-circle-book-2.jpg'),
        'notebook' => asset('images/notebook-2.jpg'),
        'calendar' => asset('images/weekly-calendar-2.jpg'),
    ];

    $heroSlide = $settings->home_carousel ?? [];

    if (is_array($heroSlide) && array_is_list($heroSlide)) {
        $heroSlide = $heroSlide[0] ?? [];
    }

    if (! is_array($heroSlide)) {
        $heroSlide = [];
    }
    $resolveHeroImage = function ($path) {
        if (! is_string($path) || $path === '') {
            return null;
        }

        return str_starts_with($path, 'http://') || str_starts_with($path, 'https://') || str_starts_with($path, '/')
            ? $path
            : asset('storage/' . ltrim($path, '/'));
    };

    $heroDesktopImage = $resolveHeroImage(data_get($heroSlide, 'image')) ?? asset('images/working-1.webp');
    $heroMobileImage = $resolveHeroImage(data_get($heroSlide, 'image_mobile')) ?? $heroDesktopImage;
  @endphp

  <section class="relative mx-auto w-full overflow-hidden shadow-2xl">
    <div class="absolute inset-0 overflow-hidden">
      <img class="h-full w-full object-cover object-center md:hidden"
           src="{{ $heroMobileImage }}"
           alt="Yideli factory hero image">
      <img class="hidden h-full w-full object-cover object-center md:block md:object-[center_20%]"
           src="{{ $heroDesktopImage }}"
           alt="Yideli factory hero image">
    </div>

    <div class="relative z-20 flex min-h-[680px] items-start pb-6 pt-8 sm:min-h-[720px] sm:pb-8 sm:pt-10 md:min-h-[760px] md:pb-10 md:pt-12 lg:min-h-[580px] lg:pb-8 lg:pt-14 xl:min-h-[640px]">
      <div class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto w-full px-4 sm:px-6 lg:px-12">
        <div class="grid gap-6 lg:grid-cols-10 lg:items-stretch lg:gap-8 xl:gap-10">
          <div class="min-w-0 w-full lg:col-span-6">
            <div class="flex h-full w-full min-w-0 flex-col justify-center overflow-hidden bg-yideli-text/58 p-6 text-white shadow-2xl backdrop-blur-[2px] sm:p-8 lg:max-w-3xl lg:p-9">
              <img class="mb-5 h-14 w-auto object-contain brightness-0 invert sm:h-16"
                   src="{{ asset('images/logo-light-bg.png') }}"
                   alt="Yideli logo">

              <p class="text-sm font-semibold uppercase tracking-[0.08em] text-white/90 sm:text-base">
                {{ $t('home_b2b.hero_intro_line_1', ['en' => "If You're Looking For", 'zh' => '如果您正在寻找', 'fr' => 'Si vous recherchez', 'es' => 'Si esta buscando', 'ru' => 'Если вы ищете', 'ar' => 'إذا كنت تبحث عن']) }}
              </p>

              <h1 class="mt-3 flex min-w-0 flex-col gap-2 font-black leading-[1.05] text-white drop-shadow-[0_4px_18px_rgba(0,0,0,0.4)]">
                <span class="block max-w-full whitespace-nowrap text-[clamp(0.95rem,2.1vw+0.45rem,3.25rem)] tracking-tight">
                  {{ $t('home_b2b.hero_intro_line_2', ['en' => 'A Reliable Manufacturer of', 'zh' => '一家可靠的制造商，专注于', 'fr' => 'Un fabricant fiable de', 'es' => 'Un fabricante confiable de', 'ru' => 'Надежного производителя', 'ar' => 'شركة تصنيع موثوقة لـ']) }}
                </span>
                <span class="block max-w-full text-[clamp(0.95rem,2.1vw+0.45rem,3.25rem)] tracking-tight">
                  {{ $t('home_b2b.hero_intro_line_3', ['en' => 'Custom Diaries, Notebooks & Planners', 'zh' => '定制日记本、笔记本与计划本', 'fr' => 'Journaux, carnets et planners personnalises', 'es' => 'Diarios, cuadernos y planners personalizados', 'ru' => 'Ежедневников, блокнотов и планеров на заказ', 'ar' => 'اليوميات والدفاتر والمخططات المخصصة']) }}
                </span>
              </h1>

              <p class="mt-3 text-lg font-semibold text-white sm:text-xl">
                {{ $t('home_b2b.hero_intro_line_4', ['en' => "Then You've Come To The Right Place.", 'zh' => '那么，您来对地方了。', 'fr' => 'Vous etes au bon endroit.', 'es' => 'Entonces ha llegado al lugar correcto.', 'ru' => 'Тогда вы пришли по адресу.', 'ar' => 'فأنت في المكان الصحيح.']) }}
              </p>

              <p class="mt-4 text-sm leading-relaxed text-white/90 sm:text-[0.95rem]">
                {{ $t('home_b2b.hero_intro_trust', ['en' => '35+ Years of OEM Experience | BSCI & FSC Certified | 7-Day Fast Sample', 'zh' => '35年以上 OEM 经验 | BSCI 与 FSC 认证 | 7天快速打样', 'fr' => '35+ ans d experience OEM | Certifie BSCI et FSC | Echantillon rapide en 7 jours', 'es' => '35+ anos de experiencia OEM | Certificacion BSCI y FSC | Muestra rapida en 7 dias', 'ru' => '35+ лет OEM опыта | Сертификация BSCI и FSC | Быстрый образец за 7 дней', 'ar' => 'أكثر من 35 عاما من خبرة OEM | معتمد من BSCI وFSC | عينة سريعة خلال 7 أيام']) }}
              </p>
            </div>
          </div>

          <div class="min-w-0 w-full lg:col-span-4">
            @include('index.inquire.hero-form', [
                'heroInquiryId' => 'hero-inquiry',
                'heroInquiryReturnTo' => route('index', ['lang' => $lang]) . '#hero-inquiry',
                'heroInquiryClass' => 'flex h-full min-w-0 flex-col justify-center overflow-hidden border border-white/30 bg-white/76 p-5 shadow-2xl backdrop-blur-md sm:p-6',
            ])
          </div>
        </div>
      </div>
    </div>

  </section>

  <section class="relative z-30 px-4 pt-2 sm:px-6 sm:pt-3 lg:px-12 lg:pt-4">
    <div class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto">
      <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 sm:gap-4 lg:grid-cols-4">
        @foreach ($categories->take(4) as $category)
          @php
            $categorySlug = strtolower((string) $category->slug);
            $categoryName = function_exists('mb_strtolower')
                ? mb_strtolower((string) $category->name)
                : strtolower((string) $category->name);

            $categoryCover = match (true) {
                str_contains($categorySlug, 'calendar'),
                str_contains($categorySlug, 'schedule'),
                str_contains($categorySlug, 'diary'),
                str_contains($categoryName, 'calendar'),
                str_contains($categoryName, 'weekly'),
                str_contains($categoryName, 'schedule'),
                str_contains($categoryName, 'diary'),
                str_contains($categoryName, '日程'),
                str_contains($categoryName, '日记'),
                str_contains($categoryName, '周历'),
                str_contains($categoryName, '周计划') => $heroCategoryImageMap['calendar'],

                str_contains($categorySlug, 'spiral'),
                str_contains($categorySlug, 'coil'),
                str_contains($categorySlug, 'wire'),
                str_contains($categoryName, 'spiral'),
                str_contains($categoryName, 'coil'),
                str_contains($categoryName, 'wire'),
                str_contains($categoryName, '线圈') => $heroCategoryImageMap['spiral'],

                str_contains($categorySlug, 'binding'),
                str_contains($categorySlug, 'elastic-band'),
                str_contains($categoryName, 'binding'),
                str_contains($categoryName, 'elastic'),
                str_contains($categoryName, '绑带'),
                str_contains($categoryName, '装订') => $heroCategoryImageMap['binding'],

                str_contains($categorySlug, 'notebook'),
                str_contains($categoryName, 'notebook'),
                str_contains($categoryName, '笔记本') => $heroCategoryImageMap['notebook'],

                default => asset('images/placeholder.jpg'),
            };
          @endphp
          <article class="group relative overflow-hidden bg-[#fbfbee] shadow-2xl">
            <div class="aspect-[4/3] overflow-hidden bg-[#fbfbee] p-4 sm:p-5">
              <img class="h-full w-full object-contain"
                   src="{{ $categoryCover }}"
                   alt="{{ $category->name }}">
            </div>

            <div class="absolute inset-0 bg-gradient-to-t from-black/65 via-black/20 to-transparent"></div>

            <div class="absolute inset-0 flex items-center justify-center px-4 text-center sm:px-5">
              <h3 class="max-w-full px-4 text-base font-bold leading-snug text-white [text-shadow:0_3px_10px_rgba(0,0,0,0.45)] [-webkit-text-stroke:0.6px_rgba(0,0,0,0.35)] sm:text-lg lg:text-xl">
                {{ $category->name }}
              </h3>
            </div>

            <div class="absolute inset-x-0 bottom-0 p-3 sm:p-4">
              <div class="grid grid-cols-1 gap-2 sm:grid-cols-2">
                <a class="inline-flex items-center justify-center bg-white px-3 py-2 text-[11px] font-bold uppercase tracking-[0.08em] text-yideli-dark transition hover:bg-yideli-base sm:text-xs"
                   href="{{ route('product.index', ['lang' => $lang, 'slug' => $category->slug]) }}">
                  {{ $t('home_b2b.category_card_view_details', ['en' => 'View Details', 'zh' => '查看详情', 'fr' => 'Voir details', 'es' => 'Ver detalles', 'ru' => 'Подробнее', 'ar' => 'عرض التفاصيل']) }}
                </a>
                <a class="inline-flex items-center justify-center border border-white/70 bg-white/12 px-3 py-2 text-[11px] font-bold uppercase tracking-[0.08em] text-white backdrop-blur-sm transition hover:bg-white hover:text-yideli-dark sm:text-xs"
                   href="{{ route('inquire.form', ['lang' => $lang, 'product' => $category->name]) }}">
                  {{ $t('home_b2b.category_card_get_quote', ['en' => 'Get Quote', 'zh' => '获取报价', 'fr' => 'Obtenir un devis', 'es' => 'Solicitar cotizacion', 'ru' => 'Получить расчет', 'ar' => 'احصل على عرض سعر']) }}
                </a>
              </div>
            </div>
          </article>
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

  <section class="bg-yideli-base py-20">
    <div class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto grid items-start gap-12 px-4 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-12">
      <div id="home-faq">
        <div class="mb-[4rem]">
          <span class="text-xs font-bold tracking-[0.2em] uppercase text-yideli-dark mb-3 block">
            {{ $t('home_b2b.faq_kicker', ['en' => 'FAQ', 'zh' => '常见问题', 'fr' => 'FAQ', 'es' => 'FAQ', 'ru' => 'FAQ', 'ar' => 'الاسئلة الشائعة']) }}
          </span>
          <h2 class="text-xl md:text-2xl lg:text-[1.7rem] uppercase tracking-[0.08em] text-yideli-dark">
            {{ $t('home_b2b.faq_title', ['en' => 'Common Questions from OEM/ODM Buyers', 'zh' => '采购商常见问题', 'fr' => 'Questions frequentes des acheteurs OEM/ODM', 'es' => 'Preguntas frecuentes de compradores OEM/ODM', 'ru' => 'Частые вопросы OEM/ODM покупателей', 'ar' => 'اسئلة شائعة من مشترين OEM/ODM']) }}
          </h2>
        </div>

        <div class="space-y-4"
             x-data="{ active: 0, toggle(index) { this.active = this.active === index ? null : index } }">
          @forelse ($faqItems->take(5) as $k => $faq)
            <div class="bg-white border border-yideli-line rounded-sm">
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
          <div class="mt-8 flex justify-center md:block">
            <a class="inline-flex items-center px-8 py-4 bg-yideli-dark text-white hover:bg-yideli-hover transition duration-300 uppercase text-sm tracking-wide"
               href="{{ route('faq.index', ['lang' => $lang]) }}">
              {{ $t('home_b2b.faq_find_out_more', ['en' => 'Find Out More', 'zh' => '了解更多', 'fr' => 'En savoir plus', 'es' => 'Descubrir mas', 'ru' => 'Узнать больше', 'ar' => 'اعرف المزيد']) }}
              <span class="ms-2">→</span>
            </a>
          </div>
        @endif
      </div>

      <div id="contact-us"
           class="scroll-mt-32">
        <span class="text-xs font-bold tracking-[0.2em] uppercase text-yideli-dark mb-3 block">
          {{ $t('home_b2b.contact_kicker', ['en' => 'Contact Us', 'zh' => '联系我们', 'fr' => 'Contactez-nous', 'es' => 'Contactenos', 'ru' => 'Свяжитесь с нами', 'ar' => 'اتصل بنا']) }}
        </span>
        <h2 class="text-xl md:text-2xl lg:text-[1.7rem] uppercase tracking-[0.08em] text-yideli-dark mb-4">
          {{ $t('home_b2b.contact_title', ['en' => 'Start Your OEM/ODM Inquiry', 'zh' => '开启您的 OEM/ODM 询盘', 'fr' => 'Demarrez votre demande OEM/ODM', 'es' => 'Inicie su consulta OEM/ODM', 'ru' => 'Начните ваш OEM/ODM запрос', 'ar' => 'ابدأ استفسار OEM/ODM الخاص بك']) }}
        </h2>
        <p class="text-gray-600 font-light leading-relaxed mb-8">
          {{ $t('home_b2b.contact_desc', ['en' => 'Tell us your target market, spec request, and expected timeline. Our team will respond with a practical quote plan.', 'zh' => '请告知目标市场、规格需求和计划周期，我们将尽快提供可执行报价方案。', 'fr' => 'Indiquez votre marche cible, vos specifications et votre delai. Notre equipe repondra avec un devis realiste.', 'es' => 'Comparta su mercado objetivo, especificaciones y plazo esperado. Responderemos con una cotizacion practica.', 'ru' => 'Сообщите рынок, требования и сроки, и команда предложит практичный расчет.', 'ar' => 'اخبرنا بالسوق المستهدف والمواصفات والجدول الزمني وسنرد بخطة عرض سعر عملية.']) }}
        </p>

        <div class="rounded-sm border border-yideli-line bg-white p-6 sm:p-8 lg:p-12">
        @if ($errors->any())
          <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-700 rounded-sm text-sm">
            <ul class="list-disc ps-5">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form class="space-y-8"
              action="{{ route('inquire.submit', ['lang' => $lang]) }}"
              method="POST">
          @csrf
          <input type="hidden"
                 name="return_to"
                 value="{{ old('return_to', route('index', ['lang' => $lang]) . '#contact-us') }}">

          <div class="grid md:grid-cols-2 gap-8">
            <div class="relative">
              <input
                     class="peer block w-full px-0 py-2 bg-transparent border-b border-gray-300 focus:outline-none focus:border-yideli-dark transition text-gray-900 placeholder-transparent"
                     id="home-name"
                     name="name"
                     type="text"
                     value="{{ old('name') }}"
                     placeholder=" "
                     required>
              <label
                     class="absolute start-0 top-2 text-gray-400 text-sm transition-all duration-300 origin-left cursor-text peer-placeholder-shown:top-2 peer-focus:-top-4 peer-focus:text-xs peer-focus:text-yideli-dark peer-[:not(:placeholder-shown)]:-top-4 peer-[:not(:placeholder-shown)]:text-xs peer-[:not(:placeholder-shown)]:text-yideli-dark"
                     for="home-name">{!! nl2br(__('inquire.label_name')) !!} *</label>
            </div>

            <div class="relative">
              <input
                     class="peer block w-full px-0 py-2 bg-transparent border-b border-gray-300 focus:outline-none focus:border-yideli-dark transition text-gray-900 placeholder-transparent"
                     id="home-company"
                     name="company"
                     type="text"
                     value="{{ old('company') }}"
                     placeholder=" ">
              <label
                     class="absolute start-0 top-2 text-gray-400 text-sm transition-all duration-300 origin-left cursor-text peer-placeholder-shown:top-2 peer-focus:-top-4 peer-focus:text-xs peer-focus:text-yideli-dark peer-[:not(:placeholder-shown)]:-top-4 peer-[:not(:placeholder-shown)]:text-xs peer-[:not(:placeholder-shown)]:text-yideli-dark"
                     for="home-company">{!! nl2br(__('inquire.label_company')) !!}</label>
            </div>
          </div>

          <div class="grid md:grid-cols-2 gap-8">
            <div class="relative">
              <input
                     class="peer block w-full px-0 py-2 bg-transparent border-b border-gray-300 focus:outline-none focus:border-yideli-dark transition text-gray-900 placeholder-transparent"
                     id="home-email"
                     name="email"
                     type="email"
                     value="{{ old('email') }}"
                     placeholder=" "
                     required>
              <label
                     class="absolute start-0 top-2 text-gray-400 text-sm transition-all duration-300 origin-left cursor-text peer-placeholder-shown:top-2 peer-focus:-top-4 peer-focus:text-xs peer-focus:text-yideli-dark peer-[:not(:placeholder-shown)]:-top-4 peer-[:not(:placeholder-shown)]:text-xs peer-[:not(:placeholder-shown)]:text-yideli-dark"
                     for="home-email">{!! nl2br(__('inquire.label_email')) !!} *</label>
            </div>

            <div class="relative">
              <input
                     class="peer block w-full px-0 py-2 bg-transparent border-b border-gray-300 focus:outline-none focus:border-yideli-dark transition text-gray-900 placeholder-transparent"
                     id="home-phone"
                     name="phone"
                     type="tel"
                     value="{{ old('phone') }}"
                     placeholder=" ">
              <label
                     class="absolute start-0 top-2 text-gray-400 text-sm transition-all duration-300 origin-left cursor-text peer-placeholder-shown:top-2 peer-focus:-top-4 peer-focus:text-xs peer-focus:text-yideli-dark peer-[:not(:placeholder-shown)]:-top-4 peer-[:not(:placeholder-shown)]:text-xs peer-[:not(:placeholder-shown)]:text-yideli-dark"
                     for="home-phone">{!! nl2br(__('inquire.label_phone')) !!}</label>
            </div>
          </div>

          <div>
            <label class="block text-sm text-gray-400 mb-3">{!! nl2br(__('inquire.label_interest')) !!}</label>
            @php
              $oldInterest = old('interest', []);
            @endphp
            <div class="flex flex-wrap gap-4">
              <label class="inline-flex items-center cursor-pointer">
                <input class="w-4 h-4 text-yideli-dark border-gray-300 rounded focus:ring-yideli-dark"
                       name="interest[]"
                       type="checkbox"
                       value="oem"
                       {{ in_array('oem', $oldInterest) ? 'checked' : '' }}>
                <span class="ms-2 text-sm text-gray-600">{!! nl2br(__('inquire.option_oem')) !!}</span>
              </label>

              <label class="inline-flex items-center cursor-pointer">
                <input class="w-4 h-4 text-yideli-dark border-gray-300 rounded focus:ring-yideli-dark"
                       name="interest[]"
                       type="checkbox"
                       value="odm"
                       {{ in_array('odm', $oldInterest) ? 'checked' : '' }}>
                <span class="ms-2 text-sm text-gray-600">{!! nl2br(__('inquire.option_odm')) !!}</span>
              </label>

              <label class="inline-flex items-center cursor-pointer">
                <input class="w-4 h-4 text-yideli-dark border-gray-300 rounded focus:ring-yideli-dark"
                       name="interest[]"
                       type="checkbox"
                       value="notebook"
                       {{ in_array('notebook', $oldInterest) ? 'checked' : '' }}>
                <span class="ms-2 text-sm text-gray-600">{!! nl2br(__('inquire.option_notebook')) !!}</span>
              </label>

              <label class="inline-flex items-center cursor-pointer">
                <input class="w-4 h-4 text-yideli-dark border-gray-300 rounded focus:ring-yideli-dark"
                       name="interest[]"
                       type="checkbox"
                       value="diary"
                       {{ in_array('diary', $oldInterest) ? 'checked' : '' }}>
                <span class="ms-2 text-sm text-gray-600">{!! nl2br(__('inquire.option_diary')) !!}</span>
              </label>
            </div>
          </div>

          @if (($settings->captcha_enabled ?? true))
            @php
              $captchaId = $inquiryCaptcha['id'] ?? null;
              $captchaImageUrl = $captchaId ? route('inquire.captcha', ['lang' => $lang, 'captchaId' => $captchaId]) . '?v=' . $captchaId : '';
              $captchaRefreshUrl = route('inquire.captcha.refresh', ['lang' => $lang]);
            @endphp
            <div class="grid md:grid-cols-2 gap-8"
                 x-data="{
                     captchaId: @js($captchaId ?? ''),
                     captchaImageUrl: @js($captchaImageUrl),
                     refreshUrl: @js($captchaRefreshUrl),
                     refreshing: false,
                     async refreshCaptcha() {
                         if (this.refreshing) return;
                         this.refreshing = true;
                         try {
                             const res = await fetch(this.refreshUrl, {
                                 headers: {
                                     'Accept': 'application/json',
                                     'X-Requested-With': 'XMLHttpRequest'
                                 }
                             });
                             if (!res.ok) throw new Error('captcha_refresh_failed');
                             const data = await res.json();
                             if (data?.id && data?.image_url) {
                                 this.captchaId = data.id;
                                 const sep = data.image_url.includes('?') ? '&' : '?';
                                 this.captchaImageUrl = `${data.image_url}${sep}v=${Date.now()}`;
                             }
                         } catch (e) {
                             console.error(e);
                         } finally {
                             this.refreshing = false;
                         }
                     }
                }">
              <div>
                <label class="block text-sm text-gray-400 mb-3">
                  {{ $t('inquire.captcha_image_label', ['en' => 'Captcha', 'zh' => '验证码', 'fr' => 'Captcha', 'es' => 'Captcha', 'ru' => 'Капча', 'ar' => 'رمز التحقق']) }}
                </label>
                <input type="hidden"
                       name="captcha_id"
                       :value="captchaId">
                <div class="flex w-full flex-col items-start gap-3 border border-yideli-line bg-white px-4 py-3 sm:flex-row sm:items-center sm:justify-between">
                  <div class="flex min-w-0 flex-1 items-center justify-start">
                    <template x-if="captchaImageUrl">
                      <img class="h-12 w-auto"
                           :src="captchaImageUrl"
                           alt="captcha image">
                    </template>
                    <template x-if="!captchaImageUrl">
                      <span class="text-sm text-gray-500">
                        {{ $t('inquire.captcha_unavailable', ['en' => 'Captcha unavailable', 'zh' => '验证码暂不可用', 'fr' => 'Captcha indisponible', 'es' => 'Captcha no disponible', 'ru' => 'Капча недоступна', 'ar' => 'رمز التحقق غير متاح']) }}
                      </span>
                    </template>
                  </div>
                  <button class="cursor-pointer text-xs text-yideli-dark underline hover:text-yideli-hover"
                          type="button"
                          :class="refreshing ? 'opacity-60 cursor-not-allowed' : 'cursor-pointer'"
                          @click.prevent="refreshCaptcha">
                    {{ $t('inquire.captcha_refresh', ['en' => 'Refresh', 'zh' => '刷新', 'fr' => 'Rafraichir', 'es' => 'Actualizar', 'ru' => 'Обновить', 'ar' => 'تحديث']) }}
                  </button>
                </div>
              </div>

              <div class="relative">
                <input
                       class="peer block w-full px-0 py-2 bg-transparent border-b border-gray-300 focus:outline-none focus:border-yideli-dark transition text-gray-900 placeholder-transparent"
                       id="home-captcha-answer"
                       name="captcha_answer"
                       type="text"
                       value="{{ old('captcha_answer') }}"
                       placeholder=" "
                       required>
                <label
                       class="absolute start-0 top-2 text-gray-400 text-sm transition-all duration-300 origin-left cursor-text peer-placeholder-shown:top-2 peer-focus:-top-4 peer-focus:text-xs peer-focus:text-yideli-dark peer-[:not(:placeholder-shown)]:-top-4 peer-[:not(:placeholder-shown)]:text-xs peer-[:not(:placeholder-shown)]:text-yideli-dark"
                       for="home-captcha-answer">{{ $t('inquire.captcha_input_label', ['en' => 'Enter Captcha', 'zh' => '请输入验证码', 'fr' => 'Saisissez le code', 'es' => 'Ingrese el codigo', 'ru' => 'Введите код', 'ar' => 'ادخل الرمز']) }} *</label>
                @error('captcha_answer')
                  <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                @enderror
              </div>
            </div>
          @endif

          <div class="relative mt-8">
            <textarea
                      class="peer block w-full px-0 py-2 bg-transparent border-b border-gray-300 focus:outline-none focus:border-yideli-dark transition text-gray-900 placeholder-transparent resize-none"
                      id="home-message"
                      name="message"
                      rows="4"
                      placeholder=" ">{{ old('message') }}</textarea>
            <label
                   class="absolute start-0 top-2 text-gray-400 text-sm transition-all duration-300 origin-left cursor-text peer-placeholder-shown:top-2 peer-focus:-top-4 peer-focus:text-xs peer-focus:text-yideli-dark peer-[:not(:placeholder-shown)]:-top-4 peer-[:not(:placeholder-shown)]:text-xs peer-[:not(:placeholder-shown)]:text-yideli-dark"
                   for="home-message">{!! nl2br(__('inquire.label_message')) !!}</label>
          </div>

          <div class="flex flex-col md:flex-row items-center md:justify-between gap-6 md:gap-4 pt-4">
            <p class="text-xs text-gray-400 max-w-xs text-center md:text-left">
              {!! nl2br(__('inquire.privacy_consent')) !!}
            </p>

            <button
                    class="w-full bg-yideli-dark px-10 py-4 text-sm font-bold uppercase tracking-widest text-white transition shadow-lg shadow-yideli-dark/20 hover:bg-yideli-hover md:w-auto"
                    type="submit">
              {!! nl2br(__('inquire.submit_btn')) !!}
            </button>
          </div>
        </form>
        </div>
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
