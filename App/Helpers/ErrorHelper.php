<?php

namespace App\Helpers;

class ErrorHelper
{

    public function buildError($code, $msg)
    {
        $errorData = $this::errorSwitch($code);
        $error = [
            'header' => [
                $errorData['header']
            ],
            'body' => [
                'httpCode' => $code,
                'errorType' => $errorData['type'],
                'errorMessage' => $msg
            ]
        ];

        return json_encode($error);
    }


    private static function errorSwitch($code)
    {
        $errorData['header'] = "";
        $errorData['type'] = "Unknown";
        switch ($code) {
            case 400:
                $errorData['header'] = "HTTP/1.0 400 Bad Request";
                $errorData['type'] = "Bad Request";
                break;
            case 401:
                $errorData['header'] = "HTTP/1.0 401 Unauthorized";
                $errorData['type'] = "Unauthorized";
                break;
            case 403:
                $errorData['header'] = "HTTP/1.0 403 Forbidden";
                $errorData['type'] = "Forbidden";
                break;
        }

        return $errorData;
    }
}
