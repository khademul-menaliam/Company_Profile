@extends('layouts.app')
@section('title', 'How We Work | AR Engineering')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-indigo-600 to-blue-500 text-white py-16 text-center overflow-hidden">
  <div class="container mx-auto px-6">
    <h1 class="text-4xl md:text-5xl font-extrabold mb-4">How AR Engineering Works</h1>
    <p class="text-lg md:text-xl max-w-2xl mx-auto">
      Our comprehensive workflow ensures seamless project delivery, from consultation to after-support.
    </p>
  </div>
  <div class="absolute inset-0 bg-[url('/images/workflow-bg.jpg')] bg-cover bg-center opacity-10"></div>
</section>

<!-- Workflow Steps Section -->
<section class="py-16 bg-gray-50">
  <div class="container mx-auto px-6">
    <h2 class="text-4xl font-bold text-center mb-12 text-gray-800">Our Process at a Glance</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
      <!-- Step 1 -->
      <div class="bg-white rounded-2xl shadow-lg p-8 text-center flex flex-col items-center hover:shadow-2xl transition-all duration-300">
        <div class="w-16 h-16 flex items-center justify-center bg-indigo-100 rounded-full mb-4">
          <span class="text-indigo-600 font-bold text-xl">1</span>
        </div>
        <h3 class="text-xl font-semibold mb-2">Consultation</h3>
        <p class="text-gray-600 text-sm">
          We begin by understanding your requirements, challenges, and goals to tailor the perfect solution.
        </p>
      </div>

      <!-- Step 2 -->
      <div class="bg-white rounded-2xl shadow-lg p-8 text-center flex flex-col items-center hover:shadow-2xl transition-all duration-300">
        <div class="w-16 h-16 flex items-center justify-center bg-indigo-100 rounded-full mb-4">
          <span class="text-indigo-600 font-bold text-xl">2</span>
        </div>
        <h3 class="text-xl font-semibold mb-2">Proposal & Planning</h3>
        <p class="text-gray-600 text-sm">
          We provide a detailed plan and proposal outlining milestones, timelines, and deliverables.
        </p>
      </div>

      <!-- Step 3 -->
      <div class="bg-white rounded-2xl shadow-lg p-8 text-center flex flex-col items-center hover:shadow-2xl transition-all duration-300">
        <div class="w-16 h-16 flex items-center justify-center bg-indigo-100 rounded-full mb-4">
          <span class="text-indigo-600 font-bold text-xl">3</span>
        </div>
        <h3 class="text-xl font-semibold mb-2">Design & Implementation</h3>
        <p class="text-gray-600 text-sm">
          Our expert engineers implement the solution using best practices, ensuring quality and efficiency.
        </p>
      </div>

      <!-- Step 4 -->
      <div class="bg-white rounded-2xl shadow-lg p-8 text-center flex flex-col items-center hover:shadow-2xl transition-all duration-300">
        <div class="w-16 h-16 flex items-center justify-center bg-indigo-100 rounded-full mb-4">
          <span class="text-indigo-600 font-bold text-xl">4</span>
        </div>
        <h3 class="text-xl font-semibold mb-2">Delivery & Testing</h3>
        <p class="text-gray-600 text-sm">
          We deliver the project on time, conducting thorough testing and quality assurance for optimal performance.
        </p>
      </div>

      <!-- Step 5 -->
      <div class="bg-white rounded-2xl shadow-lg p-8 text-center flex flex-col items-center hover:shadow-2xl transition-all duration-300">
        <div class="w-16 h-16 flex items-center justify-center bg-indigo-100 rounded-full mb-4">
          <span class="text-indigo-600 font-bold text-xl">5</span>
        </div>
        <h3 class="text-xl font-semibold mb-2">Support & Maintenance</h3>
        <p class="text-gray-600 text-sm">
          We provide ongoing support and maintenance to ensure your systems run smoothly and efficiently.
        </p>
      </div>

      <!-- Step 6 -->
      <div class="bg-white rounded-2xl shadow-lg p-8 text-center flex flex-col items-center hover:shadow-2xl transition-all duration-300">
        <div class="w-16 h-16 flex items-center justify-center bg-indigo-100 rounded-full mb-4">
          <span class="text-indigo-600 font-bold text-xl">6</span>
        </div>
        <h3 class="text-xl font-semibold mb-2">Feedback & Improvement</h3>
        <p class="text-gray-600 text-sm">
          We gather client feedback to continuously improve our processes and deliver exceptional results.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- Call to Action -->
<section class="bg-indigo-600 text-white py-16 text-center">
  <div class="container mx-auto px-6">
    <h2 class="text-3xl font-bold mb-4">Ready to Work With Us?</h2>
    <p class="text-lg mb-6 max-w-2xl mx-auto">
      Let’s collaborate and bring your engineering projects to life with precision and excellence.
    </p>
    <a href="{{ url('/contact') }}" class="bg-white text-indigo-600 px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition">
      Contact Us
    </a>
  </div>
</section>
@endsection
