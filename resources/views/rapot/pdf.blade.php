<!DOCTYPE html>
<html>
<head>
<title>Rapot Siswa</title>

<style>
body{
    font-family: Arial;
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

<h2 style="text-align:center">RAPOT SISWA</h2>

<table>
<thead>
<tr>
    <th>No</th>
    <th>Nama Siswa</th>
    <th>Kelas</th>
    <th>Mata Pelajaran</th>
    <th>Nilai</th>
</tr>
</thead>

<tbody>
@foreach($rapot as $r)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $r->nama_siswa }}</td>
    <td>{{ $r->kelas }}</td>
    <td>{{ $r->mapel }}</td>
    <td>{{ $r->nilai }}</td>
</tr>
@endforeach
</tbody>

</table>

</body>
</html>