<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_diskon';

    protected $primaryKey = 'id_pengajuan';

    protected $fillable = ['id_projek', 'id_produk', 'harga_produk', 'nilai_disc_pengajuan', 'keterangan_pengajuan' ,'id_manager',
    'tanggal_pengajuan', 'nilai_disc_disetujui', 'keterangan_disetujui', 'tanggal_disetujui', 'status_disetujui', 'keterangan_pengajuan_2', 'nilai_disc_pengajuan_2', 'id_general_manager', 'status_manager', 'nilai_setuju_2', 'keterangan_disetujui_2', 'alasan_revisi'];

    public function projek()
    {
        return $this->belongsTo(Projek::class, 'id_projek');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function manager()
    {
        return $this->belongsTo(User::class, 'id_manager');
    }
    public function generalManager()
    {
        return $this->belongsTo(User::class, 'id_general_manager');
    }
}
