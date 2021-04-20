<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Artikel_Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Hash;


class ArtikelController extends Controller
{
    public function index()
    {
        $artikel  = Artikel_Model::all();
        return view(
            'backend/page/artikel/index',
            [
                'artikel' => $artikel
            ]
        );
    }
    public function create()
    {
        return view(
            'backend/page/artikel/form',
            [
                'url' => 'artikel.store',
            ]
        );
    }
    public function store(Request $request, Artikel_Model $artikel)
    {
        $request->validate([
            'artikel_judul'     => 'required',
            'artikel_tanggal'   => 'required|date',
            'artikel_penulis'   => 'required',
            'artikel_isi'       => 'required',
            'artikel_gambar'    => 'required|mimes:jpg,jpeg,png,bmp',
        ]);
        $foto = $request->file('artikel_gambar');
        $filename = time() . "." . $foto->getClientOriginalExtension();
        $foto->move('img/backend/artikel/', $filename);

        $artikel->artikel_judul = $request->input('artikel_judul');
        $artikel->artikel_tanggal = $request->input('artikel_tanggal');
        $artikel->artikel_penulis = $request->input('artikel_penulis');
        $artikel->artikel_isi = $request->input('artikel_isi');
        $artikel->artikel_gambar = $filename;
        $artikel->save();

        return redirect()
            ->route('artikel')
            ->with('message', 'Data berhasil ditambahkan');
    }

    public function edit(Artikel_Model $artikel)
    {
        return view(
            'backend/page/artikel/form',
            [
                'artikel' => $artikel,
                'url' => 'artikel.update'
            ]
        );
    }
    public function update(Request $request, Artikel_Model $artikel)
    {
        $validator = Validator::make($request->all(), [
            'artikel_judul'     => 'required',
            'artikel_tanggal'   => 'required|date',
            'artikel_penulis'   => 'required',
            'artikel_isi'       => 'required',
            'artikel_gambar'    => 'mimes:jpg,jpeg,png,bmp',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('artikel.update', $artikel->artikel_id)
                ->withErrors($validator)
                ->withInput();
        } else {
            if ($request->input('artikel_gambar') != null) {
                if (!empty($artikel->artikel_gambar)) {
                    unlink('img/backend/artikel/' . $artikel->artikel_gambar);
                }
                $foto = $request->file('artikel_gambar');
                $filename = time() . "." . $foto->getClientOriginalExtension();
                $foto->move('img/backend/artikel/', $filename);
                $artikel->artikel_gambar = $filename;
            }
            $artikel->artikel_judul = $request->input('artikel_judul');
            $artikel->artikel_tanggal = $request->input('artikel_tanggal');
            $artikel->artikel_penulis = $request->input('artikel_penulis');
            $artikel->artikel_isi = $request->input('artikel_isi');
            $artikel->save();

            return redirect()
                ->route('artikel')
                ->with('message', 'Data berhasil diedit');
        }
    }
    public function destroy(Artikel_Model $artikel)
    {
        $artikel_gambar = $artikel->artikel_gambar;
        if (!empty($artikel->artikel_gambar)) {
            unlink('img/backend/artikel/' . $artikel->artikel_gambar);
        }
        $artikel->forceDelete();
        return redirect()
            ->route('artikel')
            ->with('message', 'Data berhasil dihapus');
    }
}
