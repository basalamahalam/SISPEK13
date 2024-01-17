<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\Division;
use App\Models\Anggota;
use Illuminate\Http\Request;

class MpkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mpk = Organization::where('nama_organisasi', 'mpk')->first();
        $divisi = Division::where('organization_id', '2')->get();

        return view("about.osis-mpk", [
            'title'=> 'MPK 2023-2024',
            'subtitle'=> 'TENTANG KAMI',
            'organisasi' => 'MPK',
            'org' => $mpk,
            'divisi' => $divisi
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Division $divisi)
    {
        $anggota = Anggota::where('division_id', $divisi->id)->get();
        return view('about.detail.osismpk-detail', [
            'name' => 'MPK',
            'data' => $anggota
        ]);
    }
}
