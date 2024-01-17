<?php

namespace App\Http\Controllers;

use App\Models\Ekskul;
use Illuminate\Http\Request;

class EkskulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("about.ekskul", [
            'title' => 'EKSKUL 13',
            'subtitle' => 'Ekstrakurikuler',
            'data' => Ekskul::latest()->filter(request(['search']))->paginate(6)->withQueryString()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ekskul $data)
    {
        return view('about.detail.ekskul-detail', [
            'data' => $data
        ]);
    }
}
