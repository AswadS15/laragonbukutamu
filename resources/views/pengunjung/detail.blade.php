@extends('componen.app')
@section('isi')
<div class=" h-screen sm:ml-64 bg-white  overflow-auto py-5 pt-16">
      <div class="p-4  rounded-lg ">
         <h1 class="text-2xl text-emerald-700 font-bold px-3 p-4 border-b">Detail Pengunjung</h1>
        <div class="relative overflow-x-auto max-w-6xl">
            {{-- <div class="flex flex-col items-center justify-center rounded bg-gray-50 py-5 dark:bg-gray-800 mt-5 mx-10"> --}}
                {{-- @if ($pengunjung->gambar)
                    <div>
                        <img src="{{ asset('/img/pengunjung/'. $pengunjung->gambar) }}" alt="dokumentasi" width="400px" height="700px">
                    </div>
                @else --}}
                    {{-- Tombol Tambah Gambar --}}
                        {{-- <p class="text-2xl text-gray-400 dark:text-gray-500">
                            Dokumentasi Kosong    
                        </p>
                        <form action="/pengunjung/{{ $pengunjung->id }}/upload" method="post" enctype="multipart/form-data">
                            @csrf
                             <input class="mt-3 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file" name="gambar">
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
                                
                                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md transition duration-300 hover:bg-blue-600 mt-3">
                                    Upload
                                </button>
                        </form> 
                @endif --}}
                {{-- @if ($pengunjung->gambar)
                <p class="text-2xl text-gray-400 dark:text-gray-500">
                    Dokumentasi Kosong    
                </p>
                               
                @else
                @endif --}}
             {{-- </div> --}}
            <table class="w-full text-left rtl:text-right text-gray-500 mt-5 text-lgresources/views/pengunjung/detail.blade.php">
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap font-semibold">
                            Nama Tamu
                        </th>
                        <td class="px-6 py-4">
                            :
                        </td>
                        <td class="px-6 py-4 ">
                            {{ Str::ucfirst($pengunjung->nama) }}
                        </td>
                    </tr>
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap font-semibold">
                            Instansi/Kelompok Masyarakat
                        </th>
                        <td class="px-6 py-4">
                            :
                        </td>
                        <td class="px-6 py-4 ">
                            {{ Str::ucfirst($pengunjung->instansi) }}
                        </td>
                    </tr>
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap font-semibold">
                            Alamat
                        </th>
                        <td class="px-6 py-4">
                            :
                        </td>
                        <td class="px-6 py-4 ">
                            {{ Str::ucfirst($pengunjung->alamat) }}
                        </td>
                    </tr>
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap font-semibold">
                            No. Handphone
                        </th>
                        <td class="px-6 py-4">
                            :
                        </td>
                        <td class="px-6 py-4 ">
                            {{ Str::ucfirst($pengunjung->hp) }}
                        </td>
                    </tr>
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap font-semibold">
                            Divisi
                        </th>
                        <td class="px-6 py-4">
                            :
                        </td>
                        <td class="px-6 py-4 ">
                            {{ Str::ucfirst($pengunjung->divisi->divisi_type) }}
                        </td>
                    </tr>
            </table>
            <a href="/pengunjung "><button class=" font-semibold text-white rounded-lg mt-5 py-3 px-6 bg-blue-400 max-w-sm">Kembali</button></a>
                
        </div>
        

      </div>
</div>  
@endsection