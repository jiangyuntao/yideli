<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Yideli - Premium Stationery Design</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
    rel="stylesheet">
  <link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Stardos+Stencil:wght@400;700&display=swap"
    rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

  <style>
    .logo {
      font-family: 'Stardos Stencil', sans-serif;
    }

    /* Define playfair as the primary font */
    .font-playfair {
      font-family: 'Playfair Display', sans-serif;
    }

    /* Custom scrollbar for better aesthetics on wide screen (optional) */
    ::-webkit-scrollbar {
      width: 8px;
    }

    ::-webkit-scrollbar-thumb {
      background-color: #d1d5db;
      /* light gray */
      border-radius: 4px;
    }
  </style>
</head>

<body class="bg-white font-playfair text-gray-800">

  <header class="bg-white shadow-lg sticky top-0 z-50 border-b border-gray-100">
    <div class="max-w-[96rem] mx-auto px-4 sm:px-6 lg:px-10 py-4 flex justify-between items-center">

      <a href="{{ route('index') }}"
        class="logo text-3xl lg:text-4xl font-extrabold text-red-600 tracking-wider">YIDELI</a>

      <nav class="space-x-4 lg:space-x-10 text-lg text-gray-700 font-medium hidden lg:flex">
        <a href="{{  route('page.show', ['slug' => 'about-us']) }}"
          class="hover:text-red-600 transition duration-300">ABOUT</a>
        <a href="{{ route('product.index') }}" class="hover:text-red-600 transition duration-300">PRODUCTS</a>
        <a href="{{ route('page.show', ['slug' => 'support']) }}"
          class="hover:text-red-600 transition duration-300">SUPPORT</a>
        <a href="{{ route('news.index') }}" class="hover:text-red-600 transition duration-300">NEWS</a>
        <a href="{{ route('page.show', ['slug' => 'contact']) }}"
          class="hover:text-red-600 transition duration-300">CONTACT</a>
      </nav>

      <div class="flex items-center space-x-3 sm:space-x-6">
        <div x-data="{
                        open: false,
                        languages: [
                            { code: 'CN', name: '中文' },
                            { code: 'EN', name: 'English' },
                            { code: 'RU', name: 'Русский' },
                            { code: 'ES', name: 'Español' },
                            { code: 'FR', name: 'Français' },
                            { code: 'AR', name: 'العربية' }
                        ],
                        currentLang: { code: 'EN', name: 'English' },
                        setLang(lang) {
                            this.currentLang = lang;
                            this.open = false;
                        }
                    }" @click.outside="open = false" class="relative block z-50">
          <button @click="open = !open"
            class="flex items-center text-gray-700 hover:text-red-600 transition duration-300 text-sm sm:text-base font-medium focus:outline-none px-1 py-1 rounded-md"
            title="Change Language">
            <i class="ri-translate-2 text-lg sm:text-xl mr-1 sm:mr-2"></i>
            <span x-text="currentLang.name" class="hidden sm:inline min-w-[4rem] text-left"></span>
            <span x-text="currentLang.code" class="sm:hidden text-left font-bold"></span>
            <i :class="open ? 'ri-arrow-up-s-line' : 'ri-arrow-down-s-line'" class="ml-1 text-base"></i>
          </button>

          <div x-show="open" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="absolute right-0 mt-2 w-48 sm:w-56 bg-white border border-gray-200 rounded-md shadow-lg origin-top-right"
            style="display: none;">
            <template x-for="lang in languages" :key="lang.code">
              <a href="#" @click.prevent="setLang(lang)"
                class="block px-4 py-3 text-gray-700 hover:bg-gray-100 text-base sm:text-lg"
                :class="{'bg-gray-100 font-semibold text-red-600': lang.code === currentLang.code}"
                x-text="lang.name + ' (' + lang.code + ')'"></a>
            </template>
          </div>
        </div>

        <a class="px-3 sm:px-7 py-2 sm:py-2.5 border border-gray-700 text-gray-700 text-sm sm:text-lg font-bold rounded-full hover:bg-red-600 hover:border-red-600 hover:text-white transition duration-300 flex items-center space-x-2"
          href="{{ route('inquire.form') }}">
          <span class="hidden sm:inline">Inquire Now</span>
          <span class="sm:hidden">Inquire</span>
        </a>

        <div x-data="{ open: false }" class="lg:hidden">
          <button @click="open = true" class="text-gray-700 hover:text-red-600 text-2xl p-2">
            <i class="ri-menu-line"></i>
          </button>

          <div x-show="open" @click.outside="open = false" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-x-full" x-transition:enter-end="opacity-100 translate-x-0"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-x-0"
            x-transition:leave-end="opacity-0 translate-x-full"
            class="fixed inset-0 z-50 bg-white shadow-xl flex flex-col pt-10 px-6" style="display: none;">
            <div class="flex justify-between items-center mb-10">
              <a href="#" class="logo text-3xl font-extrabold text-red-600">YIDELI</a>
              <button @click="open = false" class="text-gray-700 hover:text-red-600 text-3xl">
                <i class="ri-close-line"></i>
              </button>
            </div>

            <nav class="flex flex-col space-y-6 text-2xl font-semibold text-gray-800">
              <a @click="open = false" href="#custom"
                class="hover:text-red-600 transition duration-300 border-b pb-2">ABOUT</a>
              <a @click="open = false" href="#collections"
                class="hover:text-red-600 transition duration-300 border-b pb-2">PRODUCTS</a>
              <a @click="open = false" href="#collections"
                class="hover:text-red-600 transition duration-300 border-b pb-2">SUPPORT</a>
              <a @click="open = false" href="#craftsmanship"
                class="hover:text-red-600 transition duration-300 border-b pb-2">NEWS</a>
              <a @click="open = false" href="#contact"
                class="hover:text-red-600 transition duration-300 border-b pb-2">CONTACT</a>
            </nav>

            <div class="mt-auto pb-10">
              <p class="text-sm leading-relaxed text-gray-500 mt-8">© 2024 Yideli Stationery Co., Ltd.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <main>
    @yield('main')

    <footer id="contact" class="bg-gray-900 text-gray-300 py-12 sm:py-20 font-playfair">
      <div class="max-w-[96rem] mx-auto px-4 sm:px-6 lg:px-10 grid grid-cols-2 md:grid-cols-5 gap-8 sm:gap-12">

        <div class="col-span-2 md:col-span-1">
          <h4 class="logo text-2xl sm:text-3xl font-extrabold mb-4 sm:mb-6 text-white tracking-wide">YIDELI
          </h4>
          <p class="text-sm sm:text-base leading-relaxed text-gray-400">Precision in production. Passion for
            paper. Dedicated to inspiring your best work.</p>
        </div>

        <div>
          <h4 class="text-lg sm:text-xl font-bold mb-4 sm:mb-6 text-white">Products</h4>
          <ul class="space-y-2 sm:space-y-3 text-sm sm:text-base">
            <li><a href="#collections" class="hover:text-red-400 transition duration-200">The Executive
                Line</a></li>
            <li><a href="#collections" class="hover:text-red-400 transition duration-200">The Modernist
                Series</a></li>
            <li><a href="#collections" class="hover:text-red-400 transition duration-200">Planner
                Agendas</a></li>
            <li><a href="#custom" class="hover:text-red-400 transition duration-200">Custom B2B Orders</a>
            </li>
          </ul>
        </div>

        <div>
          <h4 class="text-lg sm:text-xl font-bold mb-4 sm:mb-6 text-white">Company</h4>
          <ul class="space-y-2 sm:space-y-3 text-sm sm:text-base">
            <li><a href="#" class="hover:text-red-400 transition duration-200">Our Heritage</a></li>
            <li><a href="#" class="hover:text-red-400 transition duration-200">Quality Control</a></li>
            <li><a href="#" class="hover:text-red-400 transition duration-200">Sustainability</a></li>
            <li><a href="#" class="hover:text-red-400 transition duration-200">Careers</a></li>
          </ul>
        </div>

        <div>
          <h4 class="text-lg sm:text-xl font-bold mb-4 sm:mb-6 text-white">Support</h4>
          <ul class="space-y-2 sm:space-y-3 text-sm sm:text-base">
            <li><a href="#" class="hover:text-red-400 transition duration-200">FAQ</a></li>
            <li><a href="#" class="hover:text-red-400 transition duration-200">Shipping & Returns</a></li>
            <li><a href="#" class="hover:text-red-400 transition duration-200">Privacy Policy</a></li>
            <li><a href="#" class="hover:text-red-400 transition duration-200">Terms of Service</a></li>
          </ul>
        </div>

        <div>
          <h4 class="text-lg sm:text-xl font-bold mb-4 sm:mb-6 text-white">Contact</h4>
          <p class="text-sm sm:text-base leading-relaxed text-gray-400">Email: <a href="/cdn-cgi/l/email-protection"
              class="__cf_email__" data-cfemail="b8cbd9d4ddcbf8c1d1dcddd4d196dbd7d5">[email&#160;protected]</a></p>
          <p class="text-sm sm:text-base leading-relaxed text-gray-400">Phone: +86 123 4567 890</p>

          <div class="flex space-x-4 sm:space-x-6 mt-4 sm:mt-6">
            <a href="#" class="text-2xl sm:text-3xl text-gray-400 hover:text-red-600 transition duration-200"
              aria-label="Facebook">
              <i class="ri-facebook-box-fill"></i>
            </a>
            <a href="#" class="text-2xl sm:text-3xl text-gray-400 hover:text-red-600 transition duration-200"
              aria-label="Instagram">
              <i class="ri-instagram-fill"></i>
            </a>
            <a href="#" class="text-2xl sm:text-3xl text-gray-400 hover:text-red-600 transition duration-200"
              aria-label="LinkedIn">
              <i class="ri-linkedin-box-fill"></i>
            </a>
            <a href="#" class="text-2xl sm:text-3xl text-gray-400 hover:text-red-600 transition duration-200"
              aria-label="Twitter/X">
              <i class="ri-twitter-x-fill"></i>
            </a>
          </div>

          <p class="text-xs sm:text-sm leading-relaxed text-gray-500 mt-6 sm:mt-8">© 2024 Yideli Stationery
            Co., Ltd.</p>
        </div>
      </div>
    </footer>
  </main>
  <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
  <script>(function () { function c() { var b = a.contentDocument || a.contentWindow.document; if (b) { var d = b.createElement('script'); d.innerHTML = "window.__CF$cv$params={r:'9b1fee18e862a9af',t:'MTc2NjQwOTc2Nw=='};var a=document.createElement('script');a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);"; b.getElementsByTagName('head')[0].appendChild(d) } } if (document.body) { var a = document.createElement('iframe'); a.height = 1; a.width = 1; a.style.position = 'absolute'; a.style.top = 0; a.style.left = 0; a.style.border = 'none'; a.style.visibility = 'hidden'; document.body.appendChild(a); if ('loading' !== document.readyState) c(); else if (window.addEventListener) document.addEventListener('DOMContentLoaded', c); else { var e = document.onreadystatechange || function () { }; document.onreadystatechange = function (b) { e(b); 'loading' !== document.readyState && (document.onreadystatechange = e, c()) } } } })();</script>
  <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015"
    integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ=="
    data-cf-beacon='{"version":"2024.11.0","token":"08205491dfea42e09b831ab5b24d3f4f","r":1,"server_timing":{"name":{"cfCacheStatus":true,"cfEdge":true,"cfExtPri":true,"cfL4":true,"cfOrigin":true,"cfSpeedBrain":true},"location_startswith":null}}'
    crossorigin="anonymous"></script>
  @yield('script')
</body>

</html>