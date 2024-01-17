@extends('admin.partials.main')

@section('container')
<section class="ml-0 lg:ml-[250px] p-8">
    <a href="/event/{{ $slug }}" class="flex items-center font-semibold text-lg text-primary mb-10 hover:text-sky-800 transition-all duration-300 ease-in-out">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-short mr-3" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
        </svg>
        Kembali
    </a>
    <h2 class="text-dark font-bold text-3xl mb-3">Event</h2>
    <h2 class="text-sky-800 font-small text-lg mb-10">Input Event {{ $name }}</h2>
    <form action="/event/{{ $slug }}/{{ $event->id }}" method="POST" enctype="multipart/form-data" class="max-w mx-auto">
        @method('put')
        @csrf
        <input type="hidden" class="bg-gray-300 rounded-md block w-1/2 p-2 @error('slug_divisi') border-red-500 @enderror" id="slug_divisi" name="slug_divisi" value="{{ $slug }}">
        <div class="mb-6">
            <label for="nama_acara" class="text-sky-800 text-lg font-semibold block mb-2">Nama Acara</label>
            <input type="text" class="bg-gray-300 rounded-md block w-1/2 p-2 @error('nama_acara') border-red-500 @enderror" id="nama_acara" name="nama_acara" value="{{ old('nama_acara', $event->nama_acara) }}" required autofocus>
            @error('nama_acara')
                <p class="text-red-500 mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="tanggal_acara" class="text-sky-800 text-lg font-semibold block mb-2">Tanggal Acara</label>
            <input type="date" class="bg-gray-300 rounded-md block w-1/2 p-2 @error('tanggal_acara') border-red-500 @enderror" id="tanggal_acara" name="tanggal_acara" value="{{ old('tanggal_acara', $event->tanggal_acara) }}" required autofocus>
            @error('tanggal_acara')
                <p class="text-red-500 mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-10">
            <label for="deskripsi_acara" class="text-sky-800 text-lg font-semibold block mb-2">Deskripsi Acara</label>
            @error('deskripsi_acara')
                <p class="text-red-500 mt-2">{{ $message }}</p>
            @enderror
            <input id="deskripsi_acara" type="hidden" name="deskripsi_acara" value="{{ old('deskripsi_acara', $event->deskripsi_acara) }}" required>
            <trix-editor input="deskripsi_acara"></trix-editor>
        </div>
        <div class="flex justify-end">
            <button type="submit" class="bg-primary hover:bg-sky-800 text-white font-medium py-3 px-10 rounded-lg transition-all duration-300 ease-in-out">
                Submit
            </button>
        </div>
    </form>

    <script>
        document.addEventListener('trix-files-accept', function(e){
            e.preventDefault();
        })
    </script>
</section>