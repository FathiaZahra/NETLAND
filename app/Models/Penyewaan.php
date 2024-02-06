<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyewaan extends Model
{
    use HasFactory;
    protected $table = 'penyewaan';
    protected $fillable = ['ghsjci','harga_barang','stok_barang','file'];
    protected $primaryKey = 'id_penyewaan';
    public $timestamps = false;
}
