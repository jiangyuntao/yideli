@extends('index.layout')

@section('title', $currentCategory ? $currentCategory->name : __('news.header_title_default'))

@section('main')
  <div class="relative overflow-hidden bg-yideli-base pb-10 pt-8 sm:pb-12 sm:pt-10 md:pb-12 md:pt-12 lg:pt-14">
    <div class="absolute top-0 end-0 hidden h-full w-1/3 translate-x-1/2 skew-x-12 bg-yideli-dark/5 md:block"></div>

    <div class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto px-4 sm:px-6 md:px-8 lg:px-12 relative z-10">
      <div class="grid grid-cols-1 gap-4 md:grid-cols-12 md:items-stretch md:gap-5 lg:grid-cols-10 lg:gap-6">
        <div class="md:col-span-7 lg:col-span-6">
          <div class="flex h-full flex-col justify-center border border-white/30 bg-white/76 p-4 shadow-2xl backdrop-blur-md sm:p-5 md:min-h-[380px] lg:min-h-[430px] lg:p-7">
            <span class="mb-4 text-xs font-bold uppercase tracking-[0.2em] text-yideli-dark">
              {{ __('news.header_subtitle') }}
            </span>
            <h1 class="mb-3 text-2xl font-serif font-bold text-yideli-dark sm:text-3xl md:text-[2rem] lg:text-4xl">
              {{ $currentCategory ? $currentCategory->name : __('news.header_title_default') }}
            </h1>
            @if (request('q'))
              <p class="mb-3 text-sm font-medium text-yideli-dark md:text-base">
                {{ __('news.search_results_label') }}: "{{ request('q') }}"
              </p>
            @endif
            <p class="text-sm leading-relaxed text-gray-700 sm:text-base md:text-[0.95rem] lg:text-lg">
              {{ __('news.hero_desc') !== 'news.hero_desc'
                  ? __('news.hero_desc')
                  : 'Stay updated with company news, product launches, market insights, and OEM/ODM developments from YIDELI.' }}
            </p>
          </div>
        </div>

        <div class="md:col-span-5 lg:col-span-4">
          @include('index.inquire.hero-form', [
              'heroInquiryId' => 'news-hero-inquiry',
              'heroInquiryReturnTo' => url()->current() . '#news-hero-inquiry',
              'heroInquiryClass' => 'flex h-full flex-col justify-center border border-white/30 bg-white/76 px-4 py-2 shadow-2xl backdrop-blur-md sm:px-5 sm:py-2.5 md:min-h-[380px] md:px-5 lg:min-h-[430px] lg:px-6 lg:py-3',
          ])
        </div>
      </div>
    </div>
  </div>

  @if ($featured_news)
    <section
             class="relative z-10 mx-auto mt-6 mb-16 max-w-[1200px] px-4 min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] sm:mt-8 sm:px-6 md:mt-10 md:px-8 lg:px-12 lg:mb-20">
      <div
           class="bg-white shadow-xl border border-gray-100 grid lg:grid-cols-2 overflow-hidden group cursor-pointer news-card-hover">
        <a class="relative overflow-hidden h-64 lg:h-96"
           href="{{ route('news.show', ['lang' => $lang, 'slug' => $featured_news->slug]) }}">
          @php
            $featImg = $featured_news->cover_image
                ? asset('storage/' . $featured_news->cover_image)
                : asset('images/placeholder.jpg');
          @endphp
          <img class="w-full h-full object-cover news-image transition duration-700"
               src="{{ $featImg }}"
               alt="{{ $featured_news->title }}">
          <div
               class="absolute top-0 start-0 bg-yideli-dark text-white px-4 py-2 text-xs font-bold uppercase tracking-widest">
            {{ __('news.featured_label') }}
          </div>
        </a>
        <a class="flex flex-col justify-center p-6 sm:p-8 lg:p-12"
           href="{{ route('news.show', ['lang' => $lang, 'slug' => $featured_news->slug]) }}">
          <div class="mb-4 flex flex-wrap items-center gap-3 text-xs font-medium uppercase tracking-wide text-gray-500 sm:gap-4">
            <span
                  class="text-yideli-dark">{{ $featured_news->category ? $featured_news->category->name : __('news.uncategorized') }}</span>
            <span>|</span>
            <span>{{ $featured_news->published_at->format('M d, Y') }}</span>
          </div>
          <h2 class="text-2xl lg:text-3xl font-serif text-yideli-dark mb-4">
            {{ $featured_news->title }}
          </h2>
          <p class="text-gray-600 mb-8 font-light leading-relaxed line-clamp-3">
            {{ $featured_news->excerpt ?: Str::limit(strip_tags($featured_news->content), 150) }}
          </p>
          <div class="flex items-center text-sm font-bold text-yideli-dark uppercase tracking-widest">
            {{ __('news.read_full_story') }}
            <span class="ms-2 group-hover:translate-x-2 transition duration-300">→</span>
          </div>
        </a>
      </div>
    </section>
  @endif

  <div class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto px-6 lg:px-12 pb-24">
    <div class="grid gap-10 lg:grid-cols-12 lg:gap-12">

      <div class="lg:col-span-8 space-y-12">

        @forelse ($entries as $entry)
          <article
                   class="flex flex-col md:flex-row gap-8 group news-card-hover cursor-pointer border-b border-gray-100 pb-12">
            <a class="w-full md:w-1/3 aspect-[4/3] overflow-hidden bg-gray-100"
               href="{{ route('news.show', ['lang' => $lang, 'slug' => $entry->slug]) }}">
              @php
                $img = $entry->cover_image ? asset('storage/' . $entry->cover_image) : asset('images/placeholder.jpg');
              @endphp
              <img class="w-full h-full object-cover news-image transition duration-700"
                   src="{{ $img }}"
                   alt="{{ $entry->title }}">
            </a>
            <div class="w-full md:w-2/3 flex flex-col justify-center">
              <div class="mb-3 flex flex-wrap items-center gap-2 text-xs uppercase tracking-wide text-gray-400 sm:gap-3">
                <span
                      class="text-yideli-dark font-bold">{{ $entry->category ? $entry->category->name : __('news.uncategorized') }}</span>
                • {{ $entry->published_at->format('M d, Y') }}
                @if ($entry->author)
                  • {{ __('news.meta_by') }} {{ $entry->author }}
                @endif
              </div>
              <h3 class="text-xl font-serif text-yideli-dark mb-3 group-hover:text-yideli-hover transition">
                <a href="{{ route('news.show', ['lang' => $lang, 'slug' => $entry->slug]) }}">{{ $entry->title }}</a>
              </h3>
              <p class="text-gray-500 font-light text-sm mb-4 leading-relaxed line-clamp-2">
                {{ $entry->excerpt ?: Str::limit(strip_tags($entry->content), 120) }}
              </p>
              <div class="relative w-max">
                <a class="text-xs font-bold uppercase tracking-widest text-yideli-dark block"
                   href="{{ route('news.show', ['lang' => $lang, 'slug' => $entry->slug]) }}">{{ __('news.read_more_btn') }}</a>
                <div
                     class="read-more-line absolute bottom-[-2px] start-0 w-0 h-[1px] bg-yideli-dark transition-all duration-300">
                </div>
              </div>
            </div>
          </article>
        @empty
          <div class="py-10 text-center text-gray-500">
            <p>{{ __('news.no_articles') }}</p>
            @if (request('q'))
              <a class="text-yideli-dark underline mt-2 block"
                 href="{{ route('news.index', ['lang' => $lang]) }}">{{ __('news.clear_search') }}</a>
            @endif
          </div>
        @endforelse

        <div class="pt-4">
          {{ $entries->onEachSide(1)->links() }}
        </div>

      </div>

      <aside class="space-y-12 ps-0 lg:col-span-4 lg:ps-12">

        <div>
          <h4 class="font-serif text-lg text-yideli-dark mb-4">{{ __('news.sidebar_search_placeholder') }}</h4>
          <form class="relative"
                action="{{ route('news.index', ['lang' => $lang]) }}"
                method="GET">
            <input class="w-full bg-gray-50 border border-gray-200 px-4 py-3 text-sm focus:outline-none focus:border-yideli-dark transition"
                   name="q"
                   type="text"
                   value="{{ request('q') }}"
                   placeholder="{{ __('news.sidebar_search_placeholder') }}...">
            <button class="absolute end-3 top-3 text-gray-400 hover:text-yideli-dark"
                    type="submit">
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

        <div>
          <h4 class="font-serif text-lg text-yideli-dark mb-4">{{ __('news.sidebar_categories_title') }}</h4>
          <ul class="space-y-3 text-sm font-light text-gray-600">
            <li>
              <a class="flex justify-between items-center hover:text-yideli-dark group"
                 href="{{ route('news.index', ['lang' => $lang]) }}">
                <span>{{ __('news.sidebar_all_news') }}</span>
              </a>
            </li>
            @foreach ($news_categories as $category)
              <li>
                <a class="flex justify-between items-center hover:text-yideli-dark group {{ isset($currentCategory) && $currentCategory->id === $category->id ? 'font-bold text-yideli-dark' : '' }}"
                   href="{{ route('news.index', ['lang' => $lang, 'slug' => $category->slug]) }}">
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
