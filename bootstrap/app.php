<?php

use HongXunPan\Framework\Core\Application as App;
use HongXunPan\Framework\Route\Route;

$app = App::getInstance();

$app->run(function (App $app) {
    $app->init(dirname(__DIR__));
    $app->loadRoute();
    $app->setResponse(Route::getInstance()->run())->send();
});

return $app;