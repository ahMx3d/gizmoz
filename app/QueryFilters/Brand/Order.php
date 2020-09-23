<?php

namespace App\QueryFilters\Brand;

use App\Models\Brand;

class Order extends Filter
{
    /**
     * Get brands ordered ascending or descending.
     *
     * @param query $builder
     * @return mixed
     */
    protected function applyFilter($builder)
    {
        /**
         * Ignore filter value case.
         *
         * @var string
         */
        $sortType = strtoupper(
            request(
                $this->filterName()
            )
        );

        if ($sortType == 'ASC') {   // Filter value equals "ASC".
            return Brand::orderByTranslation('brand_id');
        } else if ($sortType == 'DESC') {   // Filter value equals "DESC".
            return Brand::orderByTranslation(
                'brand_id',
                $sortType
            );
        } else {    // Filter value doesn't equal neither "ASC" nor "DESC".
            return $builder;
        }
    }
}
