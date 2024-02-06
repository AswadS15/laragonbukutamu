@extends('componen.app')
@section('isi')
<div class=" h-screen sm:ml-64 bg-white  overflow-auto py-5 pt-16 ">
   <div class=" flex justify-between p-4  text-2xl text-emerald-700 font-bold bg-white  fixed z-10 top-16 w-full border-b">
      <h1>Data Pelayanan</h1>
      <div class="grid grid-cols-2 gap-2 md:me-64">
         <a href="/downloadPelayanan" class="bg-red-500 py-1 px-2 xl:text-sm text-[10px]  text-white rounded-md">Export Pdf</a>
         <a href="#" class="bg-green-500  py-1 px-2 xl:text-sm text-white rounded-md text-[10px]">Export Exel</a>
  </div>
    </div>
   <div class="  sm:rounded-lg mx-5 pt-20">
      <div class="overflow-x-auto shadow-md sm:rounded-lg border p-4">
         <table class="w-full text-sm text-left rtl:text-right text-gray-500 overflow-x-scroll">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
               <tr>
                     <th scope="col" class="px-6 py-3">
                        No
                     </th>
                     <th scope="col" class="px-6 py-3 ">
                        Nama
                     </th>
                     <th scope="col" class="px-6 py-3 truncate ">
                         Status Pelayanan
                      </th>
                     <th scope="col" class="px-6 py-3">
                        Tujuan
                     </th>
                     <th scope="col" class="px-6 py-3">
                         Tanggal
                     </th>
                     <th scope="col" class="px-6 py-3">
                        Aksi  
                     </th>
               </tr>
            </thead>
            @if (auth()->user()->divisi->divisi_type == 'tata usaha')  
               @include('kepaladivisi.tatausahaTujuan')
            @elseif(auth()->user()->id_divisi == 2)
               @include('kepaladivisi.isdhtlTujuan')
            @elseif(auth()->user()->id_divisi == 3)
               @include('kepaladivisi.pkhTujuan') 
            @elseif(auth()->user()->role == 'admin')
               @include('kepaladivisi.adminTujuan') 
            @elseif(auth()->user()->role == 'pimpinan')
               @include('kepaladivisi.pimpinanTujuan') 
            @endif
         </table>
      </div>
   </div>
   <div class="p-5">{{ $tujuan->links() }}</div>   
</div> 




@endsection