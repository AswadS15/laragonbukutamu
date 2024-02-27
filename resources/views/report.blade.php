<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer - BPS Kota Malang</title>
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
            background-color: #0bfdfd;
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
        <td><img src="{{ asset('img/bpkhtl.png') }}" style="width: 100px; height: 100px"></td>
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

<body>
    <div class="card-header">
        <h2>Ringkasan - Data Buku Tamu</h2>
        <p style="text-align: justify">Buku tamu <strong>BPKHTL-XV Gorontalo</strong> merupakan buku yang berisi daftar
            pelanggan yang bertujuan dalam pemenuhan kebutuhan data.
            Buku tamu ini bisa menjadi patokan dalam evaluasi BPKHTL-XV Gorontalo dalam melayani pengunjung. Berikut ini
            ringkasan data buku tamu:</p>
    </div>
    <div class="card-header">
        <p style="text-align: center">Total Pengunjung : <strong>{{$pengunjung}}</strong> orang</p>
        <p style="text-align: center">Total Pelayanan : <strong>{{$pelayanan}}</strong> kali</p>
    </div>
    <h4>1. Jumlah Pengunjung - Berdasarkan Divisi</h4>
    <table id="emp" border="2">
        <title>Pengunjung BPKHTL-XV</title>
        <thead class="thead-dark">
            <tr>
                <th>PIMPINAN</th>
                <th>Tata Usaha</th>
                <th>ISDHTL</th>
                <th>PKH</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$pimpinan}}</td>
                <td>{{$tatausaha}}</td>
                <td>{{$isdhtl}}</td>
                <td>{{$pkh}}</td>
            </tr>
        </tbody>
    </table>
    <h4>2. Jumlah Pengunjung - Berdasarkan Hari, Bulan, dan Tahun</h4>
    <table id="emp" border="2">
        <thead class="thead-dark">
            <tr>
                <th>Hari</th>
                <th>Bulan</th>
                <th>Tahun</th>
        </thead>
        <tbody>
            <tr>
                <td>{{$hari}}</td>
                <td>{{$bulan}}</td>
                <td>{{$tahun}}</td>
            </tr>
        </tbody>
    </table>
    <h4>2. Jumlah Ulasan</h4>
    <table id="emp" border="2">
        <thead class="thead-dark">
            <tr>
                <th>Puas</th>
                <th>Kurang Puas</th>
        </thead>
        <tbody>
            <tr>
                <td>{{$puas}}</td>
                <td>{{$kurangpuas}}</td>
            </tr>
        </tbody>
    </table>
</body>

</html>