@extends('layouts.app')
@section('title', 'Contact Us | AR Engineering')

@section('content')
<section class="py-0 pb-2 bg-gray-50">
  <div class="container mx-auto px-6">
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

      {{-- Contact Information --}}
      <div class="bg-white shadow-lg rounded-2xl p-8 flex flex-col justify-between">
        <div>
          <h2 class="text-2xl font-semibold mb-6 text-gray-800">Contact Information</h2>

          <ul class="space-y-4 text-gray-700">
            <li class="flex items-start">
              <span class="text-indigo-600 mr-3 text-xl">📍</span>
              <span><strong>Office Address:</strong><br> House #12, Road #4, Dhanmondi, Dhaka, Bangladesh</span>
            </li>
            <li class="flex items-start">
              <span class="text-indigo-600 mr-3 text-xl">📞</span>
              <span><strong>Phone:</strong><br> +880 1XXX-XXXXXX</span>
            </li>
            <li class="flex items-start">
              <span class="text-indigo-600 mr-3 text-xl">📧</span>
              <span><strong>Email:</strong><br> info@arengineeringbd.com</span>
            </li>
            {{-- <li class="flex items-start">
              <span class="text-indigo-600 mr-3 text-xl">🕒</span>
              <span><strong>Working Hours:</strong><br> Sat – Thu: 9:00 AM – 6:00 PM</span>
            </li> --}}
          </ul>
        </div>

        {{-- Map --}}
        <div class="mt-8">
          <h3 class="text-lg font-semibold text-gray-800 mb-3">Find Us on Map</h3>
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.507823120632!2d90.41054928658144!3d23.764924387079066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c70032be4289%3A0x9711927cb0926717!2sAR%20Engineering!5e0!3m2!1sbn!2sbd!4v1759841868257!5m2!1sbn!2sbd"
            width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
            {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.507823120632!2d90.41054928658144!3d23.764924387079066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c70032be4289%3A0x9711927cb0926717!2sAR%20Engineering!5e0!3m2!1sbn!2sbd!4v1759841868257!5m2!1sbn!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
