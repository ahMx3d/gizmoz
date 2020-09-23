<?php

namespace App\QueryFilters\Brand;

use App\Models\Brand;

class Name extends Filter
{
    /**
     * Get brands ordered ascending or descending using their names.
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
            return Brand::orderByTranslation('name');
        } else if ($sortType == 'DESC') {   // Filter value equals "DESC".
            return Brand::orderByTranslation(
                'name',
                $sortType
            );
        } else {    // Filter value doesn't equal neither "ASC" nor "DESC".
            return $builder;
        }
    }
}
