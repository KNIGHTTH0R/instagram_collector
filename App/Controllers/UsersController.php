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
        $parameters['access_token'] = ACCESS_TOKEN;
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

    public function get($userId)
    {
        if (!is_numeric($userId)) {
            $errorHelper = new Helpers\ErrorHelper();
            $response = $errorHelper->buildError(400, "userId must be numeric");

            return $response;
        }
        $apiClient = new ApiClient(API_URL);
        $parameters['access_token'] = ACCESS_TOKEN;
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

    public function getRecentMedia($userId, $maxId = null, $minId = null, $count = null)
    {
        if (!is_numeric($userId)) {
            $errorHelper = new Helpers\ErrorHelper();
            $response = $errorHelper->buildError(400, "userId must be numeric");

            return $response;
        }
        $apiClient = new ApiClient(API_URL);
        $parameters['access_token'] = ACCESS_TOKEN;
        if (!empty($maxId)) $parameters['max_id'] = $maxId;
        if (!empty($minId)) $parameters['min_id'] = $minId;
        if (!empty($count)) $parameters['count'] = $count;
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

    public function getLikedMedia($maxLikeId = null, $count = null)
    {
        $apiClient = new ApiClient(API_URL);
        $parameters['access_token'] = ACCESS_TOKEN;
        if (!empty($maxLikeId)) $parameters['max_like_id'] = $minId;
        if (!empty($count)) $parameters['count'] = $count;
        $response = $apiClient->call(
            "users/self/media/liked",
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


    public function search($query, $count = null)
    {
        $apiClient = new ApiClient(API_URL);
        $parameters = [
            'q' => $query,
            'access_token' => ACCESS_TOKEN
        ];
        if (!empty($count)) $parameters['count'] = $count;
        $response = $apiClient->call(
            "users/search",
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