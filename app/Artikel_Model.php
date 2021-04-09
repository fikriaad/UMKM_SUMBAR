<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Traits\Timestamp;

class Artikel_Model extends Model
{
    use SoftDeletes;
    use Timestamp;
    protected $table = "tb_artikel";
    protected $primaryKey = "artikel_id";
    protected $fillable = [
        'artikel_judul',
        'artikel_tanggal',
        'artikel_penulis',
        'artikel_isi',
        'artikel_gambar',
        'artikel_slug',
        'artikel_viewer',
    ];
}
