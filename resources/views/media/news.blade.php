@extends('layouts.main')

@section('container')
<section id="berita" class="pb-32 pt-36 bg-slate-700">
    <div class="px-4 md:px-12 2xl:px-48 animate-fade-up">
        <div class="mx-auto mb-10 text-center">
            <h4 class="font-semibold text-lg text-primary mb-2 tracking-[0.3rem]">{{ $title }}</h4>
            <h2 class="mb-4 text-2xl font-bold text-white sm:text-xl lg:text-4xl">{{ $subtitle }}</h2>
        </div>
        <div class="mb-10">
            <form action="/{{ $name }}" class="flex items-center justify-center w-full">
                <input
                    class="w-[80%] lg:w-1/2 py-2 pl-3 rounded-l-lg border-2 border-sky-700 focus:outline-none "
                    type="text"
                    placeholder="search"
                    name="search"
                    value="{{ request('search') }}"
                />
                <button class="text-base font-normal text-white bg-sky-700 rounded-br-lg p-2.5 hover:opacity-75 transition-all duration-300 ease-in-out" type="submit">Cari</button>
            </form>
        </div>

        @if($data->count())
        <div class="flex flex-wrap w-full px-4 xl:w-10/12 xl:mx-auto">
            @foreach($data as $post)
                <div class="p-4 mb-5 lg:mb-12 md:w-1/2">
                    <div class="rounded-md shadow-md">
                        <a href="/{{ $name }}/{{ $post->slug }}">
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->image }}" width="w-full">
                        </a>
                    </div>
                    <h3 class="mt-5 text-xl font-semibold text-white transition-all duration-300 ease-in-out hover:text-primary"><a href="/{{ $name }}/{{ $post->slug }}">{{ $post->title }}</a></h3>
                    <p class="mb-3 text-sm font-small text-slate-400">
                        <small>
                            {{ $post->created_at->diffForHumans() }}
                        </small>
                    </p>
                    <p class="text-base font-medium text-justify text-slate-400">{{ $post->excerpt }}</p>
                </div>
            @endforeach
        </div>
        @else
        <div class="container">
            <p class="text-2xl font-semibold text-center text-white">Tidak ada {{ $name }} yang ditemukan.</p>
        </div>
        @endif
        
        {{ $data->links() }}
    </div>
</section>
@endsection