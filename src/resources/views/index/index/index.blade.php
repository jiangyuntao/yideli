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

      <a href="#" class="logo text-3xl lg:text-4xl font-extrabold text-red-600 tracking-wider">YIDELI</a>

      <nav class="space-x-4 lg:space-x-10 text-lg text-gray-700 font-medium hidden lg:flex">
        <a href="#custom" class="hover:text-red-600 transition duration-300">ABOUT</a>
        <a href="#collections" class="hover:text-red-600 transition duration-300">PRODUCTS</a>
        <a href="#collections" class="hover:text-red-600 transition duration-300">SUPPORT</a>
        <a href="#craftsmanship" class="hover:text-red-600 transition duration-300">NEWS</a>
        <a href="#contact" class="hover:text-red-600 transition duration-300">CONTACT</a>
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

        <button
          class="px-3 sm:px-7 py-2 sm:py-2.5 border border-gray-700 text-gray-700 text-sm sm:text-lg font-bold rounded-full hover:bg-red-600 hover:border-red-600 hover:text-white transition duration-300 flex items-center space-x-2">
          <span class="hidden sm:inline">Inquire Now</span>
          <span class="sm:hidden">Inquire</span>
        </button>

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
    <div class="relative w-full h-[550px] sm:h-[650px] lg:h-[750px] bg-white flex items-center">
      <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1514429015793-8a42fb25e17f?q=80&w=1025&auto=format&fit=crop"
          alt="Elegant Notebook on a light marble desk" class="w-full h-full object-cover brightness-[.9]">
      </div>

      <div class="relative z-10 max-w-[96rem] mx-auto px-4 sm:px-6 lg:px-10">
        <h1
          class="text-4xl sm:text-5xl md:text-6xl lg:text-8xl font-extrabold text-white drop-shadow-lg leading-tight max-w-5xl">
          Crafting Ideas. Defining Your Legacy.
        </h1>
        <p class="mt-4 sm:mt-8 text-lg sm:text-xl lg:text-2xl text-white drop-shadow-sm max-w-xl font-medium">
          Experience the difference of premium paper and meticulous binding. Tools for inspired productivity.
        </p>
        <a href="#collections"
          class="mt-8 sm:mt-12 inline-block bg-red-600 text-white text-base sm:text-xl font-bold px-10 sm:px-16 py-3 sm:py-5 rounded-full shadow-2xl hover:bg-red-700 transition duration-300 w-fit uppercase tracking-wider">
          View Our Notebooks
        </a>
      </div>
    </div>

    <section id="collections" class="py-16 sm:py-24 lg:py-32 bg-white">
      <div class="max-w-[96rem] mx-auto px-4 sm:px-6 lg:px-10">
        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-center text-gray-900 mb-12 sm:mb-20">The
          Yideli Products</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 sm:gap-12">

          <div class="group relative overflow-hidden rounded-lg shadow-xl border border-gray-100">
            <img src="https://images.unsplash.com/photo-1522836924445-4478bdeb860c?q=80&w=800&auto=format&fit=crop"
              alt="Leather Notebook on a light surface"
              class="w-full h-[300px] sm:h-[480px] object-cover mb-4 sm:mb-6 group-hover:scale-[1.05] transition duration-700">
            <div class="p-4 sm:p-6">
              <h3 class="text-xl sm:text-2xl font-semibold text-gray-900">The Executive Line</h3>
              <p class="text-gray-700 mt-2 sm:mt-3 mb-4 sm:mb-6 text-sm sm:text-base">Refined leather and
                subtle detailing. The perfect choice for daily business.</p>
              <a href="#"
                class="inline-block text-red-600 font-bold border-b-2 border-red-600 hover:text-red-800 hover:border-red-800 transition duration-300 text-sm sm:text-base">
                Explore Details &rarr;
              </a>
            </div>
          </div>

          <div class="group relative overflow-hidden rounded-lg shadow-xl border border-gray-100">
            <img src="https://images.unsplash.com/photo-1631173716529-fd1696a807b0?q=80&w=800&auto=format&fit=crop"
              alt="Minimalist Notebooks Stacked"
              class="w-full h-[300px] sm:h-[480px] object-cover mb-4 sm:mb-6 group-hover:scale-[1.05] transition duration-700">
            <div class="p-4 sm:p-6">
              <h3 class="text-xl sm:text-2xl font-semibold text-gray-900">The Modernist Series</h3>
              <p class="text-gray-700 mt-2 sm:mt-3 mb-4 sm:mb-6 text-sm sm:text-base">Clean lines, bold
                colors, and contemporary material choices.</p>
              <a href="#"
                class="inline-block text-red-600 font-bold border-b-2 border-red-600 hover:text-red-800 hover:border-red-800 transition duration-300 text-sm sm:text-base">
                Explore Details &rarr;
              </a>
            </div>
          </div>

          <div class="group relative overflow-hidden rounded-lg shadow-xl border border-gray-100">
            <img src="https://images.unsplash.com/photo-1612599316791-451087c7fe15?q=80&w=800&auto=format&fit=crop"
              alt="Eco-friendly Recycled Paper Notebook"
              class="w-full h-[300px] sm:h-[480px] object-cover mb-4 sm:mb-6 group-hover:scale-[1.05] transition duration-700">
            <div class="p-4 sm:p-6">
              <h3 class="text-xl sm:text-2xl font-semibold text-gray-900">The Conscious Keeper</h3>
              <p class="text-gray-700 mt-2 sm:mt-3 mb-4 sm:mb-6 text-sm sm:text-base">Made with
                FSC-certified paper and recycled materials. Sustainable luxury.</p>
              <a href="#"
                class="inline-block text-red-600 font-bold border-b-2 border-red-600 hover:text-red-800 hover:border-red-800 transition duration-300 text-sm sm:text-base">
                Explore Details &rarr;
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="craftsmanship" class="py-16 sm:py-24 lg:py-32 bg-gray-50 border-t border-b border-gray-100">
      <div class="max-w-[96rem] mx-auto px-4 sm:px-6 lg:px-10">
        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-center text-gray-900 mb-12 sm:mb-24">About
          Yideli</h2>

        <div class="flex flex-col md:flex-row items-stretch gap-8 sm:gap-16">
          <div class="md:w-1/2">
            <img src="https://images.unsplash.com/photo-1759310347467-578dfd846229?q=80&w=1171&auto=format&fit=crop"
              alt="Close-up of Notebook Pages and Binding"
              class="w-full h-[300px] sm:h-full object-cover rounded-lg shadow-2xl border border-gray-100">
          </div>
          <div class="md:w-1/2 space-y-6 sm:space-y-12 flex flex-col justify-between">
            <div
              class="p-6 sm:p-8 bg-white rounded-lg shadow-xl border-l-4 border-red-600 hover:shadow-2xl transition duration-300">
              <h3 class="text-2xl sm:text-3xl font-bold text-gray-900">Proprietary Paper Stock</h3>
              <p class="text-gray-700 mt-2 sm:mt-3 text-base sm:text-lg">Our paper is perfectly weighted
                and formulated to ensure minimal bleed-through for fountain pens and markers.</p>
            </div>
            <div
              class="p-6 sm:p-8 bg-white rounded-lg shadow-xl border-l-4 border-red-600 hover:shadow-2xl transition duration-300">
              <h3 class="text-2xl sm:text-3xl font-bold text-gray-900">Lay-Flat Binding Perfection</h3>
              <p class="text-gray-700 mt-2 sm:mt-3 text-base sm:text-lg">Using durable thread-sewn
                signatures, every Yideli notebook is guaranteed to open and lay perfectly flat for an
                unhindered writing experience.</p>
            </div>
            <div
              class="p-6 sm:p-8 bg-white rounded-lg shadow-xl border-l-4 border-red-600 hover:shadow-2xl transition duration-300">
              <h3 class="text-2xl sm:text-3xl font-bold text-gray-900">Precision and Detail</h3>
              <p class="text-gray-700 mt-2 sm:mt-3 text-base sm:text-lg">From cover embossing to edge
                foiling, every production step adheres to the highest global quality standards.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="custom" class="py-16 sm:py-24 lg:py-32 bg-white">
      <div class="max-w-[96rem] mx-auto px-4 sm:px-6 lg:px-10 text-center">
        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 mb-6 sm:mb-10">Elevate Your Brand
          with Customization</h2>
        <p class="text-lg sm:text-xl lg:text-2xl text-gray-700 mb-12 sm:mb-20 max-w-4xl mx-auto font-medium">
          Yideli is your one-stop solution for corporate gifting and promotional products. Unlock endless
          possibilities with our OEM/ODM services.
        </p>

        <div class="flex flex-col md:flex-row justify-between relative">
          <div class="hidden lg:block absolute top-1/4 left-1/4 right-1/4 h-1 bg-gray-200 -translate-y-1/2">
          </div>
          <div class="hidden lg:block absolute top-1/4 left-1/2 right-1/4 h-1 bg-gray-200 -translate-y-1/2">
          </div>
          <div class="hidden lg:block absolute top-1/4 left-3/4 right-1/4 h-1 bg-gray-200 -translate-y-1/2">
          </div>

          <div class="w-full md:w-1/4 p-2 sm:p-4 mb-8 md:mb-0">
            <div class="relative p-6 sm:p-8 shadow-2xl rounded-lg bg-gray-50 border-t-4 border-red-600 h-full">
              <div
                class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-red-600 text-white rounded-full w-12 h-12 sm:w-14 sm:h-14 flex items-center justify-center text-xl sm:text-3xl font-extrabold shadow-lg">
                01</div>
              <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mt-6 sm:mt-6">Concept & Design</h3>
              <p class="text-gray-700 text-sm sm:text-lg mt-3">Initial consultation to define your
                requirements for materials, size, and layout.</p>
            </div>
          </div>
          <div class="w-full md:w-1/4 p-2 sm:p-4 mb-8 md:mb-0">
            <div class="relative p-6 sm:p-8 shadow-2xl rounded-lg bg-gray-50 border-t-4 border-red-600 h-full">
              <div
                class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-red-600 text-white rounded-full w-12 h-12 sm:w-14 sm:h-14 flex items-center justify-center text-xl sm:text-3xl font-extrabold shadow-lg">
                02</div>
              <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mt-6 sm:mt-6">Material Sourcing</h3>
              <p class="text-gray-700 text-sm sm:text-lg mt-3">Selection of premium covers (leather,
                fabric) and paper types (recycled, bamboo).</p>
            </div>
          </div>
          <div class="w-full md:w-1/4 p-2 sm:p-4 mb-8 md:mb-0">
            <div class="relative p-6 sm:p-8 shadow-2xl rounded-lg bg-gray-50 border-t-4 border-red-600 h-full">
              <div
                class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-red-600 text-white rounded-full w-12 h-12 sm:w-14 sm:h-14 flex items-center justify-center text-xl sm:text-3xl font-extrabold shadow-lg">
                03</div>
              <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mt-6 sm:mt-6">Branding & Finish</h3>
              <p class="text-gray-700 text-sm sm:text-lg mt-3">Exclusive logo application via embossing,
                foiling, or digital print.</p>
            </div>
          </div>
          <div class="w-full md:w-1/4 p-2 sm:p-4 mb-8 md:mb-0">
            <div class="relative p-6 sm:p-8 shadow-2xl rounded-lg bg-gray-50 border-t-4 border-red-600 h-full">
              <div
                class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-red-600 text-white rounded-full w-12 h-12 sm:w-14 sm:h-14 flex items-center justify-center text-xl sm:text-3xl font-extrabold shadow-lg">
                04</div>
              <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mt-6 sm:mt-6">Production & Delivery
              </h3>
              <p class="text-gray-700 text-sm sm:text-lg mt-3">Efficient bulk manufacturing and reliable
                global logistics fulfillment.</p>
            </div>
          </div>
        </div>

        <a href="#contact"
          class="mt-12 sm:mt-20 inline-block bg-red-600 text-white text-base sm:text-xl font-semibold px-10 sm:px-16 py-3 sm:py-5 rounded-full shadow-2xl hover:bg-red-700 transition duration-300 uppercase tracking-wider">
          Discuss Your Custom Project
        </a>
      </div>
    </section>

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
</body>

</html>