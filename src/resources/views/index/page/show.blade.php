@extends('index.layout')

@section('main')
  <section class="py-16 lg:py-24">
    <div class="max-w-[96rem] mx-auto px-4 sm:px-6 lg:px-10">
      <div class="flex flex-col md:flex-row items-center gap-12 lg:gap-20">
        <div class="md:w-1/2">
          <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6">A Legacy of Ink & Paper</h2>
          <p class="text-lg text-gray-700 mb-6 leading-relaxed">
            Yideli began as a small family workshop dedicated to the art of bookbinding. What started
            with simple notebooks has evolved into a global brand synonymous with quality and
            refinement. We believe that in a digital world, the physical act of writing remains the most
            profound way to capture human thought.
          </p>
          <p class="text-lg text-gray-700 mb-8 leading-relaxed">
            Our mission is simple: to provide creators, professionals, and dreamers with the perfect
            canvas. Every notebook we produce is a testament to patience, precision, and passion.
          </p>
          <div class="flex items-center space-x-4">
            <div class="h-px w-12 bg-red-600"></div>
            <span class="text-red-600 font-bold tracking-widest uppercase">The Yideli Standard</span>
          </div>
        </div>
        <div class="md:w-1/2 relative">
          <div class="absolute -top-4 -left-4 w-full h-full border-2 border-red-600 rounded-lg"></div>
          <img src="https://images.unsplash.com/photo-1586075010923-2dd4570fb338?q=80&w=987&auto=format&fit=crop"
            alt="Craftsman working on binding" class="relative z-10 rounded-lg shadow-xl w-full object-cover h-[400px]">
        </div>
      </div>
    </div>
  </section>

  <section class="py-16 lg:py-24 bg-gray-50">
    <div class="max-w-[96rem] mx-auto px-4 sm:px-6 lg:px-10">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
        <div class="p-8 bg-white rounded-lg shadow-lg border-t-4 border-red-600">
          <div class="text-red-600 text-4xl mb-4"><i class="ri-leaf-line"></i></div>
          <h3 class="text-xl font-bold mb-3">Sustainability</h3>
          <p class="text-gray-600">We source FSC-certified paper and use eco-friendly inks, ensuring our
            footprint is as light as our paper.</p>
        </div>
        <div class="p-8 bg-white rounded-lg shadow-lg border-t-4 border-red-600">
          <div class="text-red-600 text-4xl mb-4"><i class="ri-medal-line"></i></div>
          <h3 class="text-xl font-bold mb-3">Quality</h3>
          <p class="text-gray-600">Rigorous testing for bleed-through and durability. We don't compromise
            on the writing experience.</p>
        </div>
        <div class="p-8 bg-white rounded-lg shadow-lg border-t-4 border-red-600">
          <div class="text-red-600 text-4xl mb-4"><i class="ri-brush-line"></i></div>
          <h3 class="text-xl font-bold mb-3">Design</h3>
          <p class="text-gray-600">Blending timeless aesthetics with modern functionality to create
            stationery that inspires.</p>
        </div>
      </div>
    </div>
  </section>
@endsection