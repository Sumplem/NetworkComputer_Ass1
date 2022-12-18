<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat chit</title>
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/app/view/styles/Form.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/app/view/styles/Login.css">
</head>
<body>
<h1>Login</h1>
<form action="<?php echo _WEB_ROOT;?>/Login/login" method="POST" id="form">
    <div>
        <label for="user_name">Username:</label><br>
        <input type="text" id="user_name" name="user_name" required>
    </div><br>
    <div>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required>
    </div><br>
    <button type="submit"><b>Login</b></button>
</form>
<br>
<a href="<?php echo _WEB_ROOT;?>/Login/register_form">You don't have an account? Register now!</a>
</body>
<script src="<?php echo _WEB_ROOT ?>/app/view/scripts/Login_form.js"></script>
</html>

<?php
if(isset($_SESSION['loginError']) && $_SESSION['loginError']== true) {
    echo '<script language="javascript">';
    echo 'alert("Login Error! Try another")';
    echo '</script>';
}

$_SESSION['loginError'] = false;
?>