@extends('index.layout')

@section('title', $currentCategory ? $currentCategory->name : __('product.default_collection_title'))

@section('main')
  <div class="bg-yideli-base py-16 lg:py-24">
    <div class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto px-6 lg:px-12 text-center">
      <span
            class="text-xs font-bold tracking-[0.2em] uppercase text-yideli-dark mb-4 block">{{ __('product.our_collections') }}</span>

      <h1 class="text-4xl lg:text-6xl font-serif text-yideli-dark mb-6">
        {{ $currentCategory ? $currentCategory->name : __('product.default_collection_title') }}
      </h1>

      <p class="text-gray-600 max-w-2xl mx-auto font-light text-lg">
        {{ $currentCategory ? $currentCategory->description : __('product.default_collection_desc') }}
      </p>
    </div>
  </div>

  <div class="bg-yideli-base bg-[#86806e]">
    <div class="w-full max-w-[1920px] min-[1921px]:max-w-full mx-auto">
      <img class="w-full h-auto"
           src="{{ asset('images/product-index-banner.jpg') }}">
    </div>
  </div>

  <div class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto px-6 lg:px-12 py-12 lg:py-20"
       x-data="{
           mobileFilterOpen: false,
           productAccessModal: {
               show: false,
               url: '',
               productId: null,
               password: '',
               error: false,
               errorMessage: ''
           },
           promptAccess(url, id) {
               this.productAccessModal.url = url;
               this.productAccessModal.productId = id;
               this.productAccessModal.show = true;
               this.productAccessModal.password = '';
               this.productAccessModal.error = false;
               this.productAccessModal.errorMessage = '';
               setTimeout(() => $refs.passInput.focus(), 100);
           },
           submitAccess() {
               if (!this.productAccessModal.password) {
                   this.productAccessModal.error = true;
                   this.productAccessModal.errorMessage = '{{ __('product.js_error_empty') }}';
                   return;
               }

               fetch('/api/verify-access-code', {
                       method: 'POST',
                       headers: {
                           'Content-Type': 'application/json',
                           'X-CSRF-TOKEN': document.querySelector('meta[name=\'csrf-token\']').getAttribute('content')
                       },
                       body: JSON.stringify({
                           code: this.productAccessModal.password,
                           product_id: this.productAccessModal.productId
                       })
                   })
                   .then(response => response.json())
                   .then(data => {
                       if (data.valid) {
                           window.location.href = this.productAccessModal.url;
                       } else {
                           this.productAccessModal.error = true;
                           this.productAccessModal.errorMessage = data.message || '{{ __('product.js_error_incorrect') }}';
                       }
                   })
                   .catch(error => {
                       console.error('Error:', error);
                       this.productAccessModal.error = true;
                       this.productAccessModal.errorMessage = '{{ __('product.js_error_system') }}';
                   });
           }
       }">

    <div class="flex flex-col lg:flex-row gap-12">

      <aside class="hidden lg:block w-64 flex-shrink-0">
        <div class="sticky top-32 space-y-10">
          <div>
            <h3 class="font-serif text-xl mb-6 text-yideli-dark">{{ __('product.sidebar_categories') }}</h3>
            @php
              $activeClass = 'text-yideli-dark font-bold ps-2 border-l-2 border-yideli-dark';
              $inactiveClass =
                  'text-gray-500 hover:text-yideli-dark transition-all duration-200 block w-full text-start';
              $currentSlug = $currentCategory ? $currentCategory->slug : null;
            @endphp
            <ul class="space-y-3 text-sm">
              <li>
                <a class="{{ is_null($currentSlug) ? $activeClass : $inactiveClass }}"
                   href="{{ route('product.index', ['lang' => $lang]) }}">{{ __('product.sidebar_view_all') }}</a>
              </li>
              @foreach ($categories as $category)
                <li x-data="{ expanded: {{ $currentSlug === $category->slug || $category->children->contains('slug', $currentSlug) ? 'true' : 'false' }} }">
                  @if ($category->children->isNotEmpty())
                    <div class="flex items-center justify-between group">
                      <a class="flex-1 {{ $currentSlug === $category->slug ? $activeClass : $inactiveClass }}"
                         href="{{ route('product.index', ['lang' => $lang, 'slug' => $category->slug]) }}">{{ $category->name }}</a>
                      <button class="p-1 text-gray-400 hover:text-yideli-dark focus:outline-none"
                              @click.prevent="expanded = !expanded"><span class="text-sm"
                              x-show="expanded">−</span><span class="text-sm"
                              x-show="!expanded">+</span></button>
                    </div>
                    <ul class="mt-2 ms-4 space-y-2 text-xs text-gray-600"
                        x-show="expanded"
                        x-collapse>
                      @foreach ($category->children as $child)
                        <li><a
                             class="block {{ $currentSlug === $child->slug ? 'text-yideli-dark font-semibold' : 'hover:text-yideli-dark' }}"
                             href="{{ route('product.index', ['lang' => $lang, 'slug' => $child->slug]) }}">{{ $child->name }}</a>
                        </li>
                      @endforeach
                    </ul>
                  @else
                    <a class="{{ $currentSlug === $category->slug ? $activeClass : $inactiveClass }}"
                       href="{{ route('product.index', ['lang' => $lang, 'slug' => $category->slug]) }}">{{ $category->name }}</a>
                  @endif
                </li>
              @endforeach
            </ul>
          </div>

          @if ($availableMaterials->isNotEmpty())
            <div>
              <h3 class="font-serif text-xl mb-6 text-yideli-dark">{{ __('product.sidebar_material') }}</h3>
              <form class="space-y-2"
                    action="{{ url()->current() }}"
                    method="GET">
                @foreach ($availableMaterials as $material)
                  <label class="flex items-center gap-3 cursor-pointer group">
                    <input class="w-4 h-4 rounded border-gray-300 text-yideli-dark focus:ring-yideli-dark"
                           name="material[]"
                           type="checkbox"
                           value="{{ $material }}"
                           {{ in_array($material, request('material', [])) ? 'checked' : '' }}
                           onchange="this.form.submit()">
                    <span
                          class="text-sm text-gray-500 group-hover:text-yideli-dark transition">{{ $material }}</span>
                  </label>
                @endforeach
              </form>
            </div>
          @endif
        </div>
      </aside>

      <div class="lg:hidden w-full mb-8">
        <button class="w-full flex justify-between items-center px-4 py-3 border border-gray-200 text-sm font-medium"
                @click="mobileFilterOpen = !mobileFilterOpen"><span>{{ __('product.filter_btn') }}</span><span>+</span></button>
        <div class="border-x border-b border-gray-200 p-4 space-y-4"
             x-show="mobileFilterOpen">
          <a class="block w-full text-start text-sm py-1 {{ is_null($currentSlug) ? 'font-bold text-yideli-dark' : '' }}"
             href="{{ route('product.index', ['lang' => $lang]) }}">{{ __('product.sidebar_view_all') }}</a>
          @foreach ($categories as $category)
            <a class="block w-full text-start text-sm py-1 {{ $currentSlug === $category->slug ? 'font-bold text-yideli-dark' : '' }}"
               href="{{ route('product.index', ['lang' => $lang, 'slug' => $category->slug]) }}">{{ $category->name }}</a>
          @endforeach
        </div>
      </div>

      <div class="flex-1">
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 min-[2561px]:grid-cols-4 gap-x-8 gap-y-12">

          @php
            $unlockedProductIds = session('unlocked_product_ids', []);
          @endphp

          @forelse($products as $product)
            @php
              $hasAccess = in_array($product->id, $unlockedProductIds);
              $imgUrl = $product->cover_image
                  ? asset('storage/' . $product->cover_image)
                  : asset('images/placeholder.jpg');
            @endphp

            @if ($hasAccess)
              <a class="product-card group cursor-pointer block"
                 href="{{ route('product.show', ['lang' => $lang, 'slug' => $product->slug]) }}">
              @else
                <div class="product-card group cursor-pointer"
                     @click="promptAccess('{{ route('product.show', ['lang' => $lang, 'slug' => $product->slug]) }}', {{ $product->id }})">
            @endif

            <div
                 class="aspect-[4/5] bg-[#fcfcee] relative overflow-hidden mb-4 group-hover:shadow-lg transition-all duration-300">
              <img class="w-full h-full object-cover scale-105 pointer-events-none transition duration-700
                                    {{ $hasAccess ? 'group-hover:scale-110' : 'blur-xl opacity-70' }}"
                   src="{{ $imgUrl }}"
                   alt="{{ $product->name }}">

              @if (!$hasAccess)
                <div class="absolute inset-0 bg-yideli-text/10 group-hover:bg-yideli-text/20 transition-colors"></div>
                <div class="absolute inset-0 flex flex-col items-center justify-center text-yideli-dark">
                  <div
                       class="bg-white/90 backdrop-blur-sm p-4 rounded-full shadow-md mb-2 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-6 h-6"
                         xmlns="http://www.w3.org/2000/svg"
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
                  <span
                        class="text-xs font-bold uppercase tracking-widest bg-white/80 px-2 py-1 rounded">{{ __('product.private_access_label') }}</span>
                </div>
              @endif

              @if (is_array($product->flags) && in_array('new', $product->flags))
                <span
                      class="absolute top-4 start-4 bg-yideli-dark text-white text-[10px] font-bold px-2 py-1 uppercase tracking-widest">{{ __('product.badge_new') }}</span>
              @elseif(is_array($product->flags) && in_array('hot', $product->flags))
                <span
                      class="absolute top-4 start-4 bg-[#D4A373] text-white text-[10px] font-bold px-2 py-1 uppercase tracking-widest">{{ __('product.badge_best_seller') }}</span>
              @endif
            </div>

            <h3 class="text-lg font-serif text-yideli-dark group-hover:underline underline-offset-4 decoration-1">
              {{ $product->name }}
            </h3>
            <p class="text-sm text-gray-500 mt-1">
              {{ $product->material ? $product->material : \Illuminate\Support\Str::limit(strip_tags($product->description), 30) }}
            </p>

            @if ($hasAccess)
              </a>
            @else
        </div>
        @endif

      @empty
        <div class="col-span-full text-center py-20">
          <p class="text-gray-500 text-lg">{{ __('product.no_products_found') }}</p>
          @if ($currentSlug)
            <a class="text-yideli-dark underline mt-2 block"
               href="{{ route('product.index', ['lang' => $lang]) }}">{{ __('product.view_all_link') }}</a>
          @endif
        </div>
        @endforelse

      </div>

      <div class="mt-20 flex justify-center">
        {{ $products->onEachSide(1)->links() }}
      </div>
    </div>
  </div>

  <div class="fixed inset-0 z-[100] flex items-center justify-center px-4"
       style="display: none;"
       x-show="productAccessModal.show">
    <div class="absolute inset-0 bg-yideli-dark/60 backdrop-blur-sm"
         @click="productAccessModal.show = false"></div>
    <div class="relative bg-white w-full max-w-md p-8 rounded-lg shadow-2xl text-center">
      <div class="mb-6 flex justify-center text-yideli-dark">
        <svg class="w-12 h-12"
             xmlns="http://www.w3.org/2000/svg"
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
      <h3 class="text-2xl font-serif text-yideli-dark mb-2">{{ __('product.modal_title') }}</h3>
      <p class="text-gray-500 text-sm mb-6">{{ __('product.modal_desc') }}</p>
      <div class="space-y-4">
        <input class="w-full text-center text-lg tracking-widest border-b-2 border-gray-200 focus:border-yideli-dark focus:outline-none py-2 transition-colors placeholder:text-gray-300 placeholder:text-sm placeholder:tracking-normal"
               type="password"
               x-ref="passInput"
               x-model="productAccessModal.password"
               @keydown.enter="submitAccess()"
               placeholder="{{ __('product.modal_placeholder') }}">
        <p class="text-red-500 text-xs"
           x-show="productAccessModal.error"
           x-text="productAccessModal.errorMessage"
           x-transition></p>
        <button class="w-full bg-yideli-dark text-white py-3 font-medium hover:bg-yideli-hover transition-colors uppercase tracking-widest text-sm"
                @click="submitAccess()">{{ __('product.modal_unlock_btn') }}</button>
      </div>
      <button class="absolute top-4 right-4 text-gray-400 hover:text-gray-600"
              @click="productAccessModal.show = false">
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
      <h2 class="text-3xl font-serif mb-4">{{ __('product.custom_service_title') }}</h2>
      <p class="text-white/80 mb-8 font-light">{{ __('product.custom_service_desc') }}</p>
      <div class="flex flex-col sm:flex-row justify-center gap-4">
        <a class="px-8 py-3 bg-white text-yideli-dark font-medium uppercase text-xs tracking-widest hover:bg-yideli-base transition"
           href="{{ route('inquire.form', ['lang' => $lang]) }}">{{ __('product.request_custom_quote') }}</a>
      </div>
    </div>
  </section>
@endsection
