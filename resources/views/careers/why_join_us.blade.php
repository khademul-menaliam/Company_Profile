@extends('layouts.app')

@section('content')

<section class="py-5 bg-white">
  <div class="container mx-auto text-center">
    <h2 class="text-4xl font-extrabold text-indigo-700 mb-6">Why Join AR Engineering</h2>
    <p class="text-gray-600 max-w-2xl mx-auto mb-12">
      We foster a culture of innovation, teamwork, and continuous learning. Your growth is our success.
    </p>
    <div class="grid md:grid-cols-3 gap-8">
      <div class="p-6 bg-indigo-50 rounded-xl shadow-sm">
        <h3 class="font-bold text-lg mb-2">💼 Professional Growth</h3>
        <p class="text-gray-600">Get opportunities to work with experienced engineers and cutting-edge projects.</p>
      </div>
      <div class="p-6 bg-indigo-50 rounded-xl shadow-sm">
        <h3 class="font-bold text-lg mb-2">⚙️ Innovative Projects</h3>
        <p class="text-gray-600">Be part of industry-leading engineering and industrial solutions.</p>
      </div>
      <div class="p-6 bg-indigo-50 rounded-xl shadow-sm">
        <h3 class="font-bold text-lg mb-2">🌍 Work-Life Balance</h3>
        <p class="text-gray-600">We believe productivity grows when you’re inspired, not overworked.</p>
      </div>
    </div>

    <div class="flex flex-wrap justify-center gap-4 pt-10">
      <a href="{{ route('careers.job') }}" class="bg-indigo-100 text-indigo-700 px-10 py-6 rounded-lg font-semibold hover:bg-indigo-200 transition">Job Vacancies</a>
      <a href="{{ route('careers.internship') }}" class="bg-indigo-100 text-indigo-700 px-10 py-6 rounded-lg font-semibold hover:bg-indigo-200 transition">Internships</a>
    </div>

  </div>
</section>
@endsection
