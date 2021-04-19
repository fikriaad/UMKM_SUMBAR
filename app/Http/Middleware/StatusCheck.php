<?php

namespace App\Http\Middleware;

use Closure;

class StatusCheck
{
    public function handle($request, Closure $next)
    {
        if(session()->get('umkm_status') == 0 ){
            return redirect("umkm/profile-umkm")->with("pesan", "Silahkan Lengkapi Profile Anda Untuk Fitur Lengkap");
        }else{
            return $next($request);
        }
    }
}
