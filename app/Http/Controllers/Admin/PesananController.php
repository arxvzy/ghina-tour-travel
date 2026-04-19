<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Paket;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pesanans = Pesanan::latest()->get();
        return view('admin.pesanan.index', compact('pesanans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pakets = Paket::with(['fasilitas', 'tempats'])->get();
        return view('admin.pesanan.create', compact('pakets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_paket' => 'required|exists:pakets,id',
            'nama_pemesan' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'diskon' => 'nullable|min:0',
            'total_harga' => 'required|numeric|min:0',
            'tanggal_acara' => 'required|date',
        ]);

        $pesanan = Pesanan::create([
            'id_paket' => $request->id_paket,
            'nama_pemesan' => $request->nama_pemesan,
            'no_hp' => $request->no_hp,
            'diskon' => $request->diskon ?? 0,
            'total_harga' => (Paket::find($request->id_paket)->harga * $request->jumlah_orang) * (1 - ($request->diskon ?? 0) / 100),
            'tanggal_acara' => $request->tanggal_acara,
            'invoice' => 'INV-' . strtoupper(uniqid()),
            'status' => 'pending',
        ]);

        return redirect()->route('admin.pesanan.index')->with('success', 'Pesanan berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pesanan = Pesanan::with('paket')->findOrFail($id);
        return view('admin.pesanan.show', compact('pesanan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pesanan $id)
    {
        $pakets = Paket::with(['fasilitas', 'tempats'])->get();
        return view('admin.pesanan.edit', compact('id', 'pakets'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_paket' => 'required|exists:pakets,id',
            'nama_pemesan' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'diskon' => 'nullable|min:0',
            'total_harga' => 'required|numeric|min:0',
            'tanggal_acara' => 'required|date',
            'jumlah_orang' => 'required|integer|min:1',
            'status'        => 'nullable|in:batal,selesai'
        ]);

        $pesanan = Pesanan::findOrFail($id);
        $pesanan->update($request->all());

        return redirect()->route('admin.pesanan.index')->with('success', 'Pesanan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pesanan $id)
    {
        $id->delete();
        return redirect()->route('admin.pesanan.index')->with('success', 'Pesanan berhasil dihapus.');
    }
}
