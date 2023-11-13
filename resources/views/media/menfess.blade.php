@extends('layouts.main')

@section('container')
<section id="kirimfs" class="pt-36 pb-32 bg-dark">
   @if(session()->has('success'))
        <div class="w-1/2 flex justify-between mx-auto bg-green-100 border-l-4 border-green-500 text-green-700 p-4 relative" role="alert">
            {{ session('success') }}
            <button
                class=" text-green-600 hover:text-green-400 font-bold text-medium"
                onclick="this.parentElement.style.display='none'"
            >
                X
            </button>
        </div>
    @endif

    <div class="container flex justify-center items-center">
        <div class="w-full px-4 mr-15">
            <div class="max-w-full text-start">
                <h4 class="font-semibold text-lg text-primary mb-4 tracking-[0.3rem] lg:mb-2">MENFESS.</h4>
                <h2 class="font-bold text-white text-2xl leading-5 mb-4 lg:leading-10 lg:text-4xl">Ungkapkan Kata-kata</h2>
                <h2 class="hidden font-semibold text-white mb-4 lg:block lg:leading-10 lg:text-4xl">Untuk Teman.</h2>
                <p class="font-medium text-md text-slate-400 md:text-lg mb-10">Mengirim Pesan Anonim 100% rahasia!</p>
                <a href="/menfess/send" class="text-sm font-semibold text-white bg-primary py-3 px-8 rounded-full hover:shadow-lg hover:opacity-50 transition duration-300 ease-in-out">Kirim Menfess</a>
            </div>
        </div>
        <div class="w-1/2 px-4">
            <object data="img/assets/message.svg" type="image/svg+xml" id="animated-svg"></object>                 
        </div>
    </div>
</section>
<section id="bacamfs" class="pt-16 pb-32 bg-slate-700">
    <div class="w-full px-4 mb-16">
        <div class="max-w-xl mx-auto text-center">
            <h4 class="font-semibold text-sm text-primary mb-2 tracking-[0.3rem] lg:text-lg">SECRET MESSAGE</h4>
            <h2 class="font-bold text-white text-2xl mb-4 sm:text-4xl lg:text-5xl">KIRIMAN MENFESS.</h2>
        </div>
    </div>
    <div class="max-w-lg mx-auto mb-5 lg:max-w-2xl">
        <div class="accordion-header flex items-center justify-between hover:opacity-50 transition duration-300 ease-in-out">
            <h4 class="text-white text-lg font-medium tracking-wide">Menfess Bulan Ini <span>🙌</span></h4>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffffff" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
            </svg>
        </div>
        <div class="accordion-body">
            @foreach ($data as $menfessParticle)
                @if($menfessParticle->status === 1)
                    <div class="p-6 h-[200px] w-full mx-auto my-5 bg-white rounded-md">
                        <div class="w-full h-1/4 flex">
                            <h1 class="font-semibold text-base text-dark w-1/3">Dari</h1>
                            <p class="w-full font-small text-base text-dark">{{ $menfessParticle->from }}</p>
                        </div>
                        <div class="w-full h-1/4 flex">
                            <h1 class="font-semibold text-base text-dark w-1/3">Untuk</h1>
                            <p class="w-full font-small text-base text-dark">{{ $menfessParticle->to }}</p>
                        </div>
                        <div class="w-full h-full flex">
                            <h1 class="font-semibold text-base text-dark w-1/3">Pesan</h1>
                            <p class="w-full font-small text-base text-dark">{{ $menfessParticle->message }}</p>
                        </div>
                    </div>
                @endif
            @endforeach
            @if ($data->isEmpty() || $data->where('status', 1)->isEmpty())
                <div class="p-6 w-full mx-auto my-5 bg-white rounded-md">
                    <div class="w-full h-1/4">
                        <h1 class="font-semibold text-base text-dark w-1/3">Menfess kosong</h1>
                    </div>
                </div>
            @endif
        </div>
    </div>    
    <div class="max-w-lg mx-auto mb-5 lg:max-w-2xl">
        <div class="accordion-header flex items-center justify-between hover:bg-amber-600 hover:opacity-50 transition duration-300 ease-in-out">
            <h4 class="text-white text-lg font-medium tracking-wide">Menfess Terbaik Bulan Ini <span class="text-pink-500">❤</span></h4>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffffff" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
            </svg>
        </div>
        <div class="accordion-body">
            @foreach ($data as $menfessParticle)
                @if($menfessParticle->status === 2)
                        <div class="p-6 h-[200px] w-full mx-auto my-5 bg-white rounded-md">
                            <div class="w-full h-1/4 flex">
                                <h1 class="font-semibold text-base text-dark w-1/3">Dari</h1>
                                <p class="w-full font-small text-base text-dark">{{ $menfessParticle->from }}</p>
                            </div>
                            <div class="w-full h-1/4 flex">
                                <h1 class="font-semibold text-base text-dark w-1/3">Untuk</h1>
                                <p class="w-full font-small text-base text-dark">{{ $menfessParticle->to }}</p>
                            </div>
                            <div class="w-full h-full flex">
                                <h1 class="font-semibold text-base text-dark w-1/3">Pesan</h1>
                                <p class="w-full font-small text-base text-dark">{{ $menfessParticle->message }}</p>
                            </div>
                        </div>
                @endif
            @endforeach
            @if ($data->isEmpty() || $data->where('status', 2)->isEmpty())
            {{-- @dd($data) --}}
                <div class="p-6 w-full mx-auto my-5 bg-white rounded-md">
                    <div class="w-full h-1/4">
                        <h1 class="font-semibold text-base text-dark w-1/3">Menfess kosong</h1>
                    </div>
                </div>
            @endif  
        </div>
    </div>
</section>
<script>document.addEventListener("DOMContentLoaded", function () {
    const accordionHeaders = document.querySelectorAll(".accordion-header");

    accordionHeaders.forEach((accordionHeader) => {
        accordionHeader.addEventListener("click", (event) => {
            accordionHeader.classList.toggle("active");
            const accordionBody = accordionHeader.nextElementSibling;
            if (accordionHeader.classList.contains("active")) {
                accordionBody.style.maxHeight =
                    accordionBody.scrollHeight + "px";
            } else {
                accordionBody.style.maxHeight = "0";
            }
        });
    });
});</script>
@endsection