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
  $heroInquiryClass = $heroInquiryClass ?? 'bg-white p-6 shadow-2xl sm:p-8';
@endphp

<div id="{{ $heroInquiryId }}"
     class="{{ $heroInquiryClass }}">
  <h2 class="overflow-hidden text-ellipsis whitespace-nowrap text-[clamp(1.125rem,4.8vw,1.875rem)] font-black leading-tight tracking-tight text-yideli-dark">
    {{ $heroInquiryTitle }}
  </h2>

  @if ($errors->any() && old('form_variant') === 'hero')
    <div class="mt-4 rounded-sm border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
      {{ $errors->first() }}
    </div>
  @endif

  <form class="mt-6 space-y-4"
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

    <input class="w-full border border-yideli-line bg-white px-4 py-3 text-sm text-gray-900 outline-none transition placeholder:text-gray-400 focus:border-yideli-dark"
           type="text"
           id="{{ $heroInquiryId }}-name"
           name="name"
           value="{{ old('name') }}"
           placeholder="{{ $t('home_b2b.hero_form_name', ['en' => 'Your Name', 'zh' => '您的姓名', 'fr' => 'Votre nom', 'es' => 'Su nombre', 'ru' => 'Ваше имя', 'ar' => 'اسمك']) }}"
           required>

    <input class="w-full border border-yideli-line bg-white px-4 py-3 text-sm text-gray-900 outline-none transition placeholder:text-gray-400 focus:border-yideli-dark"
           type="email"
           id="{{ $heroInquiryId }}-email"
           name="email"
           value="{{ old('email') }}"
           placeholder="{{ $t('home_b2b.hero_form_email', ['en' => 'Business Email', 'zh' => '商务邮箱', 'fr' => 'Email professionnel', 'es' => 'Correo empresarial', 'ru' => '工作邮箱', 'ar' => 'البريد الإلكتروني للعمل']) }}"
           required>

    <input class="w-full border border-yideli-line bg-white px-4 py-3 text-sm text-gray-900 outline-none transition placeholder:text-gray-400 focus:border-yideli-dark"
           type="text"
           id="{{ $heroInquiryId }}-need"
           name="need"
           value="{{ old('need') }}"
           placeholder="{{ $t('home_b2b.hero_form_need', ['en' => 'Tell Us What You Need', 'zh' => '告诉我们您需要什么', 'fr' => 'Dites-nous ce dont vous avez besoin', 'es' => 'Diganos lo que necesita', 'ru' => 'Расскажите, что вам нужно', 'ar' => 'اخبرنا بما تحتاجه']) }}"
           required>

    <textarea class="min-h-[132px] w-full resize-none border border-yideli-line bg-white px-4 py-3 text-sm text-gray-900 outline-none transition placeholder:text-gray-400 focus:border-yideli-dark"
              id="{{ $heroInquiryId }}-message"
              name="message"
              placeholder="{{ $t('home_b2b.hero_form_requirement', ['en' => 'Your Custom Requirement (Qty, Material, Logo)', 'zh' => '您的定制需求（数量、材质、Logo）', 'fr' => 'Votre exigence personnalisee (quantite, matiere, logo)', 'es' => 'Su requerimiento personalizado (cantidad, material, logo)', 'ru' => 'Ваши требования (тираж, материал, логотип)', 'ar' => 'متطلباتك المخصصة (الكمية، الخامة، الشعار)']) }}"
              required>{{ old('message') }}</textarea>

    <button class="inline-flex w-full items-center justify-center bg-yideli-dark px-6 py-4 text-sm font-bold uppercase tracking-[0.08em] text-white transition hover:bg-yideli-hover"
            type="submit">
      {{ $t('home_b2b.hero_form_submit', ['en' => 'Send My Inquiry', 'zh' => '发送我的询盘', 'fr' => 'Envoyer ma demande', 'es' => 'Enviar mi consulta', 'ru' => 'Отправить запрос', 'ar' => 'أرسل استفساري']) }}
    </button>
  </form>
</div>
