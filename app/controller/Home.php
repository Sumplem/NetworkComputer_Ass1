<?php
class Home extends Controller{
    private $home;
    private $data;

    private $db;
    private $conn;

    private $accountModel;
    private $ID;

    function __construct(){
        if(!isset($_SESSION['login'])){
            $redir = new Response;
            $redir->redirect('Login');
            exit;
        }
        $this->home = $this->model('HomeModel');
        $this->data['content'] = 'Home/index';
        $this->db = new DataBase;
        $this->conn = $this->db->connectDB();
        $this->accountModel = $this->model('AccountModel');
        $this->ID = $_SESSION['login']['ID'];
    }

    function index(){
        $this->data['User'] = $this->accountModel->getInfo($this->ID);
        $this->render('Home/index',$this->data);
    }
    
    function displayInfo() {
        $req = new Request;
        $id = $req->getData()['id'];

        $data = $this->accountModel->getInfo($id);

        if($data == null){
            return;
        }

        echo '<div class="avatar"></div>
        <div class="name">'.$data['Name'].'</div>';
        if($data['PhoneNumber'] != null) {
            echo '<div class="infoList">
            <div>Phone number: '.$data['PhoneNumber'].'</div>';
            if($data['Email'] != null) {
                echo '<div>Email: 0123123</div>';
            }
            echo '</div>';
        }

        if($this->accountModel->isFriend($this->ID,$id)) {
            return;
        }else if ($this->accountModel->isSendRequest($this->ID, $id)) {
            echo '<div id="buttonHolder">
            You have send friend request
            </div>';
        }else if($this->accountModel->isSendRequest($id,$this->ID)) {
            echo '<div id="buttonHolder">
            <button id="addFriendButton" class="modButton" value='.$data['ID'].' onclick="addFriend(this)">Accept</button>
            </div>';
        }else {
            echo '<div id="buttonHolder">
            <button id="addFriendButton" class="modButton" value='.$data['ID'].' onclick="addFriend(this)">Add friend</button>
            </div>';
        }
    }

    function searchContact(){
        $req = new Request;

        $data = $this->accountModel->findContacts($this->ID,$req->getData()['searchContact']);
        if($data){
            while($row = mysqli_fetch_array($data)){
                echo '<div class="friend" value='.$row['ID'].' onclick="displayInfo(this)">
                <div class="avatar"></div>
                <div class="name">'.$row['Name'].'</div>
                </div>';
            }
        }
    }

    function friendList() {
        $req = new Request;

        $data = $this->accountModel->getFriends($this->ID,$req->getData()['friend']);
        if($data){
            while($row = mysqli_fetch_array($data)){
                echo '<div class="friend" value='.$row['ID'].' onclick="displayInfo(this);
                connectPeer(this); displayCurrentChat(this);
                loadMessage(\''.$row['ID'].'\'); removeNotify(this);">
                <div class="avatar"></div>
                <div class="name">'.$row['Name'].'</div>
                </div>';
            }
        }
    }

    function addFriend() {
        $req = new Request;
        $id = $req->getData()['id'];

        if($this->accountModel->isSendRequest($id,$this->ID)) {
            $this->accountModel->addFriend($this->ID,$id);
        }else{
            $this->accountModel->sendFriendRequest($this->ID,$id);
        }
    }

    function displayFriendRequest() {
        $req = new Request;
        $id = $req->getData()['id'];

        $data = $this->accountModel->getFriendRequest($id);

        if($data){
            while($row = mysqli_fetch_array($data)){
                echo '<div class="friend" value='.$row['ID'].' onclick="displayInfo(this)">
                <div class="avatar"></div>
                <div class="name">'.$row['Name'].'</div>
                </div>';
            }
        }
    }

    function getName() {
        $req = new Request;
        $id = $req->getData()['id'];

        echo $this->accountModel->getName($id);
    }

    function setP2pID() {
        $req = new Request;
        $p2pID = $req->getData()['id'];

        $this->accountModel->setP2pID($this->ID,$p2pID);
    }

    function getP2pID() {
        $req = new Request;
        $p2pID = $req->getData()['id'];

        $data = $this->accountModel->getP2pID($p2pID);
        echo $data['PeerID'];
    }
}
?>