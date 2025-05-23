<?php

namespace core;

use app\routes\Routes;
use app\shared\support\RequestType;
use app\shared\support\Uri;

class RoutersFilter
{
    private string $uri;
    private string $method;
    private array $routesRegistered;

    public function __construct()
    {
        $this->uri = Uri::getUri();
        $this->method = RequestType::get();
        $this->routesRegistered = Routes::get();
    }

    private function simpleRouter()
    {
        if (array_key_exists($this->uri, $this->routesRegistered[$this->method])) {
            return $this->routesRegistered[$this->method][$this->uri];
        }

        return null;
    }

    private function dynamicRouter()
    {
        foreach ($this->routesRegistered[$this->method] as $index => $route) {
            $regex = str_replace('/', '\/', ltrim($index, '/'));
            if ($index !== '/' && preg_match("/^$regex$/", trim($this->uri, '/'))) {
                $routerRegisteredFound = $route;
                break;
            } else {
                $routerRegisteredFound = null;
            }
        }

        return $routerRegisteredFound;
    }

    public function get()
    {
        $router = $this->simpleRouter();

        if ($router) {
            return $router;
        }

        $router = $this->dynamicRouter();

        if ($router) {
            return $router;
        }

        return 'NotFoundController@index';
    }
}
