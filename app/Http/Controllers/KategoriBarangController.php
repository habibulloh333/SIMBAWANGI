<?php

namespace App\Http\Controllers;

use App\Models\KategoriBarang;
use Illuminate\Http\Request;

class KategoriBarangController extends Controller
{
    public function index()
    {
        $kategoriBarangs = KategoriBarang::all();
        return view('kategori-barang.index', compact('kategoriBarangs'));
    }

    public function create()
    {
        return view('kategori-barang.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|unique:categories']);
        KategoriBarang::create($request->all());
        return redirect()->route('kategori-barang.index')->with('success', 'Kategori barang berhasil ditambahkan.');
    }

    public function edit(KategoriBarang $kategoriBarang)
    {
        return view('kategori-barang.edit', compact('kategoriBarang'));
    }

    public function update(Request $request, KategoriBarang $kategoriBarang)
    {
        $request->validate(['name' => 'required|string|unique:categories,name,' . $kategoriBarang->id]);
        $kategoriBarang->update($request->all());
        return redirect()->route('kategori-barang.index')->with('success', 'Kategori barang berhasil diupdate.');
    }

    public function destroy(KategoriBarang $kategoriBarang)
    {
        $kategoriBarang->delete();
        return redirect()->route('kategori-barang.index')->with('success', 'Kategori barang berhasil dihapus.');
    }
}