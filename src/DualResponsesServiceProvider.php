<?php

/**
 * DualResponses Service Provider File 
 * 
 * @package  Laravel
 * @author   Mohammad Maleki <malekii24@outlook.com>
 * @license  MIT https://github.com/mlk9/dual-responses/blob/main/LICENSE
 * @link     https://github.com/mlk9/dual-responses
 */


namespace Mlk9\DualResponses;

use Illuminate\Support\ServiceProvider;

/**
 * DualResponses Service Provider Class 
 * 
 * @package  Laravel
 * @author   Mohammad Maleki <malekii24@outlook.com>
 * @license  MIT https://github.com/mlk9/dual-responses/blob/main/LICENSE
 * @link     https://github.com/mlk9/dual-responses
 */
class DualResponsesServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() : void
    {
        $this->app->singleton('dualResponses', function ($app) {
            return new DualResponses();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides() : array
    {
        return [DualResponses::class];
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
        ], 'dual-responses');
    }

}
