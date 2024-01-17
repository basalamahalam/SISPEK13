<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Storage;

class AdminPendMPKController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pendaftar', [
            'title' => 'LIST PENDAFTAR MPK',
            'number' => 1,
            'data' => Pendaftaran::where('pendaftar', 'mpk')->latest()->paginate(5)->withQueryString()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $detail = Pendaftaran::find($id);
        $title = "Pendaftar MPK Detail " . $detail->nama;
        return view('admin.pendaftar.detail', [
            'detail' => $detail,
            'title' => $title,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pendaftar= Pendaftaran::find($id);

        if($pendaftar->image){
            Storage::delete($pendaftar->image);
        }

        Pendaftaran::destroy($pendaftar->id);
        return redirect('/pendaftar-mpk')->with('success', 'Pendaftar has been deleted!');
    }
}
