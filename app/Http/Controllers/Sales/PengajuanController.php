<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Mail\EmailPengajuan;
use App\Models\Pengajuan;
use App\Models\Produk;
use App\Models\Projek;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actived = 'Pengajuan';
        $pengajuan = Pengajuan::where('status_disetujui', 0)->get();
        return view('page.pengajuan.index', compact('actived', 'pengajuan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $actived = 'Pengajuan';
        $projek = Projek::all();
        $pengajuan = new Pengajuan();
        $manager = User::where('id_jabatan', 3)->where('id_projek', $pengajuan->id_projek)->get();
        return view('page.pengajuan.create', compact('actived', 'projek', 'pengajuan', 'manager'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $inputVal = request()->validate([
            'id_projek' => ['required', Rule::exists(Projek::class, 'id_projek')],
            'id_produk' => ['required', Rule::exists(Produk::class, 'id_produk')],
            'id_manager' => ['required', Rule::exists(User::class, 'id_user')],
            'harga_produk' => ['required'],
            'nilai_disc_pengajuan' => ['required'],
            'keterangan_pengajuan' => ['required'],
        ]);
        $inputVal['tanggal_pengajuan'] = now();

        $created = auth()->user()->pengajuan()->create($inputVal);

        // Notification::route('mail', $id_manager->email)->notify(new PengajuanCreated($created));

        if ($created) {
            Mail::send(new EmailPengajuan($created));
            return redirect()->route('pengajuan.index')->with('success', 'Data Berhasil Ditambah !');
        } else {
            return redirect(route('pengajuan.index'))->with('error', 'Data Gagal Ditambah !');
        }
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
        //
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
        //
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
