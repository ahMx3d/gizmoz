<?php

namespace App\Repositories\Categories;

use App\Models\Cate;

class CategoryRepository implements CategoryRepositoryInterface
{
    /**
     * All categories count.
     *
     * @return mixed
     */
    public static function allCatesCount()
    {
        return Cate::all()->count();
    }

    /**
     * Main categories count.
     *
     * @return mixed
     */
    public static function parentCatesCount()
    {
        return Cate::parentCate()->count();
    }

    /**
     * Subcategories count.
     *
     * @return mixed
     */
    public static function childCatesCount()
    {
        return Cate::childCate()->count();
    }

    /**
     * Categories in descending order.
     *
     * @return mixed
     */
    public function allCatesDesc()
    {
        return Cate::descCates();
    }

    /**
     * Categories in descending order and their filters pipelines.
     *
     * @return mixed
     */
    public function allCatesDescWithFilters()
    {
        return Cate::allCates();
    }

    /**
     * Pipeline filtered main categories in descending order.
     *
     * @return mixed
     */
    public function mainCatesToCreateSubcate()
    {
        return Cate::mainCatesCreated();
    }
}
