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

    /**
     * Store brands.
     *
     * @param object $request
     * @return void
     */
    public function brandStore($request)
    {
        /**
         * Data to be stored.
         *
         * @var array
         */
        $data = $this->serveData($request);

        /**
         * Database query statement that stores data.
         */
        Brand::create($data);
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
                'name' => $request->input('brand_name')
            ],
            'status' => $request->input('brand_stat'),
            'image'  => $request->file('brand_imag'),
        ];
    }

    /**
     * Update brands.
     *
     * @param object $brand
     * @param object $request
     * @return void
     */
    public function brandUpdate($brand, $request)
    {
        if (    // Check whether any value has been changed.
            $brand->name != $request->input('brand_name') ||
            $brand->status != $request->input('brand_stat') ||
            $brand->image != $request->file('brand_imag')
        ) {
            /**
             * Data to be updated.
             *
             * @var array
             */
            $data = $this->serveData($request);
            // Database update query statement.
            $brand->update($data);
        }
        // Nothing changed you are joking.
        return;
    }

}
