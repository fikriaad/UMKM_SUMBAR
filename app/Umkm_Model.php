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
        'pemilik',
        'pemilik_tgl_lahir',
        'pemilik_nohp',
        'pemilik_alamat',
        'pemilik_ktp',
        'umkm_nama',
        'umkm_email',
        'umkm_password',
        'jenis_id',
        'umkm_nohp',
        'umkm_foto',
        'umkm_lama_usaha',
        'prov_id',
        'kota_id',
        'umkm_alamat',
        'umkm_status',
        'umkm_slug',
        'umkm_instagram',
        'umkm_facebook',
        'umkm_viewer',
    ];
}
