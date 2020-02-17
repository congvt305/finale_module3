<?php

namespace App\Providers;

use App\Http\Repositories\ContactRepositoryInterface;
use App\Http\Repositories\Eloquents\ContactRepository;
use App\Http\Services\ContactServiceInterface;
use App\Http\Services\Implement\ContactService;
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

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(ContactServiceInterface::class, ContactService::class);
        $this->app->singleton(ContactRepositoryInterface::class, ContactRepository::class);
    }
}
