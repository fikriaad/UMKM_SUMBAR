<?php

namespace App;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provinsi_Model extends Model
{
    use SoftDeletes;
    use Timestamp;
    protected $table = 'tb_provinsi';
    protected $primaryKey = 'prov_id';
    protected $fillable = [
        'prov_nama',
    ];
}
