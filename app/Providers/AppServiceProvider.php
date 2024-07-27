<?php

namespace App\Providers;

use App\Repository\ProductRepository;
use App\Interfaces\CategoriRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\ProductRepositoryInterface;
use App\Interfaces\TagRepositoryInterface;
use App\Repository\CategorieRepository;
use App\Repository\TagRepository;
use Illuminate\Http\Resources\Json\JsonResource;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
        ProductRepositoryInterface::class,
        ProductRepository::class,

        );

        $this->app->bind(
            CategoriRepositoryInterface::class,
        CategorieRepository::class,

        );


        $this->app->bind(TagRepositoryInterface::class, TagRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        JsonResource::withoutWrapping();
    }
}
