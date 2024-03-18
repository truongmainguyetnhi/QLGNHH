<?php
session_start();
require './elements/mod/packetCls.php';
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
    <?php
    if (!isset($_SESSION['Shipper'])) {
        header('location: login.php');
    }
    ?>
    <div class="contaniner">
        <button class="btn nutdx">
            <ion-icon name="log-out-outline"></ion-icon>
        </button>
    </div>
    <div class="boxship">
        <form method="post">
            <div class="khung">
                <input type="text" class="search" name="noidung" placeholder="Nhập mã đơn hàng...">
                <button type="submit" name="btn">
                    <ion-icon id="check" name="paper-plane"></ion-icon>
                </button>
            </div>
        </form>
    </div>
    <div class="changedh">
        <?php
        if (isset($_POST['btn'])) {
            $noidung = '%' . $_POST['noidung'] . '%';
            if (!empty($_POST['noidung'])) {
                $obj = new packet();
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
            } else {
                echo "<div class='baoinfo'><div class='info'><strong>Vui lòng nhập mã đơn hàng</strong></div></div>";
            }
        }
            ?>
        </div>

    </div>
    <div class="khuvucbang">
        <div class="table_khu">
            <main class="vung_table">
                <section class="table_header">
                    <h1>Danh sách đơn hàng</h1>
                </section>
                <section class="table_body">
                    <?php
                    $obj = new packet();
                    $tentk = $_SESSION['username'];
                    $list_packet = $obj->packetGetforShipper($tentk);
                    ?>
                    <table class="table_view">
                        <thead class="thead_table">
                            <tr align="left" class="tr_table">
                                <th class="th_table">Mã đơn hàng</th>
                                <th class="th_table">Tên hàng hóa</th>
                                <th class="th_table">Tên người nhận</th>
                                <th class="th_table">Số điện thoại</th>
                                <th class="th_table">Tổng tiền</th>
                                <th class="th_table">Trạng thái</th>
                                <th class="th_table">Thời gian tạo</th>
                                <th class="th_table">Ghi chú</th>
                            </tr>
                        </thead>
                        <tbody class="tbody_table">
                            <?php
                            foreach ($list_packet as $n) {
                            ?>
                            <tr class="tr_table">
                                <td class="td_table"><strong><?php echo $n->MA_DH; ?></strong></td>
                                <td class="td_table"><?php echo $n->TEN_HH; ?></td>
                                <td class="td_table"><?php echo $n->TEN_NN; ?></td>
                                <td class="td_table"><?php echo $n->SDT_NN; ?></td>
                                <td class="td_table"><strong><?php echo $n->TONGTIENHANG; ?></strong></td>
                                <td class="td_table">
                                    <?php
                                        $nhi = $n->TRANGTHAI_DH;
                                        if ('Đã tạo đơn' === $nhi) {
                                        ?>
                                    <p class="status DTD"><?php echo $n->TRANGTHAI_DH; ?></p>
                                    <?php
                                        } elseif ('Đang vận chuyển' === $nhi) {
                                        ?>
                                    <p class="status DVC"><?php echo $n->TRANGTHAI_DH; ?></p>
                                    <?php } elseif ('Giao thành công' === $nhi) {
                                        ?>
                                    <p class="status GTC"><?php echo $n->TRANGTHAI_DH; ?></p>
                                    <?php } elseif ('Đã hủy' === $nhi) {
                                        ?>
                                    <p class="status DH"><?php echo $n->TRANGTHAI_DH; ?></p>
                                    <?php } elseif ('Hoàn trả' === $nhi) {
                                        ?>
                                    <p class="status HT"><?php echo $n->TRANGTHAI_DH; ?></p>
                                    <?php } ?>
                                </td>
                                <td class="td_table"><?php echo $n->THOIGIANTAO; ?></td>
                                <td class="td_table"><?php echo $n->GHICHU; ?></td>

                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </section>
            </main>
        </div>
    </div>

</body>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


<script>
document.addEventListener("DOMContentLoaded", function() {
    document.querySelector('.nutdx').addEventListener('click', function() {
        window.location.href = 'login.php';
    });
});
</script>

</html>