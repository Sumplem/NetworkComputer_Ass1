<?php
class HomeModel{
    function getNewProduct($type=''){
        $database = new DataBase();
        $con = $database->connectDB();
        if($type==''){
            $data = mysqli_query($con,"SELECT MAX(id) AS id FROM device LIMIT 1");
        }else{
            $data = mysqli_query($con,"SELECT MAX(id) AS id FROM device WHERE type = '$type' LIMIT 1");
            if(mysqli_num_rows($data)>0){
                $id = mysqli_fetch_array($data)['id'];
                $data = mysqli_query($con,"SELECT id,name,price,img FROM device WHERE id = $id LIMIT 1");
            }
        }
        return $data;
    }
}
?>