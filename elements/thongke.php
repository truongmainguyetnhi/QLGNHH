<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

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
    $total_sales = $total_orders * 30000;

    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $firstDayOfMonth = date('Y-m-01');
    $today = date('Y-m-d');
    $query_orders = "SELECT COUNT(*) AS total_orders FROM donhang WHERE thoigiantao BETWEEN '$firstDayOfMonth' AND '$today'";
    $result_orders = $conn->query($query_orders);
    $row_orders = $result_orders->fetch(PDO::FETCH_ASSOC);
    $total_orders_t = $row_orders['total_orders'];
    $total_sales_t = $total_orders_t * 30000;

    $query = "SELECT trangthai_dh, COUNT(*) AS count FROM donhang GROUP BY trangthai_dh";
    $result = $conn->query($query);
    $sodon = array();
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $sodon[$row['trangthai_dh']] = $row['count'];
    }

    $query = "SELECT ten_ch, COUNT(*) AS don FROM donhang INNER JOIN cuahang 
    WHERE donhang.ID_CH = cuahang.ID_CH GROUP BY ten_ch";
    $result = $conn->query($query);
    $doncuach = array();
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $doncuach[$row['ten_ch']] = $row['don'];
    }

    ?>
    <div class="footerContainer">
        <section class="dashboard">
            <div class="dash-content">
                <div class="overview">
                    <div class="title">
                        <i class='bx bxs-dashboard'></i>
                        <span class="text">Bảng thống kê</span>
                    </div>
                    <div class="thongke">
                        <!-- TK tháng  -->
                        <div class="graphBox">
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
                            <!-- biểu đồ  -->
                            <div class="bieudo">
                                <div class="box9">
                                    <canvas id="donhangcuacuahang"></canvas>
                                </div>
                                <div class="box8">
                                    <canvas id="trangthai"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- TK tổng  -->
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


            <!-- info-->
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
        </section>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>
<script>
var ctx = document.getElementById('trangthai').getContext('2d');
var sodon = <?php echo json_encode($sodon); ?>;
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Đã tạo đơn', 'Đang vận chuyển', 'Giao thành công', 'Đã hủy', 'Hoàn trả'],
        datasets: [{
            label: 'Số lượng đơn theo trạng thái',
            data: [
                sodon['Đã tạo đơn'] ?? 0,
                sodon['Đang vận chuyển'] ?? 0,
                sodon['Giao thành công'] ?? 0,
                sodon['Đã hủy'] ?? 0,
                sodon['Hoàn trả'] ?? 0
            ],
            backgroundColor: [
                '#f7e1bc',
                '#a7d0d6',
                '#36436f',
                '#b6000f',
                '#24282b'
            ],

            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                responsive: true,
            }
        }
    }
});
var he = document.getElementById('donhangcuacuahang').getContext('2d');
var sodoncuach = <?php echo json_encode($doncuach); ?>;
var tenCuaHang = Object.keys(sodoncuach);
var soDon = Object.values(sodoncuach);

var numStores = tenCuaHang.length;
var backgroundColor = [
    '#5d7599',
    '#abb6cb',
    '#9fcaa3',
    '#e78764',
    '#e1d839'
];

// Lặp lại các màu nếu có nhiều cửa hàng hơn số lượng màu
for (var i = 0; i < numStores; i++) {
    backgroundColor.push(backgroundColor[i % backgroundColor.length]);
}
var myChart = new Chart(he, {
    type: 'polarArea',
    data: {
        labels: tenCuaHang, // Cập nhật labels với tên cửa hàng
        datasets: [{
            label: 'Số lượng đơn theo cửa hàng',
            data: soDon, // Cập nhật data với số đơn
            backgroundColor: backgroundColor,
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                responsive: true,
            }
        }
    }
});
</script>

</html>