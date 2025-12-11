@extends('layouts.app')
@section('title', 'About Us | AR Engineering')

@section('content')

<!-- Hero Section -->
<section class="relative bg-cover bg-top h-[60vh]" style="background-image: url('{{ asset('images/hero1.jpg') }}');">
    <div class="absolute inset-0 bg-black/50"></div>
    <div class="container mx-auto relative z-10 flex items-center justify-center h-full">
        <h1 class="text-4xl md:text-5xl font-extrabold text-white text-center drop-shadow-lg">About AR Engineering</h1>
    </div>
</section>

<!-- Company Overview -->
<section class="bg-gray-50 py-8">
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

<!-- History Section -->
<section class="py-8">
    <div class="container mx-auto px-4 md:px-0 max-w-5xl flex flex-col md:flex-row items-center gap-8">
        <div class="md:w-1/2">
            <img src="{{ asset('images/hero2.jpg') }}" alt="Company History" class="rounded shadow-lg">
        </div>
        <div class="md:w-1/2">
            <h2 class="text-3xl font-bold mb-4">Our History</h2>
            <p class="text-gray-700 leading-relaxed mb-2">
                AR Engineering was founded in [Year] with a vision to provide top-notch industrial engineering solutions. Over the years, we have successfully completed numerous projects in MEP design, fire safety, HVAC, boilers, and more.
            </p>
            <p class="text-gray-700 leading-relaxed">
                Our commitment to innovation and excellence has made us a trusted partner for industrial clients across Bangladesh.
            </p>
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
</section>


<!-- Business Philosophy -->
<section class="py-8">
    <div class="container mx-auto px-4 md:px-0 max-w-5xl">
        <h2 class="text-3xl font-bold mb-6 text-center">Our Philosophy</h2>
        <p class="text-gray-700 text-center leading-relaxed">
            We believe in sustainable engineering, continuous improvement, and customer-centric solutions. Our philosophy emphasizes integrity, innovation, and excellence in every project we undertake.
        </p>
    </div>
</section>

<!-- Strengths / Capabilities -->
<section class="bg-gray-50 py-8">
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

<!-- Team Members -->
<section class="py-16">
    <div class="container mx-auto px-4 md:px-0 max-w-6xl">
        <h2 class="text-3xl font-bold mb-10 text-center">Meet Our Team</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
            <div class="text-center">
                <img src="{{ asset('images/CEO.jpeg') }}" alt="Team Member" class="w-32 h-32 mx-auto rounded-full object-cover mb-2">
                <h3 class="font-bold text-lg">Engr. Ashiqur Rahman</h3>
                <p class="text-gray-600 text-sm">CEO & Founder</p>
            </div>
            <div class="text-center">
                <img src="{{ asset('images/hero1.jpg') }}" alt="Team Member" class="w-32 h-32 mx-auto rounded-full object-cover mb-4">
                <h3 class="font-bold text-lg">Engr. Abid Md. Bakthier Nafis</h3>
                <p class="text-gray-600 text-sm">Project Development Engineer</p>
            </div>
            <div class="text-center">
                <img src="{{ asset('images/ss.jpeg') }}" alt="Team Member" class="w-32 h-32 mx-auto rounded-full object-cover mb-4">
                <h3 class="font-bold text-lg">Songram Sardar</h3>
                <p class="text-gray-600 text-sm">Commercial & Execution Manager</p>
            </div>
            <div class="text-center">
                <img src="{{ asset('images/hero1.jpg') }}" alt="Team Member" class="w-32 h-32 mx-auto rounded-full object-cover mb-4">
                <h3 class="font-bold text-lg">Md. Rashaduzzaman</h3>
                <p class="text-gray-600 text-sm">Building & Life Sefty Engineer</p>
            </div>
        </div>
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
