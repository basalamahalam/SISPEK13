<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\Division;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($slug)
    {
        $divisi = Division::where('slug', $slug)->first();
        return view('admin.event', [
            'title' => 'Data Event',
            'subtitle' => $divisi->nama_divisi,
            'number' => 1,
            'slug' => $slug,
            'data' => Event::where('division_id', $divisi->id)->get()
        ]);
    }    

    /**
     * Show the form for creating a new resource.
     */
    public function create($slug)
    {
        $divisi = Division::where('slug', $slug)->first();

        return view('admin.event.input', [
            'name' => $divisi->nama_divisi,
            'slug' => $slug,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $slug)
    {

        $validatedData = $request->validate([
            'nama_acara' => 'required|max:255',
            'tanggal_acara' => 'required|date',
            'deskripsi_acara' => 'required',
        ]);
        $validatedData['division_id'] = Division::where('slug', $request->slug_divisi)->first()->id;


        Event::create($validatedData);
        return redirect('/event/' . $slug)->with('success', 'New Event has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug, $id)
    {
        $event = Event::find($id);
        $name = Division::where('slug', $slug)->first()->nama_divisi;

        return view('admin.event.edit', compact('event', 'slug', 'name'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug, $id)
    {
        $event = Event::find($id);

        $input = ([
            'nama_acara' => 'required|max:255',
            'tanggal_acara' => 'required|date',
            'deskripsi_acara' => 'required',
        ]);

        $validatedData = $request->validate($input);

        Event::where('id', $event->id)->update($validatedData);

        return redirect('/event/' . $slug)->with('success', 'Anggota has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug, $id)
    {
        $event = Event::find($id);

        Event::destroy($event->id);
        return redirect('/event/' . $slug)->with('success', 'Anggota has been deleted!');
    }
}
