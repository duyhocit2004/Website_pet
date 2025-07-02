<?php

namespace App\Providers;

use App\Service\Auth\AuthService;
use App\Service\User\UserService;
use App\Service\Auth\IAuthService;
use App\Service\NetWeight\INetWeight;
use App\Service\NetWeight\NetWeight;
use App\Service\product\IproductService;
use App\Service\Product\ProductService;
use App\Service\User\IUserService;
use Illuminate\Pagination\Paginator;
use SocialiteProviders\Manager\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IAuthService::class,AuthService::class);
        $this->app->bind(IUserService::class,UserService::class);
        $this->app->bind(IproductService::class,ProductService::class);
        $this->app->bind(INetWeight::class,NetWeight::class);
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
    }
    
}
