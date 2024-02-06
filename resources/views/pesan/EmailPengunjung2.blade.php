<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EMAIL PENGUNJUNG</title>
</head>
<body>
    <div>
        <div>
            @if ($waktu >= 5 && $waktu < 12)
            <h1 >SELAMAT PAGI, {{$pengunjung->pengunjung->nama}}</h1>
            @elseif ($waktu >= 12 && $waktu < 18)
            <h1>SELAMAT SIANG, {{$pengunjung->pengunjung->nama}}</h1>
            @else
            <h1 >SELAMAT MALAM, {{$pengunjung->pengunjung->nama}}</h1>
            @endif 
            <div>
                <p><strong>Mohon maaf</strong>,</p>
    
                <p>Sehubungan dengan permintaan Anda, kami ingin memberitahukan bahwa Kepala Divisi {{$admin->divisi->divisi_type}} saat ini tidak berada di tempat dan akan diwakilkan oleh staf {{$admin->divisi->divisi_type}}.</p>

                <p>Hubungi admin untuk tindak lanjut permintaan anda</p>
            </div>

            
            <p>Terima kasih,</p>
            <p>{{ config('app.name') }}</p>    
        </div>
    </div>
</body>
</html>
