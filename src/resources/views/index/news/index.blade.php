@extends('index.layout')

@section('main')
  <div class="bg-yideli-base py-20">
    <div class="max-w-[1200px] mx-auto px-6 lg:px-12 text-center">
      <span class="text-xs font-bold tracking-[0.2em] uppercase text-yideli-dark mb-4 block">Updates From Factory</span>
      <h1 class="text-4xl lg:text-5xl font-serif text-yideli-dark mb-0">
        {{ $currentCategory ? $currentCategory->name : 'News & Insights' }}
      </h1>
      @if (request('q'))
        <p class="text-gray-500 mt-4">Search results for: "{{ request('q') }}"</p>
      @endif
    </div>
  </div>

  {{-- 1. 置顶新闻 (Featured) --}}
  @if ($featured_news)
    <section class="max-w-[1200px] mx-auto px-6 lg:px-12 -mt-10 relative z-10 mb-20">
      <div
           class="bg-white shadow-xl border border-gray-100 grid lg:grid-cols-2 overflow-hidden group cursor-pointer news-card-hover">
        <a href="{{ route('news.show', ['lang' => $lang, 'slug' => $featured_news->slug]) }}"
           class="relative overflow-hidden h-64 lg:h-96">
          @php
            $featImg = $featured_news->cover_image
                ? asset('storage/' . $featured_news->cover_image)
                : asset('images/placeholder.jpg');
          @endphp
          <img src="{{ $featImg }}"
               class="w-full h-full object-cover news-image transition duration-700"
               alt="{{ $featured_news->title }}">
          <div
               class="absolute top-0 start-0 bg-yideli-dark text-white px-4 py-2 text-xs font-bold uppercase tracking-widest">
            Featured
          </div>
        </a>
        <a href="{{ route('news.show', ['lang' => $lang, 'slug' => $featured_news->slug]) }}"
           class="p-8 lg:p-12 flex flex-col justify-center">
          <div class="flex items-center gap-4 text-xs text-gray-500 mb-4 uppercase tracking-wide font-medium">
            <span class="text-yideli-dark">{{ $featured_news->category ? $featured_news->category->name : 'News' }}</span>
            <span>|</span>
            <span>{{ $featured_news->published_at->format('M d, Y') }}</span>
          </div>
          <h2 class="text-2xl lg:text-3xl font-serif text-yideli-dark mb-4">
            {{ $featured_news->title }}
          </h2>
          <p class="text-gray-600 mb-8 font-light leading-relaxed line-clamp-3">
            {{-- 优先显示摘要，没有则截取内容 --}}
            {{ $featured_news->excerpt ?: Str::limit(strip_tags($featured_news->content), 150) }}
          </p>
          <div class="flex items-center text-sm font-bold text-yideli-dark uppercase tracking-widest">
            Read Full Story
            <span class="ms-2 group-hover:translate-x-2 transition duration-300">→</span>
          </div>
        </a>
      </div>
    </section>
  @endif

  {{-- 2. 新闻列表与侧边栏 --}}
  <div class="max-w-[1200px] mx-auto px-6 lg:px-12 pb-24">
    <div class="grid lg:grid-cols-12 gap-12">

      <div class="lg:col-span-8 space-y-12">

        @forelse ($entries as $entry)
          <article
                   class="flex flex-col md:flex-row gap-8 group news-card-hover cursor-pointer border-b border-gray-100 pb-12">
            <a href="{{ route('news.show', ['lang' => $lang, 'slug' => $entry->slug]) }}"
               class="w-full md:w-1/3 aspect-[4/3] overflow-hidden bg-gray-100">
              @php
                $img = $entry->cover_image ? asset('storage/' . $entry->cover_image) : asset('images/placeholder.jpg');
              @endphp
              <img src="{{ $img }}"
                   class="w-full h-full object-cover news-image transition duration-700"
                   alt="{{ $entry->title }}">
            </a>
            <div class="w-full md:w-2/3 flex flex-col justify-center">
              <div class="flex items-center gap-3 text-xs text-gray-400 mb-3 uppercase tracking-wide">
                <span
                      class="text-yideli-dark font-bold">{{ $entry->category ? $entry->category->name : 'Uncategorized' }}</span>
                • {{ $entry->published_at->format('M d, Y') }}
                {{-- 可选：显示作者 --}}
                @if ($entry->author)
                  • By {{ $entry->author }}
                @endif
              </div>
              <h3 class="text-xl font-serif text-yideli-dark mb-3 group-hover:text-yideli-hover transition">
                <a href="{{ route('news.show', ['lang' => $lang, 'slug' => $entry->slug]) }}">{{ $entry->title }}</a>
              </h3>
              <p class="text-gray-500 font-light text-sm mb-4 leading-relaxed line-clamp-2">
                {{ $entry->excerpt ?: Str::limit(strip_tags($entry->content), 120) }}
              </p>
              <div class="relative w-max">
                <a href="{{ route('news.show', ['lang' => $lang, 'slug' => $entry->slug]) }}"
                   class="text-xs font-bold uppercase tracking-widest text-yideli-dark block">Read More</a>
                <div
                     class="read-more-line absolute bottom-[-2px] start-0 w-0 h-[1px] bg-yideli-dark transition-all duration-300">
                </div>
              </div>
            </div>
          </article>
        @empty
          <div class="py-10 text-center text-gray-500">
            <p>No news articles found.</p>
            @if (request('q'))
              <a href="{{ route('news.index', ['lang' => $lang]) }}"
                 class="text-yideli-dark underline mt-2 block">Clear
                Search</a>
            @endif
          </div>
        @endforelse

        {{-- 分页 --}}
        <div class="pt-4">
          {{ $entries->onEachSide(1)->links() }}
        </div>

      </div>

      <aside class="lg:col-span-4 ps-0 lg:ps-12 space-y-12">

        {{-- 搜索 --}}
        <div>
          <h4 class="font-serif text-lg text-yideli-dark mb-4">Search</h4>
          <form action="{{ route('news.index', ['lang' => $lang]) }}"
                method="GET"
                class="relative">
            <input type="text"
                   name="q"
                   value="{{ request('q') }}"
                   placeholder="Search news..."
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

        {{-- 分类 --}}
        <div>
          <h4 class="font-serif text-lg text-yideli-dark mb-4">Categories</h4>
          <ul class="space-y-3 text-sm font-light text-gray-600">
            {{-- 'All' Link --}}
            <li>
              <a href="{{ route('news.index', ['lang' => $lang]) }}"
                 class="flex justify-between items-center hover:text-yideli-dark group">
                <span>All News</span>
              </a>
            </li>
            @foreach ($news_categories as $category)
              <li>
                <a href="{{ route('news.index', ['lang' => $lang, 'slug' => $category->slug]) }}"
                   class="flex justify-between items-center hover:text-yideli-dark group {{ isset($currentCategory) && $currentCategory->id === $category->id ? 'font-bold text-yideli-dark' : '' }}">
                  <span>{{ $category->name }}</span>
                  <span
                        class="text-xs bg-gray-100 px-2 py-0.5 rounded-full group-hover:bg-yideli-base group-hover:text-yideli-dark">
                    {{ $category->entries_count }}
                  </span>
                </a>
              </li>
            @endforeach
          </ul>
        </div>

      </aside>

    </div>
  </div>
@endsection
