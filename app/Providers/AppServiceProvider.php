<?php

namespace App\Providers;

use App\Service\Client\IClientService;
use App\Service\Auth\AuthService;
use App\Service\User\UserService;
use App\Service\Auth\IAuthService;
use App\Service\User\IUserService;
use App\Service\NetWeight\NetWeight;
use Illuminate\Pagination\Paginator;
use App\Service\Client\ClientService;
use App\Service\NetWeight\INetWeight;
use App\Service\Product\ProductService;
use App\Service\product\IproductService;
use App\Service\Category\CategoryService;
use App\Service\Category\ICategoryService;
use App\Service\Order\IOrderService;
use App\Service\Order\OrderService;
use App\Service\SearchProduct\SearchProduct;
use SocialiteProviders\Manager\ServiceProvider;
use App\Service\SearchProduct\ISearchProductService;

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
        $this->app->bind(ICategoryService::class , CategoryService::class);
        $this->app->bind(ISearchProductService::class,SearchProduct::class);
        // $this->app->bind(IClientService::class,ClientService::class);
        $this->app->bind(IOrderService::class,OrderService::class);
    }   

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
    }
    
}
