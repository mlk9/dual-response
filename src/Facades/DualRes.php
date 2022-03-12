<?php
/**
 * DualResponse Facade File 
 * 
 * @package  Laravel
 * @author   Mohammad Maleki <malekii24@outlook.com>
 * @license  MIT https://github.com/mlk9/dual-response/blob/main/LICENSE
 * @link     https://github.com/mlk9/dual-response
 */

namespace Mlk9\DualResponse\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Mlk9\DualRes Methods
 *
 * @method   mixed responce(mixed $webResponce, mixed $apiResponce = null) Sets Mlk9\DualResponse
 * @method   boolean isApiRoute() Gets Mlk9\DualResponse 
 * @method   boolean isWebRoute() Gets Mlk9\DualResponse 
 * @package  Laravel
 * @author   Mohammad Maleki <malekii24@outlook.com>
 * @license  MIT https://github.com/mlk9/dual-response/blob/main/LICENSE
 * @link     https://github.com/mlk9/dual-response
 */
class DualRes extends Facade
{
    /**
     * Define facade function
     *
     * @return string
     */
    protected static function getFacadeAccessor() : string
    {
        return 'dualResponse';
    }
}
