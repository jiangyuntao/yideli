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
  <main class="max-w-[1400px] mx-auto  px-6 py-12 md:py-20 font-serif">
    <section class="w-full mb-16">
      <video class="inset-0 w-full h-full object-cover shadow-2xl" autoplay loop muted playsinline>
        <source src="{{ asset('videos/about-us-top.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
      </video>
    </section>

    <section class="grid grid-cols-1 md:grid-cols-12 gap-12 mb-16 items-start">
      <div class="md:col-span-6 flex flex-col items-start">
        <div class="mb-4">
          <div class="flex items-center gap-2">
            <img src="{{ asset('images/start-2.webp') }}" alt="Yierli Logo" class="h-60 w-auto object-contain">
          </div>
        </div>
      </div>

      <div class="md:col-span-6">
        <h2 class="text-2xl md:text-4xl font-black text-[#1F5F53] mb-6">Heritage & Commitment</h2>
        <div class="space-y-4 text-sm md:text-lg leading-relaxed text-gray-800">
          <p>
            Founded in 1989, YIDELI Industrial Trading Co., Ltd. specializes in the manufacture of high-quality
            diaries, notebooks, planners, journals, and wire-bound notebooks. We are experts in producing
            well-crafted covers utilizing materials such as printable PU, solid PU, PVC, and genuine leather.
          </p>
          <p>
            Our philosophy is to prioritize excellence over scale, with an unwavering commitment to detail and
            quality. This principle is the cornerstone of our long-standing partnerships.
          </p>
        </div>
      </div>
    </section>

    <section class="w-full mb-16">
      <div class="relative w-full h-64 md:h-96 bg-gray-300 overflow-hidden rounded-sm shadow-sm">
        <img src="{{ asset('images/about-us/Heritage-Commitment.webp') }}" alt="Factory Building"
          class="w-full h-full object-cover opacity-90">
        <div class="absolute inset-0 bg-white/20"></div>
      </div>
    </section>

    <section class="grid grid-cols-1 md:grid-cols-12 gap-12 mb-20 items-center">
      <div class="order-2 md:col-span-7 md:order-1">
        <h2 class="text-2xl md:text-4xl font-black text-[#1F5F53] mb-6">Integrated Manufacturing</h2>
        <div class="text-sm md:text-lg leading-relaxed text-gray-800 space-y-4">
          <p>
            Our core strength is our modern, standardized production facility in Taizhou, which houses a fully
            integrated, end-to-end manufacturing process. This encompasses printing, binding, inner-page
            production, and cover fabrication, ensuring seamless quality control, operational efficiency, and
            reliable supply-chain management. This operation is supported by a dedicated workforce of over 300
            professionals, including:
          </p>
          <ul class="list-disc ps-5 space-y-1">
            <li>A specialized R&D team focused on stationery trends and innovation.</li>
            <li>Technicians with decades of hands-on industry experience.</li>
            <li>Skilled production and operations management personnel.</li>
          </ul>
        </div>
      </div>

      <div class="order-1 md:col-span-5 md:order-2 h-64 md:h-auto rounded-sm shadow-sm">
        <div class="grid grid-cols-2 gap-6">
          <div class="aspect-[4/3] bg-[#367C6D] rounded-sm">
            <img src="{{ asset('images/about-us/Integrated-Manufacturing-1.webp') }}" alt="MBO Folding Machine" class="w-full h-full object-cover">
          </div>
          <div class="aspect-[4/3] bg-[#367C6D] rounded-sm">
            <img src="{{ asset('images/IMG_5912.webp') }}" alt="Muller martini automatic stitching machine"
              class="w-full h-full object-cover">
          </div>
          <div class="aspect-[4/3] bg-[#367C6D] rounded-sm">
            <img src="{{ asset('images/IMG_5899.webp') }}" alt="Germany Heidelberg four-color printing machine"
              class="w-full h-full object-cover">
          </div>
          <div class="aspect-[4/3] bg-[#367C6D] rounded-sm">
            <img src="{{ asset('images/IMG_5881.webp') }}" alt="Germany kolbus cover auto-wrapping machine"
              class="w-full h-full object-cover">
          </div>
        </div>
      </div>
    </section>

    <section class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-20 items-center">
      <div class="grid grid-cols-2 gap-6">
        <div class="rounded-sm overflow-hidden aspect-[5/3]">
          <img src="{{ asset('images/about-us/Integrated-Manufacturing-5.webp') }}" class="w-full h-full object-fit">
        </div>
        <div class="rounded-sm overflow-hidden aspect-[5/3]">
          <img src="{{ asset('images/about-us/Integrated-Manufacturing-6.webp') }}" class="w-full h-full object-fit">
        </div>
        <div class="rounded-sm overflow-hidden aspect-[5/3]">
          <img src="{{ asset('images/about-us/Integrated-Manufacturing-7.webp') }}" class="w-full h-full object-fit">
        </div>
        <div class="rounded-sm overflow-hidden aspect-[5/3]">
          <img src="{{ asset('images/about-us/Integrated-Manufacturing-8.webp') }}" class="w-full h-full object-fit">
        </div>
        <div class="rounded-sm overflow-hidden aspect-[5/3]">
          <img src="{{ asset('images/about-us/Integrated-Manufacturing-9.webp') }}" class="w-full h-full object-fit">
        </div>
        <div class="rounded-sm overflow-hidden aspect-[5/3]">
          <img src="{{ asset('images/about-us/Integrated-Manufacturing-10.webp') }}" class="w-full h-full object-fit">
        </div>
      </div>
      <div>
        <ul class="space-y-4 text-[#1F5F53] font-medium text-sm md:text-lg">
          <li class="flex items-center gap-2">
            <span class="w-1.5 h-1.5 bg-[#1F5F53] rounded-full"></span>
            Germany Heidelberg four-color printing machine
          </li>
          <li class="flex items-center gap-2">
            <span class="w-1.5 h-1.5 bg-[#1F5F53] rounded-full"></span>
            MBO folding machine
          </li>
          <li class="flex items-center gap-2">
            <span class="w-1.5 h-1.5 bg-[#1F5F53] rounded-full"></span>
            Assembling Machine
          </li>
          <li class="flex items-center gap-2">
            <span class="w-1.5 h-1.5 bg-[#1F5F53] rounded-full"></span>
            Muller martini automatic stitching machine
          </li>
          <li class="flex items-center gap-2">
            <span class="w-1.5 h-1.5 bg-[#1F5F53] rounded-full"></span>
            Germany Wohlenberg three-knife trimming machine
          </li>
          <li class="flex items-center gap-2">
            <span class="w-1.5 h-1.5 bg-[#1F5F53] rounded-full"></span>
            Muller Martini Gathering machine
          </li>
          <li class="flex items-center gap-2">
            <span class="w-1.5 h-1.5 bg-[#1F5F53] rounded-full"></span>
            Computer Automatic material cutting machine
          </li>
          <li class="flex items-center gap-2">
            <span class="w-1.5 h-1.5 bg-[#1F5F53] rounded-full"></span>
            Computer Hot stamping die cutting and creasing machine
          </li>
          <li class="flex items-center gap-2">
            <span class="w-1.5 h-1.5 bg-[#1F5F53] rounded-full"></span>
            Germany kolbus cover auto-wrapping machine
          </li>
          <li class="flex items-center gap-2">
            <span class="w-1.5 h-1.5 bg-[#1F5F53] rounded-full"></span>
            Germany kolbus casemaker
          </li>
        </ul>
      </div>
    </section>
    <section class="mb-20">
      <div class="grid grid-cols-1 md:grid-cols-12 gap-12 items-center mb-12">
        <div class="md:col-span-7">
          <h2 class="text-2xl md:text-4xl font-black text-[#1F5F53] mb-6">Quality & Compliance</h2>
          <div class="text-sm md:text-lg leading-relaxed text-gray-800 space-y-4">
            <p>
              YIDELI is dedicated to sustainable growth and upholds the highest standards of quality and
              corporate responsibility. Our commitment is validated by key international certifications and
              audits recognized for global trade, including ISO 9001, ISO 14001, FSC, and social compliance
              audits such as BSCI, SEDEX, GSV, WCA, and SQP.
            </p>
          </div>
        </div>
        <div class="md:col-span-5 grid grid-cols-2 gap-3">
          <div class="aspect-[16/9] bg-[#367C6D] rounded-sm opacity-90">
            <img src="{{ asset('images/about-us/Quality-Compliance-1.webp') }}" class="w-full h-full object-fit">
          </div>
          <div class="aspect-[16/9] bg-[#367C6D] rounded-sm opacity-90">
            <img src="{{ asset('images/about-us/Quality-Compliance-2.webp') }}" class="w-full h-full object-fit">
          </div>
          <div class="aspect-[16/9] bg-[#367C6D] rounded-sm opacity-90">
            <img src="{{ asset('images/about-us/Quality-Compliance-3.webp') }}" class="w-full h-full object-fit">
          </div>
          <div class="aspect-[16/9] bg-[#367C6D] rounded-sm opacity-90">
            <img src="{{ asset('images/about-us/Quality-Compliance-4.webp') }}" class="w-full h-full object-fit">
          </div>
        </div>
      </div>

      <div class="mb-16">
        <div class="flex flex-col items-center">
          <div class="w-full overflow-hidden relative group">

            <div class="flex gap-8 w-max animate-marquee group-hover:pause">

              @for ($i = 0; $i < 3; $i++)
              @for ($j = 1; $j <= 8; $j++)
              <img src="{{ asset('images/slides/' . $j . '.webp') }}"
                class="h-64 w-auto shadow-sm rounded-sm">
              @endfor
              @endfor
            </div>

            <div
              class="absolute top-0 start-0 w-16 h-full bg-gradient-to-r from-yideli-base to-transparent pointer-events-none">
            </div>
            <div
              class="absolute top-0 end-0 w-16 h-full bg-gradient-to-l from-yideli-base to-transparent pointer-events-none">
            </div>
          </div>
        </div>

        <div class="w-full max-w-md mx-auto h-px bg-[#A8C5BD] mt-8 text-center relative">
          <div class="absolute end-0 -top-1 w-2 h-2 bg-[#A8C5BD] rounded-full"></div>
        </div>
      </div>
    </section>


    <section class="grid grid-cols-1 md:grid-cols-12 gap-12 items-center mb-20">
      <div class="md:col-span-6 order-2 md:order-1">
        <div class="flex flex-col gap-4">
          <div class="grid grid-cols-2 gap-4">
            <div class="aspect-[16/9] bg-[#367C6D] rounded-sm">
              <img src="{{ asset('images/about-us/Global-Reach-1.webp') }}" class="w-full h-full object-fit">
            </div>
            <div class="aspect-[16/9] bg-[#367C6D] rounded-sm">
              <img src="{{ asset('images/about-us/Global-Reach-2.webp') }}" class="w-full h-full object-fit">
            </div>
            <div class="aspect-[16/9] bg-[#367C6D] rounded-sm">
              <img src="{{ asset('images/about-us/Global-Reach-3.webp') }}" class="w-full h-full object-fit">
            </div>
            <div class="aspect-[16/9] bg-[#367C6D] rounded-sm">
              <img src="{{ asset('images/about-us/Global-Reach-4.webp') }}" class="w-full h-full object-fit">
            </div>
          </div>
        </div>
      </div>

      <div class="md:col-span-6 order-1 md:order-2">
        <h2 class="text-2xl md:text-4xl font-black text-[#1F5F53] mb-6">Global Reach</h2>
        <div class="text-sm md:text-lg leading-relaxed text-gray-800 space-y-4">
          <p>
            Guided by our core values of Integrity, Focus, Quality, and Efficiency, we combine innovative design
            with dependable execution to deliver exceptional notebooks to a worldwide clientele.
          </p>
          <p>
            Our products are trusted by partners across the United States, Canada, Europe, Russia, South
            America, the Middle East, Japan, South Africa, and beyond, earning a reputation for superior quality
            and service.
          </p>
        </div>
      </div>
    </section>

    <section class="grid grid-cols-1 md:grid-cols-12 gap-12 items-center mb-20">
      <div class="md:col-span-6">
        <h2 class="text-2xl md:text-4xl font-black text-[#1F5F53] mb-6">R&D & Innovation</h2>
        <div class="text-sm md:text-lg leading-relaxed text-gray-800 space-y-4">
          <p>
            To fuel continuous innovation, we maintain a dedicated R&D center in Hangzhou.
          </p>
          <p>
            This team of 22 skilled designers, illustrators, and 3D modelers is tasked with developing
            innovative products that integrate ergonomic design, practical functional features, and contemporary
            market trends.
          </p>
        </div>
        <div class="w-full h-px bg-[#A8C5BD] mt-8 relative">
        </div>
      </div>

      <div class="md:col-span-6 grid grid-cols-2 gap-4">
        <img src="{{ asset('images/about-us/RandD-Innovation-1.webp') }}" alt="R&D Team Member"
          class="w-full aspect-[1/1] object-cover rounded-sm shadow-sm">
        <img src="{{ asset('images/about-us/RandD-Innovation-2.webp') }}" alt="Office Environment"
          class="w-full aspect-[1/1] object-cover rounded-sm shadow-sm">
        <img src="{{ asset('images/about-us/RandD-Innovation-3.webp') }}" alt="R&D Team Member"
          class="w-full aspect-[1/1] object-cover rounded-sm shadow-sm">
        <img src="{{ asset('images/about-us/RandD-Innovation-4.webp') }}" alt="Office Environment"
          class="w-full aspect-[1/1] object-cover rounded-sm shadow-sm">
      </div>
    </section>


    <section class="mb-12">
      <div class="grid grid-cols-1 md:grid-cols-12 gap-12 items-center mb-12">
        <div class="md:col-span-6 order-2 md:order-1 grid grid-cols-1 gap-3">
          <div class="aspect-[32/12] bg-[#367C6D] rounded-sm opacity-90">
            <img src="{{ asset('images/about-us/Your-Strategic-Partner-1.webp') }}" class="w-full h-full object-cover">
          </div>
          <div class="aspect-[32/12] bg-[#367C6D] rounded-sm opacity-90">
            <img src="{{ asset('images/about-us/Your-Strategic-Partner-2.webp') }}" class="w-full h-full object-cover">
          </div>
        </div>

        <div class="md:col-span-6 order-1 md:order-2">
          <h2 class="text-2xl md:text-4xl font-black text-[#1F5F53] mb-6">Your Strategic Partner</h2>
          <div class="text-sm md:text-lg leading-relaxed text-gray-800 space-y-4">
            <p>
              We position ourselves as more than a supplier; we are a strategic partner in the notebook
              industry. Whether you require custom notebook solutions or a reliable OEM/ODM manufacturer,
              YIDELI offers the expertise, capacity, and commitment necessary to bring your vision to life.
            </p>
            <p>
              We invite clients worldwide to visit our facilities and explore opportunities for long-term
              collaboration.
            </p>
          </div>
        </div>
      </div>

      <div class="md:col-span-12 order-1 md:order-3 grid grid-cols-3 gap-3">
        <div class="aspect-[2/3] bg-[#367C6D] rounded-sm opacity-90">
          <img src="{{ asset('images/about-us/Your-Strategic-Partner-3.webp') }}" class="w-full h-full object-cover">
        </div>
        <div class="aspect-[2/3] bg-[#367C6D] rounded-sm opacity-90">
          <img src="{{ asset('images/about-us/Your-Strategic-Partner-4.webp') }}" class="w-full h-full object-cover">
        </div>
        <div class="aspect-[2/3] bg-[#367C6D] rounded-sm opacity-90">
          <img src="{{ asset('images/about-us/Your-Strategic-Partner-5.webp') }}" class="w-full h-full object-cover">
        </div>
      </div>
    </section>

    <section>
      <img src="{{ asset('images/about-us/Your-Strategic-Partner-7.webp') }}" class="w-full h-full object-cover">
    </section>
  </main>
  {{-- <section class="relative">
    <img src="{{ asset('images/about-us-1.jpg') }}" class="w-full object-cover" alt="Design Process">
  </section>
  --}}

  {{-- <section class="bg-yideli-dark text-yideli-base py-16">
    <div
      class="max-w-[1600px] mx-auto px-6 lg:px-12 grid grid-cols-2 md:grid-cols-4 gap-8 text-center divide-x divide-white/10">
      <div>
        <span class="block text-4xl lg:text-5xl font-serif font-bold mb-2">2005</span>
        <span class="text-sm uppercase tracking-widest opacity-80">Established</span>
      </div>
      <div>
        <span class="block text-4xl lg:text-5xl font-serif font-bold mb-2">10k+</span>
        <span class="text-sm uppercase tracking-widest opacity-80">Square Meters</span>
      </div>
      <div>
        <span class="block text-4xl lg:text-5xl font-serif font-bold mb-2">50+</span>
        <span class="text-sm uppercase tracking-widest opacity-80">Export Countries</span>
      </div>
      <div>
        <span class="block text-4xl lg:text-5xl font-serif font-bold mb-2">ISO</span>
        <span class="text-sm uppercase tracking-widest opacity-80">Certified Factory</span>
      </div>
    </div>
  </section>

  <section class="relative">
    <img src="{{ asset('images/about-us-2.jpg') }}" class="w-full object-cover" alt="Design Process">
  </section> --}}

@endsection