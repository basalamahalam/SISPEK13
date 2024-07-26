@extends('admin.partials.main')

@section('container')
<section class="ml-0 lg:ml-[250px] p-8">
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
            setTimeout(() => {
                var successMessage = document.getElementById("success-message");
                if(successMessage){
                    successMessage.style.display = 'none';
                }
            }, 3000);
        </script>
    @endif
    <h2 class="mb-10 text-4xl font-bold text-dark">{{ $title }}</h2>
    <h2 class="mb-5 text-2xl font-bold text-sky-800">Organisasi</h2>
    <div class="flex flex-col mb-10 overflow-x-auto bg-white rounded-lg shadow-lg">
        <div class="inline-block min-w-full overflow-hidden">
            @if($data->count())
            <table class="min-w-full mb-0">
                <thead class="text-left border-b rounded-t-lg">
                <tr>
                    <th scope="col" class="px-4 py-2 text-sm font-medium rounded-tl-lg">No</th>
                    <th scope="col" class="px-4 py-2 text-sm font-medium">Gambar</th>
                    <th scope="col" class="px-4 py-2 text-sm font-medium">Nama</th>
                    <th scope="col" class="px-4 py-2 text-sm font-medium">Visi</th>
                    <th scope="col" class="px-4 py-2 text-sm font-medium">Misi</th>
                    <th scope="col" class="px-4 py-2 text-sm font-medium rounded-tr-lg"></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data as $org)     
                    <tr class="bg-gray-100 border-b">
                        <th class="px-4 py-2 text-sm font-medium text-left whitespace-nowrap" scope="row">1</th>
                        <td class="px-4 py-2 whitespace-nowrap"><img src="{{ asset('storage/' . $org->gambar_angkatan) }}" alt="{{ $org->gambar_angkatan }}" class="max-w-[120px]"></td>
                        <td class="px-4 py-2 text-sm font-normal text-left text-gray-500 whitespace-nowrap">{{ $org->nama_angkatan }}</td>
                        <td class="px-4 py-2 text-sm font-normal text-left text-gray-500 whitespace-nowrap">{!! Str::limit($org->visi_angkatan, $limit = 40, $end = '...') !!}</td>
                        <td class="px-4 py-2 text-sm font-normal text-left text-gray-500 whitespace-nowrap">{!! Str::limit($org->misi_angkatan, $limit = 20, $end = '...') !!}</td>
                        <td class="px-4 py-2 text-sm font-normal text-right whitespace-nowrap">
                            <a href="/profil-{{ $name }}/{{ $org->id }}/edit" class="font-medium text-blue-600 transition duration-300 ease-in-out hover:text-blue-700 focus:text-blue-700 active:text-blue-800">Edit</a>
                            <form action="/profil-{{ $name }}/{{ $org->id }}" method="post" class="inline-block">
                                @method('delete')
                                @csrf
                                <button type="submit" class="ml-2 font-medium text-red-600 transition duration-300 ease-in-out hover:text-red-700 focus:text-red-700 active:text-red-800" onclick="return confirm('Are you sure?')">Delete
                                </button>
                            </form> 
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @else
            <div class="py-5 text-center">
                <a href="/profil-{{ $name }}/create" class="px-6 py-3 text-sm font-semibold text-white transition duration-300 ease-in-out rounded-md bg-primary hover:shadow-lg hover:opacity-50">+ Tambah Organisasi</a>
                <p class="py-3 mt-5 text-gray-500">Organisasi masih kosong</p>
            </div>
            @endif
        </div>
      </div>
      <h2 class="text-2xl font-bold text-sky-800 mb-7">Divisi</h2>
      <a href="/profil-{{ $name }}/create-divisi" class="px-6 py-3 text-sm font-semibold text-white transition duration-300 ease-in-out rounded-md bg-primary hover:shadow-lg hover:opacity-50">+ Tambah Divisi</a>
      <div class="flex flex-col mt-10 overflow-x-auto bg-white rounded-lg shadow-lg">
        <div class="inline-block min-w-full overflow-hidden">
            @if ($div->count())   
                <table class="min-w-full mb-0">
                    <thead class="text-left border-b rounded-t-lg">
                    <tr>
                        <th scope="col" class="px-4 py-2 text-sm font-medium rounded-tl-lg">No</th>
                        <th scope="col" class="px-4 py-2 text-sm font-medium">Gambar</th>
                        <th scope="col" class="px-4 py-2 text-sm font-medium">Divisi</th>
                        <th scope="col" class="px-4 py-2 text-sm font-medium">Koor Divisi</th>
                        <th scope="col" class="px-4 py-2 text-sm font-medium">Jumlah Anggota</th>
                        <th scope="col" class="px-4 py-2 text-sm font-medium rounded-tr-lg"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <p class="hidden">{{ $number = 1 }}</p>
                    @foreach ($div as $divisi)      
                        <tr class="bg-gray-100 border-b">
                            <th class="px-4 py-2 text-sm font-medium text-left whitespace-nowrap" scope="row">{{ $number }}</th>
                            <td class="px-4 py-2 whitespace-nowrap"><img src="{{ asset('storage/' . $divisi->gambar_divisi) }}" alt="{{ $divisi->gambar_divisi }}" class="max-w-[200px]"></td>
                            <td class="px-4 py-2 text-sm font-normal text-left text-gray-500 whitespace-nowrap">{{ $divisi->nama_divisi }}</td>
                            @if($divisi->anggota->isNotEmpty())
                                <td class="px-4 py-2 text-sm font-normal text-left text-gray-500 whitespace-nowrap">{{ $divisi->anggota->first()->nama_anggota }}</td>
                                <td class="px-4 py-2 text-sm font-normal text-left text-gray-500 whitespace-nowrap">{{ $divisi->anggota->count() }}</td>
                            @else
                                <td class="px-4 py-2 text-sm font-normal text-left text-gray-500 whitespace-nowrap">-</td>
                                <td class="px-4 py-2 text-sm font-normal text-left text-gray-500 whitespace-nowrap">-</td>
                            @endif

                            @if($divisi->organization_id === 1)
                                <td class="px-4 py-2 text-sm font-normal text-center whitespace-nowrap">
                                    <a href="/event/{{ $divisi->slug }}" class="@if($divisi->slug == 'trikora' || $divisi->slug == 'sekretaris-osis' || $divisi->slug == 'bendahara-osis') hidden @endif block mb-2 font-medium text-green-600 hover:text-green-700 focus:text-green-700 active:text-green-800 transition duration-300 ease-in-out">Event</a>
                                    <a href="/anggota-{{ $name }}/{{ $divisi->slug }}" class="block mb-2 font-medium text-yellow-600 transition duration-300 ease-in-out hover:text-yellow-700 focus:text-yellow-700 active:text-yellow-800">Member</a>
                                    <a href="/profil-{{ $name }}/edit-divisi/{{ $divisi->slug }}" class="block mb-2 font-medium text-blue-600 transition duration-300 ease-in-out hover:text-blue-700 focus:text-blue-700 active:text-blue-800">Edit</a>
                                    <form action="/profil-{{ $name }}/destroy-divisi/{{ $divisi->slug }}" method="post" class="inline-block">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="ml-2 font-medium text-red-600 transition duration-300 ease-in-out hover:text-red-700 focus:text-red-700 active:text-red-800" onclick="return confirm('Are you sure?')">Delete
                                        </button>
                                    </form>     
                                </td>
                            @else
                            <td class="px-4 py-2 text-sm font-normal text-center whitespace-nowrap">
                                <a href="/anggota-{{ $name }}/{{ $divisi->slug }}" class="block mb-2 font-medium text-yellow-600 transition duration-300 ease-in-out hover:text-yellow-700 focus:text-yellow-700 active:text-yellow-800">Member</a>
                                <a href="/profil-{{ $name }}/edit-divisi/{{ $divisi->slug }}" class="block mb-2 font-medium text-blue-600 transition duration-300 ease-in-out hover:text-blue-700 focus:text-blue-700 active:text-blue-800">Edit</a>
                                <form action="/profil-{{ $name }}/destroy-divisi/{{ $divisi->slug }}" method="post" class="inline-block">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="ml-2 font-medium text-red-600 transition duration-300 ease-in-out hover:text-red-700 focus:text-red-700 active:text-red-800" onclick="return confirm('Are you sure?')">Delete
                                    </button>
                                </form>     
                            </td>
                            @endif
                        </tr>
                        <p class="hidden">{{ $number++ }}</p>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="py-5 text-center">
                    <p class="py-3 mt-5 text-gray-500">Divisi masih kosong</p>
                </div>
            @endif
        </div>
      </div>
</section>