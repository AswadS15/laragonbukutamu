@extends('componen.app')
@section('titel')
    Users
@endsection
@section('isi')
<div class=" h-screen sm:ml-64 bg-white  overflow-auto py-5 pt-16 font-popins">
    <div class=" flex justify-between p-4  text-2xl text-emerald-700 font-bold bg-white  fixed z-10 top-16 w-full border-b">
        <h1>Data Users</h1>
    </div>
    <div class="mt-24 w-[90%] mx-auto">
        <a href="/users/create" class="block bg-emerald-400 p-2 hover:bg-emerald-500 w-20 mb-3 text-white text-opacity-50 text-center rounded-md hover:ring-emerald-600 hover:ring-2">+ User</a>
        <div class="grid  mx-auto grid-cols-1 md:grid-cols-3  gap-3  ">
            <div class="cols-span-1 h-[350px] overflow-scroll shadow-sm md:shadow-xl  rounded-lg border p-3 bg-emerald-200 bg-opacity-5 relative">
                <h1 class="text-center font-semibold text-xl py-3 border-b-2 text-emerald-400">Admin</h1>
                @foreach ($admin as $item)
                <div class=" rounded-lg  mt-3 p-3 border">
                    <table class="w-full">
                        <tr class="flex justify-between items-center p-2 border-b-2 text-gray-400 hover:bg-gray-100 rounded-lg hover:border mt-2">
                            <td class="capitalize">{{$item->name}}</td>
                            <td class="flex justify-center gap-2 items-center">  
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

            <div class="cols-span-1 h-[350px] overflow-scroll shadow-sm md:shadow-xl  rounded-lg border p-3 bg-emerald-200 bg-opacity-5 relative">
                <h1 class="text-center font-semibold text-xl py-3 border-b-2 text-emerald-400">Kepala Divisi</h1>
                @foreach ($kepalaDivisi as $item)
                <div class=" rounded-lg  mt-3 p-3 border">
                    <table class="w-full">
                        <tr class="flex justify-between items-center p-2 border-b-2 text-gray-400 hover:bg-gray-100 rounded-lg hover:border mt-2">
                            <td class="capitalize">{{$item->name}}</td>
                            <td class="flex justify-center gap-2 items-center">
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

            <div class="cols-span-1 h-[350px] overflow-scroll shadow-sm md:shadow-xl  rounded-lg border p-3 bg-emerald-200 bg-opacity-5 relative">
                <h1 class="text-center font-semibold text-xl py-3 border-b-2 text-emerald-400">Pimpinan</h1>
                @foreach ($pimpinan as $item)
                <div class=" rounded-lg  mt-3 p-3 border">
                    <table class="w-full">
                        <tr class="flex justify-between items-center p-2 border-b-2 text-gray-400 hover:bg-gray-100 rounded-lg hover:border mt-2">
                            <td class="capitalize">{{$item->name}}</td>
                            <td class="flex justify-center gap-2 items-center">
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