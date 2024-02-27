@extends('componen.app')
@section('titel')
    Data Pengunjung
@endsection
@section('isi')
<div class=" h-screen sm:ml-64 bg-white  overflow-auto py-5 pt-16 font-popins">
      <div class="p-4  rounded-lg ">
         <h1 class="text-2xl text-emerald-700 font-bold px-3 p-4 border-b">Detail Pengunjung</h1>
        <div class="relative overflow-x-auto max-w-6xl">
            <div class="grid grid-cols-1  md:grid-cols-4  gap-3 mt-5 mx-auto ">
                <div class="relative overflow-scroll rounded-md shadow-md border p-5 md:col-span-3">
                    <table class="w-full text-left rtl:text-right text-gray-500 text-xs md:text-sm">
                            <tr class="bg-white border-b">
                                <th scope="row" class="py-2 md:px-6 md:py-4 text-gray-900/65 whitespace-nowrap font-semibold">
                                    Nama Tamu
                                </th>
                                <td class="px-2 py-2 md:px-6 md:py-4">
                                    :
                                </td>
                                <td class="py-2 md:px-6 md:py-4 ">
                                    {{ Str::ucfirst($pengunjung->nama) }}
                                </td>
                            </tr>
                            <tr class="bg-white border-b">
                                <th scope="row" class="py-2 md:px-6 md:py-4 text-gray-900/65 whitespace-nowrap font-semibold">
                                    Instansi/<br>Kelompok Masyarakat
                                </th>
                                <td class="py-2 px-2 md:px-6 md:py-4">
                                    :
                                </td>
                                <td class="py-2 md:px-6 md:py-4 ">
                                    {{ Str::ucfirst($pengunjung->instansi) }}
                                </td>
                            </tr>
                            <tr class="bg-white border-b">
                                <th scope="row" class="py-2 md:px-6 md:py-4 text-gray-900/65 whitespace-nowrap font-semibold">
                                    Alamat
                                </th>
                                <td class="py-2 px-2 md:px-6 md:py-4">
                                    :
                                </td>
                                <td class="py-2 md:px-6 md:py-4 ">
                                    {{ Str::ucfirst($pengunjung->alamat) }}
                                </td>
                            </tr>
                            <tr class="bg-white border-b">
                                <th scope="row" class="py-2 md:px-6 md:py-4 text-gray-900/65 whitespace-nowrap font-semibold">
                                    Email
                                </th>
                                <td class="py-2 px-2 md:px-6 md:py-4">
                                    :
                                </td>
                                <td class="py-2 md:px-6 md:py-4 ">
                                    {{ Str::ucfirst($pengunjung->email) }}
                                </td>
                            </tr>
                            <tr class="bg-white border-b">
                                <th scope="row" class="py-2 md:px-6 md:py-4 text-gray-900/65 whitespace-nowrap font-semibold">
                                    No. Handphone
                                </th>
                                <td class="py-2 px-2 md:px-6 md:py-4">
                                    :
                                </td>
                                <td class="py-2 md:px-6 md:py-4 ">
                                    {{ Str::ucfirst($pengunjung->hp) }}
                                </td>
                            </tr>
                            <tr class="bg-white border-b">
                                <th scope="row" class="py-2 md:px-6 md:py-4 text-gray-900/65 whitespace-nowrap font-semibold">
                                    Divisi
                                </th>
                                <td class="py-2 px-2 md:px-6 md:py-4">
                                    :
                                </td>
                                <td class="py-2 md:px-6 md:py-4 ">
                                    {{ Str::ucfirst($pengunjung->divisi->divisi_type) }}
                                </td>
                            </tr>
                    </table>
                </div>
                <div class="rounded-md shadow-md border py-5 col-span-1 px-5">
                    <h1 class="text-center text-sm md:text-lg font-semibold text-emerald-700/70 pb-2 mx-3 border-b">DAFTAR LAYANAN PENGUNJUNG</h1>
                    <table class="text-left rtl:text-right text-gray-500 text-xs md:text-sm w-full mt-3">
                        @foreach ($tujuan as $key => $item)
                            <tr class="bg-white border-b">
                                <th scope="row" class="px-2 py-2 text-gray-900/65 whitespace-nowrap font-semibold">
                                    {{ $key + 1 }}.
                                </th>
                      
                                <td class=" py-2 ">
                                    <a href="/dataPelayanan/{{ $item->id }}" class="hover:text-blue-400 hover:border-b hover:border-b-blue-400">{{ $item->created_at->locale('id')->isoFormat('dddd, DD MMMM YYYY') }}</a>
                                </td>
                            </tr>  
                        @endforeach
                    </table>
                </div>
                <a href="/dataPengunjung "><button class=" text-white bg-emerald-400 p-2
                    text-lg hover:bg-emerald-200 hover:text-emerald-700 text-center font-popins rounded-md transition-all mt-5">Kembali</button></a>
            </div>       
        </div>
      </div>
</div>  
@endsection