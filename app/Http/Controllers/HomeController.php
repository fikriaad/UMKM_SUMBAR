<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Slider_Model;
use App\Kategori_Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index(){
        $slider = Slider_Model::all();
        $kategori = Kategori_Model::all();
        $active = "home";
        return view('frontend.page.home',
    [
        'active' => $active,
        'kategori' => $kategori,
        'slider' => $slider
    ]);
    }
    
    public function product(){
        $active = "product";
        return view('frontend.page.product',
    [
        'active' => $active
    ]);
    }
    
    public function listUmkm(){
        $active = "listUmkm";
        return view('frontend.page.umkm',
    [
        'active' => $active
    ]);
    }
}
