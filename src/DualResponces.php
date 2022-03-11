<?php

namespace Mlk9\DualResponces;

use Illuminate\Support\Facades\Request;

class DualResponces
{
    /**
     * with this function you can send dual responces 
     *
     * @param mixed $webResponse
     * @param mixed $apiResponse
     * @return mixed
     */
    public function response($webResponse, $apiResponse = null) : mixed
    {
        if(Request::is('api/*') && !is_null($apiResponse))
        {
            return $apiResponse;
        }else{
            return $webResponse;
        }
    }
}
