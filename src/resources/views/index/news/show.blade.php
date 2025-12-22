@extends('index.layout')

@section('main')
  <div class="max-w-4xl mx-auto px-4 pt-16 pb-12 text-center">
    <a href="news.html"
      class="text-red-600 font-bold uppercase tracking-widest text-sm mb-6 inline-block hover:underline">Craftsmanship</a>
    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-gray-900 mb-6 leading-tight">The Art of Binding: Why
      Lay-Flat Matters</h1>
    <div class="text-gray-500 italic flex justify-center items-center space-x-4">
      <span>By Sarah Lin</span>
      <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
      <span>October 24, 2024</span>
    </div>
  </div>

  <div class="max-w-[96rem] mx-auto px-4 sm:px-6 lg:px-10 mb-16">
    <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?q=80&w=2000&auto=format&fit=crop"
      class="w-full h-[400px] lg:h-[600px] object-cover rounded-sm shadow-sm">
  </div>

  <article class="max-w-3xl mx-auto px-4 sm:px-6 text-lg sm:text-xl text-gray-700 leading-loose mb-20">

    <p class="mb-8"><span class="float-left text-6xl font-bold text-red-600 mr-3 mt-[-10px] leading-none">I</span>n a
      digital age where swiping screens has become second nature, the tactile experience of a physical notebook
      remains irreplaceable. However, not all notebooks are created equal. The most common complaint from writers and
      artists alike is the "fighting book" syndrome—when a notebook refuses to stay open, forcing you to use one hand
      to hold down the pages while writing with the other.</p>

    <p class="mb-10">At Yideli, we believe your hand should be free to create, not pinned down by poor binding. This
      is why every notebook in our Executive and Modernist lines features our signature lay-flat binding.</p>

    <h2 class="text-3xl font-bold text-gray-900 mt-12 mb-6">The Thread-Sewn Difference</h2>
    <p class="mb-8">Unlike standard perfect binding (where individual pages are glued to the spine), our notebooks use
      Smyth sewing. This traditional method involves sewing distinct groups of folded pages, called signatures,
      together using durable thread.</p>

    <blockquote class="border-l-4 border-red-600 pl-6 py-2 my-10 italic text-2xl text-gray-900 bg-gray-50 rounded-r-lg">
      "A notebook should be a silent partner in your creative process, never an obstacle."
    </blockquote>

    <p class="mb-8">This technique allows the spine to flex freely. Whether you are on page 5 or page 190, the book
      opens 180 degrees flat on your desk. This is crucial for:</p>

    <ul class="list-disc pl-6 space-y-4 mb-10 marker:text-red-600">
      <li><strong>Left-handed writers:</strong> No more struggling with the curve of the page near the spine.</li>
      <li><strong>Bullet journaling:</strong> Creating spreads that span across two pages seamlessly.</li>
      <li><strong>Scanning:</strong> Digitizing your notes without shadows or distortion in the center fold.</li>
    </ul>

    <div class="grid grid-cols-2 gap-4 mb-10">
      <img src="https://images.unsplash.com/photo-1544816155-12df9643f363?q=80&w=600&auto=format&fit=crop"
        class="rounded-sm">
      <img src="https://images.unsplash.com/photo-1586075010923-2dd4570fb338?q=80&w=600&auto=format&fit=crop"
        class="rounded-sm">
    </div>

    <h2 class="text-3xl font-bold text-gray-900 mt-12 mb-6">Longevity and Durability</h2>
    <p class="mb-8">Glue dries out and cracks over time, leading to loose pages. Thread does not. A Yideli notebook is
      designed to be archived. Years from now, when you look back at your sketches or meeting notes, the binding will
      be as secure as the day you bought it.</p>

    <p>Experience the difference yourself with our new Executive Series, available now in our catalog.</p>

    <div class="border-t border-gray-200 mt-16 pt-8 flex flex-col sm:flex-row justify-between items-center text-sm">
      <div class="mb-4 sm:mb-0 space-x-2">
        <span class="font-bold text-gray-900">Tags:</span>
        <a href="#" class="text-gray-500 hover:text-red-600">Binding</a>,
        <a href="#" class="text-gray-500 hover:text-red-600">Quality</a>,
        <a href="#" class="text-gray-500 hover:text-red-600">Production</a>
      </div>
      <div class="flex items-center space-x-4">
        <span class="font-bold text-gray-900">Share:</span>
        <a href="#" class="text-xl text-gray-400 hover:text-gray-900"><i class="ri-facebook-circle-fill"></i></a>
        <a href="#" class="text-xl text-gray-400 hover:text-gray-900"><i class="ri-twitter-x-fill"></i></a>
        <a href="#" class="text-xl text-gray-400 hover:text-gray-900"><i class="ri-linkedin-box-fill"></i></a>
      </div>
    </div>

  </article>

  <div class="bg-gray-50 py-16 border-t border-gray-100">
    <div class="max-w-[96rem] mx-auto px-4 sm:px-6 lg:px-10">
      <h3 class="text-2xl font-bold text-gray-900 mb-8 text-center">Read Next</h3>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <a href="#" class="group block">
          <div class="overflow-hidden rounded-sm mb-4 aspect-[16/9]">
            <img src="https://images.unsplash.com/photo-1506784983877-45594efa4cbe?q=80&w=600&auto=format&fit=crop"
              class="w-full h-full object-cover transition duration-500 group-hover:scale-105">
          </div>
          <h4 class="text-lg font-bold text-gray-900 group-hover:text-red-600 transition">Choosing the Right Paper
            Weight</h4>
        </a>
        <a href="#" class="group block">
          <div class="overflow-hidden rounded-sm mb-4 aspect-[16/9]">
            <img src="https://images.unsplash.com/photo-1455390582262-044cdead277a?q=80&w=600&auto=format&fit=crop"
              class="w-full h-full object-cover transition duration-500 group-hover:scale-105">
          </div>
          <h4 class="text-lg font-bold text-gray-900 group-hover:text-red-600 transition">The History of Yideli</h4>
        </a>
        <a href="#" class="group block">
          <div class="overflow-hidden rounded-sm mb-4 aspect-[16/9]">
            <img src="https://images.unsplash.com/photo-1589829085413-56de8ae18c73?q=80&w=600&auto=format&fit=crop"
              class="w-full h-full object-cover transition duration-500 group-hover:scale-105">
          </div>
          <h4 class="text-lg font-bold text-gray-900 group-hover:text-red-600 transition">2025 Color Trends</h4>
        </a>
      </div>
    </div>
  </div>
@endsection