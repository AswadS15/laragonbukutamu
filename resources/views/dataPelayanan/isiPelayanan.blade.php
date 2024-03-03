<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Detail Pelayanan</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.pre').click(function () {
                // Dapatkan sumber gambar dari elemen yang diklik
                var imageSrc = $(this).find('img').attr('src');

                // Setel sumber gambar modal secara dinamis
                $('#imageModal').attr('src', imageSrc);

                var imageId = $(this).data('id');
                $('#download').attr('href', '/downloadImg/' + imageId);
            
                // Tampilkan modal
                $('#buka').removeClass('hidden').addClass('flex');
            });
            

            // Tangani acara klik tombol tutup
            $('#btnClose').click(function () {
                // Sembunyikan modal
                $('#buka').removeClass('flex').addClass('hidden');
            });
        });
    </script>
</head>
<body class="font-popins">
    {{-- DETAIL PREVIEW --}}
    <div id="buka"  class="fixed inset-0 z-[1000] hidden bg-black bg-opacity-90 items-center justify-center">
        <div class=" absolute top-14 right-14 flex gap-5">
            <div class="flex items-center justify-center gap-4">
                <a id="download" href="" class="text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5 opacity-50 hover:opacity-100"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg>
                </a>
                <button id="btnClose" class="text-white group mb-1">
                    <span class="text-3xl font-bold opacity-50 group-hover:opacity-100 transition-all">x</span>
                </button>
            </div>
        </div>
        <img src="" id="imageModal" class="w-1/3" alt="">
    </div>

{{-- END DETAIL PREVIEW --}}
    <section class="bg-emerald-500 h-screen flex justify-center items-center">
        <div class="bg-white shadow-md rounded-lg p-6 w-[500px]">
            <div class="flex items-center justify-between border-b pb-3">
                <div class="flex items-center">
                    <img src="{{ asset('img/2.png') }}" alt="User Avatar" class="w-10 h-10 rounded-full mr-4">
                    <h1 class="text-emerald-700/70 text-xl">Detail Layanan</h1>
                </div>
                @if ($tujuan->status == 0)
                    <p class="p-1 text-xs  bg-red-500 text-white rounded-md">Belum dilihat</p>                   
                @endif
                @if ($tujuan->status == 1)
                    <p class="p-1 text-xs  bg-emerald-500/70 text-white rounded-md">Dilihat</p>                   
                @endif

            </div>
            <div class="overflow-y-auto ">
                <div class=" flex flex-col gap-2 text-base mt-2 ">
                    <div class="flex justify-between items-center">
                        <h3 class="font-semibold opacity-70">{{$tujuan->pengunjung->nama}}</h3>
                        <p class="text-xs">{{$tujuan->created_at->diffForHumans()}}</p>
                    </div>
                    <p>{{$tujuan->tujuan}}</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 overflow-scroll mt-5 h-[245px] p-3 bg-slate-100  border rounded-md">
                    @foreach ($tujuan->dokumentasis as $item)
                    <div class="pre col-span-1" data-id="{{$item->id}}">
                        <img class="object-cover w-[320px] h-[120px]" src="{{ asset('storage/dokumentasi/'. $item->gambar) }}" alt="">
                    </div>
                    @endforeach
                    
                </div>
                <div class="flex mt-4">
                    <form action="/showPelayanan" method="POST">
                        @csrf
                            <input value="{{$tujuan->pengunjung->hp}}" type="text"id="hp" name="hp" aria-describedby="helper-text-explanation" hidden>
                            <button type="submit" class="text-white bg-emerald-400 p-2
                            text-lg hover:bg-emerald-200 hover:text-emerald-700 text-center font-popins rounded-md transition-all">Kembali</button>                
                    </form>
                </div>
            </div>
        </div>
    </section>
  
</body>
</html>