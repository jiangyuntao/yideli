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

<section class="max-w-[1600px] mx-auto px-6 lg:px-12 py-20">
  <div class="grid lg:grid-cols-12 gap-16 lg:gap-24">

    <div class="lg:col-span-5 space-y-12">

      <div>
        <h3 class="font-serif text-2xl text-yideli-dark mb-6">Headquarters</h3>
        <div class="space-y-6 text-gray-600 font-light">
          <div class="flex gap-4">
            <div class="w-6 h-6 flex-shrink-0 text-yideli-dark">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin-house-icon lucide-map-pin-house"><path d="M15 22a1 1 0 0 1-1-1v-4a1 1 0 0 1 .445-.832l3-2a1 1 0 0 1 1.11 0l3 2A1 1 0 0 1 22 17v4a1 1 0 0 1-1 1z"/><path d="M18 10a8 8 0 0 0-16 0c0 4.993 5.539 10.193 7.399 11.799a1 1 0 0 0 .601.2"/><path d="M18 22v-3"/><circle cx="10" cy="10" r="3"/></svg>
            </div>
            <p>{{ $settings->contact_address }}</p>
          </div>
          <div class="flex gap-4">
            <div class="w-6 h-6 flex-shrink-0 text-yideli-dark">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone-icon lucide-phone"><path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"/></svg>
            </div>
            <div>
              <p>{{ $settings->contact_tel }}</p>
            </div>
          </div>
          <div class="flex gap-4">
            <div class="w-6 h-6 flex-shrink-0 text-yideli-dark">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-smartphone-icon lucide-smartphone"><rect width="14" height="20" x="5" y="2" rx="2" ry="2"/><path d="M12 18h.01"/></svg>
            </div>
            <p>{{ $settings->contact_phone }}</p>
          </div>
          <div class="flex gap-4">
            <div class="w-6 h-6 flex-shrink-0 text-yideli-dark">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail-icon lucide-mail"><path d="m22 7-8.991 5.727a2 2 0 0 1-2.009 0L2 7"/><rect x="2" y="4" width="20" height="16" rx="2"/></svg>
            </div>
            <p>{{ $settings->contact_email }}</p>
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
          <a href="https://linkedin.com/in/{{ $settings->contact_linkedin }}" target="_blank" rel="noopener noreferrer" class="w-10 h-10 border border-gray-200 flex items-center justify-center text-gray-500 hover:bg-yideli-dark hover:text-white hover:border-yideli-dark transition rounded-full">
            <span class="sr-only">LinkedIn</span>
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
              <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
            </svg>
          </a>

          <a href="https://wa.me/{{ $settings->contact_whatsapp }}" target="_blank" rel="noopener noreferrer" class="w-10 h-10 border border-gray-200 flex items-center justify-center text-gray-500 hover:bg-yideli-dark hover:text-white hover:border-yideli-dark transition rounded-full">
            <span class="sr-only">WhatsApp</span>
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
              <path d="M16.75 0h-9.5C5.784 0 5 0.784 5 1.75v20.5C5 23.216 5.784 24 6.25 24h9.5c0.466 0 0.854-0.343 0.936-0.797l2.5-12.5c0.045-0.226 0.014-0.458-0.09-0.658s-0.295-0.358-0.522-0.436l-12.5-2.5C8.343 9.104 8 8.716 8 8.25v-9.5C8 0.784 8.784 0 9.75 0zM17.604 10.5 15.5 11.004 7 9.5v-7h7.5l1.504 2.104 1.1-0.22C17.604 10.5 17.604 10.5 17.604 10.5zM7.5 8.5h6.773l-0.22 1.1-6.553 1.311L7.5 8.5z M18.5 11.979 17.021 18.5h-7.542l1.937-1.937c0.781-0.781 2.047-0.781 2.828 0s0.781 2.047 0 2.828l-1.937 1.937v0.042h5.042L18.5 11.979z M13.5 19.5c-0.552 0-1-0.448-1-1s0.448-1 1-1 1 0.448 1 1-0.448 1-1 1z" />
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