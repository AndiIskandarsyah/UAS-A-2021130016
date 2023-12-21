<!-- resources/views/menus/edit.blade.php -->

@extends('layouts.master')

@section('title', 'Edit Menu')

@section('content')
    <h2>Edit Menu</h2>

    <!-- Form edit menu di sini -->
    <form action="{{ route('menus.update', $menu->id) }}" method="post">
        @csrf
        @method('PUT')

        <label for="nama">Nama Menu:</label>
        <input type="text" name="nama" id="nama" value="{{ old('nama', $menu->nama) }}" required>

        <label for="harga">Harga Menu:</label>
        <input type="text" name="harga" id="harga" value="{{ old('harga', $menu->harga) }}" required>

        <label for="rekomendasi">Rekomendasi:</label>
        <input type="checkbox" name="rekomendasi" value="1" {{ old('rekomendasi', $menu->rekomendasi) ? 'checked' : '' }}>

        <label for="kategori">Kategori Menu:</label>
        <input type="text" name="kategori" id="kategori" value="{{ old('kategori', $menu->kategori) }}" required>

        <button type="submit">Simpan Perubahan</button>
    </form>
@endsection
