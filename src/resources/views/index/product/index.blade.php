@extends('index.layout')

@section('main')
  <div class="bg-yideli-base border-b border-yideli-line">
    <img src="{{ asset('images/product-1.jpg') }}">
  </div>

  <div class="bg-yideli-base py-16 lg:py-24 border-b border-yideli-line">
    <div class="max-w-[1600px] mx-auto px-6 lg:px-12 text-center">
      <span class="text-xs font-bold tracking-[0.2em] uppercase text-yideli-dark mb-4 block">Our Collections</span>
      <h1 class="text-4xl lg:text-6xl font-serif text-yideli-dark mb-6">Designed for Inspiration</h1>
      <p class="text-gray-600 max-w-2xl mx-auto font-light text-lg">
        Explore our comprehensive range of stationery. From the tactile feel of our premium notebooks to the precision of
        our writing instruments.
      </p>
    </div>
  </div>

  <div class="max-w-[1920px] mx-auto px-6 lg:px-12 py-12 lg:py-20">
    <div class="flex flex-col lg:flex-row gap-12">

      <aside class="hidden lg:block w-64 flex-shrink-0">
        <div class="sticky top-32 space-y-10">
          <div>
            <h3 class="font-serif text-xl mb-6 text-yideli-dark">Categories</h3>
            <ul class="space-y-3 text-sm">
              <li>
                <button @click="activeCategory = 'all'"
                  :class="activeCategory === 'all' ? 'text-yideli-dark font-bold pl-2 border-l-2 border-yideli-dark' : 'text-gray-500 hover:text-yideli-dark'"
                  class="transition-all duration-200 block w-full text-left">
                  View All
                </button>
              </li>
              <li>
                <button @click="activeCategory = 'notebooks'"
                  :class="activeCategory === 'notebooks' ? 'text-yideli-dark font-bold pl-2 border-l-2 border-yideli-dark' : 'text-gray-500 hover:text-yideli-dark'"
                  class="transition-all duration-200 block w-full text-left">
                  Notebooks & Journals
                </button>
              </li>
              <li>
                <button @click="activeCategory = 'writing'"
                  :class="activeCategory === 'writing' ? 'text-yideli-dark font-bold pl-2 border-l-2 border-yideli-dark' : 'text-gray-500 hover:text-yideli-dark'"
                  class="transition-all duration-200 block w-full text-left">
                  Writing Instruments
                </button>
              </li>
              <li>
                <button @click="activeCategory = 'office'"
                  :class="activeCategory === 'office' ? 'text-yideli-dark font-bold pl-2 border-l-2 border-yideli-dark' : 'text-gray-500 hover:text-yideli-dark'"
                  class="transition-all duration-200 block w-full text-left">
                  Office Supplies
                </button>
              </li>
            </ul>
          </div>

          <div>
            <h3 class="font-serif text-xl mb-6 text-yideli-dark">Material</h3>
            <div class="space-y-2">
              <label class="flex items-center gap-3 cursor-pointer group">
                <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-yideli-dark focus:ring-yideli-dark">
                <span class="text-sm text-gray-500 group-hover:text-yideli-dark transition">PU Leather</span>
              </label>
              <label class="flex items-center gap-3 cursor-pointer group">
                <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-yideli-dark focus:ring-yideli-dark">
                <span class="text-sm text-gray-500 group-hover:text-yideli-dark transition">Metal</span>
              </label>
              <label class="flex items-center gap-3 cursor-pointer group">
                <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-yideli-dark focus:ring-yideli-dark">
                <span class="text-sm text-gray-500 group-hover:text-yideli-dark transition">Recycled Paper</span>
              </label>
            </div>
          </div>

          <div class="bg-yideli-base p-6 text-center border border-yideli-line">
            <h4 class="font-serif text-lg mb-2">Need a Catalog?</h4>
            <p class="text-xs text-gray-500 mb-4">Download our 2025 Full Product Catalog PDF.</p>
            <button
              class="text-xs font-bold uppercase tracking-widest border-b border-yideli-dark pb-1 hover:opacity-70 transition">Download
              Now</button>
          </div>
        </div>
      </aside>

      <div class="lg:hidden w-full mb-8">
        <button @click="mobileFilterOpen = !mobileFilterOpen"
          class="w-full flex justify-between items-center px-4 py-3 border border-gray-200 text-sm font-medium">
          <span>Filter Products</span>
          <span>+</span>
        </button>
        <div x-show="mobileFilterOpen" class="border-x border-b border-gray-200 p-4 space-y-4">
          <button @click="activeCategory = 'all'; mobileFilterOpen = false"
            class="block w-full text-left text-sm py-1">View All</button>
          <button @click="activeCategory = 'notebooks'; mobileFilterOpen = false"
            class="block w-full text-left text-sm py-1">Notebooks</button>
          <button @click="activeCategory = 'writing'; mobileFilterOpen = false"
            class="block w-full text-left text-sm py-1">Writing Instruments</button>
        </div>
      </div>

      <div class="flex-1">
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-x-8 gap-y-12">

          <a href="{{ route('product.show', ['lang' => $lang, 'slug' => 'artistic-series-spiral-notebook']) }}"
            class="product-card group cursor-pointer" x-show="activeCategory === 'all' || activeCategory === 'notebooks'">
            <div class="aspect-[4/5] bg-gray-50 relative overflow-hidden mb-4">
              <img src="{{ asset('images/binding-book-1.jpg') }}" alt="Artistic Spiral Notebook"
                class="w-full h-full object-contain p-8 group-hover:scale-105 transition duration-700">

              <div
                class="product-action absolute bottom-0 left-0 w-full bg-white/95 backdrop-blur py-4 px-6 translate-y-full opacity-0 transition duration-300 border-t border-yideli-line flex justify-between items-center">
                <span class="text-xs font-bold uppercase tracking-wider text-yideli-dark">Quick View</span>
                <span class="text-yideli-dark">→</span>
              </div>
              <span
                class="absolute top-4 left-4 bg-yideli-dark text-white text-[10px] font-bold px-2 py-1 uppercase tracking-widest">New</span>
            </div>
            <h3 class="text-lg font-serif text-yideli-dark group-hover:underline underline-offset-4 decoration-1">Artistic
              Series Spiral Notebook</h3>
            <p class="text-sm text-gray-500 mt-1">Twin-wire binding · 120gsm Paper · Custom Cover</p>
          </a>

          <div class="product-card group cursor-pointer"
            x-show="activeCategory === 'all' || activeCategory === 'notebooks'">
            <div class="aspect-[4/5] bg-gray-50 relative overflow-hidden mb-4">
              <img src="{{ asset('images/line-circle-book-1.jpg') }}" alt="Elastic Band Notebook"
                class="w-full h-full object-contain p-4 group-hover:scale-105 transition duration-700">

              <div
                class="product-action absolute bottom-0 left-0 w-full bg-white/95 backdrop-blur py-4 px-6 translate-y-full opacity-0 transition duration-300 border-t border-yideli-line flex justify-between items-center">
                <span class="text-xs font-bold uppercase tracking-wider text-yideli-dark">Quick View</span>
                <span class="text-yideli-dark">→</span>
              </div>
              <span
                class="absolute top-4 left-4 bg-[#D4A373] text-white text-[10px] font-bold px-2 py-1 uppercase tracking-widest">Best
                Seller</span>
            </div>
            <h3 class="text-lg font-serif text-yideli-dark group-hover:underline underline-offset-4 decoration-1">Classic
              Elastic Band Journal</h3>
            <p class="text-sm text-gray-500 mt-1">PU Leather · Expandable Pocket · Multiple Colors</p>
          </div>

          <div class="product-card group cursor-pointer"
            x-show="activeCategory === 'all' || activeCategory === 'writing'">
            <div class="aspect-[4/5] bg-gray-50 relative overflow-hidden mb-4">
              <img src="{{ asset('images/notebook-1.jpg') }}" alt="Elastic Band Notebook"
                class="w-full h-full object-contain p-4 group-hover:scale-105 transition duration-700">

              <div
                class="product-action absolute bottom-0 left-0 w-full bg-white/95 backdrop-blur py-4 px-6 translate-y-full opacity-0 transition duration-300 border-t border-yideli-line flex justify-between items-center">
                <span class="text-xs font-bold uppercase tracking-wider text-yideli-dark">Quick View</span>
                <span class="text-yideli-dark">→</span>
              </div>
            </div>
            <h3 class="text-lg font-serif text-yideli-dark group-hover:underline underline-offset-4 decoration-1">Matte
              Black Fountain Pen</h3>
            <p class="text-sm text-gray-500 mt-1">Brass Body · Fine Nib · Gift Box Included</p>
          </div>

          <div class="product-card group cursor-pointer"
            x-show="activeCategory === 'all' || activeCategory === 'writing'">
            <div class="aspect-[4/5] bg-gray-50 relative overflow-hidden mb-4">
              <img src="{{ asset('images/notebook-2.jpg') }}" alt="Elastic Band Notebook"
                class="w-full h-full object-contain p-4 group-hover:scale-105 transition duration-700">

              <div
                class="product-action absolute bottom-0 left-0 w-full bg-white/95 backdrop-blur py-4 px-6 translate-y-full opacity-0 transition duration-300 border-t border-yideli-line flex justify-between items-center">
                <span class="text-xs font-bold uppercase tracking-wider text-yideli-dark">Quick View</span>
                <span class="text-yideli-dark">→</span>
              </div>
            </div>
            <h3 class="text-lg font-serif text-yideli-dark group-hover:underline underline-offset-4 decoration-1">
              Executive Gel Pen Series</h3>
            <p class="text-sm text-gray-500 mt-1">0.5mm Tip · Quick Dry Ink · Smooth Grip</p>
          </div>

          <div class="product-card group cursor-pointer" x-show="activeCategory === 'all' || activeCategory === 'office'">
            <div class="aspect-[4/5] bg-gray-50 relative overflow-hidden mb-4">
              <img src="{{ asset('images/weekly-calendar-2.jpg') }}" alt="Elastic Band Notebook"
                class="w-full h-full object-contain p-4 group-hover:scale-105 transition duration-700">

              <div
                class="product-action absolute bottom-0 left-0 w-full bg-white/95 backdrop-blur py-4 px-6 translate-y-full opacity-0 transition duration-300 border-t border-yideli-line flex justify-between items-center">
                <span class="text-xs font-bold uppercase tracking-wider text-yideli-dark">Quick View</span>
                <span class="text-yideli-dark">→</span>
              </div>
            </div>
            <h3 class="text-lg font-serif text-yideli-dark group-hover:underline underline-offset-4 decoration-1">
              Professional Color Pencils</h3>
            <p class="text-sm text-gray-500 mt-1">48/72 Colors · Oil-based · Cedar Wood</p>
          </div>

          <div class="product-card group cursor-pointer"
            x-show="activeCategory === 'all' || activeCategory === 'notebooks'">
            <div class="aspect-[4/5] bg-gray-50 relative overflow-hidden mb-4">
              <img src="{{ asset('images/weekly-calendar-1.jpg') }}" alt="Elastic Band Notebook"
                class="w-full h-full object-contain p-4 group-hover:scale-105 transition duration-700">

              <div
                class="product-action absolute bottom-0 left-0 w-full bg-white/95 backdrop-blur py-4 px-6 translate-y-full opacity-0 transition duration-300 border-t border-yideli-line flex justify-between items-center">
                <span class="text-xs font-bold uppercase tracking-wider text-yideli-dark">Quick View</span>
                <span class="text-yideli-dark">→</span>
              </div>
            </div>
            <h3 class="text-lg font-serif text-yideli-dark group-hover:underline underline-offset-4 decoration-1">Linen
              Hardcover Notebook</h3>
            <p class="text-sm text-gray-500 mt-1">A5 Size · Dot Grid · Lay-flat Binding</p>
          </div>

        </div>

        <div class="mt-20 flex justify-center gap-2">
          <button
            class="w-10 h-10 flex items-center justify-center border border-yideli-dark bg-yideli-dark text-white text-sm">1</button>
          <button
            class="w-10 h-10 flex items-center justify-center border border-yideli-line hover:border-yideli-dark text-sm transition">2</button>
          <button
            class="w-10 h-10 flex items-center justify-center border border-yideli-line hover:border-yideli-dark text-sm transition">→</button>
        </div>
      </div>

    </div>
  </div>

  <section class="bg-yideli-dark text-white py-16">
    <div class="max-w-4xl mx-auto px-6 text-center">
      <h2 class="text-3xl font-serif mb-4">Custom OEM/ODM Services</h2>
      <p class="text-white/80 mb-8 font-light">
        Can't find exactly what you're looking for? We offer full customization for size, material, logo, and packaging.
      </p>
      <div class="flex flex-col sm:flex-row justify-center gap-4">
        <a href="#contact"
          class="px-8 py-3 bg-white text-yideli-dark font-medium uppercase text-xs tracking-widest hover:bg-yideli-base transition">Request
          Custom Quote</a>
        <a href="#"
          class="px-8 py-3 border border-white text-white font-medium uppercase text-xs tracking-widest hover:bg-white/10 transition">Download
          OEM Guide</a>
      </div>
    </div>
  </section>
@endsection