@extends('layouts.app')

@section('content')
<div class="py-12 bg-gray-50">
    <div class="container mx-auto max-w-4xl px-4">

        {{-- Header Section --}}
        <div class="bg-white p-8 rounded-xl shadow-sm mb-8">
            <h1 class="text-3xl font-bold text-indigo-700 mb-2">{{ $item->title }}</h1>
            <div class="flex flex-wrap gap-4 text-gray-600 text-sm">
                <span><i class="fas fa-map-marker-alt"></i> {{ $item->location }}</span>
                @if(isset($item->type))
                    <span class="capitalize"><i class="fas fa-briefcase"></i> {{ str_replace('-', ' ', $item->type) }}</span>
                @else
                    <span><i class="fas fa-hourglass-half"></i> {{ $item->duration }}</span>
                @endif
                @if($item->deadline)
                    <span class="{{ \Carbon\Carbon::parse($item->deadline)->isPast() ? 'text-red-600' : 'text-indigo-600' }} font-semibold">
                        <i class="fas fa-calendar-alt"></i> Deadline: {{ \Carbon\Carbon::parse($item->deadline)->format('d M, Y') }}
                    </span>
                @endif
            </div>
        </div>

        {{-- Content Section --}}
        <div class="bg-white p-8 rounded-xl shadow-sm mb-8 prose max-w-none">
            <h3 class="text-xl font-bold mb-4 border-b pb-2">Description</h3>
            <div class="mb-6">{!! $item->description !!}</div>

            @if($item->requirements)
                <h3 class="text-xl font-bold mt-8 mb-4 border-b pb-2">Requirements</h3>
                <div class="mb-6">{!! $item->requirements !!}</div>
            @endif

            @if($item->benefits)
                <h3 class="text-xl font-bold mt-8 mb-4 border-b pb-2">Benefits</h3>
                <div>{!! $item->benefits !!}</div>
            @endif
        </div>

        {{-- Application Section Logic --}}
        @php $isPast = $item->deadline && \Carbon\Carbon::parse($item->deadline)->isPast(); @endphp

        <div class="bg-white p-8 rounded-xl shadow-md border-t-4 {{ $isPast ? 'border-red-500' : 'border-indigo-600' }}">

            @if($isPast)
                {{-- DEADLINE PASSED VIEW --}}
                <div class="text-center py-6">
                    <div class="text-red-500 text-5xl mb-4">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-2">Application Closed</h2>
                    <p class="text-gray-600">The deadline for this position was {{ \Carbon\Carbon::parse($item->deadline)->format('d M, Y') }}. We are no longer accepting applications.</p>
                    <a href="{{ ($type === 'job') ? route('careers.job') : route('careers.internship') }}"
                       class="inline-block mt-4 text-indigo-600 font-semibold hover:underline">
                        ← View other {{ $type === 'job' ? 'Jobs' : 'Internships' }}
                    </a>
                </div>
            @else
                {{-- REGULAR FORM VIEW --}}
                <h2 class="text-2xl font-bold mb-6">Apply for this Position</h2>

                @if(session('success'))
                    <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6 border border-green-200">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-6 border border-red-200">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('career.apply', ['type' => $type, 'id' => $item->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="grid md:grid-cols-2 gap-6 mb-4">
                        <div>
                            <label class="block text-sm font-semibold mb-1 text-gray-700">Full Name *</label>
                            <input type="text" name="applicant_name" class="w-full border rounded-lg p-2.5 focus:ring-2 focus:ring-indigo-200 outline-none" required value="{{ old('applicant_name') }}">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-1 text-gray-700">Email Address *</label>
                            <input type="email" name="email" class="w-full border rounded-lg p-2.5 focus:ring-2 focus:ring-indigo-200 outline-none" required value="{{ old('email') }}">
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6 mb-4">
                        <div>
                            <label class="block text-sm font-semibold mb-1 text-gray-700">Phone Number *</label>
                            <input type="text" name="phone" class="w-full border rounded-lg p-2.5 focus:ring-2 focus:ring-indigo-200 outline-none" required value="{{ old('phone') }}">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-1 text-gray-700">Resume (PDF/DOC) *</label>
                            <input type="file" name="resume" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" required>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-semibold mb-1 text-gray-700">Cover Letter / Additional Info</label>
                        <textarea name="cover_letter" rows="4" class="w-full border rounded-lg p-2.5 focus:ring-2 focus:ring-indigo-200 outline-none" placeholder="Tell us why you are a good fit...">{{ old('cover_letter') }}</textarea>
                    </div>

                    <button type="submit" class="w-full bg-indigo-600 text-white font-bold py-3 rounded-lg hover:bg-indigo-700 transition duration-300 shadow-lg">
                        Submit Application
                    </button>
                </form>
            @endif
        </div>
    </div>
</div>

<script>
    // Safety client-side check
    const applyForm = document.querySelector('form');
    if(applyForm) {
        applyForm.addEventListener('submit', function(e) {
            const deadline = "{{ $item->deadline }}";
            if (deadline) {
                const deadlineDate = new Date(deadline);
                const today = new Date();
                today.setHours(0, 0, 0, 0);

                if (deadlineDate < today) {
                    e.preventDefault();
                    alert('The deadline for this application has passed. Submissions are closed.');
                }
            }
        });
    }
</script>
@endsection
