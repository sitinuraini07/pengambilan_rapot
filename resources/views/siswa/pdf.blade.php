<h2>Data Siswa</h2>

<table border="1" width="100%" cellpadding="5">

<tr>
<th>No</th>
<th>Nama</th>
<th>NIS</th>
<th>Kelas</th>
</tr>

@foreach($siswa as $s)
<tr>
<td>{{ $loop->iteration }}</td>
<td>{{ $s->nama }}</td>
<td>{{ $s->nis }}</td>
<td>{{ $s->kelas }}</td>
</tr>
@endforeach

</table>