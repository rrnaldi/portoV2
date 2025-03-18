<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('admin.contact.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.contact.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'value' => 'required|string|max:255',
        ]);
    
        // Simpan data ke database
        Contact::create([
            'name' => $request->name,
            'value' => $request->value,
        ]);
    
        // Redirect dengan pesan sukses
        return redirect()->route('contacts.index')->with('success', 'Data Berhasil Dibuat.');
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
        $contact = Contact::findOrFail($id);
        return view('admin.contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);
    
        $request->validate([
            'name' => 'required|string|max:255',
            'value' => 'required|string|max:255',
           
        ]);
    
        // Update data teks
        $contact->name = $request->name;
        $contact->value = $request->value;
    
    
        $contact->save();
    
        return redirect()->route('contacts.index')->with('success', 'Data Berhasil Diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Data Berhasil Dihapus.');
    }
}
