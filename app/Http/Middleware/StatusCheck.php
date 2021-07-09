<?php

namespace App\Http\Middleware;

use Closure;

class StatusCheck
{
    public function handle($request, Closure $next)
    {
        if(session()->get('umkm_status') == 0 ){
            return redirect("umkm/profile-umkm")->with("pesan", "Silahkan Lengkapi Profile Anda , Jika sudah silahkan tunggu 1x24 jam untuk dikonfirmasi admin");
        }else{
            return $next($request);
        }
    }
}
