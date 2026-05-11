@extends('index.layout')

@section('title', __('layout.nav_about_us'))

@section('head')
  <style>
    @keyframes marquee {
      0% {
        transform: translateX(0);
      }

      100% {
        transform: translateX(-50%);
      }
    }

    .animate-marquee {
      animation: marquee 20s linear infinite;
    }

    .group:hover .pause {
      animation-play-state: paused;
    }
  </style>
@endsection

@section('main')
  <main
        class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto px-4 py-12 font-serif sm:px-6 md:py-20">
    <section class="mb-12 grid grid-cols-1 gap-6 md:mb-16 lg:grid-cols-10 lg:items-stretch">
      <div class="lg:col-span-6">
        <div class="h-full min-h-[420px] overflow-hidden rounded-lg bg-black shadow-lg lg:min-h-[560px]">
          <video class="h-full w-full object-cover"
                 autoplay
                 controls
                 preload="metadata"
                 muted
                 playsinline>
            <source src="{{ asset('videos/output_720p_crf26.mp4') }}"
                    type="video/mp4">
            Your browser does not support HTML5 video playback. Please upgrade your browser.
          </video>
        </div>
      </div>

      <div class="lg:col-span-4">
        @include('index.inquire.hero-form', [
            'heroInquiryId' => 'about-us-hero-inquiry',
            'heroInquiryReturnTo' => route('page.show', ['lang' => $lang, 'slug' => 'about-us']) . '#about-us-hero-inquiry',
            'heroInquiryClass' => 'flex h-full flex-col bg-white p-6 shadow-2xl sm:p-8',
        ])
      </div>
    </section>

    <section class="grid grid-cols-1 md:grid-cols-12 gap-6 mb-16 items-start">
      <div class="md:col-span-12">
        <h2 class="text-2xl md:text-4xl font-black text-[#1F5F53] mb-12">{!! nl2br(__('about.heritage_title')) !!}</h2>
        <div class="space-y-4 text-sm md:text-lg leading-relaxed text-gray-800">
          <p>
            {!! nl2br(__('about.heritage_text_1')) !!}
          </p>
          <p>
            {!! nl2br(__('about.heritage_text_2')) !!}
          </p>
        </div>
      </div>
    </section>

    <section class="mb-16 w-full md:mb-24">
      <div class="relative w-full h-64 md:h-96 bg-gray-300 overflow-hidden rounded-sm shadow-sm">
        <img class="w-full h-full object-cover opacity-90"
             src="{{ asset('images/about-us/Heritage-Commitment.png') }}"
             alt="Factory Building">
        <div class="absolute inset-0 bg-white/20"></div>
      </div>
    </section>

    <section class="mb-16 grid grid-cols-1 items-center gap-10 md:mb-24 md:grid-cols-12 md:gap-12">
      <div class="order-2 md:col-span-7 md:order-1">
        <h2 class="text-2xl md:text-4xl font-black text-[#1F5F53] mb-12">{!! nl2br(__('about.integrated_title')) !!}</h2>
        <div class="text-sm md:text-lg leading-relaxed text-gray-800 space-y-4">
          <p>
            {!! nl2br(__('about.integrated_text')) !!}
          </p>
          <ul class="list-disc ps-5 space-y-1">
            <li>{!! nl2br(__('about.integrated_list_1')) !!}</li>
            <li>{!! nl2br(__('about.integrated_list_2')) !!}</li>
            <li>{!! nl2br(__('about.integrated_list_3')) !!}</li>
          </ul>
        </div>
      </div>

      <div class="order-1 rounded-sm shadow-sm md:order-2 md:col-span-5 md:h-auto md:pt-16">
        <div class="grid grid-cols-2 gap-3">
          <div class="aspect-[16/10] bg-[#367C6D] rounded-sm">
            <img class="w-full h-full object-cover"
                 src="{{ asset('images/about-us/Integrated-Manufacturing-1.jpg') }}">
          </div>
          <div class="aspect-[16/10] bg-[#367C6D] rounded-sm">
            <img class="w-full h-full object-cover"
                 src="{{ asset('images/about-us/Integrated-Manufacturing-2.jpg') }}">
          </div>
          <div class="aspect-[16/10] bg-[#367C6D] rounded-sm">
            <img class="w-full h-full object-cover"
                 src="{{ asset('images/about-us/Integrated-Manufacturing-3.jpg') }}">
          </div>
          <div class="aspect-[16/10] bg-[#367C6D] rounded-sm">
            <img class="w-full h-full object-cover"
                 src="{{ asset('images/about-us/Integrated-Manufacturing-4.jpg') }}">
          </div>
        </div>
      </div>
    </section>

    <section class="mb-16 grid grid-cols-1 items-center gap-10 md:mb-24 md:grid-cols-12 md:gap-12">
      <div class="grid grid-cols-2 md:col-span-6 gap-3">
        <div class="rounded-sm overflow-hidden aspect-[16/9]">
          <img class="w-full h-full object-cover"
               src="{{ asset('images/about-us/Integrated-Manufacturing-5.jpg') }}">
        </div>
        <div class="rounded-sm overflow-hidden aspect-[16/9]">
          <img class="w-full h-full object-cover"
               src="{{ asset('images/about-us/Integrated-Manufacturing-6.jpg') }}">
        </div>
        <div class="rounded-sm overflow-hidden aspect-[16/9]">
          <img class="w-full h-full object-cover"
               src="{{ asset('images/about-us/Integrated-Manufacturing-7.jpg') }}">
        </div>
        <div class="rounded-sm overflow-hidden aspect-[16/9]">
          <img class="w-full h-full object-cover"
               src="{{ asset('images/about-us/Integrated-Manufacturing-8.jpg') }}">
        </div>
        <div class="rounded-sm overflow-hidden aspect-[16/9]">
          <img class="w-full h-full object-cover"
               src="{{ asset('images/about-us/Integrated-Manufacturing-9.jpg') }}">
        </div>
        <div class="rounded-sm overflow-hidden aspect-[16/9]">
          <img class="w-full h-full object-cover"
               src="{{ asset('images/about-us/Integrated-Manufacturing-10.png') }}">
        </div>
      </div>
      <div class="md:col-span-6">
        <ul class="space-y-4 ps-0 text-sm font-medium text-[#1F5F53] md:ps-24 md:text-base">
          <li class="flex items-start gap-2">
            <span class="w-1.5 h-1.5 bg-[#1F5F53] rounded-full"></span>
            {!! nl2br(__('about.machine_1')) !!}
          </li>
          <li class="flex items-start gap-2">
            <span class="w-1.5 h-1.5 bg-[#1F5F53] rounded-full"></span>
            {!! nl2br(__('about.machine_2')) !!}
          </li>
          <li class="flex items-start gap-2">
            <span class="w-1.5 h-1.5 bg-[#1F5F53] rounded-full"></span>
            {!! nl2br(__('about.machine_3')) !!}
          </li>
          <li class="flex items-start gap-2">
            <span class="w-1.5 h-1.5 bg-[#1F5F53] rounded-full"></span>
            {!! nl2br(__('about.machine_4')) !!}
          </li>
          <li class="flex items-start gap-2">
            <span class="w-1.5 h-1.5 bg-[#1F5F53] rounded-full"></span>
            {!! nl2br(__('about.machine_5')) !!}
          </li>
          <li class="flex items-start gap-2">
            <span class="w-1.5 h-1.5 bg-[#1F5F53] rounded-full"></span>
            {!! nl2br(__('about.machine_6')) !!}
          </li>
          <li class="flex items-start gap-2">
            <span class="w-1.5 h-1.5 bg-[#1F5F53] rounded-full"></span>
            {!! nl2br(__('about.machine_7')) !!}
          </li>
          <li class="flex items-start gap-2">
            <span class="w-1.5 h-1.5 bg-[#1F5F53] rounded-full"></span>
            {!! nl2br(__('about.machine_8')) !!}
          </li>
          <li class="flex items-start gap-2">
            <span class="w-1.5 h-1.5 bg-[#1F5F53] rounded-full"></span>
            {!! nl2br(__('about.machine_9')) !!}
          </li>
          <li class="flex items-start gap-2">
            <span class="w-1.5 h-1.5 bg-[#1F5F53] rounded-full"></span>
            {!! nl2br(__('about.machine_10')) !!}
          </li>
        </ul>
      </div>
    </section>
    <section class="mb-12">
      <div class="grid grid-cols-1 md:grid-cols-12 gap-12 items-center mb-12">
        <div class="md:col-span-7">
          <h2 class="text-2xl md:text-4xl font-black text-[#1F5F53] mb-6">{!! nl2br(__('about.quality_title')) !!}</h2>
          <div class="text-sm md:text-lg leading-relaxed text-gray-800 space-y-4">
            <p>
              {!! nl2br(__('about.quality_text')) !!}
            </p>
          </div>
        </div>
        <div class="md:col-span-5 grid grid-cols-2 gap-3">
          <div class="aspect-[16/9] bg-[#367C6D] rounded-sm opacity-90">
            <img class="w-full h-full object-cover"
                 src="{{ asset('images/about-us/Quality-Compliance-1.jpg') }}">
          </div>
          <div class="aspect-[16/9] bg-[#367C6D] rounded-sm opacity-90">
            <img class="w-full h-full object-cover"
                 src="{{ asset('images/about-us/Quality-Compliance-2.jpg') }}">
          </div>
          <div class="aspect-[16/9] bg-[#367C6D] rounded-sm opacity-90">
            <img class="w-full h-full object-cover"
                 src="{{ asset('images/about-us/Quality-Compliance-3.jpg') }}">
          </div>
          <div class="aspect-[16/9] bg-[#367C6D] rounded-sm opacity-90">
            <img class="w-full h-full object-cover"
                 src="{{ asset('images/about-us/Quality-Compliance-4.jpg') }}">
          </div>
        </div>
      </div>

      <div class="mb-6">
        <div class="flex flex-col items-center">
          <div class="w-full overflow-hidden relative group">

            <div class="flex w-max gap-4 animate-marquee group-hover:pause md:gap-8">

              @for ($i = 0; $i < 3; $i++)
                @for ($j = 1; $j <= 8; $j++)
                  <img class="h-40 w-auto rounded-sm shadow-sm sm:h-52 md:h-64"
                       src="{{ asset('images/slides/' . $j . '.webp') }}">
                @endfor
              @endfor
            </div>

            <div
                 class="absolute top-0 start-0 w-16 h-full bg-gradient-to-r from-yideli-base to-transparent pointer-events-none">
            </div>
            <div
                 class="absolute top-0 end-0 w-16 h-full bg-gradient-to-l from-yideli-base to-transparent pointer-events-none">
            </div>
          </div>
        </div>

        <div class="flex justify-end w-full">
          <img class="w-full md:w-1/3 h-auto"
               src="{{ asset('images/line.jpg') }}"
               alt="separator" />
        </div>
      </div>
    </section>

    <section class="mb-16 grid grid-cols-1 items-center gap-12 md:mb-20 md:grid-cols-12 md:gap-24">
      <div class="md:col-span-6 order-2 md:order-1">
        <div class="flex flex-col gap-4">
          <div class="grid grid-cols-2 gap-0">
            <div class="aspect-[4/3] bg-[#367C6D] rounded-sm mb-2">
              <img class="w-full h-full object-fit"
                   src="{{ asset('images/about-us/Global-Reach-1.jpg') }}">
            </div>
            <div class="aspect-[4/3] bg-[#367C6D] rounded-sm mb-1">
              <img class="w-full h-full object-fit"
                   src="{{ asset('images/about-us/Global-Reach-2.jpg') }}">
            </div>
            <div class="aspect-[4/3] bg-[#367C6D] rounded-sm">
              <img class="w-full h-full object-fit"
                   src="{{ asset('images/about-us/Global-Reach-3.jpg') }}">
            </div>
            <div class="aspect-[4/3] bg-[#367C6D] rounded-sm">
              <img class="w-full h-full object-fit"
                   src="{{ asset('images/about-us/Global-Reach-4.jpg') }}">
            </div>
          </div>
        </div>
      </div>

      <div class="md:col-span-6 order-1 md:order-2">
        <h2 class="text-2xl md:text-4xl font-black text-[#1F5F53] mb-12">{!! nl2br(__('about.global_title')) !!}</h2>
        <div class="text-sm md:text-lg leading-relaxed text-gray-800 space-y-4">
          <p>
            {!! nl2br(__('about.global_text_1')) !!}
          </p>
          <p>
            {!! nl2br(__('about.global_text_2')) !!}
          </p>
        </div>
      </div>
    </section>

    <section class="mb-16 grid grid-cols-1 items-center gap-12 md:mb-20 md:grid-cols-12 md:gap-24">
      <div class="md:col-span-6">
        <h2 class="text-2xl md:text-4xl font-black text-[#1F5F53] mb-12">{!! nl2br(__('about.rnd_title')) !!}</h2>
        <div class="text-sm md:text-lg leading-relaxed text-gray-800 space-y-4">
          <p>
            {!! nl2br(__('about.rnd_text_1')) !!}
          </p>
          <p>
            {!! nl2br(__('about.rnd_text_2')) !!}
          </p>
        </div>
        <div class="flex justify-end w-full py-4">
          <img class="w-full md:w-2/3 h-auto"
               src="{{ asset('images/line.jpg') }}"
               alt="separator" />
        </div>
      </div>

      <div class="md:col-span-6 grid grid-cols-2 gap-3">
        <img class="w-full aspect-[1/1] object-cover rounded-sm shadow-sm"
             src="{{ asset('images/about-us/RandD-Innovation-1.jpg') }}"
             alt="R&D Team Member">
        <img class="w-full aspect-[1/1] object-cover rounded-sm shadow-sm"
             src="{{ asset('images/about-us/RandD-Innovation-2.jpg') }}"
             alt="Office Environment">
        <img class="w-full aspect-[1/1] object-cover rounded-sm shadow-sm"
             src="{{ asset('images/about-us/RandD-Innovation-3.jpg') }}"
             alt="R&D Team Member">
        <img class="w-full aspect-[1/1] object-cover rounded-sm shadow-sm"
             src="{{ asset('images/about-us/RandD-Innovation-4.jpg') }}"
             alt="Office Environment">
      </div>
    </section>

    <section class="mb-12">
      <div class="mb-3 grid grid-cols-1 items-center gap-12 md:grid-cols-12 md:gap-24">
        <div class="md:col-span-6 order-2 md:order-1 grid grid-cols-1 gap-3">
          <div class="aspect-[32/12] bg-[#367C6D] rounded-sm opacity-90">
            <img class="w-full h-full object-cover"
                 src="{{ asset('images/about-us/Your-Strategic-Partner-1.jpg') }}">
          </div>
          <div class="aspect-[32/12] bg-[#367C6D] rounded-sm opacity-90">
            <img class="w-full h-full object-cover"
                 src="{{ asset('images/about-us/Your-Strategic-Partner-2.jpg') }}">
          </div>
        </div>

        <div class="md:col-span-6 order-1 md:order-2">
          <h2 class="text-2xl md:text-4xl font-black text-[#1F5F53] mb-12">{!! nl2br(__('about.partner_title')) !!}</h2>
          <div class="text-sm md:text-lg leading-relaxed text-gray-800 space-y-4">
            <p>
              {!! nl2br(__('about.partner_text_1')) !!}
            </p>
            <p>
              {!! nl2br(__('about.partner_text_2')) !!}
            </p>
          </div>
        </div>
      </div>

      <div class="order-1 grid grid-cols-2 gap-3 md:order-3 md:col-span-12 md:grid-cols-4">
        <div class="aspect-[2/3] bg-[#367C6D] rounded-sm opacity-90">
          <img class="w-full h-full object-cover"
               src="{{ asset('images/about-us/Your-Strategic-Partner-3.jpg') }}">
        </div>
        <div class="aspect-[2/3] bg-[#367C6D] rounded-sm opacity-90">
          <img class="w-full h-full object-cover"
               src="{{ asset('images/about-us/Your-Strategic-Partner-4.jpg') }}">
        </div>
        <div class="aspect-[2/3] bg-[#367C6D] rounded-sm opacity-90">
          <img class="w-full h-full object-cover"
               src="{{ asset('images/about-us/Your-Strategic-Partner-5.jpg') }}">
        </div>
        <div class="hidden md:block"></div>
      </div>
    </section>

    <section>
      <img class="w-full h-full object-cover"
           src="{{ asset('images/about-us/Your-Strategic-Partner-7.png') }}">
    </section>
  </main>
@endsection
