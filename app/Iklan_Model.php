<?php

namespace App;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Iklan_Model extends Model
{
    use SoftDeletes;
    use Timestamp;
    protected $table        = 'tb_iklan';
    protected $primaryKey    = 'iklan_id';
    protected $fillable     = [
        'iklan_judul',
        'iklan_gambar',
        'iklan_keterangan',
        'iklan_letak',
    ];
}
