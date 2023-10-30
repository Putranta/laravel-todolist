<?php

namespace App\Providers;

use App\Services\impl\UserServiceImpl;
use App\Services\UserService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class UserServiceProfider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        UserService::class => UserServiceImpl::class
    ];

    public function provides()
    {
        return [UserService::class];
    }
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
