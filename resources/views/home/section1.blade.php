<section class= "xl:h-[635px] md:h-[450px] h-[450px]  bg-fixed"  id="top">
    <div class="bg-emerald-700 absolute xl:h-[635px] md:h-[450px] h-[450px] w-full bg-opacity-30">
        <div class="container mx-auto">
            <div class="py-8 mx-auto max-w-screen-xl pt-20">
                <div class="mx-10 mb-8 lg:mb-5 md:text-center place-content-center pt-16 md:pt-10">
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
                <div class=" md:grid-cols-2 xl:grid-cols-5 hidden md:grid md:grid-rows-none gap-5 font-mosrat ">
                    @foreach ($users as $user)
                        <div class="cols-span-1 bg-white max-w-sm rounded-md shadow-md border py-3 group capitalize">
                            <h3 class="text-center text-emerald-700 font-bold text-base">{{$user->role}}</h3>
                            <div class="py-2 flex gap-2 justify-center items-center text-xs">
                                @if ($user->photo)
                                    <div class="h-8 w-8 rounded-full bg-cover bg-center" style="background-image: url({{ asset('storage/profile/'. $user->photo) }})">
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
            </div>
        </div>
    </div>
</section>