@php
    use App\Models\SiteSetting;

    $facebook = SiteSetting::where('setting_key', 'facebook')->value('setting_value');
    $linkedin = SiteSetting::where('setting_key', 'linkedin')->value('setting_value');
    $x = SiteSetting::where('setting_key', 'x')->value('setting_value');
    $youtube = SiteSetting::where('setting_key', 'youtube')->value('setting_value') ?? '#';
    $instagram = SiteSetting::where('setting_key', 'instagram')->value('setting_value') ?? '#';

    $officeAddress = SiteSetting::where('setting_key', 'office_address')->value('setting_value');
    $phone = SiteSetting::where('setting_key', 'phone')->value('setting_value');
    $email = SiteSetting::where('setting_key', 'email')->value('setting_value');
    $profile = SiteSetting::where('setting_key', 'company_profile')->value('setting_value');
@endphp

<footer class="bg-gray-900 text-gray-300 mt-2">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16">
        
        <!-- Top Section: Logo, Description, Social Icons -->
        <div class="flex flex-col items-start text-left mb-12 max-w-2xl">
            <!-- Logo -->
            <div class="mb-6">
                <a href="{{ url('/') }}" class="flex items-center gap-3">
                    <span class="whitespace-nowrap text-2xl font-bold text-white tracking-tight uppercase">
                        <span class="text-white-900">AR</span>
                    </span>
                    <span class="whitespace-nowrap text-2xl font-bold text-white tracking-tight uppercase">
                        <span class="text-indigo-600">Engineering</span>
                    </span>
                </a>
            </div>
            
            <!-- Description -->
            <p class="text-lg text-gray-300 leading-relaxed mb-6 max-w-lg">
                Industrial Engineering Solution Provider — Consultancy, Services, Supply & Erection.
            </p>
            
            <!-- Social Icons -->
            <div class="flex space-x-3 mt-2">
                @if($facebook)
                    <a href="{{ $facebook }}" target="_blank" class="w-8 h-8 flex items-center justify-center rounded-full bg-indigo-100 text-indigo-600 hover:bg-indigo-600 hover:text-white transition-all duration-300" aria-label="Facebook">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/>
                        </svg>
                    </a>
                @endif

                @if($x)
                    <a href="{{ $x }}" target="_blank" class="w-8 h-8 flex items-center justify-center rounded-full bg-indigo-100 text-indigo-600 hover:bg-indigo-600 hover:text-white transition-all duration-300" aria-label="X (Twitter)">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                        </svg>
                    </a>
                @endif

                @if($linkedin)
                    <a href="{{ $linkedin }}" target="_blank" class="w-8 h-8 flex items-center justify-center rounded-full bg-indigo-100 text-indigo-600 hover:bg-indigo-600 hover:text-white transition-all duration-300" aria-label="LinkedIn">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                        </svg>
                    </a>
                @endif

                @if($youtube && $youtube !== '#')
                    <a href="{{ $youtube }}" target="_blank" class="w-8 h-8 flex items-center justify-center rounded-full bg-indigo-100 text-indigo-600 hover:bg-indigo-600 hover:text-white transition-all duration-300" aria-label="YouTube">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.498 6.163a3.003 3.003 0 0 0-2.11-2.11C19.518 3.545 12 3.545 12 3.545s-7.517 0-9.388.507a3.003 3.003 0 0 0-2.11 2.11C0 8.033 0 12 0 12s0 3.967.502 5.837a3.003 3.003 0 0 0 2.11 2.11c1.871.507 9.388.507 9.388.507s7.518 0 9.388-.507a3.003 3.003 0 0 0 2.11-2.11C24 15.967 24 12 24 12s0-3.967-.502-5.837zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                        </svg>
                    </a>
                @endif

                @if($instagram && $instagram !== '#')
                    <a href="{{ $instagram }}" target="_blank" class="w-8 h-8 flex items-center justify-center rounded-full bg-indigo-100 text-indigo-600 hover:bg-indigo-600 hover:text-white transition-all duration-300" aria-label="Instagram">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.051.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.406-11.845a1.44 1.44 0 1 0 0 2.881 1.44 1.44 0 0 0 0-2.881z"/>
                        </svg>
                    </a>
                @endif
            </div>
        </div>

        <!-- Middle Section: Four Columns -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mb-12">
            <!-- Company Column -->
            <div class="flex flex-col items-start text-left">
                <h3 class="text-white font-bold mb-4 text-xl">
                    <span class="text-indigo-600">Company</span>
                </h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('about') }}" class="hover:text-white transition-all duration-300">About Us</a></li>
                    {{-- <li><a href="#" class="hover:text-white transition-all duration-300">Vision 2030</a></li> --}}
                    <li><a href="{{ route('careers.why') }}" class="hover:text-white transition-all duration-300">Career</a></li>
                    <li><a href="#" class="hover:text-white transition-all duration-300">Corporate Offers</a></li>
                </ul>
            </div>

            <!-- Resources Column -->
            <div class="flex flex-col items-start text-left">
                <h3 class="text-white font-bold mb-4 text-xl">
                    <span class="text-indigo-600">Resources</span>
                </h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('sIndex') }}" class="hover:text-white transition-all duration-300">Services</a></li>
                    <li><a href="#" class="hover:text-white transition-all duration-300">News & Media</a></li>
                    <li><a href="{{ route('pIndex') }}" class="hover:text-white transition-all duration-300">Projects</a></li>
                    <li><a href="{{ route('client') }}" class="hover:text-white transition-all duration-300">Clients</a></li>
                </ul>
            </div>

            <!-- Connect Column -->
            <div class="flex flex-col items-start text-left">
                <h3 class="text-white font-bold mb-4 text-xl">
                    <span class="text-indigo-600">Connect</span>
                </h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('contact.index') }}" class="hover:text-white transition-all duration-300">Contact Us</a></li>
                    <li><a href="#" class="hover:text-white transition-all duration-300">Media Kit</a></li>
                    <li><a href="{{ $profile }}" target="_blank" download class="hover:text-white transition-all duration-300">Company Profile</a></li>
                    {{-- <li><a href="{{ route('gallary.video') }}" class="hover:text-white transition-all duration-300">Photo Frame</a></li> --}}
                </ul>
            </div>

            <!-- Legal Column -->
            <div class="flex flex-col items-start text-left">
                <h3 class="text-white font-bold mb-4 text-xl">
                    <span class="text-indigo-600">Legal</span>
                </h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="hover:text-white transition-all duration-300">Privacy Policy</a></li>
                    <li><a href="#" class="hover:text-white transition-all duration-300">Terms & Conditions</a></li>
                    {{-- <li><a href="#" class="hover:text-white transition-all duration-300">Cookie Policy</a></li> --}}
                    {{-- <li><a href="#" class="hover:text-white transition-all duration-300">Security Policy</a></li> --}}
                </ul>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="border-t border-gray-700 pt-8 flex flex-col lg:flex-row items-center justify-between text-gray-400 text-sm gap-4">
            <div class="text-center lg:text-left">
                © {{ date('Y') }} AR Engineering. All Rights Reserved.
                <br>
                <span class="block sm:inline sm:ml-2 font-semibold">
                    Developed By:
                    <a href="https://khademul.vercel.app/" target="_blank" rel="noopener noreferrer" class="hover:text-white hover:scale-105 transform transition-all duration-300 inline-block">Khademul Islam</a>
                </span>
            </div>
            
            <div class="flex flex-wrap items-center justify-center lg:justify-end gap-x-3 gap-y-1 text-gray-400 text-xs sm:text-sm">
                <span class="hover:text-white transition-colors cursor-default">Bangladesh</span>
                <span class="text-gray-700">|</span>
                <span class="hover:text-white transition-colors cursor-default">India</span>
                {{-- <span class="text-gray-700">|</span>
                <span class="hover:text-white transition-colors cursor-default">United Arab Emirates</span>
                <span class="text-gray-700">|</span>
                <span class="hover:text-white transition-colors cursor-default">United Kingdom</span>
                <span class="text-gray-700">|</span>
                <span class="hover:text-white transition-colors cursor-default">Philippines</span>
                <span class="text-gray-700">|</span>
                <span class="hover:text-white transition-colors cursor-default">Australia</span> --}}
            </div>
    </div>
</footer>
