@extends('layouts.app')
@section('title', 'Contact Us | AR Engineering')

@section('content')
<section class="py-0 pb-2 bg-gray-50">
  <style>
    .animated-dark-border {
        border: 2px solid #9ca3af; /* Light black/Gray-400 */
        border-radius: 1rem; /* rounded-2xl */
        transition: all 0.5s ease-in-out;
    }
    .animated-dark-border:hover {
        border-color: #374151; /* Darker black/Gray-700 */
        box-shadow: 0 0 20px rgba(55, 65, 81, 0.4), 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        transform: translateY(-8px);
    }
    .btn-sky {
        background-color: #0369a1;
    }
    .btn-sky:hover {
        background-color: #075985;
    }
    .text-orange-custom {
        color: #ea580c;
    }
    .text-orange-light {
        color: #f97316;
    }
    .focus-border-orange:focus {
        border-color: #ea580c;
        outline: none;
    }
  </style>
  <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8 py-6 md:py-10">
    <h1 class="text-4xl md:text-5xl font-bold text-center text-gray-900 mb-12 uppercase tracking-wide">
      Get in Touch with <span class="text-indigo-600">AR Engineering</span>
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12 items-stretch">
      {{-- Contact Form --}}
      <div class="bg-white shadow-xl rounded-2xl animated-dark-border p-6 sm:p-8 lg:p-10 flex flex-col h-full">
        @if(session('success'))
          <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
          </div>
        @endif

        <div class="flex-grow">
          <h2 class="text-2xl font-bold mb-6 text-gray-900 uppercase tracking-wide">Send Us a Message</h2>
          <form method="POST" action="{{ route('contact.store') }}" class="space-y-5">
          @csrf

          <div>
            <label class="block font-bold mb-1 text-gray-800">Full Name</label>
            <input type="text" name="name" value="{{ old('name') }}" required
              class="w-full border-2 border-gray-400 rounded-xl p-3 focus-border-orange focus:ring-0 transition-all duration-300">
            @error('name') <small class="text-red-600 mt-1 block">{{ $message }}</small> @enderror
          </div>

          <div>
            <label class="block font-bold mb-1 text-gray-800">Email Address</label>
            <input type="email" name="email" value="{{ old('email') }}" required
              class="w-full border-2 border-gray-400 rounded-xl p-3 focus-border-orange focus:ring-0 transition-all duration-300">
            @error('email') <small class="text-red-600 mt-1 block">{{ $message }}</small> @enderror
          </div>

          <div>
            <label class="block font-bold mb-1 text-gray-800">Subject</label>
            <input type="text" name="subject" value="{{ old('subject') }}"
              class="w-full border-2 border-gray-400 rounded-xl p-3 focus-border-orange focus:ring-0 transition-all duration-300">
          </div>

          <div>
            <label class="block font-bold mb-1 text-gray-800">Your Message</label>
            <textarea name="message" rows="5" required
              class="w-full border-2 border-gray-400 rounded-xl p-3 focus-border-orange focus:ring-0 transition-all duration-300">{{ old('message') }}</textarea>
            @error('message') <small class="text-red-600 mt-1 block">{{ $message }}</small> @enderror
          </div>

          <button type="submit"
            class="w-full btn-sky text-white font-bold uppercase tracking-wider py-3 rounded-xl transition-all duration-300 shadow-md">
            Send Message
          </button>
          <p class="text-sm mt-2 font-medium italic text-gray-600">We will reply in 24 - 48 hours.</p>
        </form>
        </div>
      </div>

      @php
        use App\Models\SiteSetting;

        $facebook = SiteSetting::where('setting_key', 'facebook')->value('setting_value');
        $linkedin = SiteSetting::where('setting_key', 'linkedin')->value('setting_value');
        $x = SiteSetting::where('setting_key', 'x')->value('setting_value');

        $officeAddress = SiteSetting::where('setting_key', 'office_address')->value('setting_value');
        $phone = SiteSetting::where('setting_key', 'phone')->value('setting_value');
        $email = SiteSetting::where('setting_key', 'email')->value('setting_value');
        $mapUrl = SiteSetting::where('setting_key', 'map_url')->value('setting_value');
    @endphp

      {{-- Contact Information --}}
      <div class="bg-sky-50 text-gray-800 shadow-xl rounded-2xl animated-dark-border p-6 sm:p-8 lg:p-10 flex flex-col h-full">
        <div class="flex-grow">
          <h2 class="text-2xl font-bold mb-6 text-sky-900 uppercase tracking-wide">Contact Information</h2>

          <ul class="space-y-6 text-gray-700">
            <li class="flex items-start">
              <svg class="w-6 h-6 text-orange-light mr-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.243-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
              <span><strong class="text-sky-900">Office Address:</strong><br> {{ $officeAddress }}</span>
            </li>
            <li class="flex items-start">
              <svg class="w-6 h-6 text-orange-light mr-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
              <span><strong class="text-sky-900">Phone:</strong><br> {{ $phone }}</span>
            </li>
            <li class="flex items-start">
              <svg class="w-6 h-6 text-orange-light mr-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
              <span><strong class="text-sky-900">Email:</strong><br> {{ $email }}</span>
            </li>

            {{-- Social Media Icons --}}
          <div class="mt-8 border-t border-sky-200 pt-6">
            <h3 class="text-lg font-bold text-sky-900 mb-4 uppercase tracking-wide">Follow Us</h3>

            <div class="flex space-x-4">
                <a href="{{ $facebook }}" target="_blank" class="w-10 h-10 flex items-center justify-center rounded-sm text-white hover:opacity-80 transition-opacity shadow-md" style="background-color: #1877F2;">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg>
                </a>

                <a href="{{ $linkedin }}" target="_blank" class="w-10 h-10 flex items-center justify-center rounded-sm text-white hover:opacity-80 transition-opacity shadow-md" style="background-color: #0A66C2;">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                </a>

                <a href="{{ $x }}" target="_blank" class="w-10 h-10 flex items-center justify-center rounded-sm bg-black border border-gray-700 text-white hover:opacity-80 transition-opacity shadow-md">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                </a>
            </div>

          </div>

          </ul>
        </div>

        {{-- Map --}}
        <div class="mt-8 lg:mt-10">
          <h3 class="text-lg font-bold text-sky-900 mb-3 uppercase tracking-wide">Find Us on Map</h3>
          <div class="rounded-sm overflow-hidden shadow-sm border border-sky-200 h-64 md:h-72 lg:h-80">
            <iframe
              src="{{ $mapUrl ? $mapUrl : 'https://maps.google.com/maps?q=' . urlencode('AR Engineering, ' . $officeAddress) . '&t=&z=15&ie=UTF8&iwloc=&output=embed' }}"
              class="w-full h-full" style="border:0;" allowfullscreen="" loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
