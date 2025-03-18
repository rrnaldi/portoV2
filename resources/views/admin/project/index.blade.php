@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Project</h1>

    <!-- Tombol Tambah -->
    <div class="mb-4">
        <a href="{{ route('projects.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg shadow">
            + Create New
        </a>
    </div>

    <!-- Tabel Responsif -->
    <div class="overflow-x-auto bg-white shadow-md rounded-lg p-4">
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100 text-gray-700">
                    <th class="px-4 py-2 border">Name</th>
                    <th class="px-4 py-2 border">Image</th>
                    <th class="px-4 py-2 border">Description</th>
                    <th class="px-4 py-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                <tr class="hover:bg-gray-50">
                    <td class="border px-4 py-2">{{ $project->name }}</td>
                    <td class="border px-4 py-2 text-center">
                        <img src="{{ asset('storage/' . $project->imgprojek) }}" class="w-16 h-16 object-cover">
                    </td>
                    <td class="border px-4 py-2">{{ $project->deskripsi }}</td>
                    <td class="border px-4 py-2 text-center">
                        <div class="flex items-center justify-center gap-2">
                            <a href="{{ route('projects.edit', $project->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-md shadow">
                                Edit
                            </a>
                            <form action="{{ route('projects.destroy', $project->id) }}" method="POST" 
                                onsubmit="return confirm('Are you sure?')" class="inline-flex m-0 p-0">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md shadow">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 2000
        });
    </script>
@endif
@endsection




