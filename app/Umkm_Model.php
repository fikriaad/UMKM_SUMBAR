<?php

namespace App;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Umkm_Model extends Model
{
    use SoftDeletes;
    use Timestamp;
    protected $table = 'tb_data_umkm';
    protected $primaryKey = 'umkm_id';
    protected $fillable = [
        'umkm_nama',
        'jenis_id',
        'umkm_lama_usaha',
        'umkm_nohp',
        'prov_id',
        'kota_id',
        'umkm_alamat',
        'umkm_email',
        'umkm_password',
        'umkm_instagram',
        'umkm_facebook',
        'umkm_foto',
        'umkm_status',
        'umkm_viewer',
        'umkm_slug',
    ];
}
