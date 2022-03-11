<?php

namespace Mlk9\DualResponces;

use Illuminate\Support\Facades\Validator;

class DualResponcesServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() : void
    {
        $this->app->singleton('dualResponces', function ($app) {
            return new DualResponces();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides() : array
    {
        return [DualResponces::class];
    }

    /**
     * bootstrap
     *
     * @return void
     */
    public function boot() : void
    {
        $this->ExtendValidation();
    }

    /**
     * Add DualResponces validation rule
     * @return void
     */
    protected function ExtendValidation(): void
    {
        Validator::extend("api_route",function ($attr,$value){
            return app("dualResponces")->isApiRoute($value);
        },"is not an api route");

        Validator::extend("web_route",function ($attr,$value){
            return app("dualResponces")->isWebRoute($value);
        },"is not an web route");
    }
}
