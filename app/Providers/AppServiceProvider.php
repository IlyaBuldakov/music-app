<?php

namespace App\Providers;

use App\Repositories\ArtistRepository;
use App\Repositories\interfaces\ArtistRepositoryInterface;
use App\Repositories\interfaces\UserRepositoryInterface;
use App\Repositories\UserRepository;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(ArtistRepositoryInterface::class, ArtistRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
    }
}
