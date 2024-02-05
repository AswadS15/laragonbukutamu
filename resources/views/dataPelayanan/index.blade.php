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
            @if (auth()->user()->id_divisi == 1)  
               @include('kepaladivisi.tatausahaTujuan')
            @elseif(auth()->user()->id_divisi == 2)
               @include('kepaladivisi.isdhlTujuan')
            @elseif(auth()->user()->id_divisi == 3)
               @include('kepaladivisi.pkhTujuan') 
            @elseif(auth()->user()->role == 'admin')
            <tbody>
               @foreach ($tujuan as $key => $item)
               <tr class="bg-white border-b hover:bg-gray-50 font-popins capitalize text-gray-900">
                  <td scope="row" class="px-6 py-4   whitespace-nowrap">
                     {{ $tujuan->firstItem() + $key }}
                  </td>
                  <td scope="row" class="px-6 py-4   whitespace-nowrap ">
                     {{ $item->pengunjung->nama }}
                  </td>
                  <td class="flex justify-center mt-5">
                     @if ($item->status == 0)
                        <a href="{{ url('change-status/'.$item->id) }}" onclick="return confirm('Apakah anda yakin ingin mengubah status pelayanan ini?')"
                           class="px-2 py-1 bg-red-500 backdrop-opacity-5 text-white rounded hover:bg-red-600 transition duration-300">Belum dilayani</a>
                     @endif
                     @if ($item->status == 1)
                           {{-- <form action="ubah/{{$item->id}}" method="POST">
                              @csrf
                              <select id="country" name="country" autocomplete="country-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                 <option selected="false" disabled="disabled">United States</option>
                                 <option>Saya berada ditempat</option>
                                 <option>Saya tidak berada ditempat, sa</option>
                               </select>
                           </form> --}}
                        <a href="{{ url('change-status/'.$item->id) }}" onclick="return confirm('Apakah anda yakin ingin mengubah status pelayanan ini?')"
                           class="px-2 py-1 bg-yellow-500 backdrop-opacity-5 text-white rounded hover:bg-yellow-600 transition duration-300 truncate">Menunggu respon divisi</a>
                     @endif
                     @if ($item->status == 2)
                        <span class="px-2 py-1 bg-green-500 text-white rounded hover:bg-green-600 transition duration-300">Sudah dilayani</span>
                     @endif
                 </td>
            
                 <td scope="row" class="px-6 py-4   whitespace-nowrap max-w-[200px] truncate text-gray-600">
                  {{ $item->tujuan }}
               </td>
               
                  <td class="truncate">{{ $item->created_at }}</td>
                  
                  <td scope="row" class="px-6 py-4   whitespace-nowrap">
                     <div class="flex ">
                         <a href="/dataPelayanan/{{ $item->id }}" class="text-white bg-blue-400 px-4 py-2 rounded-md mr-3">Detail</a>
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