<?php

namespace App\Providers;

use App\Interfaces\ProviderInterface;
use App\Repositories\Eloquent\TaskRepositoryEloquent;
use App\Repositories\TaskRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TaskRepositoryInterface::class, TaskRepositoryEloquent::class);
        $this->app->bind(ProviderInterface::class, GitHubProvider::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
