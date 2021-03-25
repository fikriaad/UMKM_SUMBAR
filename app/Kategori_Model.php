<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori_Model extends Model
{
    use SoftDeletes;
    protected $table = 'tb_kategori';
    protected $primaryKey = 'kategori_id';
    protected $fillable = [
        'kategori_nama',
        'kategori_gambar',
    ];
}
