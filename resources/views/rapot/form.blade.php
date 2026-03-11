<div class="row">

<div class="col-md-6 mb-3">
<label>Pilih Siswa</label>
<select name="nama_siswa" id="siswa" class="form-control" required>

<option value="">-- Pilih Siswa --</option>

@foreach($siswas as $s)
<option value="{{ $s->nama }}"
data-nis="{{ $s->nis }}"
data-kelas="{{ $s->kelas }}">
{{ $s->nama }}
</option>
@endforeach

</select>
</div>

<div class="col-md-6 mb-3">
<label>NIS</label>
<input type="text" name="nis" id="nis" class="form-control" readonly>
</div>

<div class="col-md-6 mb-3">
<label>Kelas</label>
<input type="text" name="kelas" id="kelas" class="form-control" readonly>
</div>

<div class="col-md-6 mb-3">
<label>Semester</label>
<select name="semester" class="form-control">
<option value="Ganjil">Ganjil</option>
<option value="Genap">Genap</option>
</select>
</div>

<hr>

<div class="col-md-3 mb-3">
<label>Matematika</label>
<input type="number" name="matematika" class="form-control">
</div>

<div class="col-md-3 mb-3">
<label>B. Indonesia</label>
<input type="number" name="b_indonesia" class="form-control">
</div>

<div class="col-md-3 mb-3">
<label>B. Inggris</label>
<input type="number" name="b_inggris" class="form-control">
</div>

<div class="col-md-3 mb-3">
<label>Produktif</label>
<input type="number" name="produktif" class="form-control">
</div>

</div>

<script>
document.getElementById('siswa').addEventListener('change', function(){

var option = this.options[this.selectedIndex];

document.getElementById('nis').value = option.getAttribute('data-nis');
document.getElementById('kelas').value = option.getAttribute('data-kelas');

});
</script>