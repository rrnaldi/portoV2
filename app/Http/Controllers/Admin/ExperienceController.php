<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $experiences = Experience::all();
        return view('admin.experience.index', compact('experiences'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.experience.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'company' => 'required|string|max:255',
            'start_date' => 'date',
            'end_date' => 'date',
            'description' => 'required|string|max:1000',
            'imgexp' => 'required|image|mimes:jpg,jpeg,png,gif,svg',
        ]);
        if ($request->hasFile('imgexp')) {
            $imagePath = $request->file('imgexp')->store('experiences', 'public'); 
        } else {
            $imagePath = null; // Handle jika tidak ada gambar
        }
    
        // Simpan data ke database
        Experience::create([
            'company' => $request->company,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'description' => $request->description,
            'imgexp' => $imagePath,
        ]);
    
        // Redirect dengan pesan sukses
        return redirect()->route('experiences.index')->with('success', 'Data Berhasil Dibuat.');
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
        $experience = Experience::findOrFail($id);
        return view('admin.experience.edit', compact('experience'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $experience = Experience::findOrFail($id);
    
        $request->validate([
            'company' => 'required|string|max:255',
            'start_date' => 'date',
            'end_date' => 'date',
            'description' => 'required|string|max:1000',
            'imgexp' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg',
           
        ]);
    
        // Update data teks
        $experience->company = $request->company;
        $experience->start_date = $request->start_date;
        $experience->end_date = $request->end_date;
        $experience->description = $request->description;
        // Handle file upload jika ada
    if ($request->hasFile('imgexp')) {
        // Hapus gambar lama jika ada
        if ($experience->imgexp) {
            Storage::disk('public')->delete($experience->imgexp);
        }

        // Simpan gambar baru
        $imagePath = $request->file('imgexp')->store('experiences', 'public');
        $experience->imgexp = $imagePath;
    }
    
    
        $experience->save();
    
        return redirect()->route('experiences.index')->with('success', 'Data Berhasil Diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Experience $experience)
    {
        $experience->delete();
        return redirect()->route('experiences.index')->with('success', 'Data Berhasil Dihapus.');
    }
}
