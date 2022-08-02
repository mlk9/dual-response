<?php

/**
 * DualResponse File 
 * 
 * @package  Laravel
 * @author   Mohammad Maleki <malekii24@outlook.com>
 * @license  MIT https://github.com/mlk9/dual-response/blob/main/LICENSE
 * @link     https://github.com/mlk9/dual-response
 */

namespace Mlk9\DualResponse;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;

/**
 * DualResponse Class 
 * 
 * @package  Laravel
 * @author   Mohammad Maleki <malekii24@outlook.com>
 * @license  MIT https://github.com/mlk9/dual-response/blob/main/LICENSE
 * @link     https://github.com/mlk9/dual-response
 */
class DualResponse
{

    private $defualtResponse = [];

    public function __construct()
    {
        $this->defualtResponse = [
            'status_result' => true,
            'status_code' => 200,
            'message' => __('dualres.request_successful'),
            'errors' => null,
            'data' => null,
            'current_time' => now()->timestamp,
        ];
    }

    /**
     * with this function you can send dual response 
     *
     * @param mixed $webResponse
     * @param mixed $apiResponse
     * @return mixed
     */
    public function response($webResponse, $apiResponse = []) : mixed
    {
        if(array_key_exists('errors',$apiResponse) && !empty($apiResponse['errors']))
        {
            $this->defualtResponse['status_result'] = false;
            $this->defualtResponse['status_code'] = !array_key_exists('status_code',$apiResponse) ? 400 : $apiResponse['status_code'];
            $this->defualtResponse['message'] = !array_key_exists('message',$apiResponse) ? __('dualres.request_not_valid') : $apiResponse['message'];
        }
        if(array_key_exists('data',$apiResponse) && empty($apiResponse['data']))
        {
            $this->defualtResponse['status_result'] = false;
            $this->defualtResponse['status_code'] = !array_key_exists('status_code',$apiResponse) ? 404 : $apiResponse['status_code'];
            $this->defualtResponse['message'] = !array_key_exists('message',$apiResponse) ? __('dualres.not_found') : $apiResponse['message'];
            if($this->isWebRoute())
            {
                abort(404);
            }
        }

        //merged response together
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
