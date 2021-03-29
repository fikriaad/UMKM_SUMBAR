<?php

namespace App\Http\Controllers\Backend;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Kategori_Model;
use App\Sub_Kategori_Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class SubController extends Controller
{
    public function index()
    {
        $sub  = DB::table('tb_sub_kategori')
            ->join('tb_kategori', 'tb_kategori.kategori_id', '=', 'tb_sub_kategori.kategori_id')
            ->get();
        return view(
            'backend/page/sub_kategori/index',
            [
                'sub' => $sub
            ]
        );
    }
    public function create()
    {
        $kategori = Kategori_Model::all();
        return view(
            'backend/page/sub_kategori/form',
            [
                'url' => 'sub.store',
                'kategori' => $kategori,
            ]
        );
    }
    public function store(Request $request, Sub_Kategori_Model $sub)
    {
        $request->validate([
            'kategori_id'        => 'required',
            'sub_nama'           => 'required',
            'sub_gambar'         => 'required|mimes:jpg,jpeg,png,bmp',
        ]);
        $foto = $request->file('sub_gambar');
        $filename = time() . "." . $foto->getClientOriginalExtension();
        $foto->move('img/backend/sub/', $filename);

        $sub->kategori_id = $request->input('kategori_id');
        $sub->sub_nama = $request->input('sub_nama');
        $sub->sub_gambar = $filename;
        $sub->save();

        return redirect()
            ->route('sub')
            ->with('message', 'Data berhasil ditambahkan');
    }

    public function edit(Sub_Kategori_Model $sub)
    {
        // $sub = Sub_Kategori_Model::all();
        $kategori = Kategori_Model::all();
        // $sub = Sub_Kategori_Model::all();
        return view(
            'backend/page/sub_kategori/form',
            [
                'sub' => $sub,
                'kategori' => $kategori,
                'url' => 'sub.update'
            ]
        );
    }

    public function update(Request $request, Sub_Kategori_Model $sub)
    {
        $validator = Validator::make($request->all(), [
            'kategori_id'           => 'required',
            'sub_nama'           => 'required',
            'sub_gambar'       => 'mimes:jpg,jpeg,png,bmp',
        ]);
        if ($validator->fails()) {
            // dd($validator);
            return redirect()
                ->route('sub.update', $sub->sub_id)
                ->withErrors($validator)
                ->withInput();
        } else {
            if ($request->hasFile('sub_gambar') != null) {
                unlink('img/backend/sub/' . $sub->sub_gambar);
                $foto = $request->file('sub_gambar');
                $filename = time() . "." . $foto->getClientOriginalExtension();
                $foto->move('img/backend/sub/', $filename);
                $sub->sub_gambar = $filename;
            }
            $sub->kategori_id = $request->input('kategori_id');
            $sub->sub_nama = $request->input('sub_nama');
            $sub->save();

            return redirect()
                ->route('sub')
                ->with('message', 'Data berhasil diedit');
        }
    }

    public function destroy(Sub_Kategori_Model $sub)
    {
        $sub_file = $sub->sub_gambar;
        unlink('img/backend/sub/' . $sub_file);
        $sub->forceDelete();

        return redirect()
            ->route('sub')
            ->with('message', 'Data berhasil dihapus');
    }
}
