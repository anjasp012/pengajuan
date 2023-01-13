<?php

namespace App\Http\Controllers\GeneralManager;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use App\Models\Projek;
use App\Models\User;
use Illuminate\Http\Request;

class PengajuanDariManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actived = 'Pengajuan Dari Manager';
        $pengajuan = Pengajuan::where('id_general_manager', auth()->user()->id_user)->where('status_manager', 0)->get();
        return view('page.pengajuan.index', compact('actived', 'pengajuan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $actived = 'Pengajuan Dari Manager';
        $projek = Projek::all();
        $pengajuan = Pengajuan::where('id_pengajuan', $id)->firstOrFail();
        return view('page.pengajuan.show', compact('actived', 'projek', 'pengajuan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $actived = 'Pengajuan Dari Manager';
        $pengajuan = Pengajuan::where('id_pengajuan', $id)->firstOrFail();
        $projek = Projek::all();
        $generalManager = User::where('id_jabatan', 2)->where('id_projek', $pengajuan->id_projek)->get();
        return view('page.pengajuan.setujuigm', compact('actived', 'pengajuan', 'generalManager', 'projek'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pengajuan = Pengajuan::where('id_pengajuan', $id)->firstOrFail();

        $inputVal = request()->validate([
            'nilai_setuju_2' => ['required'],
            'keterangan_disetujui_2' => ['required'],
        ]);
        $inputVal['status_manager'] = 1;

        $updated = $pengajuan->update($inputVal);

        if ($updated) {
            return redirect()->route('setuju.index')->with('success', 'Data Berhasil Diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
