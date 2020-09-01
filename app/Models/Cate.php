<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{

    /**
     * The translation package trait.
     */
    use Translatable;

    /**
     * The model's equivelant table name.
     * 
     * @var string
     */
    protected $table = 'cates';

    /**
     * The relations to eager load on every query.
     * 
     * @var array
     */
    protected $with = ['translations'];

    /**
     * The attributes to be translated 
     * 
     * @var array
     */
    protected $translatedAttributes = ['name'];

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
        'parent_id',
        'slug',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     * 
     * @var array
     */
    protected $hidden = [
        'parent_id',
        'slug',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     * 
     * @var array
     */
    protected $casts = [
        'status' => 'boolean'
    ];
}