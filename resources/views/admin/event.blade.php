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
    <a href="/profil-osis" class="flex items-center font-semibold text-lg text-primary mb-10 hover:text-sky-800 transition-all duration-300 ease-in-out">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-short mr-3" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
        </svg>
        Kembali
    </a>
    <h2 class="text-dark font-bold text-4xl mb-5">{{ $title }}</h2>
    <h2 class="text-sky-800 font-bold text-2xl mb-10">{{ $subtitle }}</h2>
    <a href="/event/{{ $slug }}/create" class="text-sm font-semibold text-white bg-primary py-3 px-6 rounded-md hover:shadow-lg hover:opacity-50 transition duration-300 ease-in-out">+ Tambah Acara</a>
    <div class="mt-10 rounded-lg shadow-lg bg-white flex flex-col overflow-x-auto mb-10">
        <div class="inline-block min-w-full overflow-hidden">
            @if($data->count())
            <table class="min-w-full mb-0">
                <thead class="border-b rounded-t-lg text-left">
                <tr>
                    <th scope="col" class="rounded-tl-lg text-sm font-medium px-4 py-2">No</th>
                    <th scope="col" class="text-sm font-medium px-4 py-2">Nama Acara</th>
                    <th scope="col" class="text-sm font-medium px-4 py-2">Deskripsi Acara</th>
                    <th scope="col" class="text-sm font-medium px-4 py-2">Tanggal Acara</th>
                    <th scope="col" class="rounded-tr-lg text-sm font-medium px-4 py-2"></th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($data as $event)     
                    <tr class="border-b bg-gray-100">
                        <th class="text-sm font-medium px-4 py-2 whitespace-nowrap text-left" scope="row">{{ $number }}</th>
                        <td class="text-sm font-normal px-4 py-2 whitespace-nowrap text-left text-gray-500">{{ $event->nama_acara }}</td>
                        <td class="text-sm font-normal px-4 py-2 whitespace-nowrap text-left text-gray-500">{!! Str::limit($event->deskripsi_acara, $limit = 40, $end = '...') !!}</td>
                        <td class="text-sm font-normal px-4 py-2 whitespace-nowrap text-left text-gray-500">{{ $event->tanggal_acara }}</td>
                        <td class="text-sm font-normal px-4 py-2 whitespace-nowrap text-right">
                            <a href="/event/{{ $slug }}/{{ $event->id }}/edit" class="font-medium text-blue-600 hover:text-blue-700 focus:text-blue-700 active:text-blue-800 transition duration-300 ease-in-out">Edit</a>
                            <form action="/event/{{ $slug }}/{{ $event->id }}" method="post" class="inline-block">
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
            <div class="text-center py-5">
                <p class="text-gray-500 mt-5 py-3">Event masih kosong</p>
            </div>
            @endif
        </div>
    </div>
</section>