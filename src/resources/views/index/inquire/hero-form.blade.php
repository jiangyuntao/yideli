@php
  $t = function (string $key, array $fallbacks) use ($lang) {
      $translated = __($key);

      if ($translated !== $key) {
          return $translated;
      }

      return $fallbacks[$lang] ?? $fallbacks['en'] ?? reset($fallbacks);
  };

  $heroInquiryId = $heroInquiryId ?? 'hero-inquiry';
  $heroInquiryTitle = $heroInquiryTitle ?? $t('home_b2b.hero_form_title', [
      'en' => 'Get A Quick Custom Quote',
      'zh' => '快速获取定制报价',
      'fr' => 'Obtenir un devis personnalise rapide',
      'es' => 'Obtener una cotizacion personalizada rapida',
      'ru' => 'Быстро получить индивидуальный расчет',
      'ar' => 'احصل على عرض سعر مخصص بسرعة',
  ]);
  $heroInquiryReturnTo = $heroInquiryReturnTo ?? (url()->current() . '#' . $heroInquiryId);
  $heroInquiryClass = $heroInquiryClass ?? 'border border-white/30 bg-white/82 p-5 shadow-2xl backdrop-blur-md sm:p-6';
@endphp

<div id="{{ $heroInquiryId }}"
     class="{{ $heroInquiryClass }}">
  <h2 class="max-w-full break-words text-[clamp(1.05rem,3.6vw,1.75rem)] font-black leading-tight tracking-tight text-yideli-dark">
    {{ $heroInquiryTitle }}
  </h2>

  @if ($errors->any() && old('form_variant') === 'hero')
    <div class="mt-3 rounded-sm border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
      {{ $errors->first() }}
    </div>
  @endif

  <form class="mt-4 space-y-3"
        action="{{ route('inquire.submit', ['lang' => $lang]) }}"
        method="POST">
    @csrf
    <input type="hidden"
           name="form_variant"
           value="hero">
    <input type="hidden"
           name="return_to"
           value="{{ $heroInquiryReturnTo }}">
    <input type="text"
           name="website"
           value=""
           tabindex="-1"
           autocomplete="off"
           class="hidden"
           aria-hidden="true">

    <input class="w-full border border-gray-300/90 bg-white/72 px-3.5 py-2.5 text-sm text-gray-900 shadow-[inset_0_0_0_1px_rgba(255,255,255,0.18)] outline-none transition placeholder:text-gray-500 focus:border-yideli-dark sm:px-4 sm:py-3"
           type="text"
           id="{{ $heroInquiryId }}-name"
           name="name"
           value="{{ old('name') }}"
           placeholder="{{ $t('home_b2b.hero_form_name', ['en' => 'Your Name', 'zh' => '您的姓名', 'fr' => 'Votre nom', 'es' => 'Su nombre', 'ru' => 'Ваше имя', 'ar' => 'اسمك']) }}"
           required>

    <input class="w-full border border-gray-300/90 bg-white/72 px-3.5 py-2.5 text-sm text-gray-900 shadow-[inset_0_0_0_1px_rgba(255,255,255,0.18)] outline-none transition placeholder:text-gray-500 focus:border-yideli-dark sm:px-4 sm:py-3"
           type="email"
           id="{{ $heroInquiryId }}-email"
           name="email"
           value="{{ old('email') }}"
           placeholder="{{ $t('home_b2b.hero_form_email', ['en' => 'Business Email', 'zh' => '商务邮箱', 'fr' => 'Email professionnel', 'es' => 'Correo empresarial', 'ru' => '工作邮箱', 'ar' => 'البريد الإلكتروني للعمل']) }}"
           required>

    <textarea class="min-h-[84px] w-full resize-none border border-gray-300/90 bg-white/72 px-3.5 py-2.5 text-sm text-gray-900 shadow-[inset_0_0_0_1px_rgba(255,255,255,0.18)] outline-none transition placeholder:text-gray-500 focus:border-yideli-dark sm:min-h-[96px] sm:px-4 sm:py-3"
              id="{{ $heroInquiryId }}-message"
              name="message"
              placeholder="{{ $t('home_b2b.hero_form_requirement', ['en' => 'Your Requirements', 'zh' => '您的需求说明', 'fr' => 'Vos exigences', 'es' => 'Sus requisitos', 'ru' => 'Ваши требования', 'ar' => 'متطلباتك']) }}"
              required>{{ old('message') }}</textarea>

    <button class="inline-flex w-full items-center justify-center bg-yideli-dark px-6 py-2.5 text-sm font-bold uppercase tracking-[0.08em] text-white transition hover:bg-yideli-hover sm:py-3"
            type="submit">
      {{ $t('home_b2b.hero_form_submit', ['en' => 'Send My Inquiry', 'zh' => '发送我的询盘', 'fr' => 'Envoyer ma demande', 'es' => 'Enviar mi consulta', 'ru' => 'Отправить запрос', 'ar' => 'أرسل استفساري']) }}
    </button>
  </form>
</div>
