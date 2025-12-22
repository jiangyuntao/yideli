@extends('index.layout')

@section('main')
  <div class="relative w-full h-[550px] sm:h-[650px] lg:h-[750px] bg-white flex items-center">
    <div class="absolute inset-0">
      <img src="https://images.unsplash.com/photo-1514429015793-8a42fb25e17f?q=80&w=1025&auto=format&fit=crop"
        alt="Elegant Notebook on a light marble desk" class="w-full h-full object-cover brightness-[.9]">
    </div>

    <div class="relative z-10 max-w-[96rem] mx-auto px-4 sm:px-6 lg:px-10">
      <h1
        class="text-4xl sm:text-5xl md:text-6xl lg:text-8xl font-extrabold text-white drop-shadow-lg leading-tight max-w-5xl">
        Crafting Ideas. Defining Your Legacy.
      </h1>
      <p class="mt-4 sm:mt-8 text-lg sm:text-xl lg:text-2xl text-white drop-shadow-sm max-w-xl font-medium">
        Experience the difference of premium paper and meticulous binding. Tools for inspired productivity.
      </p>
      <a href="#collections"
        class="mt-8 sm:mt-12 inline-block bg-red-600 text-white text-base sm:text-xl font-bold px-10 sm:px-16 py-3 sm:py-5 rounded-full shadow-2xl hover:bg-red-700 transition duration-300 w-fit uppercase tracking-wider">
        View Our Notebooks
      </a>
    </div>
  </div>

  <section id="collections" class="py-16 sm:py-24 lg:py-32 bg-white">
    <div class="max-w-[96rem] mx-auto px-4 sm:px-6 lg:px-10">
      <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-center text-gray-900 mb-12 sm:mb-20">The
        Yideli Products</h2>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 sm:gap-12">

        <div class="group relative overflow-hidden rounded-lg shadow-xl border border-gray-100">
          <img src="https://images.unsplash.com/photo-1522836924445-4478bdeb860c?q=80&w=800&auto=format&fit=crop"
            alt="Leather Notebook on a light surface"
            class="w-full h-[300px] sm:h-[480px] object-cover mb-4 sm:mb-6 group-hover:scale-[1.05] transition duration-700">
          <div class="p-4 sm:p-6">
            <h3 class="text-xl sm:text-2xl font-semibold text-gray-900">The Executive Line</h3>
            <p class="text-gray-700 mt-2 sm:mt-3 mb-4 sm:mb-6 text-sm sm:text-base">Refined leather and
              subtle detailing. The perfect choice for daily business.</p>
            <a href="#"
              class="inline-block text-red-600 font-bold border-b-2 border-red-600 hover:text-red-800 hover:border-red-800 transition duration-300 text-sm sm:text-base">
              Explore Details &rarr;
            </a>
          </div>
        </div>

        <div class="group relative overflow-hidden rounded-lg shadow-xl border border-gray-100">
          <img src="https://images.unsplash.com/photo-1631173716529-fd1696a807b0?q=80&w=800&auto=format&fit=crop"
            alt="Minimalist Notebooks Stacked"
            class="w-full h-[300px] sm:h-[480px] object-cover mb-4 sm:mb-6 group-hover:scale-[1.05] transition duration-700">
          <div class="p-4 sm:p-6">
            <h3 class="text-xl sm:text-2xl font-semibold text-gray-900">The Modernist Series</h3>
            <p class="text-gray-700 mt-2 sm:mt-3 mb-4 sm:mb-6 text-sm sm:text-base">Clean lines, bold
              colors, and contemporary material choices.</p>
            <a href="#"
              class="inline-block text-red-600 font-bold border-b-2 border-red-600 hover:text-red-800 hover:border-red-800 transition duration-300 text-sm sm:text-base">
              Explore Details &rarr;
            </a>
          </div>
        </div>

        <div class="group relative overflow-hidden rounded-lg shadow-xl border border-gray-100">
          <img src="https://images.unsplash.com/photo-1612599316791-451087c7fe15?q=80&w=800&auto=format&fit=crop"
            alt="Eco-friendly Recycled Paper Notebook"
            class="w-full h-[300px] sm:h-[480px] object-cover mb-4 sm:mb-6 group-hover:scale-[1.05] transition duration-700">
          <div class="p-4 sm:p-6">
            <h3 class="text-xl sm:text-2xl font-semibold text-gray-900">The Conscious Keeper</h3>
            <p class="text-gray-700 mt-2 sm:mt-3 mb-4 sm:mb-6 text-sm sm:text-base">Made with
              FSC-certified paper and recycled materials. Sustainable luxury.</p>
            <a href="#"
              class="inline-block text-red-600 font-bold border-b-2 border-red-600 hover:text-red-800 hover:border-red-800 transition duration-300 text-sm sm:text-base">
              Explore Details &rarr;
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="craftsmanship" class="py-16 sm:py-24 lg:py-32 bg-gray-50 border-t border-b border-gray-100">
    <div class="max-w-[96rem] mx-auto px-4 sm:px-6 lg:px-10">
      <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-center text-gray-900 mb-12 sm:mb-24">About
        Yideli</h2>

      <div class="flex flex-col md:flex-row items-stretch gap-8 sm:gap-16">
        <div class="md:w-1/2">
          <img src="https://images.unsplash.com/photo-1759310347467-578dfd846229?q=80&w=1171&auto=format&fit=crop"
            alt="Close-up of Notebook Pages and Binding"
            class="w-full h-[300px] sm:h-full object-cover rounded-lg shadow-2xl border border-gray-100">
        </div>
        <div class="md:w-1/2 space-y-6 sm:space-y-12 flex flex-col justify-between">
          <div
            class="p-6 sm:p-8 bg-white rounded-lg shadow-xl border-l-4 border-red-600 hover:shadow-2xl transition duration-300">
            <h3 class="text-2xl sm:text-3xl font-bold text-gray-900">Proprietary Paper Stock</h3>
            <p class="text-gray-700 mt-2 sm:mt-3 text-base sm:text-lg">Our paper is perfectly weighted
              and formulated to ensure minimal bleed-through for fountain pens and markers.</p>
          </div>
          <div
            class="p-6 sm:p-8 bg-white rounded-lg shadow-xl border-l-4 border-red-600 hover:shadow-2xl transition duration-300">
            <h3 class="text-2xl sm:text-3xl font-bold text-gray-900">Lay-Flat Binding Perfection</h3>
            <p class="text-gray-700 mt-2 sm:mt-3 text-base sm:text-lg">Using durable thread-sewn
              signatures, every Yideli notebook is guaranteed to open and lay perfectly flat for an
              unhindered writing experience.</p>
          </div>
          <div
            class="p-6 sm:p-8 bg-white rounded-lg shadow-xl border-l-4 border-red-600 hover:shadow-2xl transition duration-300">
            <h3 class="text-2xl sm:text-3xl font-bold text-gray-900">Precision and Detail</h3>
            <p class="text-gray-700 mt-2 sm:mt-3 text-base sm:text-lg">From cover embossing to edge
              foiling, every production step adheres to the highest global quality standards.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="custom" class="py-16 sm:py-24 lg:py-32 bg-white">
    <div class="max-w-[96rem] mx-auto px-4 sm:px-6 lg:px-10 text-center">
      <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 mb-6 sm:mb-10">Elevate Your Brand
        with Customization</h2>
      <p class="text-lg sm:text-xl lg:text-2xl text-gray-700 mb-12 sm:mb-20 max-w-4xl mx-auto font-medium">
        Yideli is your one-stop solution for corporate gifting and promotional products. Unlock endless
        possibilities with our OEM/ODM services.
      </p>

      <div class="flex flex-col md:flex-row justify-between relative">
        <div class="hidden lg:block absolute top-1/4 left-1/4 right-1/4 h-1 bg-gray-200 -translate-y-1/2">
        </div>
        <div class="hidden lg:block absolute top-1/4 left-1/2 right-1/4 h-1 bg-gray-200 -translate-y-1/2">
        </div>
        <div class="hidden lg:block absolute top-1/4 left-3/4 right-1/4 h-1 bg-gray-200 -translate-y-1/2">
        </div>

        <div class="w-full md:w-1/4 p-2 sm:p-4 mb-8 md:mb-0">
          <div class="relative p-6 sm:p-8 shadow-2xl rounded-lg bg-gray-50 border-t-4 border-red-600 h-full">
            <div
              class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-red-600 text-white rounded-full w-12 h-12 sm:w-14 sm:h-14 flex items-center justify-center text-xl sm:text-3xl font-extrabold shadow-lg">
              01</div>
            <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mt-6 sm:mt-6">Concept & Design</h3>
            <p class="text-gray-700 text-sm sm:text-lg mt-3">Initial consultation to define your
              requirements for materials, size, and layout.</p>
          </div>
        </div>
        <div class="w-full md:w-1/4 p-2 sm:p-4 mb-8 md:mb-0">
          <div class="relative p-6 sm:p-8 shadow-2xl rounded-lg bg-gray-50 border-t-4 border-red-600 h-full">
            <div
              class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-red-600 text-white rounded-full w-12 h-12 sm:w-14 sm:h-14 flex items-center justify-center text-xl sm:text-3xl font-extrabold shadow-lg">
              02</div>
            <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mt-6 sm:mt-6">Material Sourcing</h3>
            <p class="text-gray-700 text-sm sm:text-lg mt-3">Selection of premium covers (leather,
              fabric) and paper types (recycled, bamboo).</p>
          </div>
        </div>
        <div class="w-full md:w-1/4 p-2 sm:p-4 mb-8 md:mb-0">
          <div class="relative p-6 sm:p-8 shadow-2xl rounded-lg bg-gray-50 border-t-4 border-red-600 h-full">
            <div
              class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-red-600 text-white rounded-full w-12 h-12 sm:w-14 sm:h-14 flex items-center justify-center text-xl sm:text-3xl font-extrabold shadow-lg">
              03</div>
            <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mt-6 sm:mt-6">Branding & Finish</h3>
            <p class="text-gray-700 text-sm sm:text-lg mt-3">Exclusive logo application via embossing,
              foiling, or digital print.</p>
          </div>
        </div>
        <div class="w-full md:w-1/4 p-2 sm:p-4 mb-8 md:mb-0">
          <div class="relative p-6 sm:p-8 shadow-2xl rounded-lg bg-gray-50 border-t-4 border-red-600 h-full">
            <div
              class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-red-600 text-white rounded-full w-12 h-12 sm:w-14 sm:h-14 flex items-center justify-center text-xl sm:text-3xl font-extrabold shadow-lg">
              04</div>
            <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mt-6 sm:mt-6">Production & Delivery
            </h3>
            <p class="text-gray-700 text-sm sm:text-lg mt-3">Efficient bulk manufacturing and reliable
              global logistics fulfillment.</p>
          </div>
        </div>
      </div>

      <a href="#contact"
        class="mt-12 sm:mt-20 inline-block bg-red-600 text-white text-base sm:text-xl font-semibold px-10 sm:px-16 py-3 sm:py-5 rounded-full shadow-2xl hover:bg-red-700 transition duration-300 uppercase tracking-wider">
        Discuss Your Custom Project
      </a>
    </div>
  </section>
@endsection