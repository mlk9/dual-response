<?php

namespace Mlk9\DualResponses;

use Illuminate\Support\Facades\Request;

class DualResponses
{
    /**
     * with this function you can send dual responses 
     *
     * @param mixed $webResponse
     * @param mixed $apiResponse
     * @return mixed
     */
    public function response($webResponse, $apiResponse = null) : mixed
    {
        if($this->isApiRoute() && !is_null($apiResponse))
        {
            return $apiResponse;
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
