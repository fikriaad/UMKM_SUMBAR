<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Iklan_Model extends Model
{
    use SoftDeletes;
    protected $table        = 'tb_iklan';
    protected $pimaryKey    = 'iklan_id';
    protected $fillable     = [
        'iklan_judul',
        'iklan_gambar',
        'iklan_keterangan',
        'iklan_letak',
    ];
}
