@extends('layouts.main')

@section('container')
<section id="berita" class="pt-36 pb-32 bg-slate-700">
    <div class="container">
        <div class="mx-auto text-center mb-10">
            <h4 class="font-semibold text-lg text-primary mb-2 tracking-[0.3rem]">{{ $title }}</h4>
            <h2 class="font-bold text-white text-2xl mb-4 sm:text-xl lg:text-4xl">{{ $subtitle }}</h2>
        </div>
        <div class="mb-10">
            <form action="/{{ $name }}" class="w-full flex items-center justify-center">
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
        <div class="w-full px-4 flex flex-wrap xl:w-10/12 xl:mx-auto">
            @foreach($data as $post)
                <div class="mb-5 lg:mb-12 p-4 md:w-1/2">
                    <div class="rounded-md shadow-md">
                        <a href="/{{ $name }}/{{ $post->slug }}">
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->image }}" width="w-full">
                        </a>
                    </div>
                    <h3 class="font-semibold text-xl text-white mt-5 hover:text-primary transition-all duration-300 ease-in-out"><a href="/{{ $name }}/{{ $post->slug }}">{{ $post->title }}</a></h3>
                    <p class="font-small text-sm text-slate-400 mb-3">
                        <small>
                            {{ $post->created_at->diffForHumans() }}
                        </small>
                    </p>
                    <p class="font-medium text-base text-slate-400">{{ $post->excerpt }}</p>
                </div>
            @endforeach
        </div>
        @else
        <div class="container">
            <p class="font-semibold text-2xl text-white text-center">Tidak ada {{ $name }} yang ditemukan.</p>
        </div>
        @endif

        {{ $data->links() }}
    </div>
</section>
@endsection