@extends('index.layout')

@section('main')
  <div class="bg-gray-50 py-4 border-b border-gray-100">
    <div class="max-w-[1200px] mx-auto px-6 lg:px-12">
      <nav class="flex text-xs text-gray-500 uppercase tracking-widest gap-2">
        <a href="{{ route('index', ['lang' => $lang]) }}"
           class="hover:text-yideli-dark">Home</a>
        <span>/</span>
        <a href="{{ route('news.index', ['lang' => $lang]) }}"
           class="hover:text-yideli-dark">News</a>
        <span>/</span>
        <span
              class="text-yideli-dark font-bold truncate">{{ $entry->category ? $entry->category->name : 'Article' }}</span>
      </nav>
    </div>
  </div>

  <div class="max-w-[1200px] mx-auto px-6 lg:px-12 py-16 lg:py-24">
    <div class="grid lg:grid-cols-12 gap-16">

      <article class="lg:col-span-8">

        <div class="mb-8">
          <div class="flex items-center gap-3 text-xs text-gray-500 mb-4 uppercase tracking-wide font-medium">
            @if ($entry->category)
              <span class="text-yideli-dark bg-yideli-base px-2 py-1">{{ $entry->category->name }}</span>
            @endif
            <span>{{ $entry->published_at->format('M d, Y') }}</span>
            <span class="ms-auto flex items-center gap-1">
              <svg xmlns="http://www.w3.org/2000/svg"
                   class="w-4 h-4"
                   fill="none"
                   viewBox="0 0 24 24"
                   stroke="currentColor">
                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
              </svg>
              {{ $entry->views }}
            </span>
          </div>

          <h1 class="text-3xl lg:text-5xl font-serif text-yideli-dark leading-tight mb-6">
            {{ $entry->title }}
          </h1>

          <div class="flex justify-between items-center border-b border-gray-100 pb-6">
            <div class="text-sm text-gray-500">
              By <span class="text-yideli-dark font-bold">{{ $entry->author ?? 'Yideli Media Team' }}</span>
            </div>

            {{-- 分享按钮 (前端实现即可，或使用 ShareThis 等插件) --}}
            <div class="flex gap-3">
              <button class="text-gray-400 hover:text-yideli-dark"
                      onclick="window.open('https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}', '_blank')">
                <svg class="w-5 h-5"
                     fill="currentColor"
                     viewBox="0 0 24 24">
                  <path
                        d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                </svg>
              </button>
              <button class="text-gray-400 hover:text-yideli-dark"
                      onclick="window.open('https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->fullUrl()) }}', '_blank')">
                <svg class="w-5 h-5"
                     fill="currentColor"
                     viewBox="0 0 24 24">
                  <path
                        d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                </svg>
              </button>
            </div>
          </div>
        </div>

        <div class="prose max-w-none">
          @if ($entry->cover_image)
            <img src="{{ asset('storage/' . $entry->cover_image) }}"
                 alt="{{ $entry->title }}"
                 class="w-full h-auto mb-8 rounded-sm shadow-sm">
          @endif

          <article>
            {!! $entry->content !!}
          </article>
        </div>

        @if (!empty($entry->tags))
          <div class="mt-12 pt-8 border-t border-gray-100 flex gap-2 flex-wrap">
            <span class="text-sm font-bold text-yideli-dark me-2 self-center">Tags:</span>
            @foreach ($entry->tags as $tag)
              <a href="{{ route('news.index', ['lang' => $lang, 'q' => $tag]) }}"
                 class="px-3 py-1 bg-gray-50 text-xs text-gray-600 hover:bg-yideli-dark hover:text-white transition rounded">
                {{ $tag }}
              </a>
            @endforeach
          </div>
        @endif

        <div class="mt-12 flex justify-between items-center bg-gray-50 p-6 border border-gray-100">
          <div>
            @if ($prevEntry)
              <a href="{{ route('news.show', ['lang' => $lang, 'slug' => $prevEntry->slug]) }}"
                 class="text-sm font-medium text-gray-600 hover:text-yideli-dark flex flex-col sm:flex-row items-start sm:items-center gap-2">
                <span>← Previous</span>
                <span class="hidden sm:inline opacity-50">|</span>
                <span class="text-xs sm:text-sm line-clamp-1 max-w-[150px]">{{ $prevEntry->title }}</span>
              </a>
            @else
              <span class="text-sm text-gray-400 cursor-not-allowed">← Previous</span>
            @endif
          </div>
          <div>
            @if ($nextEntry)
              <a href="{{ route('news.show', ['lang' => $lang, 'slug' => $nextEntry->slug]) }}"
                 class="text-sm font-medium text-gray-600 hover:text-yideli-dark flex flex-col sm:flex-row-reverse items-end sm:items-center gap-2 text-right">
                <span>Next →</span>
                <span class="hidden sm:inline opacity-50">|</span>
                <span class="text-xs sm:text-sm line-clamp-1 max-w-[150px]">{{ $nextEntry->title }}</span>
              </a>
            @else
              <span class="text-sm text-gray-400 cursor-not-allowed">Next →</span>
            @endif
          </div>
        </div>

      </article>

      <aside class="lg:col-span-4 space-y-12">
        <div class="sticky top-32">

          {{-- 相关新闻 --}}
          <div>
            <h4 class="font-serif text-lg text-yideli-dark mb-6 pb-2 border-b border-gray-100">Related News</h4>
            <div class="space-y-6">
              @forelse($relatedNews as $related)
                <a href="{{ route('news.show', ['lang' => $lang, 'slug' => $related->slug]) }}"
                   class="group flex gap-4">
                  <div class="w-20 h-20 flex-shrink-0 overflow-hidden bg-gray-100">
                    @php $relImg = $related->cover_image ? asset('storage/' . $related->cover_image) : asset('images/placeholder.jpg'); @endphp
                    <img src="{{ $relImg }}"
                         class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                  </div>
                  <div>
                    <div class="text-[10px] text-gray-400 uppercase mb-1">{{ $related->published_at->format('M d, Y') }}
                    </div>
                    <h5
                        class="text-sm font-medium text-yideli-text leading-snug group-hover:text-yideli-dark group-hover:underline line-clamp-2">
                      {{ $related->title }}
                    </h5>
                  </div>
                </a>
              @empty
                <p class="text-gray-400 text-sm">No related news available.</p>
              @endforelse
            </div>
          </div>

          {{-- 搜索框 (复用) --}}
          <div class="mt-12">
            <h4 class="font-serif text-lg text-yideli-dark mb-4">Search</h4>
            <form action="{{ route('news.index', ['lang' => $lang]) }}"
                  method="GET"
                  class="relative">
              <input type="text"
                     name="q"
                     placeholder="Search..."
                     class="w-full bg-gray-50 border border-gray-200 px-4 py-3 text-sm focus:outline-none focus:border-yideli-dark transition">
              <button type="submit"
                      class="absolute end-3 top-3 text-gray-400 hover:text-yideli-dark">
                <svg class="w-5 h-5"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">
                  <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
              </button>
            </form>
          </div>

        </div>
      </aside>

    </div>
  </div>
@endsection
