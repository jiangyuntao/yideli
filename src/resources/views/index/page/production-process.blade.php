@extends('index.layout')

@section('title', __('process.hero_title'))

@section('main')
  <div class="relative overflow-hidden bg-yideli-base pb-10 pt-8 sm:pb-12 sm:pt-10 md:pb-12 md:pt-12 lg:pt-14">
    <div class="absolute top-0 end-0 hidden h-full w-1/3 translate-x-1/2 skew-x-12 bg-yideli-dark/5 md:block"></div>

    <div
         class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto px-4 sm:px-6 md:px-8 lg:px-12 relative z-10">
      <div class="grid grid-cols-1 gap-4 md:grid-cols-12 md:items-stretch md:gap-5 lg:grid-cols-10 lg:gap-6">
        <div class="md:col-span-7 lg:col-span-6">
          <div class="flex h-full flex-col justify-center border border-white/30 bg-white/76 p-4 shadow-2xl backdrop-blur-md sm:p-5 md:min-h-[380px] lg:min-h-[430px] lg:p-7">
            <h1 class="mb-3 text-2xl font-serif font-bold text-yideli-dark sm:text-3xl md:text-[2rem] lg:text-4xl">
              {!! nl2br(__('process.hero_title')) !!}
            </h1>
            <p class="text-sm leading-relaxed text-gray-800 sm:text-base md:text-[0.95rem] lg:text-lg">
              {!! nl2br(__('process.hero_desc')) !!}
            </p>
          </div>
        </div>

        <div class="md:col-span-5 lg:col-span-4">
          @include('index.inquire.hero-form', [
              'heroInquiryId' => 'production-process-hero-inquiry',
              'heroInquiryReturnTo' => route('production-process', ['lang' => $lang]) . '#production-process-hero-inquiry',
              'heroInquiryClass' => 'flex h-full flex-col justify-center border border-white/30 bg-white/76 px-4 py-2 shadow-2xl backdrop-blur-md sm:px-5 sm:py-2.5 md:min-h-[380px] md:px-5 lg:min-h-[430px] lg:px-6 lg:py-3',
          ])
        </div>
      </div>
    </div>
  </div>

  <section
           class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto space-y-16 px-6 py-12 md:px-12 md:py-12 md:space-y-24">

    <div class="grid md:grid-cols-12 gap-12 md:gap-20 items-center">
      <div class="order-2 md:col-span-7 md:order-1 relative">
        <h2 class="relative z-10 mb-4 text-3xl font-serif font-bold text-yideli-dark md:text-4xl">
          {!! nl2br(__('process.step1_title')) !!}</h2>
        <p class="relative z-10 text-base leading-relaxed text-gray-800 md:text-lg">
          {!! nl2br(__('process.step1_desc')) !!}
        </p>
      </div>
      <div class="order-1 md:col-span-5 md:order-2">
        <img class="w-full h-full object-cover rounded-sm shadow-xl"
             src="{{ asset('images/process/1.jpg') }}"
             alt="Design Process">
      </div>
    </div>

    <div class="grid md:grid-cols-12 gap-12 md:gap-20 items-center">
      <div class="order-1 grid grid-cols-1 gap-4 sm:grid-cols-2 md:col-span-5 md:gap-4">
        <img class="w-full h-full object-cover rounded-sm shadow-xl"
             src="{{ asset('images/process/2.jpg') }}">
        <img class="w-full h-full object-cover rounded-sm shadow-xl"
             src="{{ asset('images/process/3.png') }}">
      </div>
      <div class="order-2 md:col-span-7 relative">
        <h2 class="relative z-10 mb-4 text-3xl font-serif font-bold text-yideli-dark md:text-right md:text-4xl">
          {!! nl2br(__('process.step2_title')) !!}
        </h2>
        <p class="relative z-10 text-base leading-relaxed text-gray-800 md:text-lg">
          {!! nl2br(__('process.step2_desc')) !!}
        </p>
      </div>
    </div>

    <div class="grid md:grid-cols-12 gap-12 md:gap-20 items-center">
      <div class="order-2 relative md:col-span-7">
        <h2 class="relative z-10 mb-4 text-3xl font-serif font-bold text-yideli-dark md:text-4xl">
          {!! nl2br(__('process.step3_title')) !!}</h2>
        <p class="relative z-10 text-base leading-relaxed text-gray-800 md:text-lg">
          {!! nl2br(__('process.step3_desc')) !!}
        </p>
      </div>
      <div class="order-1 md:col-span-5 md:order-2 relative">
        <img class="w-full h-full object-cover rounded-sm shadow-xl"
             src="{{ asset('images/process/4.png') }}"
             alt="Raw Material">
      </div>
    </div>

  </section>

  <section class="bg-yideli-dark text-white py-10 md:py-18">
    <div class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto px-6 md:px-12 text-center">
      <h2 class="text-3xl md:text-4xl font-serif">{!! nl2br(__('process.custom_proposal')) !!}</h2>
    </div>
  </section>

  <section class="px-6 md:px-12 bg-[#f6fff4]">
    <div class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto">
      <img class="w-full h-auto"
           src="{{ asset('images/custom-1-big.jpg') }}">
    </div>
  </section>

  <section class="py-24 bg-yideli-base">
    <div class="max-w-[800px] mx-auto text-center px-6">
      <h2 class="text-3xl font-serif text-yideli-dark mb-6">{!! nl2br(__('process.see_yourself')) !!}</h2>
      <p class="text-gray-600 mb-8 font-light">
        {!! nl2br(__('process.visit_text')) !!}
      </p>
      <a class="inline-flex w-full items-center justify-center bg-yideli-dark px-10 py-4 text-sm font-bold uppercase tracking-widest text-white transition shadow-lg shadow-yideli-dark/20 hover:bg-yideli-hover sm:w-auto"
         href="{{ route('inquire.form', ['lang' => $lang]) }}">
        {!! nl2br(__('process.book_tour_btn')) !!}
      </a>
    </div>
  </section>
@endsection
