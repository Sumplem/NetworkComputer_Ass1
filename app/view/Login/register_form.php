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
<h2>Signup</h2>
<form action="<?php echo _WEB_ROOT;?>/Login/register" method="POST" id="form" onsubmit="validate();">
    <div>
        <label for="name">Name *:</label>
        <input type="text" id="name" name="name" required>
    </div><br>
    <div>
        <label for="phone">Phone number:</label>
        <input type="tel" id="phone" name="phone">
    </div><br>
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
    </div><br>
    <div>
        <label for="user_name">Username *:</label>
        <input type="text" id="user_name" name="user_name" required>
    </div><br>
    <div>
        <label for="pwd">Password *:</label>
        <input type="password" id="pass" name="password" required>
    </div><br>
    <div>
        <label for="pwd_again">Reenter password *:</label>
        <input type="password" id="pass_again" required>
    </div><br>
    <button type="submit">Signup</button>
</form>
<br>
<a href="<?php echo _WEB_ROOT ?>/Login">You have an account? Login now!</a>
</body>
<script src="<?php echo _WEB_ROOT ?>/app/view/scripts/Register_form.js"></script>
</html>

<?php
if(isset($_SESSION['signupError']) && $_SESSION['signupError']== true) {
    echo '<script language="javascript">';
    echo 'alert("Singup Error! Try another")';
    echo '</script>';
}

$_SESSION['signupError'] = false;
?>