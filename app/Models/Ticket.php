<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $table = 'ticket';
    protected $fillable = ['tanggal_pemesanan','jumlah_ticket', 'harga_ticket','pembayaran_ticket', 'file'];
    protected $primaryKey = 'id_ticket';
    public $timestamps = false;

    public function ticket(){
        return $this->hasMany(ticket::class, 'id_ticket');
    }
} 
