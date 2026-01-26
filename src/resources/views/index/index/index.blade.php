@extends('index.layout')

@section('head')
  <title>Yideli - Professional Stationery</title>
@endsection

@section('main')
  <section class="relative w-full mx-auto overflow-hidden shadow-2xl group" x-data="carousel()" x-init="init()"
    @mouseenter="stopAutoplay()" @mouseleave="startAutoplay()" x-cloak>

    <div class="flex w-full aspect-[16/9] md:aspect-[21/9] transition-transform duration-700 ease-in-out"
      :style="`transform: translateX(-${active * 100}%)`">

      <template x-for="(slide, index) in slides" :key="index">
        <div class="w-full flex-shrink-0 relative h-full">

          <a class="block w-full h-full relative cursor-pointer" :href="slide.custom_url || '#'"
            :target="slide.in_new_windows == 1 ? '_blank' : '_self'">

            <img class="w-full h-full object-cover" :src="getImageUrl(slide.image)" :alt="slide.title">

            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-90"></div>

            <div class="absolute bottom-0 start-0 p-8 w-full md:w-2/3">
              <h2
                class="text-white text-2xl md:text-4xl font-bold leading-tight drop-shadow-md transform transition-all duration-500 translate-y-0"
                x-text="slide.title"></h2>

              <div class="mt-4 inline-flex items-center text-white/80 text-sm font-medium hover:text-white transition">
                <span>{{ __('home.read_more') }}</span>
                <svg class="w-4 h-4 ms-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3">
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
    <button
      class="absolute start-4 top-1/2 -translate-y-1/2 p-2 text-yideli-base hover:text-white hover:scale-110 transition-all duration-300 opacity-0 group-hover:opacity-100 focus:outline-none translate-x-4 rtl:translate-x-4 group-hover:translate-x-0 group-hover:rtl:translate-x-0 drop-shadow-[0_0_5px_rgba(0,0,0,0.9)]"
      @click="prev()">
      <svg class="w-8 h-8 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path>
      </svg>
    </button>

    <button
      class="absolute end-4 top-1/2 -translate-y-1/2 p-2 text-yideli-base hover:text-white hover:scale-110 transition-all duration-300 opacity-0 group-hover:opacity-100 focus:outline-none -translate-x-4 rtl:translate-x-4 group-hover:translate-x-0 group-hover:rtl:translate-x-0 drop-shadow-[0_0_5px_rgba(0,0,0,0.9)]"
      @click="next()">
      <svg class="w-8 h-8 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
      </svg>
    </button>

    <div class="absolute bottom-6 end-6 flex space-x-2">
      <template x-for="(slide, index) in slides" :key="index">
        <button class="h-2 rounded-full transition-all duration-300 focus:outline-none" @click="active = index"
          :class="active === index ? 'w-8 bg-white' : 'w-2 bg-white/50 hover:bg-white/80'">
        </button>
      </template>
    </div>
  </section>

  <section class="py-24 lg:py-32 px-6 lg:px-12">
    <div
      class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto grid lg:grid-cols-12 gap-12 lg:gap-24">

      <div class="lg:col-span-5 flex flex-col justify-center">
        <span
          class="text-yideli-dark text-sm font-bold tracking-widest mb-6 uppercase">{{ __('home.our_factory') }}</span>
        <h2 class="text-3xl lg:text-5xl font-serif text-yideli-dark mb-8 leading-tight">
          <img class="h-60 w-auto" src="{{ asset('images/start-2.webp') }}">
        </h2>
        <div class="space-y-6 text-gray-800 text-lg leading-relaxed">
          <p>
            {{ __('about.heritage_text_1') }}
          </p>
          <p>
            {{ __('about.heritage_text_2') }}
          </p>
        </div>
        <div class="mt-10">
          <a class="inline-flex items-center px-8 py-4 border border-yideli-dark text-yideli-dark hover:bg-yideli-dark hover:text-white transition duration-300 uppercase text-sm tracking-wide"
            href="{{ route('page.show', ['lang' => $lang, 'slug' => 'about-us']) }}">
            {{ __('home.explore_craft') }}
            <span class="ms-2">→</span>
          </a>
        </div>
      </div>

      <div class="lg:col-span-7 flex items-center justify-center h-full">
        <video class="w-full h-auto object-contain rounded-lg shadow-lg" autoplay controls preload="metadata" muted
          playsinline>
          <source src="{{ asset('videos/output_720p_crf26.mp4') }}" type="video/mp4">
          Your browser does not support HTML5 video playback. Please upgrade your browser.
        </video>
      </div>

    </div>
  </section>

  {{-- <section class="px-6 lg:px-12 bg-[#347e73]">
    <img class="w-full lg:max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto"
      src="{{ asset('images/cert-1-big-0-0.webp') }}" alt="">
  </section> --}}

  <section class="w-full bg-[#347e73] font-sans">
    <div
      class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto grid grid-cols-1 lg:grid-cols-[2fr_3fr_2fr] text-white">

      <div class="bg-[#347e73] ps-10 pe-4 py-8 flex flex-col justify-center min-h-[280px]">
        <div class="w-full">
          <h3 class="mb-40 text-3xl lg:text-4xl font-[800]">35+</h3>
          <p class="uppercase text-sm tracking-widest leading-relaxed mt-6 font-medium">
            Years of been in the business <br> since 1989
          </p>
        </div>
      </div>

      <div class="flex flex-col text-[#347e73]">

        <div class="bg-[#fcfcef] p-10 lg:p-12 flex flex-col justify-center flex-1">
          <div class="w-full">
            <h3 class="text-3xl lg:text-4xl font-[800] mb-2">35000+ m²</h3>
            <p class="uppercase text-sm tracking-widest font-normal">
              Modern production base in <strong>Taizhou</strong>
            </p>
          </div>
        </div>

        <div class="bg-yideli-base p-10 lg:p-12 flex flex-col justify-center flex-1">
          <div class="w-full">
            <h3 class="text-3xl lg:text-4xl font-[800] mb-2">20+</h3>
            <p class="uppercase text-sm tracking-widest text-right font-normal leading-relaxed">
              <strong>Designers</strong> & <strong>Modelers </strong><br> in Hangzhou R&D Center
            </p>
          </div>
        </div>
      </div>

      <div class="bg-[#347e73] ps-12 pe-4 py-8 flex flex-col justify-between min-h-[280px]">
        <div>
          <h3 class="text-3xl lg:text-4xl font-[800] mb-2">300+</h3>
          <p class="mt-8 uppercase text-sm tracking-widest font-medium leading-relaxed">
            Dedicated Professionals in our team
          </p>
        </div>

        <div class="mt-8 lg:mt-0">
          <h4 class="font-[800] uppercase text-sm tracking-widest mb-1">Global Network</h4>
          <p class="uppercase text-sm tracking-widest font-normal">
            We export to over countries
          </p>
        </div>
      </div>

    </div>
  </section>

  <section class="py-20 bg-yideli-base border-t border-yideli-line overflow-hidden">
    <div
      class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto px-6 lg:px-12 mb-12 flex justify-between items-end">
      <div>
        <h3 class="font-serif text-4xl font-black text-yideli-dark mb-2">{{ __('home.curated_selection') }}</h3>
        <p class="text-gray-500 text-sm">{{ __('home.fine_stationery') }}</p>
      </div>
      <a class="btn-minimal text-sm font-medium text-yideli-dark pb-1"
        href="{{ route('product.index', ['lang' => $lang]) }}">{{ __('home.view_all_products') }}</a>
    </div>

    <div
      class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto px-6 lg:px-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 min-[2561px]:grid-cols-4 gap-8">

      @foreach ($categories as $category)
        <a class="group cursor-pointer block w-full"
          href="{{ route('product.index', ['lang' => $lang, 'slug' => $category->slug]) }}">
          <div class="aspect-[4/5] bg-white mb-6 overflow-hidden relative w-full">
            <img class="w-full h-full object-cover group-hover:scale-105 transition duration-700"
              src="{{ asset('storage/' . $category->cover_image) }}">
            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/5 transition duration-500"></div>
            <div
              class="absolute bottom-4 start-0 w-full text-center opacity-0 group-hover:opacity-100 transition duration-500 translate-y-4 group-hover:translate-y-0">
              <span
                class="bg-white/90 px-4 py-2 text-xs font-bold uppercase tracking-widest text-yideli-dark shadow-sm">{{ __('home.quick_view') }}</span>
            </div>
          </div>
          <h4 class="text-center font-bold text-yideli-dark text-lg group-hover:underline decoration-1 underline-offset-4">
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