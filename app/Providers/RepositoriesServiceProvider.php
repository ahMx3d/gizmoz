<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Tags\TagRepository;
use App\Repositories\Brands\BrandRepository;
use App\Repositories\Tags\TagRepositoryInterface;
use App\Repositories\Categories\CategoryRepository;
use App\Repositories\Brands\BrandRepositoryInterface;
use App\Repositories\Categories\CategoryRepositoryInterface;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // CATEGORIES REPOSITORY
        $this->app->bind(
            CategoryRepositoryInterface::class,
            CategoryRepository::class
        );

        // BRANDS REPOSITORY
        $this->app->bind(
            BrandRepositoryInterface::class,
            BrandRepository::class
        );

        // BRANDS REPOSITORY
        $this->app->bind(
            TagRepositoryInterface::class,
            TagRepository::class
        );
    }
}
