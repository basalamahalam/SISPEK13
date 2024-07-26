<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Support\Str; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.berita', [
            'title' => 'Portal Berita',
            'subtitle'=> 'BERITA SISPEK13',
            'name' => 'news',
            'number' => 1,
            'data'=> News::latest()->paginate(5)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.berita.input');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:news',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('berita-images');
        }

        $validatedData['excerpt'] = Str::limit(strip_tags($request->body, 100));

        News::create($validatedData);

        return redirect('/berita-admin')->with('success', 'New post has been added!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $berita = News::where('slug', $slug)->firstOrFail();
        return view('admin.berita.edit', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $news= News::where('slug', $slug)->firstOrFail();

        $input = ([
            'title' => 'required|max:255',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ]);

        if($request->slug != $news->slug){
            $input['slug'] = 'required|unique:news';
        }

        $validatedData = $request->validate($input);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('news-images');
        }

        $validatedData['excerpt'] = Str::limit(strip_tags($request->body, 100));

        News::where('id', $news->id)->update($validatedData);

        return redirect('/berita-admin')->with('success', 'New post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $news= News::where('slug', $slug)->firstOrFail();

        if($news->image){
            Storage::delete($news->image);
        }

        News::destroy($news->id);
        return redirect('/berita-admin')->with('success', 'Post has been deleted!');
    }
}
