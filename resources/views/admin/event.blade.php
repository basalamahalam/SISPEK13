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
    <a href="/profil-osis" class="flex items-center mb-10 text-lg font-semibold transition-all duration-300 ease-in-out text-primary hover:text-sky-800">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mr-3 bi bi-arrow-left-short" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
        </svg>
        Kembali
    </a>
    <h2 class="mb-5 text-4xl font-bold text-dark">{{ $title }}</h2>
    <h2 class="mb-10 text-2xl font-bold text-sky-800">{{ $subtitle }}</h2>
    <a href="/event/{{ $slug }}/create" class="px-6 py-3 text-sm font-semibold text-white transition duration-300 ease-in-out rounded-md bg-primary hover:shadow-lg hover:opacity-50">+ Tambah Acara</a>
    <div class="flex flex-col mt-10 mb-10 overflow-x-auto bg-white rounded-lg shadow-lg">
        <div class="inline-block min-w-full overflow-hidden">
            @if($data->count())
            <table class="min-w-full mb-0">
                <thead class="text-left border-b rounded-t-lg">
                <tr>
                    <th scope="col" class="px-4 py-2 text-sm font-medium rounded-tl-lg">No</th>
                    <th scope="col" class="px-4 py-2 text-sm font-medium">Nama Acara</th>
                    <th scope="col" class="px-4 py-2 text-sm font-medium">Deskripsi Acara</th>
                    <th scope="col" class="px-4 py-2 text-sm font-medium">Tanggal Acara</th>
                    <th scope="col" class="px-4 py-2 text-sm font-medium rounded-tr-lg"></th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($data as $event)     
                    <tr class="bg-gray-100 border-b">
                        <th class="px-4 py-2 text-sm font-medium text-left whitespace-nowrap" scope="row">{{ $number }}</th>
                        <td class="px-4 py-2 text-sm font-normal text-left text-gray-500 whitespace-nowrap">{{ $event->nama_acara }}</td>
                        <td class="px-4 py-2 text-sm font-normal text-left text-gray-500 whitespace-nowrap">{!! Str::limit($event->deskripsi_acara, $limit = 40, $end = '...') !!}</td>
                        <td class="px-4 py-2 text-sm font-normal text-left text-gray-500 whitespace-nowrap">{{ $event->tanggal_acara }}</td>
                        <td class="px-4 py-2 text-sm font-normal text-right whitespace-nowrap">
                            <a href="/event/{{ $slug }}/{{ $event->id }}/edit" class="font-medium text-blue-600 transition duration-300 ease-in-out hover:text-blue-700 focus:text-blue-700 active:text-blue-800">Edit</a>
                            <form action="/event/{{ $slug }}/{{ $event->id }}" method="post" class="inline-block">
                                @method('delete')
                                @csrf
                                <button type="submit" class="ml-2 font-medium text-red-600 transition duration-300 ease-in-out hover:text-red-700 focus:text-red-700 active:text-red-800" onclick="return confirm('Are you sure?')">Delete
                                </button>
                            </form> 
                        </td>
                    </tr>
                    <p class="hidden">{{ $number++ }}</p>
                @endforeach
                </tbody>
            </table>
            @else
            <div class="py-5 text-center">
                <p class="py-3 mt-5 text-gray-500">Event masih kosong</p>
            </div>
            @endif
        </div>
    </div>
</section>