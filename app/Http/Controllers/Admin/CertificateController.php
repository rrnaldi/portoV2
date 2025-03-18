<?php

namespace App\Http\Controllers\Admin;

use App\Models\Certificate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\WebpEncoder;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $certificates = Certificate::all();
        return view('admin.certificate.index', compact('certificates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.certificate.create');
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
            'imagesertif' => 'required|image|mimes:jpg,jpeg,png,gif,svg',
        ]);
    
        // Proses upload gambar
        if ($request->hasFile('imagesertif')) {
            $image = $request->file('imagesertif');
    
            // Inisialisasi ImageManager dengan driver GD
            $manager = new ImageManager(new Driver());
    
            // Proses gambar ke format WebP (menggunakan encoder baru)
            $imageResized = $manager->read($image)->encode(new WebpEncoder(100));
    
            // Buat nama file baru dengan ekstensi webp
            $imageName = time() . '.webp';
            $imagePath = 'certificate/' . $imageName;
    
            // Simpan ke storage
            Storage::disk('public')->put($imagePath, (string) $imageResized);
        } else {
            $imagePath = null;
        }
    
        // Simpan data ke database
        Certificate::create([
            'imagesertif' => $imagePath,
            'name' => $request->name,
        ]);
    
        // Redirect dengan pesan sukses
        return redirect()->route('certificates.index')->with('success', 'Data Berhasil Dibuat.');
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
        $certificate = Certificate::findOrFail($id);
        return view('admin.certificate.edit', compact('certificate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $certificate = Certificate::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:255',
        'imagesertif' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:6000'
    ]);

    // Update data teks
    $certificate->name = $request->name;

    // Handle file upload jika ada
    if ($request->hasFile('imagesertif')) {
        // Hapus gambar lama jika ada
        if ($certificate->image) {
            Storage::disk('public')->delete($certificate->image);
        }

        $image = $request->file('imagesertif');

        // Inisialisasi ImageManager dengan driver GD
        $manager = new ImageManager(new Driver());

        // Proses gambar ke format WebP
        $imageResized = $manager->read($image)->encode(new WebpEncoder(100));

        // Buat nama file baru dengan ekstensi webp
        $imageName = time() . '.webp';
        $imagePath = 'certificate/' . $imageName;

        // Simpan ke storage
        Storage::disk('public')->put($imagePath, (string) $imageResized);

        // Simpan path baru ke database
        $certificate->imagesertif = $imagePath;
    }


    $certificate->save();

    return redirect()->route('certificates.index')->with('success', 'Data Berhasil Diperbarui.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Certificate $certificate)
    {
        $certificate->delete();
        return redirect()->route('certificates.index')->with('success', 'Data Berhasil Dihapus.');
    }
}
