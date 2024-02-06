<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $fillable = ['nama_barang','harga_barang','stok_barang','file'];
    protected $primaryKey = 'id_barang';
    public $timestamps = false;

    // public function barang(){
    //     return $this->hasMany(barang::class, 'id_barang');
    // }
}
