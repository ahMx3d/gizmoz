<?php

namespace App\QueryFilters\Category;

use Closure;
use Illuminate\Support\Str;

abstract class Filter
{
    /**
     * Perform the categories' sorts filter.
     *
     * @param string $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!request()->has($this->filterName())) {
            return $next($request);
        }

        $builder = $next($request);

        return $this->applyFilter($builder);
    }

    /**
     * Get filters name.
     *
     * @return string \Illuminate\Support\Str
     */
    protected function filterName()
    {
        return Str::snake(class_basename($this));
    }

    /**
     * Apply filters desired.
     *
     * @param query $builder
     * @return mixed
     */
    protected abstract function applyFilter($builder);
}
