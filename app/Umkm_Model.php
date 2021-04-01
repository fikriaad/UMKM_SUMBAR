<?php

namespace App;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;

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

    public function CheckLoginUmkm($umkm_email, $umkm_password)
    {
        // dd($umkm_password);
        $data_user = $this->where("umkm_email", $umkm_email)->get();
        // dd(count($data_user) == 1);
        // dd(count($data_user));
        if (count($data_user) == 1) {
            if (Hash::check($umkm_password, $data_user[0]->umkm_password)) {
                unset($data_user[0]->umkm_password);
                // $data_user[0]->level = "Admin";
                return $data_user[0];
            }
        }
        return false;
    }
}
