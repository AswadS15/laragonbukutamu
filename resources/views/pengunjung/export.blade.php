<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Export PDF</title>
</head>
<body>
    <h2>Data Pengguna</h2>

  <table>
    <thead>
      <tr>
        <th>Nama</th>
        <th>Instansi</th>
        <th>Alamat</th>
        <th>No HP</th>
        <th>Divisi</th>
        <th>Tujuan</th>
      </tr>
    </thead>
    <tbody>
     @foreach ($pengunjung as $item)  
      <tr>
        <td>{{ $item->nama }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>