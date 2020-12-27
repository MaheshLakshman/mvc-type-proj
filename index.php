<?php
include_once __DIR__.'/vendor/autoload.php';
use App\Application;
use Controllers\TestController;

$app = new Application();


$app->route->get('/home', function () {
    return "Hai";
});

$app->route->get('/test', [TestController::class, 'get']);




$app->run();

