<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Mail\EmailPengajuanRevisi;
use App\Models\Pengajuan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RevisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actived = 'Revisi';
        $pengajuan = Pengajuan::where('status_disetujui', 2)->get();
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
        $actived = 'Revisi';
        $pengajuan = Pengajuan::where('id_pengajuan', $id)->firstOrFail();
        $generalManager = User::where('id_jabatan', 2)->where('id_projek', $pengajuan->id_projek)->get();
        return view('page.pengajuan.revisi', compact('actived', 'pengajuan', 'generalManager'));
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
            'nilai_disc_pengajuan' => ['required', 'numeric'],
            'keterangan_pengajuan' => ['required'],
        ]);

        $inputVal['status_disetujui'] = 0;
        $inputVal['alasan_revisi'] = '';

        $updated = $pengajuan->update($inputVal);

        // dd($pengajuan);

        if ($updated) {
            Mail::send(new EmailPengajuanRevisi($pengajuan));
            return redirect()->route('revisi.index')->with('success', 'Data Berhasil Diupdate');
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
        $pengajuan = Pengajuan::where('id_pengajuan', $id)->where('status_disetujui', 2)->firstOrFail();
        $deleted = $pengajuan->delete();
        if ($deleted) {
            return redirect()->route('revisi.index')->with('success', 'Data Berhasil Dihapus !');
        }
    }
}
