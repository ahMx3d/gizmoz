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
    // protected $guarded = [];
    
    protected $fillable = [
        'name',
        'email',
        'password',
        'created_at',
        'updated_at',
    ];

    // CREATE & UPDATE TIME
    public $timestamps = true;

    /**
     * Mutates admin password into hashed salt.
     *
     * @param val
     */
    public function setPasswordAttribute($val)
    {
        // NOT EMPTY VALUE CHECK
        if (!empty($val)) {
            $this->attributes['password'] = bcrypt($val);
        }
        
    }
    
}
