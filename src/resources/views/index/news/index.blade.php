@extends('index.layout')

@section('main')
  <div class="bg-yideli-base py-20">
    <div class="max-w-[1400px] mx-auto px-6 lg:px-12 text-center">
      <span class="text-xs font-bold tracking-[0.2em] uppercase text-yideli-dark mb-4 block">Updates From Factory</span>
      <h1 class="text-4xl lg:text-5xl font-serif text-yideli-dark mb-0">News & Insights</h1>
    </div>
  </div>

  <section class="max-w-[1400px] mx-auto px-6 lg:px-12 -mt-10 relative z-10 mb-20">
    <div
      class="bg-white shadow-xl border border-gray-100 grid lg:grid-cols-2 overflow-hidden group cursor-pointer news-card-hover">
      <a href="{{ route('news.show', ['lang' => $lang, 'slug' => $featured_news->slug]) }}"
        class="relative overflow-hidden h-64 lg:h-96">
        <img src="{{ asset('storage/' . $featured_news->cover_image) }}"
          class="w-full h-full object-cover news-image transition duration-700" alt="{{ $featured_news->title }}">
        <div
          class="absolute top-0 start-0 bg-yideli-dark text-white px-4 py-2 text-xs font-bold uppercase tracking-widest">
          Featured</div>
      </a>
      <a href="{{ route('news.show', ['lang' => $lang, 'slug' => $featured_news->slug]) }}"
        class="p-8 lg:p-12 flex flex-col justify-center">
        <div class="flex items-center gap-4 text-xs text-gray-500 mb-4 uppercase tracking-wide font-medium">
          <span class="text-yideli-dark">{{ $featured_news->category->name }}</span>
          <span>|</span>
          <span>{{ $featured_news->published_at }}</span>
        </div>
        <h2 class="text-2xl lg:text-3xl font-serif text-yideli-dark mb-4">
          {{ $featured_news->title }}
        </h2>
        <p class="text-gray-600 mb-8 font-light leading-relaxed line-clamp-3">
          We cordially invite you to visit our booth at Phase 3 of the Canton Fair. Discover our latest eco-friendly
          notebook collections and premium metal pen series. Our team will be on-site to discuss OEM opportunities.
        </p>
        <div class="flex items-center text-sm font-bold text-yideli-dark uppercase tracking-widest">
          Read Full Story
          <span class="ms-2 group-hover:translate-x-2 transition duration-300">→</span>
        </div>
      </a>
    </div>
  </section>

  <div class="max-w-[1400px] mx-auto px-6 lg:px-12 pb-24">
    <div class="grid lg:grid-cols-12 gap-12">

      <div class="lg:col-span-8 space-y-12">

        @foreach ($entries as $entry)
          <article
            class="flex flex-col md:flex-row gap-8 group news-card-hover cursor-pointer border-b border-gray-100 pb-12">
            <a href="{{ route('news.show', ['lang' => $lang, 'slug' => $entry->slug]) }}"
              class="w-full md:w-1/3 aspect-[4/3] overflow-hidden bg-gray-100">
              <img src="{{ asset('storage/' . $entry->cover_image) }}"
                class="w-full h-full object-cover news-image transition duration-700" alt="{{ $entry->title }}">
            </a>
            <div href="{{ route('news.show', ['lang' => $lang, 'slug' => $entry->slug]) }}"
              class="w-full md:w-2/3 flex flex-col justify-center">
              <div class="flex items-center gap-3 text-xs text-gray-400 mb-3 uppercase tracking-wide">
                <span class="text-yideli-dark font-bold">{{ $entry->category->name }}</span> • {{ $entry->published_at }}
              </div>
              <h3 class="text-xl font-serif text-yideli-dark mb-3 group-hover:text-yideli-hover transition">
                {{ $entry->title }}
              </h3>
              <p class="text-gray-500 font-light text-sm mb-4 leading-relaxed line-clamp-2">
                Our R&D team analyzes the upcoming trends for the European and North American markets. Recycled materials
                and muted, earthy tones are set to dominate the shelves.
              </p>
              <div class="relative w-max">
                <div href="{{ route('news.show', ['lang' => $lang, 'slug' => $entry->slug]) }}"
                  class="text-xs font-bold uppercase tracking-widest text-yideli-dark">Read More</div>
                <div
                  class="read-more-line absolute bottom-[-2px] start-0 w-0 h-[1px] bg-yideli-dark transition-all duration-300">
                </div>
              </div>
            </div>
          </article>
        @endforeach

        {{ $entries->links() }}
        <div class="flex gap-2 pt-4">
          <button
            class="px-4 py-2 border border-yideli-dark bg-yideli-dark text-white text-xs uppercase tracking-widest">1</button>
          <button
            class="px-4 py-2 border border-gray-200 hover:border-yideli-dark hover:text-yideli-dark text-gray-500 text-xs uppercase tracking-widest transition">2</button>
          <button
            class="px-4 py-2 border border-gray-200 hover:border-yideli-dark hover:text-yideli-dark text-gray-500 text-xs uppercase tracking-widest transition">Next</button>
        </div>

      </div>

      <aside class="lg:col-span-4 ps-0 lg:ps-12 space-y-12">

        <div>
          <h4 class="font-serif text-lg text-yideli-dark mb-4">Search</h4>
          <div class="relative">
            <input type="text" placeholder="Search news..."
              class="w-full bg-gray-50 border border-gray-200 px-4 py-3 text-sm focus:outline-none focus:border-yideli-dark transition">
            <button class="absolute end-3 top-3 text-gray-400 hover:text-yideli-dark">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
              </svg>
            </button>
          </div>
        </div>

        <div>
          <h4 class="font-serif text-lg text-yideli-dark mb-4">Categories</h4>
          <ul class="space-y-3 text-sm font-light text-gray-600">
            @foreach ($news_categories as $category)
              <li>
                <a href="{{ route('news.index', ['lang' => $lang, 'slug' => $category->slug]) }}"
                  class="flex justify-between items-center hover:text-yideli-dark group">
                  <span>{{ $category->name }}</span>
                  <span
                    class="text-xs bg-gray-100 px-2 py-0.5 rounded-full group-hover:bg-yideli-base group-hover:text-yideli-dark">{{ $category->entries->count() }}</span>
                </a>
              </li>
            @endforeach
          </ul>
        </div>

        {{-- <div>
          <h4 class="font-serif text-lg text-yideli-dark mb-4">Tags</h4>
          <div class="flex flex-wrap gap-2">
            <a href="#"
              class="text-xs border border-gray-200 px-3 py-1.5 text-gray-500 hover:border-yideli-dark hover:text-yideli-dark transition">Notebooks</a>
            <a href="#"
              class="text-xs border border-gray-200 px-3 py-1.5 text-gray-500 hover:border-yideli-dark hover:text-yideli-dark transition">OEM</a>
            <a href="#"
              class="text-xs border border-gray-200 px-3 py-1.5 text-gray-500 hover:border-yideli-dark hover:text-yideli-dark transition">Pens</a>
            <a href="#"
              class="text-xs border border-gray-200 px-3 py-1.5 text-gray-500 hover:border-yideli-dark hover:text-yideli-dark transition">Sustainability</a>
            <a href="#"
              class="text-xs border border-gray-200 px-3 py-1.5 text-gray-500 hover:border-yideli-dark hover:text-yideli-dark transition">Canton
              Fair</a>
          </div>
        </div> --}}
      </aside>

    </div>
  </div>
@endsection