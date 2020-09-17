<?php

namespace App\QueryFilters\Category;

class Status extends Filter
{
    /**
     * Get active or pending categories.
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
        $sortType = strtolower(
            request(
                $this->filterName()
            )
        );

        if ($sortType == 'active') {   // Filter value equals "active".
            return $builder->where(
                'status',
                true
            );
        } else if ($sortType == 'pending') {   // Filter value equals "pending".
            return $builder->where(
                'status',
                false
            );
        } else {    // Filter value doesn't equal neither "active" nor "pending".
            return $builder;
        }
    }
}
