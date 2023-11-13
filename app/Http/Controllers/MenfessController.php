<?php

namespace App\Http\Controllers;

use App\Models\Menfess;
use Illuminate\Http\Request;

class MenfessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('media.mfs.send');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'from'=> 'required|max:25',
            'to'=> 'required|max:25',
            'message'=> 'required|max:255',
        ]); // Menghapus atribut _token dari data
        Menfess::create($data);
        return redirect('/menfess')->with('success', 'Pesan berhasil dikirim dan akan ditampilkan setelah diacc oleh admin!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menfess $menfess)
    {
        $data = Menfess::latest()->get();
        return view("media.menfess", compact("data"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menfess $menfess)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menfess $menfess)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menfess $menfess)
    {
        //
    }
}
