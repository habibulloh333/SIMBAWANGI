@extends('layouts.app')

@section('content')

{{-- HEADER --}}
<div class="mb-6 flex justify-between items-center">
    <h2 class="text-2xl font-bold text-gray-800">Daftar Barang</h2>

    <div class="flex gap-2">
        {{-- HISTORY GLOBAL --}}
        <a href="{{ route('items.history.all') }}"
           class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700">
            History Transaksi
        </a>

        @if(in_array(auth()->user()->role, ['admin', 'petugas_gudang']))
            <a href="{{ route('items.create') }}"
               class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700">
                + Tambah Barang
            </a>
        @endif
    </div>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50 text-sm font-semibold text-gray-700">
            <tr>
                <th class="px-6 py-3 text-left">Kode</th>
                <th class="px-6 py-3 text-left">Nama</th>
                <th class="px-6 py-3 text-left">Kategori</th>
                <th class="px-6 py-3 text-left">Lokasi</th>
                <th class="px-6 py-3 text-left">Stok</th>
                <th class="px-6 py-3 text-left">Aksi</th>
            </tr>
        </thead>

        <tbody class="divide-y text-sm">
        @foreach($items as $item)
            <tr class="hover:bg-gray-50 align-top">
                <td class="px-6 py-4 font-mono">{{ $item->code }}</td>
                <td class="px-6 py-4 font-medium">{{ $item->name }}</td>
                <td class="px-6 py-4">{{ $item->category->name }}</td>
                <td class="px-6 py-4">{{ $item->location->name }}</td>

                <td class="px-6 py-4">
                    <span class="px-2 py-1 rounded text-xs
                        {{ $item->stock <= $item->min_stock
                            ? 'bg-red-100 text-red-700 font-semibold'
                            : 'bg-green-100 text-green-700' }}">
                        {{ $item->stock }}
                    </span>
                </td>

                <td class="px-6 py-4 space-y-2">
                    <a href="{{ route('items.edit', $item) }}"
                       class="block text-blue-600 hover:underline">
                        Edit
                    </a>

                    @if(in_array(auth()->user()->role, ['admin', 'petugas_gudang']))
                        <form action="{{ route('items.stock.in', $item) }}"
                              method="POST"
                              class="flex items-center gap-2">
                            @csrf
                            <input type="number" name="quantity" min="1"
                                   class="w-16 border rounded px-2 py-1 text-xs"
                                   placeholder="Qty" required>

                            <input type="text" name="note"
                                   class="border rounded px-2 py-1 text-xs"
                                   placeholder="Catatan">

                            <button type="submit"
                                    class="bg-green-600 text-white px-2 py-1 rounded text-xs hover:bg-green-700">
                                Masuk
                            </button>
                        </form>

                        <form action="{{ route('items.stock.out', $item) }}"
                              method="POST"
                              class="flex items-center gap-2">
                            @csrf
                            <input type="number" name="quantity"
                                   min="1" max="{{ $item->stock }}"
                                   class="w-16 border rounded px-2 py-1 text-xs"
                                   placeholder="Qty" required>

                            <input type="text" name="note"
                                   class="border rounded px-2 py-1 text-xs"
                                   placeholder="Catatan">

                            <button type="submit"
                                    class="bg-red-600 text-white px-2 py-1 rounded text-xs hover:bg-red-700">
                                Keluar
                            </button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection