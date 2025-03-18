@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-bold mb-4 text-gray-800">Create Experience</h1>

    <form action="{{ route('experiences.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <!-- Nama -->
        <div>
            <label class="block font-medium text-gray-700">Company</label>
            <input type="text" name="company" class="border border-gray-300 rounded-md p-2 w-full" required>
        </div>
        <div>
            <label class="block font-medium text-gray-700">Start Date</label>
            <input type="date" name="start_date" class="border border-gray-300 rounded-md p-2 w-full" required>
        </div>
        <div>
            <label class="block font-medium text-gray-700">End Date</label>
            <input type="date" name="end_date" class="border border-gray-300 rounded-md p-2 w-full" required>
        </div>
        <div>
            <label class="block font-medium text-gray-700">Description</label>
            <textarea name="description" class="border border-gray-300 rounded-md p-2 w-full h-32" required></textarea>
        </div>        

        <div>
            <label class="block font-medium text-gray-700">Image</label>
            <input type="file" name="imgexp" accept="image/*" class="border border-gray-300 rounded-md p-2 w-full">
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
