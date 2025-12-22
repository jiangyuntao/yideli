@extends('index.layout')

@section('main')
  <div class="relative bg-gray-900 h-[300px] lg:h-[400px] flex items-center justify-center overflow-hidden">
    <img src="https://images.unsplash.com/photo-1517842645767-c639042777db?q=80&w=2000&auto=format&fit=crop"
      class="absolute inset-0 w-full h-full object-cover opacity-40">
    <div class="relative z-10 text-center px-4">
      <h1 class="text-4xl sm:text-5xl lg:text-6xl text-white font-bold mb-4">Start a Conversation</h1>
      <p class="text-gray-200 text-lg sm:text-xl max-w-2xl mx-auto">
        Whether you are looking for bespoke corporate gifts or bulk distribution, we are here to help you
        make a lasting impression.
      </p>
    </div>
  </div>

  <div class="max-w-[96rem] mx-auto px-4 sm:px-6 lg:px-10 py-16 lg:py-24">
    <div class="flex flex-col lg:flex-row gap-16 lg:gap-24">

      <div class="w-full lg:w-5/12 space-y-12">

        <div>
          <span class="text-red-600 font-bold uppercase tracking-widest text-sm mb-2 block">Get in
            Touch</span>
          <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6">Headquarters</h2>
          <p class="text-gray-600 leading-relaxed text-lg mb-8">
            Yideli Stationery Co., Ltd.<br>
            No. 88 Creative Park Road, Songjiang District<br>
            Shanghai, 201600, China
          </p>
          <div class="space-y-4 text-lg">
            <p class="flex items-center space-x-3 text-gray-700">
              <i class="ri-mail-send-line text-red-600 text-xl"></i>
              <a href="mailto:inquiry@yideli.com" class="hover:text-red-600 transition">inquiry@yideli.com</a>
            </p>
            <p class="flex items-center space-x-3 text-gray-700">
              <i class="ri-phone-line text-red-600 text-xl"></i>
              <span>+86 21 1234 5678</span>
            </p>
            <p class="flex items-center space-x-3 text-gray-700">
              <i class="ri-time-line text-red-600 text-xl"></i>
              <span>Mon - Fri, 9:00 AM - 6:00 PM (GMT+8)</span>
            </p>
          </div>
        </div>

        <div class="rounded-sm overflow-hidden shadow-lg h-64 lg:h-80 relative">
          <img src="https://images.unsplash.com/photo-1497215728101-856f4ea42174?q=80&w=800&auto=format&fit=crop"
            class="w-full h-full object-cover grayscale hover:grayscale-0 transition duration-700">
          <div class="absolute inset-0 border-[1px] border-white/20 m-4 pointer-events-none"></div>
        </div>
      </div>

      <div class="w-full lg:w-7/12" id="enquiry-form" x-data="contactForm()">

        <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-2">Send an Inquiry</h2>
        <p class="text-gray-500 mb-10">Fill out the form below and our team will get back to you within 24
          hours.</p>

        <div x-show="submitted" x-transition
          class="bg-green-50 border border-green-200 text-green-800 px-6 py-8 rounded-sm text-center mb-8" x-cloak>
          <i class="ri-checkbox-circle-line text-4xl mb-2 inline-block"></i>
          <h3 class="text-xl font-bold mb-2">Message Sent Successfully!</h3>
          <p>Thank you for contacting Yideli. We have received your inquiry regarding "<span
              x-text="formData.subject"></span>" and will be in touch shortly.</p>
          <button @click="resetForm()" class="mt-4 text-sm text-green-700 font-bold underline hover:text-green-900">Send
            another
            message</button>
        </div>

        <form @submit.prevent="submitForm" x-show="!submitted" x-transition class="space-y-8">

          <input type="hidden" name="meta_data" value='{"source": "Contact Page", "campaign": "Direct"}'>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="group">
              <label for="name" class="block text-sm font-bold text-gray-900 mb-1 uppercase tracking-wider">Name
                <span class="text-red-600">*</span></label>
              <input type="text" id="name" name="name" x-model="formData.name" required
                class="w-full input-line py-3 text-lg font-medium placeholder-gray-300" placeholder="John Doe">
            </div>

            <div class="group">
              <label for="email" class="block text-sm font-bold text-gray-900 mb-1 uppercase tracking-wider">Email
                <span class="text-red-600">*</span></label>
              <input type="email" id="email" name="email" x-model="formData.email" required
                class="w-full input-line py-3 text-lg font-medium placeholder-gray-300" placeholder="john@company.com">
            </div>
          </div>

          <div class="group">
            <label for="subject"
              class="block text-sm font-bold text-gray-900 mb-1 uppercase tracking-wider">Subject</label>
            <input type="text" id="subject" name="subject" x-model="formData.subject"
              class="w-full input-line py-3 text-lg font-medium placeholder-gray-300"
              placeholder="e.g. Bulk Order for 2025 Planners">
          </div>

          <div class="group">
            <label for="message" class="block text-sm font-bold text-gray-900 mb-1 uppercase tracking-wider">Message
              <span class="text-red-600">*</span></label>
            <textarea id="message" name="message" rows="5" x-model="formData.message" required
              class="w-full input-line py-3 text-lg font-medium placeholder-gray-300 resize-none"
              placeholder="Tell us about your project requirements..."></textarea>
          </div>

          <div class="pt-4">
            <button type="submit"
              class="bg-red-600 text-white text-base font-bold px-12 py-4 rounded-full shadow-xl hover:bg-red-700 transition duration-300 uppercase tracking-wider flex items-center justify-center gap-2 group disabled:opacity-70 disabled:cursor-not-allowed"
              :disabled="loading">
              <span x-show="!loading">Send Message</span>
              <span x-show="!loading" class="group-hover:translate-x-1 transition-transform"><i
                  class="ri-arrow-right-line"></i></span>

              <span x-show="loading" class="flex items-center gap-2">
                <i class="ri-loader-4-line animate-spin text-xl"></i> Sending...
              </span>
            </button>
          </div>
        </form>

      </div>
    </div>
  </div>

  <div class="bg-gray-50 py-16 border-t border-gray-100">
    <div class="max-w-4xl mx-auto px-4 text-center">
      <h3 class="text-2xl font-bold text-gray-900 mb-4">Looking for quick answers?</h3>
      <p class="text-gray-600 mb-8">Check our support section for shipping details, return policies, and
        product care instructions.</p>
      <a href="support.html"
        class="inline-block border-b-2 border-red-600 pb-1 text-red-600 font-bold hover:text-red-800 hover:border-red-800 transition">Visit
        Support Center</a>
    </div>
  </div>
@endsection

@section('script')
  <script>
    function contactForm() {
      return {
        formData: {
          name: '',
          email: '',
          subject: '',
          message: ''
        },
        loading: false,
        submitted: false,

        submitForm() {
          this.loading = true;

          // Simulate network request
          setTimeout(() => {
            this.loading = false;
            this.submitted = true;
            console.log('Form Submitted:', this.formData);
            // Here you would typically use fetch() to post to your backend route
          }, 1500);
        },

        resetForm() {
          this.formData = { name: '', email: '', subject: '', message: '' };
          this.submitted = false;
        }
      }
    }
  </script>
@endsection