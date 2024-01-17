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
    <section id="osis-page" class="pt-36 pb-32 bg-slate-700">
        <div class="container">
            <div class="mx-auto text-center mb-10">
                <h4 class="font-semibold text-lg text-primary mb-2 tracking-[0.3rem]">{{ $subtitle }}</h4>
                <h2 class="font-bold text-white text-3xl mb-4 lg:text-4xl">{{ $title }}</h2>
            </div>
            @if ($org->count())  
                <div class="w-full bg-slate-600 mx-auto rounded-lg block lg:flex mb-32 animate-fade-up">
                    <div class="mx-auto w-full lg:w-1/3 flex flex-col items-center justify-center">
                        <img src="{{ asset('storage/' . $org->gambar_angkatan) }}" class="max-w-[120px] my-10 lg:w-[150px] lg:mb-10">
                        <h2 class="font-semibold @if($organisasi == 'MPK') text-blue-400 @else text-yellow-500 @endif text-2xl mb-4 sm:text-sm lg:text-lg tracking-widest">{{ $org->nama_angkatan }}</h2>
                    </div>
                    <div class="w-full mx-auto p-6 lg:mt-10 lg:p-0 lg:pr-10">
                        <div class="mb-10">
                            <h2 class="font-bold text-white text-xl tracking-widest mb-2">Visi</h2>
                            <article class="font-small text-sm text-slate-300 lg:text-base text-justify">{!! $org->visi_angkatan !!}</article>
                        </div>
                        <h2 class="font-bold text-white text-xl tracking-widest mb-2">Misi</h2>
                        <article class="font-small lg:font-medium text-slate-300 text-base leading-relaxed text-justify">{!! $org->misi_angkatan !!}</article>
                    </div>
                </div>
            @else
                <div class="container">
                    <p class="font-semibold text-2xl text-white text-center">Data Organisasi Masih Kosong.</p>
                </div>
            @endif

            <div class="mx-auto text-center mb-16">
                <h4 class="font-semibold text-lg text-primary mb-2 tracking-[0.3rem]">{{ $org->nama_angkatan }}</h4>
                <h2 class="font-bold text-white text-2xl mb-4 sm:text-xl lg:text-4xl">Struktur Organisasi</h2>
            </div>

            {{-- Pengurus OSIS --}}
            {{-- Trikora --}}
            @if($divisi->count())
                <div class="hiddens w-full">
                    <div class="card w-3/4 lg:w-1/4 mx-auto mb-16 relative rounded-3xl border-8 border-dark shadow-lg shadow-dark overflow-hidden">
                        <img src="{{ asset('storage/' . $divisi[0]->gambar_divisi) }}" class="rounded-2xl">
                        <div class="card-body absolute bg-opacity-70 bg-dark text-center pt-16">
                            <p class="text-yellow-500 font-semibold text-2xl tracking-normal mb-3">{{ $divisi[0]->nama_divisi }}</p>
                            <p class="text-white font-medium text-base tracking-normal mb-5">"{{ $divisi[0]->bidang }}"</p>
                            <a href="../{{ $org->nama_organisasi }}/{{ $divisi[0]->slug }}" class="text-xs font-medium text-white bg-sky-700 py-2 px-6 rounded-full hover:shadow-lg hover:bg-primary transition duration-300 ease-in-out">Lihat Pengurus</a>
                        </div>
                    </div>
                </div>

                {{-- Sekretaris & Bendahara --}}
                <div class="hiddens w-full block lg:flex justify-evenly items-center mb-16">
                    @for ($i = 2; $i <= min(3, $divisi->count()); $i++)
                        <div class="card w-3/4 lg:w-1/4 mx-auto mb-16 relative rounded-3xl border-8 border-dark shadow-lg shadow-dark overflow-hidden">
                            <img src="{{ asset('storage/' . $divisi[$i]->gambar_divisi) }}" class="rounded-2xl">
                            <div class="card-body absolute bg-opacity-70 bg-dark text-center pt-16">
                                <p class="text-yellow-500 font-semibold text-2xl tracking-normal mb-3">{{ $divisi[$i - 1]->nama_divisi }}</p>
                                <p class="text-white font-medium text-base tracking-normal mb-5">"{{ $divisi[$i - 1]->bidang }}"</p>
                                <a href="../{{ $org->nama_organisasi }}/{{ $divisi[$i - 1]->slug }}" class="text-xs font-medium text-white bg-sky-700 py-2 px-6 rounded-full hover:shadow-lg hover:bg-primary transition duration-300 ease-in-out">Lihat Pengurus</a>
                            </div>
                        </div>
                    @endfor
                </div>

                <div class="w-full mx-auto flex flex-wrap justify-evenly items-center mb-5 lg:mb-16">
                    @foreach ($divisi as $div)
                        @if ($loop->iteration > 3)
                        <div class="hiddens card w-3/4 lg:w-1/4 mx-5 mb-16 relative rounded-3xl border-8 border-dark shadow-lg shadow-dark overflow-hidden">
                            <img src="{{ asset('storage/' . $div->gambar_divisi) }}" class="rounded-2xl">
                            <div class="card-body absolute bg-opacity-70 bg-dark text-center pt-16">
                                <p class="text-yellow-500 font-semibold text-2xl tracking-normal mb-3">{{ $div->nama_divisi }}</p>
                                <p class="text-white font-medium text-base tracking-normal mb-5">"{{ $div->bidang }}"</p>
                                <a href="../{{ $org->nama_organisasi }}/{{ $div->slug }}" class="text-xs font-medium text-white bg-sky-700 py-2 px-6 rounded-full hover:shadow-lg hover:bg-primary transition duration-300 ease-in-out">Lihat Pengurus</a>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
            @else
                <div class="container">
                    <p class="font-semibold text-2xl text-white text-center">Data Pengurus Masih Kosong.</p>
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