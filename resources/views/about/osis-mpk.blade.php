@extends('layouts.main')

@section('container')
    <style>
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
    </style>
    <section id="osis-page" class="pb-32 pt-36 bg-slate-700">
        <div class="px-4 md:px-12 lg:px-20 2xl:px-44">
            <div class="mx-auto mb-10 text-center">
                <h4 class="font-semibold text-base text-primary mb-2 tracking-[0.3rem]">{{ $subtitle }}</h4>
                <h2 class="mb-4 text-2xl font-bold text-white 2xl:mb-8 md:text-4xl">{{ $title }}</h2>
            </div>
            @if ($org->count())  
                <div class="block w-full mx-auto mb-32 rounded-lg bg-slate-600 lg:flex animate-fade-up">
                    <div class="flex flex-col items-center justify-center w-full mx-auto lg:w-1/3">
                        <img src="{{ asset('storage/' . $org->gambar_angkatan) }}" class="max-w-[120px] my-10 lg:w-[150px] lg:mb-10">
                        <h2 class="font-semibold text-2xl 2xl:text-3xl @if($organisasi == 'MPK') text-blue-400 @else text-yellow-500 @endif mb-4 tracking-widest">{{ $org->nama_angkatan }}</h2>
                    </div>
                    <div class="w-full p-6 mx-auto lg:mt-10 lg:p-0 lg:pr-10">
                        <div class="mb-10">
                            <h2 class="mb-2 text-xl font-bold tracking-widest text-white 2xl:text-2xl">Visi</h2>
                            <article class="text-base text-justify font-small text-slate-300 2xl:text-xl">{!! $org->visi_angkatan !!}</article>
                        </div>
                        <h2 class="mb-2 text-xl font-bold tracking-widest text-white 2xl:text-2xl">Misi</h2>
                        <article class="text-base leading-relaxed text-justify font-small lg:font-medium 2xl:text-xl text-slate-300">{!! $org->misi_angkatan !!}</article>
                    </div>
                </div>
            @else
                <div class="container">
                    <p class="text-2xl font-semibold text-center text-white">Data Organisasi Masih Kosong.</p>
                </div>
            @endif

            <div class="mx-auto mb-16 text-center">
                <h4 class="font-semibold text-lg text-primary mb-2 tracking-[0.3rem]">{{ $org->nama_angkatan }}</h4>
                <h2 class="mb-4 text-2xl font-bold text-white md:text-4xl">Struktur Organisasi</h2>
            </div>

            {{-- Pengurus OSIS --}}
            {{-- Trikora --}}
            @if($divisi->count())
                <div class="w-full hiddens">
                    <div class="relative w-3/4 mx-auto mb-16 overflow-hidden border-8 shadow-lg card md:w-1/2 lg:w-[30%] rounded-3xl border-dark shadow-dark">
                        <img src="{{ asset('storage/' . $divisi[0]->gambar_divisi) }}" class="rounded-2xl">
                        <div class="absolute flex flex-col items-center justify-center text-center bg-opacity-70 bg-dark card-body">
                            <p class="mb-3 text-2xl font-semibold tracking-normal text-yellow-500 2xl:text-4xl">{{ $divisi[0]->nama_divisi }}</p>
                            <p class="mb-5 text-base font-medium tracking-normal text-white 2xl:text-xl">"{{ $divisi[0]->bidang }}"</p>
                            <a href="../{{ $org->nama_organisasi }}/{{ $divisi[0]->slug }}" class="px-6 py-2 text-xs font-medium text-white transition duration-300 ease-in-out rounded-full 2xl:text-base bg-sky-700 hover:shadow-lg hover:bg-primary">Lihat Pengurus</a>
                        </div>                        
                    </div>
                </div>

                {{-- Sekretaris & Bendahara --}}
                <div class="items-center block w-full mb-16 hiddens lg:flex justify-evenly">
                    @for ($i = 2; $i <= min(3, $divisi->count()); $i++)
                        <div class="relative w-3/4 mx-auto mb-16 overflow-hidden border-8 shadow-lg card md:w-1/2 lg:w-[30%] rounded-3xl border-dark shadow-dark">
                            <img src="{{ asset('storage/' . $divisi[$i]->gambar_divisi) }}" class="rounded-2xl">
                            <div class="absolute flex flex-col items-center justify-center text-center bg-opacity-70 bg-dark card-body">
                            <p class="mb-3 text-2xl font-semibold tracking-normal text-yellow-500 2xl:text-4xl">{{ $divisi[$i - 1]->nama_divisi }}</p>
                            <p class="mb-5 text-base font-medium tracking-normal text-white 2xl:text-xl">"{{ $divisi[$i - 1]->bidang }}"</p>
                            <a href="../{{ $org->nama_organisasi }}/{{ $divisi[0]->slug }}" class="px-6 py-2 text-xs font-medium text-white transition duration-300 ease-in-out rounded-full 2xl:text-base bg-sky-700 hover:shadow-lg hover:bg-primary">Lihat Pengurus</a>
                        </div>                           
                        </div>
                    @endfor
                </div>

                <div class="flex flex-wrap items-center w-full mx-auto mb-5 justify-evenly lg:mb-16">
                    @foreach ($divisi as $div)
                        @if ($loop->iteration > 3)
                        <div class="relative w-3/4 mx-5 mb-16 overflow-hidden border-8 shadow-lg hiddens card md:w-1/2 lg:w-[30%] rounded-3xl border-dark shadow-dark">
                            <img src="{{ asset('storage/' . $div->gambar_divisi) }}" class="rounded-2xl">
                            <div class="absolute flex flex-col items-center justify-center text-center bg-opacity-70 bg-dark card-body">
                            <p class="mb-3 text-2xl font-semibold tracking-normal text-yellow-500 2xl:text-4xl">{{ $div->nama_divisi }}</p>
                            <p class="mb-5 text-base font-medium tracking-normal text-white 2xl:text-xl">"{{ $div->nama_divisi }}"</p>
                            <a href="../{{ $org->nama_organisasi }}/{{ $divisi[0]->slug }}" class="px-6 py-2 text-xs font-medium text-white transition duration-300 ease-in-out rounded-full 2xl:text-base bg-sky-700 hover:shadow-lg hover:bg-primary">Lihat Pengurus</a>
                        </div>                           
                        </div>
                        @endif
                    @endforeach
                </div>
            @else
                <div class="container">
                    <p class="text-2xl font-semibold text-center text-white">Data Pengurus Masih Kosong.</p>
                </div>
            @endif
        </div>
    </section>
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
    </script>
@endsection