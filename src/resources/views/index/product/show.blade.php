@extends('index.layout')

@section('main')
  <div class="bg-gray-50 py-4 border-b border-gray-100">
    <div class="max-w-[1400px] mx-auto px-6 lg:px-12">
      <nav class="flex text-xs text-gray-500 uppercase tracking-widest gap-2">
        <a href="index.html" class="hover:text-yideli-dark">Home</a>
        <span>/</span>
        <a href="products.html" class="hover:text-yideli-dark">Notebooks</a>
        <span>/</span>
        <span class="text-yideli-dark font-bold">Classic Elastic Band Notebook</span>
      </nav>
    </div>
  </div>

  <section class="max-w-[1400px] mx-auto px-6 lg:px-12 py-12 lg:py-20"
    x-data="{ activeImage: '{{ asset('images/notebook-1.jpg') }}' }">
    <div class="grid lg:grid-cols-2 gap-12 lg:gap-20">

      <div class="space-y-6">
        <div
          class="aspect-[4/5] bg-gray-50 flex items-center justify-center border border-gray-100 p-8 overflow-hidden relative">
          <img :src="activeImage" alt="Product Image"
            class="w-full h-full object-contain mix-blend-multiply transition-all duration-500">
          <div
            class="absolute top-4 left-4 bg-[#D4A373] text-white text-[10px] font-bold px-2 py-1 uppercase tracking-widest">
            Best Seller</div>
        </div>

        <div class="grid grid-cols-4 gap-4">
          <button @click="activeImage = '{{ asset('images/notebook-1.jpg') }}'"
            class="aspect-square bg-gray-50 border-transparent hover:border-yideli-dark p-2 transition"
            :class="activeImage === '{{ asset('images/notebook-1.jpg') }}' ? 'thumbnail-active border-yideli-dark' : ''">
            <img src="{{ asset('images/notebook-1.jpg') }}" class="w-full h-full object-contain mix-blend-multiply">
          </button>
          <button @click="activeImage = '{{ asset('images/notebook-2.jpg') }}'"
            class="aspect-square bg-gray-50 border-transparent hover:border-yideli-dark p-2 transition"
            :class="activeImage !== '{{ asset('images/notebook-2.jpg') }}' ? 'thumbnail-active border-yideli-dark' : ''">
            <img src="{{ asset('images/notebook-2.jpg') }}" class="w-full h-full object-cover">
          </button>
        </div>
      </div>

      <div>
        <span class="text-sm text-yideli-dark font-bold uppercase tracking-widest mb-2 block">Model: YD-NB-2025</span>
        <h1 class="text-3xl lg:text-4xl font-serif text-yideli-text mb-6">Classic Elastic Band Notebook</h1>

        <p class="text-gray-600 leading-relaxed font-light mb-8">
          The quintessential notebook for professionals. Featuring a durable PU leather hard cover, archival-quality
          paper, and a secure elastic closure. Customizable for corporate branding with options for embossing, foil
          stamping, and custom belly bands.
        </p>

        <div class="grid grid-cols-2 gap-4 mb-8">
          <div class="flex items-center gap-3">
            <svg class="w-5 h-5 text-yideli-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            <span class="text-sm text-gray-700">Eco-friendly PU Cover</span>
          </div>
          <div class="flex items-center gap-3">
            <svg class="w-5 h-5 text-yideli-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            <span class="text-sm text-gray-700">Lay-flat Binding</span>
          </div>
          <div class="flex items-center gap-3">
            <svg class="w-5 h-5 text-yideli-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            <span class="text-sm text-gray-700">100gsm Dowling Paper</span>
          </div>
          <div class="flex items-center gap-3">
            <svg class="w-5 h-5 text-yideli-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            <span class="text-sm text-gray-700">Expandable Inner Pocket</span>
          </div>
        </div>

        <div class="mb-10">
          <h3 class="font-serif text-lg text-yideli-dark mb-4 border-b border-gray-200 pb-2">Specifications</h3>
          <table class="w-full text-sm spec-table">
            <tbody>
              <tr>
                <th>Size</th>
                <td>A5 (145 x 210 mm) / Custom</td>
              </tr>
              <tr>
                <th>Material</th>
                <td>Thermo PU Leather (Vegan)</td>
              </tr>
              <tr>
                <th>Pages</th>
                <td>96 Sheets / 192 Pages</td>
              </tr>
              <tr>
                <th>Colors</th>
                <td>Black, Navy, Red, Grey, Custom Pantone</td>
              </tr>
              <tr>
                <th>MOQ</th>
                <td>500 pcs (Standard) / 1000 pcs (Custom)</td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="bg-gray-50 p-6 border border-gray-100 rounded-sm">
          <p class="text-xs text-gray-500 mb-4 uppercase tracking-widest font-bold">Interested in this product?</p>
          <div class="flex flex-col sm:flex-row gap-4">
            <a href="contact.html"
              class="flex-1 bg-yideli-dark text-white text-center py-4 text-sm font-bold uppercase tracking-widest hover:bg-yideli-hover transition shadow-lg shadow-yideli-dark/20">
              Request Quote
            </a>
            <a href="#"
              class="flex-1 border border-yideli-dark text-yideli-dark text-center py-4 text-sm font-bold uppercase tracking-widest hover:bg-yideli-base transition">
              Download Spec Sheet
            </a>
          </div>
          <p class="text-[10px] text-gray-400 mt-3 text-center">
            Volume discounts available for orders over 5,000 units.
          </p>
        </div>

      </div>
    </div>
  </section>

  <section class="bg-yideli-base border-t border-yideli-line py-16">
    <div class=" max-w-[1000px] mx-auto px-6 lg:px-12">
      <div class="prose max-w-none text-center text-gray-600 font-light">
        <p class="mb-6">
          Experience the joy of writing with our Classic Elastic Band Notebook. Designed for durability and daily use,
          this notebook lies completely flat, allowing you to utilize every inch of the page. The high-quality Dowling
          paper ensures minimal bleed-through, making it suitable for fountain pens, gel pens, and pencils alike.
        </p>
        <p>
          Whether for business meetings, bullet journaling, or creative sketching, this notebook is a versatile companion
          for the modern professional.
        </p>
      </div>
    </div>
  </section>

  <section class="max-w-[1400px] mx-auto px-6 lg:px-12 py-20">
    <div class="flex justify-between items-end mb-10 border-b border-gray-100 pb-4">
      <h2 class="text-2xl font-serif text-yideli-dark">You May Also Like</h2>
      <a href="products.html" class="text-xs font-bold uppercase tracking-widest text-yideli-dark hover:underline">View
        All</a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
      <a href="#" class="group block">
        <div class="aspect-[4/5] bg-gray-50 mb-4 overflow-hidden relative">
          <img src="{{ asset('images/yearly-calendar-1.jpg') }}"
            class="w-full h-full object-contain p-6 group-hover:scale-105 transition duration-500">
        </div>
        <h3 class="text-lg font-serif text-yideli-text group-hover:text-yideli-dark transition">Artistic Spiral Notebook
        </h3>
        <p class="text-sm text-gray-400 mt-1">Twin-wire binding</p>
      </a>

      <a href="#" class="group block">
        <div class="aspect-[4/5] bg-gray-50 mb-4 overflow-hidden relative">
          <img src="{{ asset('images/binding-book-1.jpg') }}"
            class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
        </div>
        <h3 class="text-lg font-serif text-yideli-text group-hover:text-yideli-dark transition">Business Journal</h3>
        <p class="text-sm text-gray-400 mt-1">Professional Series</p>
      </a>

      <a href="#" class="group block">
        <div class="aspect-[4/5] bg-gray-50 mb-4 overflow-hidden relative">
          <img src="{{ asset('images/line-circle-book-1.jpg') }}"
            class="w-full h-full object-cover mix-blend-multiply group-hover:scale-105 transition duration-500">
        </div>
        <h3 class="text-lg font-serif text-yideli-text group-hover:text-yideli-dark transition">Metal Fountain Pen</h3>
        <p class="text-sm text-gray-400 mt-1">Matte Finish</p>
      </a>

      <a href="#" class="group block">
        <div class="aspect-[4/5] bg-gray-50 mb-4 overflow-hidden relative">
          <img src="{{ asset('images/weekly-calendar-1.jpg') }}"
            class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
        </div>
        <h3 class="text-lg font-serif text-yideli-text group-hover:text-yideli-dark transition">Gel Pen Set</h3>
        <p class="text-sm text-gray-400 mt-1">0.5mm Tip</p>
      </a>
    </div>
  </section>
@endsection