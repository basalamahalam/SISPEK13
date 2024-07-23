@extends('layouts.main')
@section('container')
<section id="jurnal-berita" class="min-h-screen pb-32 pt-36 bg-slate-900">
    <div class="px-4 md:px-12 2xl:px-48 animate-fade-up">
        <div class="flex justify-start px-4 mb-5 lg:px-6">
            <a href="/{{ $name }}" class="text-base font-semibold text-white transition-all duration-300 ease-in-out hover:text-primary">{{ $name }} <span class="text-dark">/ </span></a>
            <h2 class="text-sm font-medium text-yellow-500">{{ $data->title }}</h2>
        </div>
        <div class="px-4 lg:px-6">
            <img src="{{ asset('storage/' . $data->image) }}" alt="{{ $data->image }}" class="w-full max-h-[550px] mb-5 lg:mb-10 object-cover">
            <h2 class="mb-2 text-2xl font-bold text-white lg:mb-4 sm:text-xl lg:text-4xl">{{ $data->title }}</h2>
            @if(isset($data->author))
            <p class="text-base font-medium text-slate-300">By {{ $data->author }}</p>
            @endif
        </div>
        
        <article class="px-4 mt-5 mb-10 text-sm font-medium text-justify lg:px-6 lg:text-base text-slate-300">
            {!! $data->body !!}
        </article>

        <a href="/{{ $name }}" class="flex items-center px-4 text-sm font-semibold text-yellow-500 transition-all duration-300 ease-in-out lg:px-6 lg:font-semibold lg:text-lg hover:text-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mr-3 bi bi-arrow-left-short" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
            </svg>
            Kembali
        </a>
    </div>
</section>
@endsection