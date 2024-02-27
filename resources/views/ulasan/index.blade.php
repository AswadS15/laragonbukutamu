<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Ulasan</title>
</head>
<body>
    <section class="bg-emerald-500 h-screen flex justify-center items-center">
        <div class=" bg-gray-100 px-20 py-10 rounded-3xl shadow-md flex-row justify-center">
            <div class="flex justify-center ">
                <img src="{{ asset('/img/2.png') }}" width="100px" alt="Logo BPKHTL">
            </div>
            <h1 class="pt-2 font-Rubik font-semibold text-4xl text-center">ULASAN</h1>
            <div class="mt-6">
                <form action="/showulasan" method="POST" class="max-w-sm mx-auto">
                    @csrf
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 top-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 19 18">
                                <path d="M18 13.446a3.02 3.02 0 0 0-.946-1.985l-1.4-1.4a3.054 3.054 0 0 0-4.218 0l-.7.7a.983.983 0 0 1-1.39 0l-2.1-2.1a.983.983 0 0 1 0-1.389l.7-.7a2.98 2.98 0 0 0 0-4.217l-1.4-1.4a2.824 2.824 0 0 0-4.218 0c-3.619 3.619-3 8.229 1.752 12.979C6.785 16.639 9.45 18 11.912 18a7.175 7.175 0 0 0 5.139-2.325A2.9 2.9 0 0 0 18 13.446Z"/>
                            </svg>
                        </div>
                        <input type="text" id="phone-input" name="hp" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-emerald-500 focus:border-emerald-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-emerald-500 dark:focus:border-emerald-500" placeholder="08" required>
                    </div>
                    <p id="helper-text-explanation" class=" font-popins font-normal mt-4 text-sm text-gray-500 text-center dark:text-gray-400">Masukan nomor handphone yang telah anda masukan sebelumnya!</p>
                    <div class="flex justify-center mt-5">

                        <input class="font-popins font-semibold text-sm px-5 py-2 text-gray-600 rounded-md bg-emerald-400 hover:bg-emerald-500 hover:ring-4 hover:ring-emerald-400 hover:text-white" type="submit" value="Submit"
                                style="margin-top: 30px; padding: 8px 20px;">
                        {{-- <button class="font-popins font-semibold text-sm px-5 py-2 text-gray-600 rounded-md bg-emerald-400 hover:bg-emerald-500 hover:ring-4 hover:ring-emerald-400 hover:text-white">Masuk</button> --}}
                    </div>
                </form>
            </div>       
        </div>
    </section>
</body>
</html>