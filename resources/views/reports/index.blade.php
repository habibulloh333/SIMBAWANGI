@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-6">Laporan Stok Barang</h2>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left">Kode</th>
                <th class="px-6 py-3 text-left">Nama</th>
                <th class="px-6 py-3 text-left">Kategori</th>
                <th class="px-6 py-3 text-left">Lokasi</th>
                <th class="px-6 py-3 text-left">Stok</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            @foreach($items as $item)
            <tr>
                <td class="px-6 py-4 font-mono">{{ $item->code }}</td>
                <td class="px-6 py-4">{{ $item->name }}</td>
                <td class="px-6 py-4">{{ $item->category->name }}</td>
                <td class="px-6 py-4">{{ $item->location->name }}</td>
                <td class="px-6 py-4 {{ $item->stock <= $item->min_stock ? 'text-red-600 font-bold' : '' }}">
                    {{ $item->stock }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection