<?php

namespace App\Providers;

use App\Handlers\CreateOrderHandler;
use App\Handlers\DeleteOrderHandler;
use App\Repositories\OrderRepository;
use App\Repositories\OrderRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Repositories\ProductRepositoryInterface;
use App\Repositories\ProductRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);

        // dynamic binding to use with multiple discounts.
        $this->app->bind(CreateOrderHandler::class, function($app) {
            $discountHandlersConfig = config('discount.handlers');
            $firstHandler = null;
            $previousHandler = null;

            foreach ($discountHandlersConfig as $handlerClass => $param) {
                $handler = is_null($param) ? new $handlerClass() : new $handlerClass($param);
                if (is_null($firstHandler)) {
                    $firstHandler = $handler;
                }
                if (!is_null($previousHandler)) {
                    $previousHandler->setNext($handler);
                }
                $previousHandler = $handler;
            }

            return new CreateOrderHandler(
                $app->make(OrderRepositoryInterface::class),
                $app->make(ProductRepositoryInterface::class),
                $firstHandler
            );
        });

        $this->app->bind(DeleteOrderHandler::class, function($app) {
            return new DeleteOrderHandler($app->make(OrderRepositoryInterface::class));
        });
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
