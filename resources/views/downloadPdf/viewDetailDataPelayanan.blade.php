<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelayanan</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ffffff;
        }

        .container {
            max-width: 100%;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
            background-color: #ffffff;
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }

        .content {
            margin-bottom: 20px;
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 5px;
        }

        .flex-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .button-container {
            display: flex;
        }

        .button-container a {
            margin-right: 10px;
            text-decoration: none;
        }

        .button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .image-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .image-container img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

       table, th, td {
            border: 1px solid #ddd;
        } 

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        } 

        .button-return {
            text-align: center;
            margin-top: 20px;
        }

        .button-return button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #top{
            
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="content">
            <div>
                <h1 style="text-align: center">Detail Data Pelayanan</h1>
            </div>
            <div class="image-container">
                @if ($tujuan->gambar)
                    <img src="{{ asset('/img/pengunjung/'. $tujuan->gambar) }}" width="400px" alt="dokumentasi">
                @else
                    <p class="text-2xl text-gray-400 dark:text-gray-500">Dokumentasi Kosong</p>

                @endif
            </div>
            <table class="w-full text-left rtl:text-right text-gray-500 mt-5 text-lg md:text-xl">
                <tr class="bg-white border-b">
                    <th scope="row" class="px-4 py-2 text-gray-900 font-semibold">
                        Nama Tamu
                    </th>
                    <td class="px-4 py-2">
                        :
                    </td>
                    <td class="px-4 py-2">
                        {{ Str::ucfirst($tujuan->pengunjung->nama) }}
                    </td>
                </tr>
                <tr class="bg-white border-b">
                    <th scope="row" class="px-4 py-2 text-gray-900 font-semibold">
                        Status Pelayanan
                    </th>
                    <td class="px-4 py-2">
                        :
                    </td>
                    @if ($tujuan->status != 0)
                    <td class="px-4 py-2">
                        Sudah Dilayani
                    </td>     
                        
                    @else
                    <td class="px-4 py-2">
                        Belum Dilayani
                    </td>
                        
                    @endif
              
                </tr>
                <tr class="bg-white border-b">
                    <th scope="row" class="px-4 py-2 text-gray-900 font-semibold">
                        Tujuan
                    </th>
                    <td class="px-4 py-2">
                        :
                    </td>
                    <td class="px-4 py-2">
                        {{ Str::ucfirst($tujuan->tujuan) }}
                    </td>
                </tr>
                <tr class="bg-white border-b">
                    <th scope="row" class="px-4 py-2 text-gray-900 font-semibold">
                        Dibuat Tanggal
                    </th>
                    <td class="px-4 py-2">
                        :
                    </td>
                    <td class="px-4 py-2">
                        {{ Str::ucfirst($tujuan->created_at) }}
                    </td>
                </tr>
                <tr class="bg-white border-b">
                    <th scope="row" class="px-4 py-2 text-gray-900 font-semibold">
                        Diupdate Tanggal
                    </th>
                    <td class="px-4 py-2">
                        :
                    </td>
                    <td class="px-4 py-2">
                        {{ Str::ucfirst($tujuan->updated_at) }}
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>
