<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    // MODEL'S DB TABLE
    protected $table = 'admins';

    // ALL FILLABLES & NO HIDDENS
    protected $guarded = [];

    // CREATE & UPDATE TIME
    public $timestamps = true;

    // public function setPasswordAttribute($val)
    // {

    //     if (!empty($val)) {
    //         $this->attributes['password'] = bcrypt($val);
    //     }
        
    // }
    
}
