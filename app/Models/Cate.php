<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use App\QueryFilters\Category\Create;
use App\QueryFilters\Category\Name;
use App\QueryFilters\Category\Order;
use App\QueryFilters\Category\Status;
use App\QueryFilters\Category\Type;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;

class Cate extends Model
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
        'created_at',
        'updated_at',
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
     * Child category scope.
     * filters items where the given key is not null.
     *
     * @param object
     * @return clause
     */

    public function scopeChildCate($query)
    {
        return $query->whereNotNull('parent_id');
    }

    /**
     * Categories descending scope.
     *
     * @param object $query
     * @return array
     */
    public function scopeDescCates($query)
    {
        return $query->orderBy(
            'id',
            'DESC'
        );
    }

    /**
     * Categories ascending scope.
     *
     * @param object $query
     * @return array
     */
    public function scopeAscCates($query)
    {
        return $query->orderBy(
            'id',
            'ASC'
        );
    }

    /**
     * Query that return nothing needed for filter pipelines.
     *
     * @param object $query
     * @return clause
     */
    public function scopeEmptyQuery($query)
    {
        return $query->where(
            'id',
            '=',
            0,
        );
    }

    /**
     * Displays category status as a string.
     *
     * @return string
     */
    public function getStatus()
    {
        return ($this->status == true) ? __('admin/cates.model_active') : __('admin/cates.model_pending');
    }

    /**
     * Model's main categories relationships.
     *
     * @return object
     */
    public function mainCate()
    {
        return $this->belongsTo(self::class, 'parent_id', 'id');
    }

    /**
     * Model's subcategories relationships.
     *
     * @return array
     */
    public function subcates()
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }

    /**
     * All categories with pipeline filters.
     *
     * @return object
     */
    public static function allCates()
    {
        return app(
            Pipeline::class
        )->send(
            self::descCates()
        )->through([
            Type::class,
            Name::class,
            Order::class,
            Status::class,
        ])->thenReturn()->paginate(PAGINATION_COUNT);
    }

    public static function mainCatesCreated()
    {
        return app(
            Pipeline::class
        )->send(
            self::query()
        )->through(
            Create::class
        )->thenReturn()->get();
    }
}
