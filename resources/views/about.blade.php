@extends('layouts.app')
@section('title', 'About Us | AR Engineering')

@section('content')

<style>
    .rich-text-content ul { list-style-type: disc; padding-left: 1.25rem; margin-bottom: 0.5rem; }
    .rich-text-content ol { list-style-type: decimal; padding-left: 1.25rem; margin-bottom: 0.5rem; }
    .rich-text-content li { margin-bottom: 0.25rem; }
</style>

<!-- Hero Section -->
<section class="relative bg-cover bg-top h-[60vh]" style="background-image: url('{{ asset('images/hero1.jpg') }}');">
    <div class="absolute inset-0 bg-black/50"></div>
    <div class="container mx-auto relative z-10 flex items-center justify-center h-full">
        <h1 class="text-4xl md:text-5xl font-extrabold text-white text-center drop-shadow-lg">About AR Engineering</h1>
    </div>
</section>

<!-- Company Overview -->
<section class="bg-gray-50 py-8 px-3">
    <div class="container mx-auto px-4 md:px-0 max-w-5xl">
        <h2 class="text-3xl font-bold mb-6 text-center">Who We Are</h2>
        <p class="text-gray-700 leading-relaxed mb-4">
            <strong>AR Engineering</strong> is an Industrial Engineering Solution Provider specializing in Consultancy, Design, Supply, and Erection services.
            We provide innovative and sustainable engineering solutions for industries across Bangladesh.
        </p>
        <p class="text-gray-700 leading-relaxed mb-4">
            Our mission is to help businesses achieve operational excellence through efficient design, reliable systems, and high-quality services.
        </p>
        <p class="text-gray-700 leading-relaxed mb-4">
            Our team combines modern engineering principles with practical field experience.
        </p>
    </div>
</section>

<!-- About Us Section -->
<section class="py-12 bg-white">
    <div class="container mx-auto px-4 md:px-0 max-w-6xl flex flex-col md:flex-row items-start gap-12">
        <div class="md:w-1/3">
            <img src="{{ isset($aboutUs) && $aboutUs->image ? asset('storage/'.$aboutUs->image) : asset('images/hero2.jpg') }}" alt="{{ $aboutUs->title ?? 'About Us' }}" class="rounded-xl shadow-lg w-full h-auto object-cover">
        </div>
        <div class="md:w-2/3">
            <h2 class="text-3xl font-bold mb-4">{{ $aboutUs->title ?? 'About Us' }}</h2>
            @if(isset($aboutUs) && $aboutUs->content)
                <div class="rich-text-content text-gray-700 leading-relaxed space-y-4 text-justify [&_ul]:list-disc [&_ul]:pl-5 [&_ol]:list-decimal [&_ol]:pl-5 [&_li]:mb-2 [&_p]:mb-4">
                    {!! $aboutUs->content !!}
                </div>
            @else
                <div class="rich-text-content text-gray-700 leading-relaxed space-y-4 text-justify [&_ul]:list-disc [&_ul]:pl-5 [&_ol]:list-decimal [&_ol]:pl-5 [&_li]:mb-2 [&_p]:mb-4">
                    <p>Founded in <strong>[Year]</strong>, <strong>AR Engineering</strong> was established with a vision to provide reliable, innovative, and high-quality engineering solutions for industrial, commercial, and residential projects. Since our inception, we have been committed to delivering engineering services that combine technical expertise, practical solutions, and industry best practices.</p>
                    <p>Today, AR Engineering provides comprehensive engineering services across multiple disciplines, helping clients successfully plan, design, install, and maintain critical engineering systems. Our expertise includes:</p>
                    <ul class="list-disc pl-5">
                        <li>Building Information Modeling (BIM)</li>
                        <li>Mechanical, Electrical & Plumbing (MEP) Engineering</li>
                        <li>HVAC System Design & Installation</li>
                        <li>Fire Detection, Fire Protection & Life Safety Systems</li>
                        <li>Industrial Pump Supply, Installation & Maintenance</li>
                        <li>Engineering Design & Technical Consultancy</li>
                        <li>Operation, Maintenance & Engineering Support</li>
                    </ul>
                    <p>Our team consists of experienced engineers, designers, and technical professionals who work collaboratively to deliver solutions that are efficient, cost-effective, and tailored to each client's unique requirements. Every project is approached with careful planning, technical precision, and a strong commitment to quality.</p>
                </div>
            @endif
        </div>
    </div>
</section>

<!-- Core Values Section -->
<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4 md:px-0 max-w-5xl">
        <h2 class="text-3xl font-bold mb-6 text-center">{{ $coreValues->title ?? 'Our Core Values' }}</h2>
        <div class="bg-white p-8 rounded shadow-lg">
            @if(isset($coreValues) && $coreValues->content)
                <div class="rich-text-content text-gray-700 leading-relaxed space-y-4 [&_ul]:list-disc [&_ul]:pl-5 [&_ol]:list-decimal [&_ol]:pl-5 [&_li]:mb-2 [&_p]:mb-4">
                    {!! $coreValues->content !!}
                </div>
            @else
                <div class="rich-text-content text-gray-700 leading-relaxed space-y-4 [&_ul]:list-disc [&_ul]:pl-5 [&_ol]:list-decimal [&_ol]:pl-5 [&_li]:mb-2 [&_p]:mb-4">
                    <ul class="list-disc pl-5 mb-6 space-y-2 text-lg">
                        <li>Integrity and professionalism</li>
                        <li>Engineering excellence</li>
                        <li>Quality and reliability</li>
                        <li>Health, Safety & Environmental responsibility</li>
                        <li>Innovation and continuous improvement</li>
                        <li>Customer-focused service</li>
                        <li>Timely project delivery</li>
                    </ul>
                    <p>At AR Engineering, we believe that strong client relationships are built on trust, transparency, and consistent performance. Whether supporting a new construction project, upgrading existing facilities, or providing specialized engineering services, we are committed to delivering solutions that meet the highest standards of quality, safety, and performance.</p>
                </div>
            @endif
        </div>
    </div>
</section>

<!-- Message from Advisor and CEO -->
{{-- <section class="bg-gray-50 py-8">
    <div class="container mx-auto px-4 md:px-0 max-w-6xl grid grid-cols-1 md:grid-cols-3 gap-12 justify-center place-items-center">
        <div class="bg-white p-6 rounded shadow text-center">
            <img src="{{ asset('images/logo.png') }}" alt="Advisor" class="w-32 h-32 mx-auto rounded-full mb-4 object-cover">
            <h3 class="text-xl font-bold mb-2">Message from Our Advisor</h3>
            <p class="text-gray-700 mb-2">“Our philosophy is grounded in delivering engineering solutions that are both innovative and practical. We focus on quality, safety, and efficiency in every project.”</p>
            <p class="font-bold"> Prof. Dr. Md. Mizanur Rahman, CEng</p>
                <p class="text-gray-800 text-sm">Professor, Department of Mechatronics Engineering (WUB)</p>
                <p class="text-gray-800 text-sm">Director of IQAC, Department of Mechatronics Engineering</p>
        </div>
        <div class="bg-white p-6 rounded shadow text-center">
            <img src="{{ asset('images/logo.png') }}" alt="CEO" class="w-32 h-32 mx-auto rounded-full mb-4 object-cover">
            <h3 class="text-xl font-bold mb-2">Message from Our Advisor</h3>
            <p class="text-gray-700 mb-2">“AR Engineering is committed to shaping the future of industrial solutions. Our team strives to exceed client expectations in every aspect of our services.”</p>
            <p class="font-semibold">Dr. Md. Shahidur Rahman</p>
            <p class="text-gray-800 text-sm">Professor, Department of Poultry Science (BAU)</p>
            <p class="text-gray-800 text-sm">Faculty of Animal Husbandry</p>
        </div>
        <div class="bg-white p-6 rounded shadow text-center">
            <img src="{{ asset('images/logo.png') }}" alt="CEO" class="w-32 h-32 mx-auto rounded-full mb-4 object-cover">
            <h3 class="text-xl font-bold mb-2">Message from Our Advisor</h3>
            <p class="text-gray-700 mb-2">“AR Engineering is committed to shaping the future of industrial solutions. Our team strives to exceed client expectations in every aspect of our services.”</p>
            <p class="font-semibold">Dr. Md. Shahidur Rahman</p>
            <p class="text-gray-800 text-sm">Professor, Department of Poultry Science (BAU)</p>
            <p class="text-gray-800 text-sm">Faculty of Animal Husbandry</p>
        </div>
                <div class="bg-white p-6 rounded shadow text-center">
            <img src="{{ asset('images/logo.png') }}" alt="CEO" class="w-32 h-32 mx-auto rounded-full mb-4 object-cover">
            <h3 class="text-xl font-bold mb-2">Message from Our Advisor</h3>
            <p class="text-gray-700 mb-2">“AR Engineering is committed to shaping the future of industrial solutions. Our team strives to exceed client expectations in every aspect of our services.”</p>
            <p class="font-semibold">Dr. Md. Shahidur Rahman</p>
            <p class="text-gray-800 text-sm">Professor, Department of Poultry Science (BAU)</p>
            <p class="text-gray-800 text-sm">Faculty of Animal Husbandry</p>
        </div>

    </div>
</section> --}}

<!-- Message from Advisor and CEO -->
{{-- <section class="bg-gray-50 py-8">
  <div class="container mx-auto px-4 max-w-6xl">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12 justify-items-center">

      <div class="bg-white p-6 rounded shadow text-center max-w-sm">
        <img src="{{ asset('images/logo.png') }}" alt="Advisor" class="w-32 h-32 mx-auto rounded-full mb-4 object-cover">
        <h3 class="text-xl font-bold mb-2">Message from Our Advisor</h3>
        <p class="text-gray-700 mb-2">
          “Our philosophy is grounded in delivering engineering solutions that are both innovative and practical.
          We focus on quality, safety, and efficiency in every project.”
        </p>
        <p class="font-bold">Prof. Dr. Md. Mizanur Rahman, CEng</p>
        <p class="text-gray-800 text-sm">Professor, Department of Mechatronics Engineering (WUB)</p>
        <p class="text-gray-800 text-sm">Director of IQAC, Department of Mechatronics Engineering</p>
      </div>

      <div class="bg-white p-6 rounded shadow text-center max-w-sm">
        <img src="{{ asset('images/logo.png') }}" alt="CEO" class="w-32 h-32 mx-auto rounded-full mb-4 object-cover">
        <h3 class="text-xl font-bold mb-2">Message from Our Advisor</h3>
        <p class="text-gray-700 mb-2">
          “AR Engineering is committed to shaping the future of industrial solutions.
          Our team strives to exceed client expectations in every aspect of our services.”
        </p>
        <p class="font-semibold">Dr. Md. Shahidur Rahman</p>
        <p class="text-gray-800 text-sm">Professor, Department of Poultry Science (BAU)</p>
        <p class="text-gray-800 text-sm">Faculty of Animal Husbandry</p>
      </div>

      <div class="bg-white p-6 rounded shadow text-center max-w-sm">
        <img src="{{ asset('images/logo.png') }}" alt="CEO" class="w-32 h-32 mx-auto rounded-full mb-4 object-cover">
        <h3 class="text-xl font-bold mb-2">Message from Our Advisor</h3>
        <p class="text-gray-700 mb-2">
          “AR Engineering is committed to shaping the future of industrial solutions.
          Our team strives to exceed client expectations in every aspect of our services.”
        </p>
        <p class="font-semibold">Dr. Md. Shahidur Rahman</p>
        <p class="text-gray-800 text-sm">Professor, Department of Poultry Science (BAU)</p>
        <p class="text-gray-800 text-sm">Faculty of Animal Husbandry</p>
      </div>

      <div class="bg-white p-6 rounded shadow text-center max-w-sm lg:col-span-3 flex justify-center">
        <div>
          <img src="{{ asset('images/logo.png') }}" alt="CEO" class="w-32 h-32 mx-auto rounded-full mb-4 object-cover">
          <h3 class="text-xl font-bold mb-2">Message from Our Advisor</h3>
          <p class="text-gray-700 mb-2">
            “AR Engineering is committed to shaping the future of industrial solutions.
            Our team strives to exceed client expectations in every aspect of our services.”
          </p>
          <p class="font-semibold">Dr. Md. Shahidur Rahman</p>
          <p class="text-gray-800 text-sm">Professor, Department of Poultry Science (BAU)</p>
          <p class="text-gray-800 text-sm">Faculty of Animal Husbandry</p>
        </div>
      </div>

    </div>
  </div>
</section> --}}
{{--
<section class="bg-gray-50 py-8">
  <div class="container mx-auto px-4 max-w-6xl">
    <div class="flex flex-wrap justify-center gap-12">

      <!-- Card -->
      <div class="bg-white p-6 rounded shadow text-center max-w-sm flex-1 basis-[300px]">
        <img src="{{ asset('images/logo.png') }}" alt="Advisor" class="w-32 h-32 mx-auto rounded-full mb-4 object-cover">
        <h3 class="text-xl font-bold mb-2">Message from Our Advisor</h3>
        <p class="text-gray-700 mb-2">
          “Our philosophy is grounded in delivering engineering solutions that are both innovative and practical.”
        </p>
        <p class="font-bold">Prof. Dr. Md. Mizanur Rahman, CEng</p>
      </div>

      <!-- Repeat for other cards -->
      @for ($i = 0; $i < 4; $i++)
      <div class="bg-white p-6 rounded shadow text-center max-w-sm flex-1 basis-[300px]">
        <img src="{{ asset('images/logo.png') }}" alt="Advisor" class="w-32 h-32 mx-auto rounded-full mb-4 object-cover">
        <h3 class="text-xl font-bold mb-2">Advisor {{ $i + 2 }}</h3>
        <p class="text-gray-700 mb-2">
          “AR Engineering is committed to shaping the future of industrial solutions.”
        </p>
        <p class="font-semibold">Dr. Md. Shahidur Rahman</p>
      </div>
      @endfor

    </div>
  </div>
</section> --}}

<section class="bg-gray-50 py-8">
  <div class="container mx-auto px-4 max-w-6xl">
    <div class="flex flex-wrap justify-center gap-12">

      @forelse ($messages as $message)
        <div class="bg-white p-6 rounded shadow text-center max-w-sm flex-1 basis-[300px]">
          <img
            src="{{ $message->image ? asset('storage/'.$message->image) : asset('images/logo.png') }}"
            alt="{{ $message->title ?? ucfirst($message->type) }}"
            class="w-32 h-32 mx-auto rounded-full mb-4 object-cover">

          <h3 class="text-xl font-bold mb-2">
            {{ $message->title ?? ucfirst($message->type) }}
          </h3>

          <p class="text-gray-700 mb-2">
            “{{ $message->content ?? 'Message will be updated soon.' }}”
          </p>

          <p class="font-bold">
            {{ $message->subtitle ?? '' }}
          </p>
        </div>
      @empty
        <!-- Placeholder if no messages -->
        <div class="bg-white p-6 rounded shadow text-center max-w-sm flex-1 basis-[300px]">
          <div class="w-32 h-32 mx-auto rounded-full mb-4 bg-gray-100 flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M12 20.5A8.5 8.5 0 103.5 12 8.5 8.5 0 0012 20.5z" />
            </svg>
          </div>
          <h3 class="text-xl font-bold mb-2 text-gray-500">Coming Soon</h3>
          <p class="text-gray-500 font-semibold">Messages will be updated soon</p>
        </div>
      @endforelse

    </div>
  </div>
</section>


<!-- Business Philosophy -->
<section class="py-8 px-3">
    <div class="container mx-auto px-4 md:px-0 max-w-5xl">
        <h2 class="text-3xl font-bold mb-6 text-center">Our Philosophy</h2>
        <p class="text-gray-700 text-center leading-relaxed">
            We believe in sustainable engineering, continuous improvement, and customer-centric solutions. Our philosophy emphasizes integrity, innovation, and excellence in every project we undertake.
        </p>
    </div>
</section>

<!-- Strengths / Capabilities -->
<section class="bg-gray-50 py-8 px-3">
    <div class="container mx-auto px-4 md:px-0 max-w-6xl">
        <h2 class="text-3xl font-bold mb-10 text-center">Our Strengths</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded shadow text-center hover:shadow-lg transition">
                <h3 class="text-xl font-bold mb-2">Expert Team</h3>
                <p class="text-gray-700">Skilled engineers and technicians with years of experience in industrial solutions.</p>
            </div>
            <div class="bg-white p-6 rounded shadow text-center hover:shadow-lg transition">
                <h3 class="text-xl font-bold mb-2">Innovative Solutions</h3>
                <p class="text-gray-700">We use modern engineering tools and innovative designs to deliver the best outcomes.</p>
            </div>
            <div class="bg-white p-6 rounded shadow text-center hover:shadow-lg transition">
                <h3 class="text-xl font-bold mb-2">Reliability & Quality</h3>
                <p class="text-gray-700">Our solutions are dependable, safe, and meet the highest quality standards.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-16 bg-gray-50/50">
    <div class="container mx-auto px-4 max-w-7xl">

        <!-- Section Header -->
        <div class="text-center mb-6">
            <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 tracking-tight">
                Meet Our Team
            </h2>
            <div class="mt-4 w-24 h-1.5 bg-blue-600 mx-auto rounded-full"></div>
            <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                The talented people behind our mission and success.
            </p>
        </div>

        <!-- Team Grid -->
        @if($teamMembers->count())
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 justify-items-center">

            @foreach ($teamMembers as $member)
            <div
                class="group bg-white p-6 rounded-3xl shadow-sm hover:shadow-2xl
                       transition-all duration-500 transform hover:-translate-y-2
                       border border-gray-100 flex flex-col items-center text-center">

                <!-- Image -->
                <div class="relative w-36 h-36 mb-4">
                    <div
                        class="absolute inset-0 rounded-full border-4 border-blue-50
                               group-hover:border-blue-500 transition-colors duration-500 z-10">
                    </div>
                    <div class="w-full h-full overflow-hidden rounded-full bg-gray-100 shadow-inner">
                        <img
                            src="{{ $member->image_url }}"
                            alt="{{ $member->name }}"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                            style="object-position: 50% 10%;">
                    </div>
                </div>

                <!-- Name -->
                <h3 class="font-bold text-base md:text-lg text-gray-900 truncate whitespace-nowrap"
                    title="{{ $member->name }}">
                    {{ $member->name }}
                </h3>

                <!-- Position -->
                @if($member->position)
                <div class="mt-1 flex justify-center">
                    <span class="mx-auto text-gray-400 text-[8px] uppercase tracking-wide
                                 bg-blue-50 px-2 py-0.5 rounded-full inline-block">
                        {{ $member->position }}
                    </span>
                </div>
                @endif

                <!-- Social Icons -->
                <div
                    class="mt-2 flex justify-center space-x-3 opacity-0
                           transform translate-y-3 group-hover:opacity-100
                           group-hover:translate-y-0 transition-all duration-500">

                    @if($member->linkedin_url)
                    <a href="{{ $member->linkedin_url }}" class="p-2 text-gray-400 hover:text-blue-600 hover:bg-blue-50 rounded-full transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761
                                     2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14
                                     c0-2.761-2.238-5-5-5zM8 19H5V8h3v11z
                                     M6.5 6.732c-.966 0-1.75-.79-1.75-1.764
                                     S5.534 3.204 6.5 3.204s1.75.79 1.75 1.764
                                     -.783 1.764-1.75 1.764zM20 19h-3v-5.604
                                     c0-3.368-4-3.113-4 0V19h-3V8h3v1.765
                                     c1.396-2.586 7-2.777 7 2.476V19z"/>
                        </svg>
                    </a>
                    @endif

                    @if($member->twitter_url)
                    <a href="{{ $member->twitter_url }}" class="p-2 text-gray-400 hover:text-blue-400 hover:bg-blue-50 rounded-full transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 4.557c-.883.392-1.832.656-2.828.775
                                     1.017-.609 1.798-1.574 2.165-2.724-.951.564
                                     -2.005.974-3.127 1.195-.897-.957-2.178-1.555
                                     -3.594-1.555-3.179 0-5.515 2.966-4.797 6.045
                                     -4.091-.205-7.719-2.165-10.148-5.144-1.29
                                     2.213-.669 5.108 1.523 6.574-.806-.026
                                     -1.566-.247-2.229-.616-.054 2.281 1.581
                                     4.415 3.949 4.89-.693.188-1.452.232-2.224
                                     .084.626 1.956 2.444 3.379 4.6 3.419
                                     -2.07 1.623-4.678 2.348-7.29 2.04
                                     2.179 1.397 4.768 2.212 7.548 2.212
                                     9.142 0 14.307-7.721 13.995-14.646
                                     .962-.695 1.797-1.562 2.457-2.549z"/>
                        </svg>
                    </a>
                    @endif

                </div>

            </div>
            @endforeach

        </div>
        @endif
    </div>
</section>

<!-- Call to Action -->
<section class="bg-indigo-600 py-16 text-white text-center">
    <h2 class="text-3xl font-bold mb-4">Partner with AR Engineering</h2>
    <p class="mb-6">Join hands with us to achieve innovative and sustainable engineering solutions for your projects.</p>
    <a href="{{ url('/contact') }}" class="bg-white text-indigo-700 px-6 py-3 rounded-full font-semibold hover:bg-gray-100 transition-all duration-300">
        Contact Us
    </a>
</section>

@endsection
