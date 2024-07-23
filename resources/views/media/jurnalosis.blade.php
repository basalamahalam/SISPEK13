@extends('layouts.main')

@section('container')
<section id="jurnal" class="pb-32 pt-36 bg-slate-600">
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
           <div class="grid grid-cols-1 gap-6 px-4 mb-5 sm:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 lg:px-0">
    @foreach($data as $post)
    <div class="px-2 md:px-4">
        <div class="mb-10 overflow-hidden shadow-lg bg-slate-700 rounded-xl">
            <div class="h-64">
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->image }}" class="object-cover w-full h-full">
            </div>
            <div class="px-6 py-8">
                <h3 class="block text-xl font-semibold text-white truncate">{{ $post->title }}</h3>
                <p class="mb-3 text-sm font-small text-slate-400">
                    <small>
                        By {{ $post->author }} {{ $post->created_at->diffForHumans() }}
                    </small>
                </p>
                <p class="mb-6 text-base font-medium truncate text-slate-300">{{ $post->excerpt }}</p>
                <a href="/{{ $name }}/{{ $post->slug }}" class="px-4 py-2 text-sm font-medium text-white rounded-lg bg-primary hover:opacity-80">Baca Selengkapnya</a>
            </div>
        </div>
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