<?php
class DataBase{
    function connectDB(){
        $con = mysqli_connect(_HOST,_USER_NAME,_PASSWORD,_DATABASE);
        if(!$con){
            die("Can't connect to database!");
        }
        return $con;
    }

    function createDB(){
        $con = mysqli_connect(_HOST,_USER_NAME,_PASSWORD);
        if(!$con){
            die("Can't connect to database");
        }
        $con->query("CREATE DATABASE NetworkComputer_Ass1");
    }
}

?>