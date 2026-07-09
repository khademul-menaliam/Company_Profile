@extends('layouts.app')
@section('title', 'About Us | AR Engineering')

@section('content')

<style>
    .rich-text-content ul { list-style-type: disc; padding-left: 1.25rem; margin-bottom: 0.5rem; }
    .rich-text-content ol { list-style-type: decimal; padding-left: 1.25rem; margin-bottom: 0.5rem; }
    .rich-text-content li { margin-bottom: 0.25rem; }
    
    .pillar-card {
        position: relative;
        border: 2px solid #f3f4f6;
        transition: background-color 0.4s ease, border-color 0.4s ease;
        z-index: 1;
    }
    .pillar-card:hover {
        background-color: #eff6ff;
        border-color: transparent; /* Hide static border to show animated one */
    }
    
    .pillar-card::before {
        content: "";
        position: absolute;
        inset: -2px; /* Perfectly covers the original border area */
        border-radius: inherit; /* Matches card radius */
        border: 2px solid #2563eb;
        z-index: -1;
        clip-path: inset(0 100% 0 0);
        transition: clip-path 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .pillar-card:hover::before {
        clip-path: inset(0 0 0 0);
    }

    /* Golden sweep effect for Leadership and Team */
    .golden-pillar-card {
        position: relative;
        border: 2px solid #f3f4f6;
        transition: background-color 0.4s ease, border-color 0.4s ease;
        z-index: 1;
    }
    .golden-pillar-card:hover {
        background-color: #fffbeb; /* Light gold background */
        border-color: transparent;
    }
    
    .golden-pillar-card::before {
        content: "";
        position: absolute;
        inset: -2px;
        border-radius: inherit;
        border: 2px solid #f59e0b; /* Golden border */
        z-index: -1;
        clip-path: inset(0 100% 0 0);
        transition: clip-path 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .golden-pillar-card:hover::before {
        clip-path: inset(0 0 0 0);
    }
</style>

<!-- Hero Section -->
<section class="relative bg-cover bg-center h-[60vh] min-h-[400px]" style="background-image: url('{{ asset('images/hero1.jpg') }}');">
    <div class="absolute inset-0 bg-slate-900/75"></div>
    <!-- Industrial accent lines -->
    <div class="absolute top-0 left-0 w-full h-1 bg-blue-600"></div>
    <div class="absolute bottom-0 left-0 w-full h-1 bg-blue-600"></div>
    
    <div class="max-w-[1440px] mx-auto relative z-10 flex flex-col items-center justify-center h-full px-4 sm:px-6 lg:px-8">
        <span class="text-blue-400 font-bold tracking-[0.2em] uppercase text-sm mb-4 border border-blue-500/50 px-4 py-1 rounded">Corporate Profile</span>
        <h1 class="text-4xl md:text-6xl font-extrabold text-white text-center drop-shadow-lg tracking-tight uppercase">About AR Engineering</h1>
        <div class="mt-6 w-24 h-1 bg-blue-500 rounded-full"></div>
    </div>
</section>

<!-- About Us (Engineering Style - No Image) -->
<section class="py-16 md:py-24 bg-white relative">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-12">
            <span class="text-blue-600 font-bold tracking-wider uppercase text-sm">Who We Are</span>
            <h2 class="text-3xl md:text-5xl font-extrabold text-gray-900 mt-2 tracking-tight uppercase">{{ $aboutUs->title ?? 'About Us' }}</h2>
            <div class="mt-4 w-20 h-1.5 bg-blue-600 mx-auto"></div>
        </div>
        
        <div class="bg-gray-50 border-l-4 border-blue-600 p-8 md:p-12 shadow-sm rounded-r-lg relative">
            <div class="relative z-10">
            @if(isset($aboutUs) && $aboutUs->content)
                <div class="rich-text-content text-gray-700 text-lg leading-relaxed text-justify [&_ul]:list-disc [&_ul]:list-inside [&_ul]:marker:text-blue-600 [&_ul]:mb-4 [&_ol]:list-decimal [&_ol]:list-inside [&_ol]:marker:text-blue-600 [&_ol]:mb-4 [&_li]:mb-2 [&_p]:mb-4">
                    {!! $aboutUs->content !!}
                </div>
            @else
                <div class="rich-text-content text-gray-700 text-lg leading-relaxed text-justify [&_ul]:list-disc [&_ul]:list-inside [&_ul]:marker:text-blue-600 [&_ul]:mb-4 [&_ol]:list-decimal [&_ol]:list-inside [&_ol]:marker:text-blue-600 [&_ol]:mb-4 [&_li]:mb-2 [&_p]:mb-4">
                    <p class="text-xl font-semibold text-gray-900 mb-6">AR Engineering is an Industrial Engineering Solution Provider specializing in Consultancy, Design, Supply, and Erection services, delivering innovative and sustainable engineering solutions.</p>
                    <p>Founded in [Year], we have been committed to combining technical expertise, practical solutions, and industry best practices to help businesses achieve operational excellence. Every project is approached with careful planning, technical precision, and a strong commitment to quality.</p>
                    <p class="font-bold text-gray-900 mt-8 mb-4 border-b border-gray-200 pb-2">Our Core Services Include:</p>
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-2">
                        <li>Building Information Modeling (BIM)</li>
                        <li>Mechanical, Electrical & Plumbing (MEP)</li>
                        <li>HVAC System Design & Installation</li>
                        <li>Fire Detection & Life Safety Systems</li>
                        <li>Industrial Pump Supply & Maintenance</li>
                        <li>Engineering Design & Technical Consultancy</li>
                        <li>Operation, Maintenance & Support</li>
                    </ul>
                </div>
            @endif
            </div>
        </div>
    </div>
</section>

<!-- Strategic Pillars: Mission, Vision, Quality, Values -->
<section class="py-16 bg-gray-50 relative">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
            <!-- Mission -->
            <div class="pillar-card bg-white shadow-sm p-8 rounded-2xl">
                <div class="flex items-center gap-4 mb-4 text-blue-600">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    <h3 class="text-2xl font-bold text-gray-900 uppercase tracking-wide">{{ $mission->title ?? 'Our Mission' }}</h3>
                </div>
                <div class="rich-text-content text-gray-600 leading-relaxed">
                    @if(isset($mission) && $mission->content)
                        {!! $mission->content !!}
                    @else
                        <p>To deliver reliable, high-quality, and cost-effective industrial engineering solutions that empower our clients to achieve maximum operational efficiency and sustainable growth.</p>
                    @endif
                </div>
            </div>
            
            <!-- Vision -->
            <div class="pillar-card bg-white shadow-sm p-8 rounded-2xl">
                <div class="flex items-center gap-4 mb-4 text-blue-600">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    <h3 class="text-2xl font-bold text-gray-900 uppercase tracking-wide">{{ $vision->title ?? 'Our Vision' }}</h3>
                </div>
                <div class="rich-text-content text-gray-600 leading-relaxed">
                    @if(isset($vision) && $vision->content)
                        {!! $vision->content !!}
                    @else
                        <p>To become the premier engineering solution provider in Bangladesh, recognized for our technical excellence, innovative approaches, and unyielding commitment to safety and quality.</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="flex flex-col gap-8">
            <!-- Core Values -->
            <div class="pillar-card bg-white p-8 rounded-2xl shadow-sm">
                <div class="flex items-center gap-4 mb-6 text-blue-600">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <h3 class="text-2xl font-bold text-gray-900 uppercase tracking-wide">{{ $coreValues->title ?? 'Our Core Values' }}</h3>
                </div>
                <div class="relative z-10">
                @if(isset($coreValues) && $coreValues->content)
                    <div class="rich-text-content text-gray-600 leading-relaxed [&_ul]:list-disc [&_ul]:list-inside [&_ul]:marker:text-blue-500 [&_li]:mb-2 [&_p]:mt-4">
                        {!! $coreValues->content !!}
                    </div>
                @else
                    <div class="rich-text-content text-gray-600 leading-relaxed [&_ul]:list-disc [&_ul]:list-inside [&_ul]:marker:text-blue-500 [&_li]:mb-2 [&_p]:mt-4">
                        <ul>
                            <li>Integrity & Professionalism</li>
                            <li>Engineering Excellence</li>
                            <li>Quality & Reliability</li>
                            <li>HSE Responsibility</li>
                            <li>Continuous Innovation</li>
                            <li>Customer-focused Service</li>
                        </ul>
                    </div>
                @endif
                </div>
            </div>

            <!-- Quality Policy -->
            <div class="pillar-card bg-white shadow-sm p-8 rounded-2xl">
                <div class="flex items-center gap-4 mb-4 text-blue-600">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                    <h3 class="text-2xl font-bold text-gray-900 uppercase tracking-wide">{{ $qualityPolicy->title ?? 'Quality Policy' }}</h3>
                </div>
                <div class="rich-text-content text-gray-600 leading-relaxed mb-4">
                    @if(isset($qualityPolicy) && $qualityPolicy->content)
                        {!! $qualityPolicy->content !!}
                    @else
                        <p>We strictly adhere to international engineering codes and standards. Our quality assurance framework guarantees zero compromise on material integrity and project execution safety.</p>
                    @endif
                </div>
                <div class="h-1 w-16 bg-blue-600 mt-2"></div>
            </div>
        </div>
    </div>
</section>

<!-- Expertise & Philosophy -->
<section class="py-16 bg-gray-50 border-t border-gray-200">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            
            <div>
                <span class="text-blue-600 font-bold tracking-wider uppercase text-sm mb-2 block">{{ $philosophy->title ?? 'Our Philosophy' }}</span>
                <h2 class="text-3xl font-extrabold text-gray-900 mb-6 uppercase">{{ $philosophy->subtitle ?? 'Built on Excellence' }}</h2>
                <div class="rich-text-content text-gray-700 leading-relaxed mb-6 text-lg">
                    @if(isset($philosophy) && $philosophy->content)
                        {!! $philosophy->content !!}
                    @else
                        <p>We believe in sustainable engineering, continuous improvement, and customer-centric solutions. Our philosophy emphasizes integrity, innovation, and excellence in every project we undertake.</p>
                    @endif
                </div>
                <div class="w-16 h-1.5 bg-blue-600"></div>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Expert Team -->
                <div class="bg-white p-6 border-l-4 border-gray-900 shadow-sm hover:shadow-md transition flex flex-col justify-center">
                    <h3 class="text-lg font-bold mb-2 text-gray-900 uppercase tracking-wide">Expert Team</h3>
                    <p class="text-gray-600 text-sm">Highly skilled engineers and technicians with decades of combined industrial experience.</p>
                </div>
                <!-- High Quality -->
                <div class="bg-white p-6 border-l-4 border-blue-600 shadow-sm hover:shadow-md transition flex flex-col justify-center">
                    <h3 class="text-lg font-bold mb-2 text-gray-900 uppercase tracking-wide">High Quality</h3>
                    <p class="text-gray-600 text-sm">Rigorous adherence to global standards ensuring safe and dependable outcomes.</p>
                </div>
                <!-- Innovative Solutions -->
                <div class="bg-white p-6 border-l-4 border-gray-900 shadow-sm hover:shadow-md transition flex flex-col justify-center sm:col-span-2">
                    <h3 class="text-lg font-bold mb-2 text-gray-900 uppercase tracking-wide">Innovative Solutions</h3>
                    <p class="text-gray-600 text-sm">Deploying modern engineering tools and cutting-edge designs to maximize efficiency and ROI.</p>
                </div>
            </div>
            
        </div>
    </div>
</section>

<!-- Advisor Messages -->
<section class="bg-white py-16">
  <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-10">
        <h2 class="text-3xl font-bold text-slate-900 uppercase tracking-tight">Leadership Messages</h2>
        <div class="mt-3 w-16 h-1 bg-blue-600 rounded-full mx-auto"></div>
    </div>
    <div class="flex flex-wrap justify-center gap-8">
      @forelse ($messages as $message)
        <div class="golden-pillar-card bg-slate-50 p-6 rounded-lg shadow-sm text-center max-w-sm flex-1 basis-[280px]">
          <img
            src="{{ $message->image ? asset('storage/'.$message->image) : asset('images/logo.png') }}"
            alt="{{ $message->title ?? ucfirst($message->type) }}"
            class="w-24 h-24 mx-auto rounded-full mb-4 object-cover border-4 border-white shadow-sm">
          <h3 class="text-lg font-bold mb-2 text-slate-900">
            {{ $message->title ?? ucfirst($message->type) }}
          </h3>
          <p class="text-slate-600 text-sm italic mb-4 leading-relaxed">
            “{{ $message->content ?? 'Message will be updated soon.' }}”
          </p>
          <p class="font-bold text-sm text-slate-900">
            {{ $message->subtitle ?? '' }}
          </p>
        </div>
      @empty
        <div class="text-slate-500 text-center w-full py-8">Messages will be updated soon</div>
      @endforelse
    </div>
  </div>
</section>

<!-- Meet Our Team -->
<section class="py-16 bg-gray-50 border-t border-gray-200">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10">
            <span class="text-blue-600 font-bold tracking-wider uppercase text-xs md:text-sm">Our People</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mt-1 tracking-tight uppercase">Meet Our Team</h2>
            <div class="mt-3 w-16 h-1 bg-blue-600 mx-auto rounded-full"></div>
        </div>
        @if($teamMembers->count())
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 justify-items-center">
            @foreach ($teamMembers as $member)
            <div class="golden-pillar-card group bg-white p-5 rounded-lg shadow-sm flex flex-col items-center text-center w-full max-w-[260px]">
                <div class="relative w-24 h-24 mb-4">
                    <div class="absolute inset-0 rounded-full border-2 border-transparent group-hover:border-blue-500 transition-colors duration-300 z-10"></div>
                    <div class="w-full h-full overflow-hidden rounded-full bg-gray-100">
                        <img src="{{ $member->image_url }}" alt="{{ $member->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" style="object-position: 50% 10%;">
                    </div>
                </div>
                <h3 class="font-bold text-gray-900 truncate w-full" title="{{ $member->name }}">{{ $member->name }}</h3>
                @if($member->position)
                <div class="mt-1">
                    <span class="text-gray-500 text-[10px] font-bold uppercase tracking-wider">{{ $member->position }}</span>
                </div>
                @endif
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>

<!-- Call to Action -->
<section class="bg-blue-600 py-12 text-white text-center">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold mb-3">Ready to start your project?</h2>
        <p class="mb-6 text-blue-100 max-w-2xl mx-auto">Join hands with AR Engineering to achieve innovative and sustainable solutions for your industrial needs.</p>
        <a href="{{ url('/contact') }}" class="inline-block bg-white text-blue-600 px-8 py-3 rounded-full font-bold hover:bg-gray-100 transition-colors shadow-lg">
            Contact Us Today
        </a>
    </div>
</section>

@endsection
