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
    <h2 class="mb-3 text-3xl font-bold text-dark">{{ $title }}</h2>
    <h2 class="mb-10 text-lg text-dark font-small">{{ $subtitle }}</h2>
    
    <div class="flex items-center justify-between">
        {{-- filter search --}}
        <div class="w-[65%]">
            <form method="GET" action="/menfess-admin">
                    <select name="filter" class="px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-sky-500">
                        <option value="All" @if($filter == 'All') selected @endif>All</option>
                        <option value="Pending" @if($filter == 'Pending') selected @endif>Pending</option>
                        <option value="Accept" @if($filter == 'Accept') selected @endif>Accept</option>
                        <option value="Terbaik" @if($filter == 'Terbaik') selected @endif>Terbaik</option>
                    </select>
                    <button type="submit" class="px-4 py-2 ml-2 text-sm font-medium text-white transition duration-300 ease-in-out rounded-md lg:text-base bg-primary hover:shadow-lg hover:opacity-50">Filter</button>
            </form>
        </div>
        
        <a href="" class="px-4 py-2 ml-2 text-sm font-medium text-white transition duration-300 ease-in-out bg-red-500 rounded-md lg:text-base hover:shadow-lg hover:opacity-50" id="deleteAllSelectedRecord">Delete All Selected</a>
    </div>
    <div class="flex flex-col mt-5 mb-10 overflow-x-auto bg-white rounded-lg shadow-lg">
        <div class="inline-block min-w-full overflow-hidden">
            @if($data->count())
                <table class="min-w-full mb-0">
                    <thead class="text-left border-b rounded-t-lg">
                    <tr>
                        <th><input type="checkbox" name="" id="select_all_ids"></th>
                        <th scope="col" class="px-4 py-2 text-sm font-medium rounded-tl-lg">No</th>
                        <th scope="col" class="px-4 py-2 text-sm font-medium">Dari</th>
                        <th scope="col" class="px-4 py-2 text-sm font-medium">Untuk</th>
                        <th scope="col" class="px-4 py-2 text-sm font-medium">Pesan</th>
                        <th scope="col" class="px-4 py-2 text-sm font-medium">Status</th>
                        <th scope="col" class="px-4 py-2 text-sm font-medium rounded-tr-lg"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $menfess)
                    <tr class="bg-gray-100 border-b" id="data_ids{{ $menfess->id }}">
                        <th><input type="checkbox" name="ids" class="checkbox_ids" id="" value="{{ $menfess->id }}"></th>
                        <th class="px-4 py-2 text-sm font-medium text-left whitespace-nowrap" scope="row">{{ $number }}</th>
                        <td class="px-4 py-2 text-gray-500 whitespace-nowrap">{{ $menfess->from }}</td>
                        <td class="px-4 py-2 text-gray-500 whitespace-nowrap">{{ $menfess->to }}</td>
                        <td class="max-w-md px-4 py-2 text-justify text-gray-500 whitespace-normal">{{ $menfess->message }}</td>
                        <td class="px-4 py-2 whitespace-nowrap @if($menfess->status == 'Pending') text-red-500 @elseif($menfess->status == 'Accept') text-green-500 @else text-yellow-500 @endif">{{ $menfess->status }}</td>
                        <td class="px-4 py-2 text-right whitespace-nowrap">
                            <a href="/menfess-admin/{{ $menfess->id }}/accept" class="font-medium text-green-600 transition duration-300 ease-in-out hover:text-green-700 focus:text-green-700 active:text-green-800">Accept</a>
                            <a href="/menfess-admin/{{ $menfess->id }}/terbaik" class="ml-2 font-medium text-yellow-600 transition duration-300 ease-in-out hover:text-yellow-700 focus:text-yellow-700 active:text-yellow-800">Terbaik</a>
                            <form action="/menfess-admin/{{ $menfess->id }}" method="post" class="inline-block">
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
                <p class="py-3 text-center text-gray-500">Menfess masih kosong</p>
            @endif
        </div>
        {{ $data->links() }}
    </div>
</section>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function () {
    // Check/Uncheck all checkboxes when the "select_all_ids" checkbox is clicked
    $('#select_all_ids').click(function () {
        $('.checkbox_ids').prop('checked', $(this).prop('checked'));
    });

    //delete
    $('#deleteAllSelectedRecord').click(function (e) {
        e.preventDefault();
        var all_ids = [];
        $('input:checkbox[name=ids]:checked').each(function () {
            all_ids.push($(this).val());
        });

        $.ajax({
            url:"{{ route('menfess-delete') }}",
            type:"DELETE",
            data:{
                ids:all_ids,
                _token:'{{ csrf_token() }}'
            },
            success: function (response) {
                $.each(all_ids, function (key, val) {
                    $('#data_ids'+val).remove();
                });
            }
        });
    });
});
</script>