<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    use HasFactory;
    protected $table = 'informasi';
    protected $fillable = ['nama_informasi','isi_informasi','file'];
    protected $primaryKey = 'id_informasi';
    public $timestamps = false;

    public function informasi(){
        return $this->hasMany(informasi::class, 'id_informasi');
    }
}
