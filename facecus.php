<?php
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

    <div class="contaniner">
        <button class="btn nutdn">Đăng nhập</button>
    </div>
    <div class="box">
        <h1>Tra cứu đơn hàng</h1>
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
    ?>
    <div class="baoinfo">
        <div class="info">
            <?php
                    if (empty($list_packet)) {
                        echo "<strong>Đơn hàng bạn tra cứu không tồn tại!!!</strong>";
                    } else { ?>
            <div class='info-container'>
                <?php
                            foreach ($list_packet as $n) {
                                $status = '';
                                switch ($n->TRANGTHAI_DH) {
                                    case 'Đã tạo đơn':
                                        $status = "<span class='status DTD1'>$n->TRANGTHAI_DH</span>";
                                        break;
                                    case 'Đang vận chuyển':
                                        $status = "<span class='status DVC1'>$n->TRANGTHAI_DH</span>";
                                        break;
                                    case 'Giao thành công':
                                        $status = "<span class='status GTC1'>$n->TRANGTHAI_DH</span>";
                                        break;
                                    case 'Đã hủy':
                                        $status = "<span class='status DH1'>$n->TRANGTHAI_DH</span>";
                                        break;
                                    case 'Hoàn trả':
                                        $status = "<span class='status HT1'>$n->TRANGTHAI_DH</span>";
                                        break;
                                    default:
                                        $status = "<span class='status'>$n->TRANGTHAI_DH</span>";
                                }; ?>

                <ul id="mot">
                    <li>Mã đơn hàng: <strong><?php echo " $n->MA_DH"; ?></strong></li>
                    <li>Trạng thái: <strong><?php echo " $status"; ?></strong></li>
                    <li>Địa chỉ hiện tại: <strong><?php echo " "; ?></strong></li>
                    <li>Tên hàng hóa: <strong><?php echo " $n->TEN_HH"; ?></strong></li>
                    <li>Tổng tiền hàng: <strong><?php echo " $n->TONGTIENHANG VND"; ?></strong></li>
                </ul>

                <ul id="hai">
                    <li>Tên shipper: <strong><?php echo " $n->TEN_SP"; ?></strong></li>
                    <li>Tên cửa hàng: <strong><?php echo " $n->TEN_CH"; ?></strong></li>
                    <li>Tên người nhận: <strong><?php echo " $n->TEN_NN"; ?></strong></li>
                    <li>Số điện thoại: <strong><?php echo " $n->SDT_NN"; ?></strong></li>
                </ul>
                <?php
                            }
                        }
                        ?>
            </div>

        </div>
        <?php
            if (!isset($_POST['btn']) || empty($_POST['noidung'])) {
                echo "<div class='baoinfo'><div class='info'><strong>Vui lòng nhập mã đơn hàng</strong></div></div>";
            }
        }
    }
        ?>


</body>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    document.querySelector('.nutdn').addEventListener('click', function() {

        window.location.href = 'login.php';
    });
});
</script>

</html>