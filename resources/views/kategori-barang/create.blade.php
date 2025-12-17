@extends('layouts.app')
@section('title', 'Tambah Kategori Barang')

@section('content')
<div class="max-w-md">
    <h2 class="text-xl font-bold mb-4">Tambah Kategori Barang</h2>
    <form action="{{ route('kategori-barang.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block mb-1">Nama Kategori <span class="text-red-500">*</span></label>
            <input type="text" name="name" value="{{ old('name') }}" 
                   class="w-full border rounded p-2" required>
            @error('name') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>
        <div class="flex gap-2">
            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Simpan</button>
            <a href="{{ route('kategori-barang.index') }}" class="px-4 py-2 bg-gray-200 rounded">Batal</a>
        </div>
    </form>
</div>
@endsection