@extends('layouts.main')

@section('container')
  <section id="home" class="pt-36 pb-32 bg-dark">
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
    <div class="container">
        <div class="flex flex-wrap-reverse justify-center lg:justify-between lg:items-center">
            <div class="w-full mt-10 px-4 text-center lg:w-1/2 lg:mt-0 lg:text-left">
                <h1 class="text-base font-semibold text-primary md:text-xl">Selamat Datang di Website
                    <span class="block font-bold text-white text-4xl mt-1 lg:text-5xl">SISPEK13!</span></h1>
                <h2 class="font-medium text-slate-500 text-lg my-3 lg:text-2xl">OSIS - MPK & EKSTRAKURIKULER
                    <span class="font-bold text-white">13</span></h2>
                <p class="font-medium text-slate-400 mb-10 leading-relaxed">Halaman Website Resmi <span class="font-bold text-white">SISPEK SMKN 13 Bandung. </span><span class="text-pink-500">❤</span></p>
            
                <a href="/web" class="text-sm font-semibold text-white bg-primary py-3 px-8 rounded-full hover:shadow-lg hover:opacity-50 transition duration-300 ease-in-out">Selengkapnya</a>
            </div>
            <div class="hidden w-5/6 self-center overflow-hidden lg:w-[40%] lg:block lg:rounded-lg lg:shadow-2xl lg:shadow-slate-600">
                <div class="wrapper flex relative lg:right-0">
                    <img src="img/logo/osis-bg.jpg" alt="OSIS" class="max-w-full mx-auto object-cover"/>
                    <img src="img/logo/mpk-bg.jpg" alt="MPK" class="max-w-full mx-auto object-cover">
                    <img src="img/logo/bg.png" alt="MPK" class="max-w-full mx-auto object-cover"> 
                    <img src="img/logo/mpk.png" alt="MPK" class="max-w-full mx-auto object-cover"> 
                </div>
            </div>
        </div>
    </div>
  </section>
  <section id="organization" class="pt-36 pb-32 bg-slate-700">
    <div class="container">
        <div class="mx-auto text-center mb-10">
            <h4 class="font-semibold text-lg text-primary mb-2 tracking-[0.3rem]">TENTANG KAMI</h4>
            <h2 class="font-bold text-white text-2xl mb-4 sm:text-xl lg:text-4xl">Struktur Kepengurusan</h2>
        </div>
        <div class="w-3/4 mx-auto">
            <div class="relative overflow-hidden">
                <div class="slider flex w-[300%] transition-all duration-500">
                    <div class="flex items-center justify-center basis-full">
                        <div class="w-3/4 px-4 my-10">
                            <h4 class="font-medium text-md text-yellow-500 mb-2 lg:text-lg">OSIS 2023-2024</h4>
                            <h2 class="font-bold text-xl text-white mb-4 lg:text-2xl">Organisasi Siswa Intra Sekolah</h2>
                            <p class="font-medium text-base text-slate-300 mb-10 lg:text-md ">Badan organisasi yang dijalankan oleh siswa di sekolah. Ini bertujuan untuk mengoordinasikan kegiatan siswa, mempromosikan keterlibatan siswa, dan menjalankan inisiatif untuk memperbaiki lingkungan sekolah.</p>
                            <a href="/osis" class="text-sm font-semibold text-white bg-primary py-3 px-8 rounded-full hover:shadow-lg hover:opacity-50 transition duration-300 ease-in-out">Selengkapnya</a>
                        </div>
                        <div class="max-w-[150px] px-4">
                            <img src="img/logo/logo.png" alt="logo OSIS">
                        </div>
                    </div>
                    <div class="flex items-center justify-center basis-full">
                        <div class="w-2/3 px-4 my-10">
                            <h4 class="font-medium text-md text-blue-400 mb-2 lg:text-lg">MPK 2023-2024</h4>
                            <h2 class="font-bold text-xl text-white mb-4 lg:text-2xl">Majelis Perwakilan Kelas</h2>
                            <p class="font-medium text-base text-slate-300 mb-10 lg:text-md ">Badan organisasi yang berada didalam sekolah dengan tugas sebagai evaluator, aspirator dan legislator.</p>
                            <a href="/mpk" class="text-sm font-semibold text-white bg-primary py-3 px-8 rounded-full hover:shadow-lg hover:opacity-50 transition duration-300 ease-in-out">Selengkapnya</a>
                        </div>
                        <div class="max-w-[150px] px-4">
                            <img src="img/logo/logo-mpk.png" alt="logo OSIS">
                        </div>
                    </div>
                    <div class="flex items-center justify-center basis-full">
                        <div class="w-2/3 px-4 my-10">
                            <h4 class="font-medium text-md text-yellow-500 mb-2 lg:text-lg">EKSKUL</h4>
                            <h2 class="font-bold text-xl text-white mb-4 lg:text-2xl">Ekstrakurikuler SMKN 13 Bandung</h2>
                            <p class="font-medium text-base text-slate-300 mb-10 lg:text-md ">Kegiatan non-akademik yang bertujuan untuk mengembangkan minat dan bakat siswa SMKN 13 Bandung diluar keahlian mereka.</p>
                            <a href="/ekskul" class="text-sm font-semibold text-white bg-primary py-3 px-8 rounded-full hover:shadow-lg hover:opacity-50 transition duration-300 ease-in-out">Selengkapnya</a>
                        </div>
                        <div class="max-w-[150px] px-4">
                            <img src="img/logo/logo-best.png" alt="logo OSIS">
                        </div>
                    </div>
                </div>
                <div class="control">
                    <button class="prev-button absolute top-1/2 left-0"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#94a3b8" class="bi bi-chevron-compact-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M9.224 1.553a.5.5 0 0 1 .223.67L6.56 8l2.888 5.776a.5.5 0 1 1-.894.448l-3-6a.5.5 0 0 1 0-.448l3-6a.5.5 0 0 1 .67-.223z"/>
                      </svg></button>
                    <button class="next-button absolute top-1/2 right-0"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#94a3b8" class="bi bi-chevron-compact-right" viewBox="0 0 16 16">
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
  <section id="menfess" class="pt-36 pb-32 bg-slate-600">
    <div class="container flex justify-center items-center">
        <div class="w-2/3 px-4 mr-20">
            <object data="img/assets/menfess.svg" type="image/svg+xml" id="animated-svg"></object>                 
        </div>
        <div class="w-full px-4">
            <div class="max-w-full text-start">
                <h4 class="font-semibold text-lg text-primary mb-2 tracking-[0.3rem]">SECRET MESSAGES</h4>
                <h2 class="font-bold text-white text-3xl mb-4 sm:text-4xl lg:text-5xl tracking-widest">MENFESS.</h2>
                <p class="font-medium text-md text-slate-400 md:text-lg mb-10">Mengirim Pesan Anonim untuk kalian yang pemalu xixixi, Ayo Kirim Menfess Sekarang!!!</p>
                <a href="/menfess" class="text-sm font-semibold text-white bg-primary py-3 px-8 rounded-full hover:shadow-lg hover:opacity-50 transition duration-300 ease-in-out">Baca atau Kirim Menfess</a>
            </div>
        </div>
    </div>
  </section>
  <section id="jurnalosis" class="pt-36 pb-32 bg-slate-300">
    <div class="container">
        <div class="w-full px-4">
            <div class="max-w-xl mx-auto text-center mb-16">
                <h4 class="font-semibold text-lg text-primary mb-2 tracking-[0.3rem]">ARTIKEL LITERASI</h4>
                <h2 class="font-bold text-dark text-3xl mb-4 sm:text-4xl lg:text-5xl">Jurnal OSIS</h2>
                <p class="font-medium text-md text-slate-500 md:text-lg">Baca Yuk! Artikel Edukatif dari Siswa-Siswi SMKN 13 Bandung.</p>
            </div>
        </div>
        <div class="flex flex-wrap mb-5 ">
            <div class="w-full px-4 lg:w-1/2 xl:w-1/3">
                <div class="bg-slate-700 rounded-xl shadow-lg overflow-hidden mb-10">
                    <img src="https://source.unsplash.com/360x200?programming" alt="programming" class="w-full">
                    <div class="py-8 px-6">
                        <h3><a href="" class="block mb-3 font-semibold text-xl text-white hover:text-primary truncate">Tips Belajar Programming</a></h3>
                        <p class="font-medium text-base text-slate-500 mb-6">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quibusdam, at.</p>
                        <a href="" class="font-medium text-sm text-white bg-primary py-2 px-4 rounded-lg hover:opacity-80">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="w-full px-4 lg:w-1/2 xl:w-1/3">
                <div class="bg-slate-700 rounded-xl shadow-lg overflow-hidden mb-10">
                    <img src="https://source.unsplash.com/360x200?personal" alt="personal" class="w-full">
                    <div class="py-8 px-6">
                        <h3><a href="" class="block mb-3 font-semibold text-xl text-white hover:text-primary truncate">Tips Belajar Memahami diri</a></h3>
                        <p class="font-medium text-base text-slate-500 mb-6">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quibusdam, at.</p>
                        <a href="" class="font-medium text-sm text-white bg-primary py-2 px-4 rounded-lg hover:opacity-80">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="w-full px-4 lg:w-1/2 xl:w-1/3">
                <div class="bg-slate-700 rounded-xl shadow-lg overflow-hidden mb-10">
                    <img src="https://source.unsplash.com/360x200?coffee" alt="ngopi" class="w-full">
                    <div class="py-8 px-6">
                        <h3><a href="" class="block mb-3 font-semibold text-xl text-white hover:text-primary truncate">Pencinta Kopi</a></h3>
                        <p class="font-medium text-base text-slate-500 mb-6">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quibusdam, at.</p>
                        <a href="" class="font-medium text-sm text-white bg-primary py-2 px-4 rounded-lg hover:opacity-80">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-center">
        <a href="/jurnal" class="text-sm font-semibold text-white bg-primary py-3 px-8 rounded-full animate-bounce hover:shadow-lg hover:opacity-50 transition duration-300 ease-in-out">Baca Jurnal OSIS Lainnya...</a>
        </div>
    </div>
  </section>
  <section id="berita" class="pt-36 pb-32 bg-slate-700">
    <div class="container">
        <div class="w-full px-4">
            <div class="max-w-xl mx-auto text-center mb-16">
                <h4 class="font-semibold text-lg text-primary mb-2 tracking-[0.3rem]">BERITA SISPEK13</h4>
                <h2 class="font-bold text-white text-3xl mb-4 sm:text-4xl lg:text-5xl">Portal Berita</h2>
                <p class="font-medium text-md text-slate-400 md:text-lg">Platform berita yang menyajikan informasi terkini seputar kegiatan di SMKN 13 Bandung.</p>
            </div>
        </div>
        <div class="w-full px-4 flex flex-wrap justify-center xl:w-10/12 xl:mx-auto">
            <div class="mb-12 p-4 md:w-1/2">
                <div class="rounded-md shadow-md">
                    <img src="img/portofolio/1.png" alt="Landing Page" width="w-full">
                </div>
                <h3 class="font-semibold text-xl text-white mt-5 mb-3">Landing Page Basalamah Alam</h3>
                <p class="font-medium text-base text-slate-400">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum praesentium dicta debitis! Delectus, assumenda qui?</p>
            </div>
            <div class="mb-12 p-4 md:w-1/2">
                <div class="rounded-md shadow-md">
                    <img src="img/portofolio/2.jpg" alt="e commerce" width="w-full">
                </div>
                <h3 class="font-semibold text-xl text-white mt-5 mb-3">Landing Page Basalamah Alam</h3>
                <p class="font-medium text-base text-slate-400">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum praesentium dicta debitis! Delectus, assumenda qui?</p>
            </div>
            <div class="mb-12 p-4 md:w-1/2">
                <div class="rounded-md shadow-md">
                    <img src="img/portofolio/3.jpg" alt="Documentation" width="w-full">
                </div>
                <h3 class="font-semibold text-xl text-white mt-5 mb-3">Landing Page Basalamah Alam</h3>
                <p class="font-medium text-base text-slate-400">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum praesentium dicta debitis! Delectus, assumenda qui?</p>
            </div>
            <div class="mb-12 p-4 md:w-1/2">
                <div class="rounded-md shadow-md">
                    <img src="img/portofolio/4.JPG" alt="Photos" width="w-full">
                </div>
                <h3 class="font-semibold text-xl text-white mt-5 mb-3">Landing Page Basalamah Alam</h3>
                <p class="font-medium text-base text-slate-400">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum praesentium dicta debitis! Delectus, assumenda qui?</p>
            </div>
        </div>
        <div class="flex justify-center mt-10">
            <a href="/berita" class="text-sm font-semibold text-white bg-primary py-3 px-8 rounded-full animate-bounce hover:shadow-lg hover:opacity-50 transition duration-300 ease-in-out">Baca Berita Lainnya...</a>
        </div>
    </div>
  </section>
  <section id="developer" class="pt-36 pb-32 bg-slate-600">
    <div class="container">
        <div class="w-full px-4">
            <div class="mx-auto text-center mb-16">
                <h4 class="font-semibold text-lg text-primary mb-2">Developer</h4>
                <h2 class="font-bold text-white text-3xl mb-4 sm:text-4xl lg:text-5xl">Pihak yang Terkait</h2>
                <p class="font-medium text-md text-slate-400 md:text-lg">Beberapa pihak yang terkait dalam pengembangan Website ini.</p>
            </div>
        </div>

        <div class="w-full px-4">
            <div class="flex flex-wrap items-center justify-center">
                <a href="" class="max-w-[120px] mx-4 py-4 grayscale opacity-60 transition hover:grayscale-0 hover:opacity-100 duration-500 lg:mx-6 sm:mx-8">
                    <img src="img/logo/logo13.png" alt="google">
                </a>
                <a href="" class="max-w-[100px] mx-4 py-4 grayscale opacity-60 transition hover:grayscale-0 hover:opacity-100 duration-500 lg:mx-6 sm:mx-8">
                    <img src="img/logo/logo-best.png" alt="google">
                </a>
                <a href="" class="max-w-[120px] mx-4 py-4 grayscale opacity-60 transition hover:grayscale-0 hover:opacity-100 duration-500 lg:mx-6 sm:mx-8">
                    <img src="img/logo/logo.png" alt="google">
                </a>
                <a href="" class="max-w-[120px] mx-4 py-4 grayscale opacity-60 transition hover:grayscale-0 hover:opacity-100 duration-500 lg:mx-6 sm:mx-8">
                    <img src="img/logo/logo-mpk.png" alt="google">
                </a>
            </div>
        </div>
    </div>
  </section>
@endsection