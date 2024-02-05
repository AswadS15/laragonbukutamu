@extends('componen.app')
@section('isi')
<div class=" h-screen sm:ml-64 bg-white  overflow-auto py-5 pt-16">
        <div class=" flex justify-between p-4  text-2xl text-emerald-700 font-bold bg-white  fixed z-10 top-16 w-full border-b">
            <h1>Data Pelayanan</h1>
            <div class="flex">
                <a href="/downloadDetailDataPelayanan/{{$tujuan->id}}" class="bg-red-500 py-1 px-2 text-sm me-4 text-white rounded-md">Export Pdf</a>
                <a href="" class="bg-green-500 md:me-[300px] py-1 px-2 text-sm text-white rounded-md">Export Exel</a>
            </div>
      </div>
        <div class="relative overflow-x-auto max-w-6xl mx-auto mt-16">
            <div class="flex flex-col items-center justify-center rounded bg-gray-50 py-5 dark:bg-gray-800 mt-5 mx-4 sm:mx-10">
                @if ($tujuan->gambar)
                <div>
                    <img src="{{ asset('storage/img/pengunjung/'. $tujuan->gambar) }}" alt="dokumentasi" class="w-full max-w-[400px] md:max-w-2xl mx-auto">
                </div>
                @else
                    {{-- Tombol Tambah Gambar --}}
                    <p class="text-2xl text-gray-400 dark:text-gray-500">
                        Dokumentasi Kosong    
                    </p>
                    <form action="/dataPelayanan/{{ $tujuan->id }}/upload" method="post" enctype="multipart/form-data" class="mt-3 mx-auto max-w-md">
                        @csrf
                        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file" name="gambar">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG, or GIF (MAX. 800x400px).</p>
                        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md transition duration-300 hover:bg-blue-600 mt-3">
                            Upload
                        </button>
                    </form>
                @endif
            </div>
            <div class="flex flex-col items-center justify-center rounded py-5 dark:bg-gray-800 mt-5 mx-10">

                <table class="w-full text-left rtl:text-right text-gray-500 mt-5 text-lg md:text-xl">
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-4 py-2 text-gray-900 font-semibold">
                            Nama Tamu
                        </th>
                        <td class="px-4 py-2">
                            :
                        </td>
                        <td class="px-4 py-2">
                            {{ Str::ucfirst($tujuan->pengunjung->nama) }}
                        </td>
                    </tr>
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-4 py-2 text-gray-900 font-semibold">
                            Status Pelayanan
                        </th>
                        <td class="px-4 py-2">
                            :
                        </td>
                        @if ($tujuan->status != 0)
                        <td class="px-4 py-2">
                            Sudah Dilayani
                        </td>     
                            
                        @else
                        <td class="px-4 py-2">
                            Belum Dilayani
                        </td>
                            
                        @endif
                  
                    </tr>
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-4 py-2 text-gray-900 font-semibold">
                            Tujuan
                        </th>
                        <td class="px-4 py-2">
                            :
                        </td>
                        <td class="px-4 py-2">
                            {{ Str::ucfirst($tujuan->tujuan) }}
                        </td>
                    </tr>
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-4 py-2 text-gray-900 font-semibold">
                            Dibuat Tanggal
                        </th>
                        <td class="px-4 py-2">
                            :
                        </td>
                        <td class="px-4 py-2">
                            {{ Str::ucfirst($tujuan->created_at) }}
                        </td>
                    </tr>
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-4 py-2 text-gray-900 font-semibold">
                            Diupdate Tanggal
                        </th>
                        <td class="px-4 py-2">
                            :
                        </td>
                        <td class="px-4 py-2">
                            {{ Str::ucfirst($tujuan->updated_at) }}
                        </td>
                    </tr>
                </table>
            </div>

            <a href="/dataPelayanan ">
                <button class="font-semibold text-white rounded-lg mt-5 ms-5 py-3 px-6 bg-blue-400 max-w-sm mx-auto">Kembali</button>
            </a>
        </div>
    </div>
</div>


{{-- <div class=" h-screen sm:ml-64 bg-white  overflow-auto py-5 pt-16">
      <div class="p-4  rounded-lg mt-16 md:mt-0">
         <h1 class="text-2xl text-emerald-700 font-bold px-3 p-4 border-b">Detail Data Pelayanan</h1>
        <div class="relative overflow-x-auto max-w-6xl">
            <div class="flex flex-col items-center justify-center rounded bg-gray-50 py-5 dark:bg-gray-800 mt-5 mx-10">
                @if ($tujuan->gambar)
                    <div>
                        <img src="{{ asset('/img/pengunjung/'. $tujuan->gambar) }}" alt="dokumentasi" width="400px" height="700px">
                    </div>
                @else

                        <p class="text-2xl text-gray-400 dark:text-gray-500">
                            Dokumentasi Kosong    
                        </p>
                        <form action="/dataPelayanan/{{ $tujuan->id }}/upload" method="post" enctype="multipart/form-data">
                            @csrf
                             <input class="mt-3 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file" name="gambar">
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
                                
                                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md transition duration-300 hover:bg-blue-600 mt-3">
                                    Upload
                                </button>
                        </form> 
                @endif

             </div>
            
            <a href="/dataPelayanan "><button class=" font-semibold text-white rounded-lg mt-5 py-3 px-6 bg-blue-400 max-w-sm">Kembali</button></a>
                
        </div>
        

      </div>
</div>   --}}
@endsection