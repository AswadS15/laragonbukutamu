@extends('componen.app')
@section('titel')
    Data Pelayanan
@endsection
@section('isi')
<div class="h-full sm:ml-64 bg-white pt-24 ">
   <div class=" flex justify-between p-4  text-2xl text-emerald-700 font-bold bg-white  fixed z-10 top-16 w-full border-b">
      <h1>Data Pelayanan</h1>
      <div class="grid grid-cols-1 md:me-64">
         <a href="/downloadPelayanan" class="bg-red-500 py-1 px-2 xl:text-sm text-[10px]  text-white rounded-md">Export Pdf</a>
      </div>
   </div>
   <div class=" sm:rounded-lg mx-5 pt-14">
      <div class="w-full rounded-sm shadow-sm border">
         <table class="w-full text-sm text-left rtl:text-right text-gray-500 overflow-x-auto">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
               <tr>
                     <th scope="col" class="px-6 py-3">
                        No
                     </th>
                     <th scope="col" class="px-6 py-3 ">
                        Nama
                     </th>
                     <th scope="col" class="px-6 py-3 ">
                        Divisi
                     </th>
                     <th scope="col" class="px-6 py-3 ">
                        Status Layanan
                     </th>
                     <th scope="col" class="px-6 py-3">
                        Tanggal
                     </th>
                     <th scope="col" class="px-6 py-3">
                        Aksi  
                     </th>
               </tr>
            </thead>
            @if (auth()->user()->id_divisi)
               <tbody>
                  @foreach ($tujuan as $key => $item)
                  <tr class="bg-white border-b hover:bg-gray-50 font-popins capitalize text-gray-900">
                     <td scope="row" class="px-6 py-4   whitespace-nowrap">
                        {{ $tujuan->firstItem() + $key }}
                     </td>
                     <td scope="row" class="px-6 py-4   whitespace-nowrap ">
                        {{ $item->pengunjung->nama }}
                     </td>
                     <td scope="row" class="px-6 py-4   whitespace-nowrap ">
                        {{ $item->divisi->divisi_type }}
                     </td>
                     <td scope="row" class="px-6 py-4   whitespace-nowrap ">
                        @if ($item->status == 0)
                           <span class="truncate px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition duration-300">Belum dilihat</span>
                        @endif

                        @if ($item->status == 1)
                           <span class="truncate px-2 py-1 bg-green-500 text-white rounded hover:bg-green-600 transition duration-300">Dilihat</span>
                        @endif
                     </td>
                     <td scope="row" class="px-6 py-4   whitespace-nowrap">{{ $item->created_at->locale('id')->isoFormat('dddd, DD MMMM YYYY') }}</td>
                     
                     <td scope="row" class="px-6 py-4   whitespace-nowrap">
                        <div class="flex ">
                           <a href="/dataPelayanan/{{ $item->id }}" class="text-white bg-blue-400 px-4 py-2 rounded-md mr-3">Lihat</a>
                           <form action="{{ route('dataPelayanan.destroy', $item->id) }}" method="post">
                              @csrf
                              @method('delete')
                              <button type="submit" class="text-white bg-red-400 px-4 py-2 rounded-md"
                                    onclick="return confirm('Apakah anda yakin ingin menghapus Data Pelayanan ini ?')">Delete</button>
                           </form>
                        </div>
                     </td>   
                  </tr>     
                  @endforeach
               </tbody>
            @endif
            @if (auth()->user()->id_divisi == null)
            <tbody>
               @foreach ($tujuan as $key => $item)
                  <tr class="bg-white border-b hover:bg-gray-50 font-popins capitalize text-gray-900">
                     <td scope="row" class="px-6 py-4   whitespace-nowrap">
                        {{ $tujuan->firstItem() + $key }}
                     </td>
                     <td scope="row" class="px-6 py-4   whitespace-nowrap ">
                        {{ $item->pengunjung->nama }}
                     </td>
                     <td scope="row" class="px-6 py-4   whitespace-nowrap ">
                        {{ $item->divisi->divisi_type }}
                     </td>
                     <td scope="row" class="px-6 py-4   whitespace-nowrap ">
                        @if ($item->status == 0)
                           <span class="truncate px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition duration-300">Belum dilihat</span>
                        @endif
                        @if ($item->status == 1)
                           <span class="px-2 py-1 bg-green-500 text-white rounded hover:bg-green-600 transition duration-300">Dilihat</span>
                        @endif
                     </td>               
                     <td scope="row" class="px-6 py-4 whitespace-nowrap">{{ Str::ucfirst($item->created_at->locale('id')->isoFormat('dddd, DD MMMM YYYY')) }}</td>
                     <td scope="row" class="px-6 py-4 whitespace-nowrap">
                        <div class="flex ">
                           <a href="/dataPelayanan/{{ $item->id }}" class="text-white bg-blue-400 px-4 py-2 rounded-md mr-3">Lihat</a>
                           <form action="{{ route('dataPelayanan.destroy', $item->id) }}" method="post">
                              @csrf
                              @method('delete')
                              <button type="submit" class="text-white bg-red-400 px-4 py-2 rounded-md"
                                    onclick="return confirm('Apakah anda yakin ingin menghapus Data Pelayanan ini ?')">Delete</button>
                           </form>
                        </div>
                     </td>
                     
                  </tr>     
               @endforeach
            </tbody>
            @endif
         </table>
      </div>
   </div>
   <div class="p-5">{{ $tujuan->links() }}</div>   
</div> 




@endsection