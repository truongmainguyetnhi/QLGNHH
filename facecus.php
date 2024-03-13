<?php
// Kết nối đến cơ sở dữ liệu
require_once 'elements/mod/database.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>PANICLOGIS</title>
    <link rel="stylesheet" href="stylecss/css.css" type="text/css" />
    <link rel="shortcut icon" href="img/logo.png" type="image/png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="box">
        <h1>Tra cứu mã đơn hàng</h1>
        <form method="post">
            <div class="khung">
                <input type="text" class="search" name="noidung" placeholder="Nhập mã đơn hàng...">
                <button type="submit" name="btn">
                    <ion-icon id="check" name="paper-plane"></ion-icon>
                </button>
            </div>
        </form>
    </div>
    <?php
    require_once 'elements/mod/database.php';

    if (isset($_POST['btn'])) {
        $noidung = '%' . $_POST['noidung'] . '%';
        if (!empty($_POST['noidung'])) {

            class tradon extends Database
            {
                public function donGetAll($noidung)
                {
                    $getOrders = $this->connect->prepare("SELECT * FROM donhang 
        INNER JOIN phai ON donhang.ID_DH = phai.ID_DH 
        INNER JOIN thanhtoan ON phai.ID_TT = thanhtoan.ID_TT 
        INNER JOIN co ON thanhtoan.ID_TT = co.ID_TT 
        INNER JOIN nguoinhan ON co.ID_NN = nguoinhan.ID_NN 
        INNER JOIN cuahang ON donhang.ID_CH = cuahang.ID_CH
        LEFT JOIN giao ON donhang.ID_DH = giao.ID_DH 
        LEFT JOIN shipper ON giao.ID_SP = shipper.ID_SP 
        WHERE MA_DH LIKE :noidung");
                    $getOrders->bindParam(':noidung', $noidung, PDO::PARAM_STR);
                    $getOrders->setFetchMode(PDO::FETCH_OBJ);
                    $getOrders->execute();
                    return $getOrders->fetchAll();
                }
            }

            $obj = new tradon();
            $list_packet = $obj->donGetAll($noidung);
            if (empty($list_packet)) {
                echo "Đơn hàng bạn tra cứu không tồn tại!!!";
            } else {
                foreach ($list_packet as $n) {
                    echo $n->MA_DH;
                    echo $n->TEN_HH;
                    echo $n->TEN_SP;
                    echo $n->TRANGTHAI;
                    echo $n->TEN_CH;
                    echo $n->TEN_NN;
                    echo $n->SDT_NN;
                    echo $n->TONGTIENHANG;
                }
            }
        } else {
            echo "Vui lòng nhập mã đơn hàng";
        }
    }
    ?>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>