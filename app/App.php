<?php
class App{
    private $controller;
    private $action;
    private $params;

    function __construct(){
        $this->controller = 'Home';
        $this->action = 'index';
        $this->params = [];

        $this->analyzeUrl();
    }

    function getUrl(){
        $url = '/';
        if(!empty($_SERVER['PATH_INFO'])){
            $url = $_SERVER['PATH_INFO'];
        }
        return $url;
    }

    function analyzeUrl(){
        $url = $this->getUrl();
        $urlArr = array_filter(explode('/',$url));
        if(!empty($urlArr[1])){
            $this->controller = ucfirst($urlArr[1]);
        }

        if(file_exists('app/controller/'.($this->controller).'.php')){
            require_once 'app/controller/'.($this->controller).'.php';
            $this->controller = new $this->controller();
            unset($urlArr[1]);
        }

        if(!empty($urlArr[2])){
            $this->action = $urlArr[2];
            unset($urlArr[2]);
        }
        
        $this->params = array_values($urlArr);

        if(method_exists($this->controller,$this->action)){
            call_user_func_array([$this->controller,$this->action],$this->params);
        }else{
            echo 'ERROR';
        }

    }
}
require_once('app/core/Controller.php');
require_once('app/core/DataBase.php');
require_once('app/core/Request.php');
require_once('app/core/Response.php');
?>