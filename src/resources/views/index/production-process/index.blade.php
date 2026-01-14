@extends('index.layout')

@section('main')
  <div class="relative bg-yideli-base py-24 lg:py-32 border-b border-yideli-line overflow-hidden">
    <div class="absolute top-0 end-0 w-1/3 h-full bg-yideli-dark/5 skew-x-12 translate-x-1/2"></div>

    <div class="max-w-[1600px] mx-auto px-6 lg:px-12 text-center relative z-10">
      <h1 class="text-4xl lg:text-6xl font-serif text-yideli-dark mb-6">Customize from Concept</h1>
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

  <section class="max-w-[1600px] mx-auto px-6 lg:px-12 py-20 lg:py-32 space-y-24">

    <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">
      <div class="order-2 lg:order-1 relative">
        <div class="step-number text-yideli-dark">01</div>
        <h2 class="text-4xl font-serif text-yideli-dark mb-4 relative z-10">Design Co-creation</h2>
        <p class="text-gray-800 text-lg leading-relaxed relative z-10">
          It all begins with the inspiration. You can provide complete designs for OEM production, or select and adapt
          from our extensive existing design library. Our design team works closely with you to professionally refine
          every
          detail—logo,
          dimensions, materials, inner pages—ensuring the design is both production-ready and perfectly tailored to your
          needs.
        </p>
      </div>
      <div class="order-1 lg:order-2">
        <img src="{{ asset('images/process-1.png') }}" class="w-auto h-[300px] object-cover rounded-sm shadow-xl"
          alt="Design Process">
      </div>
    </div>

    <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">
      <div class="order-1">
        <img src="{{ asset('images/process-2.png') }}" class="w-auto h-[300px] object-cover rounded-sm shadow-xl"
          alt="Raw Material">
      </div>
      <div class="order-2 relative">
        <div class="step-number text-yideli-dark end-0 start-auto">02</div>
        <h2 class="text-4xl font-serif text-yideli-dark mb-4 relative z-10">Material Selection</h2>
        <p class="text-gray-800 text-lg leading-relaxed relative z-10">
          Quality begins with precise control over raw materials. Leveraging long-term partnerships with trusted
          suppliers, we
          offer a diverse range of cover materials (such as PU, PVC, genuine leather), specialty papers, and accessories
          to
          strictly meet your standards for visual appeal, tactile experience, and functionality.
        </p>
      </div>
    </div>

    <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">
      <div class="order-2 relative">
        <div class="step-number text-yideli-dark end-0 start-auto">03</div>
        <h2 class="text-4xl font-serif text-yideli-dark mb-4 relative z-10">Sample Approval</h2>
        <p class="text-gray-800 text-lg leading-relaxed relative z-10">
          After design finalization, we produce an accurate physical sample for your final confirmation. This critical
          step allows you to personally experience and approve every detail, guaranteeing that mass production will adhere
          exactly to the sample's standards.
        </p>
      </div>
      <div class="order-1 lg:order-2 relative">
        <img src="{{ asset('images/process-3.png') }}" class="w-auto h-[300px] object-cover rounded-sm shadow-xl"
          alt="Raw Material">
      </div>
    </div>

  </section>

  <section class="bg-yideli-dark text-white py-10 lg:py-18">
    <div class="max-w-[1600px] mx-auto px-6 lg:px-12 text-center">
      <h2 class="text-3xl lg:text-4xl font-serif">Custom Proposal</h2>
    </div>
  </section>

  <section class="px-6 lg:px-12 bg-[#f6fff4]">
    <div class="max-w-[1600px] mx-auto">
      <img src="{{ asset('images/custom-1-big.jpg') }}">
    </div>
  </section>

  <section class="py-24 bg-yideli-base">
    <div class="max-w-[800px] mx-auto text-center px-6">
      <h2 class="text-3xl font-serif text-yideli-dark mb-6">See It For Yourself</h2>
      <p class="text-gray-600 mb-8 font-light">
        We welcome international clients to visit our factory in Taizhou. Schedule a tour to witness our production
        capacity and quality control firsthand.
      </p>
      <a href="{{ route('inquire.form', ['lang' => $lang]) }}"
        class="inline-block bg-yideli-dark text-white px-10 py-4 text-sm font-bold uppercase tracking-widest hover:bg-yideli-hover transition shadow-lg shadow-yideli-dark/20">
        Book a Factory Tour
      </a>
    </div>
  </section>
@endsection