<?php
class Login extends Controller {
    private $data;

    function __construct(){
        $this->data['content'] = 'Login/login_form';
    }

    function index(){
        $response = new Response();
        if(isset($_SESSION['login'])){
            $response->redirect();
            exit;
        }
        $this->data['content'] = 'Login/login_form';
        $this->render('Layout/Main',$this->data);
    }
    
    function register_form(){
        $response = new Response();
        if(isset($_SESSION['login'])){
            $response->redirect();
            exit;
        }
        $this->data['content'] = 'Login/register_form';
        $this->render('Layout/Main',$this->data);
    }

    function register(){
        $response = new Response();
        if(isset($_SESSION['login'])){
            $response->redirect();
            exit;
        }
        $request = new Request();
        $request_data = $request->getData();
        $accountModel = $this->model('AccountModel');
        if($accountModel->validate($request_data)){
            $database = new DataBase();
            $con = $database->connectDB();
            extract($request_data);
            $path = "INSERT INTO thanhvien(name,phone,email,user_name,password,type) VALUES ('$name',$phone,'$email','$user_name','$password','user')";
            mysqli_query($con,$path);
            $response->redirect('Login');
            echo '<script>window.alert("Đăng kí thành công!")</script>';
        }else{
            $response->redirect('Login/register_form');
            echo '<script>window.alert("Có lỗi xảy ra, xin hãy đăng ký lại!")</script>';
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
        $user_name = $req_data['user_name'];
        $password = $req_data['password'];
        $database = new DataBase();
        $con = $database->connectDB();
        $mysql_path = "SELECT id,type FROM thanhvien WHERE user_name='$user_name' and password='$password' LIMIT 1";
        $query = mysqli_query($con,$mysql_path);
        if(mysqli_num_rows($query)==1){
            $login_data = mysqli_fetch_array($query);
            $_SESSION["login"] = true;
            $_SESSION["id"] = $login_data['id'];
            $_SESSION["type"] = $login_data['type'];
            $response->redirect();
        }else{
            $response->redirect('Login');
        }
    }
    function logout(){
        $response = new Response();
        if(!isset($_SESSION['login'])){
            $response->redirect();
            exit;
        }
        unset($_SESSION['login']);
        unset($_SESSION['id']);
        unset($_SESSION['type']);
        $response->redirect();
    }

    function detail(){
        echo 1;
    }
}
?>