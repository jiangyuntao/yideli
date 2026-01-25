<!DOCTYPE html>
<html lang="{{ $lang }}"
      dir="{{ $dir }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Yideli Stationery - Premium Manufacturer')</title>
  <meta name="description"
        content="Professional Stationery Manufacturer & Exporter. Source factory for OEM/ODM services.">
  <meta name="csrf-token"
        content="{{ csrf_token() }}">
  <link rel="icon"
        type="image/x-icon"
        href="/favicon.ico">

  <script src="https://cdn.tailwindcss.com"></script>

  <script defer
          src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

  <link href="https://fonts.googleapis.com"
        rel="preconnect">
  <link href="https://fonts.gstatic.com"
        rel="preconnect"
        crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">

  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            yideli: {
              base: '#ECF2E8',
              dark: '#006B5F',
              text: '#1C3330',
              hover: '#005248',
              line: '#D1DBD0',
            }
          },
          fontFamily: {
            sans: [
              "Lato", 'Inter',
              'Cairo',
              'Noto Sans SC',
              'Helvetica Neue',
              'Helvetica',
              'Arial',
              'sans-serif',
            ],
            serif: [
              "Lato",
              'Times New Roman',
              'serif'
            ],
          },
          spacing: {
            '128': '32rem',
          }
        }
      }
    }
  </script>

  <style>
    @layer base {
      html {
        font-family: 'Inter', 'Cairo', 'Noto Sans SC', sans-serif;
      }

      html[lang^="zh"] {
        font-family: 'Inter', 'Noto Sans SC', sans-serif;
        letter-spacing: 0.02em;
      }

      html[lang="ar"] {
        font-family: 'Cairo', 'Inter', sans-serif;
        font-size: 110%;
      }

      html[lang="ru"] {
        font-family: 'Inter', sans-serif;
      }
    }

    [x-cloak] {
      display: none !important;
    }

    .no-scrollbar::-webkit-scrollbar {
      display: none;
    }

    .no-scrollbar {
      -ms-overflow-style: none;
      scrollbar-width: none;
    }

    .btn-minimal {
      position: relative;
      transition: all 0.3s ease;
    }

    .btn-minimal::after {
      content: '';
      position: absolute;
      bottom: -2px;
      left: 0;
      width: 100%;
      height: 1px;
      background-color: currentColor;
      transform: scaleX(0);
      transform-origin: right;
      transition: transform 0.3s ease;
    }

    .btn-minimal:hover::after {
      transform: scaleX(1);
      transform-origin: left;
    }
  </style>

  @unless (app()->environment('local'))
    <style>
      body {
        -webkit-user-select: none;
        /* Safari */
        -moz-user-select: none;
        /* Firefox */
        -ms-user-select: none;
        /* IE10+/Edge */
        user-select: none;
        /* Standard */
      }

      input,
      textarea {
        -webkit-user-select: text;
        -moz-user-select: text;
        -ms-user-select: text;
        user-select: text;
      }
    </style>
  @endunless

  @yield('head')
</head>

<body
      class="bg-yideli-base text-yideli-text font-sans antialiased selection:bg-yideli-dark selection:text-white overflow-x-hidden">

  <header class="sticky bg-yideli-dark top-0 z-50 backdrop-blur-sm transition-all duration-300 shadow-md"
          x-data="{ mobileMenu: false, searchOpen: false }">

    <div
         class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto px-6 lg:px-12 h-20 flex justify-between items-center">
      <div class="flex-shrink-0 me-8">
        <a class="block"
           href="{{ route('index', ['lang' => $lang]) }}">
          <img class="h-20 w-auto object-contain"
               src="{{ asset('images/logo_big.jpg') }}"
               alt="Yideli Logo">
        </a>
      </div>

      <nav class="hidden lg:flex gap-8 text-sm font-medium tracking-wide "
           style="margin-top:32px; color: rgb(239 245 230);">
        <a class="hover:text-gray-300 transition uppercase"
           href="{{ route('index', ['lang' => $lang]) }}">{{ __('layout.nav_home') }}</a>
        <a class="hover:text-gray-300 transition uppercase"
           href="{{ route('page.show', ['lang' => $lang, 'slug' => 'about-us']) }}">{{ __('layout.nav_about_us') }}</a>
        <a class="hover:text-gray-300 transition uppercase"
           href="{{ route('page.show', ['lang' => $lang, 'slug' => 'production-process']) }}">{{ __('layout.nav_production_process') }}</a>
        <a class="hover:text-gray-300 transition uppercase"
           href="{{ route('product.index', ['lang' => $lang]) }}">{{ __('layout.nav_product_display') }}</a>
        <a class="hover:text-gray-300 transition uppercase"
           href="{{ route('news.index', ['lang' => $lang]) }}">{{ __('layout.nav_news') }}</a>
        <a class="hover:text-gray-300 transition uppercase"
           href="{{ route('inquire.form', ['lang' => $lang]) }}">{{ __('layout.nav_contact_us') }}</a>
      </nav>

      <div class="flex items-center gap-6"
           style="margin-top:32px;color:rgb(239 245 230);">
        <div class="relative"
             x-data="{
                 open: false,
                 current: '{{ app()->getLocale() }}',

                 langs: {
                     'zh': '简体中文',
                     'en': 'English',
                     'ru': 'Русский',
                     'es': 'Español',
                     'fr': 'Français',
                     'ar': 'العربية'
                 },

                 switchLanguage(targetLang) {
                     let path = window.location.pathname;
                     let segments = path.split('/').filter(p => p);

                     let supported = Object.keys(this.langs);

                     if (segments.length > 0 && supported.includes(segments[0])) {
                         segments[0] = targetLang;
                     } else {
                         segments.unshift(targetLang);
                     }

                     window.location.href = '/' + segments.join('/') + window.location.search;
                 }
             }">

          <button class="flex items-center gap-1 text-sm font-medium hover:text-yideli-base transition focus:outline-none"
                  style="color: rgb(239 245 230);"
                  @click="open = !open"
                  @click.outside="open = false"> <span class="font-bold"
                  x-text="langs[current]"></span>

            <svg class="w-3 h-3 transition-transform duration-200"
                 :class="open ? 'rotate-180' : ''"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor">
              <path stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M19 9l-7 7-7-7" />
            </svg>
          </button>

          <div class="absolute end-0 mt-2 w-32 bg-white rounded-md shadow-lg border border-yideli-line overflow-hidden z-50"
               style="display: none;"
               x-show="open"
               x-transition:enter="transition ease-out duration-100"
               x-transition:enter-start="transform opacity-0 scale-95"
               x-transition:enter-end="transform opacity-100 scale-100"
               x-transition:leave="transition ease-in duration-75"
               x-transition:leave-start="transform opacity-100 scale-100"
               x-transition:leave-end="transform opacity-0 scale-95">
            <div class="py-1">
              <template x-for="(label, code) in langs"
                        :key="code">
                <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-yideli-base hover:text-yideli-dark transition-colors"
                   href="javascript:void(0)"
                   @click="switchLanguage(code)"
                   :class="current === code ? 'font-bold text-yideli-dark bg-yideli-base/50' : ''">
                  <span x-text="label"></span>
                </a>
              </template>
            </div>
          </div>
        </div>
        <button class="lg:hidden p-2"
                @click="mobileMenu = !mobileMenu">
          <svg class="w-6 h-6"
               fill="none"
               stroke="currentColor"
               viewBox="0 0 24 24">
            <path stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="1.5"
                  d="M4 6h16M4 12h16M4 18h16">
            </path>
          </svg>
        </button>
      </div>
    </div>

    <div class="lg:hidden absolute top-full start-0 w-full bg-yideli-base border-t border-yideli-line shadow-lg"
         x-show="mobileMenu"
         x-transition
         x-cloak>
      <div class="flex flex-col p-6 gap-4 text-lg font-serif text-yideli-dark">
        <a class="py-2 border-b border-yideli-line/30 uppercase"
           href="{{ route('index', ['lang' => $lang]) }}">{{ __('layout.nav_home') }}</a>
        <a class="py-2 border-b border-yideli-line/30 uppercase"
           href="{{ route('page.show', ['lang' => $lang, 'slug' => 'about-us']) }}">{{ __('layout.nav_about_us') }}</a>
        <a class="py-2 border-b border-yideli-line/30 uppercase"
           href="{{ route('product.index', ['lang' => $lang]) }}">{{ __('layout.nav_product_display') }}</a>
        <a class="py-2 border-b border-yideli-line/30 uppercase"
           href="{{ route('page.show', ['lang' => $lang, 'slug' => 'production-process']) }}">{{ __('layout.nav_production_process') }}</a>
        <a class="py-2 border-b border-yideli-line/30 uppercase"
           href="{{ route('news.index', ['lang' => $lang]) }}">{{ __('layout.nav_news') }}</a>
        <a class="py-2 border-b border-yideli-line/30 uppercase"
           href="{{ route('inquire.form', ['lang' => $lang]) }}">{{ __('layout.nav_contact_us') }}</a>
      </div>
    </div>
  </header>

  @yield('main')

  <footer class="bg-yideli-dark text-white pt-20 pb-10">

    <div
         class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto px-6 lg:px-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-12 border-b border-white/20 pb-16">

      <div class="lg:col-span-2">
        <h3 class="text-2xl font-bold font-serif tracking-wider">
          <img class="h-20 w-auto"
               src="{{ asset('images/logo_big.jpg') }}"
               alt="YIDELI">
        </h3>
        <p class="text-white/70 text-sm leading-relaxed mb-6 pe-8">
          Taizhou YIDELI Industrial & Trading Co., Ltd.
        </p>
        <div class="text-white/70 text-sm space-y-2">
          <p class="flex items-center gap-2">
            <svg class="lucide lucide-map-pin-house-icon lucide-map-pin-house"
                 xmlns="http://www.w3.org/2000/svg"
                 width="16"
                 height="16"
                 viewBox="0 0 24 24"
                 fill="none"
                 stroke="currentColor"
                 stroke-width="2"
                 stroke-linecap="round"
                 stroke-linejoin="round">
              <path
                    d="M15 22a1 1 0 0 1-1-1v-4a1 1 0 0 1 .445-.832l3-2a1 1 0 0 1 1.11 0l3 2A1 1 0 0 1 22 17v4a1 1 0 0 1-1 1z" />
              <path d="M18 10a8 8 0 0 0-16 0c0 4.993 5.539 10.193 7.399 11.799a1 1 0 0 0 .601.2" />
              <path d="M18 22v-3" />
              <circle cx="10"
                      cy="10"
                      r="3" />
            </svg>
            {{ $settings->contact_address }}
          </p>
          <p class="flex items-center gap-2">
            <svg class="lucide lucide-phone-icon lucide-phone"
                 xmlns="http://www.w3.org/2000/svg"
                 width="16"
                 height="16"
                 viewBox="0 0 24 24"
                 fill="none"
                 stroke="currentColor"
                 stroke-width="2"
                 stroke-linecap="round"
                 stroke-linejoin="round">
              <path
                    d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384" />
            </svg>
            {{ $settings->contact_tel }}
          </p>
          <p class="flex items-center gap-2">
            <svg class="lucide lucide-smartphone-icon lucide-smartphone"
                 xmlns="http://www.w3.org/2000/svg"
                 width="16"
                 height="16"
                 viewBox="0 0 24 24"
                 fill="none"
                 stroke="currentColor"
                 stroke-width="2"
                 stroke-linecap="round"
                 stroke-linejoin="round">
              <rect width="14"
                    height="20"
                    x="5"
                    y="2"
                    rx="2"
                    ry="2" />
              <path d="M12 18h.01" />
            </svg>
            {{ $settings->contact_phone }}
          </p>
          <p class="flex items-center gap-2">
            <svg class="lucide lucide-mail-icon lucide-mail"
                 xmlns="http://www.w3.org/2000/svg"
                 width="16"
                 height="16"
                 viewBox="0 0 24 24"
                 fill="none"
                 stroke="currentColor"
                 stroke-width="2"
                 stroke-linecap="round"
                 stroke-linejoin="round">
              <path d="m22 7-8.991 5.727a2 2 0 0 1-2.009 0L2 7" />
              <rect x="2"
                    y="4"
                    width="20"
                    height="16"
                    rx="2" />
            </svg>
            {{ $settings->contact_email }}
          </p>
        </div>
      </div>

      <div>
        <h4 class="font-bold mb-6 text-sm uppercase tracking-widest">{{ __('layout.footer_categories') }}</h4>
        <ul class="space-y-4 text-sm text-white/70">
          <li><a class="hover:text-white transition uppercase"
               href="{{ route('page.show', ['lang' => $lang, 'slug' => 'about-us']) }}">{{ __('layout.nav_about_us') }}</a>
          </li>
          <li><a class="hover:text-white transition uppercase"
               href="{{ route('page.show', ['lang' => $lang, 'slug' => 'production-process']) }}">{{ __('layout.nav_production_process') }}</a>
          </li>
          <li><a class="hover:text-white transition uppercase"
               href="{{ route('product.index', ['lang' => $lang]) }}">{{ __('layout.nav_product_display') }}</a></li>
          <li><a class="hover:text-white transition uppercase"
               href="{{ route('news.index', ['lang' => $lang]) }}">{{ __('layout.nav_news') }}</a>
          </li>
          <li><a class="hover:text-white transition uppercase"
               href="{{ route('inquire.form', ['lang' => $lang]) }}">{{ __('layout.nav_contact_us') }}</a></li>
        </ul>
      </div>

      <div>
        <h4 class="font-bold mb-6 text-sm uppercase tracking-widest">{{ __('layout.footer_products') }}</h4>
        <ul class="space-y-4 text-sm text-white/70">
          @foreach ($nav_categories as $category)
            <li><a class="hover:text-white transition"
                 href="{{ route('product.index', ['lang' => $lang, 'slug' => $category->slug]) }}">{{ $category->name }}</a>
            </li>
          @endforeach
        </ul>
      </div>

      <div>
        <h4 class="font-bold mb-6 text-sm uppercase tracking-widest">{{ __('layout.footer_follow_us') }}</h4>
        <div class="flex items-center gap-2 text-sm mb-4">
          <svg class="w-4 h-4"
               fill="currentColor"
               viewBox="0 0 24 24">
            <path
                  d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
          </svg>
          <div>{{ $settings->contact_linkedin }}</div>
        </div>
        <div class="flex items-center gap-2 text-sm">
          <svg class="w-4 h-4"
               xmlns="http://www.w3.org/2000/svg"
               viewBox="0 0 22 22"
               fill="currentColor">
            <path
                  d="M7.25361 18.4944L7.97834 18.917C9.18909 19.623 10.5651 20 12.001 20C16.4193 20 20.001 16.4183 20.001 12C20.001 7.58172 16.4193 4 12.001 4C7.5827 4 4.00098 7.58172 4.00098 12C4.00098 13.4363 4.37821 14.8128 5.08466 16.0238L5.50704 16.7478L4.85355 19.1494L7.25361 18.4944ZM2.00516 22L3.35712 17.0315C2.49494 15.5536 2.00098 13.8345 2.00098 12C2.00098 6.47715 6.47813 2 12.001 2C17.5238 2 22.001 6.47715 22.001 17.5228 17.5238 22 12.001 22C10.1671 22 8.44851 21.5064 6.97086 20.6447L2.00516 22ZM8.39232 7.30833C8.5262 7.29892 8.66053 7.29748 8.79459 7.30402C8.84875 7.30758 8.90265 7.31384 8.95659 7.32007C9.11585 7.33846 9.29098 7.43545 9.34986 7.56894C9.64818 8.24536 9.93764 8.92565 10.2182 9.60963C10.2801 9.76062 10.2428 9.95633 10.125 10.1457C10.0652 10.2428 9.97128 10.379 9.86248 10.5183C9.74939 10.663 9.50599 10.9291 9.50599 10.9291C9.50599 10.9291 9.40738 11.0473 9.44455 11.1944C9.45903 11.25 9.50521 11.331 9.54708 11.3991C9.57027 11.4368 9.5918 11.4705 9.60577 11.4938C9.86169 11.9211 10.2057 12.3543 10.6259 12.7616C10.7463 12.8783 10.8631 12.9974 10.9887 13.108C11.457 13.5209 11.9868 13.8583 12.559 14.1082L12.5641 14.1105C12.6486 14.1469 12.692 14.1668 12.8157 14.2193C12.8781 14.2457 12.9419 14.2685 13.0074 14.2858C13.0311 14.292 13.0554 14.2955 13.0798 14.2972C13.2415 14.3069 13.335 14.2032 13.3749 14.1555C14.0984 13.279 14.1646 13.2218 14.1696 13.2222V13.2238C14.2647 13.1236 14.4142 13.0888 14.5476 13.097C14.6085 13.1007 14.6691 13.1124 14.7245 13.1377C15.2563 13.3803 16.1258 13.7587 16.1258 13.7587L16.7073 14.0201C16.8047 14.0671 16.8936 14.1778 16.8979 14.2854C16.9005 14.3523 16.9077 14.4603 16.8838 14.6579C16.8525 14.9166 16.7738 15.2281 16.6956 15.3913C16.6406 15.5058 16.5694 15.6074 16.4866 15.6934C16.3743 15.81 16.2909 15.8808 16.1559 15.9814C16.0737 16.0426 16.0311 16.0714 16.0311 16.0714C15.8922 16.159 15.8139 16.2028 15.6484 16.2909C15.391 16.428 15.1066 16.5068 14.8153 16.5218C14.6296 16.5313 14.4444 16.5447 14.2589 16.5347C14.2507 16.5342 13.6907 16.4482 13.6907 16.4482C12.2688 16.0742 10.9538 15.3736 9.85034 14.402C9.62473 14.2034 9.4155 13.9885 9.20194 13.7759C8.31288 12.8908 7.63982 11.9364 7.23169 11.0336C7.03043 10.5884 6.90299 10.1116 6.90098 9.62098C6.89729 9.01405 7.09599 8.4232 7.46569 7.94186C7.53857 7.84697 7.60774 7.74855 7.72709 7.63586C7.85348 7.51651 7.93392 7.45244 8.02057 7.40811C8.13607 7.34902 8.26293 7.31742 8.39232 7.30833Z">
            </path>
          </svg>
          <div>{{ $settings->contact_whatsapp }}</div>
        </div>
      </div>
    </div>

    <div
         class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto px-6 lg:px-12 mt-8 flex flex-col md:flex-row justify-between items-center text-xs text-white/40">
      <p>&copy; 2025 Yideli Stationery. {{ __('layout.footer_rights_reserved') }}</p>
      <div class="flex gap-6 mt-4 md:mt-0">
        <a class="hover:text-white transition"
           href="#">{{ __('layout.footer_privacy_policy') }}</a>
        <a class="hover:text-white transition"
           href="#">{{ __('layout.footer_terms_of_use') }}</a>
      </div>
    </div>
  </footer>

  @unless (app()->environment('local'))
    <script>
      document.addEventListener('contextmenu', function(e) {
        e.preventDefault();
        return false;
      });

      document.addEventListener('copy', function(e) {
        e.preventDefault();
        return false;
      });

      document.addEventListener('cut', function(e) {
        e.preventDefault();
        return false;
      });

      document.onkeydown = function(e) {
        if (event.keyCode == 123) {
          return false;
        }
        if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
          return false;
        }
        if (e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
          return false;
        }
        if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
          return false;
        }
        if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
          return false;
        }
        if (e.ctrlKey && e.keyCode == 'S'.charCodeAt(0)) {
          return false;
        }
      };
    </script>
  @endunless
  @yield('script')
</body>

</html>
