<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akomodasi extends Model
{
    use HasFactory;
    protected $table = 'akomodasi';
    protected $fillable = ['nama_akomodasi','isi_akomodasi','file'];
    protected $primaryKey = 'id_akomodasi';
    public $timestamps = false;

    public function akomodasi(){
        return $this->hasMany(akomodasi::class, 'id_akomodasi');
    }
}
