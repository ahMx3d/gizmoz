<?php

namespace App\Repositories\Brands;

use App\Helpers\Admin\Utilities;
use App\Models\Brand;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;

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
        /**
         * Data to be updated.
         *
         * @var array
         */
        $data = $this->serveData($request);

        if ($data['image'] == null) {
            $data = Arr::except($data, 'image');
            // Database update query statement.
            $brand->update($data);
        } else {
            // Delete Old Image From Server.
            Utilities::deleteServerFile(
                'brands',
                $brand->image
            );

            // Database update query statement.
            $brand->update($data);
        }
    }

    /**
     * Delete brands.
     *
     * @param object $brand
     * @return void
     */
    public function brandDelete($brand)
    {
        // Database delete query statement.
        $brand->delete();

        // Delete Image From Server.
        Utilities::deleteServerFile(
            'brands',
            $brand->image
        );
    }
}
