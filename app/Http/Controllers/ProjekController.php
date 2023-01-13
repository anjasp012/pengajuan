<?php

namespace App\Http\Controllers;

use App\Models\Projek;
use Illuminate\Http\Request;

class ProjekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actived = 'Projek';
        $projek = Projek::all();
        return view('page.projek.index', compact('actived', 'projek'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $actived = 'Tambah Projek';
        return view('page.projek.create', compact('actived'));
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
            'nama_projek' => ['required'],
            'email' => ['required'],
        ]);

        $created = Projek::create($inputVal);

        if ($created) {
            return redirect()->route('projek.index')->with('success', 'Data Berhasil Ditambah !');
        } else {
            return redirect(route('projek.index'))->with('error', 'Data Gagal Ditambah !');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Projek $projek)
    {
        $actived = 'Detail Projek';
        return view('page.projek.show', compact('actived', 'projek'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Projek $projek)
    {
        $actived = 'Edit Projek';
        return view('page.projek.edit', compact('actived', 'projek'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Projek $projek)
    {
        $inputVal = $request->validate([
            'nama_projek' => ['required'],
            'email' => ['required'],
        ]);
        try {
            $projek->update($inputVal);
            return redirect(route('projek.index'));
        } catch (\Throwable $th) {
            return redirect(route('projek.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Projek $projek)
    {
        try {
            $projek->delete();
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }
}
