<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Models\StockLog;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::with('category', 'location')->get();
        return view('items.index', compact('items'));
    }

    public function create()
    {
        $categories = Category::all();
        $locations = Location::all();
        return view('items.create', compact('categories', 'locations'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'stock' => 'required|integer|min:0',
        ]);

        Item::create([
            'code' => 'ITM-' . time(), 
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
            'category_id' => 1, 
            'location_id' => 1, 
            'stock' => $validated['stock'],
            'min_stock' => 1, 
        ]);

        return redirect()->route('dashboard')
            ->with('success', 'Barang berhasil ditambahkan');
    }
    public function edit(Item $item)
    {
        $categories = Category::all();
        $locations = Location::all();
        return view('items.edit', compact('item', 'categories', 'locations'));
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            'code' => 'required|unique:items,code,' . $item->id,
            'name' => 'required',
            'category_id' => 'required|exists:categories,id',
            'location_id' => 'required|exists:locations,id',
            'stock' => 'required|integer|min:0',
            'min_stock' => 'nullable|integer|min:0',
        ]);

        $item->update($request->all());
        return redirect()->route('items.index')->with('success', 'Barang berhasil diupdate.');
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return back()->with('success', 'Barang berhasil dihapus.');
    }

    public function show(Item $item)
    {
        $logs = $item->logs()->latest()->get();

        return view('items.show', compact('item', 'logs'));
    }

    public function report()
    {
        $items = Item::with('category', 'location')->get();
        return view('reports.index', compact('items'));
    }

    public function historyAll()
    {
        $logs = StockLog::with(['item', 'user'])
            ->latest()
            ->paginate(20);

        return view('items.history', compact('logs'));
    }
}