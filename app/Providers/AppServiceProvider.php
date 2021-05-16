<?php

namespace App\Providers;


use App\Repositories\Posts\PostsRepositoryInterface;
use App\Repositories\Posts\PostsRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PostsRepositoryInterface::class, PostsCacheRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
