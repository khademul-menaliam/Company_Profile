@extends('layouts.app')
@section('title', $project->title . ' | AR Engineering')

@section('content')
<div x-data="{ 
    modalOpen: false, 
    activeImage: '', 
    openModal(src) { 
        this.activeImage = src; 
        this.modalOpen = true; 
        document.body.style.overflow = 'hidden'; // Prevent background scrolling
    },
    closeModal() { 
        this.modalOpen = false; 
        this.activeImage = ''; 
        document.body.style.overflow = ''; 
    }
}" class="bg-white font-sans antialiased text-slate-800">

    <div class="relative w-full h-[60vh] md:h-[70vh] flex items-end">
        <div class="absolute inset-0">
            @if($project->image)
                <img src="{{ asset('storage/'.$project->image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover">
            @else
                <div class="w-full h-full bg-slate-900"></div>
            @endif
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/60 to-transparent"></div>
        </div>

        <div class="relative container mx-auto px-6 md:px-12 pb-16 z-10">
            <div class="max-w-4xl">
                @if($project->type)
                    <span class="inline-block py-1 px-3 rounded-full bg-indigo-600/90 text-white text-xs font-bold tracking-wider uppercase mb-4 backdrop-blur-sm shadow-sm">
                        {{ $project->type }}
                    </span>
                @endif
                <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold text-white leading-tight mb-4">
                    {{ $project->title }}
                </h1>
                @if($project->location)
                    <div class="flex items-center text-slate-300 text-lg">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        {{ $project->location }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="container mx-auto px-6 md:px-12 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-20">

            <div class="lg:col-span-8 order-2 lg:order-1 space-y-16">
                
                <div>
                    <h3 class="text-2xl font-bold text-slate-900 mb-4 flex items-center">
                        <span class="w-8 h-1 bg-indigo-600 mr-3 rounded-full"></span> Project Overview
                    </h3>
                    <div class="prose prose-lg text-slate-600 leading-relaxed max-w-none">
                        {!! $project->description ?? 'Description pending.' !!}
                    </div>
                </div>

                <div class="bg-slate-50 p-8 rounded-2xl border border-slate-100">
                    <h3 class="text-2xl font-bold text-slate-900 mb-4">The Challenge</h3>
                    <div class="text-slate-600 leading-relaxed">
                        {!! $project->objectives ?? 'Objectives pending.' !!}
                    </div>
                </div>

                <div>
                    <h3 class="text-2xl font-bold text-slate-900 mb-4 flex items-center">
                        <span class="w-8 h-1 bg-indigo-600 mr-3 rounded-full"></span> Our Solution
                    </h3>
                    <div class="prose prose-lg text-slate-600 leading-relaxed max-w-none mb-8">
                        {!! $project->solution ?? 'Solution pending.' !!}
                    </div>

                    @if(isset($project->approach_images) && count($project->approach_images) > 0)
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            @foreach($project->approach_images as $img)
                                <img src="{{ asset('storage/' . $img) }}" 
                                     class="rounded-xl shadow-md object-cover h-56 w-full hover:shadow-xl transition-shadow duration-300 cursor-pointer"
                                     @click="openModal('{{ asset('storage/' . $img) }}')">
                            @endforeach
                        </div>
                    @endif
                </div>

                <div>
                    <h3 class="text-2xl font-bold text-slate-900 mb-4">Technical Execution</h3>
                    <div class="bg-white border-l-4 border-indigo-500 p-6 shadow-sm rounded-r-lg">
                        <div class="prose text-slate-600">
                            {!! $project->technical_details ?? 'Technical details pending.' !!}
                        </div>
                    </div>
                </div>
            </div>

            <aside class="lg:col-span-4 order-1 lg:order-2">
                <div class="sticky top-10 space-y-8">
                    
                    <div class="bg-white p-6 rounded-2xl shadow-lg border border-slate-100">
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-4">Client</p>
                        @if($project->client)
                            <div class="flex items-center gap-4">
                                @if($project->client->logo)
                                    <img src="{{ asset('storage/' . $project->client->logo) }}" alt="{{ $project->client->name }}" 
                                         class="w-16 h-16 object-contain p-1 border border-slate-100 rounded-lg">
                                @endif
                                <div>
                                    <h4 class="font-bold text-lg text-slate-900 leading-tight">{{ $project->client->name }}</h4>
                                    <p class="text-sm text-slate-500 mt-1">Partner since  {{ $project->client->created_at ? $project->client->created_at->format('Y') : 'N/A' }}</p>
                                </div>
                            </div>
                        @else
                            <p class="text-slate-500 italic">Private Client</p>
                        @endif
                    </div>

                    <div class="bg-slate-900 text-white p-6 rounded-2xl shadow-lg relative overflow-hidden">
                        <div class="absolute -top-10 -right-10 w-32 h-32 bg-indigo-600 rounded-full opacity-20 blur-2xl"></div>
                        
                        <div class="relative z-10 space-y-6">
                            <div>
                                <p class="text-indigo-300 text-xs font-bold uppercase tracking-widest">Timeline</p>
                                <p class="text-lg font-medium mt-1">{{ $project->timeline ?? 'Ongoing' }}</p>
                            </div>
                            <div class="h-px bg-slate-700"></div>
                            <div>
                                <p class="text-indigo-300 text-xs font-bold uppercase tracking-widest">Location</p>
                                <p class="text-lg font-medium mt-1">{{ $project->location ?? 'Remote' }}</p>
                            </div>
                            <div class="h-px bg-slate-700"></div>
                            <div>
                                <p class="text-indigo-300 text-xs font-bold uppercase tracking-widest">Type</p>
                                <p class="text-lg font-medium mt-1">{{ $project->type ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </div>

                    @if($project->testimonial)
                    <div class="bg-indigo-50 p-6 rounded-2xl border border-indigo-100">
                        <svg class="w-8 h-8 text-indigo-400 mb-3" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21L14.017 18C14.017 16.8954 14.9124 16 16.017 16H19.017C19.5693 16 20.017 15.5523 20.017 15V9C20.017 8.44772 19.5693 8 19.017 8H15.017C14.4647 8 14.017 8.44772 14.017 9V11C14.017 11.5523 13.5693 12 13.017 12H12.017V5H22.017V15C22.017 18.3137 19.3307 21 16.017 21H14.017ZM5.01691 21L5.01691 18C5.01691 16.8954 5.91235 16 7.01691 16H10.0169C10.5692 16 11.0169 15.5523 11.0169 15V9C11.0169 8.44772 10.5692 8 10.0169 8H6.01691C5.46462 8 5.01691 8.44772 5.01691 9V11C5.01691 11.5523 4.56919 12 4.01691 12H3.01691V5H13.0169V15C13.0169 18.3137 10.3306 21 7.01691 21H5.01691Z"></path></svg>
                        <p class="text-indigo-900 italic font-medium leading-relaxed">"{{ $project->testimonial }}"</p>
                        @if($project->client)
                            <p class="mt-4 text-sm font-bold text-indigo-600">— {{ $project->client->name }}</p>
                        @endif
                    </div>
                    @endif

                </div>
            </aside>
        </div>
    </div>

    @if($project->gallery->isNotEmpty())
    <div class="bg-slate-50 py-20">
        <div class="container mx-auto px-6 md:px-12">
            <h2 class="text-3xl font-bold text-slate-900 mb-10 text-center">Visual Gallery</h2>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach($project->gallery as $img)
                    <div class="group relative aspect-[4/3] overflow-hidden rounded-xl bg-slate-200 cursor-zoom-in shadow-sm hover:shadow-xl transition-all duration-300"
                         @click="openModal('{{ asset('storage/' . $img->image) }}')">
                        
                        <img src="{{ asset('storage/' . $img->image) }}" 
                             alt="Gallery Image" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <div class="bg-white/20 backdrop-blur-md p-3 rounded-full text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
                                </svg>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    <div class="border-t border-slate-200 bg-white py-16 text-center">
        <p class="text-slate-500 mb-4 uppercase tracking-widest text-sm font-semibold">Ready for more?</p>
        <h2 class="text-3xl font-bold text-slate-900 mb-8">Continue Exploring</h2>
        <a href="{{ route('pIndex') }}" class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-8 py-4 rounded-full shadow-lg hover:shadow-indigo-500/30 transition-all duration-300 transform hover:-translate-y-1">
            View All Projects
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
        </a>
    </div>

    <div x-show="modalOpen" 
         style="display: none;"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/90 backdrop-blur-sm"
         @keydown.escape.window="closeModal()">

        <button @click="closeModal()" class="absolute top-6 right-6 text-white/70 hover:text-white transition z-50">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>

        <img :src="activeImage" 
             @click.outside="closeModal()"
             class="max-w-full max-h-[90vh] rounded-lg shadow-2xl transform transition-transform"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="scale-90 opacity-0"
             x-transition:enter-end="scale-100 opacity-100">
    </div>

</div>
@endsection