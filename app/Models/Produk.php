<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'Produk';

    protected $fillable = ['id_projek', 'id_tipe', 'nama_produk', 'harga'];


    protected $primaryKey = 'id_produk';


    public function projek()
    {
        return $this->belongsTo(Projek::class, 'id_projek');
    }

    public function tipe()
    {
        return $this->belongsTo(Tipe::class, 'id_tipe');
    }
}
