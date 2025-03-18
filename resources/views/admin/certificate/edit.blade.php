@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-4">
    <form action="{{ route('certificates.update', $certificate->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label class="block">Name</label>
        <input type="text" name="name" class="rounded-md border p-2 w-full" value="{{ $certificate->name }}">
    
        <label class="block mt-4">Image</label>
        <div class="mb-2">
            <img src="{{ asset('storage/' . $certificate->imagesertif) }}" class="w-16 h-16 object-cover">
            <input type="file" name="imagesertif" class="rounded-md border p-2 w-full">
        </div>
    
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 mt-4 rounded">Update</button>
    </form>
    
</div>
@endsection
