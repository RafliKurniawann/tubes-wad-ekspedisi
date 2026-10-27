@php $isEdit = isset($ekspedisi); @endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $isEdit ? 'Edit' : 'Tambah' }} Ekspedisi</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="container kecil">
    <div class="header">
        <div>
            <h1>{{ $isEdit ? 'Edit' : 'Tambah' }} Kurir</h1>
            <p>{{ $isEdit ? 'Ubah data ekspedisi.' : 'Masukkan data ekspedisi.' }}</p>
        </div>
        <a href="{{ route('ekspedisi.index') }}" class="btn">← Kembali</a>
    </div>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <form action="{{ $isEdit ? route('ekspedisi.update', $ekspedisi->kode) : route('ekspedisi.store') }}" method="POST">
            @csrf
            @if ($isEdit)
                @method('PUT')
            @endif

            <label>Kode Kurir</label>
            @if ($isEdit)
                <input type="text" value="{{ $ekspedisi->kode }}" disabled>
            @else
                <input type="text" name="kode" placeholder="Contoh: JNT" value="{{ old('kode') }}" required>
            @endif

            <label>Nama Ekspedisi</label>
            <input type="text" name="nama_ekspedisi" placeholder="Contoh: J&T Express"
                   value="{{ old('nama_ekspedisi', $ekspedisi->nama_ekspedisi ?? '') }}" required>

            <label>Nomor Telepon</label>
            <input type="text" name="nomor_telepon" placeholder="08123456789"
                   value="{{ old('nomor_telepon', $ekspedisi->nomor_telepon ?? '') }}" required>

            <label>Jenis Layanan</label>
            @php $layanan = old('layanan', $ekspedisi->layanan ?? 'Reguler'); @endphp
            <select name="layanan">
                @foreach (['Reguler', 'Express', 'Kargo'] as $opt)
                    <option value="{{ $opt }}" {{ $layanan == $opt ? 'selected' : '' }}>{{ $opt }}</option>
                @endforeach
            </select>

            <label>Zonasi</label>
            <input type="text" name="zonasi" placeholder="Contoh: Nasional"
                   value="{{ old('zonasi', $ekspedisi->zonasi ?? '') }}" required>

            <button type="submit">{{ $isEdit ? 'Simpan Perubahan' : 'Simpan Data' }}</button>
        </form>
    </div>
</div>

</body>
</html>