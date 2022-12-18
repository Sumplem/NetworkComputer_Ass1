<?php
class AccountModel {
    private $db;
    private $conn;

    function __construct(){
        $this->db = new DataBase;
        $this->conn = $this->db->connectDB();
    }

    function getID($userName, $password) {
        $sql = "SELECT ID FROM account WHERE Username='$userName' and Pass='$password' LIMIT 1";
        $query = mysqli_query($this->conn,$sql);

        if(mysqli_num_rows($query) == 1){
            return mysqli_fetch_array($query)['ID'];
        }

        return false;
    }

    function getInfo($ID) {
        $sql = "SELECT * FROM userchatchit WHERE ID = '$ID' LIMIT 1";
        $query = mysqli_query($this->conn,$sql);

        if(mysqli_num_rows($query) != 1){
            return NULL;
        }

        $data = mysqli_fetch_array($query);
        return $data;
    }

    function createUserID(){
        do {
            $ID = bin2hex(random_bytes(16));
        }
        while (!$this->conn->query("SELECT ID FROM userchatchit WHERE ID = '$ID' LIMIT 1"));

        return $ID;
    }

    function getFriends($ID,$str) {
        if(!$str) {
            $sql = "SELECT * FROM friend t1
            LEFT JOIN userchatchit t2
            ON t1.ID_friend = t2.ID
            WHERE t1.ID = '$ID'";

            return $this->conn->query($sql);
        }

        $sql = "SELECT * FROM friend t1
        LEFT JOIN userchatchit t2
        ON t1.ID_friend = t2.ID
        WHERE t1.ID = '$ID' AND Name LIKE '%$str%' OR PhoneNumber LIKE '%$str%' OR Email LIKE '%$str%'";

        return $this->conn->query($sql);

    }

    function findContacts($ID,$str) {
        $sql = "SELECT * FROM userchatchit WHERE ID <> '$ID' AND (Name LIKE '%$str%' OR PhoneNumber LIKE '%$str%' OR Email LIKE '%$str%')";
        return $this->conn->query($sql);
    }

    function isFriend($ID, $ID_oth) {
        $sql = "SELECT * FROM friend WHERE ID = '$ID' AND ID_friend = '$ID_oth'";

        if(mysqli_num_rows(mysqli_query($this->conn, $sql))) {
            return true;
        }
        return false;
    }

    function addFriend($ID,$ID_oth) {
        $sql = "DELETE FROM friendrequest WHERE ID = '$ID' AND ID_request = '$ID_oth'";
        $this->conn->query($sql);

        $sql = "INSERT INTO friend VALUES ('$ID','$ID_oth'), ('$ID_oth','$ID');";
        $this->conn->query($sql);
    }

    function sendFriendRequest($ID,$sendToID) {
        $sql = "INSERT INTO friendrequest(ID,ID_request) VALUES ('$sendToID','$ID')";
        $this->conn->query($sql);
    }

    function isSendRequest($ID,$sendToID) {
        $sql = "SELECT * FROM friendrequest WHERE ID = '$sendToID' AND ID_request = '$ID'";
        if(mysqli_num_rows(mysqli_query($this->conn, $sql))) {
            return true;
        }
        return false;
    }

    function getFriendRequest($ID) {
        $sql = "SELECT ID_request AS ID, Name, PhoneNumber, Email
                FROM friendrequest t1
                LEFT JOIN userchatchit t2
                ON t1.ID_request = t2.ID
                WHERE t1.ID = '$ID'";

        return $this->conn->query($sql);
    }

    function validate($data){
        $regex_name = "/^[a-zA-Z ]{2,30}$/";
        $regex_phone_num = "/^\d{10}$/";
        $regex_email = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
        $regex_acc = "/^[a-zA-Z0-9]{6,20}$/";

        if(!preg_match($regex_name,$data['name'])){
            return false;
        }
        if($data['phone'] != null){
            if(!preg_match($regex_phone_num,$data['phone'])){
                return false;
            }
        }
        if($data['email'] != null) {
            if(!preg_match($regex_email,$data['email'])){
                return false;
            }
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
        $query = mysqli_query($con,"SELECT ID FROM account WHERE Username='$user_name'");
        if(mysqli_num_rows($query)>0){
            return false;
        }
        return true;
    }

    function getName($ID){
        $sql = "SELECT Name FROM userchatchit WHERE ID = '$ID'";
        $data = mysqli_fetch_array($this->conn->query($sql));
        return $data['Name'];
    }

    function setP2pID($ID, $p2pID) {
        $sql = "UPDATE userchatchit SET PeerID = '$p2pID' WHERE ID = '$ID'";

        $this->conn->query($sql);
    }

    function getP2pID($ID) {
        $sql = "SELECT PeerID FROM userchatchit WHERE ID = '$ID'";

        return mysqli_fetch_array($this->conn->query($sql));
    }
}
?>