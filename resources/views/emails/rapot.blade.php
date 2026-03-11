<h2>Rapot Siswa</h2>

<p>Nama Siswa : {{ $rapot->nama_siswa }}</p>
<p>Kelas : {{ $rapot->kelas }}</p>

<h4>Nilai:</h4>

<ul>
<li>Matematika : {{ $rapot->matematika }}</li>
<li>B. Indonesia : {{ $rapot->b_indonesia }}</li>
<li>B. Inggris : {{ $rapot->b_inggris }}</li>
<li>Produktif : {{ $rapot->produktif }}</li>
</ul>

@php
$rata = ($rapot->matematika + $rapot->b_indonesia + $rapot->b_inggris + $rapot->produktif) / 4;
@endphp

<p><strong>Rata-rata :</strong> {{ $rata }}</p>

<p>Terima kasih.</p>