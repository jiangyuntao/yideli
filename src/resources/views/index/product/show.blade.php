@extends('index.layout')

@section('title', $product->name)

@section('main')
  <div class="bg-gray-50 py-4 border-b border-gray-100">
    <div class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto px-6 lg:px-12">
      <nav class="flex text-xs text-gray-500 uppercase tracking-widest gap-2">
        <a class="hover:text-yideli-dark"
           href="{{ route('index', ['lang' => $lang]) }}">{{ __('layout.nav_home') }}</a>
        <span>/</span>
        @if ($product->category)
          <a class="hover:text-yideli-dark"
             href="{{ route('product.index', ['lang' => $lang, 'slug' => $product->category->slug]) }}">
            {{ $product->category->name }}
          </a>
          <span>/</span>
        @endif
        <span class="text-yideli-dark font-bold truncate">{{ $product->name }}</span>
      </nav>
    </div>
  </div>

  <div x-data="{
      activeImage: '{{ $product->cover_image ? asset('storage/' . $product->cover_image) : asset('images/placeholder.jpg') }}',
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

    <section
             class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto px-6 lg:px-12 py-12 lg:py-20">
      <div class="grid lg:grid-cols-2 gap-12 lg:gap-20">

        <div class="space-y-6">
          <div class="aspect-[4/5] bg-gray-50 flex items-center justify-center border border-gray-100 p-8 overflow-hidden relative group cursor-pointer"
               @if (!$hasAccess) @click="promptAccess('{{ request()->fullUrl() }}', {{ $product->id }})" @endif>

            <img class="w-full h-full object-contain transition-all duration-500 {{ $hasAccess ? 'mix-blend-multiply' : 'blur-xl opacity-70 pointer-events-none' }}"
                 alt="{{ $product->name }}"
                 :src="activeImage">

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
                <span
                      class="mt-2 text-[10px] text-gray-500 bg-white/80 px-2 rounded">{{ __('product.detail_click_to_unlock') }}</span>
              </div>
            @endif

            @if (is_array($product->flags) && in_array('hot', $product->flags))
              <div
                   class="absolute top-4 start-4 bg-[#D4A373] text-white text-[10px] font-bold px-2 py-1 uppercase tracking-widest">
                {{ __('product.badge_best_seller') }}
              </div>
            @elseif(is_array($product->flags) && in_array('new', $product->flags))
              <div
                   class="absolute top-4 start-4 bg-yideli-dark text-white text-[10px] font-bold px-2 py-1 uppercase tracking-widest">
                {{ __('product.detail_badge_new_arrival') }}
              </div>
            @endif
          </div>

          @if ($product->images && count($product->images) > 1)
            <div class="grid grid-cols-4 gap-4">
              @foreach ($product->images as $image)
                @php $imgUrl = asset('storage/' . $image); @endphp
                <button class="aspect-square bg-gray-50 border-transparent hover:border-yideli-dark p-2 transition border-2"
                        @click="activeImage = '{{ $imgUrl }}'"
                        :class="activeImage === '{{ $imgUrl }}' ? 'border-yideli-dark' : 'border-transparent'">
                  <img class="w-full h-full object-contain mix-blend-multiply {{ !$hasAccess ? 'blur-sm' : '' }}"
                       src="{{ $imgUrl }}">
                </button>
              @endforeach
            </div>
          @endif
        </div>

        <div>
          @if ($product->code)
            <span
                  class="text-sm text-yideli-dark font-bold uppercase tracking-widest mb-2 block">{{ __('product.detail_model') }}:
              {{ $product->code }}</span>
          @endif

          <h1 class="text-3xl lg:text-4xl font-serif text-yideli-text mb-6">{{ $product->name }}</h1>

          @if ($product->description)
            <div class="text-gray-600 leading-relaxed font-light mb-8">
              {!! nl2br(e($product->description)) !!}
            </div>
          @endif

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

          <div class="mb-10">
            <h3 class="font-serif text-lg text-yideli-dark mb-4 border-b border-gray-200 pb-2">
              {{ __('product.detail_specifications') }}</h3>
            <table class="w-full text-sm spec-table text-left">
              <tbody>
                @if ($product->material)
                  <tr class="border-b border-gray-50">
                    <th class="py-2 w-1/3 text-gray-500 font-medium">{{ __('product.detail_material') }}</th>
                    <td class="py-2 text-gray-700">{{ $product->material }}</td>
                  </tr>
                @endif
                @if ($product->code)
                  <tr class="border-b border-gray-50">
                    <th class="py-2 w-1/3 text-gray-500 font-medium">{{ __('product.detail_item_code') }}</th>
                    <td class="py-2 text-gray-700">{{ $product->code }}</td>
                  </tr>
                @endif
              </tbody>
            </table>
          </div>

          <div class="bg-gray-50 p-6 border border-gray-100 rounded-sm">
            <p class="text-xs text-gray-500 mb-4 uppercase tracking-widest font-bold">
              {{ __('product.detail_interested_title') }}</p>
            <div class="flex flex-col sm:flex-row gap-4">
              <a class="flex-1 bg-yideli-dark text-white text-center py-4 text-sm font-bold uppercase tracking-widest hover:bg-yideli-hover transition shadow-lg shadow-yideli-dark/20"
                 href="{{ route('inquire.form', ['lang' => $lang, 'product' => $product->name]) }}">
                {{ __('product.detail_request_quote') }}
              </a>
            </div>
            <p class="text-[10px] text-gray-400 mt-3 text-center">
              {{ __('product.detail_volume_discount') }}
            </p>
          </div>
        </div>
      </div>
    </section>

    @if ($product->content)
      <section class="bg-yideli-base border-t border-yideli-line py-16">
        <div class=" max-w-[1000px] mx-auto px-6 lg:px-12">
          <div class="prose max-w-none text-center text-gray-600 font-light">
            {!! $product->content !!}
          </div>
        </div>
      </section>
    @endif

    @if ($relatedProducts->isNotEmpty())
      <section class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto px-6 lg:px-12 py-20">
        <div class="flex justify-between items-end mb-10 border-b border-gray-100 pb-4">
          <h2 class="text-2xl font-serif text-yideli-dark">{{ __('product.detail_related_title') }}</h2>
          <a class="text-xs font-bold uppercase tracking-widest text-yideli-dark hover:underline"
             href="{{ route('product.index', ['lang' => $lang]) }}">{{ __('product.detail_view_all_related') }}</a>
        </div>

        <div
             class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 min-[1921px]:grid-cols-5 min-[2561px]:grid-cols-6 gap-8">
          @foreach ($relatedProducts as $related)
            @php
              $unlockedIds = session('unlocked_product_ids', []);
              $isRelatedPrivate = $related->accessCodes()->exists();
              $hasRelatedAccess = !$isRelatedPrivate || in_array($related->id, $unlockedIds);

              $relImg = $related->cover_image
                  ? asset('storage/' . $related->cover_image)
                  : asset('images/placeholder.jpg');
            @endphp

            <div class="group block cursor-pointer"
                 @if ($hasRelatedAccess) onclick="window.location.href='{{ route('product.show', ['lang' => $lang, 'slug' => $related->slug]) }}'" @else
                @click="promptAccess('{{ route('product.show', ['lang' => $lang, 'slug' => $related->slug]) }}', {{ $related->id }})" @endif>
              <div class="aspect-[4/5] bg-gray-50 mb-4 overflow-hidden relative">
                <img class="w-full h-full object-cover transition duration-500
                                      {{ $hasRelatedAccess ? 'group-hover:scale-105' : 'blur-md opacity-70' }}"
                     src="{{ $relImg }}">

                @if (!$hasRelatedAccess)
                  <div class="absolute inset-0 flex items-center justify-center">
                    <div class="bg-white/80 p-2 rounded-full shadow-sm">
                      <svg class="w-4 h-4 text-yideli-dark"
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

@endsection
