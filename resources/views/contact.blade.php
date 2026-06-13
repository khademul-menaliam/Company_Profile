@extends('layouts.app')
@section('title', 'Contact Us | AR Engineering')

@section('content')
<section class="py-0 pb-2 bg-gray-50">
  <div class="container mx-auto px-6 my-3">
    <h1 class="text-4xl md:text-5xl font-bold text-center text-gray-800 mb-12">
      Get in Touch with <span class="text-indigo-600">AR Engineering</span>
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
      {{-- Contact Form --}}
      <div class="bg-white shadow-lg rounded-2xl p-8 hover:shadow-2xl transition duration-300">
        @if(session('success'))
          <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
          </div>
        @endif

        <h2 class="text-2xl font-semibold mb-6 text-gray-800">Send Us a Message</h2>
        <form method="POST" action="{{ route('contact.store') }}" class="space-y-5">
          @csrf

          <div>
            <label class="block font-semibold mb-1 text-gray-700">Full Name</label>
            <input type="text" name="name" value="{{ old('name') }}" required
              class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">
            @error('name') <small class="text-red-600">{{ $message }}</small> @enderror
          </div>

          <div>
            <label class="block font-semibold mb-1 text-gray-700">Email Address</label>
            <input type="email" name="email" value="{{ old('email') }}" required
              class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">
            @error('email') <small class="text-red-600">{{ $message }}</small> @enderror
          </div>

          <div>
            <label class="block font-semibold mb-1 text-gray-700">Subject</label>
            <input type="text" name="subject" value="{{ old('subject') }}"
              class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">
          </div>

          <div>
            <label class="block font-semibold mb-1 text-gray-700">Your Message</label>
            <textarea name="message" rows="5" required
              class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">{{ old('message') }}</textarea>
            @error('message') <small class="text-red-600">{{ $message }}</small> @enderror
          </div>

          <button type="submit"
            class="w-full bg-indigo-600 text-white font-semibold py-3 rounded-lg hover:bg-indigo-700 transform hover:-translate-y-1 transition-all duration-300">
            Send Message
          </button>
          <p class="text-sm mt-2 font-medium italic">We will reply in 24 - 48 hours.</p>
        </form>
      </div>

      @php
        use App\Models\SiteSetting;

        $facebook = SiteSetting::where('setting_key', 'facebook')->value('setting_value');
        $linkedin = SiteSetting::where('setting_key', 'linkedin')->value('setting_value');
        $x = SiteSetting::where('setting_key', 'x')->value('setting_value');

        $officeAddress = SiteSetting::where('setting_key', 'office_address')->value('setting_value');
        $phone = SiteSetting::where('setting_key', 'phone')->value('setting_value');
        $email = SiteSetting::where('setting_key', 'email')->value('setting_value');
    @endphp

      {{-- Contact Information --}}
      <div class="bg-white shadow-lg rounded-2xl p-8 flex flex-col justify-between">
        <div>
          <h2 class="text-2xl font-semibold mb-6 text-gray-800">Contact Information</h2>

          <ul class="space-y-4 text-gray-700">
            <li class="flex items-start">
              <span class="text-indigo-600 mr-3 text-xl">📍</span>
              <span><strong>Office Address:</strong><br> {{ $officeAddress }}</span>
            </li>
            <li class="flex items-start">
              <span class="text-indigo-600 mr-3 text-xl">📞</span>
              <span><strong>Phone:</strong><br> {{ $phone }}</span>
            </li>
            <li class="flex items-start">
              <span class="text-indigo-600 mr-3 text-xl">📧</span>
              <span><strong>Email:</strong><br> {{ $email }}</span>
            </li>

            {{-- Social Media Icons --}}
          <div class="mt-4">
            <h3 class="text-lg font-semibold text-gray-800 mb-2">Follow Us</h3>

            <div class="flex space-x-4">
                <a href="{{ $facebook }}" target="_blank" class="w-8 h-8 flex items-center justify-center rounded-full bg-indigo-100 text-indigo-600 hover:bg-indigo-600 hover:text-white transition-all duration-300">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg>
                </a>

                <a href="{{ $linkedin }}" target="_blank" class="w-8 h-8 flex items-center justify-center rounded-full bg-indigo-100 text-indigo-600 hover:bg-indigo-600 hover:text-white transition-all duration-300">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                </a>

                <a href="{{ $x }}" target="_blank" class="w-8 h-8 flex items-center justify-center rounded-full bg-indigo-100 text-indigo-600 hover:bg-indigo-600 hover:text-white transition-all duration-300">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                </a>
            </div>

          </div>

          </ul>
        </div>

        {{-- Map --}}
        <div class="mt-4">
          <h3 class="text-lg font-semibold text-gray-800 mb-3">Find Us on Map</h3>
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.507823120632!2d90.41054928658144!3d23.764924387079066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c70032be4289%3A0x9711927cb0926717!2sAR%20Engineering!5e0!3m2!1sbn!2sbd!4v1759841868257!5m2!1sbn!2sbd"
            width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>

        </div>
      </div>
    </div>
  </div>
</section>
@endsection
