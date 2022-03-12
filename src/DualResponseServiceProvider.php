<?php

/**
 * DualResponse Service Provider File 
 * 
 * @package  Laravel
 * @author   Mohammad Maleki <malekii24@outlook.com>
 * @license  MIT https://github.com/mlk9/dual-response/blob/main/LICENSE
 * @link     https://github.com/mlk9/dual-response
 */


namespace Mlk9\DualResponse;

use Illuminate\Support\ServiceProvider;

/**
 * DualResponse Service Provider Class 
 * 
 * @package  Laravel
 * @author   Mohammad Maleki <malekii24@outlook.com>
 * @license  MIT https://github.com/mlk9/dual-response/blob/main/LICENSE
 * @link     https://github.com/mlk9/dual-response
 */
class DualResponseServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() : void
    {
        $this->app->singleton('dualResponse', function ($app) {
            return new DualResponse();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides() : array
    {
        return [DualResponse::class];
    }

    /**
     * bootstrap
     *
     * @return void
     */
    public function boot() : void
    {
        $this->publishes([
            __DIR__.'/../lang' => is_dir(resource_path('lang')) ? resource_path('lang') : base_path('lang'),   
        ], 'dual-response');
    }

}
