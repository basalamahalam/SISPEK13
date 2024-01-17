<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Jurnal;
use App\Models\News;

class HomeController extends Controller
{
    public function index(){
        return view('home', [
            'jurnal' => Jurnal::latest()->take(3)->get(),
            'berita' => News::latest()->take(4)->get()
        ]);
    }

    public function web(){
        return view('about.sejarah');
    }
}
