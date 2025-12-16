<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\StockLog;
use Illuminate\Http\Request;

class StockLogController extends Controller
{
    
    public function stockIn(Request $request, Item $item)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
            'note' => 'nullable|string'
        ]);

        
        $item->increment('stock', $request->quantity);

        
        StockLog::create([
            'item_id' => $item->id,
            'type' => 'masuk',
            'quantity' => $request->quantity,
            'note' => $request->note
        ]);

        return back()->with('success', 'Barang masuk berhasil');
    }

    
    public function stockOut(Request $request, Item $item)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
            'note' => 'nullable|string'
        ]);

        
        if ($item->stock < $request->quantity) {
            return back()->with('error', 'Stok tidak mencukupi');
        }

        
        $item->decrement('stock', $request->quantity);

        
        StockLog::create([
            'item_id' => $item->id,
            'type' => 'keluar',
            'quantity' => $request->quantity,
            'note' => $request->note
        ]);

        return back()->with('success', 'Barang keluar berhasil');
    }
}
