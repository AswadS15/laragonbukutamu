<!doctype html>
<html class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/css/costom.css', 'resources/js/app.js'])
    <link rel="stylesheet" type="text/css" href="{{ asset('https://unpkg.com/trix@2.0.8/dist/trix.css') }}">
    <script type="text/javascript" src="{{ asset('https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js') }}"></script>
    
</head>
<style>
    #permintaan {
        background-image: url('{{ asset('img/1.jpeg') }}');
        background-size: cover; /* Atur ukuran gambar latar belakang */
        background-position: center; /* Posisikan gambar latar belakang di tengah */
        /* Lainnya sesuai kebutuhan Anda */
        background-attachment: 
    }
    #top {
        background-image: url('{{ asset('img/3.jpg') }}');
        background-size: cover; /* Atur ukuran gambar latar belakang */
        background-position: center; /* Posisikan gambar latar belakang di tengah */
    }
    trix-toolbar [data-trix-button-group="file-tools"] {
        display: none;
    }
    .hidup {
        background-color: rgb(243 244 246);
        color: rgb(55 65 81 );
        border-radius: 0.25rem
    }

</style>
<body>
    @include('sweetalert::alert')
{{-- NAVBAR --}}
    <nav id="myNavbar" class=" bg-emerald-700 backdrop-blur-sm fixed w-full z-20 top-0 start-0 ">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                <span class="self-center font-mosrat text-4xl text-white font-bold whitespace-nowrap">BPKHTL-XV</span>
            </a>
            <div style="color: aliceblue" class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <a href="/login"><button type="button"  class="text-white bg-emerald-400 hover:bg-green-500 focus:ring-4 focus:outline-none focus:ring-green-600 rounded-lg text-lg font-bold px-4 py-2 text-center font-popins">Login</button></a>
                <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-sticky" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                    </svg>
                </button>
            </div>
            <div  class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0" id="menuList">
                    <li class="{{ Str::startsWith(request()->path(), '/') ? 'hidup' : '' }}">
                        <a href="#" class="block py-2 px-3  hover:bg-gray-100 rounded font-popins font-normal md:dark:text-green-500 hover:text-gray-700 md:p-1" aria-current="page">Home</a>
                    </li>
                    <li class="{{ Str::startsWith(request()->path(), '/') ? 'hidup' : '' }}">
                        <a href="#layanan" class="block py-2 px-3 hover:text-gray-700 md:p-1  rounded font-popins font-normal  hover:bg-gray-100  md:dark:hover:text-green-500 md:dark:hover:bg-transparent">Layanan</a>
                    </li>
                    <li class="{{ Str::startsWith(request()->path(), '/') ? 'hidup' : '' }}"> 
                        <a href="#about" class="block py-2 px-3 font-popins font-normal rounded hover:bg-gray-100  md:dark:hover:text-green-500 md:dark:hover:bg-transparent hover:text-gray-700 md:p-1">About</a>
                    </li>
                    {{-- <li>
                        <a href="#" class="block py-2 px-3 font-popins font-normal  text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-green-700 md:p-0 md:dark:hover:text-green-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"></a>
                    </li> --}}
                </ul>
            </div>
        </div>
    </nav>
{{-- NAVBAR --}}


{{-- SECTION 1 --}}
<section class= "xl:h-[700px] md:h-[500px] h-[500px]  bg-fixed"  id="top">
    <div class="bg-emerald-700 absolute xl:h-[700px] md:h-[500px] h-[500px] w-full bg-opacity-30">
        <div class="container mx-auto">
            <div class="py-8 md:px-40 mx-auto max-w-screen-xl pt-20 ">
                <div class="mx-10 mb-8 lg:mb-16 md:text-center place-content-center border-b pt-16 md:pt-10 pb-16">
                    <div class="flex justify-center pb-4">
                        <img src="{{ asset('/img/2.png') }}" width="100px" alt="Logo BPKHTL">
                    </div>
                    <h2 class="mb-4 text-center font-mosrat tracking-tight font-extrabold text-gray-100 xl:text-3xl md:text-xl">MATODUWOLO <br> BPKHTL WILAYAH XV GORONTALO</h2>
                    <p class="text-gray-100 sm:text-xl"></p>
                    <div class="p-8  text-3xl font-bold max-w-sm mx-auto">
                        <!-- Tampilkan waktu -->
                        <div id="digitalClock" class="text-[30px] md:text-[50px]  text-center text-white"></div>
                    </div>
                </div>
            </div>
        
            <div class="max-w-screen mx-auto px-5  hidden md:block md:mt-10 xl:-mt-10">
                <div class="grid md:grid-cols-2 xl:grid-cols-4  grid-rows-4 md:grid-rows-none gap-5 pb-28 ">
                    <div class="rounded-lg col-span-1 p-5 border shadow-md bg-gray-50">
                        <div class="flex justify-center  pb-5 border-b mb-4">
                            <h3 class="font-semibold text-xl text-center text-gray-900 border shadow-md px-3">STATISTIK PENGUNJUNG</h3>
                        </div>
                        <div class="max-w-xl ">
                            <h2 class="text-2xl font-semibold mb-6 text-center">JUMLAH</h2>
                            <div x-data="{ activeSlide: 1 }" x-init="setInterval(() => { activeSlide = (activeSlide % 3) + 1; }, 3000)" class="mt-8">
                            <div x-show="activeSlide === 1">
                                <div class="grid grid-cols-2 px-5">
                                    <div class="col-span-1">
                                        <p class="text-6xl font-bold text-center" style="color: #36a2eb">{{ $hari }}</p>
                                    </div>
                                    <div class="col-span-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 mx-auto" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                                    </div>
                                </div>  
                            </div>
                            <div x-show="activeSlide === 2">
                                <div class="grid grid-cols-2 px-5">
                                    <div class="col-span-1">
                                        <p class="text-6xl font-bold text-center" style="color: #ff6384">{{ $hari2 }}</p>
                                    </div>
                                    <div class="col-span-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 mx-auto" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                                    </div>
                                </div>   
                            </div>
                            <div x-show="activeSlide === 3">
                                <div class="grid grid-cols-2 px-5">
                                    <div class="col-span-1">
                                        <p class="text-6xl font-bold text-center" style="color: #ff9f40">{{ $hari3 }}</p>
                                    </div>
                                    <div class="col-span-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 mx-auto" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                                    </div>
                                </div>   
                            </div>
                            <div class="flex justify-center border shadow-md rounded-md mt-7">
                                <button
                                class="flex-1 bg-gray-300 hover:bg-gray-400 py-2  rounded-l-md"
                                :class="{ 'bg-gray-400': activeSlide === 1 }"
                                @click="activeSlide = 1"
                                >
                                Harian
                                </button>
                                <button
                                class="flex-1 bg-gray-300 hover:bg-gray-400 py-2"
                                :class="{ 'bg-gray-400': activeSlide === 2 }"
                                @click="activeSlide = 2"
                                >
                                Mingguan
                                </button>
                                <button
                                class="flex-1 bg-gray-300 hover:bg-gray-400 py-2 rounded-r-md"
                                :class="{ 'bg-gray-400': activeSlide === 3 }"
                                @click="activeSlide = 3"
                                >
                                Bulanan
                                </button>
                            </div>
                            </div>
                        </div>
                    </div>
        

        
                    <div class="rounded-lg col-span-1 p-5 border shadow-md bg-gray-50">
                        <div class="flex justify-center  pb-5 border-b mb-4">
                            <h3 class="font-semibold text-xl text-center text-gray-900 border shadow-md px-5">GRAFIK PENGUNJUNG</h3>
                        </div>
                        <div>
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
            
                    <div class="rounded-lg col-span-1 p-5 border shadow-md bg-gray-50">
                        <div class="flex justify-center  pb-5 border-b mb-4">
                            <h3 class="font-semibold text-xl text-center text-gray-900 border shadow-md px-5">STATISTIK ULASAN</h3>
                        </div>
                        <div class="max-w-xl ">
                            <h2 class="text-2xl font-semibold mb-6 text-center">JUMLAH</h2>
                            <div x-data="{ activeSlide: 1 }" x-init="setInterval(() => { activeSlide = (activeSlide % 2) + 1; }, 3000)" class="mt-8">
                            <div x-show="activeSlide === 1">
                                <div class="grid grid-cols-2">
                                    <div class="col-span-1">
                                        <p class="text-6xl font-bold text-center" style="color: #36a2eb">{{ $puas }}</p>
                                    </div>
                                    <div class="col-span-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 mx-auto" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                                    </div>
                                </div>  
                            </div>
                            <div x-show="activeSlide === 2">
                                <div class="grid grid-cols-2 ">
                                    <div class="col-span-1">
                                        <p class="text-6xl font-bold text-center" style="color: #ff6384">{{ $tidakpuas }}</p>
                                    </div>
                                    <div class="col-span-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 mx-auto" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                                    </div>
                                </div>   
                            </div>
                            <div class="flex justify-center border shadow-md rounded-md mt-7">
                                <button
                                class="flex-1 bg-gray-300 hover:bg-gray-400 py-2  rounded-l-md"
                                :class="{ 'bg-gray-400': activeSlide === 1 }"
                                @click="activeSlide = 1"
                                >
                                Puas
                                </button>
                                <button
                                class="flex-1 bg-gray-300 hover:bg-gray-400 py-2  rounded-r-md"
                                :class="{ 'bg-gray-400': activeSlide === 2 }"
                                @click="activeSlide = 2"
                                >
                                Kurang Puas
                                </button>
                            </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="rounded-lg col-span-1 p-5 border shadow-md bg-gray-50">
                        <div class="flex justify-center  pb-5 border-b mb-4">
                            <h3 class="font-semibold text-xl text-center text-gray-900 border shadow-md px-5">GRAFIK ULASAN</h3>
                        </div>
                        <div>
                            <canvas id="ulasan"></canvas>
                        </div>
                        
                    </div>
        
                </div>
            </div>
        </div>
    </div>
</section>
{{-- END SECTION 1 --}} 

{{-- SECTION 2 --}}
<section id="layanan" class="pb-24 pt-32 xl:mt-56 md:mt-[900px]  bg-white"  >
    <div class="bg-gray-100 max-w-2xl mx-auto p-5 rounded-lg">
        <h3 class="text-center font-mosrat font-semibold text-3xl text-emerald-700 pb-10">LAYANAN</h3>
        <form class="max-w-xl mx-auto" method="post" action="/#layanan">
            @csrf
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="nama" id="nama" class="font-popins font-normal block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer" placeholder=" " required value="{{ old('nama') }}"/>
                    <label for="nama" class=" font-popins font-normal peer-focus:font-medium absolute text-lg text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-green-600 peer-focus:dark:text-green-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama</label>
                    
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="instansi" id="instansi" class=" font-popins font-normal block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer" placeholder=" " required value="{{ old('instansi') }}"/>
                    <label for="instansi" class=" font-popins font-normal peer-focus:font-medium absolute text-lg text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-green-600 peer-focus:dark:text-green-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Instasi/Kelompok Masyrakat</label>
                </div>
            </div>
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 w-full mb-5 group">
                    <input type="tel" name="alamat" id="alamat" class=" font-popins font-normal block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer" placeholder=" " required  value="{{ old('alamat') }}"/>
                    <label for="alamat" class=" font-popins font-normal peer-focus:font-medium absolute text-lg text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-green-600 peer-focus:dark:text-green-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Alamat</label>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <input type="text" name="hp" id="hp" class=" font-popins font-normal block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer" placeholder=" " required  value="{{ old('hp') }}"/>
                    <label for="hp" class=" font-popins font-normal peer-focus:font-medium absolute text-lg text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-green-600 peer-focus:dark:text-green-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">No. Handphone</label>
                </div>
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <input type="text" name="email" id="email" class=" font-popins font-normal block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer" placeholder=" " required  value="{{ old('email') }}"/>
                <label for="email" class=" font-popins font-normal peer-focus:font-medium absolute text-lg text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-green-600 peer-focus:dark:text-green-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
            </div>
            <label for="divisi" class=" font-popins font-normal block mb-2 text-lg text-gray-500">Pilih divisi</label>
            <select id="divisi" name="divisi" class="bg-gray-50 border border-gray-300 text-gray-500 text-lg rounded-lg focus:ring-green-600 focus:border-green-500 block w-full p-2.5" value="{{ old('divisi') }}">
                <option selected="false" disabled="disabled" class="font-popins font-normal">Pilih Divisi</option>
                @foreach ($divisi as $item)
                    @if(old('divisi') == $item->id)
                    <option class="font-popins font-normal" value="{{ $item->id }}" selected>{{ $item->divisi_type }}</option>
                    @else  
                    <option class="font-popins font-normal" value="{{ $item->id }}">{{ $item->divisi_type }}</option>
                    @endif 
                @endforeach      
            </select>
                {{-- <label for="tujuan"  class="block mb-2 text-lg font-medium text-gray-500">Masukan tujuan Anda</label>
                <textarea id="tujuan" name="tujuan" rows="4" class="block p-2.5 w-full text-lg text-gray-500 bg-gray-50 rounded-lg border border-gray-300 focus:ring-green-600 focus:border-green-600" placeholder="Apa tujuan anda..."></textarea> --}}
                <label for="tujuan"  class="block mb-2 mt-5 text-lg font-medium text-gray-500">Masukan tujuan Anda</label>
                <input id="tujuan"  type="hidden" name="tujuan">
                <trix-editor input="tujuan"></trix-editor>
                
            <button type="submit" class=" mt-3 px-5 py-2 text-sm font-semibold hover:text-white font-popins text-center text-white bg-emerald-500 rounded-lg hover:bg-green-500 focus:ring-4 focus:outline-none focus:ring-emerald-300 dark:bg-emerald-600 dark:hover:bg-emerald-400 dark:focus:ring-emerald-800">Submit</button> 
            @error('nama')
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 rounded relative" role="alert">
                            <strong class="font-bold">Error!</strong>
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
            @enderror
            @error('instansi')
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 rounded relative" role="alert">
                            <strong class="font-bold">Error!</strong>
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
            @enderror
            @error('alamat')
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 rounded relative" role="alert">
                            <strong class="font-bold">Error!</strong>
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
            @enderror
            @error('hp')
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 rounded relative" role="alert">
                            <strong class="font-bold">Error!</strong>
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
            @enderror
            @error('tujuan')
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 rounded relative" role="alert">
                            <strong class="font-bold">Error!</strong>
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
            @enderror
        </form>
    </div>
</section>
{{-- END SECTION 2 --}}

<section id="permintaan" class= "h-72 bg-fixed ">
    <div class="bg-emerald-700 absolute h-72 w-full bg-opacity-30">
        <div class="container mx-auto pt-20">   
            <form class="max-w-sm mx-auto" action="/showPelayanan" method="POST">
                @csrf
                <h1 class="text-center text-2xl text-white font-popins font-semibold pb-5">Lihat Permintaan Anda</h1>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 top-0 flex items-center ps-3.5 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 19 18">
                        <path d="M18 13.446a3.02 3.02 0 0 0-.946-1.985l-1.4-1.4a3.054 3.054 0 0 0-4.218 0l-.7.7a.983.983 0 0 1-1.39 0l-2.1-2.1a.983.983 0 0 1 0-1.389l.7-.7a2.98 2.98 0 0 0 0-4.217l-1.4-1.4a2.824 2.824 0 0 0-4.218 0c-3.619 3.619-3 8.229 1.752 12.979C6.785 16.639 9.45 18 11.912 18a7.175 7.175 0 0 0 5.139-2.325A2.9 2.9 0 0 0 18 13.446Z"/>
                    </svg>
                </div>
                <input type="text" id="hp" name="hp" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-emerald-500 focus:border-emerald-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-emerald-500 dark:focus:border-emerald-500" placeholder="08" required>
            </div>
            <div class="flex justify-center">
                <button type="submit" class=" mt-3 px-5 py-2 text-sm font-semibold hover:text-white font-popins text-center text-white bg-emerald-500 rounded-lg hover:bg-green-500 focus:ring-4 focus:outline-none focus:ring-emerald-300 dark:bg-emerald-600 dark:hover:bg-emerald-400 dark:focus:ring-emerald-800">Lihat</button>      
            </div>             
            </form>
        </div>       
    </div>
</section>
{{-- SECTION 3 --}}
<section id="about" class= "bg-emerald-700 md:pt-36 pb-10 pt-24">
    <div class="container mx-auto"> 
        <h3 class="text-white text-3xl text-center font-bold font-mosrat pb-10">ABOUT US</h3>      
        <div class="max-w-screen mx-auto px-5 grid xl:grid-cols-2 grid-cols-1 gap-10">
            <div class="col-span-1">
                <h3 class="text-white  text-xl font-semibold font-popins pb-2"> Visi</h3>
                <p class="text-white font-popins font-normal text-justify">"Terwujudnya pemantapan kawasan hutan dan penataan lingkungan hidup secara partisipatif dan berkelanjutan sebagai prakondisi pembangunan nasional" dalam mendukung:
                    Terwujudnya Keberlanjutan Sumber Daya Hutan dan Lingkungan Hidup untuk Kesejahteraan Masyarakat
                </p>       
                
                <div class="hidden xl:grid-cols-4 grid-cols-1  mt-5 xl:grid">
                    <div class="xl:col-span-3 col-span-1">
                        <h1 class=" text-2xl text-white font-semibold font-popins pb-2">Berikan Penilaian - Ulasan</h1>
                        <p class="text-white  font-popins font-normal text-justify">
                            Kritik dan Saran dapat disampaikan melalui tombol ulasan disebelah kanan Anda. Kritik dan Saran yang diberikan akan dilindungi dan kerahasiaan identitas Anda terjaga dengan baik. Berikan penilaian secara bebas tanpa paksaan. 
                        </p>
                    </div>
                    <div class="col-span-1 flex justify-center items-center mt-3">
                        <a href="/ulasan" class="py-2 px-2 ring-2 ring-emerald-300 bg-emerald-600 rounded-2xl font-semibold text-sm hover:bg-emerald-400 text-white">Berikan Ulasan</a>
                    </div>
                </div>              
            </div>  
            <div class="col-span-1">
                <h3 class="text-white text-xl font-semibold font-popins "> Misi</h3>
                <p class="text-white font-sans text-justify">Dengan memperhatikan Misi Presiden dan Wakil Presiden serta berpedoman pada tugas, fungsi dan kewenangan KLHK, sebagaimana telah di tetapkan dalam undang-undang nomor 41 tahun 1999 tentang Kehutanan dan Undang-Undang Nomor 32 Tahun 2009 tentang Perlindungan dan Pengelolaan Lingkungan Hidup serta Peraturan Presiden Nomor 16 Tahun 2015 Tentang Kementrian Lingkungan Hidup dan Kehutanan, maka misi BPKH Wilayah XV Gorontalo:
                    <br>
                    1.	Mewujudkan pemantapan Kawasan melalui Inventarisasi Hutan, Pengukuhan Kawasan hutan dan Penatagunaan Kawasan Hutan dan penyusun Rencana kehutanan dalam mendukung terwujudnya hutan yang Lestari;
                    <br>
                    2.	Mewujudkan pengendalian penggunaan Kawasan hutan dalam mendukung terwujudnya optimalisasi pemanfaatan ekonomi sumber daya hutan dan lingkungan secara berkeadilan dan berkelanjutan;
                    <br>
                    3.	Meningkatnya Tata Kelola Pemerintahan di BPKH Wilayah XV Gorontalo sesuai Kerangka Reformasi Birokrasi dalam mendukung terwujudnya tata Kelola pemerintahan yang baik.</p>
            </div> 
            <div class="grid xl:grid-cols-4 grid-cols-1  mt-5 xl:hidden">
                <div class="xl:col-span-3 col-span-1">
                    <h1 class=" text-xl text-white font-semibold font-popins pb-2">Berikan Penilaian - Ulasan</h1>
                    <p class="text-white  font-popins font-normal text-justify">
                        Kritik dan Saran dapat disampaikan melalui tombol ulasan disebelah kanan Anda. Kritik dan Saran yang diberikan akan dilindungi dan kerahasiaan identitas Anda terjaga dengan baik. Berikan penilaian secara bebas tanpa paksaan. 
                    </p>
                </div>
                <div class="col-span-1  mt-6">
                    <a href="/ulasan" class="py-2 px-2 ring-2 ring-emerald-300 bg-emerald-600 rounded-md font-semibold text-sm hover:bg-emerald-400 text-white">Berikan Ulasan</a>
                </div>
            </div>              
            
        </div>
    </div>

</section>
{{-- END SECTION 3 --}}

{{-- SECTION 4 --}}
{{-- END SECTION 4 --}}
<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>




<script>
    document.addEventListener('DOMContentLoaded', function () {
        var getDataBtn = document.getElementById('getDataBtn');

        getDataBtn.addEventListener('click', function () {
            var hp = document.getElementById('hp').value;

            fetch('/ambil/' + hp)
                .then(response => response.json())
                .then(data => {
                    // Isi formulir dengan data yang diterima dari server
                    document.getElementById('nama').value = data.nama;
                    document.getElementById('instansi').value = data.instansi;
                    document.getElementById('alamat').value = data.alamat;
                    document.getElementById('hp').value = data.hp;

                    // Tambahkan atribut readonly pada elemen formulir
                    document.getElementById('nama').readOnly = true;
                    document.getElementById('instansi').readOnly = true;
                    document.getElementById('alamat').readOnly = true;
                    document.getElementById('hp').readOnly = true;

                    // Isi placeholder dengan nilai yang diterima dari server
                    document.getElementById('nama').placeholder = data.nama;
                    document.getElementById('instansi').placeholder = data.instansi;
                    document.getElementById('alamat').placeholder = data.alamat;
                    document.getElementById('hp').placeholder = data.hp;
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        });
    });
</script>

<script>
    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    })
</script>


<script>

    // JAM
    function updateClock() {
            // Dapatkan objek Date untuk waktu saat ini
            var now = new Date();

            // Ekstrak jam, menit, dan detik dari objek Date
            var hours = now.getHours();
            var minutes = now.getMinutes();
            var seconds = now.getSeconds();

            // Format waktu dalam format 12 jam
            var ampm = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12;
            hours = hours ? hours : 12; // Jam 0 akan dianggap sebagai 12

            // Buat string waktu dalam format HH:mm:ss AM/PM
            var timeString = hours + ':' + addLeadingZero(minutes) + ':' + addLeadingZero(seconds) + ' ' + ampm;

            // Tampilkan waktu di dalam elemen dengan id "digitalClock"
            document.getElementById('digitalClock').innerText = timeString;
        }

        function addLeadingZero(number) {
            // Tambahkan nol di depan angka jika angka < 10
            return number < 10 ? '0' + number : number;
        }

        // Panggil fungsi updateClock setiap detik
        setInterval(updateClock, 1000);

        // Inisialisasi jam pada saat halaman dimuat
        updateClock();
    // GRAFIK
  const ctx1 = document.getElementById('myChart');

  new Chart(ctx1, {
    type: 'doughnut',
    data: {
      labels: ['Hari ini', 'Minggu ini', 'Bulan ini'],
      datasets: [{
          label: ['Jumlah'],
          data: [{{ $hari }}, {{ $hari2 }}, {{ $hari3 }}],
        borderWidth: 1
      }]
    },
  });

  const ctx2 = document.getElementById('ulasan');

  new Chart(ctx2, {
    type: 'doughnut',
    data: {
      labels: ['Puas', 'Kurang Puas'],
      datasets: [{
          label: ['Jumlah'],
        data: [{{ $puas }}, {{ $tidakpuas }}],
        borderWidth: 1
      }]
    },
  });

  document.addEventListener('DOMContentLoaded', function () {
    var navbar = document.getElementById('myNavbar');

    window.addEventListener('scroll', function () {
      if (window.scrollY > 50) {
        navbar.classList.add('bg-emerald-900'); // Ganti dengan warna latar belakang yang diinginkan
        navbar.classList.add('bg-opacity-80',);
       
        navbar.classList.remove('bg-emerald-700');
      } else {
        navbar.classList.add('bg-emerald-700');
        navbar.classList.remove('bg-emerald-900');
        navbar.classList.remove('bg-opacity-80');
       
      }
    });
  });




</script>

</body>

</html>