<?php
class AccountModel {
    function validate($data){
        $regex_name = "/^[a-zA-Z ]{2,30}$/";
        $regex_phone_num = "/^\d{10}$/";
        $regex_email = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
        $regex_acc = "/^[a-zA-Z0-9]{6,20}$/";

        if(!preg_match($regex_name,$data['name'])){
            return false;
        }
        if(!preg_match($regex_phone_num,$data['phone'])){
            return false;
        }
        if(!preg_match($regex_email,$data['email'])){
            return false;
        }
        if(!preg_match($regex_acc,$data['user_name'])){
            return false;
        }
        if(!preg_match($regex_acc,$data['password'])){
            return false;
        }

        $database = new DataBase();
        $con = $database->connectDB();
        $user_name = $data["user_name"];
        $query = mysqli_query($con,"SELECT id FROM thanhvien WHERE user_name='$user_name'");
        if(mysqli_num_rows($query)>0){
            return false;
        }
        return true;
    }
}
?>