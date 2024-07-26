@extends('admin.partials.main')

@section('container')
<section class="ml-0 lg:ml-[250px] p-8">
    <a href="/berita-admin" class="flex items-center mb-10 text-lg font-semibold transition-all duration-300 ease-in-out text-primary hover:text-sky-800">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mr-3 bi bi-arrow-left-short" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
        </svg>
        Kembali
    </a>
    <h2 class="mb-3 text-3xl font-bold text-dark">BERITA SISPEK13</h2>
    <h2 class="mb-10 text-lg text-sky-800 font-small">Edit Berita</h2>
    <form action="/berita-admin/{{ $berita->slug }}" method="POST" enctype="multipart/form-data" class="mx-auto max-w">
        @method('put')
        @csrf
        <div class="mb-6">
            <label for="title" class="block mb-2 text-lg font-semibold text-sky-800">Title</label>
            <input type="text" class="bg-gray-300 rounded-md block w-1/2 p-2 @error('title') border-red-500 @enderror" id="title" name="title" value="{{ old('title', $berita->title) }}" required autofocus>
            @error('title')
                <p class="mt-2 text -red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="slug" class="block mb-2 text-lg font-semibold text-sky-800">Slug</label>
            <input type="text" class="bg-gray-300 rounded-md block w-1/2 p-2 @error('slug') border-red-500 @enderror" id="slug" name="slug" value="{{ old('slug', $berita->slug) }}" required>
            @error('slug')
            <p class="mt-2 text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="image" class="block text-lg font-semibold text-sky-800">News Image</label>
            <input type="hidden" name="oldImage" value="{{ $berita->image }}">
            @if ($berita->image)
            <img src="{{ asset('storage/' . $berita->image) }}" class="max-w-sm mb-3 img-preview col-sm-5 d-block">
            @else
            <img class="max-w-sm mb-3 img-preview">
            @endif
            <input type="file" class="block w-1/2 border cursor-pointer bg-gray-300 border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 disabled:opacity-50 disabled:pointer-events-none
                file:bg-gray-400 file:border-0 file:me-4
                file:py-3 file:px-4 @error('image') border-red-500 @enderror" id="image" name="image" onchange="previewImage()">
            @error('image')
                <p class="mt-2 text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-10">
            <label for="body" class="block mb-2 text-lg font-semibold text-sky-800">Deskripsi</label>
            @error('body')
                <p class="mt-2 text-red-500">{{ $message }}</p>
            @enderror
            <input id="body" type="hidden" name="body" value="{{ old('body', $berita->body) }}" required>
            <trix-editor input="body"></trix-editor>
        </div>
        <div class="flex justify-end">
            <button type="submit" class="px-10 py-3 font-medium text-white transition-all duration-300 ease-in-out rounded-lg bg-primary hover:bg-sky-800">
                Submit
            </button>
        </div>
    </form>

    <script>
        const title = document.querySelector("#title");
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
          const image = document.querySelector('#image');
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