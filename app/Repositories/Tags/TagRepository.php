<?php

namespace App\Repositories\Tags;

use App\Models\Tag;
use Illuminate\Support\Arr;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class TagRepository implements TagRepositoryInterface
{
    /**
     * All tags count.
     *
     * @return int
     */
    public static function allTagsCount()
    {
        return Tag::all()->count();
    }

    /**
     * Get Tag row of an id.
     *
     * @param int $id
     * @return object
     */
    public function findTagRowById($id)
    {
        return Tag::find($id);
    }

    /**
     * Tags in descending order and their filters pipelines.
     *
     * @return mixed
     */
    public function allTagsDescWithFilters()
    {
        return Tag::allTags();
    }

    /**
     * Store Tags.
     *
     * @param object $request
     * @return void
     */
    public function tagStore($request)
    {
        /**
         * Data to be stored.
         *
         * @var array
         */
        $data = $this->serveData($request);
        // dd($data);
        Tag::create($data);
        // if (LaravelLocalization::getCurrentLocaleDirection() == 'rtl') {
        //     $data = Arr::except($data, 'slug');
        //     /**
        //      * Database query statement that stores data.
        //      */
        //     Tag::create($data);
        // } else {
        //     /**
        //      * Database query statement that stores data.
        //      */
        //     Tag::create($data);
        // }
    }

    /**
     * Data to be stored into the database.
     *
     * @param object $request
     * @return array
     */
    private function serveData($request)
    {
        return [
            app()->getLocale() => [
                'name' => $request->input('tag_name')
            ],
            'slug' => $request->input('tag_name'),
        ];
    }

    /**
     * Update tags.
     *
     * @param object $tag
     * @param object $request
     * @return void
     */
    public function tagUpdate($tag, $request)
    {
        /**
         * Data to be updated.
         *
         * @var array
         */
        $data = $this->serveData($request);

        // Database update query statement.
        $tag->update($data);
    }

    /**
     * Delete tags.
     *
     * @param object $tag
     * @return void
     */
    public function tagDelete($tag)
    {
        // Database delete query statement.
        $tag->delete();
    }
}
