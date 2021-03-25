<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barang_Model extends Model
{
    use SoftDeletes;
    protected $table = "tb_barang";
    protected $primaryKey = "barang_id";
    protected $fillable = [
        'umkm_id',
        'kategori_id',
        'barang_nama',
        'barang_harga',
        'barang_keterangan',
    ];
}
