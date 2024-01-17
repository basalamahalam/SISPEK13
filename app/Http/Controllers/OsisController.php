<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\Division;
use App\Models\Anggota;
use Illuminate\Http\Request;

class OsisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $osis = Organization::where('nama_organisasi', 'osis')->first();
        $divisi = Division::where('organization_id', '1')->get();
        
        return view("about.osis-mpk", [
            'title'=> 'OSIS 2023-2024',
            'subtitle'=> 'TENTANG KAMI',
            'organisasi' => 'OSIS',
            'org' => $osis,
            'divisi' => $divisi,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Division $divisi)
    {
        $anggota = Anggota::where('division_id', $divisi->id)->get();
        return view('about.detail.osismpk-detail', [
            'name' => 'OSIS',
            'data' => $anggota
        ]);
    }
}
