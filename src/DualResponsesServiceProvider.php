<?php

namespace Mlk9\DualResponses;

use Illuminate\Support\Facades\Validator;

class DualResponsesServiceProvider
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
        $this->ExtendValidation();
    }

    /**
     * Add DualResponces validation rule
     * @return void
     */
    protected function ExtendValidation(): void
    {
        Validator::extend("api_route",function ($attr,$value){
            return app("dualResponses")->isApiRoute($value);
        },"is not an api route");

        Validator::extend("web_route",function ($attr,$value){
            return app("dualResponses")->isWebRoute($value);
        },"is not an web route");
    }
}
