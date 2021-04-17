<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin_Model;
use Illuminate\Support\Facades\Hash;
use App\Helper\JwtHelper;

use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        return view('backend/auth/login');
    }

    public function loginAdmin(Request $request)
    {
        // cek data login
        $user = new Admin_Model();
        $data_user = $user->CheckLoginAdmin($request->input("admin_email"), $request->input("admin_password"));
        $token = JwtHelper::BuatToken($data_user);
        // dd($data_user);
        if ($data_user) {
            // masukan data login ke session
            $request->session()->put('admin_email', $data_user->admin_email);
            $request->session()->put('token_backend', $token);
            // redirect ke halaman home
            // dd(session('admin_username'));
            return redirect('backend')->with("pesan", "Selamat datang " . session('admin_email'));
        } else {
            return back()->with("pesan", "Username atau Password Salah");
        }
    }
    public function register()
    {
        return view('backend/auth/register');
    }
    public function registerAdmin(Request $r)
    {
        $admin_nama = $r->admin_nama;
        $admin_email = $r->admin_email;
        $admin_password = $r->admin_password;
        $pwd = Hash::make($admin_password);


        $data = array(
            'admin_nama' => $admin_nama,
            'admin_email' => $admin_email,
            'admin_password' => $pwd,
        );
        DB::table('tb_admin')->insert($data);
        return redirect('backend')->with("pesan", "Register Sukses");
    }
    function logout(Request $request)
    {
        $request->session()->forget('admin_nama');
        $request->session()->forget('admin_email');
        $request->session()->forget('token');
        // redirect ke halaman home
        return redirect('backend')->with("pesan", "Anda Sudah Logout");
    }
    function dashboard()
    {
        return view('backend/page/home');
    }
}
