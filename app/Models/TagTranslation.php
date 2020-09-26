<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TagTranslation extends Model
{
    /**
     * The model's equivalent table name.
     *
     * @var string
     */
    protected $table = 'tag_translations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * The timestamps that are not created.
     *
     * @var boolean
     */
    public $timestamps = false;
}
