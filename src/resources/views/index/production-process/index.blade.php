@extends('index.layout')

@section('main')
  <div class="relative bg-yideli-base py-24 lg:py-32 border-b border-yideli-line overflow-hidden">
    <div class="absolute top-0 right-0 w-1/3 h-full bg-yideli-dark/5 skew-x-12 translate-x-1/2"></div>

    <div class="max-w-[1200px] mx-auto px-6 lg:px-12 text-center relative z-10">
      <span class="text-xs font-bold tracking-[0.2em] uppercase text-yideli-dark mb-4 block">Manufacturing
        Excellence</span>
      <h1 class="text-4xl lg:text-6xl font-serif text-yideli-dark mb-6">From Concept to Creation</h1>
      <p class="text-gray-600 max-w-2xl mx-auto font-light text-lg">
        Transparency is key to trust. Explore our 6-step manufacturing process that ensures every Yideli product meets
        global standards.
      </p>
    </div>
  </div>

  <section class="max-w-[1400px] mx-auto px-6 lg:px-12 py-20 lg:py-32 space-y-24">

    <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">
      <div class="order-2 lg:order-1 relative">
        <div class="step-number text-yideli-dark">01</div>
        <h2 class="text-3xl font-serif text-yideli-dark mb-4 relative z-10">Design & R&D</h2>
        <p class="text-gray-600 leading-relaxed font-light relative z-10">
          It all starts with an idea. Our in-house design team collaborates with global trend forecasters to create
          ergonomic and aesthetically pleasing designs. We use 3D modeling and rapid prototyping to test form and function
          before mass production begins.
        </p>
        <ul class="mt-6 space-y-2 text-sm text-gray-500 font-medium relative z-10">
          <li class="flex items-center gap-2">
            <span class="w-1.5 h-1.5 bg-yideli-dark rounded-full"></span> 3D CAD Modeling
          </li>
          <li class="flex items-center gap-2">
            <span class="w-1.5 h-1.5 bg-yideli-dark rounded-full"></span> Ergonomic Testing
          </li>
          <li class="flex items-center gap-2">
            <span class="w-1.5 h-1.5 bg-yideli-dark rounded-full"></span> Mold Development
          </li>
        </ul>
      </div>
      <div class="order-1 lg:order-2">
        <img src="{{ asset('images/weekly-calendar-2.jpg') }}" class="w-full h-[400px] object-cover rounded-sm shadow-xl"
          alt="Design Process">
      </div>
    </div>

    <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">
      <div class="order-1">
        <img src="{{ asset('images/yearly-calendar-2.jpg') }}" class="w-full h-[400px] object-cover rounded-sm shadow-xl"
          alt="Raw Material">
      </div>
      <div class="order-2 relative">
        <div class="step-number text-yideli-dark right-0 left-auto">02</div>
        <h2 class="text-3xl font-serif text-yideli-dark mb-4 relative z-10">Material Selection</h2>
        <p class="text-gray-600 leading-relaxed font-light relative z-10">
          Quality begins with raw materials. We source premium ABS/PP plastics, eco-friendly wheat straw composites, and
          high-grade papers (FSC certified) from trusted suppliers. Incoming materials undergo strict inspections for
          durability and safety (EN71-3).
        </p>
      </div>
    </div>

  </section>

  <section class="bg-yideli-dark text-white py-20 lg:py-28">
    <div class="max-w-[1200px] mx-auto px-6 lg:px-12 text-center">
      <h2 class="text-3xl lg:text-4xl font-serif mb-8">Committed to Global Standards</h2>
    </div>
  </section>

  <section>
    <img src="{{ asset('images/custom-2.jpg') }}">
  </section>

  <section class="py-24 bg-yideli-base">
    <div class="max-w-[800px] mx-auto text-center px-6">
      <h2 class="text-3xl font-serif text-yideli-dark mb-6">See It For Yourself</h2>
      <p class="text-gray-600 mb-8 font-light">
        We welcome international clients to visit our factory in Taizhou. Schedule a tour to witness our production
        capacity and quality control firsthand.
      </p>
      <a href="contact.html"
        class="inline-block bg-yideli-dark text-white px-10 py-4 text-sm font-bold uppercase tracking-widest hover:bg-yideli-hover transition shadow-lg shadow-yideli-dark/20">
        Book a Factory Tour
      </a>
    </div>
  </section>
@endsection
