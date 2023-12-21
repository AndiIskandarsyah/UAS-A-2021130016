@extends('layouts.master')

@section('title', 'Detail Menu')

@section('content')
    <div class="container mt-4">
        <h2>Detail Menu</h2>

        <table class="table">
            <tr>
                <th>ID</th>
                <td>{{ $menu->id }}</td>
            </tr>
            <tr>
                <th>Nama</th>
                <td>{{ $menu->nama }}</td>
            </tr>
            <tr>
                <th>Harga</th>
                <td>{{ $menu->harga }}</td>
            </tr>
            <tr>
                <th>Rekomendasi</th>
                <td>{{ $menu->rekomendasi ? 'Ya' : 'Tidak' }}</td>
            </tr>
            <tr>
                <th>Kategori</th>
                <td>{{ $menu->kategori }}</td>
            </tr>
        </table>

        <p>
            <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-warning btn-sm">Edit</a>
        </p>

        <p><a href="{{ route('menus.index') }}" class="btn btn-primary btn-sm">Kembali ke Daftar Menu</a></p>
    </div>
@endsection
