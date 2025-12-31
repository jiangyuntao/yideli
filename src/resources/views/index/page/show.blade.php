@extends('index.layout')

@section('head')
  <title>About Us - Yideli Stationery</title>
@endsection

@section('main')
  <section class="relative">
    <img src="{{ asset('images/about-us-1.jpg') }}" class="w-full object-cover"
          alt="Design Process">
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

  <section class="relative">
    <img src="{{ asset('images/about-us-2.jpg') }}" class="w-full object-cover"
          alt="Design Process">
  </section>

@endsection
