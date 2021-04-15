<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Pesan_Model;

class PesanController extends Controller
{
    public function index()
    {
        $pesan = DB::table('tb_pesan')
            ->orderBy('pesan_id')
            ->get();
        return view(
            'backend/page/pesan/index',
            [
                'pesan' => $pesan
            ]
        );
    }
    public function destroy(Pesan_Model $pesan)
    {
        $pesan->forceDelete();
        return redirect()
            ->route('pesan')
            ->with('message', 'Data berhasil dihapus');
    }
}
