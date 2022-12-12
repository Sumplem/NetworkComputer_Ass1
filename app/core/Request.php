<?php
class Request{
    function getMethod(){
        return $_SERVER['REQUEST_METHOD'];
    }

    function isGet(){
        return $this->getMethod() == 'GET';
    }

    function isPost(){
        return $this->getMethod() == 'POST';
    }

    function getData(){
        $data = [];
        if($this->isGet()&&!empty($_GET)){
            foreach($_GET as $key=>$val){
                $data[$key] = filter_input(INPUT_GET,$key,FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }else if($this->isPost()&&!empty($_POST)){
            foreach($_POST as $key=>$val){
                $data[$key] = filter_input(INPUT_POST,$key,FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        return $data;
    }
}
?>