<?php

namespace App\Repositories\Categories;

use App\Helpers\Admin\Utilities;
use App\Models\Cate;
use Illuminate\Support\Str;

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
     * Used for create method.
     *
     * @return mixed
     */
    public function mainCatesToCreateSubcate()
    {
        return Cate::mainCatesCreated();
    }

    /**
     * Pipeline filtered main categories in descending order.
     * Used for edit method.
     *
     * @return mixed
     */
    public function mainCatesToEditSubcate()
    {
        return Cate::mainCatesForEdit();
    }

    /**
     * Store categories.
     *
     * @param object $request
     * @return void
     */
    public function cateStore($request)
    {
        /**
         * Create the category slug from its name.
         *
         * @var string
         */
        $slug = Str::slug($request->input('cate_name'));

        /**
         * Assign the category status value.
         */
        if (!$request->has('cate_stat')) {
            $request->request->add([
                'cate_stat' => 0
            ]);
        } else {
            $request->request->add([
                'cate_stat' => 1
            ]);
        }

        /**
         * Assign main category's parent id of null.
         */
        if (!$request->has('cate_main')) {

            $request->request->add([
                'cate_main' => null
            ]);
        }

        /**
         * Data to be stored into the database.
         *
         * @var array
         */
        $data = [
            app()->getLocale() => [
                'name' => $request->input('cate_name')
            ],
            'parent_id' => $request->input('cate_main'),
            'slug' => $slug,
            'status' => $request->input('cate_stat')
        ];

        /**
         * Database query statement that stores data.
         */
        Cate::create($data);
    }

    /**
     * Get category row of an id.
     *
     * @param int $id
     * @return object
     */
    public function findCateRowById($id)
    {
        return Cate::find($id);
    }
}
