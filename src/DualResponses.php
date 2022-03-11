<?php

namespace Mlk9\DualResponses;

use Illuminate\Support\Facades\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Response;

class DualResponses
{

    private $defualtResponse = [];

    public function __construct()
    {
        $this->defualtResponse = [
            'status' => true,
            'code' => 200,
            'message' => _('request_successful'),
            'errors' => [],
            'data' => null,
            'time' => now()->timestamp,
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
        if(isset($apiResponse['errors']))
        {
            $this->defualtResponse['status'] = false;
            $this->defualtResponse['code'] = !isset($apiResponse['code']) ? 400 : $apiResponse['code'];
            $this->defualtResponse['message'] = !isset($apiResponse['message']) ? _('request_failed') : $apiResponse['message'];
        }
        if($this->isApiRoute() && !is_null($apiResponse))
        {
            return Response::json(array_merge($this->defualtResponse,$apiResponse),$this->defualtResponse['code']);
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
        return Request::is('api/*') ? true : false;
    }

    /**
     * check is an web route
     *
     * @return boolean
     */
    public function isWebRoute() : bool
    {
        return Request::is('api/*') ? false : true;
    }
}
