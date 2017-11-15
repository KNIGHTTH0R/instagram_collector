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

            print_r($response);
            die;
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

    public function getSelfRecentMedia($count = null, $maxId = null, $minId = null)
    {
        $apiClient = new ApiClient(API_URL);
        $parameters['access_token'] = ACCESS_TOKEN;
        if (isset($maxId)) $parameters['max_id'] = $maxId;
        if (isset($minId)) $parameters['min_id'] = $minId;
        if (isset($count)) $parameters['count'] = $count;
        $response = $apiClient->call(
            "users/self/media/recent/",
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

    public function getRecentMedia($userId, $count = null, $maxId = null, $minId = null)
    {
        if (!is_numeric($userId)) {
            $errorHelper = new Helpers\ErrorHelper();
            $response = $errorHelper->buildError(400, "userId must be numeric");

            print_r($response);
            die;
        }
        $apiClient = new ApiClient(API_URL);
        $parameters['access_token'] = ACCESS_TOKEN;
        if (isset($maxId)) $parameters['max_id'] = $maxId;
        if (isset($minId)) $parameters['min_id'] = $minId;
        if (isset($count)) $parameters['count'] = $count;
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
        if (isset($maxLikeId)) $parameters['max_like_id'] = $maxLikeId;
        if (isset($count)) $parameters['count'] = $count;
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
