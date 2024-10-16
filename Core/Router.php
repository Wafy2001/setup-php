<?php 

namespace Core;

class Router {
    protected $routes = [];
    
    function add($method, $uri, $controller) {
        $this->routes[] = [
            'uri' => $uri,
            'method' => $method,
            'controller' => $controller,
            'middleware' => null,
        ];
        return $this;
    }
    function route($uri, $method) {
        foreach($this->routes as $route) {
            if($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                return require basePath("Http/controllers/" . $route['controller']);
            }
        }
    }
    function abort($code) {
        http_response_code($code);
        echo $code;
        die();
    }

    public function get($uri, $controller) {
        return $this->add("GET",$uri,$controller);
    }
    public function post($uri, $controller) {
        return $this->add("POST",$uri,$controller);
    }
    public function patch($uri, $controller) {
        return $this->add("PATCH",$uri,$controller);
    }
    public function put($uri, $controller) {
        return $this->add("PUT",$uri,$controller);
    }
    public function delete($uri, $controller) {
        return $this->add("DELETE",$uri,$controller);
    }

}

?>