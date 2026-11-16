<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Direktori Ekspedisi</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="container">

    <p style="text-align:right;">
        {{ auth()->user()->name }} ({{ auth()->user()->role }}) |
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" style="display:inline; width:auto; margin:0; padding:0; background:none; color:#2563eb; font-weight:normal; cursor:pointer;">Logout</button>
        </form>
    </p>

    <div class="header">
        <div>
            <h1>Direktori Ekspedisi</h1>
            <p>Kelola data kurir, layanan, dan zonasi pengiriman.</p>
        </div>
        @can('manage-ekspedisi')
            <a href="{{ route('ekspedisi.create') }}" class="btn">+ Tambah Kurir</a>
        @endcan
    </div>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>KODE</th>
                    <th>NAMA EKSPEDISI</th>
                    <th>NOMOR TELEPON</th>
                    <th>LAYANAN</th>
                    <th>ZONASI</th>
                    @canany(['manage-ekspedisi', 'delete-ekspedisi'])
                        <th>AKSI</th>
                    @endcanany
                </tr>
            </thead>
            <tbody>
                @forelse ($ekspedisi as $row)
                    <tr>
                        <td>{{ $row->kode }}</td>
                        <td>{{ $row->nama_ekspedisi }}</td>
                        <td>{{ $row->nomor_telepon }}</td>
                        <td>{{ $row->layanan }}</td>
                        <td>{{ $row->zonasi }}</td>
                        @canany(['manage-ekspedisi', 'delete-ekspedisi'])
                        <td>
                            @can('manage-ekspedisi')
                                <a href="{{ route('ekspedisi.edit', $row->kode) }}">Edit</a>
                            @endcan
                            @can('delete-ekspedisi')
                                |
                                <form action="{{ route('ekspedisi.destroy', $row->kode) }}" method="POST" style="display:inline;"
                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="display:inline; width:auto; margin:0; padding:0; background:none; color:#2563eb; font-weight:normal; cursor:pointer;">Hapus</button>
                                </form>
                            @endcan
                        </td>
                        @endcanany
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align:center;">Belum ada data ekspedisi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

</body>
</html>