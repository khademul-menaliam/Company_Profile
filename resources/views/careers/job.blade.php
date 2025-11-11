@extends('layouts.app')

@section('content')
<section class="py-5 bg-gray-50">
  <div class="container mx-auto">
    <h2 class="text-3xl font-extrabold text-indigo-700 mb-8 text-center">Current Job Openings</h2>

    <div class="grid md:grid-cols-2 gap-8">
      <div class="bg-white rounded-xl shadow p-6 hover:shadow-lg transition">
        <h3 class="font-bold text-lg mb-2">Software QA Engineer</h3>
        <p class="text-gray-600 mb-4">We are looking for a passionate QA engineer to ensure software quality and performance.</p>
        <a href="Software_QA_Engineer" class="text-indigo-600 font-semibold hover:underline">View Details →</a>
      </div>

      <div class="bg-white rounded-xl shadow p-6 hover:shadow-lg transition">
        <h3 class="font-bold text-lg mb-2">Project Coordinator</h3>
        <p class="text-gray-600 mb-4">Coordinate engineering projects, monitor progress, and ensure client satisfaction.</p>
        <a href="Project_Coordinator" class="text-indigo-600 font-semibold hover:underline">View Details →</a>
      </div>
    </div>
  </div>
</section>
@endsection
