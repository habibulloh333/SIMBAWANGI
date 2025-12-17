@extends('layouts.app')
@section('title', 'Daftar Kategori Barang')

@section('content')
<div class="mb-4 flex justify-between items-center">
    <h2 class="text-xl font-bold">Daftar Kategori Barang</h2>
     @if(in_array(auth()->user()->role, ['admin', 'petugas_gudang']))
        <a href="{{ route('kategori-barang.create') }}" 
           class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            + Tambah Kategori
        </a>
    @endif
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Kategori</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse ($kategoriBarangs as $kb)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">{{ $kb->id }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $kb->name }}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    @if(in_array(auth()->user()->role, ['admin', 'petugas_gudang']))
                        <a href="{{ route('kategori-barang.edit', $kb) }}" 
                           class="text-blue-600 hover:underline mr-3">Edit</a>
                        <form action="{{ route('kategori-barang.destroy', $kb) }}" 
                              method="POST" class="inline" 
                              onsubmit="return confirm('Hapus kategori ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="px-6 py-4 text-center text-gray-500">Belum ada kategori barang.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection