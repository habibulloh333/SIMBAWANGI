@extends('layouts.app')

@section('title', 'Edit Kategori Barang')

@section('content')
<div class="max-w-lg w-full bg-white rounded-lg shadow p-6">
    <h2 class="text-xl font-bold mb-4">Edit Kategori Barang</h2>

    <form action="{{ route('kategori-barang.update', $kategoriBarang->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                Nama Kategori <span class="text-red-500">*</span>
            </label>
            <input 
                type="text" 
                id="name" 
                name="name" 
                value="{{ old('name', $kategoriBarang->name) }}" 
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                required
                @if(!in_array(auth()->user()->role, ['admin', 'petugas_gudang'])) disabled @endif
            >
            @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-between">
            <a href="{{ route('kategori-barang.index') }}" 
               class="px-4 py-2 border border-gray-300 text-gray-700 rounded-md hover:bg-gray-50">
                Batal
            </a>
            @if(in_array(auth()->user()->role, ['admin', 'petugas_gudang']))
                <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Simpan Perubahan
                </button>
            @endif
        </div>
    </form>
</div>
@endsection