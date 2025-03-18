<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $educations = Education::all();
        return view('admin.education.index', compact('educations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.education.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'year' => 'required|date',
        ]);
    
        // Simpan data ke database
        Education::create([
            'name' => $request->name,
            'description' => $request->description,
            'year' => $request->year,
        ]);
    
        // Redirect dengan pesan sukses
        return redirect()->route('educations.index')->with('success', 'Data Berhasil Dibuat.');
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
        $education = Education::findOrFail($id);
        return view('admin.education.edit', compact('education'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $education = Education::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string|max:255',
        'year' => 'required|date',
       
    ]);

    // Update data teks
    $education->name = $request->name;
    $education->description = $request->description;
    $education->year = $request->year;


    $education->save();

    return redirect()->route('educations.index')->with('success', 'Data Berhasil Diperbarui.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Education $education)
    {
        $education->delete();
        return redirect()->route('educations.index')->with('success', 'Data Berhasil Dihapus.');
    }
}
