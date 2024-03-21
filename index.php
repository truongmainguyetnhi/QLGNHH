<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>PANICLOGIS</title>
    <link rel="stylesheet" href="stylecss/css.css" type="text/css" />
    <link rel="shortcut icon" href="img/logo.png" type="image/png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php

    if (!isset($_SESSION['Quản lý']) and !isset($_SESSION['Nhân viên']) and !isset($_SESSION['Shipper']) and !isset($_SESSION['Cửa hàng'])) {
        header('location: facecus.php');
    }
    if (isset($_GET['login_message'])) {
        echo "<script>alert('" . $_GET['login_message'] . "');</script>";
    }
    ?>
    <div id="top">
        <?php require "elements/top.php" ?>
    </div>
    <div id="left">
        <?php require "elements/left.php" ?>
    </div>
    <div id="center">
        <?php require "elements/center.php" ?>
    </div>
    </div>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="img/logo.png" alt="logo">
                </span>
                <div class="text header-text">
                    <span class="name">PanicLogis</span>
                    <span class="profession">TMNN</span>
                </div>
            </div>
            <i class='bx bx-chevron-right toggle'></i>
        </header>
        <div class="menu-bar">
            <div class="menu">
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="index.php?req=thongke">
                            <i class='bx bx-home-smile icon'></i>
                            <span class="text nav-text">Home</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="index.php?req=packetview">
                            <i class='bx bx-package icon'></i>
                            <span class="text nav-text">Đơn hàng</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="index.php?req=storeview">
                            <i class='bx bx-store icon'></i>
                            <span class="text nav-text">Cửa hàng</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="index.php?req=shipperview">
                            <i class='bx bx-cycling icon'></i>
                            <span class="text nav-text">Shipper</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="index.php?req=staffview">
                            <i class='bx bxs-user icon'></i>
                            <span class="text nav-text">Nhân viên</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="index.php?req=khoview">
                            <i class='bx bx-building-house icon'></i>
                            <span class="text nav-text">Kho hàng</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="bottom-content">
                <li class="logout">
                    <a href="elements/mstaff/staffAct.php?reqact=logout">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>
                <li class="mode">
                    <div class="moon-sun">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark</span>
                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
            </div>
        </div>
    </nav>


    <script src="https://code.jquery.com/jquery-3.6.4.js" type="text/javascript"></script>
    <script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script src="js/jscript.js" type="text/javascript"></script>
</body>

</html>