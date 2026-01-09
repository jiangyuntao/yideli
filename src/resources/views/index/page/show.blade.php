@extends('index.layout')

@section('head')
  <title>About Us - Yideli Stationery</title>
  <style>
    /* 定义 Marquee 关键帧：从 0% 移动到 -50% */
    @keyframes marquee {
      0% {
        transform: translateX(0);
      }

      100% {
        transform: translateX(-50%);
      }
    }

    .animate-marquee {
      /* 30s: 滚动一圈的时间，数字越大越慢
               linear: 匀速滚动
               infinite: 无限循环
            */
      animation: marquee 30s linear infinite;
    }

    /* 鼠标悬停时暂停 */
    .group:hover .pause {
      animation-play-state: paused;
    }
  </style>
@endsection

@section('main')
  <main class="max-w-[1600px] mx-auto  px-6 py-12 md:py-20 font-serif">

    <h1 class="text-3xl md:text-5xl font-bold text-[#1F5F53] text-center mb-16">
      YIDELI: Crafting a Legacy in Every Page
    </h1>

    <section class="w-full mb-16">
      <video class="inset-0 w-full h-full object-cover shadow-2xl" autoplay loop muted playsinline>
        <source src="{{ asset('videos/about-us-top.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
      </video>
    </section>

    <section class="grid grid-cols-1 md:grid-cols-12 gap-12 mb-16 items-start">
      <div class="md:col-span-4 flex flex-col items-start">
        <div class="mb-4">
          <div class="flex items-center gap-2">
            <img src="{{ asset('images/logo-light-bg.png') }}" alt="Yideli Logo" class="h-auto w-40 object-contain">
          </div>
          <p class="text-xs text-[#1F5F53] font-bold mt-2 tracking-wide uppercase">
            Taizhou Yideli Industrial Trading Co., Ltd.
          </p>
          <div class="h-0.5 w-32 bg-[#A8C5BD] mt-2"></div>
        </div>
      </div>

      <div class="md:col-span-8">
        <h2 class="text-2xl md:text-3xl font-bold text-[#1F5F53] mb-6">Heritage & Commitment</h2>
        <div class="space-y-4 text-sm md:text-base leading-relaxed text-gray-800">
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
        <img src="{{ asset('images/about-us-hero-image-1.jpg') }}" alt="Factory Building"
          class="w-full h-full object-cover opacity-90">
        <div class="absolute inset-0 bg-white/20"></div>
      </div>
    </section>

    <section class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-20 items-center">
      <div class="order-2 md:order-1">
        <h2 class="text-2xl md:text-3xl font-bold text-[#1F5F53] mb-6">Integrated Manufacturing</h2>
        <div class="text-sm md:text-base leading-relaxed text-gray-800 space-y-4">
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

      <div class="order-1 md:order-2 h-64 md:h-auto rounded-sm shadow-sm">
        <img src="https://placehold.co/800x600/367C6D/367C6D" class="w-full">
      </div>
    </section>

    <section class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-20 items-center">
      <div class="grid grid-cols-2 gap-4">
        <div class="aspect-[4/3] bg-[#367C6D] rounded-sm"></div>
        <div class="aspect-[4/3] bg-[#367C6D] rounded-sm"></div>
        <div class="aspect-[4/3] bg-[#367C6D] rounded-sm"></div>
        <div class="aspect-[4/3] bg-[#367C6D] rounded-sm"></div>
      </div>

      <div>
        <ul class="space-y-4 text-[#1F5F53] font-medium text-sm md:text-base">
          <li class="flex items-center gap-2">
            <span class="w-1.5 h-1.5 bg-[#1F5F53] rounded-full"></span>
            MBO folding machine
          </li>
          <li class="flex items-center gap-2">
            <span class="w-1.5 h-1.5 bg-[#1F5F53] rounded-full"></span>
            Muller martini automatic stitching machine
          </li>
          <li class="flex items-center gap-2">
            <span class="w-1.5 h-1.5 bg-[#1F5F53] rounded-full"></span>
            Germany Heidelberg four-color printing machine
          </li>
          <li class="flex items-center gap-2">
            <span class="w-1.5 h-1.5 bg-[#1F5F53] rounded-full"></span>
            Germany kolbus cover auto-wrapping machine
          </li>
          <li class="flex items-center gap-2">
            <span class="w-1.5 h-1.5 bg-[#1F5F53] rounded-full"></span>
            Germany kolbus three-side cutter
          </li>
          <li class="flex items-center gap-2">
            <span class="w-1.5 h-1.5 bg-[#1F5F53] rounded-full"></span>
            Germany Kolbus casemaker
          </li>
        </ul>

        <div class="w-full h-px bg-[#A8C5BD] mt-8"></div>
      </div>
    </section>
    <section class="mb-20">
      <div class="grid grid-cols-1 md:grid-cols-12 gap-12 items-center mb-12">
        <div class="md:col-span-7">
          <h2 class="text-2xl md:text-3xl font-bold text-[#1F5F53] mb-6">Quality & Compliance</h2>
          <div class="text-sm md:text-base leading-relaxed text-gray-800 space-y-4">
            <p>
              YIDELI is dedicated to sustainable growth and upholds the highest standards of quality and
              corporate responsibility. Our commitment is validated by key international certifications and
              audits recognized for global trade, including ISO 9001, ISO 14001, FSC, and social compliance
              audits such as BSCI, SEDEX, GSV, WCA, and SQP.
            </p>
          </div>
        </div>
        <div class="md:col-span-5 grid grid-cols-3 gap-3">
          <div class="aspect-[16/9] bg-[#367C6D] rounded-sm opacity-90"></div>
          <div class="aspect-[16/9] bg-[#367C6D] rounded-sm opacity-90"></div>
          <div class="aspect-[16/9] bg-[#367C6D] rounded-sm opacity-90"></div>
          <div class="aspect-[16/9] bg-[#367C6D] rounded-sm opacity-90"></div>
          <div class="aspect-[16/9] bg-[#367C6D] rounded-sm opacity-90"></div>
          <div class="aspect-[16/9] bg-[#367C6D] rounded-sm opacity-90"></div>
          <div class="aspect-[16/9] bg-[#367C6D] rounded-sm opacity-90"></div>
          <div class="aspect-[16/9] bg-[#367C6D] rounded-sm opacity-90"></div>
          <div class="aspect-[16/9] bg-[#367C6D] rounded-sm opacity-90"></div>
        </div>
      </div>

      <div class="mb-16">
        <div class="flex flex-col items-center">
          {{-- <div class="mb-6">
            <img src="https://placehold.co/120x40/F4F7F2/1F5F53?text=Slides" alt="Logo" class="h-8 object-contain">
          </div> --}}

          <div class="w-full overflow-hidden relative group">

            <div class="flex gap-8 w-max animate-marquee group-hover:pause">

              @for ($i = 0; $i < 3; $i++)
              @for ($j = 1; $j <= 8; $j++)
              <img src="{{ asset('images/slides/' . $j . '.jpg') }}"
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


    <section class="grid grid-cols-1 md:grid-cols-12 gap-12 items-center mb-4">
      <div class="md:col-span-6 order-2 md:order-1">
        <div class="flex flex-col gap-4">
          <div class="grid grid-cols-1 gap-4">
            <div class="aspect-[30/9] bg-[#367C6D] rounded-sm"></div>
            <div class="aspect-[30/9] bg-[#367C6D] rounded-sm"></div>
          </div>
        </div>
      </div>

      <div class="md:col-span-6 order-1 md:order-2">
        <h2 class="text-2xl md:text-3xl font-bold text-[#1F5F53] mb-6">Global Reach</h2>
        <div class="text-sm md:text-base leading-relaxed text-gray-800 space-y-4">
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


    <section class="grid grid-cols-2 md:grid-cols-4 gap-4 items-center mb-20">
      <div class="aspect-[3/4] bg-[#367C6D] rounded-sm"></div>
      <div class="aspect-[3/4] bg-[#367C6D] rounded-sm"></div>
      <div class="aspect-[3/4] bg-[#367C6D] rounded-sm"></div>
      <div class="aspect-[3/4] bg-[#367C6D] rounded-sm"></div>
    </section>

    <section class="grid grid-cols-1 md:grid-cols-12 gap-12 items-center mb-20">
      <div class="md:col-span-5">
        <h2 class="text-2xl md:text-3xl font-bold text-[#1F5F53] mb-6">R&D & Innovation</h2>
        <div class="text-sm md:text-base leading-relaxed text-gray-800 space-y-4">
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

      <div class="md:col-span-7 grid grid-cols-2 gap-4">
        <img src="{{ asset('images/office-1.jpg') }}" alt="R&D Team Member"
          class="w-full aspect-[3/4] object-cover rounded-sm shadow-sm">
        <img src="{{ asset('images/office-2.jpg') }}" alt="Office Environment"
          class="w-full aspect-[3/4] object-cover rounded-sm shadow-sm">
      </div>
    </section>


    <section class="mb-12">
      <div class="grid grid-cols-1 md:grid-cols-12 gap-12 items-center mb-12">
        <div class="md:col-span-5 order-2 md:order-1 grid grid-cols-3 gap-3">
          <div class="aspect-[16/9] bg-[#367C6D] rounded-sm opacity-90"></div>
          <div class="aspect-[16/9] bg-[#367C6D] rounded-sm opacity-90"></div>
          <div class="aspect-[16/9] bg-[#367C6D] rounded-sm opacity-90"></div>
          <div class="aspect-[16/9] bg-[#367C6D] rounded-sm opacity-90"></div>
          <div class="aspect-[16/9] bg-[#367C6D] rounded-sm opacity-90"></div>
          <div class="aspect-[16/9] bg-[#367C6D] rounded-sm opacity-90"></div>
          <div class="aspect-[16/9] bg-[#367C6D] rounded-sm opacity-90"></div>
          <div class="aspect-[16/9] bg-[#367C6D] rounded-sm opacity-90"></div>
          <div class="aspect-[16/9] bg-[#367C6D] rounded-sm opacity-90"></div>
        </div>

        <div class="md:col-span-7 order-1 md:order-2">
          <h2 class="text-2xl md:text-3xl font-bold text-[#1F5F53] mb-6">Your Strategic Partner</h2>
          <div class="text-sm md:text-base leading-relaxed text-gray-800 space-y-4">
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
    </section>

    <section class="grid grid-cols-1 md:grid-cols-1">
      <div class="aspect-[16/9] w-full bg-[#367C6D] rounded-sm shadow-sm">
      </div>
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