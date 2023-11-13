@extends('layouts.main')

@section('container')
<section id="ekskul" class="pt-36 pb-32 bg-slate-600">
    <div class="container">
        <div class="mx-auto text-center mb-10">
            <h4 class="font-semibold text-lg text-primary mb-2 tracking-[0.3rem]">EKSKUL 13</h4>
            <h2 class="font-bold text-white text-2xl mb-4 sm:text-xl lg:text-4xl">Ekstrakurikuler</h2>
        </div>
        <div class="mb-10">
            <form action="/ekskul" class="w-full flex items-center justify-center">
                <input
                    class="w-1/2 py-2 pl-3 rounded-l-lg border-2 border-sky-700 focus:outline-none "
                    type="text"
                    placeholder="search"
                    name="search"
                    value="{{ request('search') }}"
                />
                <button class="text-base font-normal text-white bg-sky-700 rounded-br-lg p-2.5 hover:opacity-75 transition-all duration-300 ease-in-out" type="submit">Cari</button>
            </form>
        </div>
        @if($data->count())
        <div class="flex flex-wrap mb-5">
            @foreach ($data as $post)
            <div class="w-full p-4 lg:w-1/2 xl:w-1/3">
                <div class="py-4 bg-slate-800 rounded-xl shadow-lg overflow-hidden">
                    <img src="../img/logo/OSIS.png" alt="programming" class="w-[150px] mx-auto ">
                    <div class="p-4 flex flex-col justify-center items-center">
                        <h3 class="block mb-3 font-semibold text-xl text-white truncate">{{ $post->name }}</h3>
                        <a href="/ekskul/{{ $post->slug }}" class="font-small text-xs text-white bg-primary py-2 px-4 rounded-lg hover:opacity-80">Selengkapnya</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="container">
            <p class="font-semibold text-2xl text-white text-center">Tidak ada ekskul yang ditemukan.</p>
        </div>
        @endif

        {{ $data->links() }}
    </div>
</section>
@endsection