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

              @php
        use App\Models\SiteSetting;

            $facebook = SiteSetting::where('setting_key', 'facebook')->value('setting_value');
            $linkedin = SiteSetting::where('setting_key', 'linkedin')->value('setting_value');
            $x = SiteSetting::where('setting_key', 'x')->value('setting_value');

            $officeAddress = SiteSetting::where('setting_key', 'office_address')->value('setting_value');
            $phone = SiteSetting::where('setting_key', 'phone')->value('setting_value');
            $email = SiteSetting::where('setting_key', 'email')->value('setting_value');
        @endphp

        {{-- Contact Info --}}
        <div class="flex flex-col items-center md:items-start mt-6 md:mt-0 md:col-span-4">
            <h3 class="text-white font-bold mb-2 text-xl">
            <span class="text-indigo-600">Contact</span>
            </h3>
            <p class="text-md text-gray-300 flex items-start">
            <span class="mr-2 flex-shrink-0">📍</span>
            <span class="break-words"> {{ $officeAddress }}</span>
            </p>
            <p class="text-md text-gray-300 flex items-start mt-1">
            <span class="mr-2 flex-shrink-0">📞</span>
            <span class="break-words">{{ $phone }}</span>
            </p>
            <p class="text-md text-gray-300 mt-1">
                <span class="inline-block">📧</span>
                {{ $email }}
            </p>
            {{-- <p class="text-gray-400 text-sm mt-2 italic text-center md:text-left">We will reply in 24–48 hours.</p> --}}
            {{-- Social Media Icons --}}

            {{-- Social Media Icons (smaller) --}}
            <div class="flex space-x-3 mt-4">
                <a href="{{ $facebook }}" target="_blank" class="w-6 h-6 flex items-center justify-center rounded-full bg-indigo-100 text-indigo-600 hover:bg-indigo-600 hover:text-white transition-all duration-300">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/>
                    </svg>
                </a>

                <a href="{{ $linkedin }}" target="_blank" class="w-6 h-6 flex items-center justify-center rounded-full bg-indigo-100 text-indigo-600 hover:bg-indigo-600 hover:text-white transition-all duration-300">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                    </svg>
                </a>

                <a href="{{ $x }}" target="_blank" class="w-6 h-6 flex items-center justify-center rounded-full bg-indigo-100 text-indigo-600 hover:bg-indigo-600 hover:text-white transition-all duration-300">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                    </svg>
                </a>
            </div>

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
