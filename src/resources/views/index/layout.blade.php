<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Yideli Stationery - Premium Manufacturer')</title>
  <meta name="description"
    content="Professional Stationery Manufacturer & Exporter. Source factory for OEM/ODM services.">

  <script src="https://cdn.tailwindcss.com"></script>

  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            yideli: {
              base: '#EFF5E6',  // 浅色背景
              dark: '#006B5F',  // 深绿主色
              text: '#1C3330',  // 深色文字
              hover: '#005248', // 按钮悬停色
              line: '#D1DBD0',  // 分割线颜色
            }
          },
          fontFamily: {
            sans: ['Inter', 'sans-serif'],
            serif: ['serif'],
          },
          spacing: {
            '128': '32rem',
          }
        }
      }
    }
  </script>

  <style>
    [x-cloak] {
      display: none !important;
    }

    /* 隐藏滚动条但保留滚动功能 */
    .no-scrollbar::-webkit-scrollbar {
      display: none;
    }

    .no-scrollbar {
      -ms-overflow-style: none;
      scrollbar-width: none;
    }

    /* 极简按钮动画 */
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

    @unless(app()->environment('local'))
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

    @endunless
  </style>

  @yield('head')
</head>

<body
  class="bg-yideli-base text-yideli-text font-sans antialiased selection:bg-yideli-dark selection:text-white overflow-x-hidden">

  <header x-data="{ mobileMenu: false, searchOpen: false }"
    class="sticky bg-yideli-dark top-0 z-50 backdrop-blur-sm transition-all duration-300 shadow-md">
    <div class="max-w-[1920px] mx-auto px-6 lg:px-12 h-20 flex justify-between items-center">
      <div class="flex-shrink-0 mr-8">
        <a href="{{ route('index') }}" class="block">
          <img src="{{ asset('images/logo_big.jpg') }}" alt="Yideli Logo" class="h-20 w-auto object-contain">
        </a>
      </div>

      <nav class="hidden lg:flex gap-16 text-sm font-medium tracking-wide "
        style="margin-top:32px; color: rgb(239 245 230);">
        <a href="{{ route('index', ['lang' => $lang]) }}" class="hover:text-gray-300 transition">HOME</a>
        <a href="{{ route('page.show', ['lang' => $lang, 'slug' => 'about-us']) }}"
          class="hover:text-gray-300 transition">ABOUT US</a>
        <a href="{{ route('production-process', ['lang' => $lang]) }}" class="hover:text-gray-300 transition">PRODUCTION
          PROCESS</a>
        <a href="{{ route('product.index', ['lang' => $lang]) }}" class="hover:text-gray-300 transition">PRODUCT
          DISPLAY</a>
        <a href="{{ route('news.index', ['lang' => $lang]) }}" class="hover:text-gray-300 transition">NEWS</a>
        <a href="{{ route('inquire.form', ['lang' => $lang]) }}" class="hover:text-gray-300 transition">CONTACT
          US</a>
      </nav>

      <div class="flex items-center gap-6" style="margin-top:32px;color:rgb(239 245 230);">
        <div class="relative" x-data="{
            open: false,
            current: 'en_US',
            langs: {
                'zh_CN': '简体中文',
                'en_US': 'English',
                'ru_RU': 'Русский',
                'es_ES': 'Español',
                'fr_FR': 'Français',
                'ar_SA': 'العربية'
            }
        }">
          <button @click="open = !open" @click.outside="open = false"
            class="flex items-center gap-1 text-sm font-medium hover:text-gray-300 focus:outline-none">
            <span class="font-bold" x-text="current.split('_')[0].toUpperCase()"></span>
            <svg class="w-3 h-3 text-white transition-transform duration-200 hover:text-gray-300"
              :class="open ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </button>

          <div x-show="open" x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95"
            class="absolute right-0 mt-2 w-32 bg-white rounded-md shadow-lg border border-yideli-line overflow-hidden z-50">
            <div class="py-1">
              <template x-for="(label, code) in langs" :key="code">
                <a href="#" @click.prevent="current = code; open = false"
                  class="block px-4 py-2 text-sm text-gray-700 hover:bg-yideli-base hover:text-yideli-dark transition-colors"
                  :class="current === code ? 'font-bold text-yideli-dark bg-yideli-base/50' : ''">
                  <span x-text="label"></span>
                </a>
              </template>
            </div>
          </div>
        </div>
        <button @click="mobileMenu = !mobileMenu" class="lg:hidden p-2">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16">
            </path>
          </svg>
        </button>
      </div>
    </div>

    <div x-show="mobileMenu" x-transition x-cloak
      class="lg:hidden absolute top-full left-0 w-full bg-yideli-base border-t border-yideli-line shadow-lg">
      <div class="flex flex-col p-6 gap-4 text-lg font-serif text-yideli-dark">
        <a href="{{ route('index', ['lang' => $lang]) }}" class="py-2 border-b border-yideli-line/30">HOME</a>
        <a href="{{ route('page.show', ['lang' => $lang, 'slug' => 'about-us']) }}"
          class="py-2 border-b border-yideli-line/30">ABOUT US</a>
        <a href="{{ route('product.index', ['lang' => $lang]) }}" class="py-2 border-b border-yideli-line/30">PRODUCT
          DISPLAY</a>
        <a href="{{ route('production-process', ['lang' => $lang]) }}"
          class="py-2 border-b border-yideli-line/30">PRODUCTION PROCESS</a>
        <a href="{{ route('news.index', ['lang' => $lang]) }}" class="py-2 border-b border-yideli-line/30">NEWS</a>
        <a href="{{ route('inquire.form', ['lang' => $lang]) }}" class="py-2 border-b border-yideli-line/30">CONTACT
          US</a>
      </div>
    </div>
  </header>

  @yield('main')

  <footer class="bg-yideli-dark text-white pt-20 pb-10">
    <div
      class="max-w-[1600px] mx-auto px-6 lg:px-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-12 border-b border-white/20 pb-16">

      <div class="lg:col-span-2">
        <h3 class="text-2xl font-bold font-serif tracking-wider">
          <img src="{{ asset('images/logo_big.jpg') }}" alt="YIDELI" class="h-20 w-auto">
        </h3>
        <p class="text-white/70 text-sm leading-relaxed mb-6 pr-8">
          Taizhou YIDELI Industrial & Trading Co., Ltd.
        </p>
        <div class="text-white/70 text-sm space-y-2">
          <p class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="lucide lucide-map-pin-house-icon lucide-map-pin-house">
              <path
                d="M15 22a1 1 0 0 1-1-1v-4a1 1 0 0 1 .445-.832l3-2a1 1 0 0 1 1.11 0l3 2A1 1 0 0 1 22 17v4a1 1 0 0 1-1 1z" />
              <path d="M18 10a8 8 0 0 0-16 0c0 4.993 5.539 10.193 7.399 11.799a1 1 0 0 0 .601.2" />
              <path d="M18 22v-3" />
              <circle cx="10" cy="10" r="3" />
            </svg>
            {{ $settings->contact_address }}
          </p>
          <p class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="lucide lucide-phone-icon lucide-phone">
              <path
                d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384" />
            </svg>
            {{ $settings->contact_tel}}
          </p>
          <p class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="lucide lucide-smartphone-icon lucide-smartphone">
              <rect width="14" height="20" x="5" y="2" rx="2" ry="2" />
              <path d="M12 18h.01" />
            </svg>
            {{ $settings->contact_phone}}
          </p>
          <p class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="lucide lucide-mail-icon lucide-mail">
              <path d="m22 7-8.991 5.727a2 2 0 0 1-2.009 0L2 7" />
              <rect x="2" y="4" width="20" height="16" rx="2" />
            </svg>
            {{ $settings->contact_email }}
          </p>
        </div>
      </div>

      <div>
        <h4 class="font-bold mb-6 text-sm uppercase tracking-widest">CATEGORIES</h4>
        <ul class="space-y-4 text-sm text-white/70">
          <li><a href="{{ route('page.show', ['lang' => $lang, 'slug' => 'about-us']) }}"
              class="hover:text-white transition">About Us</a></li>
          <li><a href="{{ route('production-process', ['lang' => $lang]) }}"
              class="hover:text-white transition">Production Process</a></li>
          <li><a href="{{ route('product.index', ['lang' => $lang]) }}" class="hover:text-white transition">Product Display</a></li>
          <li><a href="{{ route('news.index', ['lang' => $lang]) }}" class="hover:text-white transition">News</a></li>
          <li><a href="{{ route('inquire.form', ['lang' => $lang]) }}" class="hover:text-white transition">Contact
              Us</a></li>
        </ul>
      </div>

      <div>
        <h4 class="font-bold mb-6 text-sm uppercase tracking-widest">PRODUCTS</h4>
        <ul class="space-y-4 text-sm text-white/70">
          <li><a href="#" class="hover:text-white transition">Planner & Diaries</a></li>
          <li><a href="#" class="hover:text-white transition">Spiral Notebook</a></li>
          <li><a href="#" class="hover:text-white transition">Notebook</a></li>
          <li><a href="#" class="hover:text-white transition">Elastic band notebook</a></li>
          <li><a href="#" class="hover:text-white transition">Address book</a></li>
          <li><a href="#" class="hover:text-white transition">Folders &amp; Organizers</a></li>
        </ul>
      </div>

      <div>
        <h4 class="font-bold mb-6 text-sm uppercase tracking-widest">FOLLOW US</h4>
        <div class="flex items-center gap-2 text-sm mb-4">
          <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
            <path
              d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
          </svg>
          <div>{{ $settings->contact_linkedin }}</div>
        </div>
        <div class="flex items-center gap-2 text-sm">
          <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
            <path
              d="M16.75 0h-9.5C5.784 0 5 0.784 5 1.75v20.5C5 23.216 5.784 24 6.25 24h9.5c0.466 0 0.854-0.343 0.936-0.797l2.5-12.5c0.045-0.226 0.014-0.458-0.09-0.658s-0.295-0.358-0.522-0.436l-12.5-2.5C8.343 9.104 8 8.716 8 8.25v-9.5C8 0.784 8.784 0 9.75 0zM17.604 10.5 15.5 11.004 7 9.5v-7h7.5l1.504 2.104 1.1-0.22C17.604 10.5 17.604 10.5 17.604 10.5zM7.5 8.5h6.773l-0.22 1.1-6.553 1.311L7.5 8.5z M18.5 11.979 17.021 18.5h-7.542l1.937-1.937c0.781-0.781 2.047-0.781 2.828 0s0.781 2.047 0 2.828l-1.937 1.937v0.042h5.042L18.5 11.979z M13.5 19.5c-0.552 0-1-0.448-1-1s0.448-1 1-1 1 0.448 1 1-0.448 1-1 1z" />
          </svg>
          <div>{{ $settings->contact_whatsapp}}</div>
        </div>
      </div>
    </div>

    <div
      class="max-w-[1600px] mx-auto px-6 lg:px-12 mt-8 flex flex-col md:flex-row justify-between items-center text-xs text-white/40">
      <p>&copy; 2025 Yideli Stationery. All rights reserved.</p>
      <div class="flex gap-6 mt-4 md:mt-0">
        <a href="#" class="hover:text-white transition">Privacy Policy</a>
        <a href="#" class="hover:text-white transition">Terms of Use</a>
      </div>
    </div>
  </footer>

  @unless(app()->environment('local'))
    <script>
      document.addEventListener('contextmenu', function (e) {
        e.preventDefault();
        return false;
      });

      document.addEventListener('copy', function (e) {
        e.preventDefault();
        return false;
      });

      document.addEventListener('cut', function (e) {
        e.preventDefault();
        return false;
      });

      document.onkeydown = function (e) {
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