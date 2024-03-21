<?php
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
                        <div class="box box2">
                            <i class='bx bx-gift'></i>
                            <span class="text">Số đơn hàng tháng <?php echo date('m'); ?></span>
                            <span class="number"><?php echo $total_orders_t; ?></span>
                        </div>
                    </div>
                    <div class="right">
                        <div class="box box3">
                            <i class='bx bx-money-withdraw'></i>
                            <span class="text">Tổng doanh số </span>
                            <span class="number"><?php echo $total_sales; ?></span>
                        </div>
                        <div class="box box4">
                            <i class='bx bx-gift'></i>
                            <span class="text">Tổng đơn hàng </span>
                            <span class="number"><?php echo $total_orders; ?></span>
                        </div>
                        <div class="box box5">
                            <i class='bx bx-store'></i>
                            <span class="text">Số cửa hàng</span>
                            <span class="number"><?php echo $total_stores; ?></span>
                        </div>
                        <div class="box box6">
                            <i class='bx bx-cycling'></i>
                            <span class="text">Số shipper</span>
                            <span class="number"><?php echo $total_shippers; ?></span>
                        </div>
                        <div class="box box7">
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
                <a href="https://www.facebook.com/profile.php?id=100008043379225"><i class="fa-brands fa-facebook"></i></a>
                <a href="https://www.instagram.com/tmnnhi/"><i class="fa-brands fa-instagram"></i></a>
            </div>
            <div class="footerNav">
                <ul>
                    <li><a href="#">Trương Mai Nguyệt Nhi</a></li>
                </ul>
            </div>
        </div>
    </section>
</div>