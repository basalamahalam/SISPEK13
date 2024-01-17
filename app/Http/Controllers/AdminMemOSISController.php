<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Division;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminMemOSISController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($slug)
    {
        $divisi = Division::where('slug', $slug)->first();
        return view('admin.member', [
            'title' => 'Data Anggota',
            'subtitle' => $divisi->nama_divisi,
            'number' => 1,
            'slug' => $slug,
            'name' => 'osis',
            'data' => Anggota::where('division_id', $divisi->id)->get()
        ]);
    }    

    /**
     * Show the form for creating a new resource.
     */
    public function create($slug)
    {
        $divisi = Division::where('slug', $slug)->first();

        return view('admin.member.input', [
            'name' => $divisi->nama_divisi,
            'slug' => $slug,
            'org' => 'osis',
            'kelas' => ['X KA 1', 'X KA 2', 'X KA 3', 'X KA 4', 'X KA 5', 'X KA 6' , 'X TKJT 1', 'X TKJT 2', 'X TKJT 3', 'X PPLG 1', 'X PPLG 2',
            'XI KA 1', 'XI KA 2', 'XI KA 3', 'XI KA 4', 'XI KA 5', 'XI KA 6' , 'XI TKJT 1', 'XI TKJT 2', 'XI TKJT 3', 'XI PPLG 1', 'XI PPLG 2']
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $slug)
    {

        $validatedData = $request->validate([
            'nama_anggota' => 'required|max:255',
            'gambar_anggota' => 'image|file|max:2048',
            'instagram_anggota' => 'required|max:255',
            'kelas' => 'required',
        ]);
        
        $validatedData['division_id'] = Division::where('slug', $request->slug_divisi)->first()->id;

        if($request->file('gambar_anggota')){
            $validatedData['gambar_anggota'] = $request->file('gambar_anggota')->store('memberosis-images');
        }

        Anggota::create($validatedData);
        return redirect('/anggota-osis/' . $slug)->with('success', 'New Anggota has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(anggota $anggota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug, $id)
    {
        $member = Anggota::find($id);
        $name = Division::where('slug', $slug)->first()->nama_divisi;
        $kelas = ['X KA 1', 'X KA 2', 'X KA 3', 'X KA 4', 'X KA 5', 'X KA 6' , 'X TKJT 1', 'X TKJT 2', 'X TKJT 3', 'X PPLG 1', 'X PPLG 2',
            'XI KA 1', 'XI KA 2', 'XI KA 3', 'XI KA 4', 'XI KA 5', 'XI KA 6' , 'XI TKJT 1', 'XI TKJT 2', 'XI TKJT 3', 'XI PPLG 1', 'XI PPLG 2'];

        return view('admin.member.edit', compact('member', 'slug', 'name', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug, $id)
    {
        $member = Anggota::find($id);

        $input = ([
            'nama_anggota' => 'required|max:255',
            'gambar_anggota' => 'image|file|max:2048',
            'instagram_anggota' => 'required|max:255',
            'kelas' => 'required',
        ]);

        $validatedData = $request->validate($input);

        if($request->file('gambar_anggota')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['gambar_anggota'] = $request->file('gambar_anggota')->store('memberosis-images');
        }

        Anggota::where('id', $member->id)->update($validatedData);

        return redirect('/anggota-osis/' . $slug)->with('success', 'Anggota has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug, $id)
    {
        $member = Anggota::find($id);

        if($member->gambar_anggota){
            Storage::delete($member->gambar_anggota);
        }

        Anggota::destroy($member->id);
        return redirect('/anggota-osis/' . $slug)->with('success', 'Anggota has been deleted!');
    }
}
