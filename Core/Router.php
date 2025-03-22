<?php

namespace Core;

use Core\Middleware\Guest;
use Core\Middleware\Middleware;

class Router 
{
    protected array $routes = [];

    protected function addRoute(string $uri, string $method, string $controller): Router  {     
        $this->routes[] = [
            'uri' => $uri,
            'method' => $method,
            'controller' => $controller,
            'middleware' => null
        ];

        return $this;
    }

    public function get(string $uri, string $controller): Router {
        return $this->addRoute($uri, "GET", $controller);
    }

    public function post(string $uri, string $controller): Router {
        return $this->addRoute($uri, "POST", $controller);
    }

    public function delete(string $uri, string $controller): Router {
        return $this->addRoute($uri, "DELETE", $controller);
    }

    public function put(string $uri, string $controller): Router {
        return $this->addRoute($uri, "PUT", $controller);
    }

    public function only(string $key): Router {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;

        return $this;
    }

    public function route(string $uri, string $method): void {
        foreach($this->routes as $route) {
            if($route["uri"] == $uri && $route["method"] == $method) {
                new Middleware()->resolve($route["middleware"]);

                require BASE_PATH . "/controllers/" . $route["controller"];

                return;
            }
        }

        http_response_code(404);
        exit("This Page Doesn't Exist!");
    }
}