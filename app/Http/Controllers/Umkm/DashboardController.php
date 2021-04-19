<?php

namespace App\Http\Controllers\Umkm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Umkm_Model;
use App\Kategori_Model;
use App\Provinsi_Model;
use App\Kota_Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Helper\JwtHelper;

class DashboardController extends Controller
{
    public function index()
    {
        return view('frontend/auth/login');
    }

    public function loginAdmin(Request $request)
    {
        // cek data login
        $user = new Umkm_Model();
        $data_user = $user->CheckLoginUmkm($request->input("umkm_email"), $request->input("umkm_password"));
        $token = JwtHelper::BuatToken($data_user);
        // dd($data_user);
        if ($data_user) {
            // masukan data login ke session
            $request->session()->put('umkm_email', $data_user->umkm_email);
            $request->session()->put('umkm_id', $data_user->umkm_id);
            $request->session()->put('kategori_id', $data_user->kategori_id);
            $request->session()->put('umkm_status', $data_user->umkm_status);
            $request->session()->put('token', $token);
            // redirect ke halaman home
            // dd(session('admin_username'));
            return redirect('umkm')->with("pesan", "Selamat datang " . session('umkm_email'));
        } else {
            return back()->with("pesan", "Username atau Password Salah");
        }
    }
    public function register()
    {
        $kategori = Kategori_Model::all();
        $prov = Provinsi_Model::all();
        return view('frontend/auth/register',
    [
        'kategori' => $kategori,
        'prov' => $prov
    ]);
    }
    public function registerAdmin(Request $r, Umkm_Model $umkm)
    {
        $validator = $r->validate([
            'umkm_password'       => 'required|min:8',
            'umkm_nohp'          => 'required|numeric',
            'umkm_email'          => 'required|email',
            ]);
        // dd($validator->fails());

        // if ($validator->fails()) {
        //     return redirect()
        //         ->route('register-umkm')
        //         ->withErrors($validator)
        //         ->withInput();
        // } 
        $filename = "avatar5.png";
        $pemilik = $r->pemilik;
        $umkm_nohp = $r->umkm_nohp;
        $umkm_nama = $r->umkm_nama;
        $kategori_id = $r->kategori_id;
        $prov_id = $r->prov_id;
        $kota_id = $r->kota_id;
        $umkm_alamat = $r->umkm_alamat;
        $umkm_email = $r->umkm_email;
        $umkm_password = $r->umkm_password;
        $pwd = Hash::make($umkm_password);


        $data = array(
            'pemilik' => $pemilik,
            'umkm_nohp' => $umkm_nohp,
            'umkm_nama' => $umkm_nama,
            'kategori_id' => $kategori_id,
            'prov_id' => $prov_id,
            'kota_id' => $kota_id,
            'umkm_alamat' => $umkm_alamat,
            'umkm_foto' => $filename,
            'umkm_email' => $umkm_email,
            'umkm_password' => $pwd,
        );
        DB::table('tb_data_umkm')->insert($data);
        return redirect('umkm')->with("pesan", "Register Sukses");
    }
    function logout(Request $request)
    {
        $request->session()->forget('umkm_email');
        $request->session()->forget('token');
        // redirect ke halaman home
        return redirect('umkm')->with("pesan", "Anda Sudah Logout");
    }
    function dashboard()
    {
        $active = "home";
        $wa = "https://api.whatsapp.com/send?phone=";
        $umkm = DB::table('tb_data_umkm')
                ->leftjoin('tb_kategori', 'tb_kategori.kategori_id', '=', 'tb_data_umkm.kategori_id')
                ->leftjoin('tb_kota', 'tb_kota.kota_id', '=', 'tb_data_umkm.kota_id')
                ->leftjoin('tb_provinsi', 'tb_provinsi.prov_id', '=', 'tb_data_umkm.prov_id')
                ->where('umkm_id','=', session('umkm_id'))
                ->first();
        $product = DB::table('tb_barang')
                ->leftjoin('tb_kategori', 'tb_kategori.kategori_id', '=', 'tb_barang.kategori_id')
                ->leftjoin('tb_sub_kategori', 'tb_sub_kategori.sub_id', '=', 'tb_barang.sub_id')
                ->leftjoin('tb_data_umkm', 'tb_data_umkm.umkm_id', '=', 'tb_barang.umkm_id')
                ->where('tb_barang.umkm_id', '=', session('umkm_id'))
                ->get();
        $sub = DB::table('tb_sub_kategori')
                ->leftjoin('tb_kategori', 'tb_kategori.kategori_id', '=', 'tb_sub_kategori.kategori_id')
                ->where('tb_sub_kategori.kategori_id', '=', $umkm->kategori_id)
                ->get();

        return view('frontend/umkm/home',
        [
            'active' => $active,
            'sub' => $sub,
            'product' => $product,
            'wa' => $wa,
            'umkm' => $umkm
        ]);
    }

    public function contact()
    {
        $active = "contact";
        return view(
            'frontend.umkm.contact',
            [
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