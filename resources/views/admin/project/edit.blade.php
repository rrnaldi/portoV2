@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-4">
    <form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    
        <label class="block">Image</label>
        <div class="mb-2">
            <img src="{{ asset('storage/' . $project->imgprojek) }}" class="w-16 h-16 object-cover">
        </div>
        <input type="file" name="imgprojek" class="rounded-md border p-2 w-full">
    
        <label class="block">Name</label>
        <input type="text" name="name" class="rounded-md border p-2 w-full" value="{{ $project->name }}">
    
        <label class="block mt-4">Description</label>
        <textarea name="deskripsi" class="rounded-md border p-2 w-full">{{ $project->deskripsi }}</textarea>

         <!-- Github Url -->
        <label class="block">Github Url</label>
        <input type="text" name="github_url" class="rounded-md border p-2 w-full" value="{{ $project->github_url }}">
    
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 mt-4 rounded">Update</button>
    </form>
    
</div>
@endsection
