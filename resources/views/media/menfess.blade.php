@extends('layouts.main')

@section('container')
<style>
    .text:before{
        content: "";
        position: absolute;
        background-color: #0F172A;
        left: 19%;
        height: 50px;
        width: 200px;
        animation: animate 4s infinite;
    }

    .hiddens{
        opacity: 0;
        transition: all 1s;
        filter: blur(5px);
    }

    .show{
        opacity: 1;
        filter: blur(0px);
    }

    @media(prefers-reduced-motion){
        .hiddens{
            transition: all 1s;
        }
    }

    @keyframes animate{
        40%, 60%{
            left: 33.5%;
        }

        100%{
            left: 19%;
        }
    }
</style>
<section id="home" class="pt-36 pb-32 bg-dark overflow-hidden">
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

    <div class="container block lg:flex justify-center items-center animate-fade-down">
        <div class="block mx-auto w-3/4 mb-10 md:hidden px-4">
            <object data="img/assets/message.svg" type="image/svg+xml" id="animated-svg"></object>                 
        </div>
        <div class="w-full px-4 lg:mr-15">
            <div class="max-w-full text-start">
                <h4 class="font-semibold text-lg text-primary mb-4 tracking-[0.3rem] lg:mb-2">MENFESS.</h4>
                <h2 class="font-bold text-white text-2xl leading-5 mb-4 lg:leading-10 lg:text-4xl">Ungkapkan Kata-kata</h2>
                <div class="flex">
                    <h2 class="hidden lg:block font-semibold text-white mb-4 lg:block lg:leading-10 lg:text-4xl">Untuk </h2>
                    <h2 class="text hidden ml-2 font-semibold text-yellow-400 mb-4 lg:block lg:leading-10 lg:text-4xl"></h2>
                </div>
                <p class="font-medium text-md text-slate-400 md:text-lg mb-10">Mengirim Pesan Anonim 100% rahasia!</p>
                <a href="/menfess/send" class="text-sm font-semibold text-white bg-primary py-3 px-8 rounded-full hover:shadow-lg hover:opacity-50 transition duration-300 ease-in-out">Kirim Menfess</a>
            </div>
        </div>
        <div class="hidden lg:block w-1/2 px-4">
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
    <div class="max-w-xs mx-auto mb-5 lg:max-w-2xl">
        <div class="accordion-header flex items-center justify-between hover:opacity-50 transition duration-300 ease-in-out">
            <h4 class="text-white text-base lg:text-lg font-medium tracking-wide">Menfess Bulan Ini <span>🙌</span></h4>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffffff" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
            </svg>
        </div>
        <div class="accordion-body">
            @foreach ($data as $menfessParticle)
                @if($menfessParticle->status === 'Accept')
                    <div class="hiddens p-6 min-h-[150px] w-full mx-auto my-5 bg-white rounded-md">
                        <div class="w-full h-1/4 flex mb-1.5 lg:mb-3">
                            <h1 class="font-semibold text-base text-dark w-1/3">Dari</h1>
                            <p class="w-full font-small text-base text-dark">{{ $menfessParticle->from }}</p>
                        </div>
                        <div class="w-full h-1/4 flex mb-1.5 lg:mb-3">
                            <h1 class="font-semibold text-base text-dark w-1/3">Untuk</h1>
                            <p class="w-full font-small text-base text-dark">{{ $menfessParticle->to }}</p>
                        </div>
                        <div class="w-full h-full flex">
                            <h1 class="font-semibold text-base text-dark w-1/3">Pesan</h1>
                            <p class="w-full font-small text-base text-dark text-justify">{{ $menfessParticle->message }}</p>
                        </div>
                    </div>
                @endif
            @endforeach
            @if ($data->isEmpty() || $data->where('status', 'Accept')->isEmpty())
                <div class="p-6 w-full mx-auto my-5 bg-white rounded-md">
                    <div class="w-full h-1/4">
                        <h1 class="font-semibold text-base text-dark lg:w-1/3">Menfess kosong</h1>
                    </div>
                </div>
            @endif
        </div>
    </div>    
    <div class="max-w-xs mx-auto mb-5 lg:max-w-2xl">
        <div class="accordion-header flex items-center justify-between hover:bg-amber-600 hover:opacity-50 transition duration-300 ease-in-out">
            <h4 class="text-white text-base lg:text-lg font-medium tracking-wide">Menfess Terbaik Bulan Ini <span class="text-pink-500">❤</span></h4>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffffff" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
            </svg>
        </div>
        <div class="accordion-body">
            @foreach ($data as $menfessParticle)
                @if($menfessParticle->status === 'Terbaik')
                        <div class="hiddens p-6 h-[150px] w-full mx-auto my-5 bg-white rounded-md">
                            <div class="w-full h-1/4 flex mb-1.5 lg:mb-3">
                                <h1 class="font-semibold text-base text-dark w-1/3">Dari</h1>
                                <p class="w-full font-small text-base text-dark">{{ $menfessParticle->from }}</p>
                            </div>
                            <div class="w-full h-1/4 flex mb-1.5 lg:mb-3">
                                <h1 class="font-semibold text-base text-dark w-1/3">Untuk</h1>
                                <p class="w-full font-small text-base text-dark">{{ $menfessParticle->to }}</p>
                            </div>
                            <div class="w-full h-full flex">
                                <h1 class="font-semibold text-base text-dark w-1/3">Pesan</h1>
                                <p class="w-full font-small text-base text-dark text-justify">{{ $menfessParticle->message }}</p>
                            </div>
                        </div>
                @endif
            @endforeach
            @if ($data->isEmpty() || $data->where('status', 'Terbaik')->isEmpty())
            {{-- @dd($data) --}}
                <div class="p-6 w-full mx-auto my-5 bg-white rounded-md">
                    <div class="w-full h-1/4">
                        <h1 class="font-semibold text-base text-dark lg:w-1/3">Menfess kosong</h1>
                    </div>
                </div>
            @endif  
        </div>
    </div>
</section>
<a
      href="#home"
      class="h-14 w-14 bg-primary flex justify-center items-center rounded-full fixed z-index[9999] bottom-4 right-10 lg:right-4 p-4 hover:animate-pulse"
      id="to-top"
    >
      <span class="block w-5 h-5 rotate-45 border-t-2 border-l-2 mt-2"></span>
    </a>
<script>
   const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            console.log(entry);
            if (entry.isIntersecting) {
                entry.target.classList.add('show');
            } else {
                entry.target.classList.remove('show');
            }
        });
    });

    const hiddenElements = document.querySelectorAll('.hiddens');
    hiddenElements.forEach((el) => observer.observe(el));


    document.addEventListener("DOMContentLoaded", function () {
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
    });

    const text = document.querySelector('.text');

    const textLoad = function(){
        setTimeout(() => {
            text.textContent = "Teman"
        }, 0);
        setTimeout(() => {
            text.textContent = "Guru"
        }, 4000);
        setTimeout(() => {
            text.textContent = "Gebetan"
        }, 8000);
    }

    textLoad();
    setInterval(textLoad, 12000);
</script>
@endsection