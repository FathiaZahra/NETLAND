<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Akun extends Authenticatable
{
    use HasFactory;
    protected $table = 'akun';
    protected $fillable = ['username','password','role','foto_profile'];
    protected $primaryKey = 'id_akun';
    public $timestamps = false;

    public function akun(){
        return $this->hasMany(akun::class, 'id_akun');
    }
}
