@extends('layouts.app')

@section('title', 'Edit Barang')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-xl shadow p-6">

    <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">
        Edit Barang
    </h1>

    <form action="{{ route('items.update', $item->id) }}"
          method="POST"
          class="space-y-4">

        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Kode Barang
            </label>
            <input
                type="text"
                name="code"
                value="{{ old('code', $item->code) }}"
                class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                required>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Nama Barang
            </label>
            <input
                type="text"
                name="name"
                value="{{ old('name', $item->name) }}"
                class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                required>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Kategori
            </label>
            <select
                name="category_id"
                class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ $item->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Lokasi
            </label>
            <select
                name="location_id"
                class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                required>
                @foreach($locations as $location)
                    <option value="{{ $location->id }}"
                        {{ $item->location_id == $location->id ? 'selected' : '' }}>
                        {{ $location->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Stok
                </label>
                <input
                    type="number"
                    name="stock"
                    value="{{ old('stock', $item->stock) }}"
                    min="0"
                    class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">
            </div>

            {{-- <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Minimal Stok
                </label>
                <input
                    type="number"
                    name="min_stock"
                    value="{{ old('min_stock', $item->min_stock) }}"
                    min="0"
                    class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">
            </div>
        </div> --}}

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Deskripsi
            </label>
            <textarea
                name="description"
                rows="3"
                class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">{{ old('description', $item->description) }}</textarea>
        </div>

        <div class="flex justify-between items-center pt-4">
            <a href="{{ route('items.index') }}"
               class="text-gray-600 hover:text-gray-800">
                ← Kembali
            </a>

            <button
                type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg shadow">
                Simpan Perubahan
            </button>
        </div>

    </form>
</div>
@endsection