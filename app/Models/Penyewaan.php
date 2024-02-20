<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyewaan extends Model
{
    use HasFactory;
    protected $table = 'penyewaan';
    protected $fillable = ['nama_barang','harga_barang','stok_barang','pembayaran_sewabarang','file'];
    protected $primaryKey = 'id_penyewaan';
    public $timestamps = false;
}
