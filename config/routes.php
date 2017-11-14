<?php
require_once __DIR__.'/bootstrap.php';

$app->get('/users/self', '\App\Controllers\UsersController::self');

//$app->get('/users/self{name}', function () use () {
//    return 'Hello '.$app->escape($name);
//});
