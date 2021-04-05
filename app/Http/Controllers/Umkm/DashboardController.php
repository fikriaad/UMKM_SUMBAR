<?php

namespace App\Http\Controllers\Umkm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Umkm_Model;
use App\Jenis_Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
        $jenis = Jenis_Model::all();
        return view('frontend/auth/register',
    [
        'jenis' => $jenis
    ]);
    }
    public function registerAdmin(Request $r)
    {
        $pemilik = $r->pemilik;
        $pemilik_nohp = $r->pemilik_nohp;
        $umkm_nama = $r->umkm_nama;
        $jenis_id = $r->jenis_id;
        $umkm_alamat = $r->umkm_alamat;
        $umkm_email = $r->umkm_email;
        $umkm_password = $r->umkm_password;
        $pwd = Hash::make($umkm_password);


        $data = array(
            'pemilik' => $pemilik,
            'pemilik_nohp' => $pemilik_nohp,
            'umkm_nama' => $umkm_nama,
            'jenis_id' => $jenis_id,
            'umkm_alamat' => $umkm_alamat,
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
        return view('frontend/umkm/home',
        [
            'active' => $active
        ]);
    }
}