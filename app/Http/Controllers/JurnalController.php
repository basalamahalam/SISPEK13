<?php

namespace App\Http\Controllers;
use App\Models\Jurnal;
use Illuminate\Http\Request;

class JurnalController extends Controller
{
    public function index(){
        return view('media.jurnalosis', [
            'title' => 'ARTIKEL LITERASI',
            'subtitle'=> 'Jurnal OSIS',
            'name' => 'jurnal',
            'data'=> Jurnal::latest()->filter(request(['search']))->paginate(6)->withQueryString()
        ]);
    }

    public function show(Jurnal $data){
        return view('media.detail.show', [
            'name' => 'jurnal',
            'data' => $data
        ]);
    }
}
