<?php

namespace App\Http\Controllers\Umkm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Barang_Model;
use App\Umkm_Model;
use App\Kategori_Model;
use App\Sub_Kategori_Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Helper\JwtHelper;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    function index()
    {
        $barang  = DB::table('tb_barang')
            ->leftjoin('tb_kategori', 'tb_kategori.kategori_id', '=', 'tb_barang.kategori_id')
            ->select('tb_barang.*','tb_kategori.kategori_nama')
            ->get();

        $active = "product";
        $kategori = Kategori_Model::all();
        
        return view('frontend/umkm/product/index',
        [
            'active' => $active,
            'barang' => $barang,
            'kategori' => $kategori,
        ]);
    }

    public function store(Request $request, Barang_Model $barang)
    {
        $validator = Validator::make($request->all(),[
            'kategori_id'           => 'required',
            'barang_nama'           => 'required',
            'barang_harga'          => 'required|numeric',
            'barang_keterangan'     => 'required',
            'barang_gambar'         => 'required|mimes:jpg,jpeg,png'
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('product-store')
                ->withErrors($validator)
                ->withInput();
        } else {
            $foto = $request->file('barang_gambar');
            $filename = time() . "." . $foto->getClientOriginalExtension();
            $foto->move('img/frontend/product/', $filename);

            $barang->umkm_id = session()->get('umkm_id');
            $barang->kategori_id = $request->input('kategori_id');
            $barang->barang_nama = $request->input('barang_nama');
            $barang->barang_harga = $request->input('barang_harga');
            $barang->barang_keterangan = $request->input('barang_keterangan');
            $barang->barang_gambar = $filename;
            $barang->save();

            return redirect()
                ->route('product-umkm')
                ->with('message', 'Data berhasil ditambahkan');
        }
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

    public function cari_data_produk(Request $request)
    {

        $data = DB::table('tb_barang')
                ->where('barang_id','=',$request->barang_id)
                ->first();

        return json_encode($data);
    }
}
