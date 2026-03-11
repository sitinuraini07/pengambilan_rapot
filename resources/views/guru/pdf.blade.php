<!DOCTYPE html>
<html>
<head>
    <title>Data Guru</title>
    <style>
        body{
            font-family: Arial;
        }

        table{
            width:100%;
            border-collapse: collapse;
        }

        table, th, td{
            border:1px solid black;
        }

        th, td{
            padding:8px;
            text-align:left;
        }

        th{
            background:#eee;
        }
    </style>
</head>
<body>

<h2>Data Guru</h2>

<table>
<thead>
<tr>
    <th>No</th>
    <th>Nama Guru</th>
    <th>NIP</th>
    <th>Mapel</th>
    <th>Email</th>
    <th>No HP</th>
</tr>
</thead>

<tbody>
@foreach($gurus as $g)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $g->nama_guru }}</td>
    <td>{{ $g->nip }}</td>
    <td>{{ $g->mapel }}</td>
    <td>{{ $g->email }}</td>
    <td>{{ $g->no_hp }}</td>
</tr>
@endforeach
</tbody>

</table>

</body>
</html>