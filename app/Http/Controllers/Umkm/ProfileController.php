<?php

namespace App\Http\Controllers\Umkm;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Umkm_Model;
use App\Kategori_Model;
use App\Provinsi_Model;
use App\Kota_Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Helper\SlugHelper;

class ProfileController extends Controller
{
    function index()
    {
        // dd(session()->get('umkm_id'));
        $umkm  = DB::table('tb_data_umkm')
            ->leftjoin('tb_kategori', 'tb_kategori.kategori_id', '=', 'tb_data_umkm.kategori_id')
            ->leftjoin('tb_provinsi', 'tb_provinsi.prov_id', '=', 'tb_data_umkm.prov_id')
            ->leftjoin('tb_kota', 'tb_kota.kota_id', '=', 'tb_data_umkm.kota_id')
            ->where('umkm_id', '=', session()->get('umkm_id'))
            ->first();
        $kategori = Kategori_Model::all();
        $prov = Provinsi_Model::all();
        $kota = Kota_Model::all();
        $active = "profile";
        return view(
            'frontend/umkm/profile/index',
            [
                'profile' => 'profile-umkm.profile',
                'pemilik' => 'profile-umkm.pemilik',
                'akun' => 'profile-umkm.akun',
                'umkm' => $umkm,
                'kategori' => $kategori,
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
    public function profileUpdate(Request $request, Umkm_Model $umkm)
    {
        $validator = Validator::make($request->all(), [
            'umkm_nama'         => 'required',
            'kategori_id'          => 'required',
            'umkm_lama_usaha'   => 'required',
            'umkm_nohp'         => 'required|numeric',
            'prov_id'           => 'required',
            'kota_id'           => 'required',
            'umkm_alamat'       => 'required',
            'umkm_foto'         => 'mimes:jpg,jpeg,png,bmp',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('profile-umkm.profile', $umkm->umkm_id)
                ->withErrors($validator)
                ->withInput();
        } else {
            if ($request->hasFile('umkm_foto') != null) {
                if (!empty($umkm->umkm_foto)) {
                    unlink('img/frontend/logo_umkm/' . $umkm->umkm_foto);
                }
                $foto = $request->file('umkm_foto');
                $filename = time() . "." . $foto->getClientOriginalExtension();
                $foto->move('img/frontend/logo_umkm/', $filename);
                $umkm->umkm_foto = $filename;
            }
            $slug = SlugHelper::seo_title($request->input('umkm_nama'));

            $umkm->umkm_nama = $request->input('umkm_nama');
            $umkm->kategori_id = $request->input('kategori_id');
            $umkm->umkm_lama_usaha = $request->input('umkm_lama_usaha');
            $umkm->umkm_nohp = $request->input('umkm_nohp');
            $umkm->prov_id = $request->input('prov_id');
            $umkm->kota_id = $request->input('kota_id');
            $umkm->umkm_alamat = $request->input('umkm_alamat');
            $umkm->umkm_slug = $slug .  "-" . rand(100, 10000);
            $umkm->save();

            return redirect()
                ->route('profile-umkm')
                ->with('message', 'Data berhasil diedit');
        }
    }

    public function pemilikUpdate(Request $request, Umkm_Model $umkm)
    {
        $validator = Validator::make($request->all(), [
            'pemilik'           => 'required',
            'pemilik_tgl_lahir' => 'required|date',
            'pemilik_nohp'      => 'required|numeric',
            'pemilik_alamat'    => 'required',
            'pemilik_ktp'       => 'mimes:jpg,jpeg,png,bmp',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('profile-umkm')
                ->withErrors($validator)
                ->withInput();
        } else {
            if ($request->hasFile('pemilik_ktp') != null) {
                if (!empty($umkm->pemilik_ktp)) {
                    unlink('img/frontend/logo_umkm/' . $umkm->pemilik_ktp);
                }
                $ktp = $request->file('pemilik_ktp');
                $filektp = "ktp" . time() . "." . $ktp->getClientOriginalExtension();
                $ktp->move('img/frontend/logo_umkm/', $filektp);
                $umkm->pemilik_ktp = $filektp;
            }

            $umkm->pemilik = $request->input('pemilik');
            $umkm->pemilik_tgl_lahir = $request->input('pemilik_tgl_lahir');
            $umkm->pemilik_nohp = $request->input('pemilik_nohp');
            $umkm->pemilik_alamat = $request->input('pemilik_alamat');
            $umkm->save();

            return redirect()
                ->route('profile-umkm')
                ->with('message', 'Data berhasil diedit');
        }
    }

    public function akunUpdate(Request $request, Umkm_Model $umkm)
    {
        $validator = Validator::make($request->all(), [
            'umkm_email'        => [
                'required',
                Rule::unique('tb_data_umkm')->ignore($umkm->umkm_id, 'umkm_id'),
            ],
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('profile-umkm', '#akun')
                ->withErrors($validator)
                ->withInput();
        } else {
            if ($request->input('umkm_password') != null) {
                $password = $request->input('umkm_password');
                $pwd = Hash::make($password);
                $umkm->umkm_password = $pwd;
            }

            $umkm->umkm_email = $request->input('umkm_email');
            $umkm->save();

            return redirect()
                ->route('profile-umkm')
                ->with('message', 'Data berhasil diedit');
        }
    }
}
