<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AkunController extends Controller
{
    public function index(Akun $akun)
    {
        return view('login.login');
        if(!akun::query()):
            return view('login.login');
        else:
            if(Akun::user()->role == 'staff_penyewaan'):
                return redirect()->to('/dashboard');
            else:
                return redirect()->to('/peminjaman/dashboard');
            endif;
        endif;
    }

    public function check(Akun $akun, Request $request){
        $akun = $request->validate(
            [
                'username' => ['required'],
                'password' => ['required'],
            ]
            );
        if(Akun::attempt($akun)){
            $request->session()->regenerate();
            if(Akun::user()->role == 'staff_penyewaan'):
                return redirect()->to('/dashboard/peminjaman');
            else:
                return redirect()->to('/peminjaman/dashboard');
            endif;
        }
        else{
            return redirect()->to('/peminjaman/dashboard');
        }
    }
    public function logout()
    {
        Akun::logout();
        return redirect('/login');
    }
}
