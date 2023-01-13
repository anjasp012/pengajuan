<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Mail\EmailPengajuanSetujui;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DataPersetujuanSalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actived = 'Data Persetujuan Sales';
        $pengajuan = Pengajuan::where('id_manager', auth()->user()->id_user)->where('status_disetujui', 1)->get();
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
        $actived = 'Setujui Pengajuan';
        $pengajuan = Pengajuan::where('id_pengajuan', $id)->firstOrFail();
        return view('page.pengajuan.setujui', compact('actived', 'pengajuan'));
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
        $inputVal = request()->validate([
            'nilai_disc_disetujui' => ['required'],
            'keterangan_disetujui' => ['required'],
        ]);
        $inputVal['tanggal_disetujui'] = now();
        $inputVal['status_disetujui'] = 1;

        $pengajuan = Pengajuan::where('id_pengajuan', $id)->firstOrFail();

        $updated = $pengajuan->update($inputVal);

        if ($updated) {
            Mail::send(new EmailPengajuanSetujui($pengajuan));
            return redirect()->route('datapersetujuansales.index')->with('success', 'Data Berhasil Diupdate');
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
