<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Mail\Pendaftarans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PendaftaranController extends Controller
{
    public function index()
    {   
        $data = ['X KA 1', 'X KA 2', 'X KA 3', 'X KA 4', 'X KA 5', 'X KA 6' , 'X TKJT 1', 'X TKJT 2', 'X TKJT 3', 'X PPLG 1', 'X PPLG 2'];
        return view("media.pendaftaran", [
            'data' => $data
        ]);
    }

    public function store(Request $request){

        $validatedData = $request->validate([
            "pendaftar"=> "required",
            "email"=> "required|email:dns",
            "nama"=> "required|max:255",
            "kelas"=> "required",
            "gender"=> "required",
            "contact"=> "required|max:13",
            "image"=> "required|image|file|max:512",
            "knowledge"=> "required",
            "reason"=> "required"
        ]);
        
        $validatedData['image'] = $request->file('image')->store('post-images');

        $pendaftar = Pendaftaran::create($validatedData);

        if($pendaftar){
            Mail::to($pendaftar->email)->send(new Pendaftarans($pendaftar->email));
            return redirect('/')->with('success', 'Pendaftaran sudah terkirim! Cek email kamu untuk masuk kedalam group WhatsApp');
        }
    }
}
