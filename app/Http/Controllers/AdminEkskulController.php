<?php

namespace App\Http\Controllers;

use App\Models\Ekskul;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminEkskulController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.ekskul', [
            'title' => 'EKSKUL 13',
            'subtitle'=> 'Ekstrakurikuler',
            'name' => 'ekskul',
            'number' => 1,
            'data'=> Ekskul::latest()->paginate(5)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ekskul.input');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'slug' => 'required|unique:ekskuls',
            'link' => 'required|max:255',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('ekskul-images');
        }

        Ekskul::create($validatedData);

        return redirect('/ekskul-admin')->with('success', 'New Ekskul has been added!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $ekskul= Ekskul::where('slug', $slug)->firstOrFail();
        return view('admin.ekskul.edit', compact('ekskul'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $ekskul= Ekskul::where('slug', $slug)->firstOrFail();

        $input = ([
            'name' => 'required|max:50',
            'image' => 'image|file|max:1024',
            'link' => 'required|max:255',
            'body' => 'required'
        ]);

        if($request->slug != $ekskul->slug){
            $input['slug'] = 'required|unique:ekskuls';
        }

        $validatedData = $request->validate($input);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('ekskul-images');
        }

        Ekskul::where('id', $ekskul->id)->update($validatedData);

        return redirect('/ekskul-admin')->with('success', 'New post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $ekskul= Ekskul::where('slug', $slug)->firstOrFail();

        if($ekskul->image){
            Storage::delete($ekskul->image);
        }

        Ekskul::destroy($ekskul->id);
        return redirect('/ekskul-admin')->with('success', 'Post has been deleted!');
    }
}
