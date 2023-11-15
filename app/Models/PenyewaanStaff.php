<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenyewaanStaff extends Model
{
    use HasFactory;
    protected $table = 'penyewaanstaff';
    protected $fillable = ['nama_penyewaanstaff'];
    protected $primaryKey = 'id_penyewaanstaff';
    public $timestamps = false;

    public function penyewaanstaff(){
        return $this->hasMany(penyewaanstaff::class, 'id_penyewaanstaff');
    }
}
