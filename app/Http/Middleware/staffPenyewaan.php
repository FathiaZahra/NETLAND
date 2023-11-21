<?php

namespace App\Http\Middleware;

use App\Models\Akun;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class staffPenyewaan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         // return $next($request);
         if(Akun::user() && Akun::user()->role == 'staffpenyewaan'):
            return $next($request);
        else:
            return redirect()->to('/login');
        endif;
    }
}
