@extends('index.layout')

@section('main')
  <div class="bg-gray-50 py-4 border-b border-gray-100">
    <div class="max-w-[1200px] mx-auto px-6 lg:px-12">
      <nav class="flex text-xs text-gray-500 uppercase tracking-widest gap-2">
        <a href="{{ route('index', ['lang' => $lang]) }}" class="hover:text-yideli-dark">Home</a>
        <span>/</span>
        <a href="{{ route('news.index', ['lang' => $lang]) }}" class="hover:text-yideli-dark">News</a>
        <span>/</span>
        <span class="text-yideli-dark font-bold">{{ $entry->category->name }}</span>
      </nav>
    </div>
  </div>

  <div class="max-w-[1200px] mx-auto px-6 lg:px-12 py-16 lg:py-24">
    <div class="grid lg:grid-cols-12 gap-16">

      <article class="lg:col-span-8">

        <div class="mb-8">
          <div class="flex items-center gap-3 text-xs text-gray-500 mb-4 uppercase tracking-wide font-medium">
            <span class="text-yideli-dark bg-yideli-base px-2 py-1">{{ $entry->category->name }}</span>
            <span>{{ $entry->published_at }}</span>
          </div>
          <h1 class="text-3xl lg:text-5xl font-serif text-yideli-dark leading-tight mb-6">
            {{ $entry->title }}
          </h1>
          <div class="flex justify-between items-center border-b border-gray-100 pb-6">
            <div class="text-sm text-gray-500">By <span class="text-yideli-dark font-bold">Yideli Media Team</span></div>
            <div class="flex gap-3">
              <button class="text-gray-400 hover:text-yideli-dark"><svg class="w-5 h-5" fill="currentColor"
                  viewBox="0 0 24 24">
                  <path
                    d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                </svg></button>
              <button class="text-gray-400 hover:text-yideli-dark"><svg class="w-5 h-5" fill="currentColor"
                  viewBox="0 0 24 24">
                  <path
                    d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                </svg></button>
            </div>
          </div>
        </div>

        <div class="prose max-w-none">
          <img src="{{ asset('storage/' . $entry->cover_image) }}" alt="Canton Fair Booth Design"
            class="w-full h-auto mb-8 rounded-sm shadow-sm">

          <article>
            {!! $entry->content !!}
          </article>
        </div>

        <div class="mt-12 pt-8 border-t border-gray-100 flex gap-2">
          <span class="text-sm font-bold text-yideli-dark me-2 self-center">Tags:</span>
          <a href="#"
            class="px-3 py-1 bg-gray-50 text-xs text-gray-600 hover:bg-yideli-dark hover:text-white transition rounded">Canton
            Fair</a>
          <a href="#"
            class="px-3 py-1 bg-gray-50 text-xs text-gray-600 hover:bg-yideli-dark hover:text-white transition rounded">Exhibition</a>
          <a href="#"
            class="px-3 py-1 bg-gray-50 text-xs text-gray-600 hover:bg-yideli-dark hover:text-white transition rounded">2025
            Events</a>
        </div>

        <div class="mt-12 flex justify-between items-center bg-gray-50 p-6 border border-gray-100">
          <a href="#" class="text-sm font-medium text-gray-600 hover:text-yideli-dark flex items-center gap-2">
            <span>←</span> Previous: ISO 14001 Certified
          </a>
          <a href="#" class="text-sm font-medium text-gray-600 hover:text-yideli-dark flex items-center gap-2">
            Next: New Production Line <span>→</span>
          </a>
        </div>

      </article>

      <aside class="lg:col-span-4 space-y-12">
        <div class="sticky top-32">

          <!-- <div class="bg-yideli-dark text-white p-8 mb-12 shadow-lg">
              <h3 class="font-serif text-2xl mb-4">Meeting Us?</h3>
              <p class="text-white/80 text-sm mb-6 font-light">
                Download our booth map and schedule a VIP meeting with our sales director.
              </p>
              <button class="w-full bg-white text-yideli-dark font-bold uppercase text-xs py-3 tracking-widest hover:bg-yideli-base transition mb-3">
                Book Meeting
              </button>
              <button class="w-full border border-white text-white font-bold uppercase text-xs py-3 tracking-widest hover:bg-white/10 transition">
                Download Map (PDF)
              </button>
            </div> -->

          <div>
            <h4 class="font-serif text-lg text-yideli-dark mb-6 pb-2 border-b border-gray-100">Related News</h4>
            <div class="space-y-6">
              <a href="#" class="group flex gap-4">
                <div class="w-20 h-20 flex-shrink-0 overflow-hidden bg-gray-100">
                  <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=200&auto=format&fit=crop"
                    class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                </div>
                <div>
                  <div class="text-[10px] text-gray-400 uppercase mb-1">Dec 15, 2025</div>
                  <h5
                    class="text-sm font-medium text-yideli-text leading-snug group-hover:text-yideli-dark group-hover:underline">
                    Expansion of Automated Production Line Completed</h5>
                </div>
              </a>
              <a href="#" class="group flex gap-4">
                <div class="w-20 h-20 flex-shrink-0 overflow-hidden bg-gray-100">
                  <img src="https://images.unsplash.com/photo-1531538606174-0f90ff5dce83?q=80&w=200&auto=format&fit=crop"
                    class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                </div>
                <div>
                  <div class="text-[10px] text-gray-400 uppercase mb-1">Sep 10, 2025</div>
                  <h5
                    class="text-sm font-medium text-yideli-text leading-snug group-hover:text-yideli-dark group-hover:underline">
                    Yideli Receives ISO 14001 Certification</h5>
                </div>
              </a>
            </div>
          </div>

        </div>
      </aside>

    </div>
  </div>
@endsection