<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use Illuminate\Http\Request;
use Intervention\Image\Image;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\WebpEncoder;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abouts = About::all();
        return view ('admin.about.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('admin.about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            'cv' => 'nullable|mimes:pdf|max:2048', // Validasi file PDF
            'name' => 'required|string|max:255',
            'skill' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);
    
        // Proses upload gambar
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $imageResized = $manager->read($image)->encode(new WebpEncoder(100));
            $imageName = time() . '.webp';
            $imagePath = 'abouts/' . $imageName;
            Storage::disk('public')->put($imagePath, (string) $imageResized);
        }
    
        // Proses upload CV PDF
        if ($request->hasFile('cv')) {
            $cv = $request->file('cv');
            $cvName = time() . '_' . $cv->getClientOriginalName();
            $cv->move(public_path('cv'), $cvName); // ⬅️ Ini simpan di public/cv
            $cvPath = 'cv/' . $cvName;
        }
        
    
        // Simpan data ke database
        About::create([
            'image' => $imagePath,
            'cv' => $cvPath, // pastikan kolom ini ada di tabel
            'name' => $request->name,
            'skill' => $request->skill,
            'deskripsi' => $request->deskripsi,
        ]);
    
        return redirect()->route('abouts.index')->with('success', 'Data Berhasil Dibuat.');
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
    $about = About::findOrFail($id);
    return view('admin.about.edit', compact('about'));
} 


    /**
     * Update the specified resource in storage.
     */

public function update(Request $request, $id)
{
    $about = About::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:255',
        'skill' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:6000'
    ]);

    // Update data teks
    $about->name = $request->name;
    $about->skill = $request->skill;
    $about->deskripsi = $request->deskripsi;

    // Handle file upload jika ada
    if ($request->hasFile('image')) {
        // Hapus gambar lama jika ada
        if ($about->image) {
            Storage::disk('public')->delete($about->image);
        }

        $image = $request->file('image');

        // Inisialisasi ImageManager dengan driver GD
        $manager = new ImageManager(new Driver());

        // Proses gambar ke format WebP
        $imageResized = $manager->read($image)->encode(new WebpEncoder(100));

        // Buat nama file baru dengan ekstensi webp
        $imageName = time() . '.webp';
        $imagePath = 'abouts/' . $imageName;

        // Simpan ke storage
        Storage::disk('public')->put($imagePath, (string) $imageResized);

        // Simpan path baru ke database
        $about->image = $imagePath;
    }

    $about->save();

    return redirect()->route('abouts.index')->with('success', 'Data Berhasil Diperbarui.');
}

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        $about->delete();
        return redirect()->route('abouts.index')->with('success', 'Data Berhasil Dihapus.');
    }
}
