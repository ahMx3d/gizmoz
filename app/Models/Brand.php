<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Brand extends Model
{
    /**
     * The translation package trait.
     */
    use Translatable;

    /**
     * The model's equivalent table name.
     *
     * @var string
     */
    protected $table = 'brands';

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
        'status',
        'image',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'boolean'
    ];

    /**
     * Display brands status as a string.
     *
     * @return string
     */
    public function getStatus()
    {
        return ($this->status == true) ? __('admin/brands.model_active') : __('admin/brands.model_pending');
    }

}
