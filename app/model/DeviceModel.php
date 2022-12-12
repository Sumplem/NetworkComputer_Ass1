<?php
class DeviceModel{
    function getDeviceList($type=''){
        $con = new DataBase();
        $con = $con->connectDB();
        if($type==''){
            $query = mysqli_query($con,"SELECT id,name,type,price,img FROM device ORDER BY id DESC");
        }else{
            $query = mysqli_query($con,"SELECT id,name,type,price,img FROM device WHERE type = '$type' ORDER BY id DESC");
        }
        return $query;
    }
    function getDevice($id = 0){
        $con = new DataBase();
        $con = $con->connectDB();
        $query = mysqli_query($con,"SELECT * FROM device WHERE id = $id LIMIT 1");
        return $query;
    }

    function validate($data = []){
        $regex_name = "/^[a-zA-Z ]{2,30}$/";
        $regex_number = "/^\d+$/";
        $regex_extensions = "/(\.jpg|\.jpeg|\.png)$/i";
        if(!preg_match($regex_name,$data['info']['name'])){
            return false;
        }
        if($data['info']['type'] !== 'camera' && $data['info']['type'] !== 'detector'){
            return false;
        }
        if(!preg_match($regex_number,$data['info']['price'])){

            return false;
        }
        if(!preg_match($regex_number,$data['info']['quantity'])){
            return false;
        }
        if(getimagesize($data['img']['tmp_name']) == false){
            return false;
        }
        foreach($data['sub_img']['tmp_name'] as $sub_img){
            if(getimagesize($sub_img) == false){

                return false;
            }
        }
        return true;
    }
}
?>