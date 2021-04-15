<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Gambar_Model;
use App\Barang_Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class GambarController extends Controller
{
    public function index()
    {
        $gambar = DB::table('tb_gambar')
            ->join('tb_barang', 'tb_barang.barang_id', '=', 'tb_gambar.barang_id')
            ->orderBy('gambar_id')
            ->get();
        return view(
            'backend/page/gambar/index',
            [
                'gambar' => $gambar
            ]
        );
    }

    public function create()
    {
        $barang = Barang_Model::all();
        return view(
            'backend/page/gambar/form',
            [
                'url' => 'gambar.store',
                'barang' => $barang,
            ]
        );
    }

    public function store(Request $request, Gambar_Model $gambar)
    {
        $request->validate([
            'barang_id'         => 'required',
            'gambar_foto'       => 'required|mimes:jpg,jpeg,png,bmp',
        ]);
        $foto = $request->file('gambar_foto');
        $filename = time() . "." . $foto->getClientOriginalExtension();
        $foto->move('img/backend/gambar/', $filename);

        $gambar->barang_id = $request->input('barang_id');
        $gambar->gambar_foto = $filename;
        $gambar->save();

        return redirect()
            ->route('gambar')
            ->with('message', 'Data berhasil ditambahkan');
    }

    public function edit(Gambar_Model $gambar)
    {
        $gambar = Gambar_Model::all();
        $barang = Barang_Model::all();
        return view(
            'backend/page/gambar/form',
            [
                'gambar' => $gambar,
                'barang' => $barang,
                'url' => 'gambar.store'
            ]
        );
    }

    public function update(Request $request, Gambar_Model $gambar)
    {
        $validator = Validator::make($request->all(), [
            'barang_id'           => 'required',
            'gambar_foto'      => 'mimes:jpg,jpeg,png,bmp',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('gambar.update', $gambar->gambar_id)
                ->withErrors($validator)
                ->withInput();
        } else {
            if ($request->hasFile('gambar_foto') != null) {
                unlink('img/backend/gambar/' . $gambar->gambar_foto);
                $foto = $request->file('gambar_foto');
                $filename = time() . "." . $foto->getClientOriginalExtension();
                $foto->move('img/backend/gambar/', $filename);
                $gambar->gambar_foto = $filename;
            }
            $gambar->barang_id = $request->input('barang_id');
            $gambar->gambar_foto = $filename;
            $gambar->save();

            return redirect()
                ->route('gambar')
                ->with('message', 'Data berhasil diedit');
        }
    }

    public function destroy(Gambar_Model $gambar)
    {
        $gambar_file = $gambar->gambar_foto;
        if ($gambar_file != null) {
            unlink('img/frontend/gambar/' . $gambar_file);
        }
        $gambar->forceDelete();

        return redirect()
            ->route('gambar')
            ->with('message', 'Data berhasil dihapus');
    }
}
