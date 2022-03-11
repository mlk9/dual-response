<?php

namespace Mlk9\DualResponses\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Mlk9\DualRes Methods
 *
 * @method   mixed responce(mixed $webResponce, mixed $apiResponce = null) Sets Mlk9\DualResponses
 * @method   boolean isApiRoute() Gets Mlk9\DualResponses 
 * @method   boolean isWebRoute() Gets Mlk9\DualResponses 
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
        return 'dualResponses';
    }
}
