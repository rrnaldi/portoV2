<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\WebpEncoder;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $projects = Project::all();
        return view('admin.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.project.create');
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            // Pastikan hanya file gambar yang diterima
            'name' => 'required|string|max:255',
            'imgprojek' => 'required|image|mimes:jpg,jpeg,png,gif,svg',
            'deskripsi' => 'required|string',
            'github_url' => 'required|string',
            
        ]);
    
        // Proses upload gambar
        if ($request->hasFile('imgprojek')) {
            $image = $request->file('imgprojek');
    
            // Inisialisasi ImageManager dengan driver GD
            $manager = new ImageManager(new Driver());
    
            // Proses gambar ke format WebP (menggunakan encoder baru)
            $imageResized = $manager->read($image)->encode(new WebpEncoder(100));
    
            // Buat nama file baru dengan ekstensi webp
            $imageName = time() . '.webp';
            $imagePath = 'project/' . $imageName;
    
            // Simpan ke storage
            Storage::disk('public')->put($imagePath, (string) $imageResized);
        } else {
            $imagePath = null;
        }
    
    
        // Simpan data ke database
        Project::create([
            'imgprojek' => $imagePath,
            'name' => $request->name,
            'deskripsi' => $request->deskripsi,
            'github_url' => $request->github_url,
        ]);
    
        // Redirect dengan pesan sukses
        return redirect()->route('projects.index')->with('success', 'Data Berhasil Dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::findOrFail($id);
        return view('admin.project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $project = Project::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'github_url' => 'required|string',
        'imgprojek' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:6000'
    ]);

    // Update data teks
    $project->name = $request->name;
    $project->deskripsi = $request->deskripsi;
    $project->github_url = $request->github_url;

    // Handle file upload jika ada
    if ($request->hasFile('imgprojek')) {
        // Hapus gambar lama jika ada
        if ($project->imgprojek) {
            Storage::disk('public')->delete($project->imgprojek);
        }

        $image = $request->file('imgprojek');

        // Inisialisasi ImageManager dengan driver GD
        $manager = new ImageManager(new Driver());

        // Proses gambar ke format WebP
        $imageResized = $manager->read($image)->encode(new WebpEncoder(100));

        // Buat nama file baru dengan ekstensi webp
        $imageName = time() . '.webp';
        $imagePath = 'project/' . $imageName;

        // Simpan ke storage
        Storage::disk('public')->put($imagePath, (string) $imageResized);

        // Simpan path baru ke database
        $project->imgprojek = $imagePath;
    }


    $project->save();

    return redirect()->route('projects.index')->with('success', 'Data Berhasil Diperbarui.');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('abouts.index')->with('success', 'Data Berhasil Dihapus.');
    }
}
