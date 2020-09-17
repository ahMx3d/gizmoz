<?php

namespace App\QueryFilters\Category;

class Type extends Filter
{
    /**
     * Get main categories or subcategories.
     *
     * @param query $builder
     * @return mixed clause || query
     */
    protected function applyFilter($builder)
    {
        /**
         * Ignore filter value case.
         * 
         * @var string
         */
        $sortType = strtolower(
            request(
                $this->filterName()
            )
        );

        if ($sortType == 'main') {  // Filter value equals "main".
            return $builder->whereNull(
                'parent_id'
            );
        } else if ($sortType == 'sub') {    // Filter value equals "sub".
            return $builder->whereNotNull(
                'parent_id'
            );
        } else {    // Filter value doesn't equal neither "main" nor "sub".
            return $builder;
        }
    }
}
