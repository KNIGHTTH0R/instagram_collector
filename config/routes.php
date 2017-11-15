<?php
require_once __DIR__.'/bootstrap.php';

$app->get('/users/self', '\App\Controllers\UsersController::self');

$app->get('/users/{userId}',
    function ($userId = "") {
        $controller = new App\Controllers\UsersController();
        return $controller->get($userId);
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

$app->get('/users/search/{query}',
    function ($query = "") {
        $controller = new App\Controllers\UsersController();
        return $controller->search($query);
    }
)
    ->value('userId', '');

//$app->get('/users/self{name}', function () use () {
//    return 'Hello '.$app->escape($name);
//});
