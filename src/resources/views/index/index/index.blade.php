@extends('index.layout')

@section('head')
  <title>Yideli - Professional Stationery</title>
@endsection

@section('main')
  <section class="relative lg:h-[80vh] flex flex-col lg:flex-row overflow-hidden">
    <!-- Swiper 轮播 -->
    <div class="swiper w-full h-[80vh] lg:h-auto order-1 lg:order-2 relative">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <img src="{{ asset('images/index-banner-1.jpg') }}" alt="Premium Pen Stationery" class="w-full h-full object-cover">
        </div>
        <div class="swiper-slide">
          <img src="{{ asset('images/index-banner-2.jpg') }}" alt="Premium Pen Stationery" class="w-full h-full object-cover">
        </div>
      </div>
      <!-- 分页器 -->
      <div class="swiper-pagination absolute bottom-4 left-1/2 transform -translate-x-1/2 z-10"></div>
      <!-- 导航按钮 -->
      <div class="swiper-button-prev absolute left-4 top-1/2 transform -translate-y-1/2 z-10 text-white/70 hover:text-white transition"></div>
      <div class="swiper-button-next absolute right-4 top-1/2 transform -translate-y-1/2 z-10 text-white/70 hover:text-white transition"></div>
    </div>
  </section>

  <section class="py-20 bg-yideli-base border-t border-yideli-line overflow-hidden">
    <div class="px-6 lg:px-12 mb-12 flex justify-between items-end">
      <div>
        <h3 class="font-serif text-2xl text-yideli-dark mb-2">Curated Selection</h3>
        <p class="text-gray-500 text-sm">Fine Stationery for Professionals</p>
      </div>
      <a href="{{ route('product.index', ['lang' => $lang]) }}"
        class="btn-minimal text-sm font-medium text-yideli-dark pb-1">View All Products</a>
    </div>

    <div class="w-full flex flex-col lg:flex-row justify-center items-center gap-4">

      <div class="min-w-[280px] lg:min-w-[320px] group cursor-pointer">
        <div class="aspect-[4/5] bg-white mb-6 overflow-hidden relative">
          <img src="{{ asset('images/weekly-calendar-1.jpg') }}"
            class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
          <div class="absolute inset-0 bg-black/0 group-hover:bg-black/5 transition duration-500"></div>
          <div
            class="absolute bottom-4 left-0 w-full text-center opacity-0 group-hover:opacity-100 transition duration-500 translate-y-4 group-hover:translate-y-0">
            <span
              class="bg-white/90 px-4 py-2 text-xs font-bold uppercase tracking-widest text-yideli-dark shadow-sm">Quick
              View</span>
          </div>
        </div>
        <h4 class="text-center font-bold text-yideli-dark text-lg group-hover:underline decoration-1 underline-offset-4">
          Planner & Diaries</h4>
      </div>

      <div class="min-w-[280px] lg:min-w-[320px] group cursor-pointer">
        <div class="aspect-[4/5] bg-white mb-6 overflow-hidden relative">
          <img src="{{ asset('images/line-circle-book-1.jpg') }}"
            class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
        </div>
        <h4 class="text-center font-bold text-yideli-dark text-lg group-hover:underline decoration-1 underline-offset-4">
          Spiral Notebook</h4>
      </div>

      <div class="min-w-[280px] lg:min-w-[320px] group cursor-pointer">
        <div class="aspect-[4/5] bg-white mb-6 overflow-hidden relative">
          <img src="{{ asset('images/notebook-1.jpg') }}"
            class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
        </div>
        <h4 class="text-center font-bold text-yideli-dark text-lg group-hover:underline decoration-1 underline-offset-4">
          Notebook</h4>
      </div>

      <div class="min-w-[280px] lg:min-w-[320px] group cursor-pointer">
        <div class="aspect-[4/5] bg-[#fbfbee] mb-6 overflow-hidden relative">
          <img src="{{ asset('images/binding-book-1.jpg') }}"
            class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
        </div>
        <h4 class="text-center font-bold text-yideli-dark text-lg group-hover:underline decoration-1 underline-offset-4">
          Elastic band notebook</h4>
      </div>
    </div>
  </section>

  <section class="py-24 lg:py-32 px-6 lg:px-12">
    <div class="max-w-[1600px] mx-auto grid lg:grid-cols-12 gap-12 lg:gap-24">

      <div class="lg:col-span-5 flex flex-col justify-center">
        <span class="text-yideli-dark text-sm font-bold tracking-widest mb-6 uppercase">Our Factory</span>
        <h2 class="text-3xl lg:text-5xl font-serif text-yideli-dark mb-8 leading-tight">
          YIDELI: Crafting a Legacy in Every Page
        </h2>
        <div class="space-y-6 text-gray-600 font-light leading-relaxed">
          <p>
            Founded in 1989, YIDELI Industrial Trading Co., Ltd. specializes in the manufacture of high-quality diaries, notebooks, planners, journals, and wire-bound notebooks. We are experts in producing well-crafted covers utilizing materials such as printable PU, solid PU, PVC, and genuine leather.
          </p>
          <p>
            Our philosophy is to prioritize excellence over scale, with an unwavering commitment to detail and quality. This principle is the cornerstone of our long-standing partnerships.
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
          <img src="{{ asset('images/yearly-calendar-1.jpg') }}"
            class="w-full h-64 object-cover grayscale hover:grayscale-0 transition duration-700">
          <img src="{{ asset('images/yearly-calendar-2.jpg') }}"
            class="w-full h-80 object-cover grayscale hover:grayscale-0 transition duration-700">
        </div>
        <div class="space-y-4">
          <img src="{{ asset('images/yearly-calendar-3.jpg') }}"
            class="w-full h-80 object-cover grayscale hover:grayscale-0 transition duration-700">
          <div class="w-full h-64 bg-yideli-dark flex items-center justify-center p-6 text-center">
            <p class="text-yideli-base font-serif italic text-xl">"Details make perfection."</p>
          </div>
        </div>
      </div>

    </div>
  </section>

   <section class="bg-yideli-dark text-yideli-base py-16">
    <div
      class="max-w-[1600px] mx-auto px-6 lg:px-12 grid grid-cols-2 md:grid-cols-4 gap-8 text-center divide-x divide-white/10">
      <div>
        <span class="block text-4xl lg:text-5xl font-serif font-bold mb-2">2005</span>
        <span class="text-sm uppercase tracking-widest opacity-80">Established</span>
      </div>
      <div>
        <span class="block text-4xl lg:text-5xl font-serif font-bold mb-2">10k+</span>
        <span class="text-sm uppercase tracking-widest opacity-80">Square Meters</span>
      </div>
      <div>
        <span class="block text-4xl lg:text-5xl font-serif font-bold mb-2">50+</span>
        <span class="text-sm uppercase tracking-widest opacity-80">Export Countries</span>
      </div>
      <div>
        <span class="block text-4xl lg:text-5xl font-serif font-bold mb-2">ISO</span>
        <span class="text-sm uppercase tracking-widest opacity-80">Certified Factory</span>
      </div>
    </div>
  </section>

  <section class="py-6 lg:py-12 px-6 lg:px-12 bg-[#fcfcef]">
    <img class="w-full lg:max-w-[800px] mx-auto" src="{{ asset('images/cert.jpg') }}" alt="">
  </section>
@endsection
