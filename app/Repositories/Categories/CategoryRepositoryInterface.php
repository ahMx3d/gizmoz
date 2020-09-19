<?php

namespace App\Repositories\Categories;

interface CategoryRepositoryInterface
{
    /**
     * All categories count.
     *
     * @return mixed
     */
    public static function allCatesCount();

    /**
     * Main categories count.
     *
     * @return mixed
     */
    public static function parentCatesCount();

    /**
     * Subcategories count.
     *
     * @return mixed
     */
    public static function childCatesCount();

    /**
     * Categories in descending order.
     *
     * @return mixed
     */
    public function allCatesDesc();

    /**
     * Categories in descending order and their filters pipelines.
     *
     * @return mixed
     */
    public function allCatesDescWithFilters();

    /**
     * Pipeline filtered main categories in descending order.
     *
     * @return mixed
     */
    public function mainCatesToCreateSubcate();

    /**
     * Store categories.
     *
     * @param object $request
     * @return void
     */
    public function cateStore($request);
}
