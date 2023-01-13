<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipe extends Model
{
    use HasFactory;

    protected $table = 'Tipe';

    protected $primaryKey = 'id_tipe';

    protected $fillable = ['nama_tipe', 'id_projek'];

    public function projek()
    {
        return $this->belongsTo(Projek::class, 'id_projek');
    }
}
