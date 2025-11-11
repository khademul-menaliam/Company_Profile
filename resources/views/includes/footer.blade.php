<footer class="bg-gray-900 text-gray-300 mt-2">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 grid grid-cols-1 md:grid-cols-12 gap-8 text-center md:text-left">
                    {{-- About --}}
            <div class="flex flex-col items-center  md:col-span-5">
                <h3 class="text-white font-bold mb-2 text-2xl">AR
                <span class="text-indigo-600">Engineering</span>
                </h3>
                <p class="text-lg leading-relaxed max-w-xs text-center">
                    Industrial Engineering Solution Provider — Consultancy, Services, Supply & Erection.
                </p>
            </div>

        {{-- Our Solutions --}}
            {{-- <div class="flex flex-col items-center md:items-start mt-6 md:mt-0 md:col-span-4">
            <h3 class="text-white font-bold mb-2 text-2xl">
                <span class="text-indigo-600">Our Solutions</span>
            </h3>

            <p class="text-lg text-gray-300 flex items-start mt-1">
                <span class="inline-block mr-2">💡</span>
                Industrial Engineering Consultancy
            </p>

            <p class="text-lg text-gray-300 flex items-start mt-1">
                <span class="inline-block mr-2">⚙️</span>
                Supply & Erection of Machinery
            </p>

            <p class="text-lg text-gray-300 flex items-start mt-1">
                <span class="inline-block mr-2">🛠️</span>
                Project Management & Services
            </p>

            <p class="text-lg text-gray-300 flex items-start mt-1">
                <span class="inline-block mr-2">📈</span>
                Industrial Optimization Solutions
            </p>

            <p class="text-gray-400 text-sm mt-2 italic text-center md:text-left">
                Our team ensures professional solutions tailored to your needs.
            </p>
            </div> --}}

        {{-- Quick Links --}}
        <div class="flex flex-col items-center md:items-start mt-6 md:mt-0 md:col-span-3">
            <h3 class="text-white font-bold mb-2 text-xl">
            <span class="text-indigo-600">Quick Links</span>
            </h3>
            <ul class="space-y-1 text-sm ">
                {{-- <li><a href="{{ url('/services') }}" class="hover:text-white transition-all duration-300">Services</a></li>
                <li><a href="{{ url('/projects') }}" class="hover:text-white transition-all duration-300">Projects</a></li> --}}
                <li><a href="{{ url('/gallary') }}" class="hover:text-white transition-all duration-300">Gallary</a></li>
                <li><a href="{{ url('/contact') }}" class="hover:text-white transition-all duration-300">Contact</a></li>
                <li><a href="{{ url('/about') }}" class="hover:text-white transition-all duration-300">About Us</a></li>
                <li><a href="{{ url('/site_map') }}" class="hover:text-white transition-all duration-300">Site Map</a></li>
            </ul>

        </div>

        {{-- Contact Info --}}
        <div class="flex flex-col items-center md:items-start mt-6 md:mt-0 md:col-span-4">
            <h3 class="text-white font-bold mb-2 text-xl">
            <span class="text-indigo-600">Contact</span>
            </h3>
            <p class="text-md text-gray-300 flex items-start">
            <span class="mr-2 flex-shrink-0">📍</span>
            <span class="break-words"> East Rampura, Dhaka, Bangladesh</span>
            </p>
            <p class="text-md text-gray-300 flex items-start mt-1">
            <span class="mr-2 flex-shrink-0">📞</span>
            <span class="break-words">+880 1XXX-XXXXXX</span>
            </p>
            <p class="text-md text-gray-300 mt-1">
                <span class="inline-block">📧</span>
                info@arengineeringbd.com
            </p>
            {{-- <p class="text-gray-400 text-sm mt-2 italic text-center md:text-left">We will reply in 24–48 hours.</p> --}}
        </div>

    </div>

  {{-- Bottom Bar --}}
  <div class="text-center text-gray-400 text-sm border-t border-gray-700 py-4 px-2 sm:px-6 lg:px-8">
    © {{ date('Y') }} AR Engineering. All Rights Reserved.
    <span class="font-semibold">
      Developed By:
      <a href="https://khademulprotfolio.vercel.app/" class="hover:text-white hover:scale-105 transform transition-all duration-300">Khademul Islam</a>
    </span>
  </div>
</footer>
