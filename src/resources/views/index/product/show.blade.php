@extends('index.layout')

@section('main')
  {{-- 顶部面包屑导航 --}}
  <div class="bg-gray-50 py-4 border-b border-gray-100">
    <div class="max-w-[1200px] mx-auto px-6 lg:px-12">
      <nav class="flex text-xs text-gray-500 uppercase tracking-widest gap-2">
        <a href="{{ route('index', ['lang' => $lang]) }}"
           class="hover:text-yideli-dark">Home</a>
        <span>/</span>
        @if ($product->category)
          <a href="{{ route('product.index', ['lang' => $lang, 'slug' => $product->category->slug]) }}"
             class="hover:text-yideli-dark">
            {{ $product->category->name }}
          </a>
          <span>/</span>
        @endif
        <span class="text-yideli-dark font-bold truncate">{{ $product->name }}</span>
      </nav>
    </div>
  </div>

  {{--
  Alpine Context (提升到最外层 div，包裹所有区域)
  包含：主图切换逻辑、密码验证逻辑
  --}}
  <div x-data="{
      activeImage: '{{ $product->cover_image ? asset('storage/' . $product->cover_image) : asset('images/placeholder.jpg') }}',
      productAccessModal: {
          show: false,
          url: '', // 目标跳转地址
          productId: null,
          password: '',
          error: false,
          errorMessage: ''
      },
      // 打开密码框：接收 目标URL 和 产品ID
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
                      // 验证成功，跳转到对应 URL (如果是主产品则是刷新，如果是关联产品则是跳转)
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

    {{-- 主产品区域 --}}
    <section class="max-w-[1200px] mx-auto px-6 lg:px-12 py-12 lg:py-20">
      <div class="grid lg:grid-cols-2 gap-12 lg:gap-20">

        {{-- 左侧：图片相册 --}}
        <div class="space-y-6">
          {{-- 主图显示区域 --}}
          <div class="aspect-[4/5] bg-gray-50 flex items-center justify-center border border-gray-100 p-8 overflow-hidden relative group cursor-pointer"
               @if (!$hasAccess) {{-- 如果未授权，点击触发弹窗，传入当前页 URL 和 ID --}}
            @click="promptAccess('{{ request()->fullUrl() }}', {{ $product->id }})" @endif>

            {{-- 图片：根据 hasAccess 判断是否模糊 --}}
            <img :src="activeImage"
                 alt="{{ $product->name }}"
                 class="w-full h-full object-contain transition-all duration-500 {{ $hasAccess ? 'mix-blend-multiply' : 'blur-xl opacity-70 pointer-events-none' }}">

            {{-- 锁图标层：未授权时显示 --}}
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
                <span class="mt-2 text-[10px] text-gray-500 bg-white/80 px-2 rounded">Click to Unlock</span>
              </div>
            @endif

            {{-- 标记 (New/Best Seller) --}}
            @if (is_array($product->flags) && in_array('hot', $product->flags))
              <div
                   class="absolute top-4 start-4 bg-[#D4A373] text-white text-[10px] font-bold px-2 py-1 uppercase tracking-widest">
                Best Seller
              </div>
            @elseif(is_array($product->flags) && in_array('new', $product->flags))
              <div
                   class="absolute top-4 start-4 bg-yideli-dark text-white text-[10px] font-bold px-2 py-1 uppercase tracking-widest">
                New Arrival
              </div>
            @endif
          </div>

          {{-- 缩略图列表 --}}
          @if ($product->images && count($product->images) > 1)
            <div class="grid grid-cols-4 gap-4">
              @foreach ($product->images as $image)
                @php $imgUrl = asset('storage/' . $image); @endphp
                <button @click="activeImage = '{{ $imgUrl }}'"
                        class="aspect-square bg-gray-50 border-transparent hover:border-yideli-dark p-2 transition border-2"
                        :class="activeImage === '{{ $imgUrl }}' ? 'border-yideli-dark' : 'border-transparent'">
                  {{-- 缩略图也需要判断权限，如果未解锁，缩略图也模糊 --}}
                  <img src="{{ $imgUrl }}"
                       class="w-full h-full object-contain mix-blend-multiply {{ !$hasAccess ? 'blur-sm' : '' }}">
                </button>
              @endforeach
            </div>
          @endif
        </div>

        {{-- 右侧：产品信息 --}}
        <div>
          @if ($product->code)
            <span class="text-sm text-yideli-dark font-bold uppercase tracking-widest mb-2 block">Model:
              {{ $product->code }}</span>
          @endif

          <h1 class="text-3xl lg:text-4xl font-serif text-yideli-text mb-6">{{ $product->name }}</h1>

          {{-- 简短描述 --}}
          @if ($product->description)
            <div class="text-gray-600 leading-relaxed font-light mb-8">
              {!! nl2br(e($product->description)) !!}
            </div>
          @endif

          {{-- 标签/特性图标 --}}
          @if ($product->tags)
            <div class="grid grid-cols-2 gap-4 mb-8">
              @foreach ($product->tags as $tag)
                <div class="flex items-center gap-3">
                  <svg class="w-5 h-5 text-yideli-dark"
                       fill="none"
                       stroke="currentColor"
                       viewBox="0 0 24 24">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M5 13l4 4L19 7"></path>
                  </svg>
                  <span class="text-sm text-gray-700">{{ $tag }}</span>
                </div>
              @endforeach
            </div>
          @endif

          {{-- 规格表 --}}
          <div class="mb-10">
            <h3 class="font-serif text-lg text-yideli-dark mb-4 border-b border-gray-200 pb-2">Specifications</h3>
            <table class="w-full text-sm spec-table text-left">
              <tbody>
                @if ($product->material)
                  <tr class="border-b border-gray-50">
                    <th class="py-2 w-1/3 text-gray-500 font-medium">Material</th>
                    <td class="py-2 text-gray-700">{{ $product->material }}</td>
                  </tr>
                @endif
                @if ($product->code)
                  <tr class="border-b border-gray-50">
                    <th class="py-2 w-1/3 text-gray-500 font-medium">Item Code</th>
                    <td class="py-2 text-gray-700">{{ $product->code }}</td>
                  </tr>
                @endif
              </tbody>
            </table>
          </div>

          {{-- 询盘按钮 --}}
          <div class="bg-gray-50 p-6 border border-gray-100 rounded-sm">
            <p class="text-xs text-gray-500 mb-4 uppercase tracking-widest font-bold">Interested in this product?</p>
            <div class="flex flex-col sm:flex-row gap-4">
              <a href="{{ route('inquire.form', ['lang' => $lang, 'product' => $product->name]) }}"
                 class="flex-1 bg-yideli-dark text-white text-center py-4 text-sm font-bold uppercase tracking-widest hover:bg-yideli-hover transition shadow-lg shadow-yideli-dark/20">
                Request Quote
              </a>
            </div>
            <p class="text-[10px] text-gray-400 mt-3 text-center">
              Volume discounts available for bulk orders.
            </p>
          </div>
        </div>
      </div>
    </section>

    {{-- 详情内容区域 (富文本) --}}
    @if ($product->content)
      <section class="bg-yideli-base border-t border-yideli-line py-16">
        <div class=" max-w-[1000px] mx-auto px-6 lg:px-12">
          <div class="prose max-w-none text-center text-gray-600 font-light">
            {!! $product->content !!}
          </div>
        </div>
      </section>
    @endif

    {{-- 关联商品 (You May Also Like) --}}
    @if ($relatedProducts->isNotEmpty())
      <section class="max-w-[1200px] mx-auto px-6 lg:px-12 py-20">
        <div class="flex justify-between items-end mb-10 border-b border-gray-100 pb-4">
          <h2 class="text-2xl font-serif text-yideli-dark">You May Also Like</h2>
          <a href="{{ route('product.index', ['lang' => $lang]) }}"
             class="text-xs font-bold uppercase tracking-widest text-yideli-dark hover:underline">View All</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
          @foreach ($relatedProducts as $related)
            @php
              // 获取关联商品的授权状态
              $unlockedIds = session('unlocked_product_ids', []);
              $isRelatedPrivate = $related->accessCodes()->exists();
              $hasRelatedAccess = !$isRelatedPrivate || in_array($related->id, $unlockedIds);

              $relImg = $related->cover_image
                  ? asset('storage/' . $related->cover_image)
                  : asset('images/placeholder.jpg');
            @endphp

            {{--
            交互逻辑：
            - 已解锁：直接 onclick 跳转
            - 未解锁：@click 调用 promptAccess，传入 目标URL 和 关联商品ID
            --}}
            <div class="group block cursor-pointer"
                 @if ($hasRelatedAccess) onclick="window.location.href='{{ route('product.show', ['lang' => $lang, 'slug' => $related->slug]) }}'" @else
                @click="promptAccess('{{ route('product.show', ['lang' => $lang, 'slug' => $related->slug]) }}', {{ $related->id }})" @endif>
              <div class="aspect-[4/5] bg-gray-50 mb-4 overflow-hidden relative">
                <img src="{{ $relImg }}"
                     class="w-full h-full object-cover transition duration-500
                                {{ $hasRelatedAccess ? 'group-hover:scale-105' : 'blur-md opacity-70' }}">

                {{-- 锁图标 --}}
                @if (!$hasRelatedAccess)
                  <div class="absolute inset-0 flex items-center justify-center">
                    <div class="bg-white/80 p-2 rounded-full shadow-sm">
                      <svg xmlns="http://www.w3.org/2000/svg"
                           class="w-4 h-4 text-yideli-dark"
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
                  </div>
                @endif
              </div>
              <h3 class="text-lg font-serif text-yideli-text group-hover:text-yideli-dark transition">
                {{ $related->name }}
              </h3>
              <p class="text-sm text-gray-400 mt-1">{{ $related->category ? $related->category->name : '' }}</p>
            </div>
          @endforeach
        </div>
      </section>
    @endif

    {{--
    密码弹窗 Modal
    放置在最外层 x-data 内部底部，以确保覆盖所有内容
    --}}
    <div x-show="productAccessModal.show"
         style="display: none;"
         class="fixed inset-0 z-[100] flex items-center justify-center px-4">
      {{-- 背景遮罩 --}}
      <div class="absolute inset-0 bg-yideli-dark/60 backdrop-blur-sm"
           @click="productAccessModal.show = false"></div>

      {{-- 弹窗主体 --}}
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
             x-text="productAccessModal.errorMessage"
             x-transition></p>
          <button @click="submitAccess()"
                  class="w-full bg-yideli-dark text-white py-3 font-medium hover:bg-yideli-hover transition-colors uppercase tracking-widest text-sm">Unlock
            Product</button>
        </div>
        {{-- 关闭按钮 --}}
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

  </div> {{-- End x-data --}}

@endsection
