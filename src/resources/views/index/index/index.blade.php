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
  @endphp

  <section class="relative w-full mx-auto overflow-hidden shadow-2xl group"
           x-data="homeCarousel()"
           x-init="init()"
           @mouseenter="stopAutoplay()"
           @mouseleave="startAutoplay()"
           x-cloak>

    <div class="flex w-full aspect-[16/9] md:aspect-[21/9] transition-transform duration-700 ease-in-out"
         :style="`transform: translateX(-${active * 100}%)`">
      <template x-for="(slide, index) in slides"
                :key="index">
        <div class="w-full flex-shrink-0 relative h-full overflow-hidden">
          <img class="w-full h-full object-cover scale-110 blur-[3px] md:blur-[2px]"
               :src="getImageUrl(slide.image)"
               :alt="slide.title || 'Factory Slide'">

          <a class="absolute inset-0 z-10"
             :href="slide.custom_url || 'javascript:;'"
             :target="slide.in_new_windows == 1 ? '_blank' : '_self'"
             :aria-label="slide.title || 'slide link'"
             x-show="slide.custom_url && slide.custom_url !== '#' && slide.custom_url !== 'javascript:;'">
          </a>
        </div>
      </template>
    </div>

    <div
         class="absolute inset-y-0 start-0 w-24 bg-gradient-to-r from-black/40 to-transparent pointer-events-none opacity-0 group-hover:opacity-100 transition-opacity duration-300">
    </div>
    <div
         class="absolute inset-y-0 end-0 w-24 bg-gradient-to-l from-black/40 to-transparent pointer-events-none opacity-0 group-hover:opacity-100 transition-opacity duration-300">
    </div>

    <div class="absolute inset-0 z-20 flex items-center pointer-events-none">
      <div class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto px-6 lg:px-12 w-full">
        <div class="max-w-3xl bg-yideli-text/60 backdrop-blur-sm border border-white/20 p-5 md:p-6 shadow-2xl pointer-events-auto lg:fixed lg:top-1/2 lg:start-0 lg:max-w-[400px] xl:max-w-[430px] transition-transform duration-300 ease-out"
             x-data="{ collapsed: false }"
             x-bind:style="collapsed ? 'transform: translate(calc(-100% + 3rem), -50%);' : 'transform: translate(0, -50%);'">
          <button class="hidden lg:inline-flex absolute top-3 end-3 items-center justify-center w-9 h-9 bg-yideli-dark/85 text-white border border-white/20 shadow-xl hover:bg-yideli-dark transition z-10"
                  type="button"
                  @click="collapsed = !collapsed"
                  :aria-expanded="(!collapsed).toString()"
                  :aria-label="collapsed ? 'Expand floating intro panel' : 'Collapse floating intro panel'">
            <svg class="w-5 h-5 transition-transform duration-300"
                 :class="collapsed ? 'rotate-180' : ''"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor">
              <path stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M15 19l-7-7 7-7" />
            </svg>
          </button>

          <div class="pe-10 transition-opacity duration-200"
               :class="collapsed ? 'opacity-0 pointer-events-none' : 'opacity-100 delay-100'">
            <span class="text-yideli-base text-[11px] md:text-xs font-bold tracking-[0.16em] uppercase block mb-3">
              {{ $t('home_b2b.hero_kicker', ['en' => 'Diary & Notebook OEM/ODM Manufacturing', 'zh' => '日记本与笔记本 OEM/ODM 制造', 'fr' => 'Fabrication OEM/ODM d agendas et de carnets', 'es' => 'Fabricacion OEM/ODM de agendas y cuadernos', 'ru' => 'OEM/ODM производство ежедневников и блокнотов', 'ar' => 'تصنيع اليوميات والدفاتر بنظام OEM/ODM']) }}
            </span>

            <h1 class="text-white text-2xl md:text-4xl lg:text-[2.15rem] font-bold leading-tight drop-shadow-[0_4px_18px_rgba(0,0,0,0.55)]">
              {{ $t('home_b2b.hero_title', ['en' => '35+ Years Diary & Notebook OEM Factory for Worldwide Market', 'zh' => '35年以上日记本与笔记本 OEM 工厂，服务全球市场', 'fr' => 'Usine OEM de journaux et carnets avec plus de 35 ans pour le marche mondial', 'es' => 'Fabrica OEM de diarios y cuadernos con mas de 35 anos para el mercado global', 'ru' => 'OEM фабрика ежедневников и блокнотов с опытом 35+ лет для мирового рынка', 'ar' => 'مصنع OEM للمفكرات والدفاتر بخبرة 35+ سنة للسوق العالمي']) }}
            </h1>

            <p class="mt-3 text-yideli-base/95 text-sm md:text-base lg:text-[15px] leading-relaxed drop-shadow-[0_2px_10px_rgba(0,0,0,0.5)]">
              {{ $t('home_b2b.hero_subtitle', ['en' => 'Reliable Mass Production | Custom Solutions | Premium Quality | Global Certifications', 'zh' => '可靠量产 | 定制化方案 | 优质品质 | 全球认证', 'fr' => 'Production de masse fiable | Solutions sur mesure | Qualite premium | Certifications mondiales', 'es' => 'Produccion masiva fiable | Soluciones personalizadas | Calidad premium | Certificaciones globales', 'ru' => 'Надежное массовое производство | Индивидуальные решения | Премиальное качество | Международные сертификаты', 'ar' => 'إنتاج ضخم موثوق | حلول مخصصة | جودة فائقة | شهادات عالمية']) }}
            </p>

            <div class="mt-6 flex flex-nowrap items-stretch gap-3 px-1">
              <a class="inline-flex min-w-0 flex-1 items-center justify-center px-4 py-3 bg-white text-center text-yideli-dark font-bold text-[10px] md:text-[11px] leading-tight tracking-[0.06em] shadow-lg hover:bg-yideli-base transition whitespace-normal break-words min-h-[54px]"
                 href="#contact-us">
                {{ $t('home_b2b.hero_cta_quote', ['en' => 'Get Free Custom Quote', 'zh' => '获取免费定制报价', 'fr' => 'Obtenir un devis personnalise gratuit', 'es' => 'Obtener cotizacion personalizada gratis', 'ru' => 'Получить бесплатный персональный расчет', 'ar' => 'احصل على عرض سعر مخصص مجانا']) }}
              </a>

              <a class="inline-flex min-w-0 flex-1 items-center justify-center px-4 py-3 border border-white text-center text-white font-bold text-[10px] md:text-[11px] leading-tight tracking-[0.06em] bg-black/20 hover:bg-black/35 transition whitespace-normal break-words min-h-[54px]"
                 href="#factory-capability">
                {{ $t('home_b2b.hero_cta_factory', ['en' => 'View Factory Capability', 'zh' => '查看工厂实力', 'fr' => 'Voir les capacites de l usine', 'es' => 'Ver capacidad de fabrica', 'ru' => 'Смотреть возможности фабрики', 'ar' => 'عرض قدرات المصنع']) }}
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <button
            class="absolute z-30 start-4 top-1/2 -translate-y-1/2 p-2 text-yideli-base hover:text-white hover:scale-110 transition-all duration-300 opacity-0 group-hover:opacity-100 focus:outline-none translate-x-4 rtl:translate-x-4 group-hover:translate-x-0 group-hover:rtl:translate-x-0 drop-shadow-[0_0_5px_rgba(0,0,0,0.9)]"
            @click="prev()">
      <svg class="w-8 h-8 rtl:rotate-180"
           fill="none"
           stroke="currentColor"
           viewBox="0 0 24 24">
        <path stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2.5"
              d="M15 19l-7-7 7-7"></path>
      </svg>
    </button>

    <button
            class="absolute z-30 end-4 top-1/2 -translate-y-1/2 p-2 text-yideli-base hover:text-white hover:scale-110 transition-all duration-300 opacity-0 group-hover:opacity-100 focus:outline-none -translate-x-4 rtl:translate-x-4 group-hover:translate-x-0 group-hover:rtl:translate-x-0 drop-shadow-[0_0_5px_rgba(0,0,0,0.9)]"
            @click="next()">
      <svg class="w-8 h-8 rtl:rotate-180"
           fill="none"
           stroke="currentColor"
           viewBox="0 0 24 24">
        <path stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2.5"
              d="M9 5l7 7-7 7"></path>
      </svg>
    </button>

    <div class="absolute z-30 bottom-6 end-6 flex space-x-2">
      <template x-for="(slide, index) in slides"
                :key="index">
        <button class="h-2 rounded-full transition-all duration-300 focus:outline-none"
                @click="active = index"
                :class="active === index ? 'w-8 bg-white' : 'w-2 bg-white/50 hover:bg-white/80'">
        </button>
      </template>
    </div>
  </section>

  <section class="overflow-hidden"
           style="background-image: url('{{ asset('images/index-product-categories-5.jpg') }}'); background-repeat: repeat-x; background-size: auto 100%; background-position: center top;">
    <div class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto">
      <div class="grid grid-cols-4 gap-0 py-2">
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
           class="py-24 lg:py-32 px-6 lg:px-12 bg-yideli-base border-y border-yideli-line/70">
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

        <div class="grid grid-cols-4 gap-3">
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

  <section class="py-14 px-6 lg:px-12 bg-yideli-base border-t border-yideli-line/70">
    <div
         class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-0">
      <article class="bg-yideli-dark p-6 text-center text-white">
        <p class="text-4xl font-bold text-white">35+</p>
        <h3 class="mt-2 text-sm uppercase tracking-[0.18em] text-white">
          {{ $t('home_b2b.metric_card_1_title', ['en' => 'Years in the Industry', 'zh' => '行业经验', 'fr' => 'Annees dans l industrie', 'es' => 'Anos en la industria', 'ru' => 'Лет в отрасли', 'ar' => 'سنوات في القطاع']) }}
        </h3>
        <p class="mt-3 text-xs text-white/80 leading-relaxed">
          {{ $t('home_b2b.metric_card_1_desc', ['en' => 'Since 1989', 'zh' => '自 1989 年起', 'fr' => 'Depuis 1989', 'es' => 'Desde 1989', 'ru' => 'С 1989 года', 'ar' => 'منذ عام 1989']) }}
        </p>
      </article>

      <article class="bg-yideli-base p-6 text-center">
        <p class="text-4xl font-bold text-yideli-dark">35000+ m²</p>
        <h3 class="mt-2 text-sm uppercase tracking-[0.18em] text-yideli-dark">
          {{ $t('home_b2b.metric_card_2_title', ['en' => 'Modern Production Base', 'zh' => '现代化生产基地', 'fr' => 'Base de production moderne', 'es' => 'Base de produccion moderna', 'ru' => 'Современная производственная база', 'ar' => 'قاعدة انتاج حديثة']) }}
        </h3>
        <p class="mt-3 text-xs text-gray-600 leading-relaxed">
          {{ $t('home_b2b.metric_card_2_desc', ['en' => 'In Taizhou, China', 'zh' => '位于中国台州', 'fr' => 'A Taizhou, Chine', 'es' => 'En Taizhou, China', 'ru' => 'В Тайчжоу, Китай', 'ar' => 'في تايتشو، الصين']) }}
        </p>
      </article>

      <article class="bg-yideli-dark p-6 text-center text-white">
        <p class="text-4xl font-bold text-white">20+</p>
        <h3 class="mt-2 text-sm uppercase tracking-[0.18em] text-white">
          {{ $t('home_b2b.metric_card_3_title', ['en' => 'Professional Designers', 'zh' => '专业设计师', 'fr' => 'Designers professionnels', 'es' => 'Disenadores profesionales', 'ru' => 'Профессиональные дизайнеры', 'ar' => 'مصممون محترفون']) }}
        </h3>
        <p class="mt-3 text-xs text-white/80 leading-relaxed">
          {{ $t('home_b2b.metric_card_3_desc', ['en' => 'In Hangzhou R&D Center', 'zh' => '位于杭州研发中心', 'fr' => 'Au centre R&D de Hangzhou', 'es' => 'En el centro de I+D de Hangzhou', 'ru' => 'В R&D центре Ханчжоу', 'ar' => 'في مركز البحث والتطوير في هانغتشو']) }}
        </p>
      </article>

      <article class="bg-yideli-base p-6 text-center">
        <p class="text-4xl font-bold text-yideli-dark">30+</p>
        <h3 class="mt-2 text-sm uppercase tracking-[0.18em] text-yideli-dark">
          {{ $t('home_b2b.metric_card_4_title', ['en' => 'Export Countries', 'zh' => '出口国家', 'fr' => 'Pays d exportation', 'es' => 'Paises de exportacion', 'ru' => 'Стран экспорта', 'ar' => 'دول التصدير']) }}
        </h3>
        <p class="mt-3 text-xs text-gray-600 leading-relaxed">
          {{ $t('home_b2b.metric_card_4_desc', ['en' => 'Global Distribution Network', 'zh' => '全球分销网络', 'fr' => 'Reseau mondial de distribution', 'es' => 'Red global de distribucion', 'ru' => 'Глобальная сеть дистрибуции', 'ar' => 'شبكة توزيع عالمية']) }}
        </p>
      </article>

      <article class="bg-yideli-dark p-6 text-center text-white">
        <p class="text-4xl font-bold text-white">300+</p>
        <h3 class="mt-2 text-sm uppercase tracking-[0.18em] text-white">
          {{ $t('home_b2b.metric_card_5_title', ['en' => 'Dedicated Professionals', 'zh' => '专业团队成员', 'fr' => 'Professionnels dedies', 'es' => 'Profesionales dedicados', 'ru' => 'Профильные специалисты', 'ar' => 'متخصصون متفرغون']) }}
        </h3>
        <p class="mt-3 text-xs text-white/80 leading-relaxed">
          {{ $t('home_b2b.metric_card_5_desc', ['en' => 'In Our Team', 'zh' => '团队规模', 'fr' => 'Dans notre equipe', 'es' => 'En nuestro equipo', 'ru' => 'В нашей команде', 'ar' => 'ضمن فريقنا']) }}
        </p>
      </article>
    </div>
  </section>

  <section class="px-6 lg:px-12 bg-yideli-base border-t border-yideli-line/70 py-16">
    <div class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto">
      <div class="text-center mb-10">
        <h3 class="text-xl md:text-2xl lg:text-[1.7rem] uppercase tracking-[0.08em] text-yideli-dark whitespace-nowrap">
          <span class="font-black">INTERNATIONAL CERTIFICATIONS</span>
          <span class="font-semibold"> FOR GLOBAL TRADE</span>
        </h3>
      </div>

      <div class="relative overflow-hidden py-4">
        <div class="cert-marquee-track flex w-max hover:[animation-play-state:paused]">
          @foreach ([0, 1] as $duplicate)
            <div class="flex shrink-0 gap-0 pe-0 overflow-visible">
              @foreach ($certSlideImages as $index => $image)
                <article class="flex h-56 w-36 shrink-0 items-center justify-center lg:h-60 lg:w-40 overflow-visible">
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

  <section class="py-20 bg-yideli-base border-t border-yideli-line">
    <div class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto px-6 lg:px-12">
      <div class="text-center mb-12">
        <h3 class="text-xl md:text-2xl lg:text-[1.7rem] uppercase tracking-[0.08em] text-yideli-dark mb-2 whitespace-nowrap">
          <span class="font-black">FROM MATERIAL SELECTION TO</span>
          <span class="font-semibold"> MASS PRODUCTION DELIVERY</span>
        </h3>
      </div>

      <div class="grid md:grid-cols-3 gap-8">
        <div class="bg-white border border-yideli-line p-8">
          <h4 class="text-xl font-serif text-yideli-dark mb-3">{{ $t('home_b2b.capability_1_title', ['en' => 'Flexible Specs', 'zh' => '规格灵活定制', 'fr' => 'Specifications flexibles', 'es' => 'Especificaciones flexibles', 'ru' => 'Гибкие спецификации', 'ar' => 'مواصفات مرنة']) }}</h4>
          <p class="text-gray-600 text-sm leading-relaxed">
            {{ $t('home_b2b.capability_1_desc', ['en' => 'Cover material, inner paper, binding, size, printing, and packaging can be customized for your market.', 'zh' => '封面材质、内页纸张、装订方式、尺寸、印刷与包装均可按市场需求定制。', 'fr' => 'Materiau de couverture, papier interieur, reliure, taille, impression et emballage personnalisables.', 'es' => 'Material de cubierta, papel interior, encuadernacion, tamano, impresion y empaque personalizables.', 'ru' => 'Материал обложки, бумага, переплет, размер, печать и упаковка настраиваются под ваш рынок.', 'ar' => 'يمكن تخصيص مادة الغلاف والورق الداخلي والتجليد والمقاس والطباعة والتغليف حسب سوقك.']) }}
          </p>
        </div>

        <div class="bg-white border border-yideli-line p-8">
          <h4 class="text-xl font-serif text-yideli-dark mb-3">{{ $t('home_b2b.capability_2_title', ['en' => 'Engineering team', 'zh' => '工程团队', 'fr' => 'Equipe d ingenierie', 'es' => 'Equipo de ingenieria', 'ru' => 'Инженерная команда', 'ar' => 'فريق الهندسة']) }}</h4>
          <p class="text-gray-600 text-sm leading-relaxed">
            {{ $t('home_b2b.capability_2_desc', ['en' => 'Engineering team supports artwork review and structural proofing with professional sample development service.', 'zh' => '工程团队支持稿件审核与结构打样，并提供专业样品开发服务。', 'fr' => 'L equipe d ingenierie prend en charge la verification des maquettes, l epreuve structurelle et un service professionnel de developpement d echantillons.', 'es' => 'El equipo de ingenieria respalda la revision de artes, la prueba estructural y un servicio profesional de desarrollo de muestras.', 'ru' => 'Инженерная команда поддерживает проверку макетов, конструктивную отработку и профессиональную разработку образцов.', 'ar' => 'يدعم فريق الهندسة مراجعة التصاميم والفحص الهيكلي مع خدمة احترافية لتطوير العينات.']) }}
          </p>
        </div>

        <div class="bg-white border border-yideli-line p-8">
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

  <section class="py-20 bg-yideli-base border-t border-yideli-line overflow-hidden">
    <div
         class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto px-6 lg:px-12 mb-12 flex justify-between items-end">
      <div>
        <h3 class="text-xl md:text-2xl lg:text-[1.7rem] uppercase tracking-[0.08em] text-yideli-dark mb-2">{{ __('home.curated_selection') }}</h3>
        <p class="text-gray-500 text-sm">{{ __('home.fine_stationery') }}</p>
      </div>
      <a class="btn-minimal text-sm font-medium text-yideli-dark pb-1"
         href="{{ route('product.index', ['lang' => $lang]) }}">{{ __('home.view_all_products') }}</a>
    </div>

    <div
         class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto px-6 lg:px-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
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

  <section class="bg-yideli-base border-t border-yideli-line py-20">
    <div class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto px-6 lg:px-12 grid lg:grid-cols-2 gap-12 lg:gap-16 items-start">
      <div id="home-faq">
        <div class="mb-14">
          <span class="text-xs font-bold tracking-[0.2em] uppercase text-yideli-dark mb-3 block">
            {{ $t('home_b2b.faq_kicker', ['en' => 'FAQ', 'zh' => '常见问题', 'fr' => 'FAQ', 'es' => 'FAQ', 'ru' => 'FAQ', 'ar' => 'الاسئلة الشائعة']) }}
          </span>
          <h2 class="text-xl md:text-2xl lg:text-[1.7rem] uppercase tracking-[0.08em] text-yideli-dark mb-4">
            {{ $t('home_b2b.faq_title', ['en' => 'Common Questions from OEM/ODM Buyers', 'zh' => '采购商常见问题', 'fr' => 'Questions frequentes des acheteurs OEM/ODM', 'es' => 'Preguntas frecuentes de compradores OEM/ODM', 'ru' => 'Частые вопросы OEM/ODM покупателей', 'ar' => 'اسئلة شائعة من مشترين OEM/ODM']) }}
          </h2>
        </div>

        <div class="space-y-4"
             x-data="{ active: 0, toggle(index) { this.active = this.active === index ? null : index } }">
          @forelse ($faqItems as $k => $faq)
            <div class="bg-white border border-yideli-line">
              <button class="w-full flex justify-between items-center p-6 text-start"
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

        <div class="bg-gray-50 p-8 lg:p-12 border border-gray-100 rounded-sm">
        @if (session('success'))
          <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-sm text-sm">
            {{ session('success') }}
          </div>
        @endif

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
                {{ $t('inquire.captcha_image_label', ['en' => 'Math Verification', 'zh' => '加减法验证码', 'fr' => 'Verification mathematique', 'es' => 'Verificacion matematica', 'ru' => 'Математическая проверка', 'ar' => 'تحقق رياضي']) }}
              </label>
              <input type="hidden"
                     name="captcha_id"
                     :value="captchaId">
              <div class="w-full bg-white border border-yideli-line flex items-center justify-between gap-3 overflow-hidden">
                <template x-if="captchaImageUrl">
                  <img class="h-14 w-auto max-w-[calc(100%-5rem)]"
                       :src="captchaImageUrl"
                       alt="captcha image">
                </template>
                <template x-if="!captchaImageUrl">
                  <span class="text-sm text-gray-500 min-w-0 px-3 py-3">
                    {{ $t('inquire.captcha_unavailable', ['en' => 'Captcha unavailable', 'zh' => '验证码暂不可用', 'fr' => 'Captcha indisponible', 'es' => 'Captcha no disponible', 'ru' => 'Капча недоступна', 'ar' => 'رمز التحقق غير متاح']) }}
                  </span>
                </template>
                <button class="shrink-0 px-3 py-3 text-[11px] leading-none text-yideli-dark underline hover:text-yideli-hover cursor-pointer whitespace-nowrap"
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

          <div class="relative mt-8">
            <textarea
                      class="peer block w-full px-0 py-2 bg-transparent border-b border-gray-300 focus:outline-none focus:border-yideli-dark transition text-gray-900 placeholder-transparent resize-none"
                      id="home-message"
                      name="message"
                      rows="4"
                      placeholder=" "
                      required>{{ old('message') }}</textarea>
            <label
                   class="absolute start-0 top-2 text-gray-400 text-sm transition-all duration-300 origin-left cursor-text peer-placeholder-shown:top-2 peer-focus:-top-4 peer-focus:text-xs peer-focus:text-yideli-dark peer-[:not(:placeholder-shown)]:-top-4 peer-[:not(:placeholder-shown)]:text-xs peer-[:not(:placeholder-shown)]:text-yideli-dark"
                   for="home-message">{!! nl2br(__('inquire.label_message')) !!} *</label>
          </div>

          <div class="flex flex-col md:flex-row items-center md:justify-between gap-6 md:gap-4 pt-4">
            <p class="text-xs text-gray-400 max-w-xs text-center md:text-left">
              {!! nl2br(__('inquire.privacy_consent')) !!}
            </p>

            <button
                    class="bg-yideli-dark text-white px-10 py-4 text-sm font-bold uppercase tracking-widest hover:bg-yideli-hover transition shadow-lg shadow-yideli-dark/20"
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

@section('script')
  <script>
    function homeCarousel() {
      return {
        active: 0,
        interval: null,
        slides: @json($settings->home_carousel ?? []),
        fallbackSlideImage: @json(asset('images/working-1.webp')),

        init() {
          if (!Array.isArray(this.slides) || this.slides.length === 0) {
            this.slides = [{
              image: this.fallbackSlideImage,
              title: '',
              custom_url: 'javascript:;',
              in_new_windows: 0
            }];
            return;
          }

          this.startAutoplay();
        },

        getImageUrl(path) {
          if (!path) {
            return this.fallbackSlideImage;
          }
          if (path.startsWith('http') || path.startsWith('/')) {
            return path;
          }
          return '/storage/' + path;
        },

        next() {
          if (this.slides.length <= 1) {
            return;
          }
          this.active = this.active === this.slides.length - 1 ? 0 : this.active + 1;
        },

        prev() {
          if (this.slides.length <= 1) {
            return;
          }
          this.active = this.active === 0 ? this.slides.length - 1 : this.active - 1;
        },

        startAutoplay() {
          if (this.slides.length <= 1 || this.interval) {
            return;
          }

          this.interval = setInterval(() => {
            this.next();
          }, 5000);
        },

        stopAutoplay() {
          if (!this.interval) {
            return;
          }

          clearInterval(this.interval);
          this.interval = null;
        }
      }
    }
  </script>
@endsection
