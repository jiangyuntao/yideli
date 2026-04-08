@extends('index.layout')

@section('title', __('inquire.header_title'))

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

  <div class="bg-yideli-base py-20 border-b border-yideli-line">
    <div class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto px-6 lg:px-12 text-center">
      <span class="text-xs font-bold tracking-[0.2em] uppercase text-yideli-dark mb-4 block">{!! nl2br(__('inquire.header_subtitle')) !!}</span>
      <h1 class="text-4xl lg:text-5xl font-serif text-yideli-dark mb-6">{!! nl2br(__('inquire.header_title')) !!}</h1>
      <p class="text-gray-600 max-w-2xl mx-auto font-light text-lg">
        {!! nl2br(__('inquire.header_desc')) !!}
      </p>
    </div>
  </div>

  <section class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto px-6 lg:px-12 py-20">
    <div class="grid lg:grid-cols-12 gap-16 lg:gap-24">

      <div class="lg:col-span-5 space-y-12">

        <div>
          <h3 class="font-serif text-2xl text-yideli-dark mb-6">{!! nl2br(__('inquire.contact_headquarters')) !!}</h3>
          <div class="space-y-6 text-gray-600 font-light">
            <div class="flex gap-4">

              <div class="w-6 h-6 flex-shrink-0 text-yideli-dark">

                <svg class="lucide lucide-map-pin-house-icon lucide-map-pin-house" xmlns="http://www.w3.org/2000/svg"
                  width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                  stroke-linecap="round" stroke-linejoin="round">
                  <path
                    d="M15 22a1 1 0 0 1-1-1v-4a1 1 0 0 1 .445-.832l3-2a1 1 0 0 1 1.11 0l3 2A1 1 0 0 1 22 17 v4a1 1 0 0 1-1 1z" />

                  <path d="M18 10a8 8 0 0 0-16 0c0 4.993 5.539 10.193 7.399 11.799a1 1 0 0 0 .601.2" />

                  <path d="M18 22v-3" />
                  <circle cx="10" cy="10" r="3" />
                </svg>
              </div>
              <p>{!! nl2br($settings->contact_address[$lang]) !!}</p>
            </div>
            <div class="flex gap-4">
              <div class="w-6 h-6 flex-shrink-0 text-yideli-dark">

                <svg class="lucide lucide-phone-icon lucide-phone" xmlns="http://www.w3.org/2000/svg" width="16"
                  height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                  stroke-linecap="round" stroke-linejoin="round">
                  <path
                    d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384" />
                </svg>

              </div>
              <div>
                <p>{{ $settings->contact_tel }}</p>
              </div>
            </div>

            <div class="flex gap-4">
              <div class="w-6 h-6 flex-shrink-0 text-yideli-dark">

                <svg class="lucide lucide-smartphone-icon lucide-smartphone" xmlns="http://www.w3.org/2000/svg"
                  width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                  stroke-linecap="round" stroke-linejoin="round">

                  <rect width="14" height="20" x="5" y="2" rx="2" ry="2" />
                  <path d="M12 18h.01" />

                </svg>
              </div>
              <p>{{ $settings->contact_phone }}</p>
            </div>
            <div class="flex gap-4">
              <div class="w-6 h-6 flex-shrink-0 text-yideli-dark">
                <svg class="lucide lucide-mail-icon lucide-mail" xmlns="http://www.w3.org/2000/svg" width="16"
                  height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                  stroke-linecap="round" stroke-linejoin="round">
                  <path d="m22 7-8.991 5.727a2 2 0 0 1-2.009 0L2 7" />

                  <rect x="2" y="4" width="20" height="16" rx="2" />
                </svg>

              </div>
              <p>{{ $settings->contact_email }}</p>
            </div>
          </div>
        </div>

        <div class="aspect-video bg-gray-100 relative overflow-hidden group">

          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d111099.99120610344!2d121.3533866679545!3d28.66567154945785!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x344f6f8745555555%3A0x1234567890abcdef!2sTaizhou%2C%20Zhejiang%2C%20China!5e0!3m2!1sen!2sus!4v1600000000000!5m2!1sen!2sus"
            style="border:0; filter: grayscale(1) contrast(1.2) opacity(0.8);" a me width="100%" height="100%"
            allowfullscreen="" loading="lazy">
          </iframe>
          <a class="absolute inset-0 flex items-center justify-center bg-yideli-dark/0 group-hover:bg-yideli-dark/10 transition"
            href="{{ $settings->google_map_link ?? '#' }}" target="_blank">
            <span
              class="bg-white text-yideli-dark px-4 py-2 text-xs font-bold uppercase tracking-widest shadow-lg opacity-0 group-hover:opacity-100 transition transform translate-y-2 group-hover:translate-y-0">
              {!! nl2br(__('inquire.map_view_google')) !!}
            </span>
          </a>
        </div>

        <div>

          <h4 class="font-serif text-lg text-yideli-dark mb-4">{!! nl2br(__('inquire.follow_us')) !!}</h4>
          <div class="flex gap-4">
            <a class="w-10 h-10 border border-gray-200 flex items-center justify-center text-gray-500 hover:bg-yideli-dark hover:text-white hover:border-yideli-dark transition rounded-full"
              href="https://linkedin.com/in/{{ $settings->contact_linkedin }}" target="_blank" rel="noopener noreferrer">
              <span class="sr-only">LinkedIn</span>
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">

                <path
                  d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
              </svg>
            </a>

            <a class="w-10 h-10 border border-gray-200 flex items-center justify-center text-gray-500 hover:bg-yideli-dark hover:text-white hover:border-yideli-dark transition rounded-full"
              href="https://wa.me/{{ $settings->contact_whatsapp }}" target="_blank" rel="noopener noreferrer">
              <span class="sr-only">WhatsApp</span>

              <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22" fill="currentColor">
                <path
                  d="M7.25361 18.4944L7.97834 18.917C9.18909 19.623 10.5651 20 12.001 20C16.4193 20 20.001 16.4183 20.001 12C20.001 7.58172 16.4193 4 12.001 4C7.5827 4 4.00098 7.58172 4.00098 12C4.00098 13.4363 4.37821 14.8128 5.08466 16.0238L5.50704 16.7478L4.85355 19.1494L7.25361 18.4944ZM2.00516 22L3.35712 17.0315C2.49494 15.5536 2.00098 13.8345 2.00098 12C2.00098 6.47715 6.47813 2 12.001 2C17.5238 2 22.001 6.47715 22.001 12C22.001 17.5228 17.5238 22 12.001 22C10.1671 22 8.44851 21.5064 6.97086 20.6447L2.00516 22ZM8.39232 7.30833C8.5262 7.29892 8.66053 7.29748 8.79459 7.30402C8.84875 7.30758 8.90265 7.31384 8.95659 7.32007C9.11585 7.33846 9.29098 7.43545 9.34986 7.56894C9.64818 8.24536 9.93764 8.92565 10.2182 9.60963C10.2801 9.76062 10.2428 9.95633 10.125 10.1457C10.0652 10.2428 9.97128 10.379 9.86248 10.5183C9.74939 10.663 9.50599 10.9291 9.50599 10.9291C9.50599 10.9291 9.40738 11.0473 9.44455 11.1944C9.45903 11.25 9.50521 11.331 9.54708 11.3991C9.57027 11.4368 9.5918 11.4705 9.60577 11.4938C9.86169 11.9211 10.2057 12.3543 10.6259 12.7616C10.7463 12.8783 10.8631 12.9974 10.9887 13.108C11.457 13.5209 11.9868 13.8583 12.559 14.1082L12.5641 14.1105C12.6486 14.1469 12.692 14.1668 12.8157 14.2193C12.8781 14.2457 12.9419 14.2685 13.0074 14.2858C13.0311 14.292 13.0554 14.2955 13.0798 14.2972C13.2415 14.3069 13.335 14.2032 13.3749 14.1555C14.0984 13.279 14.1646 13.2218 14.1696 13.2222V13.2238C14.2647 13.1236 14.4142 13.0888 14.5476 13.097C14.6085 13.1007 14.6691 13.1124 14.7245 13.1377C15.2563 13.3803 16.1258 13.7587 16.1258 13.7587L16.7073 14.0201C16.8047 14.0671 16.8936 14.1778 16.8979 14.2854C16.9005 14.3523 16.9077 14.4603 16.8838 14.6579C16.8525 14.9166 16.7738 15.2281 16.6956 15.3913C16.6406 15.5058 16.5694 15.6074 16.4866 15.6934C16.3743 15.81 16.2909 15.8808 16.1559 15.9814C16.0737 16.0426 16.0311 16.0714 16.0311 16.0714C15.8922 16.159 15.8139 16.2028 15.6484 16.2909C15.391 16.428 15.1066 16.5068 14.8153 16.5218C14.6296 16.5313 14.4444 16.5447 14.2589 16.5347C14.2507 16.5342 13.6907 16.4482 13.6907 16.4482C12.2688 16.0742 10.9538 15.3736 9.85034 14.402C9.62473 14.2034 9.4155 13.9885 9.20194 13.7759C8.31288 12.8908 7.63982 11.9364 7.23169 11.0336C7.03043 10.5884 6.90299 10.1116 6.90098 9.62098C6.89729 9.01405 7.09599 8.4232 7.46569 7.94186C7.53857 7.84697 7.60774 7.74855 7.72709 7.63586C7.85348 7.51651 7.93392 7.45244 8.02057 7.40811C8.13607 7.34902 8.26293 7.31742 8.39232 7.30833Z">
                </path>
              </svg>
            </a>

          </div>
        </div>
      </div>

      <div class="lg:col-span-7 bg-gray-50 p-8 lg:p-12 border border-gray-100 rounded-sm">
        <h3 class="font-serif text-2xl text-yideli-dark mb-2">{!! nl2br(__('inquire.form_title')) !!}</h3>
        <p class="text-gray-500 font-light mb-8 text-sm">{!! nl2br(__('inquire.form_hint')) !!}</p>
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
        <form class="space-y-8" action="{{ route('inquire.submit', ['lang' => $lang]) }}" method="POST">

          @csrf

          <div class="grid md:grid-cols-2 gap-8">
            <div class="relative">
              <input
                class="input-field peer block w-full px-0 py-2 bg-transparent border-b border-gray-300 focus:outline-none focus:border-yideli-dark transition text-gray-900 placeholder-transparent"
                id="name" name="name" type="text" value="{{ old('name') }}" placeholder=" " required>
              <label
                class="absolute start-0 top-2 text-gray-400 text-sm transition-all duration-300 origin-left cursor-text
                            peer-placeholder-shown:top-2
                            peer-focus:-top-4 peer-focus:text-xs peer-focus:text-yideli-dark
                            peer-[:not(:placeholder-shown)]:-top-4 peer-[:not(:placeholder-shown)]:text-xs peer-[:not(:placeholder-shown)]:text-yideli-dark"
                for="name">{!! nl2br(__('inquire.label_name')) !!} *</label>
            </div>

            <div class="relative">
              <input
                class="input-field peer block w-full px-0 py-2 bg-transparent border-b border-gray-300 focus:outline-none focus:border-yideli-dark transition text-gray-900 placeholder-transparent"
                id="company" name="company" type="text" value="{{ old('company') }}" placeholder=" ">
              <label
                class="absolute start-0 top-2 text-gray-400 text-sm transition-all duration-300 origin-left cursor-text
                            peer-placeholder-shown:top-2
                            peer-focus:-top-4 peer-focus:text-xs peer-focus:text-yideli-dark
                            peer-[:not(:placeholder-shown)]:-top-4 peer-[:not(:placeholder-shown)]:text-xs peer-[:not(:placeholder-shown)]:text-yideli-dark"
                for="company">{!! nl2br(__('inquire.label_company')) !!}</label>
            </div>
          </div>

          <div class="grid md:grid-cols-2 gap-8">
            <div class="relative">
              <input
                class="input-field peer block w-full px-0 py-2 bg-transparent border-b border-gray-300 focus:outline-none focus:border-yideli-dark transition text-gray-900 placeholder-transparent"
                id="email" name="email" type="email" value="{{ old('email') }}" placeholder=" " required>
              <label
                class="absolute start-0 top-2 text-gray-400 text-sm transition-all duration-300 origin-left cursor-text
                            peer-placeholder-shown:top-2
                            peer-focus:-top-4 peer-focus:text-xs peer-focus:text-yideli-dark
                            peer-[:not(:placeholder-shown)]:-top-4 peer-[:not(:placeholder-shown)]:text-xs peer-[:not(:placeholder-shown)]:text-yideli-dark"
                for="email">{!! nl2br(__('inquire.label_email')) !!} *</label>
            </div>

            <div class="relative">
              <input
                class="input-field peer block w-full px-0 py-2 bg-transparent border-b border-gray-300 focus:outline-none focus:border-yideli-dark transition text-gray-900 placeholder-transparent"
                id="phone" name="phone" type="tel" value="{{ old('phone') }}" placeholder=" ">
              <label
                class="absolute start-0 top-2 text-gray-400 text-sm transition-all duration-300 origin-left cursor-text
                            peer-placeholder-shown:top-2
                            peer-focus:-top-4 peer-focus:text-xs peer-focus:text-yideli-dark
                            peer-[:not(:placeholder-shown)]:-top-4 peer-[:not(:placeholder-shown)]:text-xs peer-[:not(:placeholder-shown)]:text-yideli-dark"
                for="phone">{!! nl2br(__('inquire.label_phone')) !!}</label>
            </div>
          </div>

          <div>
            <label class="block text-sm text-gray-400 mb-3">{!! nl2br(__('inquire.label_interest')) !!}</label>
            <div class="flex flex-wrap gap-4">
              <label class="inline-flex items-center cursor-pointer">
                <input class="w-4 h-4 text-yideli-dark border-gray-300 rounded focus:ring-yideli-dark" name="interest[]"
                  type="checkbox" value="oem">
                <span class="ms-2 text-sm text-gray-600">{!! nl2br(__('inquire.option_oem')) !!}</span>
              </label>

              <label class="inline-flex items-center cursor-pointer">
                <input class="w-4 h-4 text-yideli-dark border-gray-300 rounded focus:ring-yideli-dark" name="interest[]"
                  type="checkbox" value="odm">
                <span class="ms-2 text-sm text-gray-600">{!! nl2br(__('inquire.option_odm')) !!}</span>
              </label>

              <label class="inline-flex items-center cursor-pointer">
                <input class="w-4 h-4 text-yideli-dark border-gray-300 rounded focus:ring-yideli-dark" name="interest[]"
                  type="checkbox" value="notebook">
                <span class="ms-2 text-sm text-gray-600">{!! nl2br(__('inquire.option_notebook')) !!}</span>
              </label>

              <label class="inline-flex items-center cursor-pointer">
                <input class="w-4 h-4 text-yideli-dark border-gray-300 rounded focus:ring-yideli-dark" name="interest[]"
                  type="checkbox" value="diary">
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
                class="input-field peer block w-full px-0 py-2 bg-transparent border-b border-gray-300 focus:outline-none focus:border-yideli-dark transition text-gray-900 placeholder-transparent"
                id="captcha_answer" name="captcha_answer" type="text" value="{{ old('captcha_answer') }}" placeholder=" "
                required>
              <label
                class="absolute start-0 top-2 text-gray-400 text-sm transition-all duration-300 origin-left cursor-text
                            peer-placeholder-shown:top-2
                            peer-focus:-top-4 peer-focus:text-xs peer-focus:text-yideli-dark
                            peer-[:not(:placeholder-shown)]:-top-4 peer-[:not(:placeholder-shown)]:text-xs peer-[:not(:placeholder-shown)]:text-yideli-dark"
                for="captcha_answer">{{ $t('inquire.captcha_input_label', ['en' => 'Enter Captcha', 'zh' => '请输入验证码', 'fr' => 'Saisissez le code', 'es' => 'Ingrese el codigo', 'ru' => 'Введите код', 'ar' => 'ادخل الرمز']) }} *</label>
              @error('captcha_answer')
                <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
              @enderror
            </div>
          </div>

          <div class="relative mt-8">
            <textarea
              class="input-field peer block w-full px-0 py-2 bg-transparent border-b border-gray-300 focus:outline-none focus:border-yideli-dark transition text-gray-900 placeholder-transparent resize-none"
              id="message" name="message" rows="4" placeholder=" " required>{{ old('message') }}</textarea>
            <label
              class="absolute start-0 top-2 text-gray-400 text-sm transition-all duration-300 origin-left cursor-text
                          peer-placeholder-shown:top-2
                          peer-focus:-top-4 peer-focus:text-xs peer-focus:text-yideli-dark
                          peer-[:not(:placeholder-shown)]:-top-4 peer-[:not(:placeholder-shown)]:text-xs peer-[:not(:placeholder-shown)]:text-yideli-dark"
              for="message">{!! nl2br(__('inquire.label_message')) !!} *</label>
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
