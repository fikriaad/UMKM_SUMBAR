<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Barang_Model;
use App\Slider_Model;
use App\Kategori_Model;
use App\Umkm_Model;

class HomeController extends Controller
{
    public function index()
    {
        $slider = Slider_Model::all();
        $kategori = Kategori_Model::all();
        $product = Barang_Model::all();
        $umkm = DB::table('tb_data_umkm')
        ->limit(3)
        ->get();
        $active = "home";
        return view(
            'frontend.page.home',
            [
                'active' => $active,
                'kategori' => $kategori,
                'slider' => $slider,    
                'umkm' => $umkm,    
                'product' => $product
            ]
        );
    }

    public function about()
    {
        $active = "about";
        return view(
            'frontend.page.about',
            [
                'active' => $active
            ]
        );
    }

    public function product()
    {
        $active = "product";
        $product  = DB::table('tb_barang')
            ->leftjoin('tb_kategori', 'tb_kategori.kategori_id', '=', 'tb_barang.kategori_id')
            ->select('tb_barang.*','tb_kategori.kategori_nama')
            ->get();
        return view(
            'frontend.page.product',
            [
                'active' => $active,
                'product' => $product
            ]
        );
    }

    public function listUmkm()
    {
        $umkm = Umkm_Model::all();
        $active = "listUmkm";
        return view(
            'frontend.page.umkm',
            [
                'active' => $active,
                'umkm' => $umkm
            ]
        );
    }
    public function detailProduct($product)
    {


        $barang  = DB::table('tb_barang')
            ->leftjoin('tb_kategori', 'tb_kategori.kategori_id', '=', 'tb_barang.kategori_id')
            ->leftjoin('tb_sub_kategori', 'tb_sub_kategori.sub_id', '=', 'tb_barang.sub_id')
            ->leftjoin('tb_data_umkm', 'tb_data_umkm.umkm_id', '=', 'tb_barang.umkm_id')
            ->where('barang_id', '=', $product)
            ->orderBy('barang_id')
            ->first();
        $gambar = DB::table('tb_gambar')
            ->where('barang_id', '=', $product)
            ->get();

        $list = DB::table('tb_barang')
            ->leftjoin('tb_kategori', 'tb_kategori.kategori_id', '=', 'tb_barang.kategori_id')
            ->leftjoin('tb_sub_kategori', 'tb_sub_kategori.sub_id', '=', 'tb_barang.sub_id')
            ->leftjoin('tb_data_umkm', 'tb_data_umkm.umkm_id', '=', 'tb_barang.umkm_id')
            ->where('tb_barang.kategori_id', '=', $barang->kategori_id)
            ->get();

        $active = "detailProduct";
        return view(
            'frontend.page.detail_product',
            [
                'barang' => $barang,
                'gambar' => $gambar,
                'list'   => $list,
                'active' => $active
            ]
        );
    }
}
