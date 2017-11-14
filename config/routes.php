<?php
require_once __DIR__.'/bootstrap.php';

$app->get('/', '\App\Controllers\WelcomeController::Index');

//$app->get('/hello/{name}', function ($name) use ($app) {
//    return 'Hello '.$app->escape($name);
//});
