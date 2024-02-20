<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pdf extends Model
{
    use HasFactory;
    protected $table = 'pdf';
    protected $fillable = ['nama_informasi','isi_informasi','file'];
    protected $primaryKey = 'id_pdf';
    public $timestamps = false;

    public function pdf(){
        return $this->hasMany(pdf::class, 'id_pdf');
    }
}
