<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\StockLog;

class DashboardController extends Controller
{
    public function index()
    {
        $totalItems = Item::count();
        $availableStock = Item::sum('stock');
        $lowStock = Item::whereColumn('stock', '<=', 'min_stock')->count();


        if (in_array(auth()->user()->role, ['admin', 'petugas_gudang'])) {
            $lowStockItems = Item::whereColumn('stock', '<=', 'min_stock')->get();
            $lowStock = $lowStockItems->count();
        }

        $recentLogs = StockLog::with('item')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalItems',
            'availableStock',
            'lowStock',
            'recentLogs'
        ));
    }
}
