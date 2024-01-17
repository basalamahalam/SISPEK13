@extends('admin.partials.main')

@section('container')
<section class="ml-0 lg:ml-[250px] p-8">
    @if(session()->has('success'))
        <div class="w-1/2 flex justify-between mx-auto bg-green-100 border-l-4 border-green-500 text-green-700 p-4 relative" role="alert">
            {{ session('success') }}
            <button
                class=" text-green-600 hover:text-green-400 font-bold text-medium"
                onclick="this.parentElement.style.display='none'"
            >
                X
            </button>
        </div>
    @endif
    <h1 class="font-bold text-2xl text-dark mb-5">HALAMAN DASHBOARD {{ auth()->user()->name }}</h1>
    @if(auth()->user()->name == 'OSIS')
    <p class="text-right text-base font-medium">OSIS</p>
    <hr class="mb-5 border-slate-600">
    <div class="flex items-center justify-start mb-10">
        <div class="w-1/5 p-4 rounded-md bg-slate-700 mr-20">
            <div class="flex items-center justify-between mb-5">
                <p class="text-white font-medium">Jurnal</p>
                <i class="bi bi-journal-richtext text-slate-300 text-3xl"></i>
            </div>
            <p class="text-5xl font-bold text-white mb-3">{{ $jurnal }}</p>
            <p class="text-white font-thin text-xm">Uploaded</p>
        </div>
        <div class="w-1/5 p-4 rounded-md bg-slate-700 mr-20">
            <div class="flex items-center justify-between mb-5">
                <p class="text-white font-medium">Berita</p>
                <i class="bi bi-newspaper text-3xl text-slate-300"></i>
            </div>
            <p class="text-5xl font-bold text-white mb-3">{{ $berita }}</p>
            <p class="text-white font-thin text-xm">Uploaded</p>
        </div>
        <div class="w-1/5 p-4 rounded-md bg-slate-700 mr-20">
            <div class="flex items-center justify-between mb-5">
                <p class="text-white font-medium">Pendaftar</p>
                <i class="bi bi-person-plus-fill text-3xl text-slate-300"></i>
            </div>
            <p class="text-5xl font-bold text-white mb-3">{{ $pendaftar }}</p>
            <p class="text-white font-thin text-xm">Registered</p>
        </div>
    </div>
    @elseif(auth()->user()->name == 'MPK')
    <p class="text-right text-base font-medium">MPK</p>
    <hr class="mb-5 border-slate-600">
    <div class="flex items-center justify-start">
        <div class="w-1/5 p-4 rounded-md bg-slate-700 mr-20">
            <div class="flex items-center justify-between mb-5">
                <p class="text-white font-medium">Menfess</p>
                <i class="bi bi-chat-left-quote text-3xl text-slate-300"></i>
            </div>
            <p class="text-5xl font-bold text-white mb-3">{{ $menfess }}</p>
            <div class="flex items-center">
                <p class="text-red-500 font-bold text-xm mr-2">{{ $pending }}</p>
                <p class="text-red-500 font-thin text-xm">Pending</p>
            </div>
        </div>
        <div class="w-1/5 p-4 rounded-md bg-slate-700 mr-20">
            <div class="flex items-center justify-between mb-5">
                <p class="text-white font-medium">Ekstrakurikuler</p>
                <i class="bi bi-diagram-3-fill text-3xl text-slate-300"></i>
            </div>
            <p class="text-5xl font-bold text-white mb-3">{{ $ekskul }}</p>
            <p class="text-white font-thin text-xm">Uploaded</p>
        </div>
        <div class="w-1/5 p-4 rounded-md bg-slate-700 mr-20">
            <div class="flex items-center justify-between mb-5">
                <p class="text-white font-medium">Pendaftar</p>
                <i class="bi bi-person-plus-fill text-3xl text-slate-300"></i>
            </div>
            <p class="text-5xl font-bold text-white mb-3">{{ $pendaftar }}</p>
            <p class="text-white font-thin text-xm">Registered</p>
        </div>
    </div>
    @elseif(auth()->user()->name == 'Utama')
        <p class="text-right text-base font-medium">OSIS</p>
        <hr class="mb-5 border-slate-600">
        <div class="flex items-center justify-start mb-10">
            <div class="w-1/5 p-4 rounded-md bg-slate-700 mr-20">
                <div class="flex items-center justify-between mb-5">
                    <p class="text-white font-medium">Jurnal</p>
                    <i class="bi bi-journal-richtext text-slate-300 text-3xl"></i>
                </div>
                <p class="text-5xl font-bold text-white mb-3">{{ $jurnal }}</p>
                <p class="text-white font-thin text-xm">Uploaded</p>
            </div>
            <div class="w-1/5 p-4 rounded-md bg-slate-700 mr-20">
                <div class="flex items-center justify-between mb-5">
                    <p class="text-white font-medium">Berita</p>
                    <i class="bi bi-newspaper text-3xl text-slate-300"></i>
                </div>
                <p class="text-5xl font-bold text-white mb-3">{{ $berita }}</p>
                <p class="text-white font-thin text-xm">Uploaded</p>
            </div>
            <div class="w-1/5 p-4 rounded-md bg-slate-700 mr-20">
                <div class="flex items-center justify-between mb-5">
                    <p class="text-white font-medium">Pendaftar</p>
                    <i class="bi bi-person-plus-fill text-3xl text-slate-300"></i>
                </div>
                <p class="text-5xl font-bold text-white mb-3">{{ $pendaftar_osis }}</p>
                <p class="text-white font-thin text-xm">Registered</p>
            </div>
        </div>
        <p class="text-right text-base font-medium">MPK</p>
        <hr class="mb-5 border-slate-600">
        <div class="flex items-center justify-start">
            <div class="w-1/5 p-4 rounded-md bg-slate-700 mr-20">
                <div class="flex items-center justify-between mb-5">
                    <p class="text-white font-medium">Menfess</p>
                    <i class="bi bi-chat-left-quote text-3xl text-slate-300"></i>
                </div>
                <p class="text-5xl font-bold text-white mb-3">{{ $menfess }}</p>
                <div class="flex items-center">
                    <p class="text-red-500 font-bold text-xm mr-2">{{ $pending }}</p>
                    <p class="text-red-500 font-thin text-xm">Pending</p>
                </div>
            </div>
            <div class="w-1/5 p-4 rounded-md bg-slate-700 mr-20">
                <div class="flex items-center justify-between mb-5">
                    <p class="text-white font-medium">Ekstrakurikuler</p>
                    <i class="bi bi-diagram-3-fill text-3xl text-slate-300"></i>
                </div>
                <p class="text-5xl font-bold text-white mb-3">{{ $ekskul }}</p>
                <p class="text-white font-thin text-xm">Uploaded</p>
            </div>
            <div class="w-1/5 p-4 rounded-md bg-slate-700 mr-20">
                <div class="flex items-center justify-between mb-5">
                    <p class="text-white font-medium">Pendaftar</p>
                    <i class="bi bi-person-plus-fill text-3xl text-slate-300"></i>
                </div>
                <p class="text-5xl font-bold text-white mb-3">{{ $pendaftar_mpk }}</p>
                <p class="text-white font-thin text-xm">Registered</p>
            </div>
        </div>
    @endif
</section>