<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Dashboard extends Controller
{
    public function index()
    {
        $totalAkomodasi = DB::select('SELECT CountAkomodasi() AS totalAkomodasi')[0]->totalAkomodasi;
        $totalTicketing = DB::select('SELECT CountTotalTicket() AS totalTicketing')[0]->totalTicketing;
        $totalPenyewaan = DB::select('SELECT CountTotalBarang() AS totalPenyewaan')[0]->totalPenyewaan;
        
        $data = [
            'jumlahAkomodasi' => $totalAkomodasi,
            'jumlahTicket' => $totalTicketing,
            'jumlahPenyewaan' => $totalPenyewaan
        ];
        
        return view('dashboard.index', $data);
    }
}
