<?php
require_once __DIR__.'/bootstrap.php';

$app->get('/users/self', '\App\Controllers\UsersController::self');

$app->get('/users/{userId}',
    function ($userId = "") {
        $controller = new App\Controllers\UsersController();
        return $controller->getUser($userId);
    }
)
    ->value('userId', '');

$app->get('/users/{userId}/recentmedia',
    function ($userId = "") {
        $controller = new App\Controllers\UsersController();
        return $controller->getRecentMedia($userId);
    }
)
    ->value('userId', '');

//$app->get('/users/self{name}', function () use () {
//    return 'Hello '.$app->escape($name);
//});
