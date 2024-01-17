<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("media.news", [
            'title'=> 'BERITA SISPEK13',
            'subtitle'=> 'Portal Berita',
            'name' => 'berita',
            'data' => News::latest()->filter(request(['search']))->paginate(4)->withQueryString()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(News $data)
    {
        return view('media.detail.show', [
            'name' => 'berita',
            'data' => $data
        ]);
    }
}
