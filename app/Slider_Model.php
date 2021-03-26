<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider_Model extends Model
{
    use SoftDeletes;
    protected $table = 'tb_slider';
    protected $primaryKey = 'slider_id';
    protected $fillable = [
        'slider_gambar',
    ];
}
