<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $actived = 'Dashboard';
        $proses = Pengajuan::where('status_disetujui', 0)->count();
        $disetujui = Pengajuan::where('status_disetujui', 1)->count();
        $revisi = Pengajuan::where('status_disetujui', 2)->count();
        $keGm = Pengajuan::where('id_manager', auth()->user()->id_user)->where('status_manager', 0)->where('status_disetujui', 0)->count();
        $disetujuiGm = Pengajuan::where('id_manager', auth()->user()->id_user)->where('status_manager', 1)->count();
        $pengajuanDariManager = Pengajuan::where('id_general_manager', auth()->user()->id_user)->where('status_manager', 0)->count();
        $setujuiDariManager = Pengajuan::where('id_general_manager', auth()->user()->id_user)->where('status_manager', 1)->count();
        return view('page.index', compact('actived', 'proses', 'disetujui', 'revisi', 'disetujuiGm', 'keGm', 'pengajuanDariManager', 'setujuiDariManager'));
    }
}
