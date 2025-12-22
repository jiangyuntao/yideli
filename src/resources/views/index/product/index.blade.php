@extends('index.layout')

@section('main')
  <div class="relative bg-gray-50 h-64 sm:h-80 flex items-center justify-center overflow-hidden">
    <img src="https://images.unsplash.com/photo-1513542789411-b6a5d4f31634?q=80&w=2000&auto=format&fit=crop"
      class="absolute inset-0 w-full h-full object-cover opacity-10">
    <div class="relative z-10 text-center max-w-2xl px-4">
      <h1 class="text-4xl sm:text-5xl text-gray-900 font-bold mb-3">Our Collections</h1>
      <p class="text-gray-600 text-lg italic">Explore our range of premium stationery designed for professionals.</p>
    </div>
  </div>

  <div class="max-w-[96rem] mx-auto px-4 sm:px-6 lg:px-10 py-12 lg:py-16">
    <div class="flex flex-col lg:flex-row gap-12">

      <aside class="w-full lg:w-1/5 space-y-8 flex-shrink-0">
        <div class="lg:sticky lg:top-32">
          <h3 class="text-xl font-bold border-l-4 border-red-600 pl-3 mb-6">Product Categories</h3>

          <ul class="space-y-2 select-none">

            <li x-data="{ open: true }">
              <div @click="open = !open"
                class="flex justify-between items-center cursor-pointer py-2 hover:text-red-600 group">
                <span class="font-bold text-red-600">Notebooks</span>
                <i :class="open ? 'ri-arrow-down-s-line' : 'ri-arrow-right-s-line'"
                  class="text-gray-400 group-hover:text-red-600"></i>
              </div>
              <ul x-show="open" x-collapse class="pl-4 border-l border-gray-200 ml-2 space-y-2 mt-1">
                <li><a href="#" class="block py-1 text-gray-600 hover:text-red-600">Hardcover Series</a></li>
                <li><a href="#" class="block py-1 text-gray-600 hover:text-red-600">Softcover Journals</a></li>
                <li><a href="#" class="block py-1 text-gray-600 hover:text-red-600">Spiral Bound</a></li>
              </ul>
            </li>

            <li x-data="{ open: false }">
              <div @click="open = !open"
                class="flex justify-between items-center cursor-pointer py-2 hover:text-red-600 group">
                <span class="font-bold text-gray-800">Writing Instruments</span>
                <i :class="open ? 'ri-arrow-down-s-line' : 'ri-arrow-right-s-line'"
                  class="text-gray-400 group-hover:text-red-600"></i>
              </div>
              <ul x-show="open" x-collapse class="pl-4 border-l border-gray-200 ml-2 space-y-2 mt-1">
                <li><a href="#" class="block py-1 text-gray-600 hover:text-red-600">Fountain Pens</a></li>
                <li><a href="#" class="block py-1 text-gray-600 hover:text-red-600">Gel Ink Rollers</a></li>
                <li><a href="#" class="block py-1 text-gray-600 hover:text-red-600">Gift Sets</a></li>
              </ul>
            </li>

            <li x-data="{ open: false }">
              <div @click="open = !open"
                class="flex justify-between items-center cursor-pointer py-2 hover:text-red-600 group">
                <span class="font-bold text-gray-800">Office Accessories</span>
                <i :class="open ? 'ri-arrow-down-s-line' : 'ri-arrow-right-s-line'"
                  class="text-gray-400 group-hover:text-red-600"></i>
              </div>
              <ul x-show="open" x-collapse class="pl-4 border-l border-gray-200 ml-2 space-y-2 mt-1">
                <li><a href="#" class="block py-1 text-gray-600 hover:text-red-600">Desk Organizers</a></li>
                <li><a href="#" class="block py-1 text-gray-600 hover:text-red-600">Business Card Holders</a></li>
              </ul>
            </li>

            <li>
              <a href="#" class="block py-2 font-bold text-gray-800 hover:text-red-600">New Arrivals</a>
            </li>
          </ul>
        </div>
      </aside>

      <div class="w-full lg:w-4/5">

        <div class="flex flex-col sm:flex-row justify-between items-center mb-8 pb-4 border-b border-gray-100">
          <span class="text-gray-500 mb-4 sm:mb-0">Showing 9 of 24 products</span>
          <div class="flex items-center space-x-4">
            <span class="text-sm text-gray-500">Filter by:</span>
            <select class="border border-gray-200 rounded-md py-1 px-3 text-sm focus:ring-red-600 focus:border-red-600">
              <option>All Colors</option>
              <option>Black</option>
              <option>Red</option>
              <option>Blue</option>
            </select>
            <select class="border border-gray-200 rounded-md py-1 px-3 text-sm focus:ring-red-600 focus:border-red-600">
              <option>Recommended</option>
              <option>Newest</option>
            </select>
          </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-12">

          <div class="group">
            <a href="{{ route('product.show', ['slug' => 'something']) }}" class="block">
              <div class="relative overflow-hidden rounded-sm bg-gray-100 mb-4 aspect-[4/5]">
                <img src="https://images.unsplash.com/photo-1544816155-12df9643f363?q=80&w=800&auto=format&fit=crop"
                  class="w-full h-full object-cover transition duration-700 group-hover:scale-105">
                <div
                  class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black/60 to-transparent p-6 opacity-0 group-hover:opacity-100 transition duration-300">
                  <span class="text-white text-sm uppercase tracking-widest font-bold">View Details <i
                      class="ri-arrow-right-line ml-1"></i></span>
                </div>
              </div>
              <div class="text-center group-hover:text-red-600 transition duration-300">
                <h3 class="text-lg font-bold text-gray-900">The Classic Executive</h3>
                <p class="text-gray-500 text-sm mt-1">Hardcover Notebooks</p>
              </div>
            </a>
          </div>

          <div class="group">
            <a href="{{ route('product.show', ['slug' => 'something']) }}" class="block">
              <div class="relative overflow-hidden rounded-sm bg-gray-100 mb-4 aspect-[4/5]">
                <img src="https://images.unsplash.com/photo-1589829085413-56de8ae18c73?q=80&w=1200&auto=format&fit=cropp"
                  class="w-full h-full object-cover transition duration-700 group-hover:scale-105">
                <div
                  class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black/60 to-transparent p-6 opacity-0 group-hover:opacity-100 transition duration-300">
                  <span class="text-white text-sm uppercase tracking-widest font-bold">View Details <i
                      class="ri-arrow-right-line ml-1"></i></span>
                </div>
              </div>
              <div class="text-center group-hover:text-red-600 transition duration-300">
                <h3 class="text-lg font-bold text-gray-900">Modernist Blue</h3>
                <p class="text-gray-500 text-sm mt-1">Softcover Journals</p>
              </div>
            </a>
          </div>

          <div class="group">
            <a href="{{ route('product.show', ['slug' => 'something']) }}" class="block">
              <div class="relative overflow-hidden rounded-sm bg-gray-100 mb-4 aspect-[4/5]">
                <img src="https://images.unsplash.com/photo-1517842645767-c639042777db?q=80&w=1200&auto=format&fit=crop"
                  class="w-full h-full object-cover transition duration-700 group-hover:scale-105">
                <div
                  class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black/60 to-transparent p-6 opacity-0 group-hover:opacity-100 transition duration-300">
                  <span class="text-white text-sm uppercase tracking-widest font-bold">View Details <i
                      class="ri-arrow-right-line ml-1"></i></span>
                </div>
                <div class="absolute top-3 left-3 bg-gray-900 text-white text-xs px-2 py-1 uppercase tracking-wider">
                  New Arrival</div>
              </div>
              <div class="text-center group-hover:text-red-600 transition duration-300">
                <h3 class="text-lg font-bold text-gray-900">Botanical Series</h3>
                <p class="text-gray-500 text-sm mt-1">Limited Edition</p>
              </div>
            </a>
          </div>

        </div>

        <div class="mt-16 border-t border-gray-100 pt-8 flex justify-center">
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
    </div>
  </div>
@endsection