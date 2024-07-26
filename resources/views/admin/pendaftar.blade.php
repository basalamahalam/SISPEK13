@extends('admin.partials.main')

@section('container')
<section class="ml-0 lg:ml-[250px] p-8">
    @if(session()->has('success'))
        <div id="success-message" class="relative flex justify-between w-1/2 p-4 mx-auto text-green-700 bg-green-100 border-l-4 border-green-500" role="alert">
            {{ session('success') }}
            <button
                class="font-bold text-green-600  hover:text-green-400 text-medium"
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
    <div class="flex flex-col mt-10 mb-10 overflow-x-auto bg-white rounded-lg shadow-lg">
        <div class="inline-block min-w-full overflow-hidden">
            @if($data->count())
                <table class="min-w-full mb-0">
                    <thead class="text-left border-b rounded-t-lg">
                    <tr>
                        <th scope="col" class="px-4 py-2 text-sm font-medium rounded-tl-lg">No</th>
                        <th scope="col" class="px-4 py-2 text-sm font-medium">Foto</th>
                        <th scope="col" class="px-4 py-2 text-sm font-medium">Nama</th>
                        <th scope="col" class="px-4 py-2 text-sm font-medium">Kelas</th>
                        <th scope="col" class="px-4 py-2 text-sm font-medium">Gender</th>
                        <th scope="col" class="px-4 py-2 text-sm font-medium rounded-tr-lg"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $pendaftar)
                    <tr class="bg-gray-100 border-b">
                        <th class="px-4 py-2 text-sm font-medium text-left whitespace-nowrap" scope="row">{{ $number }}</th>
                        <td class="px-4 py-2 whitespace-nowrap"><img src="{{ asset('storage/' . $pendaftar->image) }}" alt="{{ $pendaftar->image }}" class="max-w-30 max-h-40"></td>
                        <td class="px-4 py-2 text-sm text-gray-500 whitespace-nowrap fomt-normal">{{ Str::limit($pendaftar->nama, $limit = 25, $end = '...') }}</td>
                        <td class="px-4 py-2 text-sm font-normal text-left text-gray-500 whitespace-nowrap">{{ $pendaftar->kelas }}</td>
                        <td class="px-4 py-2 text-sm font-normal text-left text-gray-500 whitespace-nowrap">{{ $pendaftar->gender }}</td>
                        <td class="px-4 py-2 text-sm font-normal text-center whitespace-nowrap">
                            <a href="/pendaftar-{{ $pendaftar->pendaftar }}/{{ $pendaftar->id }}" class="block mb-2 font-medium text-yellow-600 transition duration-300 ease-in-out hover:text-yellow-700 focus:text-yellow-700 active:text-yellow-800">Detail</a>
                            <a href="/pendaftar-{{ $pendaftar->pendaftar }}/{{ $pendaftar->id }}/download" class="block mb-2 font-medium text-green-600 transition duration-300 ease-in-out hover:text-green-700 focus:text-green-700 active:text-green-800">Download</a>
                            <form action="/pendaftar-{{ $pendaftar->pendaftar }}/{{ $pendaftar->id }}" method="post" class="inline-block">
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
                <p class="py-3 text-center text-gray-500">Pendaftar masih kosong</p>
            @endif
        </div>
        {{ $data->links() }}
    </div>
</section>