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
                    ->leftjoin('tb_sub_kategori', 'tb_sub_kategori.sub_id', '=', 'tb_barang.sub_id')
                    ->select('tb_barang.*','tb_kategori.kategori_nama', 'tb_sub_kategori.sub_nama')
                    ->where('umkm_id',  '=', session()->get('umkm_id'))
                    ->get();


        $active = "product";
        $kategori = Kategori_Model::all();
        $sub = DB::table('tb_sub_kategori')
                ->where('kategori_id',  '=', session()->get('kategori_id'))
                ->get();
        
        return view('frontend/umkm/product/index',
        [
            'active' => $active,
            'barang' => $barang,
            'kategori' => $kategori,
            'sub' => $sub,
        ]);
    }

    public function store(Request $request, Barang_Model $barang)
    {
        if($request->barang_id == null){
            // tambah
            $validator = Validator::make($request->all(),[
                'sub_id'           => 'required',
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
                $barang->kategori_id = session()->get('kategori_id');
                $barang->sub_id = $request->input('sub_id');
                $barang->barang_nama = $request->input('barang_nama');
                $barang->barang_harga = $request->input('barang_harga');
                $barang->barang_keterangan = $request->input('barang_keterangan');
                $barang->barang_gambar = $filename;
                $barang->save();

                return redirect()
                    ->route('product-umkm')
                    ->with('message', 'Data berhasil ditambahkan');
            }
        }else{
            // edit
            $validator = Validator::make($request->all(),[
                'sub_id'                => 'required',
                'barang_nama'           => 'required',
                'barang_harga'          => 'required|numeric',
                'barang_keterangan'     => 'required',
                'barang_gambar'         => 'mimes:jpg,jpeg,png'
            ]);
            if ($validator->fails()) {
                return redirect()
                    ->route('product-update', $request->barang_id)
                    ->withErrors($validator)
                    ->withInput();
            } else {
                if ($request->hasFile('barang_gambar') != null) {
                    $brg_gmb = DB::table('tb_barang')
                                ->where('barang_id', '=', $request->barang_id)
                                ->first();
                    // dd($request);
                    unlink('img/frontend/product/' . $brg_gmb->barang_gambar);
                    $foto = $request->file('barang_gambar');
                    $filename = time() . "." . $foto->getClientOriginalExtension();
                    $foto->move('img/frontend/product/', $filename);
                    

                    DB::table('tb_barang')
                        ->where('barang_id', '=', $request->barang_id)
                        ->update([
                            'umkm_id' => session()->get('umkm_id'),
                            'kategori_id' => session()->get('kategori_id'),
                            'sub_id' => $request->input('sub_id'),
                            'barang_nama' => $request->input('barang_nama'),
                            'barang_harga' => $request->input('barang_harga'),
                            'barang_keterangan' => $request->input('barang_keterangan'),
                            'barang_gambar' => $filename
                        ]);

                }else{

                    DB::table('tb_barang')
                        ->where('barang_id', '=', $request->barang_id)
                        ->update([
                            'umkm_id' => session()->get('umkm_id'),
                            'kategori_id' => session()->get('kategori_id'),
                            'sub_id' => $request->input('sub_id'),
                            'barang_nama' => $request->input('barang_nama'),
                            'barang_harga' => $request->input('barang_harga'),
                            'barang_keterangan' => $request->input('barang_keterangan')
                        ]);
                }
                return redirect()
                    ->route('product-umkm')
                    ->with('message', 'Data berhasil ditambahkan');
            }
        }

    }

    public function update(Request $request, Barang_Model $barang)
    {
        $validator = Validator::make($request->all(),[
            'sub_id'                => 'required',
            'barang_nama'           => 'required',
            'barang_harga'          => 'required|numeric',
            'barang_keterangan'     => 'required',
            'barang_gambar'         => 'mimes:jpg,jpeg,png'
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('product-update', $barang->barang_id)
                ->withErrors($validator)
                ->withInput();
        } else {
            if ($request->hasFile('barang_gambar') != null) {
                // dd($request);
                unlink('img/frontend/product/' . $barang->barang_gambar);
                $foto = $request->file('barang_gambar');
                $filename = time() . "." . $foto->getClientOriginalExtension();
                $foto->move('img/frontend/product/', $filename);
                $barang->barang_gambar = $filename;
            }
            $barang->umkm_id = session()->get('umkm_id');
            $barang->kategori_id = session()->get('kategori_id');
            $barang->sub_id = $request->input('sub_id');
            $barang->barang_nama = $request->input('barang_nama');
            $barang->barang_harga = $request->input('barang_harga');
            $barang->barang_keterangan = $request->input('barang_keterangan');
            $barang->save();

            return redirect()
                ->route('product-umkm')
                ->with('message', 'Data berhasil ditambahkan');
        }
    }

    public function destroy(Barang_Model $barang)
    {

        $barang->forceDelete();

        return redirect()
            ->route('product-umkm')
            ->with('message', 'Data berhasil dihapus');
    }

    public function cari_data_produk(Request $request)
    {

        $data = DB::table('tb_barang')
                ->where('barang_id','=',$request->barang_id)
                ->first();

        return json_encode($data);
    }

    public function detailProduct($product)
    {
        $barang  = DB::table('tb_barang')
            ->leftjoin('tb_kategori', 'tb_kategori.kategori_id', '=', 'tb_barang.kategori_id')
            ->leftjoin('tb_sub_kategori', 'tb_sub_kategori.sub_id', '=', 'tb_barang.sub_id')
            ->leftjoin('tb_data_umkm', 'tb_data_umkm.umkm_id', '=', 'tb_barang.umkm_id')
            ->where('barang_id', '=', $product)
            ->orderBy('barang_id')
            ->first();
        $gambar = DB::table('tb_gambar')
            ->where('barang_id', '=', $product)
            ->get();

        $list = DB::table('tb_barang')
            ->leftjoin('tb_kategori', 'tb_kategori.kategori_id', '=', 'tb_barang.kategori_id')
            ->leftjoin('tb_sub_kategori', 'tb_sub_kategori.sub_id', '=', 'tb_barang.sub_id')
            ->leftjoin('tb_data_umkm', 'tb_data_umkm.umkm_id', '=', 'tb_barang.umkm_id')
            ->where('tb_barang.kategori_id', '=', $barang->kategori_id)
            ->get();

        $wa = "https://api.whatsapp.com/send?phone=";
        $active = "detailProduct";
        
        return view(
            'frontend.page.detail_product_login',
            [
                'barang' => $barang,
                'wa' => $wa,
                'gambar' => $gambar,
                'list'   => $list,
                'active' => $active
            ]
        );
    }

    function gambar($barang)
    {
        $gambar  = DB::table('tb_gambar')
                ->where('barang_id',  '=', $barang)
                ->get();
        
        $product = DB::table('tb_barang')
                ->where('barang_id',  '=', $barang)
                ->first();

        $barang = $barang;
        
        $active = "product";
        
        return view('frontend/umkm/product/gambar',
        [
            'active' => $active,
            'gambar' => $gambar,
            'product' => $product,
            'barang' => $barang
        ]);
    }
}
