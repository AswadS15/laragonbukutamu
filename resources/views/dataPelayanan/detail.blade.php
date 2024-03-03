@extends('componen.app')
@section('titel')
    Data Pelayanan
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('.pre').click(function () {
            // Dapatkan sumber gambar dari elemen yang diklik
            var imageSrc = $(this).find('img').attr('src');

            // Setel sumber gambar modal secara dinamis
            $('#imageModal').attr('src', imageSrc);

            var imageId = $(this).data('id');
            $('#deletedform').attr('action', '/deletedimg/' + imageId);
            

            $('#download').attr('href', '/downloadImg/' + imageId);
           
            // Tampilkan modal
            $('#buka').removeClass('hidden').addClass('flex');
        });
        

        // Tangani acara klik tombol tutup
        $('#btnClose').click(function () {
            // Sembunyikan modal
            $('#buka').removeClass('flex').addClass('hidden');
        });
    });
</script>
@endsection

@section('isi')
{{-- DETAIL PREVIEW --}}
<div id="buka"  class="fixed inset-0 z-[1000] hidden bg-black bg-opacity-90 items-center justify-center">
    <div class=" absolute top-14 right-14 flex items-center gap-5">
        <a id="download" href="" class="text-white">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5 opacity-50 hover:opacity-100"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg>
        </a>
        <form id="deletedform" action="" class="flex justify-center" method="POST">
            @csrf
            @method('delete')
                <button id="delete" type="submit" class=" rounded-md " onclick="return confirm('Apakah yakin ingin menghapus profile anda ?')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 opacity-50 hover:opacity-100" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#fffefb" d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                </button>
        </form>
        <div class="flex items-center justify-center">
            <button id="btnClose" class="text-white group mb-1">
                <span class="text-3xl font-bold opacity-50 group-hover:opacity-100 transition-all">x</span>
            </button>
        </div>
    </div>
    <img src="" id="imageModal" class="w-1/3" alt="">
</div>

{{-- END DETAIL PREVIEW --}}
<div class=" h-full sm:ml-64 py-5 pt-24">
    <div class=" flex justify-between p-4  text-2xl text-emerald-700 font-bold bg-white  fixed z-10 top-16 w-full border-b">
        <h1>Detail Data Pelayanan</h1>
    </div>
    <div class="grid md:grid-cols-3 gap-3 mt-14 mx-5">
        <div class="md:col-span-2 rounded-sm shadow-sm border">
            <table class="text-black/70 capitalize text-sm md:text-lg w-full">
                <tr class="border-b">
                    <td class="p-2 text-black/90">Nama</td>
                    <td class="p-2">:</td>
                    <td class="p-2">
                        {{ Str::ucfirst($tujuan->pengunjung->nama) }}
                    </td>
                </tr>
                <tr class="border-b">
                    <td class="p-2 text-black/90">Instansi</td>
                    <td class="p-2">:</td>
                    <td class="p-2">
                        {{ Str::ucfirst($tujuan->pengunjung->instansi) }}
                    </td>
                </tr>
                <tr class="border-b">
                    <td class="p-2 text-black/90">alamat</td>
                    <td class="p-2">:</td>
                    <td class="p-2">
                        {{ Str::ucfirst($tujuan->pengunjung->alamat) }}
                    </td>
                </tr>
                <tr class="border-b">
                    <td class="p-2 text-black/90">Divisi</td>
                    <td class="p-2">:</td>
                    <td class="p-2">
                        {{ Str::ucfirst($tujuan->divisi->divisi_type) }}
                    </td>
                </tr>
                <tr class="border-b">
                    <td class="p-2 text-black/90">Tujuan</td>
                    <td class="p-2">:</td>
                    <td class="p-2">
                        {{ Str::ucfirst($tujuan->tujuan) }}
                    </td>
                </tr>
                <tr class="border-b">
                    <td class="p-2 text-black/90">Status layanan</td>
                    <td class="p-2">:</td>
                    @if ($tujuan->status != 0)
                    <td class="p-2">
                        Dibaca
                    </td>     
                        
                    @else
                    <td class="p-2">
                        Belum Dibaca
                    </td>
                        
                    @endif
                </tr>
                <tr class="border-b">
                    <td class="p-2 text-black/90">Tanggal</td>
                    <td class="p-2">:</td>
                    <td class="p-2">
                        {{ Str::ucfirst($tujuan->created_at->locale('id')->isoFormat('dddd, DD MMMM YYYY')) }}
                    </td>
                </tr>
            </table>

        </div>
        <div class="col-span-1 rounded-sm shadow-sm border p-4 flex flex-col items-center justify-center h-[317px]">
            <h3 class="text-base text-emerald-700 font-bold bg-white pb-2" >Dokumentasi</h3>
            <div class="grid grid-cols-2 gap-2 overflow-scroll shadow-sm border ">
                @foreach ($dokumentasis as $dokumentasi)
                    @if ($dokumentasi->gambar)
                        <div class="pre col-span-1" data-id="{{ $dokumentasi->id }}">
                            <img class="w-[150px] h-[150px] object-cover col-span-1" src="{{ asset('storage/profile/dokumentasi/'. $dokumentasi->gambar) }}">
                        </div>
                    @endif
                @endforeach
            </div>
            @if (auth()->user()->role == 'admin')
                <form action="/dataPelayanan/{{ $tujuan->id }}/upload" method="post" enctype="multipart/form-data" class="mt-3 mx-auto max-w-md">
                    @csrf
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file" name="gambar[]" multiple="true" required>
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-300 pb-2" id="file_input_help">SVG, PNG, JPG, or GIF</p>
                    <button type="submit" class="mt-3">
                        <span class="text-white bg-emerald-400 p-2
                        text-sm hover:bg-emerald-200 hover:text-emerald-700 text-center font-popins rounded-md transition-all">Upload</span>
                    </button>
                </form>
            @endif
        </div>
    </div>
    <a href="/dataPelayanan">
        <button class="text-white bg-emerald-400 p-2
        text-lg hover:bg-emerald-200 hover:text-emerald-700 text-center font-popins rounded-md transition-all mt-5 ms-5">
        Kembali
        </button>
    </a>
</div>
@endsection
