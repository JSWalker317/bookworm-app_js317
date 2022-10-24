<?php

namespace App\Providers;

use App\Repositories\BookRepository;
use App\Repositories\OrderRepository;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\BookRepositoryInterface;
use App\Interfaces\OrderRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register() 
    {
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
        $this->app->bind(BookRepositoryInterface::class, BookRepository::class);
        $this->app->bind(ReviewRepositoryInterface::class, ReviewRepository::class);
     }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
