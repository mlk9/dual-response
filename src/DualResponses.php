<?php

namespace Mlk9\DualResponses;

use Illuminate\Support\Facades\Request;
use Carbon\Carbon;

class DualResponses
{

    private $defualtResponse = [];

    public function __construct()
    {
        $this->defualtResponse = [
            'status' => true,
            'message' => 'successful response',
            'errors' => [],
            'data' => null,
            'time' => Carbon::now()->timestamp,
        ];
    }

    /**
     * with this function you can send dual responses 
     *
     * @param mixed $webResponse
     * @param mixed $apiResponse
     * @return mixed
     */
    public function response($webResponse, $apiResponse = []) : mixed
    {
        if($this->isApiRoute() && !is_null($apiResponse))
        {
            return [...$this->defualtResponse,...$apiResponse];
        }else{
            return $webResponse;
        }
    }

    /**
     * check is an api route
     *
     * @return boolean
     */
    public function isApiRoute() : bool
    {
        if(Request::is('api/*'))
        return true;
        else
        return false;
    }

    /**
     * check is an web route
     *
     * @return boolean
     */
    public function isWebRoute() : bool
    {
        if(!Request::is('api/*'))
        return true;
        else
        return false;
    }
}
