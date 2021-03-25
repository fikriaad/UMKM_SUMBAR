<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Umkm__Model extends Model
{
    use SoftDeletes;
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
        'umkm_instagram',
        'umkm_facebook',
        'umkm_foto',
        'umkm_status',
    ];
}
