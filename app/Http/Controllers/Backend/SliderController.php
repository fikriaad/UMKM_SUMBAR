<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Slider_Model;


class SliderController extends Controller
{
    public function index()
    {
        $slider = DB::table('tb_slider')
            ->orderBy('slider_id')
            ->get();
        return view(
            'backend/page/slider/index',
            [
                'slider' => $slider
            ]
        );
    }
    public function create()
    {
        return view(
            'backend/page/slider/form',
            [
                'url' => 'slider.store'
            ]
        );
    }

    public function store(Request $request, Slider_Model $slider)
    {
        $validator = Validator::make($request->all(), [
            'slider_gambar'         => 'required|mimes:jpg,jpeg,png,bmp',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('jenis.create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $foto = $request->file('slider_gambar');
            $filename = time() . "." . $foto->getClientOriginalExtension();
            $foto->move('img/backend/slider/', $filename);

            $slider->slider_gambar = $filename;
            $slider->save();

            return redirect()
                ->route('slider')
                ->with('message', 'Data berhasil ditambahkan');
        }
    }

    public function edit(Slider_Model $slider)
    {
        return view(
            'backend/page/slider/form',
            [
                'slider' => $slider,
                'url' => 'slider.update',
            ]
        );
    }

    public function update(Request $request, Slider_Model $slider)
    {
        $validator = Validator::make($request->all(), [
            'slider_gambar'         => 'mimes:jpg,jpeg,png,bmp',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('slider.update', $slider->slider_id)
                ->withErrors($validator)
                ->withInput();
        } else {
            if ($request->hasFile('slider_gambar') != null) {
                unlink('img/backend/slider/' . $slider->slider_gambar);
                $foto = $request->file('slider_gambar');
                $filename = time() . "." . $foto->getClientOriginalExtension();
                $foto->move('img/backend/slider/', $filename);
                $slider->slider_gambar = $filename;
            }
            $slider->save();

            return redirect()
                ->route('slider')
                ->with('message', 'Data berhasil diedit');
        }
    }

    public function destroy(Slider_Model $slider)
    {
        $slider_file = $slider->slider_gambar;
        unlink('img/backend/slider/' . $slider_file);
        $slider->forceDelete();
        return redirect()
            ->route('slider')
            ->with('message', 'Data berhasil dihapus');
    }
}
