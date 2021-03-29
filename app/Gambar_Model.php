<?php

namespace App;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gambar_Model extends Model
{
    use SoftDeletes;
    use Timestamp;
    protected $table = 'tb_gambar';
    protected $primaryKey = 'gambar_id';
    protected $fillable = [
        'barang_id',
        'gambar_foto',
    ];
}
