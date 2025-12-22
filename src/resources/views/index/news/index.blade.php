@extends('index.layout')

@section('main')

  <div class="bg-gray-50 py-16 lg:py-24 text-center">
    <span class="text-red-600 uppercase tracking-widest font-bold text-sm mb-2 block">Insights & Updates</span>
    <h1 class="text-4xl lg:text-6xl font-bold text-gray-900">The Journal</h1>
  </div>

  <div class="max-w-[96rem] mx-auto px-4 sm:px-6 lg:px-10 py-12 lg:py-16">

    <div class="mb-20">
      <a href="{{ route('news.show', ['slug' => 'something']) }}"
        class="group flex flex-col lg:flex-row gap-8 lg:gap-16 items-center">
        <div class="w-full lg:w-3/5 overflow-hidden rounded-sm">
          <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?q=80&w=2000&auto=format&fit=crop"
            class="w-full h-[400px] lg:h-[500px] object-cover transition duration-700 group-hover:scale-105">
        </div>
        <div class="w-full lg:w-2/5">
          <div class="flex items-center space-x-2 mb-4 text-sm text-gray-500">
            <span class="text-red-600 font-bold uppercase tracking-wider">Craftsmanship</span>
            <span>&bull;</span>
            <span>October 24, 2024</span>
          </div>
          <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6 group-hover:text-red-600 transition">
            The Art of Binding: Why Lay-Flat Matters</h2>
          <p class="text-gray-600 text-lg leading-relaxed mb-6 line-clamp-3">
            In a digital age, the tactile experience of a notebook opening perfectly flat is a luxury we
            refuse to compromise on. Explore the traditional thread-sewing techniques used in our
            Shanghai workshop.
          </p>
          <span
            class="inline-block border-b-2 border-red-600 pb-1 text-red-600 font-bold uppercase tracking-wider text-sm group-hover:text-red-800 group-hover:border-red-800 transition">Read
            Article</span>
        </div>
      </a>
    </div>

    <hr class="border-gray-100 mb-20">

    <div class="flex justify-center space-x-6 sm:space-x-12 mb-16 text-sm sm:text-lg font-bold text-gray-500">
      <a href="#" class="text-red-600 border-b-2 border-red-600 pb-1">All Stories</a>
      <a href="#" class="hover:text-gray-900 transition">Company News</a>
      <a href="#" class="hover:text-gray-900 transition">Design Trends</a>
      <a href="#" class="hover:text-gray-900 transition">Sustainability</a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-16">

      <article class="group">
        <a href="{{ route('news.show', ['slug' => 'something']) }}">
          <div class="overflow-hidden rounded-sm mb-6 aspect-[3/2]">
            <img src="https://images.unsplash.com/photo-1455390582262-044cdead277a?q=80&w=800&auto=format&fit=crop"
              class="w-full h-full object-cover transition duration-700 group-hover:scale-105">
          </div>
          <div class="flex items-center space-x-2 mb-3 text-xs text-gray-500 uppercase tracking-wider">
            <span class="text-red-600 font-bold">News</span>
            <span>&bull;</span>
            <span>Sep 12, 2024</span>
          </div>
          <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-red-600 transition">Yideli
            Expands Eco-Friendly Line</h3>
          <p class="text-gray-600 leading-relaxed mb-4 line-clamp-3">We are proud to announce the launch
            of our new bamboo-pulp paper series, reducing our carbon footprint by 30%.</p>
          <span
            class="text-gray-900 font-bold text-sm border-b border-gray-300 pb-0.5 group-hover:border-red-600 transition">Read
            More</span>
        </a>
      </article>

      <article class="group">
        <a href="{{ route('news.show', ['slug' => 'something']) }}">
          <div class="overflow-hidden rounded-sm mb-6 aspect-[3/2]">
            <img src="https://images.unsplash.com/photo-1506784983877-45594efa4cbe?q=80&w=800&auto=format&fit=crop"
              class="w-full h-full object-cover transition duration-700 group-hover:scale-105">
          </div>
          <div class="flex items-center space-x-2 mb-3 text-xs text-gray-500 uppercase tracking-wider">
            <span class="text-red-600 font-bold">Design</span>
            <span>&bull;</span>
            <span>Aug 05, 2024</span>
          </div>
          <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-red-600 transition">Choosing
            the Right Paper Weight</h3>
          <p class="text-gray-600 leading-relaxed mb-4 line-clamp-3">80gsm, 100gsm, or 120gsm? A
            comprehensive guide for fountain pen users and sketch artists.</p>
          <span
            class="text-gray-900 font-bold text-sm border-b border-gray-300 pb-0.5 group-hover:border-red-600 transition">Read
            More</span>
        </a>
      </article>

      <article class="group">
        <a href="{{ route('news.show', ['slug' => 'something']) }}">
          <div class="overflow-hidden rounded-sm mb-6 aspect-[3/2]">
            <img src="https://images.unsplash.com/photo-1542435503-956c469947f6?q=80&w=800&auto=format&fit=crop"
              class="w-full h-full object-cover transition duration-700 group-hover:scale-105">
          </div>
          <div class="flex items-center space-x-2 mb-3 text-xs text-gray-500 uppercase tracking-wider">
            <span class="text-red-600 font-bold">Events</span>
            <span>&bull;</span>
            <span>Jul 22, 2024</span>
          </div>
          <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-red-600 transition">See Us at
            the Frankfurt Book Fair</h3>
          <p class="text-gray-600 leading-relaxed mb-4 line-clamp-3">Join us at Hall 3.0, Stand D45 as we
            showcase our upcoming 2025 Executive Collection.</p>
          <span
            class="text-gray-900 font-bold text-sm border-b border-gray-300 pb-0.5 group-hover:border-red-600 transition">Read
            More</span>
        </a>
      </article>

    </div>

    <div class="mt-20 flex justify-center">
      <nav class="flex space-x-2">
        <span class="px-4 py-2 text-gray-400 border border-transparent">Previous</span>
        <span class="px-4 py-2 bg-red-600 text-white border border-red-600 rounded-sm">1</span>
        <a href="#"
          class="px-4 py-2 border border-gray-200 text-gray-700 hover:border-red-600 hover:text-red-600 transition rounded-sm">2</a>
        <a href="#"
          class="px-4 py-2 border border-gray-200 text-gray-700 hover:border-red-600 hover:text-red-600 transition rounded-sm">Next</a>
      </nav>
    </div>

  </div>
@endsection