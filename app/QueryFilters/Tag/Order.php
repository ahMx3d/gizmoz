<?php

namespace App\QueryFilters\Tag;

use App\Models\Tag;

class Order extends Filter
{
    /**
     * Get tags ordered ascending or descending.
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
            return Tag::orderByTranslation('tag_id');
        } else if ($sortType == 'DESC') {   // Filter value equals "DESC".
            return Tag::orderByTranslation(
                'tag_id',
                $sortType
            );
        } else {    // Filter value doesn't equal neither "ASC" nor "DESC".
            return $builder;
        }
    }
}
