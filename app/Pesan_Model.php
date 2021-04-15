<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Traits\Timestamp;


class Pesan_Model extends Model
{
    use SoftDeletes;
    use Timestamp;
    protected $table = 'tb_pesan';
    protected $primaryKey = 'pesan_id';
    protected $fillable = [
        'pesan_nama',
        'pesan_nohp',
        'pesan_email',
        'pesan_isi',
    ];
}
