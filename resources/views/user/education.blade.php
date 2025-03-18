@extends('layout.user')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-6 text-lg font-serif">
    @foreach ($education as $edu)
    <div class="bg-gray-100 text-black border-l-8 border-blue-900 rounded-md px-4 py-3" data-aos="zoom-in" data-aos-delay="1000">
        <p class="text-lg">{{ $edu->description }}</p>
        <div class="text-black-500 font-serif text-lg pt-2">
            <span class="font-semibold font-mono">{{ $edu->name }}</span> - 
            <span class="font-mono text-black">{{ \Carbon\Carbon::parse($edu->year)->format('Y') }}</span>
        </div>
    </div>
    @endforeach
</div>
@endsection