@extends('layout.user')

@section('content')
<div class="container mt-6 mx-auto p-6 flex flex-col items-center md:flex-row h-auto" 
     x-data="{ imgSrc: '', desc: '', show: false, activeProject: null }">

    <!-- Bagian Kiri: Daftar Nama Proyek -->
    <div class="w-full md:w-1/3 flex flex-col items-center md:items-start h-full md:h-auto justify-center">
        <h2 class="text-xl font-bold mb-4 text-center md:text-left">Pilih Project</h2>
        <ul class="w-full max-h-[400px] md:max-h-screen overflow-auto">
            @foreach($projects as $project)
                <li class="w-full">
                    <button 
                        class="project-btn font-bold block w-full text-center md:text-left px-4 py-2 mb-2 rounded transition"
                        :class="activeProject === '{{ $project->name }}' ? 'bg-white text-black border border-blue-900' : 'bg-blue-900 text-white'"
                        @click="imgSrc='{{ asset('storage/' . $project->imgprojek) }}'; desc='{{ $project->deskripsi }}'; show=false; activeProject='{{ $project->name }}'; setTimeout(() => show=true, 100)">
                        {{ $project->name }}
                    </button>
                </li>
            @endforeach
        </ul>
    </div>

    <!-- Bagian Kanan: Gambar -->
    <div class="w-full md:w-2/3 flex flex-col items-center mt-4 md:mt-0 ms-0 md:ms-3">
        <!-- Deskripsi dengan animasi -->
        <p x-show="show" x-transition.opacity x-transition.duration.500ms
           class="text-center text-lg text-blue-900 font-semibold mb-2" x-text="desc"></p>

        <!-- Gambar dengan animasi -->
        <img x-show="show" 
             x-transition:enter="transition ease-out duration-700 transform"
             x-transition:enter-start="opacity-0 scale-90"
             x-transition:enter-end="opacity-100 scale-100"
             :src="imgSrc" 
             alt="Project Image" 
             class="max-w-full max-h-[400px] h-auto rounded-lg shadow-lg">
    </div>
</div>
@endsection
