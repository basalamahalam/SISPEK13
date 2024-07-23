@extends('layouts.main')

@section('container')
<section id="ekskul" class="min-h-screen pb-32 pt-36 bg-slate-600">
    <div class="px-4 md:px-12 2xl:px-48 animate-fade-up">
        <div class="mx-auto mb-10 text-center">
            <h4 class="font-semibold text-lg text-primary mb-2 tracking-[0.3rem]">EKSKUL 13</h4>
            <h2 class="mb-4 text-2xl font-bold text-white sm:text-xl md:text-4xl">Ekstrakurikuler</h2>
        </div>
        <div class="mb-10">
            <form action="/ekskul" class="flex items-center justify-center w-full">
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
        <div class="grid gap-3 px-6 mb-5 grid-cols sm:grid-cols-2 2xl:grid-cols-5 lg:grid-cols-4 md:grid-cols-3 lg:px-0">
            @foreach ($data as $post)
            <div class="w-full p-4">
                <div class="py-4 overflow-hidden shadow-lg bg-slate-800 rounded-xl">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->image }}" class="w-[150px] mx-auto p-2">
                    <div class="flex flex-col items-center justify-center p-4">
                        <h3 class="block mb-3 text-xl font-semibold text-white truncate">{{ $post->name }}</h3>
                        <a href="/ekskul/{{ $post->slug }}" class="px-4 py-2 text-xs text-white rounded-lg font-small bg-primary hover:opacity-80">Selengkapnya</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="container">
            <p class="text-2xl font-semibold text-center text-white">Tidak ada ekskul yang ditemukan.</p>
        </div>
        @endif

        {{ $data->links() }}
    </div>
</section>
@endsection