@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-bold mb-4 text-gray-800">Create About</h1>

    <form action="{{ route('abouts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        
        <!-- Upload Gambar -->
        <div>
            <label class="block font-medium text-gray-700">Image</label>
            <input type="file" name="image" accept="image/*" class="border border-gray-300 rounded-md p-2 w-full">
        </div>

        <!-- Nama -->
        <div>
            <label class="block font-medium text-gray-700">Name</label>
            <input type="text" name="name" class="border border-gray-300 rounded-md p-2 w-full" required>
        </div>

        <!-- Skill -->
        <div>
            <label class="block font-medium text-gray-700">Skill</label>
            <input type="text" name="skill" class="border border-gray-300 rounded-md p-2 w-full" required>
        </div>

        <!-- Deskripsi -->
        <div>
            <label class="block font-medium text-gray-700">Description</label>
            <textarea name="deskripsi" class="border border-gray-300 rounded-md p-2 w-full" rows="4" required></textarea>
        </div>

        <div>
            <label class="block font-medium text-gray-700">CV</label>
            <input type="file" name="cv" accept="application/pdf" class="border border-gray-300 rounded-md p-2 w-full">
        </div>

        <!-- Tombol Submit -->
        <div class="mt-4">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg shadow">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
