<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Kategori_Model;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = DB::table('tb_kategori')->get();
        return view(
            'backend/page/kategori/index',
            [
                'kategori' => $kategori
            ]
        );
    }
    public function create()
    {
        return view(
            'backend/page/kategori/form',
            [
                'url' => 'kategori.store'
            ]
        );
    }

    public function store(Request $request, Kategori_Model $kategori)
    {
        $validator = Validator::make($request->all(), [
            'kategori_nama'         => 'required',
            'kategori_gambar'         => 'required|mimes:jpg,jpeg,png,bmp',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('kategori.create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $foto = $request->file('kategori_gambar');
            $filename = time() . "." . $foto->getClientOriginalExtension();
            $foto->move('img/backend/kategori/', $filename);

            $kategori->kategori_nama = $request->input('kategori_nama');
            $kategori->kategori_gambar = $filename;
            $kategori->save();

            return redirect()
                ->route('kategori')
                ->with('message', 'Data berhasil ditambahkan');
        }
    }

    public function edit(Kategori_Model $kategori)
    {
        return view(
            'backend/page/kategori/form',
            [
                'kategori' => $kategori,
                'url' => 'kategori.update',
            ]
        );
    }

    public function update(Request $request, Kategori_Model $kategori)
    {
        $validator = Validator::make($request->all(), [
            'kategori_nama'         => 'required',
            'kategori_gambar'         => 'mimes:jpg,jpeg,png,bmp',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('kategori.update', $kategori->kategori_id)
                ->withErrors($validator)
                ->withInput();
        } else {
            if ($request->hasFile('kategori_gambar') != null) {
                unlink('img/backend/kategori/' . $kategori->kategori_gambar);
                $foto = $request->file('kategori_gambar');
                $filename = time() . "." . $foto->getClientOriginalExtension();
                $foto->move('img/backend/kategori/', $filename);
                $kategori->kategori_gambar = $filename;
            }
            $kategori->kategori_nama = $request->input('kategori_nama');
            $kategori->save();

            return redirect()
                ->route('kategori')
                ->with('message', 'Data berhasil diedit');
        }
    }

    public function destroy(Kategori_Model $kategori)
    {
        $kategori_file = $kategori->kategori_gambar;
        unlink('img/backend/kategori/' . $kategori_file);
        $kategori->forceDelete();
        return redirect()
            ->route('kategori')
            ->with('message', 'Data berhasil dihapus');
    }
}
