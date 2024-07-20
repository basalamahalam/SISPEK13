@extends('layouts.main')

@section('container')
  <section id="home" class="pb-32 pt-36 bg-dark">
    @if(session()->has('success'))
        <div class="relative flex justify-between w-1/2 p-4 mx-auto text-green-700 bg-green-100 border-l-4 border-green-500" role="alert">
            {{ session('success') }}
            <button
                class="font-bold text-green-600 hover:text-green-400 text-medium"
                onclick="this.parentElement.style.display='none'"
            >
                X
            </button>
        </div>
    @endif
    <div class="container animate-fade-up">
        <div class="flex flex-wrap-reverse justify-center lg:justify-between lg:items-center">
            <div class="w-full mt-10 text-center lg:w-1/2 lg:mt-0 lg:text-left">
                <h1 class="text-base font-semibold text-primary lg:text-xl 2xl:text-2xl">Selamat Datang di Website
                    <span class="block my-3 text-4xl font-bold text-white lg:text-5xl xl:text-6xl">SISPEK13!</span></h1>
                <h2 class="my-3 text-lg font-medium text-slate-500 lg:text-2xl xl:text-3xl">OSIS - MPK & EKSTRAKURIKULER
                    <span class="font-bold text-white">13</span></h2>
                <p class="mb-10 font-medium leading-relaxed text-slate-400 xl:text-xl">Halaman Website Resmi <span class="font-bold text-white xl:text-xl">SISPEK SMKN 13 Bandung. </span><span class="text-pink-500">❤</span></p>
            
                <a href="/web" class="px-8 py-3 text-sm font-semibold text-white transition duration-300 ease-in-out rounded-full bg-primary hover:shadow-lg hover:opacity-50">Selengkapnya</a>
            </div>
            <div class="hidden w-5/6 self-center overflow-hidden lg:w-[40%] lg:block lg:rounded-lg lg:shadow-2xl lg:shadow-slate-600">
                <div class="relative flex wrapper lg:right-0">
                    <img src="img/logo/bg.png" alt="MPK" class="max-w-full mx-auto object-fit"> 
                    <img src="img/logo/osis-bg.jpg" alt="OSIS" class="max-w-full mx-auto object-fit"/>
                    <img src="img/logo/mpk-bg.jpg" alt="MPK" class="max-w-full mx-auto object-fit">
                    <img src="img/logo/mpk.png" alt="MPK" class="max-w-full mx-auto object-fit"> 
                </div>
            </div>
        </div>
    </div>
  </section>
  <section id="organization" class="pb-32 pt-36 bg-slate-700">
    <div class="container">
        <div class="mx-auto mb-5 text-center lg:mb-10">
            <h4 class="font-semibold text-lg text-primary mb-2 tracking-[0.3rem]">TENTANG KAMI</h4>
            <h2 class="mb-4 text-2xl font-bold text-white sm:text-xl lg:text-4xl">Struktur Kepengurusan</h2>
        </div>
        <div class="w-full mx-auto lg:w-3/4">
            <div class="relative overflow-hidden">
                <div class="slider flex w-[300%] transition-all duration-500">
                    <div class="flex items-center justify-center basis-full">
                        <div class="w-[80%] lg:w-3/4 px-4 my-10">
                            <h4 class="mb-2 text-sm text-yellow-500 font-small lg:font-bold lg:text-lg">OSIS 2023-2024</h4>
                            <h2 class="mb-4 text-base font-medium text-white lg:font-bold lg:text-2xl">Organisasi Siswa Intra Sekolah</h2>
                            <p class="mb-10 text-sm font-thin text-justify text-slate-300 lg:font-medium lg:text-base ">Badan organisasi yang dijalankan oleh siswa di sekolah dengan tujuan untuk mengoordinasikan kegiatan siswa, dan mempromosikan keterlibatan siswa.</p>
                            <a href="/osis" class="px-8 py-3 text-sm font-semibold text-white transition duration-300 ease-in-out rounded-full bg-primary hover:shadow-lg hover:opacity-50">Selengkapnya</a>
                        </div>
                        <div class="hidden lg:block max-w-[150px] px-4">
                            <img src="img/logo/logo.png" alt="logo OSIS">
                        </div>
                    </div>
                    <div class="flex items-center justify-center basis-full">
                        <div class="w-[80%] lg:w-2/3 px-4 my-10">
                            <h4 class="mb-2 text-sm text-blue-400 font-small lg:font-bold lg:text-lg">MPK 2023-2024</h4>
                            <h2 class="mb-4 text-base font-medium text-white lg:font-bold lg:text-2xl">Majelis Perwakilan Kelas</h2>
                            <p class="mb-10 text-sm font-thin text-justify text-slate-300 lg:font-medium lg:text-base ">Badan organisasi yang berada didalam sekolah dengan tugas sebagai evaluator, aspirator dan legislator.</p>
                            <a href="/mpk" class="px-8 py-3 text-sm font-semibold text-white transition duration-300 ease-in-out rounded-full bg-primary hover:shadow-lg hover:opacity-50">Selengkapnya</a>
                        </div>
                        <div class="hidden lg:block max-w-[150px] px-4">
                            <img src="img/logo/logo-mpk.png" alt="logo OSIS">
                        </div>
                    </div>
                    <div class="flex items-center justify-center basis-full">
                        <div class="w-[80%] lg:w-2/3 px-4 my-10">
                            <h4 class="mb-2 text-sm text-green-500 font-small lg:font-bold lg:text-lg">EKSKUL</h4>
                            <h2 class="mb-4 text-base font-medium text-white lg:font-bold lg:text-2xl">Ekstrakurikuler SMKN 13 Bandung</h2>
                            <p class="mb-10 text-sm font-thin text-justify text-slate-300 lg:font-medium lg:text-base ">Kegiatan non-akademik yang bertujuan untuk mengembangkan minat dan bakat siswa SMKN 13 Bandung diluar keahlian mereka.</p>
                            <a href="/ekskul" class="px-8 py-3 text-sm font-semibold text-white transition duration-300 ease-in-out rounded-full bg-primary hover:shadow-lg hover:opacity-50">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="mt-10 control md:mt-0">
                    <button class="absolute left-0 prev-button top-1/2"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#94a3b8" class="bi bi-chevron-compact-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M9.224 1.553a.5.5 0 0 1 .223.67L6.56 8l2.888 5.776a.5.5 0 1 1-.894.448l-3-6a.5.5 0 0 1 0-.448l3-6a.5.5 0 0 1 .67-.223z"/>
                      </svg></button>
                    <button class="absolute right-0 next-button top-1/2"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#94a3b8" class="bi bi-chevron-compact-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6.776 1.553a.5.5 0 0 1 .671.223l3 6a.5.5 0 0 1 0 .448l-3 6a.5.5 0 1 1-.894-.448L9.44 8 6.553 2.224a.5.5 0 0 1 .223-.671z"/>
                      </svg></button>
                    <ul class="absolute bottom-2.5 h-5 left-1/2 list-none flex p-0 m-0" style="transform: translate(-50%);">
                        <li class="selected"></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
  <section id="menfess" class="pb-32 pt-36 bg-slate-600">
    <div class="container items-center justify-center block lg:flex">
        <div class="w-2/3 px-4 mx-auto mb-10 lg:mb-0 lg:mr-20">
            <object data="img/assets/menfess.svg" type="image/svg+xml" id="animated-svg"></object>                 
        </div>
        <div class="w-full px-4">
            <div class="max-w-full text-start">
                <h4 class="font-medium text-xs lg:font-semibold lg:text-lg 2xl:text-xl text-primary mb-2 tracking-[0.2rem] lg:tracking-[0.3rem]">SECRET MESSAGES</h4>
                <h2 class="mb-4 text-3xl font-bold tracking-widest text-white sm:text-4xl lg:text-5xl 2xl:text-6xl">MENFESS.</h2>
                <p class="mb-10 text-sm font-thin lg:font-medium lg:text-base 2xl:text-xl text-slate-400">Mengirim Pesan Anonim untuk kalian yang pemalu xixixi, Ayo Kirim Menfess Sekarang!!!</p>
                <a href="/menfess" class="text-[11px] font-small lg:text-sm lg:font-semibold text-white bg-primary py-2 px-4 lg:py-3 lg:px-8 rounded-full hover:shadow-lg hover:opacity-50 transition duration-300 ease-in-out">Baca atau Kirim Menfess</a>
            </div>
        </div>
    </div>
  </section>
  <section id="jurnalosis" class="pb-32 pt-36 bg-slate-300">
    <div class="container">
        <div class="w-full">
            <div class="max-w-full mx-auto mb-16 text-center">
                <h4 class="font-semibold text-lg 2xl:text-xl text-primary mb-2 tracking-[0.3rem]">ARTIKEL LITERASI</h4>
                <h2 class="mb-4 text-3xl font-bold text-dark sm:text-4xl lg:text-5xl 2xl:text-6xl">Jurnal OSIS</h2>
                <p class="font-medium text-md text-slate-500 md:text-lg 2xl:text-xl">Baca Yuk! Artikel Edukatif dari Siswa-Siswi SMKN 13 Bandung.</p>
            </div>
        </div>
        <div class="flex flex-wrap justify-center mb-5">
            @for($i = 0; $i < min($jurnal->count(), 3); $i++)
                <div class="w-[90%] px-4 lg:w-1/2 xl:w-1/3">
                    <div class="mb-10 overflow-hidden shadow-lg bg-slate-700 rounded-xl">
                        <div class="relative h-64">
                            <img src="{{ asset('storage/' . $jurnal[$i]->image) }}" alt="{{ $jurnal[$i]->image }}" class="absolute top-0 left-0 object-cover w-full h-full">
                        </div>
                        <div class="px-6 py-8">
                            <h3><a href="/jurnal/{{ $jurnal[$i]->slug }}" class="block mb-3 text-xl font-semibold text-white truncate hover:text-primary">{{ $jurnal[$i]->title }}</a></h3>
                            <article class="mb-6 text-base font-medium text-slate-500">{!! Str::limit($jurnal[$i]->body, $limit = 50, $end = '...') !!}</article>
                            <a href="/jurnal/{{ $jurnal[$i]->slug }}" class="px-4 py-2 text-sm font-medium text-white rounded-lg bg-primary hover:opacity-80">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
        <div class="flex justify-center">
        <a href="/jurnal" class="px-8 py-3 text-sm font-semibold text-white transition duration-300 ease-in-out rounded-full bg-primary animate-bounce hover:shadow-lg hover:opacity-50">Baca Jurnal OSIS Lainnya...</a>
        </div>
    </div>
  </section>
  <section id="berita" class="pb-32 pt-36 bg-slate-700">
    <div class="container">
        <div class="w-full px-4">
            <div class="mx-auto mb-16 text-center max-w-FULL">
                <h4 class="font-semibold text-lg 2xl:text-xl text-primary mb-2 tracking-[0.3rem]">BERITA SISPEK13</h4>
                <h2 class="mb-4 text-3xl font-bold text-white sm:text-4xl lg:text-5xl 2xl:text-6xl">Portal Berita</h2>
                <p class="font-medium text-md text-slate-400 md:text-lg 2xl:text-xl">Platform berita yang menyajikan informasi terkini seputar kegiatan di SMKN 13 Bandung.</p>
            </div>
        </div>
        <div class="flex flex-wrap justify-center w-full px-4 xl:w-10/12 xl:mx-auto">
            @for($i=0; $i < min($berita->count(), 4); $i++)
                <div class="w-full p-4 mb-7 lg:mb-12 lg:w-1/2">
                    <a href="/berita/{{ $berita[$i]->slug }}">
                        <div class="rounded-md shadow-md">
                            <img src="{{ asset('storage/' . $berita[$i]->image) }}" alt="{{ $berita[$i]->image }}" class="max-h-[270px]">
                        </div>
                        <h3 class="mt-5 mb-3 text-xl font-semibold text-white">{{ $berita[$i]->title }}</h3>
                        <article class="text-base font-medium text-slate-400">{!! Str::limit($berita[$i]->body, $limit = 50, $end = '...') !!}</article>
                    </a>
                </div>
            @endfor
        </div>
        <div class="flex justify-center mt-10">
            <a href="/berita" class="px-8 py-3 text-sm font-semibold text-white transition duration-300 ease-in-out rounded-full bg-primary animate-bounce hover:shadow-lg hover:opacity-50">Baca Berita Lainnya...</a>
        </div>
    </div>
  </section>
  <section id="developer" class="pb-32 pt-36 bg-slate-600">
    <div class="container">
        <div class="w-full px-4">
            <div class="mx-auto mb-16 text-center">
                <h4 class="mb-2 text-lg font-semibold 2xl:text-xl text-primary">Developer</h4>
                <h2 class="mb-4 text-3xl font-bold text-white 2xl:text-6xl sm:text-4xl lg:text-5xl">Pihak yang Terkait</h2>
                <p class="font-medium text-md text-slate-400 md:text-lg 2xl:text-xl">Beberapa pihak yang terkait dalam pengembangan Website ini.</p>
            </div>
        </div>

        <div class="w-full px-4">
            <div class="flex flex-wrap items-center justify-center">
                <a href="https://instagram.com/smkn13bandung" target="_blank" class="max-w-[80px] lg:max-w-[120px] mx-4 py-4 grayscale opacity-60 transition hover:grayscale-0 hover:opacity-100 duration-500 lg:mx-6 sm:mx-8">
                    <img src="img/logo/logo13.png" alt="google">
                </a>
                <a href="https://instagram.com/_bslmhalam" target="_blank" class="max-w-[80px] lg:max-w-[100px] mx-4 py-4 grayscale opacity-60 transition hover:grayscale-0 hover:opacity-100 duration-500 lg:mx-6 sm:mx-8">
                    <img src="img/logo/logo-best.png" alt="google">
                </a>
                <a href="https://instagram.com/osissmkn13bandung" target="_blank" class="max-w-[80px] lg:max-w-[120px] mx-4 py-4 grayscale opacity-60 transition hover:grayscale-0 hover:opacity-100 duration-500 lg:mx-6 sm:mx-8">
                    <img src="img/logo/logo.png" alt="google">
                </a>
                <a href="https://instagram.com/mpksmkn13bdg" target="_blank" class="max-w-[80px] lg:max-w-[120px] mx-4 py-4 grayscale opacity-60 transition hover:grayscale-0 hover:opacity-100 duration-500 lg:mx-6 sm:mx-8">
                    <img src="img/logo/logo-mpk.png" alt="google">
                </a>
            </div>
        </div>
    </div>
    {{-- <a
      href="#home"
      class="h-14 w-14 bg-primary flex justify-center items-center rounded-full fixed z-index[9999] bottom-4 right-4 p-4 hover:animate-pulse"
      id="to-top"
    >
      <span class="block w-5 h-5 mt-2 rotate-45 border-t-2 border-l-2"></span>
    </a> --}}
  </section>
@endsection