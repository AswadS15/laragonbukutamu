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