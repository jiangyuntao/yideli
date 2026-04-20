@extends('index.layout')

@section('title', $page->title)

@section('head')
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
    class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto px-6 py-12 text-yideli-text font-sans text-[#1F5F53] md:py-20">
    <h1 class="mb-8 text-center text-3xl font-[800] sm:text-4xl">{{ $page->title }}</h1>
    <article class="responsive-richtext">
      {!! $page->content !!}
    </article>

  </main>
@endsection
