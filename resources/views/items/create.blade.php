@extends('layouts.app')

@section('title', 'Tambah Item')

@section('content')
<div class="max-w-xl mx-auto bg-white rounded-xl shadow-md p-6">

    <h1 class="text-2xl font-semibold text-gray-800 mb-6 text-center">
        Tambah Item
    </h1>

    <form action="{{ route('items.store') }}" method="POST" class="space-y-4">
        @csrf

        {{-- <!-- KODE ITEM -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Kode Item
            </label>
            <input
                type="text"
                name="code"
                class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Contoh: ITM-001"
                required
            >
        </div> --}}

        <!-- NAMA ITEM -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Nama Item
            </label>
            <input
                type="text"
                name="name"
                class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Masukkan nama item"
                required
            >
        </div>

        <!-- KATEGORI -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Kategori
            </label>
            <select
                name="category_id"
                class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                required
            >
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- LOKASI -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Lokasi
            </label>
            <select
                name="location_id"
                class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                required
            >
                <option value="">-- Pilih Lokasi --</option>
                @foreach($locations as $location)
                    <option value="{{ $location->id }}">
                        {{ $location->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- STOK -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Stok Awal
            </label>
            <input
                type="number"
                name="stock"
                min="0"
                value="0"
                class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                required
            >
        </div>

        {{-- <!-- MIN STOK -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Minimum Stok
            </label>
            <input
                type="number"
                name="min_stock"
                min="0"
                value="1"
                class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                required
            >
        </div> --}}

        <!-- DESKRIPSI -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Deskripsi
            </label>
            <textarea
                name="description"
                rows="3"
                class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Deskripsi item (opsional)"
            ></textarea>
        </div>

        <!-- TOMBOL -->
        <div class="flex justify-between items-center pt-4">
            <a href="{{ route('dashboard') }}"
               class="text-gray-600 hover:text-gray-800">
                ← Kembali
            </a>

            <button
                type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg shadow"
            >
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection