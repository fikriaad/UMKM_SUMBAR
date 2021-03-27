<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Admin_Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

use function GuzzleHttp\Promise\all;

class AdminController extends Controller
{
    public function index()
    {
        $admin = DB::table('tb_admin')
            ->orderBy('admin_id')
            ->get();
        return view(
            'backend/page/admin/index',
            [
                'admin' => $admin
            ]
        );
    }

    public function create()
    {
        return view(
            'backend/page/admin/form',
            [
                'url' => 'admin.store'
            ]
        );
    }

    public function store(Request $request, Admin_Model $admin)
    {
        $validator = Validator::make($request->all(), [
            'admin_nama'         => 'required',
            'admin_email'        => 'required|email|unique:tb_admin,admin_email',
            'admin_password'     => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $password = $request->input('admin_password');
            $pwd = Hash::make($password);

            $admin->admin_nama = $request->input('admin_nama');
            $admin->admin_email = $request->input('admin_email');
            $admin->admin_password = $pwd;
            $admin->save();

            return redirect()
                ->route('admin')
                ->with('message', 'Data berhasil ditambahkan');
        }
    }


    public function edit(Admin_Model $admin)
    {
        return view(
            'backend/page/admin/form',
            [
                'admin' => $admin,
                'url' => 'admin.update',
            ]
        );
    }

    public function update(Request $request, Admin_Model $admin)
    {
        $validator = Validator::make($request->all(), [
            'admin_nama'         => 'required',
            'admin_email'         => 'required|email',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.update', $admin->admin_id)
                ->withErrors($validator)
                ->withInput();
        } else {
            if ($request->input('admin_password') != null) {
                $password = $request->input('admin_password');
                $pwd = Hash::make($password);
                $admin->admin_password = $pwd;
            }
            $admin->admin_nama = $request->input('admin_nama');
            $admin->admin_email = $request->input('admin_email');

            $admin->save();

            return redirect()
                ->route('admin')
                ->with('message', 'Data berhasil diedit');
        }
    }

    public function destroy(Admin_Model $admin)
    {
        $admin_file = $admin->admin_foto;
        unlink('img/backend/admin/' . $admin_file);
        $admin->forceDelete();
        return redirect()
            ->route('admin')
            ->with('message', 'Data berhasil dihapus');
    }
}
