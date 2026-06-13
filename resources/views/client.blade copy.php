@extends('layouts.app')
@section('title', 'Our Clients & Partners | AR Engineering')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-indigo-600 to-blue-500 text-white py-8 text-center overflow-hidden">
  <div class="container mx-auto px-6">
    <h1 class="text-4xl md:text-5xl font-extrabold mb-4">Our Valuable Clients</h1>
    <p class="text-lg md:text-xl max-w-2xl mx-auto">
      We are proud to collaborate with leading industries and organizations to deliver innovative engineering solutions.
    </p>
  </div>
  <div class="absolute inset-0 bg-[url('/images/clients-bg.jpg')] bg-cover bg-center opacity-10"></div>
</section>

<!-- Clients & Partners Section -->
<section class="py-10 bg-gray-50">
  <div class="container mx-auto px-6">

    <!-- Our Clients -->
    <div class="mb-20">
      <h2 class="text-4xl font-bold text-center mb-12 text-gray-800">
          Our Valued Clients
      </h2>

      @if($clients->count() > 0)
          <div class="relative">
              <!-- VIEWPORT -->
              <div
                  id="clientContainer"
                  class="overflow-hidden select-none cursor-grab">
                  <!-- TRACK (duplicated in JS for infinite loop) -->
                  <div
                      id="clientTrack"
                      class="flex gap-10 py-4 px-4 items-center scrollbar-hide">
                      @foreach ($clients as $client)
                          <div
                              class="client-item group bg-white border border-gray-200 rounded-2xl p-8
                                    hover:shadow-2xl hover:-translate-y-2
                                    transition-all duration-300 ease-in-out
                                    flex flex-col items-center justify-center
                                    w-40 h-36 flex-shrink-0">
                              <img
                                  src="{{ asset('storage/' . $client->logo) }}"
                                  alt="{{ $client->name }}"
                                  class="w-32 h-16 object-contain opacity-75
                                        group-hover:opacity-100
                                        group-hover:scale-105
                                        transition-all duration-300 mb-3">
                              <p
                                  class="text-gray-700 font-bold text-sm text-center
                                        group-hover:text-indigo-600
                                        transition-colors duration-300">
                                  {{ $client->name }}
                              </p>
                          </div>
                      @endforeach

                  </div>
              </div>
          </div>
      @else
          <div class="flex justify-center">
              <div
                  class="bg-white border border-gray-300 rounded-lg p-12
                        text-center shadow flex flex-col items-center
                        justify-center max-w-md">
                  <div
                      class="w-24 h-24 bg-gray-100 rounded-full
                            flex items-center justify-center mb-4">
                      <svg xmlns="http://www.w3.org/2000/svg"
                          class="h-12 w-12 text-gray-400"
                          fill="none" viewBox="0 0 24 24"
                          stroke="currentColor">
                          <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M12
                                  20.5A8.5 8.5 0 103.5 12
                                  8.5 8.5 0 0012 20.5z"/>
                      </svg>
                  </div>
                  <h3 class="text-xl font-semibold mb-2 text-gray-700">
                      No Clients Found
                  </h3>
                  <p class="text-gray-500 text-sm">
                      Please check back later for updates.
                  </p>
              </div>
          </div>
      @endif
    </div>
  </div>
</section>

<!-- Call to Action -->
<section class="bg-indigo-600 text-white py-8 text-center">
  <div class="container mx-auto px-6">
    <h2 class="text-3xl font-bold mb-4">Interested in Partnering with Us?</h2>
    <p class="text-lg mb-6">Join our network of successful clients and partners to create impactful engineering solutions.</p>
    <a href="{{ url('/contact') }}" class="bg-white text-indigo-600 px-6 py-3 rounded-full font-semibold hover:bg-gray-100 transition">Contact Us</a>
  </div>
</section>

{{-- client --}}
<script>
  const container = document.getElementById('clientContainer');
  const track = document.getElementById('clientTrack');
  
  // ---------- DUPLICATE ITEMS FOR INFINITE LOOP ----------
  track.innerHTML += track.innerHTML;
  
  let isDown = false;
  let startX;
  let scrollLeft;
  let autoScroll;
  
  // ---------- DRAG ----------
  container.addEventListener('mousedown', (e) => {
      isDown = true;
      startX = e.pageX;
      scrollLeft = container.scrollLeft;
      container.classList.add('cursor-grabbing');
  });
  
  container.addEventListener('mouseleave', () => {
      isDown = false;
      container.classList.remove('cursor-grabbing');
  });
  
  container.addEventListener('mouseup', () => {
      isDown = false;
      container.classList.remove('cursor-grabbing');
  });
  
  container.addEventListener('mousemove', (e) => {
      if (!isDown) return;
      e.preventDefault();
      const walk = (e.pageX - startX) * 1.5;
      container.scrollLeft = scrollLeft - walk;
  });
  
  // ---------- AUTO SCROLL ----------
  function startAutoScroll() {
      autoScroll = setInterval(() => {
          container.scrollLeft += 0.5;
  
          if (container.scrollLeft >= track.scrollWidth / 2) {
              container.scrollLeft = 0;
          }
      }, 16);
  }
  
  function stopAutoScroll() {
      clearInterval(autoScroll);
  }
  
  container.addEventListener('mouseenter', stopAutoScroll);
  container.addEventListener('mouseleave', startAutoScroll);
  
  startAutoScroll();
</script>
@endsection
