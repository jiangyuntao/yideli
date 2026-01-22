@extends('index.layout')

@section('main')
  <div class="relative bg-yideli-base py-12 md:py-12 overflow-hidden">
    <div class="absolute top-0 end-0 w-1/3 h-full bg-yideli-dark/5 skew-x-12 translate-x-1/2"></div>

    {{-- 修改：头部区域适配 1200/1600/2400 --}}
    <div
      class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto px-6 md:px-12 text-center relative z-10">
      <h1 class="text-4xl md:text-5xl font-serif font-bold text-yideli-dark mb-6">Customize from Concept</h1>
      <p class="text-gray-600 max-w-2xl mx-auto space-y-4 text-sm md:text-lg leading-relaxed text-gray-800">
        We provide a clear path to realization your customize require . From executing your supplied designs to offering
        our own
        customizable solutions, we translate your specific requirements into precise, tangible products through three key
        stages: Co-creation, Material Selection, and Sample Approval—ensuring the final product aligns perfectly with your
        brand
        and commercial objectives.
      </p>
    </div>
  </div>

  {{-- 修改：主要内容区域适配 --}}
  <section
    class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto px-6 md:px-12 py-12 md:py-12 space-y-24">

    <div class="grid md:grid-cols-12 gap-12 md:gap-20 items-center">
      <div class="order-2 md:col-span-7 md:order-1 relative">
        <h2 class="text-4xl font-serif font-bold text-yideli-dark mb-4 relative z-10">Design Co-creation</h2>
        <p class="text-gray-800 text-lg leading-relaxed relative z-10">
          It all begins with the inspiration. You can provide complete designs for OEM production, or select and adapt
          from our extensive existing design library. Our design team works closely with you to professionally refine
          every
          detail—logo,
          dimensions, materials, inner pages—ensuring the design is both production-ready and perfectly tailored to your
          needs.
        </p>
      </div>
      <div class="order-1 md:col-span-5 md:order-2">
        <img class="w-full h-full object-cover rounded-sm shadow-xl" src="{{ asset('images/process/1.jpg') }}"
          alt="Design Process">
      </div>
    </div>

    <div class="grid md:grid-cols-12 gap-12 md:gap-20 items-center">
      <div class="order-1 md:col-span-5 md:grid md:grid-cols-2 md:gap-4">
        <img class="w-full h-full object-cover rounded-sm shadow-xl" src="{{ asset('images/process/2.png') }}">
        <img class="w-full h-full object-cover rounded-sm shadow-xl" src="{{ asset('images/process/3.png') }}">
      </div>
      <div class="order-2 md:col-span-7 relative">
        <h2 class="text-4xl font-serif font-bold text-yideli-dark mb-4 relative z-10 md:text-right">Material Selection
        </h2>
        <p class="text-gray-800 text-lg leading-relaxed relative z-10">
          Quality begins with precise control over raw materials. Leveraging long-term partnerships with trusted
          suppliers, we
          offer a diverse range of cover materials (such as PU, PVC, genuine leather), specialty papers, and accessories
          to
          strictly meet your standards for visual appeal, tactile experience, and functionality.
        </p>
      </div>
    </div>

    <div class="grid md:grid-cols-12 gap-12 md:gap-20 items-center">
      <div class="order-2 relative md:col-span-7">
        <h2 class="text-4xl font-serif font-bold text-yideli-dark mb-4 relative z-10">Sample Approval</h2>
        <p class="text-gray-800 text-lg leading-relaxed relative z-10">
          After design finalization, we produce an accurate physical sample for your final confirmation. This critical
          step allows you to personally experience and approve every detail, guaranteeing that mass production will adhere
          exactly to the sample's standards.
        </p>
      </div>
      <div class="order-1 md:col-span-5 md:order-2 relative">
        <img class="w-full h-full object-cover rounded-sm shadow-xl" src="{{ asset('images/process/4.png') }}"
          alt="Raw Material">
      </div>
    </div>

  </section>

  <section class="bg-yideli-dark text-white py-10 md:py-18">
    {{-- 修改：标题条适配 --}}
    <div class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto px-6 md:px-12 text-center">
      <h2 class="text-3xl md:text-4xl font-serif">Custom Proposal</h2>
    </div>
  </section>

  <section class="px-6 md:px-12 bg-[#f6fff4]">
    {{-- 修改：大图区域适配 --}}
    <div class="max-w-[1200px] min-[1921px]:max-w-[1600px] min-[2561px]:max-w-[2400px] mx-auto">
      <img class="w-full h-auto" src="{{ asset('images/custom-1-big.jpg') }}">
    </div>
  </section>

  <section class="py-24 bg-yideli-base">
    {{-- 保持 800px：文本阅读区域不宜过宽，否则换行太长难以阅读 --}}
    <div class="max-w-[800px] mx-auto text-center px-6">
      <h2 class="text-3xl font-serif text-yideli-dark mb-6">See It For Yourself</h2>
      <p class="text-gray-600 mb-8 font-light">
        We welcome international clients to visit our factory in Taizhou. Schedule a tour to witness our production
        capacity and quality control firsthand.
      </p>
      <a class="inline-block bg-yideli-dark text-white px-10 py-4 text-sm font-bold uppercase tracking-widest hover:bg-yideli-hover transition shadow-lg shadow-yideli-dark/20"
        href="{{ route('inquire.form', ['lang' => $lang]) }}">
        Book a Factory Tour
      </a>
    </div>
  </section>
@endsection
