<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>PANICLOGIS</title>
    <link rel="stylesheet" href="stylecss/css.css" type="text/css" />
    <link rel="shortcut icon" href="img/logo.png" type="image/png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body class="loginbody">
    <div id="logincenter">
        <form class="form_box" name="frmLogin" method="post" action="elements/mstaff/staffAct.php?reqact=checklogin">
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
                <label for="loaitk">Quyền</label><br>
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
                        <label for="Quản lý">Quản lý</label>
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
    <script src="js/jscript.js" type="text/javascript"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
</body>

</html>