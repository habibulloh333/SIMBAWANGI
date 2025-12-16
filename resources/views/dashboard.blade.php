@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')


<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-800">Dashboard</h1>
    <p class="text-gray-600 mt-1">
        Selamat datang, <b>{{ auth()->user()->name }}</b>
    </p>
</div>


<div class="bg-gradient-to-r from-blue-500 to-blue-700 text-white p-6 rounded-xl shadow mb-8">
    <p class="text-lg">
        Peran Anda:
        <span class="font-bold uppercase">
            {{ auth()->user()->role }}
        </span>
    </p>
</div>


<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white rounded-xl shadow p-6">
        <p class="text-sm text-gray-500">Total Barang</p>
        <p class="text-3xl font-bold text-blue-600 mt-2">
            {{ $totalItems ?? 0 }}
        </p>
    </div>

    <div class="bg-white rounded-xl shadow p-6">
        <p class="text-sm text-gray-500">Stok Tersedia</p>
        <p class="text-3xl font-bold text-green-600 mt-2">
            {{ $availableStock ?? 0 }}
        </p>
    </div>

    <div class="bg-white rounded-xl shadow p-6">
        <p class="text-sm text-gray-500">Stok Menipis</p>
        <p class="text-3xl font-bold text-red-600 mt-2">
            {{ $lowStock ?? 0 }}
        </p>
    </div>
</div>


<div class="flex gap-4">
    @if(in_array(auth()->user()->role, ['admin','petugas_gudang']))
        <a href="{{ route('items.create') }}"
           class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 shadow">
            + Tambah Barang
        </a>
    @endif

    @if(auth()->user()->role === 'pimpinan')
        <a href="{{ route('reports.index') }}"
           class="px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 shadow">
            Lihat Laporan
        </a>
    @endif
</div>

@if($lowStock > 0)
<div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded">
    ⚠️ Terdapat <b>{{ $lowStock }}</b> barang dengan stok hampir habis.
</div>
@endif

@if(isset($recentLogs) && $recentLogs->count())
<div class="bg-white rounded-xl shadow p-6 mt-8">
    <h3 class="text-lg font-semibold mb-4">
        Aktivitas Barang 
    </h3>

    <ul class="space-y-3">
        @foreach($recentLogs as $log)
            <li class="flex justify-between items-center text-sm">
                <span>
                    <b>{{ $log->item->name }}</b> —
                    @if($log->type === 'masuk')
                        <span class="text-green-600 font-semibold">
                            Masuk {{ $log->quantity }} pcs
                        </span>
                    @else
                        <span class="text-red-600 font-semibold">
                            Keluar {{ $log->quantity }} pcs
                        </span>
                    @endif
                </span>

                <span class="text-gray-500 text-xs">
                    {{ $log->created_at->diffForHumans() }}
                </span>
            </li>
        @endforeach
    </ul>

    <div class="mt-4">
        <a href="{{ route('items.index') }}"
           class="text-blue-600 hover:underline text-sm">
            Lihat semua barang 
        </a>
    </div>
</div>
@endif

@if(session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded">
        {{ session('success') }}
    </div>
@endif

@endsection
