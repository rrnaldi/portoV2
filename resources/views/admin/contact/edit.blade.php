@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-4">
    <form action="{{ route('contacts.update', $contact->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label class="block">Name</label>
        <input type="text" name="name" class="rounded-md border p-2 w-full" value="{{ $contact->name }}">
    
        <label class="block mt-4">Value</label>
        <input type="text" name="value" class="rounded-md border p-2 w-full" value="{{ $contact->year }}">
    
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 mt-4 rounded">Update</button>
    </form>
    
</div>
@endsection
