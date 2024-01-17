<?php

namespace App\Http\Controllers;

use App\Models\Jurnal;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminJurnalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.jurnal', [
            'title' => 'ARTIKEL LITERASI',
            'subtitle'=> 'JURNAL OSIS',
            'name' => 'jurnal',
            'number' => 1,
            'data'=> Jurnal::latest()->paginate(5)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.jurnal.input');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:jurnals',
            'author' => 'required|max:50',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('jurnal-images');
        }

        $validatedData['excerpt'] = Str::limit(strip_tags($request->body, 100));

        Jurnal::create($validatedData);

        return redirect('/jurnal-admin')->with('success', 'New post has been added!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $jurnal= Jurnal::where('slug', $slug)->firstOrFail();
        return view('admin.jurnal.edit', compact('jurnal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $jurnal= Jurnal::where('slug', $slug)->firstOrFail();

        $input = ([
            'title' => 'required|max:255',
            'image' => 'image|file|max:1024',
            'author' => 'required|max:50',
            'body' => 'required'
        ]);

        if($request->slug != $jurnal->slug){
            $input['slug'] = 'required|unique:jurnals';
        }

        $validatedData = $request->validate($input);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('jurnal-images');
        }

        $validatedData['excerpt'] = Str::limit(strip_tags($request->body, 100));

        Jurnal::where('id', $jurnal->id)->update($validatedData);

        return redirect('/jurnal-admin')->with('success', 'New Journal has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $jurnal= Jurnal::where('slug', $slug)->firstOrFail();

        if($jurnal->image){
            Storage::delete($jurnal->image);
        }

        Jurnal::destroy($jurnal->id);
        return redirect('/jurnal-admin')->with('success', 'Journal has been deleted!');
    }
}
