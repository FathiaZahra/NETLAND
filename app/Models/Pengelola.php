<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengelola extends Model
{
    use HasFactory;
    protected $table = 'pengelola';
    protected $fillable = ['nama_pengelola','no_telp', 'id_akun'];
    protected $primaryKey = 'id_pengelola';
    public $timestamps = false;

    public function pengelola(){
        return $this->hasMany(pengelola::class, 'id_pengelola');
    }
}
