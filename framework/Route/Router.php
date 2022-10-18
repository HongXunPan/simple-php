<?php

namespace HongXunPan\Framework\Route;

class Router
{
    public static function checkRoute(string $uri = '')
    {
        if (!$uri) {
            $uri = explode('?', $_SERVER['REQUEST_URI'])[0];
        }
        //如果不存在

        //method 错误
        dd($uri, (!$uri));
    }
}