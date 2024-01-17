@extends('admin.partials.main')

@section('container')
<section class="ml-0 lg:ml-[250px] p-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold mb-5">DATA PENDAFTAR DETAIL</h1>
    
        <div class="flex">
            <a href="/pendaftar-{{ $detail->pendaftar }}" class="text-blue-500">Pendaftaran</a>
            <span class="mx-2">/</span>
            <p class="text-dark">{{ $detail->nama }}</a>
        </div>
    </div>
    
    <div class="card-detail bg-white p-4 rounded-lg shadow-lg mb-8">
        <div class="flex">
            <img src="{{ asset('storage/' . $detail->image) }}" alt="{{ $detail->image }}" class="max-w-[300px] max-h-[400px] object-cover">
            <div class="ml-10 w-full">
                <div class="flex justify-between items-center">
                    <div class="">
                        <h3 class="mb-1 text-base font-semibold">Nama :</h3>
                        <h3 class="mb-3 text-lg font-small">{{ $detail->nama }}</h3>
                    </div>
                    <div class="text-right">
                        <h3 class="mb-1 text-base font-semibold">Kelas :</h3>
                        <h3 class="mb-3 text-lg font-small">{{ $detail->kelas }}</h3>
                    </div>
                </div>
                <div class="flex justify-between items-center">
                    <div class="">
                        <h3 class="mb-1 text-base font-semibold">Jenis Kelamin :</h3>
                        <h3 class="mb-3 text-lg font-small">{{ $detail->gender }}</h3>
                    </div>
                    <div class="text-right">
                        <h3 class="mb-1 text-base font-semibold">Nomor WhatsApp :</h3>
                        <h3 class="mb-3 text-lg font-small">{{ $detail->contact }}</h3>
                    </div>
                </div>
                <h3 class="text-lg font-semibold mt-2">Apa yang kamu ketahui tentang OSIS & MPK :</h3>
                <div class="mt-2">
                    <p>{{ $detail->knowledge }}</p>
                </div>
                <h3 class="text-lg font-semibold mt-2">Alasan ingin bergabung OSIS / MPK :</h3>
                <div class="mt-2">
                    <p>{{ $detail->reason }}</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="flex justify-end mb-8">
        <a href="/pendaftar-{{ $detail->pendaftar }}/{{ $detail->id }}/download"
            class="bg-blue-500 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded mr-2">DOWNLOAD PDF</a>
        <a href="/pendaftar-{{ $detail->pendaftar }}"
            class="bg-gray-400 hover:bg-gray-600 text-white font-medium py-2 px-4 rounded">KEMBALI</a>
    </div>
    
</section>