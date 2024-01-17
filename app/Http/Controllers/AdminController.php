<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\Pendaftaran;
use App\Models\Jurnal;
use App\Models\News;
use App\Models\Ekskul;
use App\Models\Menfess;
use Barryvdh\DomPDF\Facade\Pdf;


class AdminController extends Controller
{

    public function index(){
        $jurnal = Jurnal::count();
        $berita = News::count();
        $ekskul = Ekskul::count();
        $pendaftar_osis = Pendaftaran::where('pendaftar', 'osis')->count();
        $pendaftar_mpk = Pendaftaran::where('pendaftar', 'mpk')->count();
        $menfess = Menfess::count();
        $menfess_pending = Menfess::where('status', 'pending')->count();

        $data = [];

        if(auth()->user()->name == 'OSIS')
        {
            $data = [
                'jurnal' => $jurnal,
                'berita' => $berita,
                'pendaftar' => $pendaftar_osis
            ];
        }
        elseif(auth()->user()->name == 'MPK'){
            $data = [
                'ekskul' => $ekskul,
                'menfess' => $menfess,
                'pendaftar' => $pendaftar_mpk,
                'pending' => $menfess_pending
            ];
        }
        elseif(auth()->user()->name == 'Utama'){
            $data = [
                'jurnal' => $jurnal,
                'berita' => $berita,
                'pendaftar_osis' => $pendaftar_osis,
                'ekskul' => $ekskul,
                'menfess' => $menfess,
                'pendaftar_mpk' => $pendaftar_mpk,
                'pending' => $menfess_pending
            ];
        }

        return view('admin.dashboard', $data);
    }

    public function downloadOSIS($id) {

        $osispdf = Pendaftaran::find($id);
        $pdf = Pdf::loadView('media.pendaftar-pdf.pdf-detail', [
            'pdf' => $osispdf,
            'name' => 'OSIS'
        ]);
        $client = "OSIS" . "-" . $osispdf->nama . "-" . $osispdf->kelas . ".pdf";
        return $pdf->download($client);
    }

    public function downloadMPK($id) {
        $mpkpdf = Pendaftaran::find($id);
        $pdf = Pdf::loadView('media.pendaftar-pdf.pdf-detail', [
            'pdf' => $mpkpdf,
            'name' => 'MPK'
        ]);
        $client = "MPK" . "-" . $mpkpdf->nama . "-" . $mpkpdf->kelas . ".pdf";
        return $pdf->download($client);
    }

    public function login()
    {   
        return view("admin.login");
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $validatedAccount = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($validatedAccount)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard')->with('success', 'Login Success!');
        }

        return back()->with('is-errors', 'Login Failed!');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Logout Success!');
    }
}
