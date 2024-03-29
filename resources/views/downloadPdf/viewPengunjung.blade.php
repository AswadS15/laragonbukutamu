<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pengunjung - BPKHTL-XV Gorontalo</title>
    <style>
        #emp {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            text-align: center;
        }

        #emp td,
        #emp th {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        #emp tr:nth-child(even) {
            background-color: #dbdbdb;
            text-align: center;
        }

        #emp th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: #fff;
            text-align: center;
        }

        h2 {
            text-align: center;
        }
    </style>
</head>

<table>
    <tr>
        <td><img src="{{public_path('/img/bpkhtl.png')}}" style="width: 100px; height: 100px"></td>
        <td>
            <h2 style="text-align: center">Balai Pemantapan Kawasan Hutan dan Tata Lingkungan</h2>
            <h3 style="text-align: center"><b>Wilayah XV Gorontalo<b></h3>
            <h4 style="text-align: center"><i>Jl. Rusli Datau No.10, Dulomo Sel., Kec. Kota Utara, Kota Gorontalo, Gorontalo 96128<i></h4>
        </td>
    </tr>
    <tr>
        <td colspan="10">
            <hr>
        </td>
    </tr>
</table>
<br>

<body>
    <div class="card-header">
        <h2>Data Pengunjung</h2><br>
    </div>
    <table id="emp">
        <title>Transaksi - BPS</title>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama <br> Pengunjung </th>
                <th>Instansi/Kelompok <br> Masyarakat</th>
                <th>Alamat</th>
                <th>Nomor <br> Handphone</th>
                <th>Divisi</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($tujuan as  $item)
            <tr>
                <td> {{ $loop->iteration}}</td>
                <td>{{$item->nama}}</td>
                <td>{{$item->instansi}}</td>
                <td>{{$item->alamat}}</td>
                <td>{{$item->hp}}</td>
                <td>{{$item->divisi->divisi_type}}</td>  
            </tr>
            @endforeach 
            
        </tbody>
    </table>
</body>

</html>