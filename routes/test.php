<?php

\HongXunPan\Framework\Route\Route::get('/', function () {
    return 'Hello Simple';
});

\HongXunPan\Framework\Route\Route::get('/test', function () {
    return [
        'code' => 0,
        'data' => [],
        'msg' => 'ok',
    ];
});