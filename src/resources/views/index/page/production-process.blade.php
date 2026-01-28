@extends('index.layout')

@section('main')
  <div class="relative bg-yideli-base py-12 md:py-12 overflow-hidden">
    <div class="absolute top-0 end-0 w-1/3 h-full bg-yideli-dark/5 skew-x-12 translate-x-1/2"></div>

    <div
         class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto px-6 md:px-12 text-center relative z-10">
      <h1 class="text-4xl md:text-5xl font-serif font-bold text-yideli-dark mb-6">{!! nl2br(__('process.hero_title')) !!}
      </h1>
      <p class="text-gray-600 max-w-2xl mx-auto space-y-4 text-sm md:text-lg leading-relaxed text-gray-800">
        {!! nl2br(__('process.hero_desc')) !!}
      </p>
    </div>
  </div>

  <section
           class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto px-6 md:px-12 py-12 md:py-12 space-y-24">

    <div class="grid md:grid-cols-12 gap-12 md:gap-20 items-center">
      <div class="order-2 md:col-span-7 md:order-1 relative">
        <h2 class="text-4xl font-serif font-bold text-yideli-dark mb-4 relative z-10">
          {!! nl2br(__('process.step1_title')) !!}</h2>
        <p class="text-gray-800 text-lg leading-relaxed relative z-10">
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
      <div class="order-1 md:col-span-5 md:grid md:grid-cols-2 md:gap-4">
        <img class="w-full h-full object-cover rounded-sm shadow-xl"
             src="{{ asset('images/process/2.jpg') }}">
        <img class="w-full h-full object-cover rounded-sm shadow-xl"
             src="{{ asset('images/process/3.png') }}">
      </div>
      <div class="order-2 md:col-span-7 relative">
        <h2 class="text-4xl font-serif font-bold text-yideli-dark mb-4 relative z-10 md:text-right">
          {!! nl2br(__('process.step2_title')) !!}
        </h2>
        <p class="text-gray-800 text-lg leading-relaxed relative z-10">
          {!! nl2br(__('process.step2_desc')) !!}
        </p>
      </div>
    </div>

    <div class="grid md:grid-cols-12 gap-12 md:gap-20 items-center">
      <div class="order-2 relative md:col-span-7">
        <h2 class="text-4xl font-serif font-bold text-yideli-dark mb-4 relative z-10">
          {!! nl2br(__('process.step3_title')) !!}</h2>
        <p class="text-gray-800 text-lg leading-relaxed relative z-10">
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
      <a class="inline-block bg-yideli-dark text-white px-10 py-4 text-sm font-bold uppercase tracking-widest hover:bg-yideli-hover transition shadow-lg shadow-yideli-dark/20"
         href="{{ route('inquire.form', ['lang' => $lang]) }}">
        {!! nl2br(__('process.book_tour_btn')) !!}
      </a>
    </div>
  </section>
@endsection
