<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Barang_Model;
use App\Kategori_Model;
use App\Umkm_Model;
use App\Sub_Kategori_Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class BarangController extends Controller
{
    public function index()
    {
        $barang  = DB::table('tb_barang')
            ->join('tb_kategori', 'tb_kategori.kategori_id', '=', 'tb_barang.kategori_id')
            ->join('tb_data_umkm', 'tb_data_umkm.umkm_id', '=', 'tb_barang.umkm_id')
            ->orderBy('barang_id')
            ->get();
        return view(
            'backend/page/barang/index',
            [
                'barang' => $barang
            ]
        );
    }

    public function create()
    {
        $kategori = Kategori_Model::all();
        $sub = Sub_Kategori_Model::all();
        $umkm = Umkm_Model::all();
        return view(
            'backend/page/barang/form',
            [
                'url' => 'barang.store',
                'kategori' => $kategori,
                'sub' => $sub,
                'umkm' => $umkm
            ]
        );
    }

    public function store(Request $request, Barang_Model $barang)
    {
        $request->validate([
            'umkm_id'           => 'required',
            'kategori_id'           => 'required',
            'sub_id'           => 'required',
            'barang_nama'           => 'required',
            'barang_harga'          => 'required|numeric',
            'barang_keterangan'     => 'required',
        ]);

        $barang->umkm_id = $request->input('umkm_id');
        $barang->kategori_id = $request->input('kategori_id');
        $barang->sub_id = $request->input('sub_id');
        $barang->barang_nama = $request->input('barang_nama');
        $barang->barang_harga = $request->input('barang_harga');
        $barang->barang_keterangan = $request->input('barang_keterangan');
        $barang->save();

        return redirect()
            ->route('barang')
            ->with('message', 'Data berhasil ditambahkan');
    }

    public function edit(Barang_Model $barang)
    {
        // $barang = Barang_Model::all();
        $kategori = Kategori_Model::all();
        $umkm = Umkm_Model::all();
        return view(
            'backend/page/barang/form',
            [
                'barang' => $barang,
                'umkm' => $umkm,
                'kategori' => $kategori,
                'url' => 'barang.store'
            ]
        );
    }

    public function update(Request $request, Barang_Model $barang)
    {
        $validator = Validator::make($request->all(), [
            'umkm_id'           => 'required',
            'kategori_id'           => 'required',
            'barang_nama'           => 'required',
            'barang_harga'          => 'required|numeric',
            'barang_facebook'       => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('barang.update', $barang->barang_id)
                ->withErrors($validator)
                ->withInput();
        } else {
            $barang->umkm_id = $request->input('umkm_id');
            $barang->kategori_id = $request->input('kategori_id');
            $barang->barang_nama = $request->input('barang_nama');
            $barang->barang_harga = $request->input('barang_harga');
            $barang->barang_keterangan = $request->input('barang_keterangan');
            $barang->save();

            return redirect()
                ->route('barang')
                ->with('message', 'Data berhasil diedit');
        }
    }

    public function destroy(Barang_Model $barang)
    {
        $barang->forceDelete();

        return redirect()
            ->route('barang')
            ->with('message', 'Data berhasil dihapus');
    }
    
    public function carisub(Request $request)
    {
        $sub = DB::table('tb_sub_kategori')
            ->where('kategori_id', '=', $request->kategori_id)
            ->get();
        // dd($sub);
        return response()->json([
            'sub' => $sub,
        ], 200);
    }
}
