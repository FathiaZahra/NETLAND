<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AkunController extends Controller
{
    public function index(Akun $akun)
    {
        return view('login.login');
    }

    public function login(Request $request)
    {
        $validateData = $request->validate(
            [
                'username' => ['required'],
                'password' => ['required'],
            ],
            [
                'username.required' => 'Username harus diisi',
                'password.required' => 'Password harus diisi',
            ],
        );

        $credentials = [
                'username' => $validateData['username'],
                'password' => $validateData['password'],
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            Session::regenerate();
            if ($user->role == 'staff_penyewaan') {
                return redirect('dashboard/peminjaman');
            } elseif ($user->role == 'staff_ticketing') {
                return redirect('dashboard/ticket');
            }
        }
    }
    public function logout()
    {
        
        Akun::logout();
        return redirect('/login');
    }
}
