<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\Organization;
use Illuminate\Support\Facades\Storage;

class AdminDivOSISController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.divisi.input', [
            'name' => 'osis'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_divisi' => 'required|max:255',
            'bidang' => 'required|max:255',
            'slug' => 'required|unique:divisions',
            'gambar_divisi' => 'image|file|max:2048',
            'deskripsi_divisi' => 'required',
        ]);
        
        $org = Organization::where('nama_organisasi', $request->nama_organisasi)->first();
        $validatedData['organization_id'] = $org->id;
        
        if($request->file('gambar_divisi')){
            $validatedData['gambar_divisi'] = $request->file('gambar_divisi')->store('divisi-images');
        }

        Division::create($validatedData);

        return redirect('/profil-osis')->with('success', 'New Division has been added!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $divisi = Division::where('slug', $slug)->first();
        $name = 'osis';
        return view('admin.divisi.edit', compact('divisi', 'name'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $divisi = Division::where('slug', $slug)->first();

        $input = ([
            'nama_divisi' => 'required|max:255',
            'bidang' => 'required|max:255',
            'gambar_divisi' => 'image|file|max:2048',
            'deskripsi_divisi' => 'required',
        ]);

        if($request->slug != $divisi->slug){
            $input['slug'] = 'required|unique:divisions';
        }

        $validatedData = $request->validate($input);


        if($request->file('gambar_divisi')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['gambar_divisi'] = $request->file('gambar_divisi')->store('divisi-images');
        }

        Division::where('id', $divisi->id)->update($validatedData);

        return redirect('/profil-osis')->with('success', 'Division has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $divisi = Division::where('slug', $slug)->first();

        if($divisi->gambar_divisi){
            Storage::delete($divisi->gambar_divisi);
        }

        Division::destroy($divisi->id);
        return redirect('/profil-osis')->with('success', 'Journal has been deleted!');
    }
}
