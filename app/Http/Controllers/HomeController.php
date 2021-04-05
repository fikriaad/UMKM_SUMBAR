<?php

namespace App\Http\Controllers;

use App\Barang_Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Slider_Model;
use App\Kategori_Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        $slider = Slider_Model::all();
        $kategori = Kategori_Model::all();
        $active = "home";
        return view(
            'frontend.page.home',
            [
                'active' => $active,
                'kategori' => $kategori,
                'slider' => $slider
            ]
        );
    }

    public function product()
    {
        $active = "product";
        return view(
            'frontend.page.product',
            [
                'active' => $active
            ]
        );
    }

    public function listUmkm()
    {
        $active = "listUmkm";
        return view(
            'frontend.page.umkm',
            [
                'active' => $active
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
