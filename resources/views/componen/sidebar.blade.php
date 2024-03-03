<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-16 transition-transform -translate-x-full   sm:translate-x-0 " aria-label="Sidebar">
    <div class="h-full ps pb-4 overflow-y-auto bg-emerald-700">
        <div class="  shadow-lg rounded-b-xl b bg-emerald-600 opacity-50 pb-1 pt-3 ">
            <p class="uppercase text-base text-center  text-white font-mosrat font-semibold ">Utama</p>
        </div>
        
        <ul class="space-y-2 font-medium ps-3 pt-3">
            <li >
                <a href="/dashboard" class="{{ Str::startsWith(request()->path(), 'dashboard')  ? 'active' : '' }} {{ Str::startsWith(request()->path(), 'dashboard') ? '' : 'text-white' }} {{ Str::startsWith(request()->path(),'dashboard') ? '' : 'opacity-75' }} flex items-center p-2 rounded-s-lg hover:bg-white group transition-all hover:ms-5 hover:opacity-100 ">
                    <svg class=" w-5 h-5  transition-all duration-75 group-hover:text-emerald-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                        <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                        </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap text-xl font-semibold group-hover:text-emerald-700 transition-all">Dashboard</span>
                </a>
            </li> 
            @if (auth()->user()->role == 'admin' || auth()->user()->role == 'pimpinan')
            <li >
                <a href="/dataPengunjung" class="{{ Str::startsWith(request()->path(), 'dataPengunjung')  ? 'active' : '' }} {{ Str::startsWith(request()->path(), 'dataPengunjung') ? '' : 'text-white' }} {{ Str::startsWith(request()->path(),'dataPengunjung') ? '' : 'opacity-75' }} flex items-center p-2 rounded-s-lg hover:bg-white group transition-all hover:ms-5 hover:opacity-100">
                    <svg class=" group-hover:text-emerald-700 h-5 w-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                    <span class="flex-1 ms-3 whitespace-nowrap text-xl font-semibold group-hover:text-emerald-700 transition-all">Data Pengunjung</span>
                </a>
            </li>           
            @endif

            @if (auth()->user()->role == 'admin' || auth()->user()->role == 'kepala divisi' || auth()->user()->role == 'pimpinan')
            <li class="relative group">
                <a href="/dataPelayanan" class="{{ Str::startsWith(request()->path(), 'dataPelayanan')  ? 'active' : '' }} {{ Str::startsWith(request()->path(), 'dataPelayanan') ? '' : 'text-white' }} {{ Str::startsWith(request()->path(),'dataPelayanan') ? '' : 'opacity-75' }} flex items-center p-2  rounded-s-lg group-hover:bg-white group transition-all group-hover:ms-5  group-hover:opacity-100">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="group-hover:text-emerald-700 h-5 w-5" fill="currentColor"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M96 0C43 0 0 43 0 96V416c0 53 43 96 96 96H384h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V384c17.7 0 32-14.3 32-32V32c0-17.7-14.3-32-32-32H384 96zm0 384H352v64H96c-17.7 0-32-14.3-32-32s14.3-32 32-32zm32-240c0-8.8 7.2-16 16-16H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16zm16 48H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg>
                    <span class="flex-1 ms-3 whitespace-nowrap text-xl font-semibold group-hover:text-emerald-700 transition-all">Data Layanan</span>
                </a>
                @if ($belum >= 1)
                    <div class=" bg-red-500 w-5 h-5 flex justify-center items-center text-white absolute top-0 translate-y-1/2 group-hover:right-4 transition-all rounded-full text-xs {{ Str::startsWith(request()->path(), 'dataPelayanan') ? 'right-4' : '' }} {{ !Str::startsWith(request()->path(), 'dataPelayanan') ? 'right-8' : '' }}">
                        <span>{{$belum}}</span>
                    </div>
                @endif
            </li>             
            @endif
        </ul>
        @if (auth()->user()->role == 'admin') 
        <div class=" mt-5 opacity-50 py-2 shadow-lg rounded-lg bg-emerald-600 ">
            <p class="uppercase text-base text-center  text-white font-mosrat font-semibold ">Pengguna</p>
        </div>

        <ul class="space-y-2 font-medium ps-3 mt-3">  
            @if (auth()->user()->role == 'admin')              
            <li>
                <a href="/users" class="{{ Str::startsWith(request()->path(), 'users')  ? 'active' : '' }} {{ Str::startsWith(request()->path(), 'users') ? '' : 'text-white' }} {{ Str::startsWith(request()->path(),'users') ? '' : 'opacity-75' }} flex items-center p-2 hover:bg-white hover:ms-5 transition-all  group rounded-s-lg  hover:opacity-100">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="group-hover:text-emerald-700 h-5 w-5" fill="currentColor"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM609.3 512H471.4c5.4-9.4 8.6-20.3 8.6-32v-8c0-60.7-27.1-115.2-69.8-151.8c2.4-.1 4.7-.2 7.1-.2h61.4C567.8 320 640 392.2 640 481.3c0 17-13.8 30.7-30.7 30.7zM432 256c-31 0-59-12.6-79.3-32.9C372.4 196.5 384 163.6 384 128c0-26.8-6.6-52.1-18.3-74.3C384.3 40.1 407.2 32 432 32c61.9 0 112 50.1 112 112s-50.1 112-112 112z"/></svg>
                    <span class="flex-1 ms-3 whitespace-nowrap text-xl font-semibold group-hover:text-emerald-700 transition-all">Users</span>
                 </a>
            </li>
            @endif
        </ul>
        @endif
    </div>
</aside>    
