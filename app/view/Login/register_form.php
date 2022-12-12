<h2>Đăng ký tài khoản mới</h2>
<form action="<?php echo _WEB_ROOT;?>/Login/register" method="POST" id="form">
    <div>
        <label for="name">Họ và tên:</label>
        <input type="text" id="name" name="name" required>
    </div>
    <div>
        <label for="phone">Số điện thoại:</label>
        <input type="tel" id="phone" name="phone" required>
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    </div>
    <div>
        <label for="user_name">Tên đăng nhập</label>
        <input type="text" id="user_name" name="user_name" required>
    </div>
    <div>
        <label for="pwd">Mật khẩu:</label>
        <input type="password" id="pwd" name="password" required>
    </div>
    <div>
        <label for="pwd_again">Nhập lại mật khẩu:</label>
        <input type="password" id="pwd_again" required>
    </div>
    <button type="submit">Đăng ký</button>
</form>
<link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/app/view/styles/Form.css">
<script src="<?php echo _WEB_ROOT ?>/app/view/scripts/Register_form.js"></script>
