@extends('index.layout')

@section('head')
  <title>Yideli - Professional Stationery</title>
@endsection

@section('main')
  <section x-data="carousel()"
           x-init="init()"
           @mouseenter="stopAutoplay()"
           @mouseleave="startAutoplay()"
           class="relative w-full mx-auto overflow-hidden shadow-2xl group"
           x-cloak>

    <div class="flex w-full aspect-[16/9] md:aspect-[21/9] transition-transform duration-700 ease-in-out"
         :style="`transform: translateX(-${active * 100}%)`">

      <template x-for="(slide, index) in slides"
                :key="index">
        <div class="w-full flex-shrink-0 relative h-full">

          <a :href="slide.custom_url || '#'"
             :target="slide.in_new_windows == 1 ? '_blank' : '_self'"
             class="block w-full h-full relative cursor-pointer">

            <img :src="getImageUrl(slide.image)"
                 :alt="slide.title"
                 class="w-full h-full object-cover">

            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-90"></div>

            <div class="absolute bottom-0 start-0 p-8 w-full md:w-2/3">
              <h2 class="text-white text-2xl md:text-4xl font-bold leading-tight drop-shadow-md transform transition-all duration-500 translate-y-0"
                  x-text="slide.title"></h2>

              <div class="mt-4 inline-flex items-center text-white/80 text-sm font-medium hover:text-white transition">
                <span>READ MORE</span>
                <svg class="w-4 h-4 ms-2"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">
                  <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M14 5l7 7m0 0l-7 7m7-7H3">
                  </path>
                </svg>
              </div>
            </div>
          </a>
        </div>
      </template>
    </div>

    <div
         class="absolute inset-y-0 start-0 w-24 bg-gradient-to-r from-black/40 to-transparent pointer-events-none opacity-0 group-hover:opacity-100 transition-opacity duration-300">
    </div>
    <div
         class="absolute inset-y-0 end-0 w-24 bg-gradient-to-l from-black/40 to-transparent pointer-events-none opacity-0 group-hover:opacity-100 transition-opacity duration-300">
    </div>
    <button @click="prev()"
            class="absolute start-4 top-1/2 -translate-y-1/2 p-2 text-yideli-base hover:text-white hover:scale-110 transition-all duration-300 opacity-0 group-hover:opacity-100 focus:outline-none translate-x-4 rtl:translate-x-4 group-hover:translate-x-0 group-hover:rtl:translate-x-0 drop-shadow-[0_0_5px_rgba(0,0,0,0.9)]">
      <svg class="w-8 h-8 rtl:rotate-180"
           fill="none"
           stroke="currentColor"
           viewBox="0 0 24 24">
        <path stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2.5"
              d="M15 19l-7-7 7-7"></path>
      </svg>
    </button>

    <button @click="next()"
            class="absolute end-4 top-1/2 -translate-y-1/2 p-2 text-yideli-base hover:text-white hover:scale-110 transition-all duration-300 opacity-0 group-hover:opacity-100 focus:outline-none -translate-x-4 rtl:translate-x-4 group-hover:translate-x-0 group-hover:rtl:translate-x-0 drop-shadow-[0_0_5px_rgba(0,0,0,0.9)]">
      <svg class="w-8 h-8 rtl:rotate-180"
           fill="none"
           stroke="currentColor"
           viewBox="0 0 24 24">
        <path stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2.5"
              d="M9 5l7 7-7 7"></path>
      </svg>
    </button>

    <div class="absolute bottom-6 end-6 flex space-x-2">
      <template x-for="(slide, index) in slides"
                :key="index">
        <button @click="active = index"
                class="h-2 rounded-full transition-all duration-300 focus:outline-none"
                :class="active === index ? 'w-8 bg-white' : 'w-2 bg-white/50 hover:bg-white/80'">
        </button>
      </template>
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
            Founded in 1989, YIDELI Industrial Trading Co., Ltd. specializes in the manufacture of high-quality diaries,
            notebooks, planners, journals, and wire-bound notebooks. We are experts in producing well-crafted covers
            utilizing materials such as printable PU, solid PU, PVC, and genuine leather.
          </p>
          <p>
            Our philosophy is to prioritize excellence over scale, with an unwavering commitment to detail and quality.
            This principle is the cornerstone of our long-standing partnerships.
          </p>
        </div>
        <div class="mt-10">
          <a href="{{ route('page.show', ['lang' => $lang, 'slug' => 'about-us']) }}"
             class="inline-flex items-center px-8 py-4 border border-yideli-dark text-yideli-dark hover:bg-yideli-dark hover:text-white transition duration-300 uppercase text-sm tracking-wide">
            Explore Our Craft
            <span class="ms-2">→</span>
          </a>
        </div>
      </div>

      <div class="lg:col-span-7 relative h-full min-h-[500px]">
        <iframe class="absolute inset-0 w-full h-full object-cover rounded-lg shadow-2xl"
                src="https://www.youtube.com/embed/XsQ_MKXkWv0?si=DFDwHxJqeoyyDiJ-"
                title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin"
                allowfullscreen></iframe>
      </div>

    </div>
  </section>

  <section class="px-6 lg:px-12 bg-[#347e73]">
    <img class="w-full lg:max-w-[1400px] mx-auto"
         src="{{ asset('images/cert-1-big-0-0.jpg') }}"
         alt="">
  </section>
  <section class="py-6 lg:py-12 px-6 lg:px-12 bg-[#fcfcef]">
    <img class="w-full lg:max-w-[1400px] mx-auto"
         src="{{ asset('images/cert-1-big-0-1.jpg') }}"
         alt="">
  </section>

  <section class="py-20 bg-yideli-base border-t border-yideli-line overflow-hidden">
    <div class="max-w-[1600px] mx-auto px-6 lg:px-12 mb-12 flex justify-between items-end">
      <div>
        <h3 class="font-serif text-2xl text-yideli-dark mb-2">Curated Selection</h3>
        <p class="text-gray-500 text-sm">Fine Stationery for Professionals</p>
      </div>
      <a href="{{ route('product.index', ['lang' => $lang]) }}"
         class="btn-minimal text-sm font-medium text-yideli-dark pb-1">View All Products</a>
    </div>

    <div class="w-full flex flex-col lg:flex-row justify-center items-center gap-4">

      @foreach ($categories as $category)
        <a href="{{ route('product.index', ['lang' => $lang, 'slug' => $category->slug]) }}"
           class="min-w-[280px] lg:min-w-[320px] group cursor-pointer">
          <div class="aspect-[4/5] bg-white mb-6 overflow-hidden relative">
            <img src="{{ asset('storage/' . $category->cover_image) }}"
                 class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/5 transition duration-500"></div>
            <div
                 class="absolute bottom-4 start-0 w-full text-center opacity-0 group-hover:opacity-100 transition duration-500 translate-y-4 group-hover:translate-y-0">
              <span
                    class="bg-white/90 px-4 py-2 text-xs font-bold uppercase tracking-widest text-yideli-dark shadow-sm">Quick
                View</span>
            </div>
          </div>
          <h4
              class="text-center font-bold text-yideli-dark text-lg group-hover:underline decoration-1 underline-offset-4">
            {{ $category->name }}
          </h4>
        </a>
      @endforeach

    </div>
  </section>
@endsection

@section('script')
  <script>
    function carousel() {
      return {
        active: 0,
        interval: null,
        slides: @json($settings->home_carousel),

        init() {
          this.startAutoplay();
        },

        getImageUrl(path) {
          if (path.startsWith('http')) {
            return path;
          }
          return '/storage/' + path;
        },

        next() {
          this.active = this.active === this.slides.length - 1 ? 0 : this.active + 1;
        },

        prev() {
          this.active = this.active === 0 ? this.slides.length - 1 : this.active - 1;
        },

        startAutoplay() {
          this.interval = setInterval(() => {
            this.next();
          }, 5000);
        },

        stopAutoplay() {
          clearInterval(this.interval);
        }
      }
    }
  </script>
@endsection
