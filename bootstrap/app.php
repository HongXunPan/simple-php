<?php

use HongXunPan\Framework\Core\App;
use HongXunPan\Framework\Route\Route;

$app = new App();

$app->run(function () {
    Route::loadAllRouteByFile('../routes');

    $res = Route::getInstance()->run();
    dump($res);
});

return $app;