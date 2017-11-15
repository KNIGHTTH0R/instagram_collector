<?php

namespace App\Controllers;

use Silex\Application;
use HttpApiClient\ApiClient;
use App\Helpers;

require_once __DIR__."/../../config/config.php";

class UsersController
{

    public function self()
    {
        $apiClient = new ApiClient(API_URL);
        $parameters = [
            'access_token' => ACCESS_TOKEN
        ];
        $response = $apiClient->call(
            "users/self",
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

    public function getUser($userId)
    {
        if (!is_numeric($userId)) {
            $errorHelper = new Helpers\ErrorHelper();
            $response = $errorHelper->buildError(400, "userId must be numeric");

            return $response;
        }
        $apiClient = new ApiClient(API_URL);
        $parameters = [
            'access_token' => ACCESS_TOKEN
        ];
        $response = $apiClient->call(
            "users/".$userId,
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

    public function getRecentMedia($userId)
    {
        $apiClient = new ApiClient(API_URL);
        $parameters = [
            'access_token' => ACCESS_TOKEN
        ];
        $response = $apiClient->call(
            "users/".$userId."/media/recent/",
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