@extends('admin.partials.main')

@section('container')
<section class="ml-0 lg:ml-[250px] p-8">
    @if(session()->has('success'))
        <div id="success-message" class="relative flex justify-between w-1/2 p-4 mx-auto text-green-700 bg-green-100 border-l-4 border-green-500" role="alert">
            {{ session('success') }}
            <button
                class="font-bold text-green-600 hover:text-green-400 text-medium"
                onclick="this.parentElement.style.display='none'"
            >
                X
            </button>
        </div>

        <script>
            setTimeout(() => {
                var successMessage = document.getElementById('success-message');
                if(successMessage){
                    successMessage.style.display = 'none';
                }
            }, 3000);
        </script>
    @endif
    <h1 class="mb-5 text-2xl font-bold text-dark">HALAMAN DASHBOARD {{ auth()->user()->name }}</h1>
    @if(auth()->user()->name == 'OSIS')
    <p class="text-base font-medium text-right">OSIS</p>
    <hr class="mb-5 border-slate-600">
    <div class="flex items-center justify-start mb-10">
        <div class="w-1/5 p-4 mr-20 rounded-md bg-slate-700">
            <div class="flex items-center justify-between mb-5">
                <p class="font-medium text-white">Jurnal</p>
                <i class="text-3xl bi bi-journal-richtext text-slate-300"></i>
            </div>
            <p class="mb-3 text-5xl font-bold text-white">{{ $jurnal }}</p>
            <p class="font-thin text-white text-xm">Uploaded</p>
        </div>
        <div class="w-1/5 p-4 mr-20 rounded-md bg-slate-700">
            <div class="flex items-center justify-between mb-5">
                <p class="font-medium text-white">Berita</p>
                <i class="text-3xl bi bi-newspaper text-slate-300"></i>
            </div>
            <p class="mb-3 text-5xl font-bold text-white">{{ $berita }}</p>
            <p class="font-thin text-white text-xm">Uploaded</p>
        </div>
        <div class="w-1/5 p-4 mr-20 rounded-md bg-slate-700">
            <div class="flex items-center justify-between mb-5">
                <p class="font-medium text-white">Pendaftar</p>
                <i class="text-3xl bi bi-person-plus-fill text-slate-300"></i>
            </div>
            <p class="mb-3 text-5xl font-bold text-white">{{ $pendaftar }}</p>
            <p class="font-thin text-white text-xm">Registered</p>
        </div>
    </div>
    @elseif(auth()->user()->name == 'MPK')
    <p class="text-base font-medium text-right">MPK</p>
    <hr class="mb-5 border-slate-600">
    <div class="flex items-center justify-start">
        <div class="w-1/5 p-4 mr-20 rounded-md bg-slate-700">
            <div class="flex items-center justify-between mb-5">
                <p class="font-medium text-white">Menfess</p>
                <i class="text-3xl bi bi-chat-left-quote text-slate-300"></i>
            </div>
            <p class="mb-3 text-5xl font-bold text-white">{{ $menfess }}</p>
            <div class="flex items-center">
                <p class="mr-2 font-bold text-red-500 text-xm">{{ $pending }}</p>
                <p class="font-thin text-red-500 text-xm">Pending</p>
            </div>
        </div>
        <div class="w-1/5 p-4 mr-20 rounded-md bg-slate-700">
            <div class="flex items-center justify-between mb-5">
                <p class="font-medium text-white">Ekstrakurikuler</p>
                <i class="text-3xl bi bi-diagram-3-fill text-slate-300"></i>
            </div>
            <p class="mb-3 text-5xl font-bold text-white">{{ $ekskul }}</p>
            <p class="font-thin text-white text-xm">Uploaded</p>
        </div>
        <div class="w-1/5 p-4 mr-20 rounded-md bg-slate-700">
            <div class="flex items-center justify-between mb-5">
                <p class="font-medium text-white">Pendaftar</p>
                <i class="text-3xl bi bi-person-plus-fill text-slate-300"></i>
            </div>
            <p class="mb-3 text-5xl font-bold text-white">{{ $pendaftar }}</p>
            <p class="font-thin text-white text-xm">Registered</p>
        </div>
    </div>
    @elseif(auth()->user()->name == 'Utama')
        <p class="text-base font-medium text-right">OSIS</p>
        <hr class="mb-5 border-slate-600">
        <div class="flex items-center justify-start mb-10">
            <div class="w-1/5 p-4 mr-20 rounded-md bg-slate-700">
                <div class="flex items-center justify-between mb-5">
                    <p class="font-medium text-white">Jurnal</p>
                    <i class="text-3xl bi bi-journal-richtext text-slate-300"></i>
                </div>
                <p class="mb-3 text-5xl font-bold text-white">{{ $jurnal }}</p>
                <p class="font-thin text-white text-xm">Uploaded</p>
            </div>
            <div class="w-1/5 p-4 mr-20 rounded-md bg-slate-700">
                <div class="flex items-center justify-between mb-5">
                    <p class="font-medium text-white">Berita</p>
                    <i class="text-3xl bi bi-newspaper text-slate-300"></i>
                </div>
                <p class="mb-3 text-5xl font-bold text-white">{{ $berita }}</p>
                <p class="font-thin text-white text-xm">Uploaded</p>
            </div>
            <div class="w-1/5 p-4 mr-20 rounded-md bg-slate-700">
                <div class="flex items-center justify-between mb-5">
                    <p class="font-medium text-white">Pendaftar</p>
                    <i class="text-3xl bi bi-person-plus-fill text-slate-300"></i>
                </div>
                <p class="mb-3 text-5xl font-bold text-white">{{ $pendaftar_osis }}</p>
                <p class="font-thin text-white text-xm">Registered</p>
            </div>
        </div>
        <p class="text-base font-medium text-right">MPK</p>
        <hr class="mb-5 border-slate-600">
        <div class="flex items-center justify-start">
            <div class="w-1/5 p-4 mr-20 rounded-md bg-slate-700">
                <div class="flex items-center justify-between mb-5">
                    <p class="font-medium text-white">Menfess</p>
                    <i class="text-3xl bi bi-chat-left-quote text-slate-300"></i>
                </div>
                <p class="mb-3 text-5xl font-bold text-white">{{ $menfess }}</p>
                <div class="flex items-center">
                    <p class="mr-2 font-bold text-red-500 text-xm">{{ $pending }}</p>
                    <p class="font-thin text-red-500 text-xm">Pending</p>
                </div>
            </div>
            <div class="w-1/5 p-4 mr-20 rounded-md bg-slate-700">
                <div class="flex items-center justify-between mb-5">
                    <p class="font-medium text-white">Ekstrakurikuler</p>
                    <i class="text-3xl bi bi-diagram-3-fill text-slate-300"></i>
                </div>
                <p class="mb-3 text-5xl font-bold text-white">{{ $ekskul }}</p>
                <p class="font-thin text-white text-xm">Uploaded</p>
            </div>
            <div class="w-1/5 p-4 mr-20 rounded-md bg-slate-700">
                <div class="flex items-center justify-between mb-5">
                    <p class="font-medium text-white">Pendaftar</p>
                    <i class="text-3xl bi bi-person-plus-fill text-slate-300"></i>
                </div>
                <p class="mb-3 text-5xl font-bold text-white">{{ $pendaftar_mpk }}</p>
                <p class="font-thin text-white text-xm">Registered</p>
            </div>
        </div>
    @endif
</section>