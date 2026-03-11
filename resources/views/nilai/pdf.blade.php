<!DOCTYPE html>
<html>
<head>
<title>Data Nilai</title>
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

<h2 style="text-align:center">DATA NILAI SISWA</h2>

<table>
<thead>
<tr>
    <th>No</th>
    <th>Nama Siswa</th>
    <th>Mata Pelajaran</th>
    <th>Nilai</th>
</tr>
</thead>

<tbody>
@foreach($nilai as $n)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $n->nama_siswa }}</td>
    <td>{{ $n->mata_pelajaran }}</td>
    <td>{{ $n->nilai }}</td>
</tr>
@endforeach
</tbody>

</table>

</body>
</html>