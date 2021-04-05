<?php

namespace App\Http\Controllers\Umkm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Barang_Model;
use App\Umkm_Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Helper\JwtHelper;

class ProductController extends Controller
{
    function index()
    {
        return view('frontend/umkm/product/index',
        [
            'active' => $active,
            'jenis' => $jenis
        ]);
    }
}
