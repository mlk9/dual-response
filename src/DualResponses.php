<?php

namespace Mlk9\DualResponses;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;

class DualResponses
{

    private $defualtResponse = [];

    public function __construct()
    {
        $this->defualtResponse = [
            'status_result' => true,
            'status_code' => 200,
            'message' => _('request_successful'),
            'errors' => null,
            'data' => null,
            'current_time' => now()->timestamp,
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
        if(array_key_exists('errors',$apiResponse) && empty($apiResponse['errors']))
        {
            $this->defualtResponse['status_result'] = false;
            $this->defualtResponse['status_code'] = !array_key_exists('status_code',$apiResponse) ? 400 : $apiResponse['status_code'];
            $this->defualtResponse['message'] = !array_key_exists('message',$apiResponse) ? _('request_failed') : $apiResponse['message'];
        }
        if(array_key_exists('data',$apiResponse) && empty($apiResponse['data']))
        {
            $this->defualtResponse['status_result'] = false;
            $this->defualtResponse['status_code'] = !array_key_exists('status_code',$apiResponse) ? 404 : $apiResponse['status_code'];
            $this->defualtResponse['message'] = !array_key_exists('message',$apiResponse) ? _('not_found') : $apiResponse['message'];
            if($this->isWebRoute())
            {
                abort(404);
            }
        }

        //merged responses together
        $mergedResponse = array_merge($this->defualtResponse,$apiResponse);

        //minify the json response
        foreach($mergedResponse as $key => $value)
        {
            if(is_null($value))
            {
                unset($mergedResponse[$key]);
            }
        }

        if($this->isApiRoute() && !is_null($apiResponse))
        {
            return Response::json($mergedResponse,$this->defualtResponse['status_code']);
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
