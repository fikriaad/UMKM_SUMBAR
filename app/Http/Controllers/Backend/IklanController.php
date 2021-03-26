<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Iklan_Model;

class IklanController extends Controller
{
    public function index()
    {
        $iklan = DB::table('tb_iklan')->get();
        return view(
            'backend/page/iklan/index',
            [
                'iklan' => $iklan
            ]
        );
    }
    public function create()
    {
        return view(
            'backend/page/iklan/form',
            [
                'url' => 'iklan.store'
            ]
        );
    }

    public function store(Request $request, Iklan_Model $iklan)
    {
        $validator = Validator::make($request->all(), [
            'iklan_judul'       => 'required',
            'iklan_gambar'      => 'required|mimes:jpg,jpeg,png,bmp',
            'iklan_keterangan'  => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('iklan.create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $foto = $request->file('iklan_gambar');
            $filename = time() . "." . $foto->getClientOriginalExtension();
            $foto->move('img/backend/iklan/', $filename);

            $iklan->iklan_judul = $request->input('iklan_judul');
            $iklan->iklan_gambar = $filename;
            $iklan->iklan_keterangan = $request->input('iklan_keterangan');
            // dd($iklan);
            $iklan->save();

            return redirect()
                ->route('iklan')
                ->with('message', 'Data berhasil ditambahkan');
        }
    }

    public function edit(Iklan_Model $iklan)
    {
        return view(
            'backend/page/iklan/form',
            [
                'iklan' => $iklan,
                'url' => 'iklan.update',
            ]
        );
    }

    public function update(Request $request, Iklan_Model $iklan)
    {
        $validator = Validator::make($request->all(), [
            'iklan_judul'       => 'required',
            'iklan_gambar'      => 'mimes:jpg,jpeg,png,bmp',
            'iklan_keterangan'  => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('iklan.update', $iklan->iklan_id)
                ->withErrors($validator)
                ->withInput();
        } else {
            if ($request->hasFile('iklan_gambar') != null) {
                unlink('img/backend/iklan/' . $iklan->iklan_gambar);
                $foto = $request->file('iklan_gambar');
                $filename = time() . "." . $foto->getClientOriginalExtension();
                $foto->move('img/backend/iklan/', $filename);
                $iklan->iklan_gambar = $filename;
            }
            $iklan->iklan_judul = $request->input('iklan_judul');
            $iklan->iklan_keterangan = $request->input('iklan_keterangan');
            $iklan->save();

            return redirect()
                ->route('iklan')
                ->with('message', 'Data berhasil diedit');
        }
    }

    public function destroy(Iklan_Model $iklan)
    {
        $iklan_file = $iklan->iklan_gambar;
        unlink('img/backend/iklan/' . $iklan_file);
        $iklan->forceDelete();
        return redirect()
            ->route('iklan')
            ->with('message', 'Data berhasil dihapus');
    }
}
