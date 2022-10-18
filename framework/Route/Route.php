<?php

namespace HongXunPan\Framework\Route;

use Closure;
use HongXunPan\Framework\Core\SingleAbstract;

/**
 * @method static RouteRegister any(string $path, array|string|callable $action)
 * @method static RouteRegister get(string $path, array|string|callable $action)
 * @method static RouteRegister post(string $path, array|string|callable $action)
 * @method static void group(array|Closure $options, Closure $callback = null)
 *
 * @method static Route getInstance()
 *
 * Created by PhpStorm At 2022/10/17 06:11.
 * Author: HongXunPan
 * Email: me@kangxuanpeng.com
 */
class Route extends SingleAbstract
{
    public array $routeList = [];

    private Group $defaultGroup;

    protected function __construct()
    {
        $this->defaultGroup = new Group();
    }

    public static function __callStatic(string $name, array $arguments)
    {
        $instance = self::getInstance();
        return $instance->defaultGroup->$name(...$arguments);
    }

    public static function setRouteList(string $uri, array $route)
    {
        self::getInstance()->routeList[$uri] = $route;
    }

    public static function removeRoute(string $uri)
    {
        if (isset(self::getInstance()->routeList[$uri])) {
            unset(self::getInstance()->routeList[$uri]);
        }
    }

    public static function getRouteByUri(string $uri)
    {
        return self::getInstance()->routeList[$uri] ?? null;
    }

    public static function getRouteByName(string $name): array
    {
        $routeList = self::getInstance()->routeList;
        $uri = array_search($name, array_column($routeList, 'name', 'uri'));
        if ($uri === false) {
            throw new  RouteException("route name: $name not found");
        }
        return $routeList[$uri];
    }
}