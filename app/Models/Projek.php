<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projek extends Model
{
    use HasFactory;

    protected $table = 'Projek';

    protected $primaryKey = 'id_projek';

    protected $fillable = ['nama_projek', 'email'];

    public function generalManager()
    {
        return $this->hasOne(User::class, 'id_projek')->where('id_jabatan', 2);
    }
    public function manager()
    {
        return $this->hasMany(User::class, 'id_projek')->where('id_jabatan', 3);
    }
}
