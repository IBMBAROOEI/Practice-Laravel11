<?php

namespace App\Providers;

use App\Repository\ProductRepository;
use App\Interfaces\CategoriRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\ProductRepositoryInterface;
use App\Repository\CategorieRepository;
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
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        JsonResource::withoutWrapping();
    }
}
