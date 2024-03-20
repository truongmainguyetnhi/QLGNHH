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
    // Tạo đối tượng kết nối cơ sở dữ liệu từ lớp Database
    require_once 'elements/mod/database.php';
    $db = new Database();
    $conn = $db->connect;

    // Truy vấn để lấy dữ liệu từ các bảng

    $query_shippers = "SELECT COUNT(*) AS total_shippers FROM shipper";
    $result_shippers = $conn->query($query_shippers);
    $row_shippers = $result_shippers->fetch(PDO::FETCH_ASSOC);
    $total_shippers = $row_shippers['total_shippers'];

    $query_stores = "SELECT COUNT(*) AS total_stores FROM cuahang";
    $result_stores = $conn->query($query_stores);
    $row_stores = $result_stores->fetch(PDO::FETCH_ASSOC);
    $total_stores = $row_stores['total_stores'];

    $query_customers = "SELECT COUNT(*) AS total_customers FROM nguoinhan";
    $result_customers = $conn->query($query_customers);
    $row_customers = $result_customers->fetch(PDO::FETCH_ASSOC);
    $total_customers = $row_customers['total_customers'];

    $query_orders = "SELECT COUNT(*) AS total_orders FROM donhang";
    $result_orders = $conn->query($query_orders);
    $row_orders = $result_orders->fetch(PDO::FETCH_ASSOC);
    $total_orders = $row_orders['total_orders'];

    $firstDayOfMonth = date('Y-m-01');
    $today = date('Y-m-d');
    $query_orders = "SELECT COUNT(*) AS total_orders FROM donhang WHERE thoigiantao BETWEEN '$firstDayOfMonth' AND '$today'";
    $result_orders = $conn->query($query_orders);
    $row_orders = $result_orders->fetch(PDO::FETCH_ASSOC);
    $total_orders_t = $row_orders['total_orders'];

    $total_sales_t = $total_orders_t * 30000;
    $total_sales = $total_orders * 30000;
    ?>
    <div id="top">
        <?php require "elements/top.php" ?>
    </div>
    <div id="left">
        <?php require "elements/left.php" ?>
    </div>
    <div id="center">
        <?php require "elements/center.php" ?>
        <div class="footerContainer">
            <section class="dashboard">
                <div class="dash-content">
                    <div class="overview">
                        <div class="title">
                            <i class='bx bxs-dashboard'></i>
                            <span class="text">Bảng điều khiển</span>
                        </div>
                        <div class="thongke">
                            <div class="boxes">
                                <div class="box box1">
                                    <i class='bx bx-money-withdraw'></i>
                                    <span class="text">Doanh số tháng <?php echo date('m'); ?></span>
                                    <span class="number"><?php echo $total_sales_t; ?></span>
                                </div>
                                <div class="box box7">
                                    <i class='bx bx-gift'></i>
                                    <span class="text">Số đơn hàng tháng <?php echo date('m'); ?></span>
                                    <span class="number"><?php echo $total_orders_t; ?></span>
                                </div>
                            </div>
                            <div class="right">
                                <div class="box box6">
                                    <i class='bx bx-money-withdraw'></i>
                                    <span class="text">Tổng doanh số </span>
                                    <span class="number"><?php echo $total_sales; ?></span>
                                </div>
                                <div class="box box5">
                                    <i class='bx bx-gift'></i>
                                    <span class="text">Tổng đơn hàng </span>
                                    <span class="number"><?php echo $total_orders; ?></span>
                                </div>
                                <div class="box box2">
                                    <i class='bx bx-cycling'></i>
                                    <span class="text">Số shipper</span>
                                    <span class="number"><?php echo $total_shippers; ?></span>
                                </div>
                                <div class="box box3">
                                    <i class='bx bx-store'></i>
                                    <span class="text">Số cửa hàng</span>
                                    <span class="number"><?php echo $total_stores; ?></span>
                                </div>
                                <div class="box box4">
                                    <i class='bx bx-user'></i>
                                    <span class="text">Số khách hàng</span>
                                    <span class="number"><?php echo $total_customers; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <div class="socialIcons">
                        <a href="https://github.com/truongmainguyetnhi/QLGNHH"><i class="fa-brands fa-github"></i></a>
                        <a href="https://www.facebook.com/profile.php?id=100008043379225"><i
                                class="fa-brands fa-facebook"></i></a>
                        <a href="https://www.instagram.com/tmnnhi/"><i class="fa-brands fa-instagram"></i></a>
                    </div>
                    <div class="footerNav">
                        <ul>
                            <li><a href="#">Trương Mai Nguyệt Nhi</a></li>
                        </ul>
                    </div>
                </div>
        </div>
    </div>
    </section>
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
                        <a href="index.php">
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
    <script src="js/jscript.js" type="text/javascript"></script>
    <script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>

</body>

</html>