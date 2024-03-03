@extends('componen.app')
@section('titel')
    Profile Users
@endsection
@section('isi')
@if (auth()->user()->photo != null)
<div id="buka" class="fixed inset-0 z-[1000] bg-black bg-opacity-90 hidden items-center justify-center">
    <div class=" absolute top-14 right-14 flex gap-5">
        <form action="{{ route('hapusprofil', auth()->user()->id) }}" method="post" class="flex justify-center">
            @csrf
            @method('delete')
            <button type="submit" class="rounded-md "
                onclick="return confirm('Apakah yakin ingin menghapus profile anda ?')">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-4 opacity-50 hover:opacity-100 transition-all" fill="white"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
            </button>
        </form>
        <div class="flex items-center justify-center">
            <button id="btnClose" class="text-white group mb-1">
                <span class="text-3xl font-bold opacity-50 group-hover:opacity-100 transition-all">x</span>
            </button>
        </div>
    </div>
    <img src="{{ asset('storage/public/profile/'. auth()->user()->photo) }}" class="w-1/3" alt="">
</div>    
@endif

<div class=" h-screen sm:ml-64 bg-white overflow-y-auto py-5 font-popins">
    <div class=" flex justify-between p-4 text-2xl text-emerald-700 font-bold bg-white  fixed z-10 top-16 w-full border-b">
        <h1>Profile</h1>
    </div>
    <div class="mt-24 w-full md:w-[90%] mx-auto p-5">
        <div class="mx-auto p-4 grid grid-cols-1 md:grid-cols-3 gap-3">  
            @if (auth()->user()->photo != null)   
                <div class="rounded-md shadow-md border py-2 col-span-1">
                    <div 
                        id="pre" 
                        class="relative hover:opacity-90 transition  w-[100px] h-[100px] mx-auto shadow-md bg-cover bg-center rounded-full "
                        style="background-image: url({{ asset('storage/public/profile/'. auth()->user()->photo) }})">
                    </div>
                    @if (auth()->user()->role == 'admin')
                        <h1 class="font-bold text-base opacity-50 text-center py-2">Admin Layanan Buku Tamu <br> BPKHTL XV GORONTALO</h1>
                    @endif
                    
                    @if (auth()->user()->id_divisi == 1)
                        <h1 class="font-bold text-base opacity-50 text-center py-2">Kepala Divisi Tata Usaha<br> BPKHTL XV GORONTALO</h1>
                    @endif
                    @if (auth()->user()->id_divisi == 2)
                        <h1 class="font-bold text-base opacity-50 text-center py-2">Kepala Divisi ISDHTL<br> BPKHTL XV GORONTALO</h1>
                    @endif
                    @if (auth()->user()->id_divisi == 3)
                        <h1 class="font-bold text-base opacity-50 text-center py-2">Kepala Divisi PKH<br> BPKHTL XV GORONTALO</h1>
                    @endif
                    @if (auth()->user()->id_divisi == 4)
                        <h1 class="font-bold text-base opacity-50 text-center py-2">PIMPINAN<br> BPKHTL XV GORONTALO</h1>
                    @endif
                    <div class="flex justify-center py-2">
                        <a href="{{ route('change-password-show', [auth()->user()->id]) }}" class="text-white bg-emerald-400 p-2
                    hover:bg-emerald-200 hover:text-emerald-700 text-center font-popins rounded-md transition-all">Ubah Sandi</a>
                    </div>  
                </div>  
                
                <div class="col-span-2 rounded-md shadow-md border p-5 flex flex-col justify-between">
                    <table class="text-black/70 capitalize text-sm md:text-lg w-full">
                        <tr class="border-b">
                            <td class="p-2">Nama</td>
                            <td class="p-2">:</td>
                            <td class="p-2">{{auth()->user()->name}}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="p-2">Email</td>
                            <td class="p-2">:</td>
                            <td class="p-2">{{auth()->user()->email}}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="p-2">Role</td>
                            <td class="p-2">:</td>
                            <td class="p-2">{{auth()->user()->role}}</td>
                        </tr>
                    </table>
                    <a href="{{ route('editProfile', ['id'=>auth()->user()->id]) }}" class="bg-emerald-400 text-white text-lg  hover:bg-emerald-200 hover:text-emerald-700 text-center font-popins rounded-md transition-all py-1 w-full">
                        Edit
                    </a>
                </div>
                
                {{-- <h1 class="text-black/50 font-semibold text-center text-lg uppercase py-3"></h1> --}}
            @else  
                <div class="rounded-md shadow-md border py-2 col-span-1">      
                    <div id="pre" class=" relative  md:w-[130px] md:h-[130px]  w-[70px] h-[70px] mx-auto ">
                        <img src="{{ asset('/img/profil.png') }}" alt=""  class="w-[70px] h-[70px] md:w-[130px] md:h-[130px]">
                        <form action="/addprofile/{{auth()->user()->id}}" method="POST" class="flex items-center space-x-6 absolute bottom-0 right-0" enctype="multipart/form-data">
                            @csrf
                            <div class="flex items-center">
                                <div class="relative p-2 md:p-4 rounded-full bg-emerald-600 md:-translate-x-3">
                                    <label for="photo" class="cursor-pointer">
                                        <div class="md:w-6 w-4  overflow-hidden ">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="white"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M149.1 64.8L138.7 96H64C28.7 96 0 124.7 0 160V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V160c0-35.3-28.7-64-64-64H373.3L362.9 64.8C356.4 45.2 338.1 32 317.4 32H194.6c-20.7 0-39 13.2-45.5 32.8zM256 192a96 96 0 1 1 0 192 96 96 0 1 1 0-192z"/></svg>
                                        </div>
                                    </label>
                                    <input type="file" name="photo" id="photo" class="sr-only" onchange="submitForm()">
                                </div>
                            </div>  
                        </form>
                    </div>
                    @if (auth()->user()->role == 'admin')
                        <h1 class="font-bold text-base opacity-50 text-center py-2">Admin Layanan Buku Tamu <br> BPKHTL XV GORONTALO</h1>
                    @endif
                    
                    @if (auth()->user()->id_divisi == 1)
                        <h1 class="font-bold text-base opacity-50 text-center py-2">Kepala Divisi Tata Usaha<br> BPKHTL XV GORONTALO</h1>
                    @endif
                    @if (auth()->user()->id_divisi == 2)
                        <h1 class="font-bold text-base opacity-50 text-center py-2">Kepala Divisi ISDHTL<br> BPKHTL XV GORONTALO</h1>
                    @endif
                    @if (auth()->user()->id_divisi == 3)
                        <h1 class="font-bold text-base opacity-50 text-center py-2">Kepala Divisi PKH<br> BPKHTL XV GORONTALO</h1>
                    @endif
                    @if (auth()->user()->id_divisi == 4)
                        <h1 class="font-bold text-base opacity-50 text-center py-2">PIMPINAN<br> BPKHTL XV GORONTALO</h1>
                    @endif
                    <div class="flex justify-center py-2">
                        <a href="{{ route('change-password-show', [auth()->user()->id]) }}" class="text-white bg-emerald-400 p-2
                    hover:bg-emerald-200 hover:text-emerald-700 text-center font-popins rounded-md transition-all">Ubah Password</a>
                    </div>  
                </div>

                <div class="col-span-2 rounded-md shadow-md border p-5 flex flex-col justify-between">
                    <table class="text-black/70 capitalize text-sm md:text-lg w-full">
                        <tr class="border-b">
                            <td class="p-2">Nama</td>
                            <td class="p-2">:</td>
                            <td class="p-2">{{auth()->user()->name}}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="p-2">Email</td>
                            <td class="p-2">:</td>
                            <td class="p-2">{{auth()->user()->email}}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="p-2">Role</td>
                            <td class="p-2">:</td>
                            <td class="p-2">{{auth()->user()->role}}</td>
                        </tr>
                    </table>
                    <a href="{{ route('editProfile', ['id'=>auth()->user()->id]) }}" class="bg-emerald-400 text-white text-lg  hover:bg-emerald-200 hover:text-emerald-700 text-center font-popins rounded-md transition-all py-1 w-full">
                        Edit
                    </a>
                </div>
            @endif
        </div>
        <a href="/dashboard"><button class=" text-white bg-emerald-400 p-2
            text-lg hover:bg-emerald-200 hover:text-emerald-700 text-center font-popins rounded-md transition-all mt-5 ms-4">Kembali</button></a>
    </div> 
</div>

<script>
    function submitForm() {
        // Mendapatkan elemen formulir
        var form = document.querySelector('form');

        // Memeriksa apakah ada file yang dipilih
        if (document.getElementById('photo').files.length > 0) {
            // Menjalankan submit formulir secara otomatis
            form.submit();
        }
    }
</script> 


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Aktifkan modal saat gambar diklik
        $('#pre').click(function () {
            $('#buka').removeClass('hidden').addClass('flex');
        });

        // Tutup modal saat tombol ditutup
        $('#btnClose').click(function () {
            $('#buka').removeClass('flex').addClass('hidden');
        });
    });
</script>


@endsection