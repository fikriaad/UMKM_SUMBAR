<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Jenis_Model;

class JenisController extends Controller
{
    public function index()
    {
        $jenis = DB::table('tb_jenis_umkm')
            ->orderBy('jenis_id')
            ->get();
        return view(
            'backend/page/jenis/index',
            [
                'jenis' => $jenis
            ]
        );
    }
    public function create()
    {
        return view(
            'backend/page/jenis/form',
            [
                'url' => 'jenis.store'
            ]
        );
    }

    public function store(Request $request, Jenis_Model $jenis)
    {
        $validator = Validator::make($request->all(), [
            'jenis_nama'         => 'required',
            // 'jenis_gambar'         => 'required|mimes:jpg,jpeg,png,bmp',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('jenis.create')
                ->withErrors($validator)
                ->withInput();
        } else {
            // $foto = $request->file('jenis_gambar');
            // $filename = time() . "." . $foto->getClientOriginalExtension();
            // $foto->move('img/backend/jenis/', $filename);

            $jenis->jenis_nama = $request->input('jenis_nama');
            // $jenis->jenis_gambar = $filename;
            $jenis->save();

            return redirect()
                ->route('jenis')
                ->with('message', 'Data berhasil ditambahkan');
        }
    }

    public function edit(Jenis_Model $jenis)
    {
        return view(
            'backend/page/jenis/form',
            [
                'jenis' => $jenis,
                'url' => 'jenis.update',
            ]
        );
    }

    public function update(Request $request, Jenis_Model $jenis)
    {
        $validator = Validator::make($request->all(), [
            'jenis_nama'         => 'required',
            // 'jenis_gambar'         => 'mimes:jpg,jpeg,png,bmp',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('jenis.update', $jenis->jenis_id)
                ->withErrors($validator)
                ->withInput();
        } else {
            // if ($request->hasFile('jenis_gambar') != null) {
            //     unlink('img/backend/jenis/' . $jenis->jenis_gambar);
            //     $foto = $request->file('jenis_gambar');
            //     $filename = time() . "." . $foto->getClientOriginalExtension();
            //     $foto->move('img/backend/jenis/', $filename);
            //     $jenis->jenis_gambar = $filename;
            // }
            $jenis->jenis_nama = $request->input('jenis_nama');
            $jenis->save();

            return redirect()
                ->route('jenis')
                ->with('message', 'Data berhasil diedit');
        }
    }

    public function destroy(Jenis_Model $jenis)
    {
        // $jenis_file = $jenis->jenis_gambar;
        // unlink('img/backend/jenis/' . $jenis_file);
        $jenis->forceDelete();
        return redirect()
            ->route('jenis')
            ->with('message', 'Data berhasil dihapus');
    }
}
