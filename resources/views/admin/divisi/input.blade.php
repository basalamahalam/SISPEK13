@extends('admin.partials.main')

@section('container')
<section class="ml-0 lg:ml-[250px] p-8">
    <a href="/profil-{{ $name }}" class="flex items-center font-semibold text-lg text-primary mb-10 hover:text-sky-800 transition-all duration-300 ease-in-out">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-short mr-3" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
        </svg>
        Kembali
    </a>
    <h2 class="text-dark font-bold text-3xl mb-3">DIVISI</h2>
    <h2 class="text-sky-800 font-small text-lg mb-10">Input Divisi</h2>
    <form action="/profil-{{ $name }}/store-divisi" method="POST" enctype="multipart/form-data" class="max-w mx-auto">
        @csrf
        <input type="hidden" class="bg-gray-300 rounded-md block w-1/2 p-2 @error('nama_organisasi') border-red-500 @enderror" id="nama_organisasi" name="nama_organisasi" value="{{ $name }}">
        <div class="mb-6">
            <label for="nama_divisi" class="text-sky-800 text-lg font-semibold block mb-2">Nama Divisi</label>
            <input type="text" class="bg-gray-300 rounded-md block w-1/2 p-2 @error('nama_divisi') border-red-500 @enderror" id="nama_divisi" name="nama_divisi" value="{{ old('nama_divisi') }}" required autofocus>
            @error('nama_divisi')
                <p class="text-red-500 mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="slug" class="text-sky-800 text-lg font-semibold block mb-2">Slug</label>
            <input type="text" class="bg-gray-300 rounded-md block w-1/2 p-2 @error('slug') border-red-500 @enderror" id="slug" name="slug" value="{{ old('slug') }}" required>
            @error('slug')
            <p class="text-red-500 mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="bidang" class="text-sky-800 text-lg font-semibold block mb-2">Bidang</label>
            <input type="text" class="bg-gray-300 rounded-md block w-1/2 p-2 @error('bidang') border-red-500 @enderror" id="bidang" name="bidang" value="{{ old('bidang') }}" required autofocus>
            @error('bidang')
                <p class="text-red-500 mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="gambar_divisi" class="text-sky-800 text-lg font-semibold block">Foto Divisi</label>
            <img class="img-preview max-w-sm mb-3">
            <h1 class="sr-only">Choose file</h1>
            <input type="file" class="block w-1/2 border cursor-pointer bg-gray-300 border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 disabled:opacity-50 disabled:pointer-events-none
                file:bg-gray-400 file:border-0 file:me-4
                file:py-3 file:px-4 @error('gambar_divisi') border-red-500 @enderror" id="gambar_divisi" name="gambar_divisi" onchange="previewImage()" required>
            @error('gambar_divisi')
                <p class="text-red-500 mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-10">
            <label for="deskripsi_divisi" class="text-sky-800 text-lg font-semibold block mb-2">Deskripsi Divisi</label>
            @error('deskripsi_divisi')
                <p class="text-red-500 mt-2">{{ $message }}</p>
            @enderror
            <input id="deskripsi_divisi" type="hidden" name="deskripsi_divisi" value="{{ old('deskripsi_divisi') }}" required>
            <trix-editor input="deskripsi_divisi"></trix-editor>
        </div>
        <div class="flex justify-end">
            <button type="submit" class="bg-primary hover:bg-sky-800 text-white font-medium py-3 px-10 rounded-lg transition-all duration-300 ease-in-out">
                Create
            </button>
        </div>
    </form>

    <script>
        const title = document.querySelector("#nama_divisi");
        const slug = document.querySelector("#slug");
    
        title.addEventListener("keyup", function() {
            let preslug = title.value;
            preslug = preslug.replace(/ /g,"-");
            slug.value = preslug.toLowerCase();
        });

        document.addEventListener('trix-files-accept', function(e){
            e.preventDefault();
        })
    
        function previewImage(){
          const image = document.querySelector('#gambar_divisi');
          const imgPreview = document.querySelector('.img-preview');
    
          imgPreview.style.display = 'block';
          
          const oFReader = new FileReader();
          oFReader.readAsDataURL(image.files[0]);
        
          oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
          }
        }
    </script>
</section>