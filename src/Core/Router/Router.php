<?php

namespace Gcpf\Core\Router;

class Router {

    private $routes = [];
    private $notFound;

    public function __construct(){
        $this->notFound = function($url){
            echo "404 - $url was not found!";
        };
    }

    public function add($url, $action){
        $this->routes[$url] = $action;
    }

    public function setNotFound($action){
        $this->notFound = $action;
    }

    public function dispatch(){

        $params = $_POST;
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $params = $_GET;
        }

        foreach ($this->routes as $url => $action) {
            if( $url == '/'.$_GET["param"] ){
                if(is_callable($action)) return $action();

                $actionArr = explode('#', $action);
                $controller = 'Gcpf\\App\\Controllers\\'.$actionArr[0];
                $method = $actionArr[1];

                return (new $controller)->$method($params);
            }
        }
        call_user_func_array($this->notFound,[$params['param']]);
    }
}