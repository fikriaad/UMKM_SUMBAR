<?php

namespace App;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider_Model extends Model
{
    use SoftDeletes;
    use Timestamp;
    protected $table = 'tb_slider';
    protected $primaryKey = 'slider_id';
    protected $fillable = [
        'slider_gambar',
    ];
}
