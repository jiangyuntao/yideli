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
        ->take(4)
        ->values();
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
        <div class="w-full flex-shrink-0 relative h-full">
          <img class="w-full h-full object-cover"
               :src="getImageUrl(slide.image)"
               :alt="slide.title || 'Factory Slide'">

          <a class="absolute inset-0 z-10"
             :href="slide.custom_url || 'javascript:;'"
             :target="slide.in_new_windows == 1 ? '_blank' : '_self'"
             :aria-label="slide.title || 'slide link'"
             x-show="slide.custom_url && slide.custom_url !== '#' && slide.custom_url !== 'javascript:;'">
          </a>

          <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/45 to-black/65"></div>
          <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/15 to-black/40"></div>
        </div>
      </template>
    </div>

    <div
         class="absolute inset-y-0 start-0 w-24 bg-gradient-to-r from-black/40 to-transparent pointer-events-none opacity-0 group-hover:opacity-100 transition-opacity duration-300">
    </div>
    <div
         class="absolute inset-y-0 end-0 w-24 bg-gradient-to-l from-black/40 to-transparent pointer-events-none opacity-0 group-hover:opacity-100 transition-opacity duration-300">
    </div>

    <div class="absolute inset-0 z-20 flex items-center">
      <div class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto px-6 lg:px-12 w-full">
        <div class="max-w-3xl bg-yideli-text/60 backdrop-blur-sm border border-white/20 p-6 md:p-10 shadow-2xl">
          <span class="text-yideli-base text-xs md:text-sm font-bold tracking-[0.18em] uppercase block mb-4">
            {{ $t('home_b2b.hero_kicker', ['en' => 'Notebook OEM/ODM Manufacturing', 'zh' => '笔记本 OEM/ODM 制造', 'fr' => 'Fabrication OEM/ODM de carnets', 'es' => 'Fabricacion OEM/ODM de cuadernos', 'ru' => 'OEM/ODM производство блокнотов', 'ar' => 'تصنيع دفاتر OEM/ODM']) }}
          </span>

          <h1 class="text-white text-2xl md:text-4xl lg:text-5xl font-bold leading-tight drop-shadow-[0_4px_18px_rgba(0,0,0,0.55)]">
            {{ $t('home_b2b.hero_title', ['en' => '35+ Year Notebook OEM Factory For US & EU Brands', 'zh' => '35年以上笔记本 OEM 工厂，服务欧美品牌', 'fr' => 'Usine OEM de carnets depuis plus de 35 ans pour les marques US et UE', 'es' => 'Fabrica OEM de cuadernos con mas de 35 anos para marcas de EE.UU. y UE', 'ru' => 'OEM фабрика блокнотов с опытом 35+ лет для брендов США и ЕС', 'ar' => 'مصنع دفاتر OEM بخبرة 35+ سنة لعلامات امريكا واوروبا']) }}
          </h1>

          <p class="mt-4 text-yideli-base/95 text-sm md:text-lg leading-relaxed drop-shadow-[0_2px_10px_rgba(0,0,0,0.5)]">
            {{ $t('home_b2b.hero_subtitle', ['en' => 'Stable Mass Production | Low MOQ | 7-Day Fast Sample | 100% REACH & FSC Compliant', 'zh' => '稳定量产 | 低起订量 | 7天快速打样 | 100% 符合 REACH 与 FSC', 'fr' => 'Production de masse stable | Faible MOQ | Echantillon rapide en 7 jours | 100% conforme REACH et FSC', 'es' => 'Produccion masiva estable | MOQ bajo | Muestra rapida en 7 dias | 100% conforme REACH y FSC', 'ru' => 'Стабильное массовое производство | Низкий MOQ | Образец за 7 дней | 100% соответствие REACH и FSC', 'ar' => 'انتاج ضخم مستقر | حد ادنى منخفض | عينة سريعة خلال 7 ايام | توافق 100% مع REACH وFSC']) }}
          </p>

          <div class="mt-8 flex flex-wrap gap-3">
            <a class="inline-flex items-center justify-center px-6 py-3 bg-white text-yideli-dark font-bold uppercase text-xs tracking-widest shadow-lg hover:bg-yideli-base transition"
               href="#contact-us">
              {{ $t('home_b2b.hero_cta_quote', ['en' => 'Get Free Custom Quote', 'zh' => '获取免费定制报价', 'fr' => 'Obtenir un devis personnalise gratuit', 'es' => 'Obtener cotizacion personalizada gratis', 'ru' => 'Получить бесплатный персональный расчет', 'ar' => 'احصل على عرض سعر مخصص مجانا']) }}
            </a>

            <a class="inline-flex items-center justify-center px-6 py-3 border border-white text-white font-bold uppercase text-xs tracking-widest bg-black/20 hover:bg-black/35 transition"
               href="#factory-capability">
              {{ $t('home_b2b.hero_cta_factory', ['en' => 'View Factory Capability', 'zh' => '查看工厂实力', 'fr' => 'Voir les capacites de l usine', 'es' => 'Ver capacidad de fabrica', 'ru' => 'Смотреть возможности фабрики', 'ar' => 'عرض قدرات المصنع']) }}
            </a>
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

  <section class="w-full bg-[#347e73] font-sans">
    <div
         class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto grid grid-cols-1 lg:grid-cols-[2fr_3fr_2fr] text-white">

      <div class="bg-[#347e73] ps-10 pe-4 py-8 flex flex-col justify-center min-h-[280px]">
        <div class="w-full">
          <h3 class="mb-40 text-3xl lg:text-4xl font-[800]">35+</h3>
          <p class="uppercase text-sm tracking-widest leading-relaxed mt-6 font-medium">
            {!! nl2br(__('home_cert.years_desc')) !!}
          </p>
        </div>
      </div>

      <div class="flex flex-col text-[#347e73]">
        <div class="bg-[#fcfcef] p-10 lg:p-12 flex flex-col justify-center flex-1">
          <div class="w-full">
            <h3 class="text-3xl lg:text-4xl font-[800] mb-2">35000+ m²</h3>
            <p class="uppercase text-sm tracking-widest font-normal">
              {!! nl2br(__('home_cert.area_desc')) !!}
            </p>
          </div>
        </div>

        <div class="bg-yideli-base p-10 lg:p-12 flex flex-col justify-center flex-1">
          <div class="w-full">
            <h3 class="text-3xl lg:text-4xl font-[800] mb-2">20+</h3>
            <p class="uppercase text-sm tracking-widest text-right font-normal leading-relaxed">
              {!! nl2br(__('home_cert.designers_desc')) !!}
            </p>
          </div>
        </div>
      </div>

      <div class="bg-[#347e73] ps-12 pe-4 py-8 flex flex-col justify-between min-h-[280px]">
        <div>
          <h3 class="text-3xl lg:text-4xl font-[800] mb-2">300+</h3>
          <p class="mt-8 uppercase text-sm tracking-widest font-medium leading-relaxed">
            {!! nl2br(__('home_cert.team_desc')) !!}
          </p>
        </div>

        <div class="mt-8 lg:mt-0">
          <h4 class="font-[800] uppercase text-sm tracking-widest mb-1">{!! nl2br(__('home_cert.global_title')) !!}</h4>
          <p class="uppercase text-sm tracking-widest font-normal">
            {!! nl2br(__('home_cert.global_desc')) !!}
          </p>
        </div>
      </div>
    </div>
  </section>

  <section id="factory-capability"
           class="py-24 lg:py-32 px-6 lg:px-12 bg-yideli-base border-y border-yideli-line/70">
    <div
         class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto grid lg:grid-cols-12 gap-12 lg:gap-24">
      <div class="lg:col-span-5 flex flex-col justify-center">
        <span class="text-yideli-dark text-sm font-bold tracking-widest mb-6 uppercase">
          {{ $t('home_b2b.factory_kicker', ['en' => 'Factory Capability', 'zh' => '工厂实力', 'fr' => 'Capacite de l usine', 'es' => 'Capacidad de fabrica', 'ru' => 'Возможности фабрики', 'ar' => 'قدرات المصنع']) }}
        </span>
        <h2 class="text-3xl lg:text-5xl font-serif text-yideli-dark mb-8 leading-tight">
          {{ $t('home_b2b.factory_title', ['en' => 'Integrated Notebook Manufacturing for Global Brands', 'zh' => '面向全球品牌的一体化笔记本制造', 'fr' => 'Fabrication integree de carnets pour les marques mondiales', 'es' => 'Fabricacion integrada de cuadernos para marcas globales', 'ru' => 'Интегрированное производство блокнотов для глобальных брендов', 'ar' => 'تصنيع دفاتر متكامل للعلامات العالمية']) }}
        </h2>
        <div class="space-y-5 text-gray-800 text-base leading-relaxed">
          <p>{!! nl2br(__('about.heritage_text_1')) !!}</p>
          <p>{!! nl2br(__('about.heritage_text_2')) !!}</p>
        </div>
        <div class="mt-8 grid grid-cols-2 gap-4 text-sm text-yideli-text">
          <div class="bg-white border border-yideli-line p-4">
            <p class="text-2xl font-bold text-yideli-dark">35+</p>
            <p>{{ $t('home_b2b.metric_years', ['en' => 'Years of OEM manufacturing', 'zh' => 'OEM 制造经验', 'fr' => 'Ans de fabrication OEM', 'es' => 'Anos de fabricacion OEM', 'ru' => 'Лет OEM производства', 'ar' => 'سنوات خبرة تصنيع OEM']) }}</p>
          </div>
          <div class="bg-white border border-yideli-line p-4">
            <p class="text-2xl font-bold text-yideli-dark">35000+ m²</p>
            <p>{{ $t('home_b2b.metric_area', ['en' => 'Factory floor space', 'zh' => '工厂建筑面积', 'fr' => 'Surface de l usine', 'es' => 'Superficie de fabrica', 'ru' => 'Площадь фабрики', 'ar' => 'مساحة المصنع']) }}</p>
          </div>
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

        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
          <img class="w-full h-32 object-cover rounded-sm"
               src="{{ asset('images/about-us/Integrated-Manufacturing-1.jpg') }}"
               alt="Factory line 1">
          <img class="w-full h-32 object-cover rounded-sm"
               src="{{ asset('images/about-us/Integrated-Manufacturing-2.jpg') }}"
               alt="Factory line 2">
          <img class="w-full h-32 object-cover rounded-sm"
               src="{{ asset('images/about-us/Integrated-Manufacturing-3.jpg') }}"
               alt="Factory line 3">
          <img class="w-full h-32 object-cover rounded-sm"
               src="{{ asset('images/about-us/Integrated-Manufacturing-4.jpg') }}"
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

  <section class="py-20 bg-yideli-base border-t border-yideli-line">
    <div class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto px-6 lg:px-12">
      <div class="text-center mb-12">
        <span class="text-xs font-bold tracking-[0.2em] uppercase text-yideli-dark mb-3 block">
          {{ $t('home_b2b.oem_kicker', ['en' => 'OEM/ODM Capability', 'zh' => 'OEM/ODM 能力', 'fr' => 'Capacite OEM/ODM', 'es' => 'Capacidad OEM/ODM', 'ru' => 'Возможности OEM/ODM', 'ar' => 'قدرات OEM/ODM']) }}
        </span>
        <h3 class="font-serif text-4xl font-black text-yideli-dark mb-2">
          {{ $t('home_b2b.oem_title', ['en' => 'From Material Selection to Mass Production Delivery', 'zh' => '从材料选择到量产交付', 'fr' => 'De la selection des materiaux a la livraison en masse', 'es' => 'Desde la seleccion de materiales hasta la entrega en masa', 'ru' => 'От выбора материалов до массовой поставки', 'ar' => 'من اختيار المواد حتى التسليم للانتاج الضخم']) }}
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
          <h4 class="text-xl font-serif text-yideli-dark mb-3">{{ $t('home_b2b.capability_2_title', ['en' => 'Fast Sampling', 'zh' => '快速打样', 'fr' => 'Echantillonnage rapide', 'es' => 'Muestreo rapido', 'ru' => 'Быстрое образцирование', 'ar' => 'نماذج سريعة']) }}</h4>
          <p class="text-gray-600 text-sm leading-relaxed">
            {{ $t('home_b2b.capability_2_desc', ['en' => 'Engineering team supports artwork review and structural proofing with a 7-day sample turnaround.', 'zh' => '工程团队支持稿件审核与结构打样，7 天内完成样品交付。', 'fr' => 'Equipe technique pour validation graphique et epreuve structurelle, echantillon en 7 jours.', 'es' => 'El equipo de ingenieria respalda revision de arte y prueba estructural con muestra en 7 dias.', 'ru' => 'Инженерная команда проверяет макеты и конструкцию, образец за 7 дней.', 'ar' => 'يدعم فريق الهندسة مراجعة التصميم والعيّنة الهيكلية مع تسليم عينة خلال 7 ايام.']) }}
          </p>
        </div>

        <div class="bg-white border border-yideli-line p-8">
          <h4 class="text-xl font-serif text-yideli-dark mb-3">{{ $t('home_b2b.capability_3_title', ['en' => 'Stable Delivery', 'zh' => '稳定交付', 'fr' => 'Livraison stable', 'es' => 'Entrega estable', 'ru' => 'Стабильная поставка', 'ar' => 'تسليم مستقر']) }}</h4>
          <p class="text-gray-600 text-sm leading-relaxed">
            {{ $t('home_b2b.capability_3_desc', ['en' => 'Low MOQ options and stable production scheduling help you launch SKUs quickly and safely.', 'zh' => '支持低 MOQ 起订与稳定排产，帮助客户快速安全地推进新品上市。', 'fr' => 'Options MOQ faible et planification stable pour lancer vos SKU rapidement.', 'es' => 'Opciones de MOQ bajo y planificacion estable para lanzar SKU con rapidez.', 'ru' => 'Низкий MOQ и стабильное планирование производства ускоряют запуск SKU.', 'ar' => 'خيارات MOQ منخفضة وجدولة انتاج مستقرة لمساعدتك على اطلاق المنتجات بسرعة وامان.']) }}
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
        <h3 class="font-serif text-4xl font-black text-yideli-dark mb-2">{{ __('home.curated_selection') }}</h3>
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

  <section class="px-6 lg:px-12 bg-[#fcfcef] border-y border-yideli-line/70 py-14">
    <div class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto">
      <div class="text-center mb-8">
        <span class="text-xs font-bold tracking-[0.2em] uppercase text-yideli-dark mb-3 block">
          {{ $t('home_b2b.compliance_kicker', ['en' => 'Compliance & Certifications', 'zh' => '合规与资质', 'fr' => 'Conformite et certifications', 'es' => 'Cumplimiento y certificaciones', 'ru' => 'Соответствие и сертификация', 'ar' => 'الامتثال والشهادات']) }}
        </span>
        <h3 class="font-serif text-3xl text-yideli-dark">
          {{ $t('home_b2b.compliance_title', ['en' => 'REACH, FSC and Quality-Controlled Production', 'zh' => 'REACH、FSC 与严格质控的生产体系', 'fr' => 'REACH, FSC et production sous controle qualite', 'es' => 'REACH, FSC y produccion con control de calidad', 'ru' => 'REACH, FSC и производство под строгим контролем качества', 'ar' => 'REACH وFSC وانتاج تحت رقابة جودة صارمة']) }}
        </h3>
      </div>

      <img class="w-full"
           src="{{ asset('images/cert-1-big-0-1.webp') }}"
           alt="Compliance certificates">
    </div>
  </section>

  <section class="py-20 bg-yideli-base border-t border-yideli-line overflow-hidden">
    <div
         class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto px-6 lg:px-12 mb-10 flex justify-between items-end gap-6 flex-wrap">
      <div>
        <span class="text-xs font-bold tracking-[0.2em] uppercase text-yideli-dark mb-3 block">
          {{ $t('home_b2b.case_kicker', ['en' => 'Case Studies', 'zh' => '客户案例', 'fr' => 'Etudes de cas', 'es' => 'Casos de estudio', 'ru' => 'Кейсы', 'ar' => 'دراسات الحالة']) }}
        </span>
        <h3 class="font-serif text-4xl font-black text-yideli-dark mb-2">
          {{ $t('home_b2b.case_title', ['en' => 'Recent Notebook Projects & Buyer Insights', 'zh' => '近期项目与采购洞察', 'fr' => 'Projets recents et retours acheteurs', 'es' => 'Proyectos recientes y perspectivas de compradores', 'ru' => 'Недавние проекты и инсайты закупщиков', 'ar' => 'احدث المشاريع ورؤى المشترين']) }}
        </h3>
      </div>
      <a class="btn-minimal text-sm font-medium text-yideli-dark pb-1"
         href="{{ route('news.index', ['lang' => $lang]) }}">{{ $t('home_b2b.case_view_all', ['en' => 'View All Case Studies', 'zh' => '查看全部案例', 'fr' => 'Voir toutes les etudes de cas', 'es' => 'Ver todos los casos', 'ru' => 'Смотреть все кейсы', 'ar' => 'عرض جميع دراسات الحالة']) }}</a>
    </div>

    <div
         class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto px-6 lg:px-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
      @forelse ($caseStudies as $entry)
        @php
          $cover = $entry['cover_image'] ? asset('storage/' . $entry['cover_image']) : asset('images/placeholder.jpg');
        @endphp
        <article class="bg-white border border-yideli-line overflow-hidden group">
          <a class="block aspect-[16/10] overflow-hidden"
             href="{{ route('news.show', ['lang' => $lang, 'slug' => $entry['slug']]) }}">
            <img class="w-full h-full object-cover group-hover:scale-105 transition duration-700"
                 src="{{ $cover }}"
                 alt="{{ $entry['title'] }}">
          </a>
          <div class="p-6">
            <h4 class="text-xl font-serif text-yideli-dark mb-3 line-clamp-2">
              <a href="{{ route('news.show', ['lang' => $lang, 'slug' => $entry['slug']]) }}">{{ $entry['title'] }}</a>
            </h4>
            <p class="text-sm text-gray-600 font-light leading-relaxed line-clamp-3">
              {{ \Illuminate\Support\Str::limit($entry['excerpt'] ?? '', 140) }}
            </p>
            <a class="inline-flex items-center mt-4 text-xs font-bold uppercase tracking-widest text-yideli-dark"
               href="{{ route('news.show', ['lang' => $lang, 'slug' => $entry['slug']]) }}">
              {{ __('news.read_more_btn') }}
              <span class="ms-2">→</span>
            </a>
          </div>
        </article>
      @empty
        <div class="md:col-span-3 bg-white border border-yideli-line p-8 text-center text-gray-500">
          {{ $t('home_b2b.case_empty', ['en' => 'Case studies will appear here after news content is published.', 'zh' => '发布新闻内容后，这里将展示客户案例。', 'fr' => 'Les etudes de cas apparaitront ici apres publication.', 'es' => 'Los casos de estudio apareceran aqui despues de publicar contenido.', 'ru' => 'Кейсы появятся здесь после публикации новостей.', 'ar' => 'ستظهر دراسات الحالة هنا بعد نشر محتوى الاخبار.']) }}
        </div>
      @endforelse
    </div>
  </section>

  <section id="home-faq"
           class="bg-yideli-base border-t border-yideli-line py-20">
    <div class="max-w-[1000px] min-[1921px]:max-w-[1000px] min-[2561px]:max-w-[1400px] mx-auto px-6 lg:px-12">
      <div class="text-center mb-14">
        <span class="text-xs font-bold tracking-[0.2em] uppercase text-yideli-dark mb-3 block">
          {{ $t('home_b2b.faq_kicker', ['en' => 'FAQ', 'zh' => '常见问题', 'fr' => 'FAQ', 'es' => 'FAQ', 'ru' => 'FAQ', 'ar' => 'الاسئلة الشائعة']) }}
        </span>
        <h2 class="text-3xl font-serif text-yideli-dark mb-4">
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
  </section>

  <section id="contact-us"
           class="scroll-mt-32 max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto px-6 lg:px-12 py-20">
    <div class="grid lg:grid-cols-12 gap-12 lg:gap-20 items-start">
      <div class="lg:col-span-5">
        <span class="text-xs font-bold tracking-[0.2em] uppercase text-yideli-dark mb-3 block">
          {{ $t('home_b2b.contact_kicker', ['en' => 'Contact Us', 'zh' => '联系我们', 'fr' => 'Contactez-nous', 'es' => 'Contactenos', 'ru' => 'Свяжитесь с нами', 'ar' => 'اتصل بنا']) }}
        </span>
        <h2 class="font-serif text-3xl text-yideli-dark mb-4">
          {{ $t('home_b2b.contact_title', ['en' => 'Start Your Notebook OEM/ODM Inquiry', 'zh' => '开启您的笔记本 OEM/ODM 询盘', 'fr' => 'Demarrez votre demande OEM/ODM de carnets', 'es' => 'Inicie su consulta OEM/ODM de cuadernos', 'ru' => 'Начните ваш OEM/ODM запрос по блокнотам', 'ar' => 'ابدأ استفسار OEM/ODM للدفاتر']) }}
        </h2>
        <p class="text-gray-600 font-light leading-relaxed">
          {{ $t('home_b2b.contact_desc', ['en' => 'Tell us your target market, spec request, and expected timeline. Our team will respond with a practical quote plan.', 'zh' => '请告知目标市场、规格需求和计划周期，我们将尽快提供可执行报价方案。', 'fr' => 'Indiquez votre marche cible, vos specifications et votre delai. Notre equipe repondra avec un devis realiste.', 'es' => 'Comparta su mercado objetivo, especificaciones y plazo esperado. Responderemos con una cotizacion practica.', 'ru' => 'Сообщите рынок, требования и сроки, и команда предложит практичный расчет.', 'ar' => 'اخبرنا بالسوق المستهدف والمواصفات والجدول الزمني وسنرد بخطة عرض سعر عملية.']) }}
        </p>
      </div>

      <div class="lg:col-span-7 bg-gray-50 p-8 lg:p-12 border border-gray-100 rounded-sm">
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
              <div class="w-full px-4 py-3 bg-white border border-yideli-line flex items-center justify-between gap-3">
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
                <button class="text-xs text-yideli-dark underline hover:text-yideli-hover cursor-pointer"
                        type="button"
                        :class="refreshing ? 'opacity-60 cursor-not-allowed' : 'cursor-pointer'"
                        @click.prevent="refreshCaptcha">
                  {{ $t('inquire.captcha_refresh', ['en' => 'Refresh', 'zh' => '看不清？换一张', 'fr' => 'Rafraichir', 'es' => 'Actualizar', 'ru' => 'Обновить', 'ar' => 'تحديث']) }}
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
  </section>
@endsection

@section('script')
  <script>
    function homeCarousel() {
      return {
        active: 0,
        interval: null,
        slides: @json($settings->home_carousel ?? []),
        fallbackSlideImage: @json(asset('images/about-us/Heritage-Commitment.png')),

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
