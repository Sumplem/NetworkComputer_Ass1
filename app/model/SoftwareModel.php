<?php
class SoftwareModel{
    function getSoftware(){
        $con = new DataBase();
        $con = $con->connectDB();
        $query = mysqli_query($con,"SELECT * FROM softwareinfo");
        return $query;
    }
}
?>