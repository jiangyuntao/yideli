<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Yideli Stationery - Premium Manufacturer</title>
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
</head>

<body
  class="bg-yideli-base text-yideli-text font-sans antialiased selection:bg-yideli-dark selection:text-white overflow-x-hidden">

  <div class="bg-yideli-dark text-yideli-base text-xs py-2 text-center px-4 tracking-wide">
    <p>Direct Source Factory · OEM/ODM Services · Worldwide Shipping</p>
  </div>

  <header x-data="{ mobileMenu: false, searchOpen: false }"
    class="sticky top-0 z-50 bg-yideli-base/90 backdrop-blur-sm transition-all duration-300 border-b border-transparent hover:border-yideli-line">
    <div class="max-w-[1920px] mx-auto px-6 lg:px-12 h-20 flex justify-between items-center">

      <nav class="hidden lg:flex gap-8 text-sm font-medium tracking-wide">
        <a href="#products" class="hover:text-yideli-dark/70 transition">Writing Instruments</a>
        <a href="#notebooks" class="hover:text-yideli-dark/70 transition">Paper & Notebooks</a>
        <a href="#custom" class="hover:text-yideli-dark/70 transition">Corporate Custom</a>
        <a href="#about" class="hover:text-yideli-dark/70 transition">Our Factory</a>
      </nav>

      <div class="flex-shrink-0">
        <a href="#" class="block">
          <img src="https://yideli.test/images/logo.jpg" alt="Yideli Logo"
            class="h-12 w-auto object-contain mix-blend-multiply">
        </a>
      </div>

      <div class="flex items-center gap-6">
        <button class="hidden lg:block text-sm font-medium hover:text-yideli-dark/70">Sign In</button>

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
            class="flex items-center gap-1 text-sm font-medium hover:text-yideli-dark/70 focus:outline-none">
            <span class="font-bold" x-text="current.split('_')[0].toUpperCase()"></span>
            <svg class="w-3 h-3 text-gray-500 transition-transform duration-200" :class="open ? 'rotate-180' : ''"
              fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>
      </div>
    </div>

    <div x-show="mobileMenu" x-transition x-cloak
      class="lg:hidden absolute top-full left-0 w-full bg-yideli-base border-t border-yideli-line shadow-lg">
      <div class="flex flex-col p-6 gap-4 text-lg font-serif text-yideli-dark">
        <a href="#" class="py-2 border-b border-yideli-line/30">Writing Instruments</a>
        <a href="#" class="py-2 border-b border-yideli-line/30">Paper & Notebooks</a>
        <a href="#" class="py-2 border-b border-yideli-line/30">Corporate Custom</a>
        <a href="#" class="py-2">About Us</a>
      </div>
    </div>
  </header>

  <section class="relative lg:h-[85vh] flex flex-col lg:flex-row overflow-hidden">
    <div class="lg:w-1/3 flex items-center justify-center p-12 lg:p-20 order-2 lg:order-1 bg-yideli-base">
      <div class="max-w-md">
        <span class="block text-xs font-bold tracking-[0.2em] uppercase mb-4 text-yideli-dark">Professional
          Stationery</span>
        <h1 class="text-4xl lg:text-5xl font-serif font-medium leading-tight mb-8 text-yideli-dark">
          Writing,<br>
          In Its Purest Form.
        </h1>
        <p class="text-gray-600 mb-10 leading-relaxed font-light">
          20 years of dedication to the craft of pen-making. We balance material and design to deliver a smooth, precise
          writing experience. Yideli, let inspiration flow naturally.
        </p>
        <a href="#products"
          class="inline-flex items-center px-8 py-4 border border-yideli-dark/20 hover:bg-yideli-dark hover:text-white transition duration-500 text-sm tracking-widest uppercase group">
          Discover Collection
          <span class="ml-2 group-hover:translate-x-1 transition-transform">→</span>
        </a>
      </div>
    </div>
    <div class="lg:w-2/3 h-[50vh] lg:h-auto order-1 lg:order-2 relative">
      <img src="https://images.unsplash.com/photo-1515096788709-a3cf4ce0a4a6?q=80&w=2500&auto=format&fit=crop"
        alt="Premium Pen Stationery" class="absolute inset-0 w-full h-full object-cover">
    </div>
  </section>

  <section class="py-24 lg:py-32 px-6 lg:px-12 bg-white">
    <div class="max-w-[1600px] mx-auto grid lg:grid-cols-2 gap-16 items-center">

      <div class="relative bg-[#F7F9F5] aspect-square flex items-center justify-center p-12 group">
        <img src="https://images.unsplash.com/photo-1585336261022-680e295ce3fe?q=80&w=1000&auto=format&fit=crop"
          alt="Yideli Signature Pen"
          class="w-3/4 h-3/4 object-contain mix-blend-multiply group-hover:scale-105 transition duration-700 ease-out">
      </div>

      <div class="lg:pl-12">
        <span class="text-yideli-dark text-xs font-bold tracking-widest mb-3 block uppercase">New Arrival</span>
        <h2 class="text-3xl lg:text-4xl font-serif text-yideli-dark mb-6">Classic Series · Matte Metal Fountain Pen</h2>

        <p class="text-gray-600 mb-8 leading-relaxed font-light text-lg">
          Designed for business professionals. Featuring a high-density brass barrel with a seven-layer matte finish.
          The German-imported Iridium nib ensures every stroke is silky smooth.
        </p>

        <div class="border-t border-yideli-line my-8">
          <div class="py-4 border-b border-yideli-line grid grid-cols-3 gap-4">
            <span class="font-bold text-sm text-yideli-dark">Material</span>
            <span class="col-span-2 text-gray-600 text-sm">Brass Barrel / Stainless Steel Nib</span>
          </div>
          <div class="py-4 border-b border-yideli-line grid grid-cols-3 gap-4">
            <span class="font-bold text-sm text-yideli-dark">Specs</span>
            <span class="col-span-2 text-gray-600 text-sm">142mm x 12mm / 35g</span>
          </div>
          <div class="py-4 border-b border-yideli-line grid grid-cols-3 gap-4">
            <span class="font-bold text-sm text-yideli-dark">Usage</span>
            <span class="col-span-2 text-gray-600 text-sm">Business Signing / Daily Use / Gifting</span>
          </div>
        </div>

        <button
          class="w-full lg:w-auto bg-yideli-dark text-white px-10 py-4 text-sm font-medium hover:bg-yideli-hover transition shadow-lg shadow-yideli-dark/20 uppercase tracking-wide">
          View Details & Quote
        </button>
      </div>
    </div>
  </section>

  <section class="py-20 bg-yideli-base border-t border-yideli-line overflow-hidden">
    <div class="px-6 lg:px-12 mb-12 flex justify-between items-end">
      <div>
        <h3 class="font-serif text-2xl text-yideli-dark mb-2">Curated Selection</h3>
        <p class="text-gray-500 text-sm">Fine Stationery for Professionals</p>
      </div>
      <a href="#" class="btn-minimal text-sm font-medium text-yideli-dark pb-1">View All Products</a>
    </div>

    <div class="flex overflow-x-auto no-scrollbar space-x-1 px-6 lg:px-12 pb-10 -mx-6 lg:-mx-12">

      <div class="min-w-[280px] lg:min-w-[320px] group cursor-pointer">
        <div class="aspect-[4/5] bg-white mb-6 overflow-hidden relative">
          <img src="https://images.unsplash.com/photo-1544816155-12df9643f363?q=80&w=800&auto=format&fit=crop"
            class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
          <div class="absolute inset-0 bg-black/0 group-hover:bg-black/5 transition duration-500"></div>
          <div
            class="absolute bottom-4 left-0 w-full text-center opacity-0 group-hover:opacity-100 transition duration-500 translate-y-4 group-hover:translate-y-0">
            <span
              class="bg-white/90 px-4 py-2 text-xs font-bold uppercase tracking-widest text-yideli-dark shadow-sm">Quick
              View</span>
          </div>
        </div>
        <h4 class="font-bold text-yideli-dark text-lg group-hover:underline decoration-1 underline-offset-4">
          Business Notebook Set</h4>
        <p class="text-gray-500 text-sm mt-1">A5 / 100g Dowling Paper / Gift Box</p>
      </div>

      <div class="min-w-[280px] lg:min-w-[320px] group cursor-pointer">
        <div class="aspect-[4/5] bg-white mb-6 overflow-hidden relative">
          <img src="https://images.unsplash.com/photo-1600093463592-8e36ae95ef56?q=80&w=800&auto=format&fit=crop"
            class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
        </div>
        <h4 class="font-bold text-yideli-dark text-lg group-hover:underline decoration-1 underline-offset-4">
          Minimal Desk Organizer</h4>
        <p class="text-gray-500 text-sm mt-1">ABS Material / Nordic Design</p>
      </div>

      <div class="min-w-[280px] lg:min-w-[320px] group cursor-pointer">
        <div class="aspect-[4/5] bg-white mb-6 overflow-hidden relative">
          <img src="https://yideli.test/images/notebook-1.jpg"
            class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
        </div>
        <h4 class="font-bold text-yideli-dark text-lg group-hover:underline decoration-1 underline-offset-4">
          Pro Art Color Pencils</h4>
        <p class="text-gray-500 text-sm mt-1">48 Colors / Oil-based Core</p>
      </div>

      <div class="min-w-[280px] lg:min-w-[320px] group cursor-pointer">
        <div class="aspect-[4/5] bg-white mb-6 overflow-hidden relative">
          <img src="https://images.unsplash.com/photo-1522125670776-3c7abb882bc2?q=80&w=800&auto=format&fit=crop"
            class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
        </div>
        <h4 class="font-bold text-yideli-dark text-lg group-hover:underline decoration-1 underline-offset-4">
          Executive Gel Pen</h4>
        <p class="text-gray-500 text-sm mt-1">0.5mm / Fast-dry Ink</p>
      </div>
    </div>
  </section>

  <section class="py-24 lg:py-32 px-6 lg:px-12 bg-white">
    <div class="max-w-[1600px] mx-auto grid lg:grid-cols-12 gap-12 lg:gap-24">

      <div class="lg:col-span-5 flex flex-col justify-center">
        <span class="text-yideli-dark text-sm font-bold tracking-widest mb-6 uppercase">Our Factory</span>
        <h2 class="text-3xl lg:text-5xl font-serif text-yideli-dark mb-8 leading-tight">
          From Dalian,<br>To The World.
        </h2>
        <div class="space-y-6 text-gray-600 font-light leading-relaxed">
          <p>
            Established in 2005, Yideli is located in the beautiful coastal city of Dalian. As a modern stationery
            enterprise integrating design, R&D, and production, we have always adhered to the belief that "Quality is
            Faith".
          </p>
          <p>
            Our factory boasts a production workshop of over 10,000 square meters, equipped with internationally
            advanced automated injection and assembly machinery. Whether it is OEM manufacturing or ODM design, we
            deliver trustworthy products with rigorous standards.
          </p>
        </div>
        <div class="mt-10">
          <a href="#about"
            class="inline-flex items-center px-8 py-4 border border-yideli-dark text-yideli-dark hover:bg-yideli-dark hover:text-white transition duration-300 uppercase text-sm tracking-wide">
            Explore Our Craft
            <span class="ml-2">→</span>
          </a>
        </div>
      </div>

      <div class="lg:col-span-7 grid grid-cols-2 gap-4 items-center">
        <div class="space-y-4 translate-y-8">
          <img src="https://yideli.test/images/line-circle-book-1.jpg"
            class="w-full h-64 object-cover grayscale hover:grayscale-0 transition duration-700">
          <img src="https://yideli.test/images/weekly-calendar-1.jpg"
            class="w-full h-80 object-cover grayscale hover:grayscale-0 transition duration-700">
        </div>
        <div class="space-y-4">
          <img src="https://images.unsplash.com/photo-1516961642265-531546e84af2?q=80&w=600&auto=format&fit=crop"
            class="w-full h-80 object-cover grayscale hover:grayscale-0 transition duration-700">
          <div class="w-full h-64 bg-yideli-dark flex items-center justify-center p-6 text-center">
            <p class="text-yideli-base font-serif italic text-xl">"Details make perfection."</p>
          </div>
        </div>
      </div>

    </div>
  </section>

  <footer class="bg-yideli-dark text-white pt-20 pb-10">
    <div
      class="max-w-[1600px] mx-auto px-6 lg:px-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 border-b border-white/20 pb-16">

      <div>
        <h3 class="text-2xl font-bold mb-6 font-serif tracking-wider">YIDELI</h3>
        <p class="text-white/70 text-sm leading-relaxed mb-6">
          Dalian Yideli Stationery Co., Ltd.<br>
          Focusing on High-end Stationery Mfg & Export<br>
          ISO 9001 Certified Enterprise
        </p>
      </div>

      <div>
        <h4 class="font-bold mb-6 text-sm uppercase tracking-widest">Products</h4>
        <ul class="space-y-4 text-sm text-white/70">
          <li><a href="#" class="hover:text-white transition">Writing Instruments</a></li>
          <li><a href="#" class="hover:text-white transition">Office Supplies</a></li>
          <li><a href="#" class="hover:text-white transition">School Stationery</a></li>
          <li><a href="#" class="hover:text-white transition">Art Supplies</a></li>
        </ul>
      </div>

      <div>
        <h4 class="font-bold mb-6 text-sm uppercase tracking-widest">Company</h4>
        <ul class="space-y-4 text-sm text-white/70">
          <li><a href="#" class="hover:text-white transition">Brand Story</a></li>
          <li><a href="#" class="hover:text-white transition">Factory Tour</a></li>
          <li><a href="#" class="hover:text-white transition">Sustainability</a></li>
          <li><a href="#" class="hover:text-white transition">Contact Us</a></li>
        </ul>
      </div>

      <div>
        <h4 class="font-bold mb-6 text-sm uppercase tracking-widest">Newsletter</h4>
        <p class="text-white/70 text-sm mb-4">Subscribe for the latest catalog and news.</p>
        <form class="flex border border-white/30 p-1">
          <input type="email" placeholder="Email Address"
            class="bg-transparent w-full px-3 py-2 text-white outline-none placeholder-white/40 text-sm">
          <button type="button" class="px-4 text-white hover:text-yideli-base">
            →
          </button>
        </form>
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

</body>

</html>