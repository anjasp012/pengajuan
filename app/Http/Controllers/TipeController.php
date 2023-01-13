<?php

namespace App\Http\Controllers;

use App\Models\Projek;
use App\Models\Tipe;
use Illuminate\Http\Request;

class TipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actived = 'Tipe';
        $tipe = Tipe::all();
        return view('page.tipe.index', compact('actived', 'tipe'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $actived = 'Tipe';
        $tipe = new Tipe();
        $projek = Projek::all();
        return view('page.tipe.create', compact('actived', 'projek', 'tipe'));
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
            'nama_tipe' => ['required'],
            'id_projek' => ['required'],
        ]);

        $created = Tipe::create($inputVal);

        if ($created) {
            return redirect()->route('tipe.index')->with('success', 'Data Berhasil Ditambah !');
        } else {
            return redirect(route('tipe.index'))->with('error', 'Data Gagal Ditambah !');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tipe $tipe)
    {
        $actived = 'Detail Tipe';
        return view('page.tipe.show', compact('tipe', 'actived'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipe $tipe)
    {
        $actived = 'Edit Tipe';
        return view('page.tipe.edit', compact('tipe', 'actived'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipe $tipe)
    {
        $inputVal = $request->validate([
            'nama_tipe' => ['required'],
        ]);
        try {
            $tipe->update($inputVal);
            return redirect(route('tipe.index'));
        } catch (\Throwable $th) {
            return redirect(route('tipe.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipe $tipe)
    {
        try {
            $tipe->delete();
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }
}
