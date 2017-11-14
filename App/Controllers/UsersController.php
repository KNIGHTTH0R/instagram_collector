<?php

namespace App\Controllers;

use Silex\Application;
use HttpApiClient\ApiClient;

require_once __DIR__."/../../config/config.php";

class UsersController
{

    public function self()
    {
        $apiClient = new ApiClient(API_URL);
        $parameters = [
            'access_token' => ACCESS_TOKEN
        ];
        $response = $apiClient->call("users/self",
            $parameters,
            null,
            null,
            null,
            "GET",
            true
        );

        print_r($response);
        die;
    }
}