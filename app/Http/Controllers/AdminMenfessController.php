<?php

namespace App\Http\Controllers;

use App\Models\Menfess;
use Illuminate\Http\Request;

class AdminMenfessController extends Controller
{
    public function index(Request $request){
        // Get the filter value from the request or set it to 'All' by default
        $filter = $request->input('filter', 'All');

        // Query based on the selected filter
        $menfessQuery = Menfess::query();

        if ($filter !== 'All') {
            // Adjust this condition based on your actual filter criteria
            $menfessQuery->where('status', $filter);
        }

        // Fetch the filtered data
        $menfess = $menfessQuery->latest()->paginate(10);

        return view('admin.menfess', [
            'title' => 'MENFESS',
            'subtitle' => 'Pesan Anonim Thirteenagers',
            'number' => 1,
            'data' => $menfess,
            'filter' => $filter
        ]);
    }

    public function accept($id){
        $menfess = Menfess::find($id);
        $menfess['status'] = 'Accept';
        $menfess->update();
        return redirect('/menfess-admin')->with('success', 'Menfess Status has been Updated!');
    }

    public function terbaik($id){
        $menfess = Menfess::find($id);
        $menfess['status'] = 'Terbaik';
        $menfess->update();
        return redirect('/menfess-admin')->with('success', 'Menfess Status has been Updated!');
    }

    public function destroy($id)
    {
        $menfess= Menfess::find($id);

        Menfess::destroy($menfess->id);
        return redirect('/menfess-admin')->with('success', 'Menfess has been deleted!');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;

        Menfess::whereIn('id', $ids)->delete();

        return response() ->json(['success' => 'Selected items deleted successfully']);
    }

}
