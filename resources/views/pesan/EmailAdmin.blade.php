<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EMAIL ADMIN</title>
</head>
<body>
    <div>
        <div>
            @if ($waktu >= 5 && $waktu < 12)
            <h1 >SELAMAT PAGI, {{$admin->name}}</h1>
            @elseif ($waktu >= 12 && $waktu < 18)
            <h1>SELAMAT SIANG, {{$admin->name}}</h1>
            @else
            <h1 >SELAMAT MALAM, {{$admin->name}}</h1>
            @endif    
            <div>
                <p>Anda memiliki pengunjung baru, silahkan LOGIN untuk melihat detail pengunjung</p>
                <strong >Informasi Pengunjung:</strong>
                <ul>
                    <li><span >Nama Pengunjung:</span> {{ $pengunjung['nama'] }}</li>
                </ul>
            </div>
        
            <p>Terima kasih,</p>
            <p>{{ config('app.name') }}</p>
        </div>
    </div>
</body>
</html>
