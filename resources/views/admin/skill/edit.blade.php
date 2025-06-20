@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-4">
    <form action="{{ route('skills.update', $skill->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label class="block">Name</label>
        <input type="text" name="name" class="rounded-md border p-2 w-full" value="{{ $skill->name }}">
        
        <label class="block">Percentage</label>
        <input type="text" name="percentage" class="rounded-md border p-2 w-full" value="{{ $skill->percentage }}">

    
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 mt-4 rounded">Update</button>
    </form>
    
</div>
@endsection
