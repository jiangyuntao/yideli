@extends('index.layout')

@section('main')
<div class="bg-yideli-base py-20 border-b border-yideli-line">
  <div class="max-w-[1200px] mx-auto px-6 lg:px-12 text-center">
    <span class="text-xs font-bold tracking-[0.2em] uppercase text-yideli-dark mb-4 block">Updates From Factory</span>
    <h1 class="text-4xl lg:text-5xl font-serif text-yideli-dark mb-0">News & Insights</h1>
  </div>
</div>

<section class="max-w-[1200px] mx-auto px-6 lg:px-12 -mt-10 relative z-10 mb-20">
  <div class="bg-white shadow-xl border border-gray-100 grid lg:grid-cols-2 overflow-hidden group cursor-pointer news-card-hover">
    <div class="relative overflow-hidden h-64 lg:h-96">
      <img src="https://images.unsplash.com/photo-1540575467063-178a50935339?q=80&w=1200&auto=format&fit=crop"
        class="w-full h-full object-cover news-image transition duration-700" alt="Exhibition">
      <div class="absolute top-0 left-0 bg-yideli-dark text-white px-4 py-2 text-xs font-bold uppercase tracking-widest">Featured</div>
    </div>
    <div class="p-8 lg:p-12 flex flex-col justify-center">
      <div class="flex items-center gap-4 text-xs text-gray-500 mb-4 uppercase tracking-wide font-medium">
        <span class="text-yideli-dark">Exhibition</span>
        <span>|</span>
        <span>Oct 24, 2025</span>
      </div>
      <h2 class="text-2xl lg:text-3xl font-serif text-yideli-dark mb-4 group-hover:underline underline-offset-4 decoration-1">
        Invitation: Visit Yideli at the 136th Canton Fair
      </h2>
      <p class="text-gray-600 mb-8 font-light leading-relaxed line-clamp-3">
        We cordially invite you to visit our booth at Phase 3 of the Canton Fair. Discover our latest eco-friendly notebook collections and premium metal pen series. Our team will be on-site to discuss OEM opportunities.
      </p>
      <div class="flex items-center text-sm font-bold text-yideli-dark uppercase tracking-widest">
        Read Full Story
        <span class="ml-2 group-hover:translate-x-2 transition duration-300">→</span>
      </div>
    </div>
  </div>
</section>

<div class="max-w-[1200px] mx-auto px-6 lg:px-12 pb-24">
  <div class="grid lg:grid-cols-12 gap-12">

    <div class="lg:col-span-8 space-y-12">

      <article class="flex flex-col md:flex-row gap-8 group news-card-hover cursor-pointer border-b border-gray-100 pb-12">
        <div class="w-full md:w-1/3 aspect-[4/3] overflow-hidden bg-gray-100">
          <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=600&auto=format&fit=crop"
            class="w-full h-full object-cover news-image transition duration-700" alt="Factory">
        </div>
        <div class="w-full md:w-2/3 flex flex-col justify-center">
          <div class="flex items-center gap-3 text-xs text-gray-400 mb-3 uppercase tracking-wide">
            <span class="text-yideli-dark font-bold">Company News</span> • Dec 15, 2025
          </div>
          <h3 class="text-xl font-serif text-yideli-dark mb-3 group-hover:text-yideli-hover transition">
            Expansion of Automated Production Line Completed
          </h3>
          <p class="text-gray-500 font-light text-sm mb-4 leading-relaxed line-clamp-2">
            To meet growing international demand, Yideli has successfully upgraded Workshop B with fully automated injection molding equipment, increasing daily output by 40%.
          </p>
          <div class="relative w-max">
            <a href="{{ route('news.show', ['lang' => $lang, 'slug' => 'expansion-of-automated-production-line-completed']) }}" class="text-xs font-bold uppercase tracking-widest text-yideli-dark">Read More</a>
            <div class="read-more-line absolute bottom-[-2px] left-0 w-0 h-[1px] bg-yideli-dark transition-all duration-300"></div>
          </div>
        </div>
      </article>

      <article class="flex flex-col md:flex-row gap-8 group news-card-hover cursor-pointer border-b border-gray-100 pb-12">
        <div class="w-full md:w-1/3 aspect-[4/3] overflow-hidden bg-gray-100">
          <img src="{{ asset('images/notebook-1.jpg') }}"
            class="w-full h-full object-cover news-image transition duration-700" alt="Trends">
        </div>
        <div class="w-full md:w-2/3 flex flex-col justify-center">
          <div class="flex items-center gap-3 text-xs text-gray-400 mb-3 uppercase tracking-wide">
            <span class="text-yideli-dark font-bold">Industry Trends</span> • Nov 02, 2025
          </div>
          <h3 class="text-xl font-serif text-yideli-dark mb-3 group-hover:text-yideli-hover transition">
            2026 Stationery Trend Forecast: Sustainable & Minimalist
          </h3>
          <p class="text-gray-500 font-light text-sm mb-4 leading-relaxed line-clamp-2">
            Our R&D team analyzes the upcoming trends for the European and North American markets. Recycled materials and muted, earthy tones are set to dominate the shelves.
          </p>
          <div class="relative w-max">
            <span class="text-xs font-bold uppercase tracking-widest text-yideli-dark">Read More</span>
            <div class="read-more-line absolute bottom-[-2px] left-0 w-0 h-[1px] bg-yideli-dark transition-all duration-300"></div>
          </div>
        </div>
      </article>

      <article class="flex flex-col md:flex-row gap-8 group news-card-hover cursor-pointer border-b border-gray-100 pb-12">
        <div class="w-full md:w-1/3 aspect-[4/3] overflow-hidden bg-gray-100">
          <img src="https://images.unsplash.com/photo-1531538606174-0f90ff5dce83?q=80&w=600&auto=format&fit=crop"
            class="w-full h-full object-cover news-image transition duration-700" alt="Team">
        </div>
        <div class="w-full md:w-2/3 flex flex-col justify-center">
          <div class="flex items-center gap-3 text-xs text-gray-400 mb-3 uppercase tracking-wide">
            <span class="text-yideli-dark font-bold">Company News</span> • Sep 10, 2025
          </div>
          <h3 class="text-xl font-serif text-yideli-dark mb-3 group-hover:text-yideli-hover transition">
            Yideli Receives ISO 14001 Environmental Certification
          </h3>
          <p class="text-gray-500 font-light text-sm mb-4 leading-relaxed line-clamp-2">
            We are proud to announce that our factory has passed the rigorous ISO 14001 audit, reaffirming our commitment to green manufacturing processes.
          </p>
          <div class="relative w-max">
            <span class="text-xs font-bold uppercase tracking-widest text-yideli-dark">Read More</span>
            <div class="read-more-line absolute bottom-[-2px] left-0 w-0 h-[1px] bg-yideli-dark transition-all duration-300"></div>
          </div>
        </div>
      </article>

      <div class="flex gap-2 pt-4">
        <button class="px-4 py-2 border border-yideli-dark bg-yideli-dark text-white text-xs uppercase tracking-widest">1</button>
        <button class="px-4 py-2 border border-gray-200 hover:border-yideli-dark hover:text-yideli-dark text-gray-500 text-xs uppercase tracking-widest transition">2</button>
        <button class="px-4 py-2 border border-gray-200 hover:border-yideli-dark hover:text-yideli-dark text-gray-500 text-xs uppercase tracking-widest transition">Next</button>
      </div>

    </div>

    <aside class="lg:col-span-4 pl-0 lg:pl-12 space-y-12">

      <div>
        <h4 class="font-serif text-lg text-yideli-dark mb-4">Search</h4>
        <div class="relative">
          <input type="text" placeholder="Search news..." class="w-full bg-gray-50 border border-gray-200 px-4 py-3 text-sm focus:outline-none focus:border-yideli-dark transition">
          <button class="absolute right-3 top-3 text-gray-400 hover:text-yideli-dark">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
          </button>
        </div>
      </div>

      <div>
        <h4 class="font-serif text-lg text-yideli-dark mb-4">Categories</h4>
        <ul class="space-y-3 text-sm font-light text-gray-600">
          <li>
            <a href="#" class="flex justify-between items-center hover:text-yideli-dark group">
              <span>Company News</span>
              <span class="text-xs bg-gray-100 px-2 py-0.5 rounded-full group-hover:bg-yideli-base group-hover:text-yideli-dark">12</span>
            </a>
          </li>
          <li>
            <a href="#" class="flex justify-between items-center hover:text-yideli-dark group">
              <span>Industry Insights</span>
              <span class="text-xs bg-gray-100 px-2 py-0.5 rounded-full group-hover:bg-yideli-base group-hover:text-yideli-dark">5</span>
            </a>
          </li>
          <li>
            <a href="#" class="flex justify-between items-center hover:text-yideli-dark group">
              <span>Exhibitions</span>
              <span class="text-xs bg-gray-100 px-2 py-0.5 rounded-full group-hover:bg-yideli-base group-hover:text-yideli-dark">3</span>
            </a>
          </li>
          <li>
            <a href="#" class="flex justify-between items-center hover:text-yideli-dark group">
              <span>New Products</span>
              <span class="text-xs bg-gray-100 px-2 py-0.5 rounded-full group-hover:bg-yideli-base group-hover:text-yideli-dark">8</span>
            </a>
          </li>
        </ul>
      </div>

      <div>
        <h4 class="font-serif text-lg text-yideli-dark mb-4">Tags</h4>
        <div class="flex flex-wrap gap-2">
          <a href="#" class="text-xs border border-gray-200 px-3 py-1.5 text-gray-500 hover:border-yideli-dark hover:text-yideli-dark transition">Notebooks</a>
          <a href="#" class="text-xs border border-gray-200 px-3 py-1.5 text-gray-500 hover:border-yideli-dark hover:text-yideli-dark transition">OEM</a>
          <a href="#" class="text-xs border border-gray-200 px-3 py-1.5 text-gray-500 hover:border-yideli-dark hover:text-yideli-dark transition">Pens</a>
          <a href="#" class="text-xs border border-gray-200 px-3 py-1.5 text-gray-500 hover:border-yideli-dark hover:text-yideli-dark transition">Sustainability</a>
          <a href="#" class="text-xs border border-gray-200 px-3 py-1.5 text-gray-500 hover:border-yideli-dark hover:text-yideli-dark transition">Canton Fair</a>
        </div>
      </div>
    </aside>

  </div>
</div>
@endsection