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

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap"
    rel="stylesheet">

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
            serif: ['"Playfair Display"', 'serif'],
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
        <h3 class="text-2xl font-bold mb-6 font-serif tracking-wider">YIDELI</h3>
        <p class="text-white/70 text-sm leading-relaxed mb-6 pr-8">
          Taizhou Yideli Stationery Co., Ltd.<br>
          Focusing on High-end Stationery Mfg & Export<br>
          ISO 9001 Certified Enterprise
        </p>
        <div class="text-white/70 text-sm space-y-2">
          <p>Add: No. 123, Industrial Zone, Taizhou, China</p>
          <p>Tel: +86 123 4567 8900</p>
          <p>Email: sales@yideli.com</p>
        </div>
      </div>

      <div>
        <h4 class="font-bold mb-6 text-sm uppercase tracking-widest">Products</h4>
        <ul class="space-y-4 text-sm text-white/70">
          <li><a href="#products" class="hover:text-white transition">Writing Instruments</a></li>
          <li><a href="#notebooks" class="hover:text-white transition">Paper & Notebooks</a></li>
          <li><a href="#" class="hover:text-white transition">Office Supplies</a></li>
          <li><a href="#" class="hover:text-white transition">Art Supplies</a></li>
        </ul>
      </div>

      <div>
        <h4 class="font-bold mb-6 text-sm uppercase tracking-widest">Custom Services</h4>
        <ul class="space-y-4 text-sm text-white/70">
          <li><a href="#custom" class="hover:text-white transition">Corporate Custom</a></li>
          <li><a href="#" class="hover:text-white transition">OEM/ODM Process</a></li>
          <li><a href="#" class="hover:text-white transition">Case Studies</a></li>
        </ul>
      </div>

      <div>
        <h4 class="font-bold mb-6 text-sm uppercase tracking-widest">Our Factory</h4>
        <ul class="space-y-4 text-sm text-white/70">
          <li><a href="#about" class="hover:text-white transition">About Us</a></li>
          <li><a href="#" class="hover:text-white transition">Factory Tour</a></li>
          <li><a href="#" class="hover:text-white transition">Quality Control</a></li>
          <li><a href="#" class="hover:text-white transition">Contact Us</a></li>
        </ul>
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

  @yield('script')
</body>

</html>