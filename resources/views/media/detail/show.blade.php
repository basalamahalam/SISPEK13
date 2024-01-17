@extends('layouts.main')
@section('container')
<section id="jurnal-berita" class="pt-36 pb-32 bg-slate-600">
    <div class="container">
        <div class="px-4 lg:px-6 flex justify-start mb-5">
            <a href="/{{ $name }}" class="font-semibold text-base text-white hover:text-primary transition-all duration-300 ease-in-out">{{ $name }} <span class="text-dark">/ </span></a>
            <h2 class="font-medium text-sm text-dark">{{ $data->title }}</h2>
        </div>
        <div class="px-4 lg:px-6">
            <img src="{{ asset('storage/' . $data->image) }}" alt="{{ $data->image }}" class="w-full max-h-[550px] mb-5 lg:mb-10">
            <h2 class="font-bold text-slate-300 text-2xl mb-2 lg:mb-4 sm:text-xl lg:text-4xl">{{ $data->title }}</h2>
            @if(isset($data->author))
            <p class="font-medium text-base text-slate-800">By {{ $data->author }}</p>
            @endif
        </div>
        
        <article class="my-5 px-4 lg:px-6 text-sm lg:text-base font-medium text-slate-900" style="text-align: justify;">
            {!! $data->body !!}
        </article>

        <a href="/{{ $name }}" class="px-4 lg:px-6 flex items-center font-semibold text-sm lg:font-semibold lg:text-lg text-white hover:text-primary transition-all duration-300 ease-in-out">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-short mr-3" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
            </svg>
            Kembali
        </a>
    </div>
</section>
@endsection