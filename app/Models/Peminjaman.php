<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = 'peminjaman';
    protected $fillable = ['jumlah_sewa'];
    protected $primaryKey = 'id_peminjaman';
    public $timestamps = false;

    public function peminjaman(){
        return $this->hasMany(peminjaman::class, 'id_peminjaman');
    }
}
