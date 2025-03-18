@extends('layout.user')

@section('content')
<div class="h-full flex w-full justify-center items-center dark:bg-gray-800 mt-6" x-data="{ showModal: false, modalImg: '' }">
    <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 p-4 md:p-4 xl:p-6">
        @foreach ( $certificate as $certif)

        <!-- card  -->
        <div class="relative bg-white border rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 transform transition duration-500 hover:scale-105" data-aos="zoom-in" data-aos-delay="1000">
            <div class="p-2 flex justify-center">
                <a href="#" @click.prevent="modalImg='{{ asset('storage/'. $certif->imagesertif) }}'; showModal=true">
                    <img class="rounded-md aspect-[4/3] object-cover w-full h-auto cursor-pointer"
                         src="{{ asset('storage/'. $certif->imagesertif) }}"
                         loading="lazy">
                </a>
            </div>
            <div class="px-4 pb-3">
                <div>
                    <a href="#">
                        <h5 class="text-xl font-semibold tracking-tight hover:text-violet-800 dark:hover:text-violet-300 text-navy dark:text-white">
                            {{ $certif->name }}
                        </h5>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Modal Popup -->
    <div x-show="showModal" 
         x-transition.opacity.duration.300ms 
         class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-80 z-50"
         @click.self="showModal=false">

        <div class="relative max-w-4xl w-full p-4">
            <button class="absolute top-2 right-2 bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold rounded-full px-3 py-1"
                    @click="showModal=false">
                ✕
            </button>
            <img :src="modalImg" class="w-full max-h-[80vh] object-contain rounded-lg shadow-lg">
        </div>
    </div>
</div>

  
@endsection


