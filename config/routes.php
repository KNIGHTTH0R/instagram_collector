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

$app->get('/users/{userId}/recentmedia/{count}/{maxId}/{minId}',
    function ($userId = "", $count = null, $maxId = null, $minId = null) {
        $controller = new App\Controllers\UsersController();
        return $controller->getRecentMedia($userId, $count, $maxId, $minId);
    }
)
    ->value('userId', '')
    ->value('count', null)
    ->value('maxId', null)
    ->value('minId', null);

$app->get('/users/search/{query}/{count}',
    function ($query = "", $count = null) {
        $controller = new App\Controllers\UsersController();
        return $controller->search($query, $count);
    }
)
    ->value('query', '')
    ->value('count', null);


//$app->get('/users/self{name}', function () use () {
//    return 'Hello '.$app->escape($name);
//});
