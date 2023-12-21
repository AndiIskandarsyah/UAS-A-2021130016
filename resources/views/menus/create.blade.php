@extends('layouts.master')

@section('title', 'Tambah Menu')

@section('content')
    <h2>Tambah Menu</h2>

    <!-- Form tambah menu di sini -->
    <form action="{{ route('menus.store') }}" method="post">
        @csrf

        <label for="nama">Nama Menu:</label>
        <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required>

        <label for="harga">Harga Menu:</label>
        <input type="text" name="harga" id="harga" value="{{ old('harga') }}" required>

        <label for="rekomendasi">Rekomendasi:</label>
        <input type="hidden" name="rekomendasi" value="0">
        <input type="checkbox" name="rekomendasi" value="1" {{ old('rekomendasi') ? 'checked' : '' }}>

        <label for="kategori">Kategori Menu:</label>
        <input type="text" name="kategori" id="kategori" value="{{ old('kategori') }}" required>


        <button type="submit">Simpan</button>
    </form>
@endsection
