<?php
class Login extends Controller {
    private $data;
    private $db;
    private $conn;

    private $accountModel;

    function __construct(){
        $this->db = new DataBase;
        $this->conn = $this->db->connectDB();
        $this->accountModel = $this->model('AccountModel');
    }

    function index(){
        $response = new Response();
        if(isset($_SESSION['login'])){
            $response->redirect();
            exit;
        }
        $this->render('Login/login_form');
    }
    
    function register_form(){
        $response = new Response();
        if(isset($_SESSION['login'])){
            $response->redirect();
            exit;
        }
        $this->render('Login/register_form');
    }

    

    function register(){
        $response = new Response();
        if(isset($_SESSION['login'])){
            $response->redirect();
            exit;
        }
        $request = new Request();
        $request_data = $request->getData();
        if($this->accountModel->validate($request_data)){
            extract($request_data);
            $newID = $this->accountModel->createUserID(); 

            $sql = "INSERT INTO userchatchit(ID,Name,PhoneNumber,Email) VALUES ('$newID','$name','$phone','$email');";
            mysqli_query($this->conn,$sql);

            $sql = "INSERT INTO account(UserName,Pass,ID) VALUES ('$user_name','$password','$newID');";
            mysqli_query($this->conn,$sql);

            $_SESSION['signupError'] = false;

            $response->redirect('Login');
        }else{
            $_SESSION['signupError'] = true;
            $response->redirect('Login/register_form');
        }
    }

    function login(){
        $response = new Response();

        if(isset($_SESSION['login'])){
            $response->redirect();
            exit;
        }

        $request = new Request();
        $req_data = $request->getData();
        $userName = $req_data['user_name'];
        $password = $req_data['password'];

        $ID = $this->accountModel->getID($userName,$password);

        if(!$ID){
            $_SESSION['loginError'] = true;
            $response->redirect('Login');
        }

        $_SESSION["login"]["ID"] = $ID;
        $_SESSION['loginError'] = false;
        $response->redirect();
    }

    function logout(){
        $response = new Response();
        if(!isset($_SESSION['login'])){
            $response->redirect();
            exit;
        }
        unset($_SESSION['login']);
        $response->redirect();
    }
}
?>