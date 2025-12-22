@extends('index.layout')


@section('main')
  <div class="flex-grow py-12 lg:py-20" x-data="{
          selectedImage: 'https://images.unsplash.com/photo-1544816155-12df9643f363?q=80&w=1200&auto=format&fit=crop',
          paperType: 'Lined',
          inquiryModalOpen: false
      }">

    <div class="max-w-[96rem] mx-auto px-4 sm:px-6 lg:px-10 mb-8 text-sm text-gray-500">
      <a href="index.html" class="hover:text-red-600">Home</a> <span class="mx-2">/</span>
      <a href="products.html" class="hover:text-red-600">Notebooks</a> <span class="mx-2">/</span>
      <a href="products.html" class="hover:text-red-600">Hardcover</a> <span class="mx-2">/</span>
      <span class="text-gray-800 font-bold">The Classic Executive</span>
    </div>

    <div class="max-w-[96rem] mx-auto px-4 sm:px-6 lg:px-10">
      <div class="flex flex-col lg:flex-row gap-12 lg:gap-20">

        <div class="w-full lg:w-1/2">
          <div class="rounded-sm overflow-hidden shadow-md bg-gray-50 mb-4 aspect-[4/5]">
            <img :src="selectedImage" alt="Product Main Image" class="w-full h-full object-cover">
          </div>
          <div class="grid grid-cols-4 gap-4">
            <button
              @click="selectedImage = 'https://images.unsplash.com/photo-1544816155-12df9643f363?q=80&w=1200&auto=format&fit=crop'"
              class="rounded-sm overflow-hidden border-2 transition opacity-80 hover:opacity-100"
              :class="selectedImage.includes('15448') ? 'border-red-600' : 'border-transparent'">
              <img src="https://images.unsplash.com/photo-1544816155-12df9643f363?q=80&w=200&auto=format&fit=crop"
                class="w-full h-full object-cover">
            </button>
            <button
              @click="selectedImage = 'https://images.unsplash.com/photo-1589829085413-56de8ae18c73?q=80&w=1200&auto=format&fit=crop'"
              class="rounded-sm overflow-hidden border-2 transition opacity-80 hover:opacity-100"
              :class="selectedImage.includes('15898') ? 'border-red-600' : 'border-transparent'">
              <img src="https://images.unsplash.com/photo-1589829085413-56de8ae18c73?q=80&w=200&auto=format&fit=crop"
                class="w-full h-full object-cover">
            </button>
            <button
              @click="selectedImage = 'https://images.unsplash.com/photo-1517842645767-c639042777db?q=80&w=1200&auto=format&fit=crop'"
              class="rounded-sm overflow-hidden border-2 transition opacity-80 hover:opacity-100"
              :class="selectedImage.includes('15178') ? 'border-red-600' : 'border-transparent'">
              <img src="https://images.unsplash.com/photo-1517842645767-c639042777db?q=80&w=200&auto=format&fit=crop"
                class="w-full h-full object-cover">
            </button>
          </div>
        </div>

        <div class="w-full lg:w-1/2 flex flex-col">
          <span class="text-red-600 font-bold tracking-widest uppercase text-sm mb-2">Hardcover Series</span>
          <h1 class="text-3xl lg:text-5xl font-extrabold text-gray-900 mb-6">The Classic Executive</h1>

          <div class="text-lg text-gray-600 mb-8 leading-relaxed space-y-4">
            <p>Designed for the boardroom and beyond. Featuring our signature 100gsm fountain-pen friendly paper, bound
              in premium Italian leatherette. Lays perfectly flat for an uncompromised writing experience.</p>
            <p>Available for corporate customization including logo embossing and custom flyleaves.</p>
          </div>

          <div class="bg-gray-50 p-6 rounded-sm border border-gray-100 mb-8">
            <div class="grid grid-cols-2 gap-y-4 text-sm">
              <div>
                <span class="text-gray-500 block">Item Code</span>
                <span class="font-bold text-gray-900">EXEC-001</span>
              </div>
              <div>
                <span class="text-gray-500 block">Dimensions</span>
                <span class="font-bold text-gray-900">A5 (145 x 210 mm)</span>
              </div>
              <div>
                <span class="text-gray-500 block">MOQ (Custom)</span>
                <span class="font-bold text-gray-900">50 Units</span>
              </div>
              <div>
                <span class="text-gray-500 block">Availability</span>
                <span class="font-bold text-green-600">In Stock</span>
              </div>
            </div>
          </div>

          <div class="mb-8 space-y-6">
            <div>
              <h3 class="text-sm font-bold uppercase tracking-wider text-gray-900 mb-3">Available Colors</h3>
              <div class="flex space-x-3">
                <div class="w-8 h-8 rounded-full bg-gray-900 ring-2 ring-offset-2 ring-gray-900 cursor-help"
                  title="Midnight Black"></div>
                <div class="w-8 h-8 rounded-full bg-blue-900 cursor-help" title="Navy Blue"></div>
                <div class="w-8 h-8 rounded-full bg-red-800 cursor-help" title="Burgundy"></div>
              </div>
            </div>

            <div>
              <h3 class="text-sm font-bold uppercase tracking-wider text-gray-900 mb-3">Paper Layouts</h3>
              <div class="flex flex-wrap gap-3 text-sm">
                <span class="px-4 py-1 border border-gray-300 rounded-full text-gray-600">Lined</span>
                <span class="px-4 py-1 border border-gray-300 rounded-full text-gray-600">Dot Grid</span>
                <span class="px-4 py-1 border border-gray-300 rounded-full text-gray-600">Blank</span>
              </div>
            </div>
          </div>

          <div class="flex flex-col sm:flex-row gap-4 mb-10 pb-10 border-b border-gray-100 mt-auto">
            <button @click="inquiryModalOpen = true"
              class="flex-grow bg-red-600 text-white text-lg font-bold px-10 py-4 rounded-full hover:bg-red-700 transition shadow-lg uppercase tracking-wider flex items-center justify-center gap-2">
              <i class="ri-mail-send-line"></i> Inquire About This Product
            </button>
          </div>

          <p class="text-sm text-gray-500 italic">
            * For bulk pricing and customization options, please contact our sales team.
          </p>
        </div>
      </div>

      <div class="mt-20" x-data="{ tab: 'description' }">
        <div class="flex border-b border-gray-200 mb-8">
          <button @click="tab = 'description'" class="pb-4 px-6 text-lg font-bold border-b-2 transition"
            :class="tab === 'description' ? 'border-red-600 text-red-600' : 'border-transparent text-gray-500 hover:text-gray-700'">Description</button>
          <button @click="tab = 'specs'" class="pb-4 px-6 text-lg font-bold border-b-2 transition"
            :class="tab === 'specs' ? 'border-red-600 text-red-600' : 'border-transparent text-gray-500 hover:text-gray-700'">Technical
            Specs</button>
        </div>

        <div x-show="tab === 'description'" class="max-w-4xl text-gray-700 leading-loose space-y-6">
          <p>The Classic Executive is more than just a notebook; it is a testament to the power of putting pen to paper.
            Meticulously crafted to meet the needs of professionals, writers, and thinkers, it combines durability with
            elegance.</p>
          <p>Our proprietary 100gsm paper ensures that your thoughts flow smoothly without the interruption of ink
            bleed. The binding is thread-sewn, allowing the notebook to lie completely flat on your desk, giving you
            full use of the page spread.</p>
        </div>

        <div x-show="tab === 'specs'" class="max-w-4xl text-gray-700" x-cloak>
          <table class="w-full text-left border-collapse border border-gray-200">
            <tbody>
              <tr class="border-b border-gray-100">
                <th class="py-3 px-4 bg-gray-50 w-1/3">Cover Material</th>
                <td class="py-3 px-4">Premium Vegan Leather (PU)</td>
              </tr>
              <tr class="border-b border-gray-100">
                <th class="py-3 px-4 bg-gray-50">Paper Weight</th>
                <td class="py-3 px-4">100 gsm Acid-Free</td>
              </tr>
              <tr class="border-b border-gray-100">
                <th class="py-3 px-4 bg-gray-50">Page Count</th>
                <td class="py-3 px-4">192 Pages (96 Sheets)</td>
              </tr>
              <tr class="border-b border-gray-100">
                <th class="py-3 px-4 bg-gray-50">Binding</th>
                <td class="py-3 px-4">Thread-Sewn Lay-Flat</td>
              </tr>
              <tr class="border-b border-gray-100">
                <th class="py-3 px-4 bg-gray-50">Features</th>
                <td class="py-3 px-4">Back Pocket, Ribbon Marker, Elastic Band</td>
              </tr>
              <tr>
                <th class="py-3 px-4 bg-gray-50">Origin</th>
                <td class="py-3 px-4">Designed in Shanghai, Assembled by Hand</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="mt-24 mb-12">
        <h2 class="text-3xl font-bold text-gray-900 mb-10 text-center">Similar Products</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <div class="group text-center">
            <a href="#" class="block">
              <div class="relative overflow-hidden rounded-sm mb-4 aspect-[4/5] mx-auto">
                <img src="https://images.unsplash.com/photo-1544816155-12df9643f363?q=80&w=800&auto=format&fit=crop"
                  class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
              </div>
              <h3 class="text-lg font-bold text-gray-900 group-hover:text-red-600 transition">Executive Slim</h3>
              <p class="text-gray-500 text-sm">Pocket Size</p>
            </a>
          </div>
          <div class="group text-center">
            <a href="#" class="block">
              <div class="relative overflow-hidden rounded-sm mb-4 aspect-[4/5] mx-auto">
                <img src="https://images.unsplash.com/photo-1517842645767-c639042777db?q=80&w=800&auto=format&fit=crop"
                  class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
              </div>
              <h3 class="text-lg font-bold text-gray-900 group-hover:text-red-600 transition">Luxury Fountain Pen</h3>
              <p class="text-gray-500 text-sm">Brass & Gold</p>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div x-show="inquiryModalOpen" class="fixed inset-0 z-[100] overflow-y-auto" aria-labelledby="modal-title"
      role="dialog" aria-modal="true" x-cloak>
      <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div x-show="inquiryModalOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
          x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
          x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
          class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity" aria-hidden="true"
          @click="inquiryModalOpen = false"></div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <div x-show="inquiryModalOpen" x-transition:enter="ease-out duration-300"
          x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200"
          x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
          x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full">
          <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
              <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                <h3 class="text-2xl leading-6 font-bold text-gray-900" id="modal-title">Product Inquiry</h3>
                <div class="mt-2">
                  <p class="text-sm text-gray-500 mb-4">
                    Interested in <span class="font-bold text-gray-900">The Classic Executive (EXEC-001)</span>? Leave
                    your details and we'll get back to you shortly.
                  </p>
                  <form class="space-y-4">
                    <div>
                      <label class="block text-sm font-bold text-gray-700">Name</label>
                      <input type="text"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm border p-2 focus:border-red-600 focus:ring-red-600">
                    </div>
                    <div>
                      <label class="block text-sm font-bold text-gray-700">Email</label>
                      <input type="email"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm border p-2 focus:border-red-600 focus:ring-red-600">
                    </div>
                    <div>
                      <label class="block text-sm font-bold text-gray-700">Message</label>
                      <textarea rows="3"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm border p-2 focus:border-red-600 focus:ring-red-600"></textarea>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <button type="button"
              class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm"
              @click="inquiryModalOpen = false">
              Send Inquiry
            </button>
            <button type="button"
              class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
              @click="inquiryModalOpen = false">
              Cancel
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection