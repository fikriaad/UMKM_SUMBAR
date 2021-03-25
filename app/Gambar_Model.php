<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gambar_Model extends Model
{
    use SoftDeletes;
    protected $table = 'tb_gambar';
    protected $primaryKey = 'gambar_id';
    protected $fillable = [
        'barang_id',
        'gambar_foto',
    ];
}
