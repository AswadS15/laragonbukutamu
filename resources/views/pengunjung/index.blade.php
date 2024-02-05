@extends('componen.app')
@section('isi')
<div class=" h-screen sm:ml-64 bg-white  overflow-auto py-5 pt-16 ">
   <div class=" flex justify-between p-4  text-2xl text-emerald-700 font-bold bg-white  fixed z-10 top-16 w-full border-b">
      <h1>Data Pengunjung</h1>
      <div class="grid grid-cols-2 gap-2 md:me-64">
            <a href="/downloadPengunjung" class="bg-red-500 py-1 px-2 xl:text-sm text-[10px]  text-white rounded-md">Export Pdf</a>
            <a href="#" class="bg-green-500  py-1 px-2 xl:text-sm text-white rounded-md text-[10px]">Export Exel</a>
     </div>
    </div>
      <div class="  sm:rounded-lg mx-5 pt-20">
         <div class="overflow-x-auto shadow-md sm:rounded-lg border p-4">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 overflow-x-auto">
               <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                  <tr>
                        <th scope="col" class="px-6 py-3">
                           No
                        </th>
                        <th scope="col" class="px-6 py-3">
                           Nama
                        </th>
                        <th scope="col" class="px-6 py-3">
                           Instansi/Kelompok Masyarakat
                        </th>
                        <th scope="col" class="px-6 py-3">
                           Alamat
                        </th>
                        <th scope="col" class="px-6 py-3">
                           No. Handphone    
                        </th>
                        <th scope="col" class="px-6 py-3">
                           Divisi   
                        </th>
                        <th scope="col" class="px-6 py-3">
                           Aksi  
                        </th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($pengunjung as $key => $item)
                  <tr class="bg-white border-b hover:bg-gray-50 font-popins text-gray-900 capitalize">
                     <td scope="row" class="px-6 py-4 whitespace-nowrap">
                        {{ $pengunjung->firstItem() + $key }}
                     </td>
                     <td scope="row" class="px-6 py-4   whitespace-nowrap">
                        {{ $item->nama }}
                     </td>
                     <td scope="row" class="px-6 py-4 text-gray-600 whitespace-nowrap">
                        {{ $item->instansi }}
                     </td>
                     <td scope="row" class="px-6 py-4 text-gray-600 whitespace-nowrap">
                        {{ $item->alamat }}
                     </td>
                     <td scope="row" class="px-6 py-4 text-gray-600 whitespace-nowrap">
                        {{ $item->hp }}
                     </td>
                     <td scope="row" class="px-6 py-4 text-gray-600 whitespace-nowrap">
                        {{ $item->divisi->divisi_type }}
                     </td>
                     <td scope="row" class="px-6 py-4 text-gray-600 whitespace-nowrap">
                        <div class="flex justify-center">
                           <a href="/dataPengunjung/{{ $item->id }}" class="text-white bg-blue-400 px-5 py-1 rounded-lg me-3" >Detail</a>
                        </div>
                     </td>  
                  </tr>     
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
      <div class="p-5">{{ $pengunjung->links() }}</div>   
</div>  
@endsection