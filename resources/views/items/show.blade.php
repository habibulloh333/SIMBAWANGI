@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4">Detail Barang</h2>

<div class="bg-white p-6 rounded-lg shadow mb-6">
    <p><b>Kode:</b> {{ $item->code }}</p>
    <p><b>Nama:</b> {{ $item->name }}</p>
    <p><b>Stok:</b> {{ $item->stock }}</p>
</div>

<h3 class="text-xl font-semibold mb-3">Riwayat Stok</h3>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 text-left">Tanggal</th>
                <th class="px-4 py-2 text-left">Jenis</th>
                <th class="px-4 py-2 text-left">Jumlah</th>
                <th class="px-4 py-2 text-left">Catatan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($logs as $log)
            <tr class="border-t">
                <td class="px-4 py-2">
                    {{ $log->created_at->format('d M Y H:i') }}
                </td>
                <td class="px-4 py-2">
                    <span class="px-2 py-1 rounded text-white
                        {{ $log->type === 'masuk' ? 'bg-green-600' : 'bg-red-600' }}">
                        {{ ucfirst($log->type) }}
                    </span>
                </td>
                <td class="px-4 py-2">
                    {{ $log->quantity }} pcs
                </td>
                <td class="px-4 py-2">
                    {{ $log->note ?? '-' }}
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="px-4 py-4 text-center text-gray-500">
                    Belum ada riwayat stok
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection