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

    $caseCoverGallery = [
        asset('images/notebook-1.jpg'),
        asset('images/notebook-2.jpg'),
        asset('images/notebook-3.jpg'),
        asset('images/notebook-4.jpg'),
    ];
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
          <img class="w-full h-full object-cover scale-110 blur-[3px] md:blur-[2px]"
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
            {{ $t('home_b2b.hero_title', ['en' => '35+ Years Diary & Notebook OEM Factory for Worldwide Market', 'zh' => '35年以上日记本与笔记本 OEM 工厂，服务全球市场', 'fr' => 'Usine OEM de journaux et carnets avec plus de 35 ans pour le marche mondial', 'es' => 'Fabrica OEM de diarios y cuadernos con mas de 35 anos para el mercado global', 'ru' => 'OEM фабрика ежедневников и блокнотов с опытом 35+ лет для мирового рынка', 'ar' => 'مصنع OEM للمفكرات والدفاتر بخبرة 35+ سنة للسوق العالمي']) }}
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

  <section class="py-14 bg-yideli-base border-t border-yideli-line/70">
    <div
         class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto px-6 lg:px-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
      <article class="bg-white border border-yideli-line p-6 text-center">
        <p class="text-4xl font-bold text-yideli-dark">35+</p>
        <h3 class="mt-2 text-sm uppercase tracking-[0.18em] text-yideli-dark">
          {{ $t('home_b2b.metric_card_1_title', ['en' => 'Years in the Industry', 'zh' => '行业经验', 'fr' => 'Annees dans l industrie', 'es' => 'Anos en la industria', 'ru' => 'Лет в отрасли', 'ar' => 'سنوات في القطاع']) }}
        </h3>
        <p class="mt-3 text-xs text-gray-600 leading-relaxed">
          {{ $t('home_b2b.metric_card_1_desc', ['en' => 'Since 1989', 'zh' => '自 1989 年起', 'fr' => 'Depuis 1989', 'es' => 'Desde 1989', 'ru' => 'С 1989 года', 'ar' => 'منذ عام 1989']) }}
        </p>
      </article>

      <article class="bg-white border border-yideli-line p-6 text-center">
        <p class="text-4xl font-bold text-yideli-dark">35000+ ㎡</p>
        <h3 class="mt-2 text-sm uppercase tracking-[0.18em] text-yideli-dark">
          {{ $t('home_b2b.metric_card_2_title', ['en' => 'Modern Production Base', 'zh' => '现代化生产基地', 'fr' => 'Base de production moderne', 'es' => 'Base de produccion moderna', 'ru' => 'Современная производственная база', 'ar' => 'قاعدة انتاج حديثة']) }}
        </h3>
        <p class="mt-3 text-xs text-gray-600 leading-relaxed">
          {{ $t('home_b2b.metric_card_2_desc', ['en' => 'In Taizhou, China', 'zh' => '位于中国台州', 'fr' => 'A Taizhou, Chine', 'es' => 'En Taizhou, China', 'ru' => 'В Тайчжоу, Китай', 'ar' => 'في تايتشو، الصين']) }}
        </p>
      </article>

      <article class="bg-white border border-yideli-line p-6 text-center">
        <p class="text-4xl font-bold text-yideli-dark">20+</p>
        <h3 class="mt-2 text-sm uppercase tracking-[0.18em] text-yideli-dark">
          {{ $t('home_b2b.metric_card_3_title', ['en' => 'Professional Designers', 'zh' => '专业设计师', 'fr' => 'Designers professionnels', 'es' => 'Disenadores profesionales', 'ru' => 'Профессиональные дизайнеры', 'ar' => 'مصممون محترفون']) }}
        </h3>
        <p class="mt-3 text-xs text-gray-600 leading-relaxed">
          {{ $t('home_b2b.metric_card_3_desc', ['en' => 'In Hangzhou R&D Center', 'zh' => '位于杭州研发中心', 'fr' => 'Au centre R&D de Hangzhou', 'es' => 'En el centro de I+D de Hangzhou', 'ru' => 'В R&D центре Ханчжоу', 'ar' => 'في مركز البحث والتطوير في هانغتشو']) }}
        </p>
      </article>

      <article class="bg-white border border-yideli-line p-6 text-center">
        <p class="text-4xl font-bold text-yideli-dark">30+</p>
        <h3 class="mt-2 text-sm uppercase tracking-[0.18em] text-yideli-dark">
          {{ $t('home_b2b.metric_card_4_title', ['en' => 'Export Countries', 'zh' => '出口国家', 'fr' => 'Pays d exportation', 'es' => 'Paises de exportacion', 'ru' => 'Стран экспорта', 'ar' => 'دول التصدير']) }}
        </h3>
        <p class="mt-3 text-xs text-gray-600 leading-relaxed">
          {{ $t('home_b2b.metric_card_4_desc', ['en' => 'Global Distribution Network', 'zh' => '全球分销网络', 'fr' => 'Reseau mondial de distribution', 'es' => 'Red global de distribucion', 'ru' => 'Глобальная сеть дистрибуции', 'ar' => 'شبكة توزيع عالمية']) }}
        </p>
      </article>
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

  <section class="px-6 lg:px-12 bg-[#fcfcef] border-t border-yideli-line/70 py-16">
    <div class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto">
      <div class="text-center mb-10">
        <span class="text-xs font-bold tracking-[0.2em] uppercase text-yideli-dark mb-3 block">
          {{ $t('home_b2b.compliance_kicker', ['en' => 'Compliance & Certifications', 'zh' => '合规与资质', 'fr' => 'Conformite et certifications', 'es' => 'Cumplimiento y certificaciones', 'ru' => 'Соответствие и сертификация', 'ar' => 'الامتثال والشهادات']) }}
        </span>
        <h3 class="font-serif text-3xl text-yideli-dark">
          {{ $t('home_b2b.compliance_title', ['en' => 'REACH, FSC and Customs-Cleared Documentation Support', 'zh' => 'REACH、FSC 与清关合规文件支持', 'fr' => 'REACH, FSC et support documentaire douanier', 'es' => 'REACH, FSC y soporte documental para aduanas', 'ru' => 'REACH, FSC и поддержка таможенных документов', 'ar' => 'REACH وFSC ودعم مستندات التخليص الجمركي']) }}
        </h3>
      </div>

      <div>
        <article class="w-full p-6 text-center">
          <img class="w-full h-auto object-contain"
               src="{{ asset('images/cert-1-big-0-1.webp') }}"
               alt="{{ $t('home_b2b.compliance_image_alt', ['en' => 'Compliance and certifications overview', 'zh' => '合规与资质总览', 'fr' => 'Vue d ensemble conformite et certifications', 'es' => 'Resumen de cumplimiento y certificaciones', 'ru' => 'Обзор соответствия и сертификаций', 'ar' => 'نظرة عامة على الامتثال والشهادات']) }}">
        </article>
      </div>

      @php
        $complianceItems = [
            [
                'title' => $t('home_b2b.compliance_item_1_title', ['en' => 'FSC Material Support', 'zh' => 'FSC 纸材支持', 'fr' => 'Support FSC', 'es' => 'Soporte FSC', 'ru' => 'Поддержка FSC', 'ar' => 'دعم FSC']),
                'desc' => $t('home_b2b.compliance_item_1_desc', ['en' => 'Certified paper options for sustainable notebook programs.', 'zh' => '支持可持续笔记本项目的 FSC 认证纸张方案。', 'fr' => 'Options papier certifie pour des programmes durables.', 'es' => 'Opciones de papel certificado para programas sostenibles.', 'ru' => 'Сертифицированная бумага для устойчивых программ.', 'ar' => 'خيارات ورق معتمد لبرامج دفاتر مستدامة.']),
            ],
            [
                'title' => $t('home_b2b.compliance_item_2_title', ['en' => 'BSCI Audit Readiness', 'zh' => 'BSCI 审核支持', 'fr' => 'Preparation BSCI', 'es' => 'Preparacion BSCI', 'ru' => 'Подготовка к BSCI', 'ar' => 'جاهزية BSCI']),
                'desc' => $t('home_b2b.compliance_item_2_desc', ['en' => 'Factory social compliance records prepared for buyer review.', 'zh' => '工厂社会责任合规资料可供采购方审核。', 'fr' => 'Documents de conformite sociale prets pour audit client.', 'es' => 'Registros de cumplimiento social listos para revision.', 'ru' => 'Социальная комплаенс-документация подготовлена для проверки.', 'ar' => 'سجلات الامتثال الاجتماعي جاهزة لمراجعة المشترين.']),
            ],
            [
                'title' => $t('home_b2b.compliance_item_3_title', ['en' => 'Material Safety Files', 'zh' => '材料安全文件', 'fr' => 'Dossiers de securite matiere', 'es' => 'Archivos de seguridad de materiales', 'ru' => 'Документы по безопасности материалов', 'ar' => 'ملفات سلامة المواد']),
                'desc' => $t('home_b2b.compliance_item_3_desc', ['en' => 'Core compliance files can be matched to your target market.', 'zh' => '核心合规文件可按目标市场要求匹配准备。', 'fr' => 'Les dossiers essentiels sont adaptes a votre marche cible.', 'es' => 'Los archivos clave se adaptan a su mercado objetivo.', 'ru' => 'Основные документы подготавливаются под ваш рынок.', 'ar' => 'يمكن تجهيز ملفات الامتثال الاساسية حسب السوق المستهدف.']),
            ],
            [
                'title' => $t('home_b2b.compliance_item_4_title', ['en' => 'Supplier Qualification', 'zh' => '供应商资质程序', 'fr' => 'Qualification fournisseur', 'es' => 'Cualificacion de proveedor', 'ru' => 'Квалификация поставщика', 'ar' => 'تأهيل المورد']),
                'desc' => $t('home_b2b.compliance_item_4_desc', ['en' => 'Structured qualification flow supports stable long-term cooperation.', 'zh' => '通过标准化资质流程支持长期稳定合作。', 'fr' => 'Flux de qualification structure pour cooperation durable.', 'es' => 'Proceso estructurado para cooperacion estable a largo plazo.', 'ru' => 'Структурированный процесс для стабильного долгосрочного сотрудничества.', 'ar' => 'مسار تأهيل منظم يدعم التعاون المستقر طويل المدى.']),
            ],
            [
                'title' => $t('home_b2b.compliance_item_5_title', ['en' => 'Export Document Pack', 'zh' => '出口文件包', 'fr' => 'Pack documents export', 'es' => 'Paquete documental de exportacion', 'ru' => 'Пакет экспортных документов', 'ar' => 'حزمة مستندات التصدير']),
                'desc' => $t('home_b2b.compliance_item_5_desc', ['en' => 'Shipment paperwork can be assembled for routine customs clearance.', 'zh' => '可按出货需求整理常规清关所需文件。', 'fr' => 'Documents d expedition prepares pour le dedouanement courant.', 'es' => 'Documentacion preparada para despacho aduanero habitual.', 'ru' => 'Комплект документов собирается для стандартного таможенного оформления.', 'ar' => 'يمكن تجهيز مستندات الشحن للتخليص الجمركي المعتاد.']),
            ],
            [
                'title' => $t('home_b2b.compliance_item_6_title', ['en' => 'REACH Support', 'zh' => 'REACH 支持', 'fr' => 'Support REACH', 'es' => 'Soporte REACH', 'ru' => 'Поддержка REACH', 'ar' => 'دعم REACH']),
                'desc' => $t('home_b2b.compliance_item_6_desc', ['en' => 'EU-facing projects can be supported with REACH-related material files.', 'zh' => '面向欧盟市场的项目可配套 REACH 相关材料文件。', 'fr' => 'Les projets UE peuvent etre soutenus avec des dossiers REACH.', 'es' => 'Los proyectos para la UE pueden contar con archivos REACH.', 'ru' => 'Проекты для ЕС поддерживаются материалами по REACH.', 'ar' => 'يمكن دعم مشاريع الاتحاد الاوروبي بملفات مواد مرتبطة بـ REACH.']),
            ],
            [
                'title' => $t('home_b2b.compliance_item_7_title', ['en' => 'Inspection Records', 'zh' => '检验记录支持', 'fr' => 'Support dossiers d inspection', 'es' => 'Soporte de registros de inspeccion', 'ru' => 'Поддержка инспекционных записей', 'ar' => 'دعم سجلات الفحص']),
                'desc' => $t('home_b2b.compliance_item_7_desc', ['en' => 'Key QC and inspection records can be shared for order review.', 'zh' => '关键质检与验货记录可配合订单审核提供。', 'fr' => 'Les principaux dossiers QC peuvent etre partages pour revue.', 'es' => 'Los registros clave de QC pueden compartirse para revision.', 'ru' => 'Ключевые QC и инспекционные записи доступны для проверки заказа.', 'ar' => 'يمكن مشاركة سجلات الجودة والفحص الرئيسية لمراجعة الطلب.']),
            ],
            [
                'title' => $t('home_b2b.compliance_item_8_title', ['en' => 'Customs Risk Control', 'zh' => '清关风险控制', 'fr' => 'Controle du risque douanier', 'es' => 'Control de riesgo aduanero', 'ru' => 'Контроль таможенных рисков', 'ar' => 'التحكم في مخاطر الجمارك']),
                'desc' => $t('home_b2b.compliance_item_8_desc', ['en' => 'Document preparation helps reduce clearance delays and customs risk.', 'zh' => '通过完整文件准备，降低清关延误与海关风险。', 'fr' => 'La preparation documentaire reduit retards et risques douaniers.', 'es' => 'La preparacion documental reduce retrasos y riesgos aduaneros.', 'ru' => 'Подготовка документов снижает задержки и таможенные риски.', 'ar' => 'يساعد تجهيز المستندات على تقليل التأخير ومخاطر الجمارك.']),
            ],
        ];
      @endphp

      <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6 px-6">
        @foreach ($complianceItems as $item)
          <div class="text-center">
            <h4 class="text-sm uppercase tracking-[0.16em] text-yideli-dark">{{ $item['title'] }}</h4>
            <p class="mt-2 text-xs text-gray-600 leading-relaxed">{{ $item['desc'] }}</p>
          </div>
        @endforeach
      </div>

      <div class="mt-8 bg-yideli-dark px-6 py-4 text-center text-sm uppercase tracking-wide text-yideli-base">
        {{ $t('home_b2b.compliance_promise', ['en' => 'Customs-compliant files available for shipment clearance with a zero customs-risk commitment.', 'zh' => '可提供清关合规文件，支持零海关风险承诺。', 'fr' => 'Des dossiers conformes sont disponibles pour le dedouanement avec un engagement de risque douanier zero.', 'es' => 'Archivos conformes disponibles para despacho con compromiso de riesgo aduanero cero.', 'ru' => 'Предоставляем комплект документов для оформления с обязательством нулевого таможенного риска.', 'ar' => 'ملفات امتثال متاحة للتخليص مع التزام بمخاطر جمركية صفرية.']) }}
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
          $cover = $caseCoverGallery[$loop->index % max(count($caseCoverGallery), 1)] ?? asset('images/notebook-1.jpg');
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
