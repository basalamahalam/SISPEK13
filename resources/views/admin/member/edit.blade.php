@extends('admin.partials.main')

@section('container')
<section class="ml-0 lg:ml-[250px] p-8">
    <a href="/anggota-osis/{{ $slug }}" class="flex items-center font-semibold text-lg text-primary mb-10 hover:text-sky-800 transition-all duration-300 ease-in-out">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-short mr-3" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
        </svg>
        Kembali
    </a>
    <h2 class="text-dark font-bold text-3xl mb-3">ANGGOTA</h2>
    <h2 class="text-sky-800 font-small text-lg mb-10">Edit Anggota {{ $name }}</h2>
    <form action="/anggota-osis/{{ $slug }}/{{ $member->id }}" method="POST" enctype="multipart/form-data" class="max-w mx-auto">
        @method('put')
        @csrf
        <input type="hidden" class="bg-gray-300 rounded-md block w-1/2 p-2 @error('slug_divisi') border-red-500 @enderror" id="slug_divisi" name="slug_divisi" value="{{ $slug }}">
        <div class="mb-6">
            <label for="nama_anggota" class="text-sky-800 text-lg font-semibold block mb-2">Nama Anggota</label>
            <input type="text" class="bg-gray-300 rounded-md block w-1/2 p-2 @error('nama_anggota') border-red-500 @enderror" id="nama_anggota" name="nama_anggota" value="{{ old('nama_anggota', $member->nama_anggota) }}" required autofocus>
            @error('nama_anggota')
                <p class="text-red-500 mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="kelas" class="text-lg font-semibold text-sky-800">Kelas</label>
            <div class="mt-2 relative block text-left">
                <select name="kelas" id="kelas" class="bg-gray-300 rounded-md shadow-sm p-4 py-2 text-left cursor-pointer focus:outline-none focus:ring focus:border-primary sm:text-sm @error('kelas') border-2 border-red-500 @enderror" >
                    <option selected disabled>Pilih Kelas</option>
                    @foreach ($kelas as $kel)
                        @if(old('kelas', $member->kelas) == $kel)
                        <option value="{{ $kel}}" selected>{{ $kel }}</option>
                        @else
                        <option value="{{ $kel}}">{{ $kel }}</option>
                        @endif
                    @endforeach
                </select>
                @error('kelas')
                <div class="text-xs text-red-600">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mb-6">
            <label for="gambar_anggota" class="text-sky-800 text-lg font-semibold block">Logo Organisasi</label>
            <input type="hidden" name="oldImage" value="{{ $member->gambar_anggota }}">
            @if ($member->gambar_anggota)
                <img src="{{ asset('storage/' . $member->gambar_anggota) }}" class="img-preview max-w-sm mb-3 col-sm-5 d-block">
            @else
                <img class="img-preview max-w-sm mb-3">
            @endif
            <h1 class="sr-only">Choose file</h1>
            <input type="file" class="block w-1/2 border cursor-pointer bg-gray-300 border-gray-200 shadow-sm rounded-lg text-sm focus:z-10
                file:bg-gray-400 file:border-0 file:me-4
                file:py-3 file:px-4 @error('gambar_anggota') border-red-500 @enderror" id="gambar_anggota" name="gambar_anggota" onchange="previewImage()">
            @error('gambar_anggota')
                <p class="text-red-500 mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="instagram_anggota" class="text-sky-800 text-lg font-semibold block mb-2">Link Instagram</label>
            <input type="text" class="bg-gray-300 rounded-md block w-1/2 p-2 @error('instagram_anggota') border-red-500 @enderror" id="instagram_anggota" name="instagram_anggota" value="{{ old('instagram_anggota', $member->instagram_anggota) }}" required autofocus>
            @error('instagram_anggota')
                <p class="text-red-500 mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex justify-end">
            <button type="submit" class="bg-primary hover:bg-sky-800 text-white font-medium py-3 px-10 rounded-lg transition-all duration-300 ease-in-out">
                Create
            </button>
        </div>
    </form>

    <script>
        document.addEventListener('trix-files-accept', function(e){
            e.preventDefault();
        })
    
        function previewImage(){
          const image = document.querySelector('#gambar_anggota');
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