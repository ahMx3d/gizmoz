<?php

namespace App\Models;

use App\QueryFilters\Tag\Name;
use App\QueryFilters\Tag\Order;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Tag extends Model
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
    protected $table = 'tags';

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
        'slug',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * Tags descending scope.
     *
     * @param query $query
     * @return object
     */
    public function scopeDescTags($query)
    {
        return $query->orderBy(
            'id',
            'DESC'
        );
    }

    /**
     * All tags with pipeline filters.
     *
     * @return object
     */
    public static function allTags()
    {
        return app(
            Pipeline::class
        )->send(
            self::descTags()
        )->through([
            Name::class,
            Order::class,
        ])->thenReturn()->paginate(PAGINATION_COUNT);
    }
}
