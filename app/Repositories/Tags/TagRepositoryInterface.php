<?php

namespace App\Repositories\Tags;

interface TagRepositoryInterface
{
    /**
     * Get Tag row of an id.
     *
     * @param int $id
     * @return object
     */
    public function findTagRowById($id);

    /**
     * Tags in descending order and their filters pipelines.
     *
     * @return mixed
     */
    public function allTagsDescWithFilters();

    /**
     * Store Tags.
     *
     * @param object $request
     * @return void
     */
    public function tagStore($request);

    /**
     * Update tags.
     *
     * @param object $tag
     * @param object $request
     * @return void
     */
    public function tagUpdate($tag, $request);

    /**
     * Delete tags.
     *
     * @param object $tag
     * @return void
     */
    public function tagDelete($tag);

}
