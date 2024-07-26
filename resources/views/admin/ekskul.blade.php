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
    <h2 class="mb-3 text-3xl font-bold text-dark">{{ $title }}</h2>
    <h2 class="mb-10 text-lg text-dark font-small">{{ $subtitle }}</h2>
    <a href="/ekskul-admin/create" class="px-6 py-3 text-sm font-semibold text-white transition duration-300 ease-in-out rounded-md bg-primary hover:shadow-lg hover:opacity-50">+ Tambah Ekskul</a>
    <div class="flex flex-col mt-10 mb-10 overflow-x-auto bg-white rounded-lg shadow-lg">
        <div class="inline-block min-w-full overflow-hidden">
            @if($data->count())
            <table class="min-w-full mb-0">
                <thead class="text-left border-b rounded-t-lg">
                <tr>
                    <th scope="col" class="px-4 py-2 text-sm font-medium rounded-tl-lg">No</th>
                    <th scope="col" class="px-4 py-2 text-sm font-medium">Foto</th>
                    <th scope="col" class="px-4 py-2 text-sm font-medium">Nama</th>
                    <th scope="col" class="px-4 py-2 text-sm font-medium">Deskripsi</th>
                    <th scope="col" class="px-4 py-2 text-sm font-medium">Instagram</th>
                    <th scope="col" class="px-4 py-2 text-sm font-medium rounded-tr-lg"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $ekskul)
                <tr class="bg-gray-100 border-b">
                    <th class="px-4 py-2 text-sm font-medium text-left whitespace-nowrap" scope="row">{{ $number }}</th>
                    <td class="px-4 py-2 whitespace-nowrap"><img src="{{ asset('storage/' . $ekskul->image) }}" alt="{{ $ekskul->image }}" class="max-w-[200px]"></td>
                    <td class="px-4 py-2 text-sm text-gray-500 whitespace-nowrap fomt-normal">{{ $ekskul->name }}</td>
                    <td class="px-4 py-2 text-sm font-normal text-left text-gray-500 whitespace-nowrap">{!! Str::limit($ekskul->body, $limit = 20, $end = '...') !!}</td>
                    <td class="px-4 py-2 text-sm font-normal text-left text-gray-500 whitespace-nowrap">{{  Str::limit($ekskul->link, $limit = 20, $end = '...') }}</td>
                    <td class="px-4 py-2 text-sm font-normal text-right whitespace-nowrap">
                        <a href="/ekskul-admin/{{ $ekskul->slug }}/edit" class="font-medium text-blue-600 transition duration-300 ease-in-out hover:text-blue-700 focus:text-blue-700 active:text-blue-800">Edit</a>
                        <form action="/ekskul-admin/{{ $ekskul->slug }}" method="post" class="inline-block">
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
                <p class="py-3 text-center text-gray-500">Ekskul masih kosong</p>
            @endif
        </div>
        {{ $data->links() }}
    </div>
</section>