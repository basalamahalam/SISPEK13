@extends('admin.partials.main')

@section('container')
<section class="ml-0 lg:ml-[250px] p-8">
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
    <h2 class="text-dark font-bold text-4xl mb-10">{{ $title }}</h2>
    <h2 class="text-sky-800 font-bold text-2xl mb-5">Organisasi</h2>
    <div class="rounded-lg shadow-lg bg-white flex flex-col overflow-x-auto mb-10">
        <div class="inline-block min-w-full overflow-hidden">
            @if($data->count())
            <table class="min-w-full mb-0">
                <thead class="border-b rounded-t-lg text-left">
                <tr>
                    <th scope="col" class="rounded-tl-lg text-sm font-medium px-4 py-2">No</th>
                    <th scope="col" class="text-sm font-medium px-4 py-2">Gambar</th>
                    <th scope="col" class="text-sm font-medium px-4 py-2">Nama</th>
                    <th scope="col" class="text-sm font-medium px-4 py-2">Visi</th>
                    <th scope="col" class="text-sm font-medium px-4 py-2">Misi</th>
                    <th scope="col" class="rounded-tr-lg text-sm font-medium px-4 py-2"></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data as $org)     
                    <tr class="border-b bg-gray-100">
                        <th class="text-sm font-medium px-4 py-2 whitespace-nowrap text-left" scope="row">1</th>
                        <td class="px-4 py-2 whitespace-nowrap"><img src="{{ asset('storage/' . $org->gambar_angkatan) }}" alt="{{ $org->gambar_angkatan }}" class="max-w-[120px]"></td>
                        <td class="text-sm font-normal px-4 py-2 whitespace-nowrap text-left text-gray-500">{{ $org->nama_angkatan }}</td>
                        <td class="text-sm font-normal px-4 py-2 whitespace-nowrap text-left text-gray-500">{!! Str::limit($org->visi_angkatan, $limit = 40, $end = '...') !!}</td>
                        <td class="text-sm font-normal px-4 py-2 whitespace-nowrap text-left text-gray-500">{!! Str::limit($org->misi_angkatan, $limit = 20, $end = '...') !!}</td>
                        <td class="text-sm font-normal px-4 py-2 whitespace-nowrap text-right">
                            <a href="/profil-{{ $name }}/{{ $org->id }}/edit" class="font-medium text-blue-600 hover:text-blue-700 focus:text-blue-700 active:text-blue-800 transition duration-300 ease-in-out">Edit</a>
                            <form action="/profil-{{ $name }}/{{ $org->id }}" method="post" class="inline-block">
                                @method('delete')
                                @csrf
                                <button type="submit" class="ml-2 font-medium text-red-600 hover:text-red-700 focus:text-red-700 active:text-red-800 transition duration-300 ease-in-out" onclick="return confirm('Are you sure?')">Delete
                                </button>
                            </form> 
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @else
            <div class="text-center py-5">
                <a href="/profil-{{ $name }}/create" class="text-sm font-semibold text-white bg-primary py-3 px-6 rounded-md hover:shadow-lg hover:opacity-50 transition duration-300 ease-in-out">+ Tambah Organisasi</a>
                <p class="text-gray-500 mt-5 py-3">Organisasi masih kosong</p>
            </div>
            @endif
        </div>
      </div>
      <h2 class="text-sky-800 font-bold text-2xl mb-7">Divisi</h2>
      <a href="/profil-{{ $name }}/create-divisi" class="text-sm font-semibold text-white bg-primary py-3 px-6 rounded-md hover:shadow-lg hover:opacity-50 transition duration-300 ease-in-out">+ Tambah Divisi</a>
      <div class="mt-10 rounded-lg shadow-lg bg-white flex flex-col overflow-x-auto">
        <div class="inline-block min-w-full overflow-hidden">
            @if ($div->count())   
                <table class="min-w-full mb-0">
                    <thead class="border-b rounded-t-lg text-left">
                    <tr>
                        <th scope="col" class="rounded-tl-lg text-sm font-medium px-4 py-2">No</th>
                        <th scope="col" class="text-sm font-medium px-4 py-2">Gambar</th>
                        <th scope="col" class="text-sm font-medium px-4 py-2">Divisi</th>
                        <th scope="col" class="text-sm font-medium px-4 py-2">Koor Divisi</th>
                        <th scope="col" class="text-sm font-medium px-4 py-2">Jumlah Anggota</th>
                        <th scope="col" class="rounded-tr-lg text-sm font-medium px-4 py-2"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <p class="hidden">{{ $number = 1 }}</p>
                    @foreach ($div as $divisi)      
                        <tr class="border-b bg-gray-100">
                            <th class="text-sm font-medium px-4 py-2 whitespace-nowrap text-left" scope="row">{{ $number }}</th>
                            <td class="px-4 py-2 whitespace-nowrap"><img src="{{ asset('storage/' . $divisi->gambar_divisi) }}" alt="{{ $divisi->gambar_divisi }}" class="max-w-[200px]"></td>
                            <td class="text-sm font-normal px-4 py-2 whitespace-nowrap text-left text-gray-500">{{ $divisi->nama_divisi }}</td>
                            @if($divisi->anggota->isNotEmpty())
                                <td class="text-sm font-normal px-4 py-2 whitespace-nowrap text-left text-gray-500">{{ $divisi->anggota->first()->nama_anggota }}</td>
                                <td class="text-sm font-normal px-4 py-2 whitespace-nowrap text-left text-gray-500">{{ $divisi->anggota->count() }}</td>
                            @else
                                <td class="text-sm font-normal px-4 py-2 whitespace-nowrap text-left text-gray-500">-</td>
                                <td class="text-sm font-normal px-4 py-2 whitespace-nowrap text-left text-gray-500">-</td>
                            @endif

                            @if($divisi->organization_id === 1)
                                <td class="text-sm font-normal px-4 py-2 whitespace-nowrap text-center">
                                    <a href="/event/{{ $divisi->slug }}" class="@if($divisi->slug == 'trikora' || $divisi->slug == 'sekretaris-osis' || $divisi->slug == 'bendahara-osis') hidden @endif block mb-2 font-medium text-green-600 hover:text-green-700 focus:text-green-700 active:text-green-800 transition duration-300 ease-in-out">Event</a>
                                    <a href="/anggota-{{ $name }}/{{ $divisi->slug }}" class="block mb-2 font-medium text-yellow-600 hover:text-yellow-700 focus:text-yellow-700 active:text-yellow-800 transition duration-300 ease-in-out">Member</a>
                                    <a href="/profil-{{ $name }}/edit-divisi/{{ $divisi->slug }}" class="block mb-2 font-medium text-blue-600 hover:text-blue-700 focus:text-blue-700 active:text-blue-800 transition duration-300 ease-in-out">Edit</a>
                                    <form action="/profil-{{ $name }}/destroy-divisi/{{ $divisi->slug }}" method="post" class="inline-block">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="ml-2 font-medium text-red-600 hover:text-red-700 focus:text-red-700 active:text-red-800 transition duration-300 ease-in-out" onclick="return confirm('Are you sure?')">Delete
                                        </button>
                                    </form>     
                                </td>
                            @else
                            <td class="text-sm font-normal px-4 py-2 whitespace-nowrap text-center">
                                <a href="/anggota-{{ $name }}/{{ $divisi->slug }}" class="block mb-2 font-medium text-yellow-600 hover:text-yellow-700 focus:text-yellow-700 active:text-yellow-800 transition duration-300 ease-in-out">Member</a>
                                <a href="/profil-{{ $name }}/edit-divisi/{{ $divisi->slug }}" class="block mb-2 font-medium text-blue-600 hover:text-blue-700 focus:text-blue-700 active:text-blue-800 transition duration-300 ease-in-out">Edit</a>
                                <form action="/profil-{{ $name }}/destroy-divisi/{{ $divisi->slug }}" method="post" class="inline-block">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="ml-2 font-medium text-red-600 hover:text-red-700 focus:text-red-700 active:text-red-800 transition duration-300 ease-in-out" onclick="return confirm('Are you sure?')">Delete
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
                <div class="text-center py-5">
                    <p class="text-gray-500 mt-5 py-3">Divisi masih kosong</p>
                </div>
            @endif
        </div>
      </div>
</section>