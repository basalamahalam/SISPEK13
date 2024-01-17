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
    <h2 class="text-dark font-bold text-3xl mb-3">{{ $subtitle }}</h2>
    <h2 class="text-dark font-small text-lg mb-10">{{ $title }}</h2>
    <a href="/berita-admin/create" class="text-sm font-semibold text-white bg-primary py-3 px-6 rounded-md hover:shadow-lg hover:opacity-50 transition duration-300 ease-in-out">+ Tambah Berita</a>
    <div class="rounded-lg shadow-lg bg-white flex flex-col overflow-x-auto mt-10 mb-10">
        <div class="inline-block min-w-full overflow-hidden">
            @if($data->count())
            <table class="min-w-full mb-0">
                <thead class="border-b rounded-t-lg text-left">
                <tr>
                    <th scope="col" class="rounded-tl-lg text-sm font-medium px-4 py-2">No</th>
                    <th scope="col" class="text-sm font-medium px-4 py-2">Gambar</th>
                    <th scope="col" class="text-sm font-medium px-4 py-2">Judul</th>
                    <th scope="col" class="text-sm font-medium px-4 py-2">Deskripsi</th>
                    <th scope="col" class="text-sm font-medium px-4 py-2">Tanggal</th>
                    <th scope="col" class="rounded-tr-lg text-sm font-medium px-4 py-2"></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($data as $berita)
                        <tr class="border-b bg-gray-100">
                            <th class="text-sm font-medium px-4 py-2 whitespace-nowrap text-left" scope="row">{{ $number }}</th>
                            <td class="px-4 py-2 whitespace-nowrap"><img src="{{ asset('storage/' . $berita->image) }}" alt="{{ $berita->image }}"></td>
                            <td class="text-sm font-normal px-4 py-2 whitespace-nowrap text-left text-gray-500">{{ Str::limit($berita->title, $limit = 15, $end = '...') }}</td>
                            <td class="px-4 py-2 whitespace-nowrap text-sm fomt-normal text-gray-500">{!! Str::limit($berita->body, $limit = 50, $end = '...') !!}</td>
                            <td class="text-sm font-normal px-4 py-2 whitespace-nowrap text-left text-gray-500">{{  Str::limit($berita->created_at, $limit = 10, $end = '...') }}</td>
                            <td class="text-sm font-normal px-4 py-2 whitespace-nowrap text-right">
                                <a href="/berita-admin/{{ $berita->slug }}/edit" class="font-medium text-blue-600 hover:text-blue-700 focus:text-blue-700 active:text-blue-800 transition duration-300 ease-in-out">Edit</a>
                                <form action="/berita-admin/{{ $berita->slug }}" method="post" class="inline-block">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="ml-2 font-medium text-red-600 hover:text-red-700 focus:text-red-700 active:text-red-800 transition duration-300 ease-in-out" onclick="return confirm('Are you sure?')">Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <p class="hidden">{{ $number++ }}</p>
                    @endforeach
                </tbody>
            </table>
            @else
            <p class="text-gray-500 text-center py-3">Berita masih kosong</p>
            @endif
        </div>
    </div>
</section>