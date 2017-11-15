<?php

namespace App\Controllers;

use Silex\Application;
use HttpApiClient\ApiClient;
use App\Helpers;

require_once __DIR__."/../../config/config.php";

class RelationshipsController
{

    public function follows()
    {
        $apiClient = new ApiClient(API_URL);
        $parameters['access_token'] = ACCESS_TOKEN;
        $response = $apiClient->call(
            "users/self/follows",
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

    public function followedBy()
    {
        $apiClient = new ApiClient(API_URL);
        $parameters['access_token'] = ACCESS_TOKEN;
        $response = $apiClient->call(
            "users/self/followed-by",
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

    public function requestedBy()
    {
        $apiClient = new ApiClient(API_URL);
        $parameters['access_token'] = ACCESS_TOKEN;
        $response = $apiClient->call(
            "users/self/requested-by",
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
