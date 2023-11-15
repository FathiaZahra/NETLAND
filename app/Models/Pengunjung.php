<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengunjung extends Model
{
    use HasFactory;
    protected $table = 'pengunjung';
    protected $fillable = ['nama_pengunjung','email'];
    protected $primaryKey = 'id_pengunjung';
    public $timestamps = false;

    public function pengunjung(){
        return $this->hasMany(pengunjung::class, 'id_pengunjung');
    }
}
