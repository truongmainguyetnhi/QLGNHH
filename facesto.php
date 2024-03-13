<?php
session_start();
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>PANICLOGIS</title>
    <link rel="stylesheet" href="stylecss/css.css" type="text/css" />
    <link rel="shortcut icon" href="img/logo.png" type="image/png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
    <?php
    if (!isset($_SESSION['Quản lý']) and !isset($_SESSION['Nhân viên']) and !isset($_SESSION['Shipper']) and !isset($_SESSION['Cửa hàng'])) {
        header('location: login.php');
    }
    ?>
    <div class="contaniner">
        <button class="btn nutdx">
            <ion-icon name="log-out-outline"></ion-icon>
        </button>
    </div>
    <div class="btn_container khoidau">
        <button id="btnOpenForm" class="btn">Tạo đơn hàng mới</button>
    </div>
    <div class="creatdon">
        <div class="body_them">
            <section class="them_body">
                <form onsubmit="alert('Thành công')" name="newpacket" id="formadd_packet" method="post" enctype="multipart/form-data" action="./elements/mpacket/packetAct.php?reqact=addnew">
                    <span class="title">Thông tin đơn hàng</span>
                    <div class="fields">
                        <div class="input_group type-md">
                            <input type="text" name="tenpacket" required>
                            <label for="tenpacket">Tên hàng hóa</label>
                            <span class="border"></span>
                        </div>
                        <div class="input_group type-md">
                            <input type="text" name="motapacket" required>
                            <label for="motapacket">Mô tả</label>
                            <span class="border"></span>
                        </div>
                        <div class="input_group type-md">
                            <input type="text" name="khoiluongpacket" required>
                            <label for="khoiluongpacket">Khối lượng</label>
                            <span class="border"></span>
                        </div>
                        <?php
                        // Cấu hình múi giờ cho máy chủ
                        date_default_timezone_set('Asia/Ho_Chi_Minh');
                        // Lấy thời gian hiện tại
                        $currentDateTime = date('Y-m-d\TH:i');
                        ?>
                        <div class="input_group type-md">
                            <input type="datetime-local" name="ngaytaopacket" required placeholder="Ngày tạo đơn" value="<?php echo $currentDateTime; ?>">
                            <label for="ngaytaopacket" style="top: -0.5rem;">Ngày tạo đơn</label>
                            <span class="border"></span>
                        </div>
                        <div class="input_group type-md">
                            <input type="text" name="ghichupacket" required>
                            <label for="ghichupacket">Ghi chú</label>
                            <span class="border"></span>
                        </div>
                    </div>
                    <span class="title">Thông tin người nhận</span>
                    <div class="fields">
                        <div class="input_group type-md">
                            <input type="text" name="tennn" required>
                            <label for="tennn">Tên người nhận</label>
                            <span class="border"></span>
                        </div>
                        <div class="input_group type-md">
                            <input type="text" name="sdtnn" required>
                            <label for="sdtnn">Số điện thoại</label>
                            <span class="border"></span>
                        </div>
                        <div class="input_group type-md">
                            <input type="text" name="tinhnn" required>
                            <label for="tinhnn">Tỉnh/Thành phố</label>
                            <span class="border"></span>
                        </div>
                        <div class="input_group type-md">
                            <input type="text" name="phuongnn" required>
                            <label for="phuongnn">Phường/Xã</label>
                            <span class="border"></span>
                        </div>
                        <div class="input_group type-md">
                            <input type="text" name="duongnn" required>
                            <label for="duongnn">Đường, số nhà</label>
                            <span class="border"></span>
                        </div>
                    </div>
                    <span class="title">Thông tin thanh toán</span>
                    <div class="fields">
                        <div class="radio_group taodon">
                            <label for=" loaithanhtoan">Loại</label>
                            <div class="input_container">
                                <input type="radio" name="loaithanhtoan" value="Tiền mặt" checked>
                                <div class="radio_tile">
                                    <ion-icon name="cash-outline"></ion-icon>
                                    <label for="Tiền mặt">Money</label>
                                </div>
                            </div>
                            <div class="input_container">
                                <input type="radio" name="loaithanhtoan" value="Chuyển khoản">
                                <div class="radio_tile">
                                    <ion-icon name="card-outline"></ion-icon>
                                    <label for="Chuyển khoản">online</label>
                                </div>
                            </div>
                        </div>
                        <div class="radio_group taodon" id="phiship">
                            <label for=" loaiphiship">Phí ship</label>
                            <div class="input_container">
                                <input type="radio" name="loaiphiship" value=0 checked>
                                <div class="radio_tile">
                                    <label for="0">0K</label>
                                </div>
                            </div>
                            <div class="input_container">
                                <input type="radio" name="loaiphiship" value=30000>
                                <div class="radio_tile">
                                    <label for="30000">30K</label>
                                </div>
                            </div>
                        </div>
                        <div class="input_group type-md ma">
                            <input type="text" id="phithuho" name="thuho" required>
                            <label for="thuho">Thu hộ</label>
                            <span class="border"></span>
                        </div>
                        <div class="input_group type-md ma" id="csstong">
                            <input type="text" name="tongtien" id="tongtien" readonly>
                            <label for="tongtien">Tổng tiền hàng</label>
                            <span class="border"></span>
                        </div>
                        <div class="input_group type-md ma">
                            <input type="text" name="tencuahangtao" value="<?php echo $_SESSION['username']; ?>" required readonly>
                            <label for="tencuahangtao">Tên cửa hàng</label>
                            <span class="border"></span>
                        </div>
                        <input type="hidden" name="trangthaipacket" value="Đã tạo đơn" required>
                    </div>
                    <div class=" contaniner">
                        <input type="reset" class="btn" id="refresh" value="Refresh">
                        <input type="submit" class="btn" value="Accept">
                    </div>
                </form>
            </section>
        </div>
    </div>
    <div>
        <?php
        require './elements/mod/packetCls.php';
        ?>
        <div class="table_khu">
            <main class="vung_table">
                <section class="table_header">
                    <h1>Danh sách đơn hàng</h1>
                </section>
                <section class="table_body">
                    <?php
                    $obj = new packet();
                    $list_packet = $obj->packetGetAll();
                    ?>
                    <table class="table_view">
                        <thead class="thead_table">
                            <tr align="left" class="tr_table">
                                <th class="th_table">Mã đơn hàng</th>
                                <th class="th_table">Tên hàng hóa</th>
                                <th class="th_table">Tên shipper</th>
                                <th class="th_table">Trạng thái</th>
                                <th class="th_table">Thời gian tạo</th>
                                <th class="th_table">Ghi chú</th>
                                <th class="th_table">Tên người nhận</th>
                                <th class="th_table">Số điện thoại</th>
                                <th class="th_table">Tổng tiền</th>
                            </tr>
                        </thead>
                        <tbody class="tbody_table">
                            <?php
                            foreach ($list_packet as $n) {
                            ?>
                                <tr class="tr_table">
                                    <td class="td_table"><?php echo $n->MA_DH; ?></td>
                                    <td class="td_table"><?php echo $n->TEN_HH; ?></td>
                                    <td class="td_table"><strong><?php echo $n->TEN_SP; ?></strong></td>
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
                                    <td class="td_table"><?php echo $n->TEN_NN; ?></td>
                                    <td class="td_table"><?php echo $n->SDT_NN; ?></td>
                                    <td class="td_table"><?php echo $n->TONGTIENHANG; ?></td>
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
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="js/jsstore.js" type="text/javascript"></script>
</body>



<?php
if (isset($_GET['login_message'])) {
    echo "<script>alert('" . $_GET['login_message'] . "');</script>";
}
?>

</html>