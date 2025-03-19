<?php

namespace Core;

class Router 
{
    protected array $routes = [];

    protected function addRoute(string $uri, string $method, string $controller): void {     
        $this->routes[] = [
            'uri' => $uri,
            'method' => $method,
            'controller' => $controller,
        ];
    }

    public function get(string $uri, string $controller): void {
        $this->addRoute($uri, "GET", $controller);
    }

    public function post(string $uri, string $controller): void {
        $this->addRoute($uri, "POST", $controller);
    }

    public function delete(string $uri, string $controller): void {
        $this->addRoute($uri, "DELETE", $controller);
    }

    public function put(string $uri, string $controller): void {
        $this->addRoute($uri, "PUT", $controller);
    }

    public function route(string $uri, string $method, Database $connection): void {
        foreach($this->routes as $route) {
            if($route["uri"] == $uri && $route["method"] == $method) {
                require BASE_PATH . "/controllers/" . $route["controller"];

                return;
            }
        }

        http_response_code(404);
        exit("This Page Doesn't Exist!");
    }
}