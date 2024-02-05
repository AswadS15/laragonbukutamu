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
               <form action="ubah/{{$item->id}}" method="POST" class="flex gap-2">
                  @csrf
                  <select id="respon" name="respon" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                     <option selected="false" disabled="disabled">United States</option>
                     <option value="1">Berada ditempat</option>
                     <option value="2">Tidak berada ditempat, akan diwakilkan oleh staff PKH</option>
                   </select>
                   <button type="submit">
                     <span class="p-1 rounded-md text-white hover:bg-opacity-50 bg-emerald-400">kirim</span>
                  </button>
               </form>
            {{-- <a href="{{ url('change-status/'.$item->id) }}" onclick="return confirm('Apakah anda yakin ingin mengubah status pelayanan ini?')"
               class="px-2 py-1 bg-yellow-500 backdrop-opacity-5 text-white rounded hover:bg-yellow-600 transition duration-300 truncate">Menunggu respon anda</a> --}}
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