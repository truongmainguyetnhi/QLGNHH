<?php
session_start();
?>
<!DOCTYPE html>
<html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>PANICLOGIS</title>
    <link rel="stylesheet" href="stylecss/css.css" type="text/css" />
    <link rel="shortcut icon" href="img/logo.png" type="image/png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body class="loginbody">
    <div id="logincenter">
        <form id="loginForm" class="form_box" name="frmLogin" method="post">
            <h1>Sign in</h1>
            <div class="input_group type-md">
                <input type="text" name="username" id="username" required>
                <label>Tên tài khoản</label>
                <span class="border"></span>
            </div>
            <div class="input_group type-md">
                <input type="password" name="password" id="password" required>
                <label>Mật khẩu</label>
                <span class="border"></span>
            </div>
            <div class="login_radio">
                <label for="loaitk"> Chọn loại tài khoản đăng nhập</label><br>
                <div class="input_container">
                    <input type="radio" name="loaitk" value="Nhân viên" checked required>
                    <div class="radio_tile">
                        <ion-icon name="person"></ion-icon>
                        <label for="Nhân viên">staff</label>
                    </div>
                </div>
                <div class="input_container">
                    <input type="radio" name="loaitk" value="Quản lý">
                    <div class="radio_tile">
                        <ion-icon name="sad"></ion-icon>
                        <label for="Quản lý">manager</label>
                    </div>
                </div>
                <div class="input_container">
                    <input type="radio" name="loaitk" value="Shipper" required>
                    <div class="radio_tile">
                        <ion-icon name="bicycle"></ion-icon>
                        <label for="Shipper">Shipper</label>
                    </div>
                </div>
                <div class="input_container">
                    <input type="radio" name="loaitk" value="Cửa hàng">
                    <div class="radio_tile">
                        <ion-icon name="storefront"></ion-icon>
                        <label for="Cửa hàng">Store</label>
                    </div>
                </div>
            </div>
            <div class="contaniner">
                <input type="reset" class="btn_login" id="refresh" value="Refresh">
                <input type="submit" class="btn_login" value="Accept">
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.js" type="text/javascript"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <!--tách script ko chạy :))) -->
    <script>
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            var radioValue = document.querySelector('input[name="loaitk"]').value;

            if (radioValue === 'Cửa hàng') {
                this.action = 'elements/mstore/storeAct.php?reqact=checklogin';
            } else if (radioValue === 'Nhân viên' || radioValue === 'Quản lý') {
                this.action = 'elements/mstaff/staffAct.php?reqact=checklogin';
            } else if (radioValue === 'Shipper') {
                this.action = 'elements/mshipper/shipperAct.php?reqact=checklogin';
            }
        });
    </script>
</body>

</html>
<?php
if (isset($_GET['login_message'])) {
    echo "<script>alert('" . $_GET['login_message'] . "');</script>";
} ?>