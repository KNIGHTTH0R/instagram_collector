<?php

namespace App\Controllers;

use Silex\Application;
use HttpApiClient\ApiClient;
use App\Helpers;

require_once __DIR__."/../../config/config.php";

class MediaController
{

    public function getById($mediaId)
    {
        $apiClient = new ApiClient(API_URL);
        $parameters['access_token'] = ACCESS_TOKEN;
        $response = $apiClient->call(
            "media/".$mediaId,
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


    public function getByShortCode($shortCode)
    {
        $apiClient = new ApiClient(API_URL);
        $parameters['access_token'] = ACCESS_TOKEN;
        $response = $apiClient->call(
            "media/shortcode/".$shortCode,
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