<?php

namespace App\Repositories\Categories;

use App\Helpers\Admin\Utilities;
use App\Models\Cate;
use Illuminate\Support\Arr;
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
     * Pipeline filtered categories in descending order.
     * Used for create method.
     *
     * @return mixed
     */
    public function nestedCates()
    {
        // return Cate::catesTree();
        // return Cate::catesTree()->filter(function($q) {
        //     if($q->subs->isEmpty()){
        //         unset($q->subs);
        //     }
        //     return $q;
        // });

        ################################

        $collection = Cate::catesTree();       // The query collection.
        $array      = $collection->toArray();  // The query array conversion.
        $flattened  = Arr::dot($array);        // Flatten the multidimensional
        foreach ($flattened as $key => $subs) {
            if (empty($subs)) {                 // Get rid of the subs empty array.
                Arr::forget($flattened, $key);
            }
        }

        // new array wrapper.
        $newArr = array();
        foreach ($flattened as $key => $value) {
            // Wrap the query values.
            Arr::set($newArr, $key, $value);
        }

        // query wrapper collection.
        $newCollection = collect($newArr);
        return $newCollection;
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
         * Data to be updated.
         *
         * @var array
         */
        $data = $this->serveData($request);

        /**
         * Database query statement that stores data.
         */
        Cate::create($data);
    }

    /**
     * Update categories.
     *
     * @param object $cate
     * @param object $request
     * @return void
     */
    public function cateUpdate($cate, $request)
    {
        if (    // Check whether any value has been changed.
            $cate->name != $request->input('cate_name') ||
            $cate->status != $request->input('cate_stat') ||
            $cate->parent_id != $request->input('cate_main')
        ) {
            /**
             * Data to be updated.
             *
             * @var array
             */
            $data = $this->serveData($request);
            // Database update query statement.
            $cate->update($data);
        }
        // Nothing changed you are joking.
        return;
    }

    /**
     * Delete categories.
     *
     * @param object $cate
     * @return void
     */
    public function cateDelete($cate)
    {
        // Database delete query statement.
        $cate->delete();
    }

    /**
     * Data to be stored into the database.
     *
     * @param object $request
     * @return array
     */
    private function serveData($request)
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

        return [
            app()->getLocale() => [
                'name' => $request->input('cate_name')
            ],
            'parent_id' => $request->input('cate_main'),
            'slug' => $slug,
            'status' => $request->input('cate_stat')
        ];
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
