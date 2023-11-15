<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    public function index(Akun $akun){
        return view('login.login');
    }
}
