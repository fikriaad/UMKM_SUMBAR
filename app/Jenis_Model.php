<?php

namespace App;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jenis_Model extends Model
{
    use SoftDeletes;
    use Timestamp;
    protected $table = 'tb_jenis_umkm';
    protected $primaryKey = 'jenis_id';
    protected $fillable = [
        'jenis_nama',
        // 'jenis_gambar',
    ];
}
