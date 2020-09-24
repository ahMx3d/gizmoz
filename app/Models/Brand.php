<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Helpers\Admin\Utilities;
use App\QueryFilters\Brand\Name;
use App\QueryFilters\Brand\Order;
use Illuminate\Pipeline\Pipeline;
use App\QueryFilters\Brand\Status;
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
    protected $hidden = [];

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

    /**
     * Status mutator to be done whether it comes in request or not.
     *
     * @param mixed $val
     * @return void
     */
    public function getImageAttribute($val)
    {
        if (    // when there is no request key make value equals to zero.
            $val == NULL || $val =='default.jpg'
        ) {
            return asset('/assets/images/brands/default.jpg');
        } elseif (Str::of($val)->is('http*')) {
            return $val;
        }
        else {    // when there is request key make value equals to one.
            return asset('/assets/images/brands/' .$val);
        }
    }

    /**
     * Status mutator to be done whether it comes in request or not.
     *
     * @param mixed $val
     * @return void
     */
    public function setStatusAttribute($val)
    {
        if (    // when there is no request key make value equals to zero.
            !isset($val) || empty($val)
        ) {
            $this->attributes['status'] = 0;
        } else {    // when there is request key make value equals to one.
            $this->attributes['status'] = 1;
        }
    }

    /**
     * Image mutator to be done whether it comes in request or not.
     *
     * @param mixed $val
     * @return void
     */
    public function setImageAttribute($val)
    {
        if ($val == null) {     // when there is no request key make value equals to null.
            $this->attributes['image'] = null;
        } else {    // when there is a request key make value equals to the hashed name.
            $this->attributes['image'] = Utilities::uploadFileGetName(
                'brands',
                $val
            );
        }
    }

    /**
     * Brands descending scope.
     *
     * @param query $query
     * @return object
     */
    public function scopeDescBrands($query)
    {
        return $query->orderBy(
            'id',
            'DESC'
        );
    }

    /**
     * All brands with pipeline filters.
     *
     * @return object
     */
    public static function allBrands()
    {
        return app(
            Pipeline::class
        )->send(
            self::descBrands()
        )->through([
            Name::class,
            Order::class,
            Status::class,
        ])->thenReturn()->paginate(PAGINATION_COUNT);
    }
}
