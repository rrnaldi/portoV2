@extends('layout.user')

@section('content')
<div class="container mx-auto px-6 py-12 mt-6" x-data="{ show: false }" x-init="setTimeout(() => show = true, 300)">
    <div class="flex flex-col md:flex-row items-center md:items-start gap-8">
        <!-- Bagian Gambar -->
        <div class="w-full md:w-1/3 flex justify-center"
             x-show="show"
             x-transition:enter="transition ease-out duration-1000 transform"
             x-transition:enter-start="opacity-0 translate-x-10"
             x-transition:enter-end="opacity-100 translate-x-0">
            <img src="{{ asset('storage/' . $about->image) }}" 
                 alt="Profile Image" 
                 class="w-60 h-60 md:w-80 md:h-80 object-cover rounded-lg shadow-lg mt-1">
        </div>

        <!-- Bagian Teks -->
        <div class="w-full md:w-2/3 text-center md:text-left mt-3"
             x-show="show"
             x-transition:enter="transition ease-out duration-1000 transform"
             x-transition:enter-start="opacity-0 -translate-x-10"
             x-transition:enter-end="opacity-100 translate-x-0">
            <h1 class="text-4xl font-bold text-navy">{{ $about->name }}</h1>
            <h2 class="text-2xl font-semibold text-navy mt-2">{{ $about->skill }}</h2>
            <p class="text-navy mt-4 leading-relaxed text-left">
                {{ $about->deskripsi }}
            </p>
        </div>
    </div>
</div>


@endsection
