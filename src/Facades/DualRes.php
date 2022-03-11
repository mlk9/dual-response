<?php

namespace Mlk9\DualResponces\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Mlk9\DualRes Methods
 *
 * @method   void responce(mixed $webResponce, mixed $apiResponce = null) Sets Mlk9\DualResponces
 * @method   void isApiRoute() Gets Mlk9\DualResponces 
 * @method   void isWebRoute() Gets Mlk9\DualResponces 
 * @category http response
 * @package  Laravel
 * @author   Mohammad Maleki <malekii24@outlook.com>
 * @license  MIT https://github.com/mlk9/dual-responses/blob/main/LICENSE
 * @link     https://github.com/mlk9/dual-responses
 */
class DualRes extends Facade
{
    /**
     * Define facade function
     *
     * @return void
     */
    protected static function getFacadeAccessor()
    {
        return 'dualResponces';
    }
}