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

    /**
     * Parent category scope.
     * filters items where the given key is null.
     * 
     * @param query
     * @return clause
     */

    public function scopeParentCate($query)
    {
        return $query->whereNull('parent_id');
    }

    /**
     * Displays category status as a string.
     * 
     * @return string
     */
    public function getStatus()
    {
        return ($this->status == true)? __('admin/cates.model_active'): __('admin/cates.model_pending');
    }
    
}
