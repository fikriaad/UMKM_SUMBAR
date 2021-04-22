<?php

namespace App\Http\Controllers\Umkm;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Gambar_Model;
use App\Barang_Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class GambarController extends Controller
{
    public function store(Request $request, Gambar_Model $gambar)
    {
        $request->validate([
            'gambar_foto'       => 'required|mimes:jpg,jpeg,png',
        ]);
        $foto = $request->file('gambar_foto');
        $filename = time() . "." . $foto->getClientOriginalExtension();
        $foto->move('img/frontend/gambar/', $filename);

        $gambar->barang_id = $request->barang_id;
        $gambar->gambar_foto = $filename;
        $gambar->save();

        return redirect()
            ->back()
            ->with('message', 'Data berhasil ditambahkan');
    }

    public function destroy(Gambar_Model $gambar)
    {
        $gambar_file = $gambar->gambar_foto;
        if ($gambar_file != null) {
            unlink('img/frontend/gambar/' . $gambar_file);
        }
        $gambar->forceDelete();

        return redirect()
            ->back()
            ->with('message', 'Data berhasil dihapus');
    }
}
