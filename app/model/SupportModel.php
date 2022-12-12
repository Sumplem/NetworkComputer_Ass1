<?php
class SupportModel{
    function getQNA(){
        $con = new DataBase();
        $con = $con->connectDB();
        $query = mysqli_query($con,"SELECT * FROM qna");
        return $query;
    }
}
?>