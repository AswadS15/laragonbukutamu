@extends('componen.app')
@section('titel')
    Data Pengunjung
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
   $("#toggle").click(function() {
       $("#formExport").toggle();
   });
});
</script>

@endsection
@section('isi')
<div class="sm:ml-64 py-5 pt-24 ">
   <div class=" flex justify-between p-4  text-2xl text-emerald-700 font-bold bg-white  fixed z-10 top-16 w-full border-b">
      <h1>Data Pengunjung</h1>
      <div class="grid grid-cols-2 gap-2 md:me-64">
         <a href="/downloadPengunjung" class="bg-red-500 py-1 px-2 xl:text-sm text-[10px]  text-white rounded-md text-center">Export Pdf</a>
         <button id="toggle" class="bg-green-500  py-1 px-2 xl:text-sm text-white rounded-md text-[10px]">Export Excel </button>
      </div>
   </div>
   <div class=" sm:rounded-lg mx-5 pt-14">
      <form id="formExport" action="{{ route('exportDataPengunjung') }}" method="POST" 
      class="my-5 text-emerald-700/90" style="display: none">
      @csrf
         <div class="flex items-center space-x-4 justify-end">
            <div class="relative">
               <input name="start" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date start">
            </div>
               <span class="mx-4 text-gray-500">to</span>
            <div class="relative">
               <input name="end" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1   dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date end">
            </div>
            <div>
            <button class="bg-emerald-500 text-white py-1 px-3 rounded-md hover:bg-emerald-500/50">Export</button>
            </div>
         </div>
      </form>

      <div class="w-full rounded-sm shadow-sm border">
         <table class="w-full text-sm text-left rtl:text-right text-gray-500 overflow-x-auto mx-auto">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
               <tr>
                     <th scope="col" class="px-6 py-3">
                        No
                     </th>
                     <th scope="col" class="px-6 py-3">
                        Nama
                     </th>
                     <th scope="col" class="px-6 py-3">
                        Tanggal   
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
                     {{ \Carbon\Carbon::parse($item->created_at)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
                  </td>
                  <td scope="row" class="px-6 py-4 text-gray-600 whitespace-nowrap">
                        <a href="/dataPengunjung/{{ $item->id }}" class="text-white bg-blue-400 px-5 py-1 rounded-lg me-3" >Detail</a>
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