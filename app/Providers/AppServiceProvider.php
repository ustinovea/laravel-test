<?php

namespace App\Providers;

use App\Repositories\IndicatorRepository;
use App\Services\DigitsGeneratorService;
use App\Services\GuidGeneratorService;
use App\Services\IndicatorGeneratorService;
use App\Services\StringGeneratorService;
use App\Services\SymbolsAndDigitsGeneratorService;
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
        $this->app->bind('App\Repositories\IndicatorRepository', function ($app) {
            return new IndicatorRepository();
        });

        $this->app->bind('App\Services\DigitsGeneratorService', function ($app) {
            return new DigitsGeneratorService();
        });

        $this->app->bind('App\Services\GuidGeneratorService', function ($app) {
            return new GuidGeneratorService();
        });

        $this->app->bind('App\Services\StringGeneratorService', function ($app) {
            return new StringGeneratorService();
        });

        $this->app->bind('App\Services\SymbolsAndDigitsGeneratorService', function ($app) {
            return new SymbolsAndDigitsGeneratorService();
        });

        $this->app->bind('App\Services\IndicatorGeneratorService', function ($app) {
            $service = new IndicatorGeneratorService($app->make(IndicatorRepository::class));

            $service->setGenerator('digits', $app->make(DigitsGeneratorService::class));
            $service->setGenerator('guid', $app->make(GuidGeneratorService::class));
            $service->setGenerator('string', $app->make(StringGeneratorService::class));
            $service->setGenerator('symbol_and_digits', $app->make(SymbolsAndDigitsGeneratorService::class));

            return $service;
        });
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
