<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Layanan Anda</title>
</head>
<body>
    
    <section class="bg-emerald-500 h-screen flex justify-center items-center px-5">
        <div class="bg-white shadow-md rounded-lg p-6 m-4 w-screen md:max-w-3xl">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center justify-center">
                    <img src="{{ asset('img/2.png') }}" alt="User Avatar" class="w-10 h-10 rounded-full mr-4">
                    <h1 class="text-emerald-700/70 text-xl">Layanan Anda</h1>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border border-collapse">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 border">
                                Tujuan
                            </th>
                            <th scope="col" class="px-6 py-3 border">
                                Status Pelayanan
                            </th>
                            <th scope="col" class="px-6 py-3 border">
                                Tanggal
                            </th>
                            <th scope="col" class="px-6 py-3 border">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tujuans as $item)
                            <tr class="border">
                                <td class="whitespace-nowrap px-6 py-4 border"> {{ implode(' ', array_slice(str_word_count($item->tujuan, 2), 0, 5)) }}</td>
                                <td class="px-6 py-2 border">
                                    @if ($item->status == 0)
                                        <span class="text-white px-2 py-1 rounded-md w-full  bg-red-500 whitespace-nowrap">Belum dilihat</span>
                                    @elseif ($item->status == 1)
                                        <span class="text-white px-2 py-1 rounded-md w-full  bg-emerald-400 whitespace-nowrap">Dilihat</span>
                                    @endif
                                </td>
                                <td class="px-6 py-2 border">
                                    {{ Str::ucfirst($item->created_at->locale('id')->isoFormat('dddd, DD MMMM YYYY')) }}
                                </td>
                                <td class="px-6 py-2 border">
                                    <a href="/isiPelayanan/{{$item->id}}" class="text-blue-500 hover:underline">Lihat</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="flex mt-4">
                <a href="/" class="text-white bg-emerald-400 p-2
                    text-lg hover:bg-emerald-200 hover:text-emerald-700 text-center font-popins rounded-md transition-all">
                        Kembali
                    </a>
            </div>
        </div>
    </section>
     
</body>
</html>