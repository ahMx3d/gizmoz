<?php

namespace App\Repositories\Categories;

interface CategoryRepositoryInterface
{
    public static function allCatesCount();

    public static function parentCatesCount();

    public static function childCatesCount();

    public function allCatesDesc();

    public function allCatesDescWithFilters();
}
