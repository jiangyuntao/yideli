@extends('index.layout')

@section('head')
  <title>About Us - Yideli Stationery</title>
@endsection

@section('main')
  <section class="relative py-24 lg:py-32 bg-yideli-base overflow-hidden">
    <div class="max-w-[1600px] mx-auto px-6 lg:px-12 grid lg:grid-cols-2 gap-16 items-center">
      <div class="relative z-10">
        <span class="block text-xs font-bold tracking-[0.2em] uppercase mb-4 text-yideli-dark">Our Story</span>
        <h1 class="text-4xl lg:text-6xl font-serif font-medium leading-tight mb-8 text-yideli-dark">
          Crafting Quality Since 2005.
        </h1>
        <p class="text-gray-600 text-lg leading-relaxed mb-8 font-light max-w-xl">
          Located in Taizhou, China, Yideli Stationery has grown from a humble workshop into a global manufacturing
          partner. We believe that stationery is not just a tool, but a vessel for thought and creativity.
        </p>
        <img src="{{ asset('images/product-1.jpg') }}" alt="Office Vibe"
          class="w-full h-64 object-cover rounded-sm shadow-lg grayscale hover:grayscale-0 transition duration-700">
      </div>
      <div class="relative h-full min-h-[400px]">
        <img src="{{ asset('images/notebook-1.jpg') }}" alt="Factory Production"
          class="absolute inset-0 w-full h-full object-cover rounded-sm shadow-2xl">
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

  <section class="py-24 lg:py-32 px-6 lg:px-12 bg-white">
    <div class="max-w-[1200px] mx-auto">
      <div class="text-center mb-20">
        <h2 class="text-3xl lg:text-4xl font-serif text-yideli-dark mb-6">"Quality is Faith"</h2>
        <div class="w-24 h-1 bg-yideli-dark mx-auto mb-8"></div>
        <p class="text-gray-600 text-lg leading-relaxed max-w-3xl mx-auto">
          Taizhou Yideli Stationery Co., Ltd. specializes in the R&D, production, and sales of high-end notebooks and
          writing instruments.
          With advanced automated injection molding machinery and a skilled assembly team, we offer comprehensive OEM &
          ODM solutions for global brands.
          Our commitment to environmental sustainability and social responsibility is at the core of our operations.
        </p>
      </div>

      <div class="grid md:grid-cols-3 gap-6">
        <div class="space-y-4">
          <img src="{{ asset('images/notebook-2.jpg') }}"
            class="w-full h-80 object-cover grayscale hover:grayscale-0 transition duration-500">
          <h3 class="font-serif text-xl text-yideli-dark">Advanced Equipment</h3>
          <p class="text-sm text-gray-500">State-of-the-art injection molding and printing technology.</p>
        </div>
        <div class="space-y-4 md:translate-y-12">
          <img src="{{ asset('images/yearly-calendar-2.jpg') }}"
            class="w-full h-80 object-cover grayscale hover:grayscale-0 transition duration-500">
          <h3 class="font-serif text-xl text-yideli-dark">Design R&D</h3>
          <p class="text-sm text-gray-500">Innovative design team focusing on trends and functionality.</p>
        </div>
        <div class="space-y-4">
          <img src="{{ asset('images/line-circle-book-2.jpg') }}"
            class="w-full h-80 object-cover grayscale hover:grayscale-0 transition duration-500">
          <h3 class="font-serif text-xl text-yideli-dark">Global Logistics</h3>
          <p class="text-sm text-gray-500">Efficient warehousing and shipping to 50+ countries.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="py-20 bg-yideli-base border-t border-yideli-line">
    <div class="max-w-[1600px] mx-auto px-6 lg:px-12 text-center">
      <span class="text-yideli-dark text-sm font-bold tracking-widest mb-4 block uppercase">Compliance & Standards</span>
      <h2 class="text-3xl font-serif text-yideli-dark mb-12">Factory Certifications</h2>

      <div
        class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-7 gap-8 items-center justify-center opacity-80 grayscale hover:grayscale-0 transition-all duration-500">
        <div class="flex flex-col items-center gap-2">
          <div
            class="h-16 w-16 bg-white rounded-full flex items-center justify-center border border-yideli-line shadow-sm">
            <span class="font-bold text-yideli-dark text-xs">BSCI</span>
          </div>
          <span class="text-xs font-medium mt-2">Social Compliance</span>
        </div>

        <div class="flex flex-col items-center gap-2">
          <div
            class="h-16 w-16 bg-white rounded-full flex items-center justify-center border border-yideli-line shadow-sm">
            <span class="font-bold text-yideli-dark text-xs">FSC</span>
          </div>
          <span class="text-xs font-medium mt-2">Sustainable Forest</span>
        </div>

        <div class="flex flex-col items-center gap-2">
          <div
            class="h-16 w-16 bg-white rounded-full flex items-center justify-center border border-yideli-line shadow-sm">
            <span class="font-bold text-yideli-dark text-xs">ISO 9001</span>
          </div>
          <span class="text-xs font-medium mt-2">Quality Management</span>
        </div>

        <div class="flex flex-col items-center gap-2">
          <div
            class="h-16 w-16 bg-white rounded-full flex items-center justify-center border border-yideli-line shadow-sm">
            <span class="font-bold text-yideli-dark text-xs">ISO 14001</span>
          </div>
          <span class="text-xs font-medium mt-2">Environmental</span>
        </div>

        <div class="flex flex-col items-center gap-2">
          <div
            class="h-16 w-16 bg-white rounded-full flex items-center justify-center border border-yideli-line shadow-sm">
            <span class="font-bold text-yideli-dark text-xs">GSV</span>
          </div>
          <span class="text-xs font-medium mt-2">Security Verification</span>
        </div>

        <div class="flex flex-col items-center gap-2">
          <div
            class="h-16 w-16 bg-white rounded-full flex items-center justify-center border border-yideli-line shadow-sm">
            <span class="font-bold text-yideli-dark text-xs">WCA</span>
          </div>
          <span class="text-xs font-medium mt-2">Workplace Cond.</span>
        </div>

        <div class="flex flex-col items-center gap-2">
          <div
            class="h-16 w-16 bg-white rounded-full flex items-center justify-center border border-yideli-line shadow-sm">
            <span class="font-bold text-yideli-dark text-xs">SQP</span>
          </div>
          <span class="text-xs font-medium mt-2">Supplier Qual.</span>
        </div>
      </div>

      <div class="mt-12 max-w-4xl mx-auto">
        <img src="{{ asset('images/cert.jpg') }}" alt="All Certifications"
          class="w-full h-auto object-contain mix-blend-multiply opacity-90">
      </div>
    </div>
  </section>

  <section class="py-24 bg-yideli-dark text-white text-center">
    <div class="max-w-2xl mx-auto px-6">
      <h2 class="text-3xl lg:text-4xl font-serif mb-6">Ready to Create Something Exceptional?</h2>
      <p class="text-white/80 mb-10 font-light text-lg">
        Whether you need OEM manufacturing or a custom design solution, our team is ready to bring your vision to life.
      </p>
      <a href="#contact"
        class="inline-block border border-white px-10 py-4 text-sm tracking-widest uppercase hover:bg-white hover:text-yideli-dark transition duration-300">
        Contact Our Sales Team
      </a>
    </div>
  </section>
@endsection