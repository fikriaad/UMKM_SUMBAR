<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sub_Kategori_Model extends Model
{

    use Timestamp;
    use SoftDeletes;
    protected $table = 'tb_sub_kategori';
    protected $primaryKey = 'sub_id';
    protected $fillable = [
        'kategori_id',
        'sub_nama',
        'sub_gambar',
    ];
}
