@extends('componen.app')
@section('isi')
<div class=" h-screen sm:ml-64 bg-white  overflow-auto py-5 pt-16 font-popins">
    <div class=" flex justify-between p-4  text-2xl text-emerald-700 font-bold bg-white  fixed z-10 top-16 w-full border-b">
        <h1>Data Users</h1>
    </div>
    <div class="mt-24 w-[90%] mx-auto">
        <a href="/users/create" class="block bg-emerald-400 p-2 hover:bg-emerald-500 w-20 mb-3 text-white text-opacity-50 text-center rounded-md hover:ring-emerald-600 hover:ring-2">+ User</a>
        <div class="grid  mx-auto grid-cols-1 md:grid-cols-3  gap-3  ">
            <div class="cols-span-1 shadow-sm md:shadow-xl  rounded-lg border p-3 bg-emerald-200 bg-opacity-5 relative">
                <h1 class="text-center font-semibold text-xl py-3 border-b-2 text-emerald-400">Admin</h1>
                @foreach ($admin as $item)
                <div class=" rounded-lg  mt-3 p-3 border">
                    <table class="w-full">
                        <tr class="flex justify-between items-center p-2 border-b-2 text-gray-400 hover:bg-gray-100 rounded-lg hover:border mt-2">
                            <td class="capitalize">{{$item->name}}</td>
                            <td class="flex justify-center gap-2 items-center">
                                @if(auth()->check() && auth()->user()->id == $item->id)
                                <a href="/users/{{$item->id}}/edit" class="p-1 relative group">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-3 opacity-50 hover:opacity-100" fill="black"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg>
                                    <span class="mt-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300 absolute top-full left-1/2 transform -translate-x-1/2 bg-gray-800 text-white p-1 rounded-md pointer-events-none z-20 text-xs">
                                        Edit
                                    </span>
                                </a>
                                @endif
                                <a href="" class="p-1 relative group">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-3 opacity-50 hover:opacity-100" fill="black"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg>
                                    <span class="mt-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300 absolute top-full left-1/2 transform -translate-x-1/2 bg-gray-800 text-white p-1 rounded-md pointer-events-none z-20 text-xs">
                                        Detail
                                    </span>
                                </a>    
                                <form action="{{ route('users.destroy', $item->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                        class="relative group" 
                                        onclick="return confirm('Apakah anda yakin ingin menghapus Data Pelayanan ini ?')">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-3 opacity-50 hover:opacity-100" fill="black"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                                            <span class="mt-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300 absolute top-full left-1/2 transform -translate-x-1/2 bg-gray-800 text-white p-1 rounded-md pointer-events-none z-20 text-xs">
                                                Delete
                                            </span>
                                        </a>
                                    </button>
                                </form>
                                
                            </td>
                        </tr>
                    </table>
                </div>
                @endforeach
            </div>

            <div class="cols-span-1 shadow-sm md:shadow-xl  rounded-lg border p-3 bg-emerald-200 bg-opacity-5 relative">
                <h1 class="text-center font-semibold text-xl py-3 border-b-2 text-emerald-400">Kepala Divisi</h1>
                @foreach ($kepalaDivisi as $item)
                <div class=" rounded-lg  mt-3 p-3 border">
                    <table class="w-full">
                        <tr class="flex justify-between items-center p-2 border-b-2 text-gray-400 hover:bg-gray-100 rounded-lg hover:border mt-2">
                            <td class="capitalize">{{$item->name}}</td>
                            <td class="flex justify-center gap-2 items-center">
                                <a href="" class="p-1 relative group">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-3 opacity-50 hover:opacity-100" fill="black"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg>
                                    <span class="mt-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300 absolute top-full left-1/2 transform -translate-x-1/2 bg-gray-800 text-white p-1 rounded-md pointer-events-none z-20 text-xs">
                                        Detail
                                    </span>
                                </a>
                                <form action="{{ route('users.destroy', $item->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                        class="relative group" 
                                        onclick="return confirm('Apakah anda yakin ingin menghapus Data Pelayanan ini ?')">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-3 opacity-50 hover:opacity-100" fill="black"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                                            <span class="mt-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300 absolute top-full left-1/2 transform -translate-x-1/2 bg-gray-800 text-white p-1 rounded-md pointer-events-none z-20 text-xs">
                                                Delete
                                            </span>
                                        </a>
                                    </button>
                                </form>
                                
                            </td>
                        </tr>
                    </table>
                </div>
                @endforeach
            </div>

            <div class="cols-span-1 shadow-sm md:shadow-xl  rounded-lg border p-3 bg-emerald-200 bg-opacity-5 relative">
                <h1 class="text-center font-semibold text-xl py-3 border-b-2 text-emerald-400">Pimpinan</h1>
                @foreach ($pimpinan as $item)
                <div class=" rounded-lg  mt-3 p-3 border">
                    <table class="w-full">
                        <tr class="flex justify-between items-center p-2 border-b-2 text-gray-400 hover:bg-gray-100 rounded-lg hover:border mt-2">
                            <td class="capitalize">{{$item->name}}</td>
                            <td class="flex justify-center gap-2 items-center">
                                <a href="" class="p-1 relative group">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-3 opacity-50 hover:opacity-100" fill="black"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg>
                                    <span class="mt-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300 absolute top-full left-1/2 transform -translate-x-1/2 bg-gray-800 text-white p-1 rounded-md pointer-events-none z-20 text-xs">
                                        Detail
                                    </span>
                                </a>
                                <form action="{{ route('users.destroy', $item->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                        class="relative group" 
                                        onclick="return confirm('Apakah anda yakin ingin menghapus Data Pelayanan ini ?')">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-3 opacity-50 hover:opacity-100" fill="black"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                                            <span class="mt-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300 absolute top-full left-1/2 transform -translate-x-1/2 bg-gray-800 text-white p-1 rounded-md pointer-events-none z-20 text-xs">
                                                Delete
                                            </span>
                                        </a>
                                    </button>
                                </form>
                                
                            </td>
                        </tr>
                    </table>
                </div>
                @endforeach
            </div>
    </div>
    
   
</div>  
@endsection