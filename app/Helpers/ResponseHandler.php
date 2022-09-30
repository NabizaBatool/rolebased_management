<?php

/**
 * Created by PhpStorm.
 * User: Nabiza
 * Date: 9/27/2022
 * Time: 4:09 PM
 */

namespace App\Helpers;

class ResponseHandler
{
    public static function success($message = "Request Successfull", $result = [], $code = 200)
    {
        $response = [
            'code' => $code,
            'message' => $message,
            'data'   => (object)$result,
            'error'  => array(),

        ];

        return response()->json($response);
    }


    public static function failure($message = "Request Failed", $result = [], $code = 404)
    {
        $response = [
            'code' => $code,
            'message' => $message,
            'data'   => (object)$result,
            'error'  => array(),

        ];
        return response()->json($response);
    }
}
