<?php

namespace App;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kota_Model extends Model
{
    use SoftDeletes;
    use Timestamp;
    protected $table = 'tb_kota';
    protected $primaryKey = 'kota_id';
    protected $fillable = [
        'prov_id',
        'kota_nama',
    ];
}
