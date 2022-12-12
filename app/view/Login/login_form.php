<h2>Đăng nhập</h2>
<form action="<?php echo _WEB_ROOT;?>/Login/login" method="POST" id="form">
    <div>
        <label for="user_name">Tài khoản:</label><br>
        <input type="text" id="user_name" name="user_name" required>
    </div><br>
    <div>
        <label for="password">Mật khẩu:</label><br>
        <input type="password" id="password" name="password" required>
    </div><br>
    <div>
        <a href="<?php echo _WEB_ROOT;?>/Login/register_form">Bạn chưa có tài khoản? Đăng ký ngay!</a>
    </div>
    <button type="submit"><b>Đăng nhập</b></button>
</form>
<link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/app/view/styles/Form.css">
<script src="<?php echo _WEB_ROOT ?>/app/view/scripts/Login_form.js"></script>