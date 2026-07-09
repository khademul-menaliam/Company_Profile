@extends('layouts.app')
@section('title', 'How We Work | AR Engineering')

@section('content')
@php
    use App\Models\SiteSetting;
    $workflow = SiteSetting::where('setting_key', 'workflow')->value('setting_value');
@endphp

<section class="relative bg-gradient-to-r from-indigo-600 to-blue-500 text-white py-16 text-center overflow-hidden">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <h1 class="text-4xl md:text-5xl font-extrabold mb-4">How AR Engineering Works</h1>
    <p class="text-lg md:text-xl max-w-2xl mx-auto">
      Our comprehensive workflow ensures seamless project delivery, from consultation to after-support.
    </p>
  </div>
  <div class="absolute inset-0 bg-[url('/images/workflow-bg.jpg')] bg-cover bg-center opacity-10"></div>
</section>

<section class="py-16 bg-gray-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <h2 class="text-4xl font-bold text-center mb-12 text-gray-800">Our Process at a Glance</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

      <div class="bg-white rounded-2xl shadow-lg p-8 text-center flex flex-col items-center hover:shadow-2xl transition-all duration-300 border-t-4 border-indigo-500">
        <div class="w-16 h-16 flex items-center justify-center bg-indigo-100 rounded-full mb-4">
          <span class="text-indigo-600 font-bold text-xl">1</span>
        </div>
        <h3 class="text-xl font-semibold mb-2 text-gray-800">Consultation</h3>
        <p class="text-gray-600 text-sm">
          We begin by understanding your requirements, challenges, and goals to tailor the perfect solution.
        </p>
      </div>

      <div class="bg-white rounded-2xl shadow-lg p-8 text-center flex flex-col items-center hover:shadow-2xl transition-all duration-300 border-t-4 border-indigo-500">
        <div class="w-16 h-16 flex items-center justify-center bg-indigo-100 rounded-full mb-4">
          <span class="text-indigo-600 font-bold text-xl">2</span>
        </div>
        <h3 class="text-xl font-semibold mb-2 text-gray-800">Proposal & Planning</h3>
        <p class="text-gray-600 text-sm">
          We provide a detailed plan and proposal outlining milestones, timelines, and deliverables.
        </p>
      </div>

      <div class="bg-white rounded-2xl shadow-lg p-8 text-center flex flex-col items-center hover:shadow-2xl transition-all duration-300 border-t-4 border-indigo-500">
        <div class="w-16 h-16 flex items-center justify-center bg-indigo-100 rounded-full mb-4">
          <span class="text-indigo-600 font-bold text-xl">3</span>
        </div>
        <h3 class="text-xl font-semibold mb-2 text-gray-800">Design & Implementation</h3>
        <p class="text-gray-600 text-sm">
          Our expert engineers implement the solution using best practices, ensuring quality and efficiency.
        </p>
      </div>

      @if($workflow)
      <div class="col-span-1 md:col-span-3 my-12">
        <div class="relative group overflow-hidden rounded-3xl shadow-2xl bg-white p-6 md:p-10 border border-gray-100">
            <div class="absolute -top-20 -left-20 w-64 h-64 bg-indigo-50 rounded-full opacity-60"></div>
            <div class="absolute -bottom-20 -right-20 w-64 h-64 bg-blue-50 rounded-full opacity-60"></div>

            <div class="relative flex flex-col items-center">
                <img src="{{ asset( $workflow) }}" alt="Workflow Diagram"
                    class="w-full h-auto max-h-[600px] object-contain rounded-xl transform group-hover:scale-[1.01] transition-all duration-700 ease-in-out">
            </div>

            <div class="absolute top-4 left-6 bg-indigo-600 text-white text-[10px] font-bold uppercase tracking-widest px-4 py-1.5 rounded-full shadow-lg">
                Visual Workflow
            </div>
        </div>
      </div>
      @endif

      <div class="bg-white rounded-2xl shadow-lg p-8 text-center flex flex-col items-center hover:shadow-2xl transition-all duration-300 border-t-4 border-indigo-500">
        <div class="w-16 h-16 flex items-center justify-center bg-indigo-100 rounded-full mb-4">
          <span class="text-indigo-600 font-bold text-xl">4</span>
        </div>
        <h3 class="text-xl font-semibold mb-2 text-gray-800">Delivery & Testing</h3>
        <p class="text-gray-600 text-sm">
          We deliver the project on time, conducting thorough testing and quality assurance for optimal performance.
        </p>
      </div>

      <div class="bg-white rounded-2xl shadow-lg p-8 text-center flex flex-col items-center hover:shadow-2xl transition-all duration-300 border-t-4 border-indigo-500">
        <div class="w-16 h-16 flex items-center justify-center bg-indigo-100 rounded-full mb-4">
          <span class="text-indigo-600 font-bold text-xl">5</span>
        </div>
        <h3 class="text-xl font-semibold mb-2 text-gray-800">Support & Maintenance</h3>
        <p class="text-gray-600 text-sm">
          We provide ongoing support and maintenance to ensure your systems run smoothly and efficiently.
        </p>
      </div>

      <div class="bg-white rounded-2xl shadow-lg p-8 text-center flex flex-col items-center hover:shadow-2xl transition-all duration-300 border-t-4 border-indigo-500">
        <div class="w-16 h-16 flex items-center justify-center bg-indigo-100 rounded-full mb-4">
          <span class="text-indigo-600 font-bold text-xl">6</span>
        </div>
        <h3 class="text-xl font-semibold mb-2 text-gray-800">Feedback & Improvement</h3>
        <p class="text-gray-600 text-sm">
          We gather client feedback to continuously improve our processes and deliver exceptional results.
        </p>
      </div>

    </div> </div>
</section>

<section class="bg-indigo-600 text-white py-16 text-center">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <h2 class="text-3xl font-bold mb-4">Ready to Work With Us?</h2>
    <p class="text-lg mb-6 max-w-2xl mx-auto">
      Let’s collaborate and bring your engineering projects to life with precision and excellence.
    </p>
    <a href="{{ url('/contact') }}" class="bg-white text-indigo-600 px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition shadow-xl">
      Contact Us
    </a>
  </div>
</section>
@endsection
