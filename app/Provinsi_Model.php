<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provinsi_Model extends Model
{
    use SoftDeletes;
    protected $table = 'tb_provinsi';
    protected $primaryKey = 'prov_id';
    protected $fillable = [
        'prov_nama',
    ];
}
