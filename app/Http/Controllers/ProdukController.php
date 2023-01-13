<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Projek;
use App\Models\Tipe;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actived = 'Produk';
        $produk = Produk::all();
        // dd($produk);
        return view('page.produk.index', compact('actived', 'produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $actived = 'Produk';
        $projek = Projek::all();
        $tipe = Tipe::all();
        return view('page.produk.create', compact('actived', 'projek', 'tipe'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputVal = $request->validate([
            'id_projek' => ['required'],
            'id_tipe' => ['required'],
            'nama_produk' => ['required'],
            'harga' => ['required'],
        ]);

        $created = Produk::create($inputVal);

        if ($created) {
            return redirect()->route('produk.index')->with('success', 'Data Berhasil Ditambah !');
        } else {
            return redirect(route('produk.index'))->with('error', 'Data Gagal Ditambah !');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        $actived = 'Detail Produk';
        return view('page.produk.edit', compact('produk', 'actived'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        $actived = 'Edit Produk';
        return view('page.produk.edit', compact('produk', 'actived'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        $inputVal = $request->validate([
            'nama_produk' => ['required'],
            'harga' => ['required'],
        ]);
        try {
            $produk->update($inputVal);
            return redirect(route('produk.index'));
        } catch (\Throwable $th) {
            return redirect(route('produk.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        try {
            $produk->delete();
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }
}
