<!DOCTYPE html>
<html>
<head>
    <title>Data Servis</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        img {
            max-width: 100px;
            height: auto;
        }
    </style>
</head>
<body>
    <h2>Data Servis</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>No Telepon</th>
                <th>Nama Unit</th>
                <th>Nomor Unit</th>
                <th>Keluhan</th>
                <th>Status</th>
                <th>Tanggal Masuk</th>
            </tr>
        </thead>
        <tbody>
            @foreach($servismasuk as $index => $row)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $row->nama_pelanggan }}</td>
                    <td>{{ $row->nomor_hp }}</td>
                    <td>{{ $row->nama_unit }}</td>
                    <td>{{ $row->nomor_unit }}</td>
                    <td>{{ $row->keluhan }}</td>
                    <td>{{ $row->status }}</td>
                    <td>{{ $row->tanggal_masuk }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>