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
    <h2 class="text-dark font-bold text-3xl mb-3">{{ $title }}</h2>
    <h2 class="text-dark font-small text-lg mb-10">{{ $subtitle }}</h2>
    
    <div class="flex justify-between items-center">
        {{-- filter search --}}
        <div class="w-[65%]">
            <form method="GET" action="/menfess-admin">
                    <select name="filter" class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:border-sky-500">
                        <option value="All" @if($filter == 'All') selected @endif>All</option>
                        <option value="Pending" @if($filter == 'Pending') selected @endif>Pending</option>
                        <option value="Accept" @if($filter == 'Accept') selected @endif>Accept</option>
                        <option value="Terbaik" @if($filter == 'Terbaik') selected @endif>Terbaik</option>
                    </select>
                    <button type="submit" class="text-sm lg:text-base font-medium bg-primary text-white px-4 py-2 rounded-md ml-2 hover:shadow-lg hover:opacity-50 transition duration-300 ease-in-out">Filter</button>
            </form>
        </div>
        
        <a href="" class="text-sm lg:text-base font-medium bg-red-500 text-white px-4 py-2 rounded-md ml-2 hover:shadow-lg hover:opacity-50 transition duration-300 ease-in-out" id="deleteAllSelectedRecord">Delete All Selected</a>
    </div>
    <div class="rounded-lg shadow-lg bg-white flex flex-col overflow-x-auto mt-5 mb-10">
        <div class="inline-block min-w-full overflow-hidden">
            @if($data->count())
                <table class="min-w-full mb-0">
                    <thead class="border-b rounded-t-lg text-left">
                    <tr>
                        <th><input type="checkbox" name="" id="select_all_ids"></th>
                        <th scope="col" class="rounded-tl-lg text-sm font-medium px-4 py-2">No</th>
                        <th scope="col" class="text-sm font-medium px-4 py-2">Dari</th>
                        <th scope="col" class="text-sm font-medium px-4 py-2">Untuk</th>
                        <th scope="col" class="text-sm font-medium px-4 py-2">Pesan</th>
                        <th scope="col" class="text-sm font-medium px-4 py-2">Status</th>
                        <th scope="col" class="rounded-tr-lg text-sm font-medium px-4 py-2"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $menfess)
                    <tr class="border-b bg-gray-100" id="data_ids{{ $menfess->id }}">
                        <th><input type="checkbox" name="ids" class="checkbox_ids" id="" value="{{ $menfess->id }}"></th>
                        <th class="text-sm font-medium px-4 py-2 whitespace-nowrap text-left" scope="row">{{ $number }}</th>
                        <td class="px-4 py-2 whitespace-nowrap text-gray-500">{{ $menfess->from }}</td>
                        <td class="px-4 py-2 whitespace-nowrap text-gray-500">{{ $menfess->to }}</td>
                        <td class="px-4 py-2 whitespace-normal text-justify text-gray-500 max-w-md">{{ $menfess->message }}</td>
                        <td class="px-4 py-2 whitespace-nowrap @if($menfess->status == 'Pending') text-red-500 @elseif($menfess->status == 'Accept') text-green-500 @else text-yellow-500 @endif">{{ $menfess->status }}</td>
                        <td class="px-4 py-2 whitespace-nowrap text-right">
                            <a href="/menfess-admin/{{ $menfess->id }}/accept" class="font-medium text-green-600 hover:text-green-700 focus:text-green-700 active:text-green-800 transition duration-300 ease-in-out">Accept</a>
                            <a href="/menfess-admin/{{ $menfess->id }}/terbaik" class="ml-2 font-medium text-yellow-600 hover:text-yellow-700 focus:text-yellow-700 active:text-yellow-800 transition duration-300 ease-in-out">Terbaik</a>
                            <form action="/menfess-admin/{{ $menfess->id }}" method="post" class="inline-block">
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
                <p class="text-gray-500 text-center py-3">Menfess masih kosong</p>
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