<?php
class Home extends Controller{
    private $home;
    private $data;

    function __construct(){
        $this->home = $this->model('HomeModel');
        $this->data['content'] = 'Home/index';
    }

    function index(){
        $this->data['content'] = 'Home/index';
        $this->render('Home/index',$this->data);
    }
}
?>