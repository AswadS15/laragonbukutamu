<section id="permintaan" class= "h-72 bg-fixed ">
    <div class="bg-emerald-700 absolute h-72 w-full bg-opacity-30">
        <div class="container mx-auto pt-20">   
            <form class="max-w-sm mx-auto" action="/showPelayanan" method="POST">
                @csrf
                <h1 class="text-center text-2xl text-white font-popins font-semibold pb-5">Lihat Layanan Anda</h1>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 top-0 flex items-center ps-3.5 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 19 18">
                        <path d="M18 13.446a3.02 3.02 0 0 0-.946-1.985l-1.4-1.4a3.054 3.054 0 0 0-4.218 0l-.7.7a.983.983 0 0 1-1.39 0l-2.1-2.1a.983.983 0 0 1 0-1.389l.7-.7a2.98 2.98 0 0 0 0-4.217l-1.4-1.4a2.824 2.824 0 0 0-4.218 0c-3.619 3.619-3 8.229 1.752 12.979C6.785 16.639 9.45 18 11.912 18a7.175 7.175 0 0 0 5.139-2.325A2.9 2.9 0 0 0 18 13.446Z"/>
                    </svg>
                </div>
                <input type="text" id="hp" name="hp" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-emerald-500 focus:border-emerald-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-emerald-500 dark:focus:border-emerald-500" placeholder="08" required>
            </div>
            <div class="flex justify-center">
                <button type="submit" class="col-span-1  mt-6 bg-emerald-400 text-center w-1/3 mx-auto py-1 rounded-md hover:bg-emerald-200 hover:text-emerald-700 transition-all text-white text-lg">Lihat</button>      
            </div>             
            </form>
        </div>       
    </div>
</section>