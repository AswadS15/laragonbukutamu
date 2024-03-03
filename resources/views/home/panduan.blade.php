<section class="bg-emerald-700">  
        <div class="container mx-auto grid-cols-3 xl:grid-cols-5 grid gap-5 font-mosrat place-content-center py-5">
            @foreach ($users as $user)
                <div class="cols-span-1 bg-white max-w-sm rounded-md shadow-md border py-3 group capitalize">
                    <h3 class="text-center text-emerald-700 font-bold text-base">{{$user->role}}</h3>
                    <div class="py-2 flex gap-2 justify-center items-center text-xs">
                        @if ($user->photo)
                            <div class="h-8 w-8 rounded-full bg-cover bg-center" style="background-image: url({{ asset('storage/public/profile/'. $user->photo) }})">
                            </div>
                        @else
                            <img src="{{ asset('img/profil.png') }}" alt="Profile" class="h-8 w-8">
                        @endif
                        <div>
                            <p class="font-semibold text-black/70">{{$user->name}}</p>
                            @if ($user->id_divisi != 0)
                                <p class=" text-black/70">{{$user->divisi->divisi_type}}</p>
                            @else
                                <p class=" text-black/70">{{$user->role}}</p>
                            @endif
                        </div>
                    </div>
                    <div class="flex justify-center items-center gap-1 text-xs">
                        @if ($user->status != 'online')
                           <span class="h-2 w-2 rounded-full bg-gray-400 group-hover:bg-gray-300 block"></span>
                           <span class="text-gray-400 group-hover:text-gray-300">{{$user->status}}</span>
                        @else
                           <span class="h-2 w-2 rounded-full bg-emerald-400 block"></span>
                           <span class="text-emerald-400 group-hover:text-emerald-300">{{$user->status}}</span>
                        @endif
                    </div>
                </div>    
            @endforeach
        </div>
    <div class="container  mx-auto py-24">
        <h3 class="text-center font-mosrat font-semibold text-3xl text-white">PANDUAN</h3>
        <div class="grid md:grid-cols-3 gap-3 py-5">
            <div id="panduan1" class="cols-span-1 bg-white px-3 rounded-sm border shadow-md group cursor-pointer h-[280px]">
                <h3 class="text-center font-semibold text-lg pt-3 text-gray-500">Form Layanan</h3>
                <div class="flex flex-col justify-between h-[230px]">
                    <img src="{{ asset('img/formlayanan.png') }}" class="my-3 border shadow-md" alt="">
                    <p class="text-emerald-600 text-xs group-hover:text-emerald-500 group-hover:text-[13px] transition-all text-center">Click untuk melihat detail panduan </p>
                </div>
            </div>
            <div id="panduan2" class="cols-span-1 bg-white px-3 rounded-sm border shadow-md group cursor-pointer h-[280px]">
                <h3 class="text-center font-semibold text-lg pt-3 text-gray-500">Lihat Layanan</h3>
                <div class="flex flex-col justify-between h-[230px]">
                    <img src="{{ asset('img/lihatlayanan.png') }}" class="my-3 border shadow-md" alt="">
                    <p class="text-emerald-600 text-xs group-hover:text-emerald-500 group-hover:text-[13px] transition-all text-center">Click untuk melihat detail panduan </p>
                </div>
            </div>
            <div id="panduan3" class="cols-span-1 bg-white px-3 rounded-sm border shadow-md group cursor-pointer h-[280px]">
                <h3 class="text-center font-semibold text-lg pt-3 text-gray-500">Ulasan</h3>
                <div class="flex flex-col justify-between h-[230px]">
                    <img src="{{ asset('img/ulasan.png') }}" class="my-3 border shadow-md" alt="">
                    <p class="text-emerald-600 text-xs group-hover:text-emerald-500 group-hover:text-[13px] transition-all text-center">Click untuk melihat detail panduan </p>
                </div>
            </div>
        </div>
    </div>
</section>