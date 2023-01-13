<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Mail\EmailPengajuanPerluRevisi;
use App\Models\Pengajuan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class dataRevisiSalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actived = 'Data Pengajuan Revisi';
        $pengajuan = Pengajuan::where('id_manager', auth()->user()->id_user)->where('status_disetujui', 2)->get();
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
        $actived = 'Revisi Pengajuan Sales';
        $pengajuan = Pengajuan::where('id_pengajuan', $id)->firstOrFail();
        $generalManager = User::where('id_jabatan', 2)->where('id_projek', $pengajuan->id_projek)->get();
        return view('page.pengajuan.perlurevisi', compact('actived', 'pengajuan', 'generalManager'));
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
            'alasan_revisi' => ['required'],
        ]);
//
        $inputVal['status_disetujui'] = 2;


        $updated = $pengajuan->update($inputVal);

        if ($updated) {
            Mail::send(new EmailPengajuanPerluRevisi($pengajuan));
            return redirect()->route('datarevisi.index')->with('success', 'Data Berhasil Diupdate');
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
