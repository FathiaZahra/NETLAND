<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketingStaff extends Model
{
    use HasFactory;
    protected $table = 'ticketing_staff';
    protected $fillable = ['nama_ticketingstaff', ''];
    protected $primaryKey = 'id_ticketingstaff';
    public $timestamps = false;

    public function ticketingstaff(){
        return $this->hasMany(ticketingstaff::class, 'id_ticketingstaff');
    }
}
