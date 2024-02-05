<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Status Pelayanan</title>
</head>
<body>
    <section class="bg-emerald-500 h-screen flex justify-center items-center">
        <div class="bg-white shadow-md rounded-lg p-6 m-4 w-[500px]">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center justify-center">
                    <img src="{{ asset('img/2.png') }}" alt="User Avatar" class="w-10 h-10 rounded-full mr-4">
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border border-collapse">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 border">
                                Nama
                            </th>
                            <th scope="col" class="px-6 py-3 border">
                                Status Pelayanan
                            </th>
                            <th scope="col" class="px-6 py-3 border">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pelayananId as $item)
                            <tr class="border">
                                <td class="whitespace-nowrap px-6 py-4 border">{{ $item->pengunjung->nama }}</td>
                                <td class="px-8 py-4 border flex justify-center text-center">
                                    @if ($item->status == 0)
                                        <span class="text-white px-2 py-1 rounded-md w-full  bg-red-500 whitespace-nowrap">Menunggu</span>
                                    @elseif ($item->status == 1)
                                        <span class="text-white px-2 py-1 rounded-md w-full  bg-amber-300 whitespace-nowrap">Sedang diproses</span>
                                    @elseif ($item->status == 2)
                                        <span class="text-white px-2 py-1 rounded-md w-full  bg-emerald-500 whitespace-nowrap">Selesai</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 border"><a href="#" class="text-blue-500 hover:underline">Lihat</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="flex mt-4">
                <a href="/" class="flex items-center justify-center bg-blue-500 text-white py-2 px-4 rounded-md mr-4">
                    Kembali
                </a>
            </div>
        </div>
    </section>
     
</body>
</html>