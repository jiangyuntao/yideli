@extends('index.layout')

@section('title', __('layout.nav_faq'))

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
  @endphp

  <div class="border-b border-yideli-line bg-yideli-base py-16 sm:py-20">
    <div class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto px-6 lg:px-12 text-center">
      <span class="text-xs font-bold tracking-[0.2em] uppercase text-yideli-dark mb-4 block">
        {{ $t('faq_page.kicker', ['en' => 'FAQ', 'zh' => '常见问题', 'fr' => 'FAQ', 'es' => 'FAQ', 'ru' => 'FAQ', 'ar' => 'الاسئلة الشائعة']) }}
      </span>
      <h1 class="mb-6 text-3xl font-serif text-yideli-dark sm:text-4xl lg:text-5xl">
        {{ $t('faq_page.title', ['en' => 'Frequently Asked Questions', 'zh' => '常见问题解答', 'fr' => 'Questions frequentes', 'es' => 'Preguntas frecuentes', 'ru' => 'Часто задаваемые вопросы', 'ar' => 'الاسئلة المتكررة']) }}
      </h1>
      <p class="mx-auto max-w-3xl text-base font-light text-gray-600 sm:text-lg">
        {{ $t('faq_page.subtitle', ['en' => 'Browse all FAQ items about OEM/ODM notebooks, production, delivery, and compliance.', 'zh' => '查看全部 FAQ，涵盖 OEM/ODM、生产、交付与合规信息。', 'fr' => 'Consultez toutes les FAQ sur OEM/ODM, la production, la livraison et la conformite.', 'es' => 'Consulte todas las FAQ sobre OEM/ODM, produccion, entrega y cumplimiento.', 'ru' => 'Просмотрите все FAQ по OEM/ODM, производству, поставке и соответствию требованиям.', 'ar' => 'استعرض جميع الاسئلة الشائعة حول OEM/ODM والانتاج والتسليم والامتثال.']) }}
      </p>
    </div>
  </div>

  <section class="bg-yideli-base py-16 sm:py-20">
    <div class="max-w-[1000px] min-[1921px]:max-w-[1200px] min-[2561px]:max-w-[1400px] mx-auto px-6 lg:px-12">
      <div class="space-y-4"
           x-data="{ active: 0, toggle(index) { this.active = this.active === index ? null : index } }">
        @forelse ($faqItems as $k => $faq)
          <div class="bg-white border border-yideli-line">
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
            {{ $t('faq_page.empty', ['en' => 'FAQ content can be managed in admin settings.', 'zh' => 'FAQ 内容可在后台设置中维护。', 'fr' => 'Le contenu FAQ peut etre gere dans les parametres admin.', 'es' => 'El contenido FAQ se puede gestionar en la configuracion de admin.', 'ru' => 'FAQ можно настроить в админ-панели.', 'ar' => 'يمكن ادارة محتوى FAQ من اعدادات الادمن.']) }}
          </div>
        @endforelse
      </div>
    </div>
  </section>
@endsection
