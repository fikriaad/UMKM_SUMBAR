<?php

namespace App\Http\Controllers\Umkm;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Umkm_Model;
use App\Jenis_Model;
use App\Provinsi_Model;
use App\Kota_Model;

class ProfileController extends Controller
{
    function index()
    {
        // dd(session()->get('umkm_id'));
        $umkm  = DB::table('tb_data_umkm')
            ->leftjoin('tb_jenis_umkm', 'tb_jenis_umkm.jenis_id', '=', 'tb_data_umkm.jenis_id')
            ->leftjoin('tb_provinsi', 'tb_provinsi.prov_id', '=', 'tb_data_umkm.prov_id')
            ->leftjoin('tb_kota', 'tb_kota.kota_id', '=', 'tb_data_umkm.kota_id')
            ->where('umkm_id', '=', session()->get('umkm_id'))
            ->first();
        $jenis = Jenis_Model::all();
        $prov = Provinsi_Model::all();
        $kota = Kota_Model::all();
        $active = "profile";
        return view(
            'frontend/umkm/profile/index',
            [
                'umkm' => $umkm,
                'jenis' => $jenis,
                'prov' => $prov,
                'kota' => $kota,
                'active' => $active
            ]
        );
    }
    public function carikota(Request $request)
    {
        $kota = DB::table('tb_kota')
            ->where('prov_id', '=', $request->prov_id)
            ->get();
        // dd($kota);
        return response()->json([
            'kota' => $kota,
        ], 200);
    }
}
