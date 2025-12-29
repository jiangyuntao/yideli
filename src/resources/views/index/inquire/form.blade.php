@extends('index.layout')

@section('main')
<div class="bg-yideli-base py-20 border-b border-yideli-line">
  <div class="max-w-[1200px] mx-auto px-6 lg:px-12 text-center">
    <span class="text-xs font-bold tracking-[0.2em] uppercase text-yideli-dark mb-4 block">Get In Touch</span>
    <h1 class="text-4xl lg:text-5xl font-serif text-yideli-dark mb-6">Start Your Project With Us</h1>
    <p class="text-gray-600 max-w-2xl mx-auto font-light text-lg">
      Whether you have a question about products, pricing, or OEM customization, our team is ready to answer all your questions.
    </p>
  </div>
</div>

<section class="max-w-[1400px] mx-auto px-6 lg:px-12 py-20">
  <div class="grid lg:grid-cols-12 gap-16 lg:gap-24">

    <div class="lg:col-span-5 space-y-12">

      <div>
        <h3 class="font-serif text-2xl text-yideli-dark mb-6">Headquarters</h3>
        <div class="space-y-6 text-gray-600 font-light">
          <div class="flex gap-4">
            <div class="w-6 h-6 flex-shrink-0 text-yideli-dark">
              <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
            </div>
            <p>
              No. 123, Industrial Zone, <br>
              Taizhou City, Zhejiang Province,<br>
              China, 318000
            </p>
          </div>
          <div class="flex gap-4">
            <div class="w-6 h-6 flex-shrink-0 text-yideli-dark">
              <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
              </svg>
            </div>
            <div>
              <p>+86 123 4567 8900 (Office)</p>
              <p class="text-sm text-gray-400 mt-1">Mon - Fri, 8:30 - 17:30 (GMT+8)</p>
            </div>
          </div>
          <div class="flex gap-4">
            <div class="w-6 h-6 flex-shrink-0 text-yideli-dark">
              <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
              </svg>
            </div>
            <p class="font-medium text-yideli-dark">sales@yideli.com</p>
          </div>
        </div>
      </div>

      <div class="aspect-video bg-gray-100 relative overflow-hidden group">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d111099.99120610344!2d121.3533866679545!3d28.66567154945785!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x344f6f8745555555%3A0x1234567890abcdef!2sTaizhou%2C%20Zhejiang%2C%20China!5e0!3m2!1sen!2sus!4v1600000000000!5m2!1sen!2sus"
          width="100%" height="100%" style="border:0; filter: grayscale(1) contrast(1.2) opacity(0.8);" allowfullscreen="" loading="lazy">
        </iframe>
        <a href="#" class="absolute inset-0 flex items-center justify-center bg-yideli-dark/0 group-hover:bg-yideli-dark/10 transition">
          <span class="bg-white text-yideli-dark px-4 py-2 text-xs font-bold uppercase tracking-widest shadow-lg opacity-0 group-hover:opacity-100 transition transform translate-y-2 group-hover:translate-y-0">
            View on Google Maps
          </span>
        </a>
      </div>

      <div>
        <h4 class="font-serif text-lg text-yideli-dark mb-4">Follow Us</h4>
        <div class="flex gap-4">
          <a href="#" class="w-10 h-10 border border-gray-200 flex items-center justify-center text-gray-500 hover:bg-yideli-dark hover:text-white hover:border-yideli-dark transition rounded-full">
            <span class="sr-only">LinkedIn</span>
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
              <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
            </svg>
          </a>
          <a href="#" class="w-10 h-10 border border-gray-200 flex items-center justify-center text-gray-500 hover:bg-yideli-dark hover:text-white hover:border-yideli-dark transition rounded-full">
            <span class="sr-only">Instagram</span>
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
            </svg>
          </a>
        </div>
      </div>
    </div>

    <div class="lg:col-span-7 bg-gray-50 p-8 lg:p-12 border border-gray-100 rounded-sm">
      <h3 class="font-serif text-2xl text-yideli-dark mb-2">Send an Inquiry</h3>
      <p class="text-gray-500 font-light mb-8 text-sm">Fields marked with * are required.</p>

      <form action="#" method="POST" class="space-y-8">
        <div class="grid md:grid-cols-2 gap-8">
          <div class="relative">
            <input type="text" id="name" name="name" placeholder=" " required
              class="input-field block w-full px-0 py-2 bg-transparent border-b border-gray-300 focus:outline-none focus:border-yideli-dark transition text-gray-900 placeholder-transparent">
            <label for="name" class="absolute left-0 top-2 text-gray-400 text-sm transition-all duration-300 origin-left cursor-text">Full Name *</label>
          </div>

          <div class="relative">
            <input type="text" id="company" name="company" placeholder=" "
              class="input-field block w-full px-0 py-2 bg-transparent border-b border-gray-300 focus:outline-none focus:border-yideli-dark transition text-gray-900 placeholder-transparent">
            <label for="company" class="absolute left-0 top-2 text-gray-400 text-sm transition-all duration-300 origin-left cursor-text">Company Name</label>
          </div>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
          <div class="relative">
            <input type="email" id="email" name="email" placeholder=" " required
              class="input-field block w-full px-0 py-2 bg-transparent border-b border-gray-300 focus:outline-none focus:border-yideli-dark transition text-gray-900 placeholder-transparent">
            <label for="email" class="absolute left-0 top-2 text-gray-400 text-sm transition-all duration-300 origin-left cursor-text">Business Email *</label>
          </div>

          <div class="relative">
            <input type="tel" id="phone" name="phone" placeholder=" "
              class="input-field block w-full px-0 py-2 bg-transparent border-b border-gray-300 focus:outline-none focus:border-yideli-dark transition text-gray-900 placeholder-transparent">
            <label for="phone" class="absolute left-0 top-2 text-gray-400 text-sm transition-all duration-300 origin-left cursor-text">Phone Number</label>
          </div>
        </div>

        <div>
          <label class="block text-sm text-gray-400 mb-3">I am interested in:</label>
          <div class="flex flex-wrap gap-4">
            <label class="inline-flex items-center cursor-pointer">
              <input type="checkbox" name="interest" value="notebooks" class="w-4 h-4 text-yideli-dark border-gray-300 rounded focus:ring-yideli-dark">
              <span class="ml-2 text-sm text-gray-600">Notebooks</span>
            </label>
            <label class="inline-flex items-center cursor-pointer">
              <input type="checkbox" name="interest" value="pens" class="w-4 h-4 text-yideli-dark border-gray-300 rounded focus:ring-yideli-dark">
              <span class="ml-2 text-sm text-gray-600">Pens</span>
            </label>
            <label class="inline-flex items-center cursor-pointer">
              <input type="checkbox" name="interest" value="oem" class="w-4 h-4 text-yideli-dark border-gray-300 rounded focus:ring-yideli-dark">
              <span class="ml-2 text-sm text-gray-600">OEM/ODM Service</span>
            </label>
            <label class="inline-flex items-center cursor-pointer">
              <input type="checkbox" name="interest" value="distributorship" class="w-4 h-4 text-yideli-dark border-gray-300 rounded focus:ring-yideli-dark">
              <span class="ml-2 text-sm text-gray-600">Distributorship</span>
            </label>
          </div>
        </div>

        <div class="relative mt-8">
          <textarea id="message" name="message" rows="4" placeholder=" " required
            class="input-field block w-full px-0 py-2 bg-transparent border-b border-gray-300 focus:outline-none focus:border-yideli-dark transition text-gray-900 placeholder-transparent resize-none"></textarea>
          <label for="message" class="absolute left-0 top-2 text-gray-400 text-sm transition-all duration-300 origin-left cursor-text">Message / Specific Requirements *</label>
        </div>

        <div class="flex items-center justify-between pt-4">
          <p class="text-xs text-gray-400 max-w-xs">By clicking submit, you agree to our Privacy Policy and allow Yideli to contact you regarding your inquiry.</p>
          <button type="submit" class="bg-yideli-dark text-white px-10 py-4 text-sm font-bold uppercase tracking-widest hover:bg-yideli-hover transition shadow-lg shadow-yideli-dark/20">
            Submit Inquiry
          </button>
        </div>
      </form>
    </div>

  </div>
</section>

<section class="bg-yideli-base border-t border-yideli-line py-20">
  <div class="max-w-[1000px] mx-auto px-6 lg:px-12">
    <div class="text-center mb-16">
      <h2 class="text-3xl font-serif text-yideli-dark mb-4">Frequently Asked Questions</h2>
      <p class="text-gray-500 font-light">Common questions from our global partners.</p>
    </div>

    <div class="space-y-4" x-data="{ active: 1 }">
      <div class="bg-white border border-yideli-line">
        <button @click="active = (active === 1 ? null : 1)" class="w-full flex justify-between items-center p-6 text-left">
          <span class="font-medium text-yideli-dark">What is your Minimum Order Quantity (MOQ)?</span>
          <span class="text-xl" x-text="active === 1 ? '−' : '+'"></span>
        </button>
        <div x-show="active === 1" x-collapse>
          <div class="px-6 pb-6 text-gray-600 font-light text-sm leading-relaxed">
            For standard products in stock, the MOQ is typically 500 units. For OEM customization (logo/color), the MOQ starts from 3,000 units depending on the complexity of the design.
          </div>
        </div>
      </div>

      <div class="bg-white border border-yideli-line">
        <button @click="active = (active === 2 ? null : 2)" class="w-full flex justify-between items-center p-6 text-left">
          <span class="font-medium text-yideli-dark">How long is the production lead time?</span>
          <span class="text-xl" x-text="active === 2 ? '−' : '+'"></span>
        </button>
        <div x-show="active === 2" x-collapse>
          <div class="px-6 pb-6 text-gray-600 font-light text-sm leading-relaxed">
            Sample production takes 5-7 days. Mass production usually takes 30-45 days after the deposit is received and the pre-production sample is approved.
          </div>
        </div>
      </div>

      <div class="bg-white border border-yideli-line">
        <button @click="active = (active === 3 ? null : 3)" class="w-full flex justify-between items-center p-6 text-left">
          <span class="font-medium text-yideli-dark">Do you provide samples?</span>
          <span class="text-xl" x-text="active === 3 ? '−' : '+'"></span>
        </button>
        <div x-show="active === 3" x-collapse>
          <div class="px-6 pb-6 text-gray-600 font-light text-sm leading-relaxed">
            Yes, we provide free samples for existing products (freight collect). For custom samples with your design, a sampling fee will be charged, which is refundable upon placing a bulk order.
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection