<table>
    <thead>
        <tr>
            <th>Nomor</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Instansi</th>
            <th>Alamat</th>
            <th>Nomor HP</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pengunjung as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->instansi }}</td>
                <td>{{ $data->alamat }}</td>
                <td>{{ $data->hp }}</td>
                <td>{{ \Carbon\Carbon::parse($data->created_at)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>