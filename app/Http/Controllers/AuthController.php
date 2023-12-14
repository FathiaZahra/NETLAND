<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $userRole = Auth::user()->role;

            if ($userRole == 'super_admin') {
                return redirect()->to('/');
            } elseif ($userRole == 'pengelola') {
                return redirect()->to('/dashboard/informasi');
            } elseif ($userRole == 'staff_ticketing') {
                return redirect()->to('/dashboard/ticket');
            } elseif ($userRole == 'staff_penyewaan') {
                return redirect()->to('/dashboard/peminjaman');
            }
        }

        return redirect()->to('/');
    }

    public function logout()
    {
        Auth::logout();
        Session::regenerateToken();
        return redirect('/');
    }
}
