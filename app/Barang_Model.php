<?php

namespace App;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barang_Model extends Model
{
    use SoftDeletes;
    use Timestamp;
    protected $table = "tb_barang";
    protected $primaryKey = "barang_id";
    protected $fillable = [
        'umkm_id',
        'kategori_id',
        'sub_id',
        'barang_nama',
        'barang_harga',
        'barang_keterangan',
        'barang_gambar',
        'barang_view',
    ];
}
