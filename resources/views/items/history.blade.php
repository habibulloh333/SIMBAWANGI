@extends('layouts.app')

@section('content')

<h2 class="text-2xl font-bold mb-6">History Transaksi Barang</h2>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200 text-sm">
        <thead class="bg-gray-50 font-semibold text-gray-700">
            <tr>
                <th class="px-6 py-3 text-left">Tanggal</th>
                <th class="px-6 py-3 text-left">Barang</th>
                <th class="px-6 py-3 text-left">Jenis</th>
                <th class="px-6 py-3 text-left">Qty</th>
                <th class="px-6 py-3 text-left">Catatan</th>
                <th class="px-6 py-3 text-left">User</th>
            </tr>
        </thead>

        <tbody class="divide-y">
            @foreach($logs as $log)
                <tr>
                    <td class="px-6 py-3">
                        {{ $log->created_at->format('d M Y H:i') }}
                    </td>

                    <td class="px-6 py-3">
                        {{ $log->item->name }}
                    </td>

                    <td class="px-6 py-3">
                        @if($log->type === 'masuk')
                            <span class="text-green-600 font-semibold">Masuk</span>
                        @else
                            <span class="text-red-600 font-semibold">Keluar</span>
                        @endif
                    </td>

                    <td class="px-6 py-3">
                        {{ $log->quantity }}
                    </td>

                    <td class="px-6 py-3">
                        {{ $log->note ?? '-' }}
                    </td>

                    <td class="px-6 py-3">
                        {{ $log->user->name ?? '-' }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $logs->links() }}
</div>

@endsection
