<?php

namespace App\Providers;

use App\Repository\ProductRepository;
use App\Http\Resources\ProductResource;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\ProductRepositoryInterface;
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
        ProductRepository::class
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
