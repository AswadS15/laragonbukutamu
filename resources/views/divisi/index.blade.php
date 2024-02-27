@extends('componen.app')
@section('isi')
<div class="  h-screen sm:ml-64 bg-white  overflow-auto py-5 pt-16 ">
   <div class=" text-2xl text-emerald-700 font-bold bg-white  fixed z-10 top-16 w-full border-b">
      <h1 class="p-4">Data Divisi</h1>
    </div>
    <div class="  sm:rounded-lg mx-5 pt-20">
       <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5 ">
          <table class="w-full text-sm text-left rtl:text-right text-gray-500">
             <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                      <th scope="col" class="px-6 py-3">
                         No
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
                @foreach ($divisi as $item)
                <tr class="bg-white border-b hover:bg-gray-50">
                   <td scope="row" class="px-6 py-4 font-semibold text-gray-900 whitespace-nowrap">
                      {{ $loop->iteration }}
                   </td>
                   <td scope="row" class="px-6 py-4 font-semibold text-gray-900 whitespace-nowrap">
                      {{ $item->divisi_type }}
                   </td>
                   <td scope="row" class="px-6 py-4 font-semibold text-gray-900 whitespace-nowrap">
                      <div class="flex ">
                         <form action="{{route('divisi.destroy', $item->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="text-white bg-red-400 px-5 py-1 rounded-lg me-3"
                               onclick="return confirm('Apakah anda yakin ingin menghapus Data Pengunjung ini ?')">Delete</button>
                      </form>
                      </div>
                   </td>  
                </tr>     
                @endforeach
             </tbody>
          </table>
       </div>
    </div>
</div>  
@endsection