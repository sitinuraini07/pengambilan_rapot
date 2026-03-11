<h2>Rapot Siswa</h2>

<p>Nama: {{ $rapot->nama_siswa }}</p>
<p>NIS: {{ $rapot->nis }}</p>
<p>Kelas: {{ $rapot->kelas }}</p>
<p>Semester: {{ $rapot->semester }}</p>

<hr>

<p>Matematika: {{ $rapot->matematika }}</p>
<p>Bahasa Indonesia: {{ $rapot->b_indonesia }}</p>
<p>Bahasa Inggris: {{ $rapot->b_inggris }}</p>
<p>Produktif: {{ $rapot->produktif }}</p>

<button onclick="window.print()">Cetak</button>