<?php

namespace App\Repositories\Brands;

use App\Models\Brand;

class BrandRepository implements BrandRepositoryInterface
{
    /**
     * All brands count.
     *
     * @return int
     */
    public static function allBrandsCount()
    {
        return Brand::all()->count();
    }

    /**
     * Get Brand row of an id.
     *
     * @param int $id
     * @return object
     */
    public function findBrandRowById($id)
    {
        return Brand::find($id);
    }

    /**
     * Brands in descending order and their filters pipelines.
     *
     * @return mixed
     */
    public function allBrandsDescWithFilters()
    {
        return Brand::allBrands();
    }
}
