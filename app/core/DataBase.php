<?php
class DataBase{
    function createDB(){
        $con = mysqli_connect(_HOST,_USER_NAME,_PASSWORD);
        if(!$con){
            die("Can't connect to database");
        }
        $con->query("CREATE DATABASE "._DATABASE);
        $conn = mysqli_connect(_HOST, _USER_NAME, _PASSWORD, _DATABASE);

        $conn->query("Create table userchatchit (
            ID varchar(32) NOT NULL,
            Name varchar(100) NOT NULL,
            PhoneNumber varchar(10) DEFAULT NULL,
            Email varchar(100) DEFAULT NULL,
            PeerID varchar(100) DEFAULT NULL,
        
            PRIMARY KEY (ID)
        );");

        $conn->query("Create table account (
            Username varchar(50) NOT NULL,
            Pass varchar(50) NOT NULL,
            ID varchar(32) NOT NULL,
        
            PRIMARY KEY (Username),
            UNIQUE (Username),
            FOREIGN KEY (ID) REFERENCES userchatchit(ID)
        );");

        $conn->query("Create table Friend (
            ID varchar(32) NOT NULL ,
            ID_friend varchar(32) NOT NULL,
        
            PRIMARY KEY (ID,ID_friend),
            FOREIGN KEY (ID) REFERENCES userchatchit(ID),
            FOREIGN KEY (ID_friend) REFERENCES userchatchit(ID)
        );");

        $conn->query("Create table FriendRequest (
            ID varchar(32) NOT NULL ,
            ID_request varchar(32) NOT NULL,
        
            PRIMARY KEY (ID,ID_request),
            FOREIGN KEY (ID) REFERENCES userchatchit(ID),
            FOREIGN KEY (ID_request) REFERENCES userchatchit(ID)
        );");

        $this->insertExDB($conn);

        return $conn;
    }

    function connectDB(){
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        try {
            $con = mysqli_connect(_HOST,_USER_NAME,_PASSWORD,_DATABASE);
        } catch (mysqli_sql_exception $e) {
            return $this->createDB();
        }
        return $con;
    }

    function insertExDB($conn){
        $conn->query(
        "INSERT INTO `userchatchit` (`ID`, `Name`, `PhoneNumber`, `Email`) VALUES
        ('447f56af4cc333b63b8dccc898c8b5db', 'Luc Gia Hung', '0376440935', 'lucgiahung310@gmail.com'),
        ('c752b3c517eed62926c77f0bb6932c38', 'Sumplem', '', '');"
        );

        $conn->query(
        "INSERT INTO `account` (`Username`, `Pass`, `ID`) VALUES
        ('lucgiahung', '123456', '447f56af4cc333b63b8dccc898c8b5db'),
        ('sumplem', '123456', 'c752b3c517eed62926c77f0bb6932c38');"
        );
    }
}

?>