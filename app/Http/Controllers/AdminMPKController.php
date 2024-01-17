<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminMPKController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        return view('admin.profil', [
            'title' => 'PROFIL MPK',
            'name' => 'mpk',
            'data'=> Organization::where('nama_organisasi', 'mpk')->latest()->get(),
            'div'=> Division::where('organization_id', 2)->get(),
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.profil.input',[
            'name' => 'mpk'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_organisasi' => 'required|max:5',
            'nama_angkatan' => 'required|max:255',
            'gambar_angkatan' => 'image|file|max:1024',
            'visi_angkatan' => 'required',
            'misi_angkatan' => 'required',
        ]);

        if($request->file('gambar_angkatan')){
            $validatedData['gambar_angkatan'] = $request->file('gambar_angkatan')->store('org-images');
        }

        Organization::create($validatedData);

        return redirect('/profil-mpk')->with('success', 'New Organization has been added!');
    } 

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $profil = Organization::find($id);
        $name = 'mpk';
        return view('admin.profil.edit', compact('profil', 'name'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $profil = Organization::find($id);

        $input = ([
            'nama_organisasi' => 'required|max:5',
            'nama_angkatan' => 'required|max:255',
            'gambar_angkatan' => 'image|file|max:1024',
            'visi_angkatan' => 'required',
            'misi_angkatan' => 'required'
        ]);

        $validatedData = $request->validate($input);

        if($request->file('gambar_angkatan')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['gambar_angkatan'] = $request->file('gambar_angkatan')->store('org-images');
        }

        Organization::where('id', $profil->id)->update($validatedData);

        return redirect('/profil-mpk')->with('success', 'Organization has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $profil = Organization::find($id);

        if($profil->gambar_angkatan){
            Storage::delete($profil->gambar_angkatan);
        }

        Organization::destroy($profil->id);
        return redirect('/profil-mpk')->with('success', 'Journal has been deleted!');
    }
}
