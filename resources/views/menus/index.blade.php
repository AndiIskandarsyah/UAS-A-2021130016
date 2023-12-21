@extends('layouts.master')

@section('title', 'Daftar Menu')

@section('content')
    <div class="container mt-4">
        <h2>Daftar Menu</h2>

        <a href="{{ route('menus.create') }}" class="btn btn-success mb-3">Tambah Menu</a>

        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Rekomendasi</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($menus as $menu)
                    <tr>
                        <td>{{ $menu->id }}</td>
                        <td>{{ $menu->nama }}</td>
                        <td>{{ $menu->harga }}</td>
                        <td>{{ $menu->rekomendasi ? 'Ya' : 'Tidak' }}</td>
                        <td>{{ $menu->kategori }}</td>
                        <td>
                            <a href="{{ route('menus.show', $menu->id) }}" class="btn btn-info btn-sm">Lihat</a>
                            <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('menus.destroy', $menu->id) }}" method="post" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Tidak ada data menu.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
