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
     * @param object $cate
     * @return object
     */
    public function mainCatesToEditSubcate($cate)
    {
        // return Cate::mainCatesForEdit();

        if ($cate->parent_id != null) {              // nested categories if the current category is sub.
            $id         = $cate->id;                 // subcategory's id.
            $collection = Cate::mainCatesForEdit();  // The nested categories query collection.
            $array      = $collection->toArray();    // The query array conversion.
            $flattened  = Arr::dot($array);          // Flatten the multidimensional.
            $newArr     = array();
            foreach ($flattened as $key => $value) {
                if (empty($value) || Str::contains($key, ['translations', 'name', 'created_at', 'updated_at'])) {
                    unset($key);  // delete translations, name, created_at, updated_at, and empty subs.
                } elseif (Str::contains($key, 'subs') && Str::contains($key, 'id') && $value == $id) {
                    $editingKey = Str::beforeLast($key, '.');  // key of editing category array.
                    unset($key);  // delete id of edit action.
                } else {
                    if (isset($editingKey) && Str::of($key)->startsWith($editingKey)) {
                        $editingParentKey = Str::beforeLast($editingKey, '.');  // subs array multidimensional key.
                        unset($key);  // delete rest of data for the current category.
                    } else {
                        Arr::set($newArr, $key, $value);  // new multidimensional array of the required data for editing.
                    }
                }
            }

            $forgottenSiblings = Arr::pull($newArr, $editingParentKey); // siblings of the current array.
            if (empty($forgottenSiblings)) {
                unset($newArr[$editingParentKey]);  // delete siblings array if empty.
            } else {
                $forgottenSiblings = array_values($forgottenSiblings);  // treat the index of siblings keys.
                data_set($newArr, $editingParentKey, $forgottenSiblings);  // insert the new treated siblings keys.
            }

            $newCollection = collect($newArr);  // collect data for the editing view.
            return $newCollection;
        } else {
            return collect([]);
        }
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
     * Validate that request main category id isn't neither the category of action nor its nested categories.
     *
     * @author Ahmed Salah
     * 
     * @param int $id
     * @param int $mainCateId
     * @return mixed
     */
    public function validateSubsUpdate($id, $mainCateId)
    {
        if ($id == $mainCateId) return false;   // return false if current id equals the main category id.
        $cate = Cate::find($id);                // category of cation.
        if (!$cate) return null;                // return null if the id dsnt exist in db.
        if ($mainCateId == null) {              // directly return category if the current id is main category.
            return $cate;
        } else {
            $cateSubs  = $cate->subs->toArray();  // nested subcategories array of the current category.
            $flattened = Arr::dot($cateSubs);     // flatten nested multidimensional subcategories array.
            $subsIds   = [];                      // all subcategories of the current category.
            
            foreach ($flattened as $key => $value) {    // loop to come up with only nested subcategories ids.
                if (empty($value) || Str::contains($key, ['translations', 'name', 'title', 'created_at', 'updated_at'])) {
                    unset($key);
                } else {
                    Arr::set($subsIds, $key, $value);
                }
            }

            // check if the selected main category equals to one of the nested subcategories.
            $hasMainCateId = collect(Arr::flatten($subsIds))->search($mainCateId);
            /*
            ** return true if main category id equals one of the nested subcategories id.
            ** return current category object to be edited if main category id dsnt equal any nested subcategories id.
            */
            return ((is_int($hasMainCateId)) ? true : $cate);
        }
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
