@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-4">
    <form action="{{ route('experiences.update', $experience->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label class="block">Company</label>
        <input type="text" name="company" class="rounded-md border p-2 w-full" value="{{ $experience->company }}">
    
        <label class="block mt-4">Start Date</label>
        <input type="date" name="start_date" class="rounded-md border p-2 w-full" value="{{ $experience->start_date }}">

        <label class="block mt-4">End Date</label>
        <input type="date" name="end_date" class="rounded-md border p-2 w-full" value="{{ $experience->end_date }}">

        <label class="block mt-4">Description</label>
        <textarea name="description" class="rounded-md border p-2 w-full">{{ $experience->description }}</textarea>


        <label class="block">Image</label>
        <div class="mb-2">
            <img src="{{ asset('storage/' . $experience->imgexp) }}" class="w-16 h-16 object-cover">
        </div>
        <input type="file" name="imgexp" class="rounded-md border p-2 w-full">
    
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 mt-4 rounded">Update</button>
    </form>
    
</div>
@endsection
