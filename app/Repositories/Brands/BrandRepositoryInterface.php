<?php

namespace App\Repositories\Brands;

interface BrandRepositoryInterface
{
    /**
     * All brands count.
     *
     * @return int
     */
    public static function allBrandsCount();

    /**
     * Get Brand row of an id.
     *
     * @param int $id
     * @return object
     */
    public function findBrandRowById($id);

    /**
     * Brands in descending order and their filters pipelines.
     *
     * @return mixed
     */
    public function allBrandsDescWithFilters();

    /**
     * Store brands.
     *
     * @param object $request
     * @return void
     */
    public function brandStore($request);
}
