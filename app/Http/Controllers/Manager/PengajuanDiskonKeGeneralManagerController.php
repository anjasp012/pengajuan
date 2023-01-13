<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use App\Models\User;
use Illuminate\Http\Request;

class PengajuanDiskonKeGeneralManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actived = 'Pengajuan Diskon Ke General Manager';
        $pengajuan = Pengajuan::where('id_manager', auth()->user()->id_user)->where('status_manager', 0)->where('status_disetujui', 0)->get();
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $actived = 'Ajukan Ke GM';
        $pengajuan = Pengajuan::where('id_pengajuan', $id)->firstOrFail();
        $generalManager = User::where('id_jabatan', 2)->where('id_projek', $pengajuan->id_projek)->first();
        return view('page.pengajuan.ajukankegm', compact('actived', 'pengajuan', 'generalManager'));
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
            'keterangan_pengajuan_2' => ['required'],
            'nilai_disc_pengajuan_2' => ['required'],
            'id_general_manager' => ['required'],
        ]);

        $inputVal['status_manager'] = 0;


        $updated = $pengajuan->update($inputVal);

        if ($updated) {
            return redirect()->route('pengajuandiskonkegm.index')->with('success', 'Data Berhasil Diupdate');
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
