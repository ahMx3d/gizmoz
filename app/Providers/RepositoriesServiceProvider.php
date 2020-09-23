<?php

namespace App\Providers;

use App\Repositories\Categories\CategoryRepository;
use App\Repositories\Categories\CategoryRepositoryInterface;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\View\Composers\CategoriesComposer;
use App\Repositories\Brands\BrandRepository;
use App\Repositories\Brands\BrandRepositoryInterface;

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
    }
}
