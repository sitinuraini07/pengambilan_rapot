<!DOCTYPE html>
<html>
<head>
    <title>Data Kelas</title>
    <style>
        body{
            font-family: Arial, sans-serif;
        }
        table{
            width:100%;
            border-collapse:collapse;
            margin-top:20px;
        }
        table, th, td{
            border:1px solid black;
        }
        th, td{
            padding:8px;
            text-align:center;
        }
        th{
            background:#f2f2f2;
        }
    </style>
</head>
<body>

<h2 style="text-align:center">DATA KELAS</h2>

<table>
<thead>
<tr>
    <th>No</th>
    <th>Nama Kelas</th>
    <th>Wali Kelas</th>
</tr>
</thead>

<tbody>
@foreach($kelas as $k)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $k->nama_kelas }}</td>
    <td>{{ $k->nama_guru }}</td>
</tr>
@endforeach
</tbody>

</table>

</body>
</html>