<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Umkm_Model;
use App\Kategori_Model;
use App\Provinsi_Model;
use App\Kota_Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Helper\SlugHelper;

class UmkmController extends Controller
{
    public function index()
    {
        $umkmv  = DB::table('tb_data_umkm')
            ->leftjoin('tb_kategori', 'tb_kategori.kategori_id', '=', 'tb_data_umkm.kategori_id')
            ->leftjoin('tb_provinsi', 'tb_provinsi.prov_id', '=', 'tb_data_umkm.prov_id')
            ->leftjoin('tb_kota', 'tb_kota.kota_id', '=', 'tb_data_umkm.kota_id')
            ->orderBy('umkm_id')
            ->where('umkm_status', '=', '1')
            ->get();
        $umkmb  = DB::table('tb_data_umkm')
            ->leftjoin('tb_kategori', 'tb_kategori.kategori_id', '=', 'tb_data_umkm.kategori_id')
            ->leftjoin('tb_provinsi', 'tb_provinsi.prov_id', '=', 'tb_data_umkm.prov_id')
            ->leftjoin('tb_kota', 'tb_kota.kota_id', '=', 'tb_data_umkm.kota_id')
            ->orderBy('umkm_id')
            ->where('umkm_status', '=', '0')
            ->get();
        return view(
            'backend/page/umkm/index',
            [
                'umkmv' => $umkmv,
                'umkmb' => $umkmb

            ]
        );
    }

    public function create()
    {
        $kategori = Kategori_Model::all();
        $prov = Provinsi_Model::all();
        $kota = Kota_Model::all();
        return view(
            'backend/page/umkm/form',
            [
                'url' => 'umkm.store',
                'kategori' => $kategori,
                'prov' => $prov,
                'kota' => $kota
            ]
        );
    }

    public function store(Request $request, Umkm_Model $umkm)
    {
        $validator = Validator::make($request->all(), [
            'pemilik'           => 'required',
            'pemilik_tgl_lahir' => 'required',
            'pemilik_nohp'      => 'required|numeric',
            'pemilik_alamat'    => 'required',
            'pemilik_ktp'       => 'required|mimes:jpg,jpeg,png,bmp',
            'umkm_nama'         => 'required',
            'kategori_id'       => 'required',
            'umkm_lama_usaha'   => 'required',
            'umkm_nohp'         => 'required|numeric',
            'prov_id'           => 'required',
            'kota_id'           => 'required',
            'umkm_alamat'       => 'required',
            'umkm_email'        => [
                'required',
                Rule::unique('tb_data_umkm')->ignore($umkm),
            ],
            'umkm_password'     => 'required',
            'umkm_instagram'    => 'required',
            'umkm_facebook'     => 'required',
            'umkm_password'     => 'required',
            'umkm_foto'         => 'required|mimes:jpg,jpeg,png,bmp',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('umkm.create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $password = $request->input('umkm_password');
            $pwd = Hash::make($password);
            //pemilik
            $ktp = $request->file('pemilik_ktp');
            $filektp = "ktp" . time() . "." . $ktp->getClientOriginalExtension();
            $ktp->move('img/frontend/logo_umkm/', $filektp);
            //umkm
            $foto = $request->file('umkm_foto');
            $filename = "logo" . time() . "." . $foto->getClientOriginalExtension();
            $foto->move('img/frontend/logo_umkm/', $filename);

            $slug = SlugHelper::seo_title($request->input('umkm_nama'));
            //Pemilik
            $umkm->pemilik = $request->input('pemilik');
            $umkm->pemilik_tgl_lahir = $request->input('pemilik_tgl_lahir');
            $umkm->pemilik_nohp = $request->input('pemilik_nohp');
            $umkm->pemilik_alamat = $request->input('pemilik_alamat');
            $umkm->pemilik_ktp = $filektp;

            //UMKM
            $umkm->umkm_nama = $request->input('umkm_nama');
            $umkm->kategori_id = $request->input('kategori_id');
            $umkm->umkm_lama_usaha = $request->input('umkm_lama_usaha');
            $umkm->umkm_nohp = $request->input('umkm_nohp');
            $umkm->prov_id = $request->input('prov_id');
            $umkm->kota_id = $request->input('kota_id');
            $umkm->umkm_alamat = $request->input('umkm_alamat');
            $umkm->umkm_email = $request->input('umkm_email');
            $umkm->umkm_password = $pwd;
            $umkm->umkm_instagram = $request->input('umkm_instagram');
            $umkm->umkm_facebook = $request->input('umkm_facebook');
            $umkm->umkm_foto = $filename;
            $umkm->umkm_status = "0";
            $umkm->umkm_slug = $slug .  "-" . rand(100, 10000);

            $umkm->save();

            return redirect()
                ->route('umkm')
                ->with('message', 'Data berhasil ditambahkan');
        }
    }

    public function edit(Umkm_Model $umkm)
    {
        $kategori = Kategori_Model::all();
        $prov = Provinsi_Model::all();
        $kota = Kota_Model::all();
        return view(
            'backend/page/umkm/form',
            [
                'umkm' => $umkm,
                'kategori' => $kategori,
                'prov' => $prov,
                'kota' => $kota,
                'url' => 'umkm.update'
            ]
        );
    }

    public function update(Request $request, Umkm_Model $umkm)
    {
        $validator = Validator::make($request->all(), [
            'pemilik'           => 'required',
            'pemilik_tgl_lahir' => 'required|date',
            'pemilik_nohp'      => 'required|numeric',
            'pemilik_alamat'    => 'required',
            'pemilik_ktp'       => 'mimes:jpg,jpeg,png,bmp',
            'umkm_nama'         => 'required',
            'kategori_id'       => 'required',
            'umkm_lama_usaha'   => 'required',
            'umkm_nohp'         => 'required|numeric',
            'prov_id'           => 'required',
            'kota_id'           => 'required',
            'umkm_alamat'       => 'required',
            'umkm_email'        => [
                'required',
                Rule::unique('tb_data_umkm')->ignore($umkm),
            ],
            'umkm_password'     => 'required',
            'umkm_foto'         => 'mimes:jpg,jpeg,png,bmp',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('umkm.update', $umkm->umkm_id)
                ->withErrors($validator)
                ->withInput();
        } else {
            if ($request->input('umkm_password') != null && $request->hasFile('umkm_foto') == null && $request->hasFile('pemilik_ktp') == null) {
                $password = $request->input('umkm_password');
                $pwd = Hash::make($password);
                $umkm->umkm_password = $pwd;
            } elseif ($request->input('umkm_password') == null && $request->hasFile('umkm_foto') != null && $request->hasFile('pemilik_ktp') == null) {
                if (!empty($umkm->umkm_foto)) {
                    unlink('img/frontend/logo_umkm/' . $umkm->umkm_foto);
                }
                $foto = $request->file('umkm_foto');
                $filename = "logo" . time() . "." . $foto->getClientOriginalExtension();
                $foto->move('img/frontend/logo_umkm/', $filename);
                $umkm->umkm_foto = $filename;
            } elseif ($request->input('umkm_password') == null && $request->hasFile('umkm_foto') == null && $request->hasFile('pemilik_ktp') != null) {
                if (!empty($umkm->pemilik_ktp)) {
                    unlink('img/frontend/logo_umkm/' . $umkm->pemilik_ktp);
                }
                $ktp = $request->file('pemilik_ktp');
                $filektp = "ktp" . time() . "." . $ktp->getClientOriginalExtension();
                $ktp->move('img/frontend/logo_umkm/', $filektp);
                $umkm->pemilik_ktp = $filektp;
            } elseif ($request->input('umkm_password') != null && $request->hasFile('umkm_foto') != null && $request->hasFile('pemilik_ktp') == null) {
                $password = $request->input('umkm_password');
                $pwd = Hash::make($password);
                $umkm->umkm_password = $pwd;
                if (!empty($umkm->umkm_foto)) {
                    unlink('img/frontend/logo_umkm/' . $umkm->umkm_foto);
                }
                $foto = $request->file('umkm_foto');
                $filename = "logo" . time() . "." . $foto->getClientOriginalExtension();
                $foto->move('img/frontend/logo_umkm/', $filename);
                $umkm->umkm_foto = $filename;
            } elseif ($request->input('umkm_password') != null && $request->hasFile('umkm_foto') == null && $request->hasFile('pemilik_ktp') != null) {
                $password = $request->input('umkm_password');
                $pwd = Hash::make($password);
                $umkm->umkm_password = $pwd;
                if (!empty($umkm->pemilik_ktp)) {
                    unlink('img/frontend/logo_umkm/' . $umkm->pemilik_ktp);
                }
                $ktp = $request->file('pemilik_ktp');
                $filektp = "ktp" . time() . "." . $ktp->getClientOriginalExtension();
                $ktp->move('img/frontend/logo_umkm/', $filektp);
                $umkm->pemilik_ktp = $filektp;
            } elseif ($request->input('umkm_password') == null && $request->hasFile('umkm_foto') != null && $request->hasFile('pemilik_ktp') != null) {
                if (!empty($umkm->umkm_foto)) {
                    unlink('img/frontend/logo_umkm/' . $umkm->umkm_foto);
                }
                $foto = $request->file('umkm_foto');
                $filename = "logo" . time() . "." . $foto->getClientOriginalExtension();
                $foto->move('img/frontend/logo_umkm/', $filename);
                $umkm->umkm_foto = $filename;
                if (!empty($umkm->pemilik_ktp)) {
                    unlink('img/frontend/logo_umkm/' . $umkm->pemilik_ktp);
                }
                $ktp = $request->file('pemilik_ktp');
                $filektp = "ktp" . time() . "." . $ktp->getClientOriginalExtension();
                $ktp->move('img/frontend/logo_umkm/', $filektp);
                $umkm->pemilik_ktp = $filektp;
            } elseif ($request->input('umkm_password') != null && $request->hasFile('umkm_foto') != null && $request->hasFile('pemilik_ktp') != null) {
                $password = $request->input('umkm_password');
                $pwd = Hash::make($password);
                $umkm->umkm_password = $pwd;
                if (!empty($umkm->umkm_foto)) {
                    unlink('img/frontend/logo_umkm/' . $umkm->umkm_foto);
                }
                $foto = $request->file('umkm_foto');
                $filename = "logo" . time() . "." . $foto->getClientOriginalExtension();
                $foto->move('img/frontend/logo_umkm/', $filename);
                $umkm->umkm_foto = $filename;
                if (!empty($umkm->pemilik_ktp)) {
                    unlink('img/frontend/logo_umkm/' . $umkm->pemilik_ktp);
                }
                $ktp = $request->file('pemilik_ktp');
                $filektp = "ktp" . time() . "." . $ktp->getClientOriginalExtension();
                $ktp->move('img/frontend/logo_umkm/', $filektp);
                $umkm->pemilik_ktp = $filektp;
            }
            $slug = SlugHelper::seo_title($request->input('umkm_nama'));

            //pemilik
            $umkm->pemilik = $request->input('pemilik');
            $umkm->pemilik_tgl_lahir = $request->input('pemilik_tgl_lahir');
            $umkm->pemilik_nohp = $request->input('pemilik_nohp');
            $umkm->pemilik_alamat = $request->input('pemilik_alamat');
            //umkm
            $umkm->umkm_nama = $request->input('umkm_nama');
            $umkm->kategori_id = $request->input('kategori_id');
            $umkm->umkm_lama_usaha = $request->input('umkm_lama_usaha');
            $umkm->umkm_nohp = $request->input('umkm_nohp');
            $umkm->prov_id = $request->input('prov_id');
            $umkm->kota_id = $request->input('kota_id');
            $umkm->umkm_alamat = $request->input('umkm_alamat');
            $umkm->umkm_email = $request->input('umkm_email');
            $umkm->umkm_instagram = $request->input('umkm_instagram');
            $umkm->umkm_facebook = $request->input('umkm_facebook');
            $umkm->umkm_slug = $slug .  "-" . rand(100, 10000);
            $umkm->save();

            return redirect()
                ->route('umkm')
                ->with('message', 'Data berhasil diedit');
        }
    }

    public function destroy(Umkm_Model $umkm)
    {
        if (!empty($umkm->pemilik_ktp)) {
            unlink('img/frontend/logo_umkm/' . $umkm->pemilik_ktp);
        }
        if (!empty($umkm->umkm_foto)) {
            unlink('img/frontend/logo_umkm/' . $umkm->umkm_foto);
        }
        $umkm->forceDelete();

        return redirect()
            ->route('umkm')
            ->with('message', 'Data berhasil dihapus');
    }


    public function aktif(Request $request)
    {
        DB::table('tb_data_umkm')
            ->where('umkm_id', $request->id)
            ->update(['umkm_status' => 1]);
        return response()->json([
            'message' => 'UMKM TELAH AKTIF',
        ], 200);
    }
    public function mati(Request $request)
    {
        DB::table('tb_data_umkm')
            ->where('umkm_id', $request->id)
            ->update(['umkm_status' => 0]);
        return response()->json([
            'message' => 'UMKM TELAH DI NONAKTIFKAN',
        ], 200);
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
