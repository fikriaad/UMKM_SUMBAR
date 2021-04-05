<?php

namespace App\Http\Controllers\Umkm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    function index()
    {
        $active = "profile";
        return view('frontend/umkm/profile/index',
        [
            'active' => $active
        ]);
    }
}
