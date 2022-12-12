<?php
class Controller{
    function model($model){
        if(file_exists('app/model/'.$model.'.php')){
            require_once('app/model/'.$model.'.php');
            if(class_exists($model)){
                $model = new $model;
                return $model;
            }
        }
        return false;
    }

    function render($view,$data=[]){
        extract($data);
        if(file_exists('app/view/'.$view.'.php')){
            require_once ('app/view/'.$view.'.php');
        }
    }
}
?>