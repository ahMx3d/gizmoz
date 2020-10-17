<?php

namespace App\QueryFilters\Category;

class Create extends Filter
{
    /**
     * Get main categories or empty query.
     *
     * @param query $builder
     * @return clause
     */
    protected function applyFilter($builder)
    {
        /**
         * Ignore filter value case.
         *
         * @var string
         */
        $requestKey = strtolower(
            request(
                $this->filterName()
            )
        );

        $return = $builder->when( // Filter value equals "main".
            $requestKey == 'main',
            function ($query) {
                return $query->emptyQuery();
            }
        );

        $return = $builder->when( // Filter value equals "sub".
            $requestKey == 'sub',
            function ($query) {
                return $query->parentCate()->descCates()->with('subs');
            }
        );

        return $return;
    }
}
