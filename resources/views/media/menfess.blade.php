@extends('layouts.main')

@section('container')
<style>
    .text:before{
        content: "";
        position: absolute;
        background-color: #0F172A;
        left: 14%;
        height: 50px;
        width: 200px;
        animation: animate-medium 4s infinite;
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

    @media screen and (min-width: 1024px) {
        .text:before {
            left: 18%; /* Adjust font size for larger screens */
            animation: animate-large 4s infinite;
        }
    }

    @media screen and (min-width: 1280px) {
        .text:before {
            left: 13.5%; /* Adjust font size for larger screens */
            animation: animate-extralarge 4s infinite;
        }
    }

    @media screen and (min-width: 1920px) {
        .text:before {
            left: 17%; /* Adjust font size for 1920 x 1080 screens */
            animation: animate-doubleextralarge 4s infinite;
        }
    }

    @media(prefers-reduced-motion){
        .hiddens{
            transition: all 1s;
        }
    }

    @keyframes animate-medium{
        40%, 60%{
            left: 28%;
        }

        100%{
            left: 14%
        }
    }

    @keyframes animate-large{
        40%, 60%{
            left: 34%;
        }

        100%{
            left: 18%
        }
    }

    @keyframes animate-extralarge{
        40%, 60%{
            left: 34%;
        }

        100%{
            left: 13.5%
        }
    }

    @keyframes animate-doubleextralarge{
        40%, 60%{
            left: 34%;
        }

        100%{
            left: 17%
        }
    }
</style>
<section id="home" class="pb-32 overflow-hidden pt-36 bg-dark">
   @if(session()->has('success'))
        <div id="success-message" class="relative flex justify-between w-1/2 p-4 mx-auto text-green-700 bg-green-100 border-l-4 border-green-500" role="alert">
            {{ session('success') }}
            <button
                class="font-bold text-green-600 hover:text-green-400 text-medium"
                onclick="this.parentElement.style.display='none'"
            >
                X
            </button>
        </div>

        <script>
            setTimeout(function() {
                var successMessage = document.getElementById('success-message');
                if (successMessage) {
                    successMessage.style.display = 'none';
                }
            }, 3000);
        </script>
    @endif

    <div class="items-center justify-center block px-4 md:px-12 2xl:px-48 lg:flex animate-fade-down">
        <div class="block w-3/4 px-4 mx-auto mb-10 lg:hidden">
            <object data="img/assets/message.svg" type="image/svg+xml" id="animated-svg"></object>                 
        </div>
        <div class="w-full px-4 lg:mr-15">
            <div class="max-w-full text-start">
                <h4 class="font-semibold text-lg text-primary mb-4 tracking-[0.3rem] lg:mb-2">MENFESS.</h4>
                <h2 class="mb-4 text-2xl font-bold leading-5 text-white lg:leading-10 lg:text-4xl">Ungkapkan Kata-kata</h2>
                <div class="flex">
                    <h2 class="hidden mb-4 font-semibold text-white lg:block lg:leading-10 lg:text-4xl">Untuk </h2>
                    <h2 class="hidden mb-4 ml-2 font-semibold text-yellow-400 text lg:block lg:leading-10 lg:text-4xl"></h2>
                </div>
                <p class="mb-10 font-medium text-md text-slate-400 md:text-lg">Mengirim Pesan Anonim 100% rahasia!</p>
                <a href="/menfess/send" class="px-8 py-3 text-sm font-semibold text-white transition duration-300 ease-in-out rounded-full bg-primary hover:shadow-lg hover:opacity-50">Kirim Menfess</a>
            </div>
        </div>
        <div class="hidden w-1/2 px-4 lg:block">
            <object data="img/assets/message.svg" type="image/svg+xml" id="animated-svg"></object>                 
        </div>
    </div>
</section>
<section id="bacamfs" class="pt-16 pb-32 bg-slate-700">
    <div class="w-full px-4 mb-16">
        <div class="max-w-xl mx-auto text-center">
            <h4 class="font-semibold text-sm text-primary mb-2 tracking-[0.3rem] lg:text-lg">SECRET MESSAGE</h4>
            <h2 class="mb-4 text-2xl font-bold text-white sm:text-4xl lg:text-5xl">KIRIMAN MENFESS.</h2>
        </div>
    </div>
    <div class="max-w-xs px-2 mx-auto mb-5 md:max-w-2xl md:px-0">
        <div class="flex items-center justify-between transition duration-300 ease-in-out accordion-header hover:opacity-50">
            <h4 class="text-base font-medium tracking-wide text-white lg:text-lg">Menfess Bulan Ini <span>🙌</span></h4>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffffff" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
            </svg>
        </div>
        <div class="accordion-body">
            @foreach ($data as $menfessParticle)
                @if($menfessParticle->status === 'Accept')
                    <div class="hiddens p-6 min-h-[150px] w-full mx-auto my-5 bg-white rounded-md">
                        <div class="w-full h-1/4 flex mb-1.5 lg:mb-3">
                            <h1 class="w-1/3 text-base font-semibold text-dark">Dari</h1>
                            <p class="w-full text-base font-small text-dark">{{ $menfessParticle->from }}</p>
                        </div>
                        <div class="w-full h-1/4 flex mb-1.5 lg:mb-3">
                            <h1 class="w-1/3 text-base font-semibold text-dark">Untuk</h1>
                            <p class="w-full text-base font-small text-dark">{{ $menfessParticle->to }}</p>
                        </div>
                        <div class="flex w-full h-full">
                            <h1 class="w-1/3 text-base font-semibold text-dark">Pesan</h1>
                            <p class="w-full text-base text-justify font-small text-dark">{{ $menfessParticle->message }}</p>
                        </div>
                    </div>
                @endif
            @endforeach
            @if ($data->isEmpty() || $data->where('status', 'Accept')->isEmpty())
                <div class="w-full p-6 mx-auto my-5 bg-white rounded-md">
                    <div class="w-full h-1/4">
                        <h1 class="text-base font-semibold text-dark lg:w-1/3">Menfess kosong</h1>
                    </div>
                </div>
            @endif
        </div>
    </div>    
    <div class="max-w-xs px-2 mx-auto mb-5 md:max-w-2xl md:px-0">
        <div class="flex items-center justify-between transition duration-300 ease-in-out accordion-header hover:bg-amber-600 hover:opacity-50">
            <h4 class="text-base font-medium tracking-wide text-white lg:text-lg">Menfess Terbaik Bulan Ini <span class="text-pink-500">❤</span></h4>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffffff" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
            </svg>
        </div>
        <div class="accordion-body">
            @foreach ($data as $menfessParticle)
                @if($menfessParticle->status === 'Terbaik')
                        <div class="hiddens p-6 h-[150px] w-full mx-auto my-5 bg-white rounded-md">
                            <div class="w-full h-1/4 flex mb-1.5 lg:mb-3">
                                <h1 class="w-1/3 text-base font-semibold text-dark">Dari</h1>
                                <p class="w-full text-base font-small text-dark">{{ $menfessParticle->from }}</p>
                            </div>
                            <div class="w-full h-1/4 flex mb-1.5 lg:mb-3">
                                <h1 class="w-1/3 text-base font-semibold text-dark">Untuk</h1>
                                <p class="w-full text-base font-small text-dark">{{ $menfessParticle->to }}</p>
                            </div>
                            <div class="flex w-full h-full">
                                <h1 class="w-1/3 text-base font-semibold text-dark">Pesan</h1>
                                <p class="w-full text-base text-justify font-small text-dark">{{ $menfessParticle->message }}</p>
                            </div>
                        </div>
                @endif
            @endforeach
            @if ($data->isEmpty() || $data->where('status', 'Terbaik')->isEmpty())
            {{-- @dd($data) --}}
                <div class="w-full p-6 mx-auto my-5 bg-white rounded-md">
                    <div class="w-full h-1/4">
                        <h1 class="text-base font-semibold text-dark lg:w-1/3">Menfess kosong</h1>
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
      <span class="block w-5 h-5 mt-2 rotate-45 border-t-2 border-l-2"></span>
    </a>
<script>

window.onscroll = function () {
    const header = document.querySelector("header");
    const fixedNav = header.offsetTop;
    const toTop = document.querySelector("#to-top");

    if (window.pageYOffset > fixedNav) {
        header.classList.add("navbar-fixed");
        toTop.classList.remove("hidden");
        toTop.classList.add("flex");
    } else {
        header.classList.remove("navbar-fixed");
        toTop.classList.remove("flex");
        toTop.classList.add("hidden");
    }
};

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