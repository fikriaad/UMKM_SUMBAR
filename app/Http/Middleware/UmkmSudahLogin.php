<?php

namespace App\Http\Middleware;

use Closure;

class UmkmSudahLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (session()->has('token')) {
            return $next($request);
        } else {
            return redirect("umkm")->with("pesan", "Anda Belum Login");
        }
    }
}
