@extends('admin.partials.main')

@section('container')
<section class="ml-0 lg:ml-[250px] p-8">
    <a href="/jurnal-admin" class="flex items-center font-semibold text-lg text-primary mb-10 hover:text-sky-800 transition-all duration-300 ease-in-out">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-short mr-3" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
        </svg>
        Kembali
    </a>
    <h2 class="text-dark font-bold text-3xl mb-3">JURNAL OSIS</h2>
    <h2 class="text-sky-800 font-small text-lg mb-10">Edit Jurnal</h2>
    <form action="/jurnal-admin/{{ $jurnal->slug }}" method="POST" enctype="multipart/form-data" class="max-w mx-auto">
        @method('put')
        @csrf
        <div class="mb-6">
            <label for="title" class="text-sky-800 text-lg font-semibold block mb-2">Title</label>
            <input type="text" class="bg-gray-300 rounded-md block w-1/2 p-2 @error('title') border-red-500 @enderror" id="title" name="title" value="{{ old('title', $jurnal->title) }}" required autofocus>
            @error('title')
                <p class="text  -red-500 mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="slug" class="text-sky-800 text-lg font-semibold block mb-2">Slug</label>
            <input type="text" class="bg-gray-300 rounded-md block w-1/2 p-2 @error('slug') border-red-500 @enderror" id="slug" name="slug" value="{{ old('slug', $jurnal->slug) }}" required>
            @error('slug')
            <p class="text-red-500 mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="author" class="text-sky-800 text-lg font-semibold block mb-2">Penulis</label>
            <input type="text" class="bg-gray-300 rounded-md block w-1/2 p-2 @error('author') border-red-500 @enderror" id="author" name="author" value="{{ old('author', $jurnal->author) }}" required autofocus>
            @error('author')
                <p class="text-red-500 mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="image" class="text-sky-800 text-lg font-semibold block">Journal Image</label>
            <input type="hidden" name="oldImage" value="{{ $jurnal->image }}">
            @if ($jurnal->image)
            <img src="{{ asset('storage/' . $jurnal->image) }}" class="img-preview max-w-sm mb-3 col-sm-5 d-block">
            @else
            <img class="img-preview max-w-sm mb-3">
            @endif
            <input type="file" class="block w-1/2 border cursor-pointer bg-gray-300 border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 disabled:opacity-50 disabled:pointer-events-none
                file:bg-gray-400 file:border-0 file:me-4
                file:py-3 file:px-4 @error('image') border-red-500 @enderror" id="image" name="image" onchange="previewImage()">
            @error('image')
                <p class="text-red-500 mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-10">
            <label for="body" class="text-sky-800 text-lg font-semibold block mb-2">Deskripsi</label>
            @error('body')
                <p class="text-red-500 mt-2">{{ $message }}</p>
            @enderror
            <input id="body" type="hidden" name="body" value="{{ old('body', $jurnal->body) }}" required>
            <trix-editor input="body"></trix-editor>
        </div>
        <div class="flex justify-end">
            <button type="submit" class="bg-primary hover:bg-sky-800 text-white font-medium py-3 px-10 rounded-lg transition-all duration-300 ease-in-out">
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