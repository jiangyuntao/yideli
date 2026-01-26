@extends('index.layout')

@section('head')
  <title>About Us - Yideli Stationery</title>
  <style>
    @keyframes marquee {
      0% {
        transform: translateX(0);
      }

      100% {
        transform: translateX(-50%);
      }
    }

    .animate-marquee {
      animation: marquee 20s linear infinite;
    }

    .group:hover .pause {
      animation-play-state: paused;
    }
  </style>
@endsection

@section('main')
  <main
    class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto px-6 py-12 md:py-20 text-yideli-text font-sans text-[#1F5F53]">
    <h1 class="text-4xl font-[800] mb-8 text-center">{{ $page->title }}</h1>
    <article>
      {!! $page->content !!}
    </article>

  </main>
@endsection
