@extends('index.layout')

@section('main')
  <div class="bg-yideli-base py-16 lg:py-24">
    <div class="max-w-[1400px] mx-auto px-6 lg:px-12 text-center">
      <span class="text-xs font-bold tracking-[0.2em] uppercase text-yideli-dark mb-4 block">Our Collections</span>
      <h1 class="text-4xl lg:text-6xl font-serif text-yideli-dark mb-6">Designed for Inspiration</h1>
      <p class="text-gray-600 max-w-2xl mx-auto font-light text-lg">
        Explore our comprehensive range of stationery. From the tactile feel of our premium notebooks to the precision of
        our writing instruments.
      </p>
    </div>
  </div>

  <div class="bg-yideli-base bg-[#86806e]">
    <div class="max-w-[1920px] mx-auto">
      <img src="{{ asset('images/product-index-banner.jpg') }}">
    </div>
  </div>

  <div class="max-w-[1920px] mx-auto px-6 lg:px-12 py-12 lg:py-20"
       x-data="{
           activeCategory: 'all',
           showSub: true,
           activeSub: '',
           mobileFilterOpen: false,
           productAccessModal: {
               show: false,
               url: '',
               password: '',
               error: false
           },
           // 打开密码框
           promptAccess(url) {
               this.productAccessModal.url = url;
               this.productAccessModal.show = true;
               this.productAccessModal.password = '';
               this.productAccessModal.error = false;
               // 自动聚焦输入框
               setTimeout(() => $refs.passInput.focus(), 100);
           },
           // 验证密码 (这里演示用 JS 验证，实际建议请求后端)
           submitAccess() {
               // 假设密码是 888888，或者您可以发送 API 请求验证
               if (this.productAccessModal.password === '888888') {
                   // 密码正确，跳转 (可以带上 token 防止直接访问)
                   window.location.href = this.productAccessModal.url + '?token=' + btoa('authorized');
               } else {
                   this.productAccessModal.error = true;
               }
           }
       }">
    <div class="flex flex-col lg:flex-row gap-12">

      <aside class="hidden lg:block w-64 flex-shrink-0">
        <div class="sticky top-32 space-y-10">
          <div>
            <h3 class="font-serif text-xl mb-6 text-yideli-dark">Categories</h3>
            <ul class="space-y-3 text-sm">
              <li>
                <button @click="activeCategory = 'all'"
                        :class="activeCategory === 'all' ?
                            'text-yideli-dark font-bold ps-2 border-l-2 border-yideli-dark' :
                            'text-gray-500 hover:text-yideli-dark'"
                        class="transition-all duration-200 block w-full text-start">
                  View All
                </button>
              </li>
              <li>
                <!-- 点击展开/收起子分类 -->
                <button @click="activeCategory = 'notebooks'; showSub = !showSub"
                        :class="activeCategory === 'notebooks' ?
                            'text-yideli-dark font-bold ps-2 border-l-2 border-yideli-dark' :
                            'text-gray-500 hover:text-yideli-dark'"
                        class="transition-all duration-200 block w-full text-start flex items-center justify-between">
                  <span>Planner & Diaries</span>
                  <span x-show="activeCategory === 'notebooks'"
                        x-text="showSub ? '−' : '+'"
                        class="text-sm"></span>
                </button>
                <!-- 子分类列表 -->
                <ul x-show="showSub"
                    x-transition
                    class="mt-2 ms-4 space-y-2 text-xs text-gray-600">
                  <li><button @click="activeSub = 'daily-planner'"
                            :class="activeSub === 'daily-planner' ? 'text-yideli-dark font-semibold' : 'hover:text-yideli-dark'"
                            class="block">2026 Diaries</button></li>
                  <li><button @click="activeSub = 'weekly-diary'"
                            :class="activeSub === 'weekly-diary' ? 'text-yideli-dark font-semibold' : 'hover:text-yideli-dark'"
                            class="block">Academic Diaries</button></li>
                  <li><button @click="activeSub = 'travel-journal'"
                            :class="activeSub === 'travel-journal' ? 'text-yideli-dark font-semibold' : 'hover:text-yideli-dark'"
                            class="block">Undated Diaries</button></li>
                  <li><button @click="activeSub = 'travel-journal'"
                            :class="activeSub === 'travel-journal' ? 'text-yideli-dark font-semibold' : 'hover:text-yideli-dark'"
                            class="block">Permanent Agenda</button></li>
                </ul>
              </li>
              <li>
                <button @click="activeCategory = 'writing'"
                        :class="activeCategory === 'writing' ?
                            'text-yideli-dark font-bold ps-2 border-l-2 border-yideli-dark' :
                            'text-gray-500 hover:text-yideli-dark'"
                        class="transition-all duration-200 block w-full text-start">
                  Spiral notebook
                </button>
              </li>
              <li>
                <button @click="activeCategory = 'office'"
                        :class="activeCategory === 'office' ?
                            'text-yideli-dark font-bold ps-2 border-l-2 border-yideli-dark' :
                            'text-gray-500 hover:text-yideli-dark'"
                        class="transition-all duration-200 block w-full text-start">
                  Notebook
                </button>

                <ul x-show="showSub"
                    x-transition
                    class="mt-2 ms-4 space-y-2 text-xs text-gray-600">
                  <li><button @click="activeSub = 'daily-planner'"
                            :class="activeSub === 'daily-planner' ? 'text-yideli-dark font-semibold' : 'hover:text-yideli-dark'"
                            class="block">Hard Cover</button></li>
                  <li><button @click="activeSub = 'weekly-diary'"
                            :class="activeSub === 'weekly-diary' ? 'text-yideli-dark font-semibold' : 'hover:text-yideli-dark'"
                            class="block">Soft Cover</button></li>
                </ul>
              </li>
              <li>
                <button @click="activeCategory = 'office'"
                        :class="activeCategory === 'office' ?
                            'text-yideli-dark font-bold ps-2 border-l-2 border-yideli-dark' :
                            'text-gray-500 hover:text-yideli-dark'"
                        class="transition-all duration-200 block w-full text-start">
                  Elastic band notebook
                </button>
              </li>
              <li>
                <button @click="activeCategory = 'office'"
                        :class="activeCategory === 'office' ?
                            'text-yideli-dark font-bold ps-2 border-l-2 border-yideli-dark' :
                            'text-gray-500 hover:text-yideli-dark'"
                        class="transition-all duration-200 block w-full text-start">
                  Address book
                </button>
              </li>
              <li>
                <button @click="activeCategory = 'office'"
                        :class="activeCategory === 'office' ?
                            'text-yideli-dark font-bold ps-2 border-l-2 border-yideli-dark' :
                            'text-gray-500 hover:text-yideli-dark'"
                        class="transition-all duration-200 block w-full text-start">
                  Floders & Organizers
                </button>
              </li>
            </ul>
          </div>

          <div>
            <h3 class="font-serif text-xl mb-6 text-yideli-dark">Material</h3>
            <div class="space-y-2">
              <label class="flex items-center gap-3 cursor-pointer group">
                <input type="checkbox"
                       class="w-4 h-4 rounded border-gray-300 text-yideli-dark focus:ring-yideli-dark">
                <span class="text-sm text-gray-500 group-hover:text-yideli-dark transition">PU Leather</span>
              </label>
              <label class="flex items-center gap-3 cursor-pointer group">
                <input type="checkbox"
                       class="w-4 h-4 rounded border-gray-300 text-yideli-dark focus:ring-yideli-dark">
                <span class="text-sm text-gray-500 group-hover:text-yideli-dark transition">Metal</span>
              </label>
              <label class="flex items-center gap-3 cursor-pointer group">
                <input type="checkbox"
                       class="w-4 h-4 rounded border-gray-300 text-yideli-dark focus:ring-yideli-dark">
                <span class="text-sm text-gray-500 group-hover:text-yideli-dark transition">Recycled Paper</span>
              </label>
            </div>
          </div>
          {{--
          <div class="bg-yideli-base p-6 text-center border border-yideli-line">
            <h4 class="font-serif text-lg mb-2">Need a Catalog?</h4>
            <p class="text-xs text-gray-500 mb-4">Download our 2025 Full Product Catalog PDF.</p>
            <button
              class="text-xs font-bold uppercase tracking-widest border-b border-yideli-dark pb-1 hover:opacity-70 transition">Download
              Now</button>
          </div> --}}
        </div>
      </aside>

      <div class="lg:hidden w-full mb-8">
        <button @click="mobileFilterOpen = !mobileFilterOpen"
                class="w-full flex justify-between items-center px-4 py-3 border border-gray-200 text-sm font-medium">
          <span>Filter Products</span>
          <span>+</span>
        </button>
        <div x-show="mobileFilterOpen"
             class="border-x border-b border-gray-200 p-4 space-y-4">
          <button @click="activeCategory = 'all'; mobileFilterOpen = false"
                  class="block w-full text-start text-sm py-1">View All</button>
          <button @click="activeCategory = 'notebooks'; mobileFilterOpen = false"
                  class="block w-full text-start text-sm py-1">Notebooks</button>
          <button @click="activeCategory = 'writing'; mobileFilterOpen = false"
                  class="block w-full text-start text-sm py-1">Writing Instruments</button>
        </div>
      </div>

      <div class="flex-1">
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-x-8 gap-y-12">

          <div @click="promptAccess('{{ route('product.show', ['lang' => $lang, 'slug' => 'artistic-series-spiral-notebook']) }}')"
               class="product-card group cursor-pointer"
               x-show="activeCategory === 'all' || activeCategory === 'notebooks'">
            <div
                 class="aspect-[4/5] bg-[#fcfcee] relative overflow-hidden mb-4 group-hover:shadow-lg transition-all duration-300">

              <img src="{{ asset('images/binding-book-1.jpg') }}"
                   alt="Protected Product"
                   class="w-full h-full object-contain blur-xl scale-105 opacity-70 pointer-events-none">

              <div class="absolute inset-0 bg-yideli-text/10 group-hover:bg-yideli-text/20 transition-colors"></div>

              <div class="absolute inset-0 flex flex-col items-center justify-center text-yideli-dark">
                <div
                     class="bg-white/90 backdrop-blur-sm p-4 rounded-full shadow-md mb-2 group-hover:scale-110 transition-transform duration-300">
                  <svg xmlns="http://www.w3.org/2000/svg"
                       class="w-6 h-6"
                       viewBox="0 0 24 24"
                       fill="none"
                       stroke="currentColor"
                       stroke-width="2"
                       stroke-linecap="round"
                       stroke-linejoin="round">
                    <rect x="3"
                          y="11"
                          width="18"
                          height="11"
                          rx="2"
                          ry="2"></rect>
                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                  </svg>
                </div>
                <span class="text-xs font-bold uppercase tracking-widest bg-white/80 px-2 py-1 rounded">Private
                  Access</span>
              </div>

              <span
                    class="absolute top-4 start-4 bg-yideli-dark text-white text-[10px] font-bold px-2 py-1 uppercase tracking-widest">New</span>
            </div>

            <h3 class="text-lg font-serif text-yideli-dark group-hover:text-yideli-hover transition-colors">Artistic
              Series Spiral Notebook</h3>
            <p class="text-sm text-gray-500 mt-1">Twin-wire binding · Private Collection</p>
          </div>

          <div class="product-card group cursor-pointer"
               x-show="activeCategory === 'all' || activeCategory === 'notebooks'">
            <div class="aspect-[4/5] bg-[#fcfcee] relative overflow-hidden mb-4">
              <img src="{{ asset('images/line-circle-book-1.jpg') }}"
                   alt="Elastic Band Notebook"
                   class="w-full h-full object-contain p-4 group-hover:scale-105 transition duration-700">

              <div
                   class="product-action absolute bottom-0 start-0 w-full bg-white/95 backdrop-blur py-4 px-6 translate-y-full opacity-0 transition duration-300 border-t border-yideli-line flex justify-between items-center">
                <span class="text-xs font-bold uppercase tracking-wider text-yideli-dark">Quick View</span>
                <span class="text-yideli-dark">→</span>
              </div>
              <span
                    class="absolute top-4 start-4 bg-[#D4A373] text-white text-[10px] font-bold px-2 py-1 uppercase tracking-widest">Best
                Seller</span>
            </div>
            <h3 class="text-lg font-serif text-yideli-dark group-hover:underline underline-offset-4 decoration-1">Classic
              Elastic Band Journal</h3>
            <p class="text-sm text-gray-500 mt-1">PU Leather · Expandable Pocket · Multiple Colors</p>
          </div>

          <div class="product-card group cursor-pointer"
               x-show="activeCategory === 'all' || activeCategory === 'writing'">
            <div class="aspect-[4/5] bg-[#fcfcee] relative overflow-hidden mb-4">
              <img src="{{ asset('images/notebook-1.jpg') }}"
                   alt="Elastic Band Notebook"
                   class="w-full h-full object-contain p-4 group-hover:scale-105 transition duration-700">

              <div
                   class="product-action absolute bottom-0 start-0 w-full bg-white/95 backdrop-blur py-4 px-6 translate-y-full opacity-0 transition duration-300 border-t border-yideli-line flex justify-between items-center">
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
            <div class="aspect-[4/5] bg-[#fcfcee] relative overflow-hidden mb-4">
              <img src="{{ asset('images/notebook-2.jpg') }}"
                   alt="Elastic Band Notebook"
                   class="w-full h-full object-contain p-4 group-hover:scale-105 transition duration-700">

              <div
                   class="product-action absolute bottom-0 start-0 w-full bg-white/95 backdrop-blur py-4 px-6 translate-y-full opacity-0 transition duration-300 border-t border-yideli-line flex justify-between items-center">
                <span class="text-xs font-bold uppercase tracking-wider text-yideli-dark">Quick View</span>
                <span class="text-yideli-dark">→</span>
              </div>
            </div>
            <h3 class="text-lg font-serif text-yideli-dark group-hover:underline underline-offset-4 decoration-1">
              Executive Gel Pen Series</h3>
            <p class="text-sm text-gray-500 mt-1">0.5mm Tip · Quick Dry Ink · Smooth Grip</p>
          </div>

          <div class="product-card group cursor-pointer"
               x-show="activeCategory === 'all' || activeCategory === 'office'">
            <div class="aspect-[4/5] bg-[#fcfcee] relative overflow-hidden mb-4">
              <img src="{{ asset('images/weekly-calendar-2.jpg') }}"
                   alt="Elastic Band Notebook"
                   class="w-full h-full object-contain p-4 group-hover:scale-105 transition duration-700">

              <div
                   class="product-action absolute bottom-0 start-0 w-full bg-white/95 backdrop-blur py-4 px-6 translate-y-full opacity-0 transition duration-300 border-t border-yideli-line flex justify-between items-center">
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
            <div class="aspect-[4/5] bg-[#fcfcee] relative overflow-hidden mb-4">
              <img src="{{ asset('images/weekly-calendar-1.jpg') }}"
                   alt="Elastic Band Notebook"
                   class="w-full h-full object-contain p-4 group-hover:scale-105 transition duration-700">

              <div
                   class="product-action absolute bottom-0 start-0 w-full bg-white/95 backdrop-blur py-4 px-6 translate-y-full opacity-0 transition duration-300 border-t border-yideli-line flex justify-between items-center">
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
    <div x-show="productAccessModal.show"
         style="display: none;"
         class="fixed inset-0 z-[100] flex items-center justify-center px-4">

      <div x-show="productAccessModal.show"
           x-transition:enter="transition ease-out duration-300"
           x-transition:enter-start="opacity-0"
           x-transition:enter-end="opacity-100"
           x-transition:leave="transition ease-in duration-200"
           x-transition:leave-start="opacity-100"
           x-transition:leave-end="opacity-0"
           @click="productAccessModal.show = false"
           id="productAccessModal"
           class="absolute inset-0 bg-yideli-dark/60 backdrop-blur-sm"></div>

      <div x-show="productAccessModal.show"
           x-transition:enter="transition ease-out duration-300"
           x-transition:enter-start="opacity-0 scale-95 translate-y-4"
           x-transition:enter-end="opacity-100 scale-100 translate-y-0"
           x-transition:leave="transition ease-in duration-200"
           x-transition:leave-start="opacity-100 scale-100 translate-y-0"
           x-transition:leave-end="opacity-0 scale-95 translate-y-4"
           class="relative bg-white w-full max-w-md p-8 rounded-lg shadow-2xl text-center">

        <div class="mb-6 flex justify-center text-yideli-dark">
          <svg xmlns="http://www.w3.org/2000/svg"
               class="w-12 h-12"
               viewBox="0 0 24 24"
               fill="none"
               stroke="currentColor"
               stroke-width="1.5"
               stroke-linecap="round"
               stroke-linejoin="round">
            <rect x="3"
                  y="11"
                  width="18"
                  height="11"
                  rx="2"
                  ry="2"></rect>
            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
          </svg>
        </div>

        <h3 class="text-2xl font-serif text-yideli-dark mb-2">Restricted Access</h3>
        <p class="text-gray-500 text-sm mb-6">This product belongs to our private collection. Please enter the access
          code
          to view details.</p>

        <div class="space-y-4">
          <input type="password"
                 x-ref="passInput"
                 x-model="productAccessModal.password"
                 @keydown.enter="submitAccess()"
                 placeholder="Enter Access Code"
                 class="w-full text-center text-lg tracking-widest border-b-2 border-gray-200 focus:border-yideli-dark focus:outline-none py-2 transition-colors placeholder:text-gray-300 placeholder:text-sm placeholder:tracking-normal">

          <p x-show="productAccessModal.error"
             class="text-red-500 text-xs"
             x-transition>Incorrect access code. Please try again.</p>

          <button @click="submitAccess()"
                  class="w-full bg-yideli-dark text-white py-3 font-medium hover:bg-yideli-hover transition-colors uppercase tracking-widest text-sm">
            Unlock Product
          </button>
        </div>

        <button @click="productAccessModal.show = false"
                class="absolute top-4 right-4 text-gray-400 hover:text-gray-600">
          <svg class="w-5 h-5"
               fill="none"
               stroke="currentColor"
               viewBox="0 0 24 24">
            <path stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
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
        <a href="{{ route('inquire.form', ['lang' => $lang]) }}"
           class="px-8 py-3 bg-white text-yideli-dark font-medium uppercase text-xs tracking-widest hover:bg-yideli-base transition">Request
          Custom Quote</a>
        {{-- <a href="#"
           class="px-8 py-3 border border-white text-white font-medium uppercase text-xs tracking-widest hover:bg-white/10 transition">Download
          OEM Guide</a> --}}
      </div>
    </div>
  </section>
@endsection
