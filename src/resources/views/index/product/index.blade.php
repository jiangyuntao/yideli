@extends('index.layout')

@section('main')
  {{-- 1. 顶部文字区域 --}}
  <div class="bg-yideli-base py-16 lg:py-24">
    <div class="max-w-[1200px] mx-auto px-6 lg:px-12 text-center">
      <span class="text-xs font-bold tracking-[0.2em] uppercase text-yideli-dark mb-4 block">Our Collections</span>

      <h1 class="text-4xl lg:text-6xl font-serif text-yideli-dark mb-6">
        {{ $currentCategory ? $currentCategory->name : 'Designed for Inspiration' }}
      </h1>

      <p class="text-gray-600 max-w-2xl mx-auto font-light text-lg">
        {{ $currentCategory ? $currentCategory->description : 'Explore our comprehensive range of stationery. From the tactile feel of our premium notebooks to the precision of our writing instruments.' }}
      </p>
    </div>
  </div>

  {{-- 2. Banner 图片 --}}
  <div class="bg-yideli-base bg-[#86806e]">
    <div class="max-w-[1920px] mx-auto">
      <img src="{{ asset('images/product-index-banner.jpg') }}"
           class="w-full h-auto">
    </div>
  </div>

  {{-- 3. 主要内容区域 --}}
  <div class="max-w-[1200px] mx-auto px-6 lg:px-12 py-12 lg:py-20"
       x-data="{
           mobileFilterOpen: false,
           productAccessModal: {
               show: false,
               url: '', // 存储目标产品的详情页 URL
               productId: null,
               password: '',
               error: false,
               errorMessage: ''
           },
           // 打开密码框：接收 url 和 id
           promptAccess(url, id) {
               this.productAccessModal.url = url;
               this.productAccessModal.productId = id;
               this.productAccessModal.show = true;
               this.productAccessModal.password = '';
               this.productAccessModal.error = false;
               this.productAccessModal.errorMessage = '';
               // 延时聚焦，提升体验
               setTimeout(() => $refs.passInput.focus(), 100);
           },
           // 提交验证
           submitAccess() {
               if (!this.productAccessModal.password) {
                   this.productAccessModal.error = true;
                   this.productAccessModal.errorMessage = 'Please enter a code.';
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
                           // ============================================================
                           // 修改点：验证成功后，直接跳转到该产品的详情页 URL
                           // ============================================================
                           window.location.href = this.productAccessModal.url;
                       } else {
                           this.productAccessModal.error = true;
                           this.productAccessModal.errorMessage = data.message || 'Incorrect access code.';
                       }
                   })
                   .catch(error => {
                       console.error('Error:', error);
                       this.productAccessModal.error = true;
                       this.productAccessModal.errorMessage = 'System error, please try again.';
                   });
           }
       }">

    <div class="flex flex-col lg:flex-row gap-12">

      {{-- 侧边栏 --}}
      <aside class="hidden lg:block w-64 flex-shrink-0">
        <div class="sticky top-32 space-y-10">
          <div>
            <h3 class="font-serif text-xl mb-6 text-yideli-dark">Categories</h3>
            @php
              $activeClass = 'text-yideli-dark font-bold ps-2 border-l-2 border-yideli-dark';
              $inactiveClass =
                  'text-gray-500 hover:text-yideli-dark transition-all duration-200 block w-full text-start';
              $currentSlug = $currentCategory ? $currentCategory->slug : null;
            @endphp
            <ul class="space-y-3 text-sm">
              <li>
                <a href="{{ route('product.index', ['lang' => $lang]) }}"
                   class="{{ is_null($currentSlug) ? $activeClass : $inactiveClass }}">View All</a>
              </li>
              @foreach ($categories as $category)
                <li x-data="{ expanded: {{ $currentSlug === $category->slug || $category->children->contains('slug', $currentSlug) ? 'true' : 'false' }} }">
                  @if ($category->children->isNotEmpty())
                    <div class="flex items-center justify-between group">
                      <a href="{{ route('product.index', ['lang' => $lang, 'slug' => $category->slug]) }}"
                         class="flex-1 {{ $currentSlug === $category->slug ? $activeClass : $inactiveClass }}">{{ $category->name }}</a>
                      <button @click.prevent="expanded = !expanded"
                              class="p-1 text-gray-400 hover:text-yideli-dark focus:outline-none"><span x-show="expanded"
                              class="text-sm">−</span><span x-show="!expanded"
                              class="text-sm">+</span></button>
                    </div>
                    <ul x-show="expanded"
                        x-collapse
                        class="mt-2 ms-4 space-y-2 text-xs text-gray-600">
                      @foreach ($category->children as $child)
                        <li><a href="{{ route('product.index', ['lang' => $lang, 'slug' => $child->slug]) }}"
                             class="block {{ $currentSlug === $child->slug ? 'text-yideli-dark font-semibold' : 'hover:text-yideli-dark' }}">{{ $child->name }}</a>
                        </li>
                      @endforeach
                    </ul>
                  @else
                    <a href="{{ route('product.index', ['lang' => $lang, 'slug' => $category->slug]) }}"
                       class="{{ $currentSlug === $category->slug ? $activeClass : $inactiveClass }}">{{ $category->name }}</a>
                  @endif
                </li>
              @endforeach
            </ul>
          </div>

          @if ($availableMaterials->isNotEmpty())
            <div>
              <h3 class="font-serif text-xl mb-6 text-yideli-dark">Material</h3>
              <form action="{{ url()->current() }}"
                    method="GET"
                    class="space-y-2">
                @foreach ($availableMaterials as $material)
                  <label class="flex items-center gap-3 cursor-pointer group">
                    <input type="checkbox"
                           name="material[]"
                           value="{{ $material }}"
                           {{ in_array($material, request('material', [])) ? 'checked' : '' }}
                           onchange="this.form.submit()"
                           class="w-4 h-4 rounded border-gray-300 text-yideli-dark focus:ring-yideli-dark">
                    <span
                          class="text-sm text-gray-500 group-hover:text-yideli-dark transition">{{ $material }}</span>
                  </label>
                @endforeach
              </form>
            </div>
          @endif
        </div>
      </aside>

      {{-- 移动端 Filter --}}
      <div class="lg:hidden w-full mb-8">
        <button @click="mobileFilterOpen = !mobileFilterOpen"
                class="w-full flex justify-between items-center px-4 py-3 border border-gray-200 text-sm font-medium"><span>Filter
            Products</span><span>+</span></button>
        <div x-show="mobileFilterOpen"
             class="border-x border-b border-gray-200 p-4 space-y-4">
          <a href="{{ route('product.index', ['lang' => $lang]) }}"
             class="block w-full text-start text-sm py-1 {{ is_null($currentSlug) ? 'font-bold text-yideli-dark' : '' }}">View
            All</a>
          @foreach ($categories as $category)
            <a href="{{ route('product.index', ['lang' => $lang, 'slug' => $category->slug]) }}"
               class="block w-full text-start text-sm py-1 {{ $currentSlug === $category->slug ? 'font-bold text-yideli-dark' : '' }}">{{ $category->name }}</a>
          @endforeach
        </div>
      </div>

      {{-- ================= 产品列表 ================= --}}
      <div class="flex-1">
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-x-8 gap-y-12">

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
              {{-- 已解锁：直接跳转 --}}
              <a href="{{ route('product.show', ['lang' => $lang, 'slug' => $product->slug]) }}"
                 class="product-card group cursor-pointer block">
              @else
                {{-- 未解锁：点击触发弹窗，并传入目标 URL 和 产品 ID --}}
                <div @click="promptAccess('{{ route('product.show', ['lang' => $lang, 'slug' => $product->slug]) }}', {{ $product->id }})"
                     class="product-card group cursor-pointer">
            @endif

            <div
                 class="aspect-[4/5] bg-[#fcfcee] relative overflow-hidden mb-4 group-hover:shadow-lg transition-all duration-300">
              <img src="{{ $imgUrl }}"
                   alt="{{ $product->name }}"
                   class="w-full h-full object-cover scale-105 pointer-events-none transition duration-700
                                {{ $hasAccess ? 'group-hover:scale-110' : 'blur-xl opacity-70' }}">

              @if (!$hasAccess)
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
              @endif

              @if (is_array($product->flags) && in_array('new', $product->flags))
                <span
                      class="absolute top-4 start-4 bg-yideli-dark text-white text-[10px] font-bold px-2 py-1 uppercase tracking-widest">New</span>
              @elseif(is_array($product->flags) && in_array('hot', $product->flags))
                <span
                      class="absolute top-4 start-4 bg-[#D4A373] text-white text-[10px] font-bold px-2 py-1 uppercase tracking-widest">Best
                  Seller</span>
              @endif
            </div>

            <h3 class="text-lg font-serif text-yideli-dark group-hover:underline underline-offset-4 decoration-1">
              {{ $product->name }}</h3>
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
          <p class="text-gray-500 text-lg">No products found.</p>
          @if ($currentSlug)
            <a href="{{ route('product.index', ['lang' => $lang]) }}"
               class="text-yideli-dark underline mt-2 block">View all
              products</a>
          @endif
        </div>
        @endforelse

      </div>

      <div class="mt-20 flex justify-center">
        {{ $products->onEachSide(1)->links() }}
      </div>
    </div>
  </div>

  {{-- 密码弹窗 --}}
  <div x-show="productAccessModal.show"
       style="display: none;"
       class="fixed inset-0 z-[100] flex items-center justify-center px-4">
    <div class="absolute inset-0 bg-yideli-dark/60 backdrop-blur-sm"
         @click="productAccessModal.show = false"></div>
    <div class="relative bg-white w-full max-w-md p-8 rounded-lg shadow-2xl text-center">
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
      <p class="text-gray-500 text-sm mb-6">This product belongs to our private collection. Please enter the access code
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
           x-text="productAccessModal.errorMessage"
           x-transition></p>
        <button @click="submitAccess()"
                class="w-full bg-yideli-dark text-white py-3 font-medium hover:bg-yideli-hover transition-colors uppercase tracking-widest text-sm">Unlock
          Product</button>
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

  {{-- 底部服务 --}}
  <section class="bg-yideli-dark text-white py-16">
    <div class="max-w-4xl mx-auto px-6 text-center">
      <h2 class="text-3xl font-serif mb-4">Custom OEM/ODM Services</h2>
      <p class="text-white/80 mb-8 font-light">Can't find exactly what you're looking for? We offer full customization
        for
        size, material, logo, and packaging.</p>
      <div class="flex flex-col sm:flex-row justify-center gap-4">
        <a href="{{ route('inquire.form', ['lang' => $lang]) }}"
           class="px-8 py-3 bg-white text-yideli-dark font-medium uppercase text-xs tracking-widest hover:bg-yideli-base transition">Request
          Custom Quote</a>
      </div>
    </div>
  </section>
@endsection
