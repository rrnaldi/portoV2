@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-4">
    <form action="{{ route('educations.update', $education->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label class="block">Name</label>
        <input type="text" name="name" class="rounded-md border p-2 w-full" value="{{ $education->name }}">
        
        <label class="block">Description</label>
        <input type="text" name="description" class="rounded-md border p-2 w-full" value="{{ $education->description }}">
    
        <label class="block mt-4">Year</label>
        <input type="text" name="year" class="rounded-md border p-2 w-full" value="{{ $education->year }}">
    
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 mt-4 rounded">Update</button>
    </form>
    
</div>
@endsection
