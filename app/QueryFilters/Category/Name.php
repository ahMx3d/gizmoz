<?php

namespace App\QueryFilters\Category;

use App\Models\Cate;

class Name extends Filter
{
    /**
     * Get categories ordered ascending or descending using their names.
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
            return Cate::orderByTranslation('name');
        } else if ($sortType == 'DESC') {   // Filter value equals "DESC".
            return Cate::orderByTranslation(
                'name',
                $sortType
            );
        } else {    // Filter value doesn't equal neither "ASC" nor "DESC".
            return $builder;
        }
    }
}
