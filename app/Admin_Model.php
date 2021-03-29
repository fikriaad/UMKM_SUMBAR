<?php

namespace App;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;


class Admin_Model extends Model
{
    use SoftDeletes;
    use Timestamp;
    protected $table = "tb_admin";
    protected $primaryKey = 'admin_id';
    protected $fillable = [
        'admin_nama',
        'admin_email',
        'admin_password',
    ];

    public function CheckLoginAdmin($admin_email, $admin_password)
    {
        // dd($admin_password);
        $data_user = $this->where("admin_email", $admin_email)->get();
        // dd(count($data_user) == 1);
        // dd(count($data_user));
        if (count($data_user) == 1) {
            if (Hash::check($admin_password, $data_user[0]->admin_password)) {
                unset($data_user[0]->admin_password);
                // $data_user[0]->level = "Admin";
                return $data_user[0];
            }
        }
        return false;
    }
}
