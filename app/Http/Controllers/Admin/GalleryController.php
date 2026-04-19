<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Paket;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::latest()->get(10);
        return view('admin.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pakets = Paket::with(['tempat', 'fasilitas'])->latest()->get();
        return view('admin.gallery.create', compact('pakets'));
    }

    public function show(Gallery $id)
    {
        return view('admin.gallery.show', compact('id'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // multiple image upload
        $request->validate([
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'id_fasilitas' => 'nullable|exists:fasilitas,id',
            'id_tempat' => 'nullable|exists:tempats,id',
        ]);

        foreach ($request->file('images') as $image) {
            $path = $image->store('galleries', 'public');
            Gallery::create(['path' => $path, 'id_fasilitas' => $request->id_fasilitas, 'id_tempat' => $request->id_tempat]);
        }

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery berhasil ditambahkan');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $id)
    {
        $id->delete();
        return redirect()->route('admin.gallery.index')->with('success', 'Gallery berhasil dihapus');
    }
}
