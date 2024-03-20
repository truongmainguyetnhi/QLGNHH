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
            $tenship = $_SESSION['username'];
            if (!empty($_POST['noidung'])) {
                $obj = new packet();
                $list_packet = $obj->donGetAllforShipper($noidung, $tenship);
                if (empty($list_packet)) {
                    echo "<div class='baoinfo'><div class='info1'><strong>Đơn hàng bạn tra cứu không tồn tại!!!</strong></div></div>";
                } else {
                    foreach ($list_packet as $n) {
                        if (!in_array($n->TRANGTHAI_DH, ['Giao thành công', 'Đã hủy', 'Hoàn trả'])) {
        ?>
        <div class="body_update">
            <div class="giao">
                <section class="them_body">
                    <form name="updatepacket_dc" id="update_packet_dc" class="test" onsubmit="alert('Thành công')"
                        method="post" enctype="multipart/form-data"
                        action="./elements/mpacket/packetAct.php?reqact=updatepacket_diachi">
                        <?php
                                            foreach ($list_packet as $n) {
                                            ?>
                        <span class="title">Cập nhật địa chỉ giao hàng:
                            <?php echo $n->MA_DH; ?></span>
                        <div class="fields">
                            <input type="hidden" name="idpacket" value="<?php echo $n->ID_DH; ?>">
                            <input type="hidden" name="tench" value="<?php echo $n->TEN_CH; ?>">
                            <div class="input_group type-md">
                                <select name="ttdh">
                                    <option value="Đã tạo đơn"
                                        <?php echo ($n->TRANGTHAI_DH == 'Đã tạo đơn') ? 'selected' : ''; ?>>Đã tạo đơn
                                    </option>
                                    <option value="Đang vận chuyển"
                                        <?php echo ($n->TRANGTHAI_DH == 'Đang vận chuyển') ? 'selected' : ''; ?>>
                                        Đang vận chuyển</option>
                                    <option value="Giao thành công"
                                        <?php echo ($n->TRANGTHAI_DH == 'Giao thành công') ? 'selected' : ''; ?>>
                                        Giao thành công</option>
                                    <option value="Đã hủy"
                                        <?php echo ($n->TRANGTHAI_DH == 'Đã hủy') ? 'selected' : ''; ?>>Đã hủy
                                    </option>
                                    <option value="Hoàn trả"
                                        <?php echo ($n->TRANGTHAI_DH == 'Hoàn trả') ? 'selected' : ''; ?>>Hoàn trả
                                    </option>
                                </select>
                            </div>
                            <div class="input_group type-md">
                                <input type="text" name="tenkho" required>
                                <label for="tenkho">Tên kho hiện tại...</label>
                                <span class="border"></span>
                            </div>
                            <div class="input_group type-md">
                                <input type="text" name="ghichu" value="<?php echo htmlspecialchars($n->GHICHU); ?>"
                                    required>
                                <label for="ghichu">Ghi chú</label>
                                <span class="border"></span>
                            </div>
                        </div>
                        <span class="title">Thông tin đơn hàng</span>
                        <div class="fields">
                            <div class="input_group type-md read">
                                <input type="text" name="tenhang" value="<?php echo $n->TEN_HH; ?>" required readonly>
                                <label for=" tenhang">Tên hàng hóa</label>
                                <span class="border"></span>
                            </div>
                            <div class="input_group type-md read">
                                <input type="text" name="tenngn" value="<?php echo $n->TEN_NN; ?>" required readonly>
                                <label for=" tenngn">Tên người nhận</label>
                                <span class="border"></span>
                            </div>
                            <div class="input_group type-md read">
                                <input type="text" name="sdt" value="<?php echo $n->SDT_NN; ?>" required readonly>
                                <label for="sdt">Số điện thoại</label>
                                <span class="border"></span>
                            </div>
                            <div class="input_group type-md read">
                                <input type="text" name="tongtien" value="<?php echo $n->TONGTIENHANG; ?>" required
                                    readonly>
                                <label for=" tongtien">Tổng tiền hàng</label>
                                <span class="border"></span>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="contaniner">
                            <input type="submit" class="btn" value="Accept">
                        </div>
                    </form>
                </section>
            </div>
        </div>
        <?php
                        } else {
                        ?>
        <div class='baoinfo'>
            <div class='info1'>
                <strong>Đơn hàng đang ở trạng thái "<?php echo $n->TRANGTHAI_DH; ?>", không thể chỉnh sửa!</strong>
            </div>
        </div>
        <?php
                        }
                    } ?>
    </div>
    <?php
                }
            } else {
                echo "<div class='baoinfo'><div class='info1'><strong>Vui lòng nhập mã đơn hàng</strong></div></div>";
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
                                <th class="th_table">Kho hiện tại</th>
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
                                <td class="td_table"><?php echo $n->TEN_KHO ?? 'Chưa có'; ?></td>
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