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
    <div class="btn_container">
        <button id="btnOpenForm" class="btn">ADD NEW</button>
    </div>
    <div class="creatdon">
        <div class="body_them">
            <section class="them_body">
                <form onsubmit="alert('Thành công')" name="newpacket" id="formadd_packet" method="post" enctype="multipart/form-data" action="./elements/mpacket/packetAct.php?reqact=addnew">
                    <span class="title">Thông tin đơn hàng</span>
                    <div class="fields">
                        <div class="input_group type-md ma">
                            <input type="text" name="mapacket" id="mapacket" required readonly>
                            <label for="mapacket">Mã hàng hóa</label>
                            <span class="border"></span>
                        </div>
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
                            <input type="text" name="tennn" required readonly>
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
                            <input type="text" name="tongtien" id="tongtien" value=0 readonly>
                            <label for="tongtien">Tổng tiền hàng</label>
                            <span class="border"></span>
                        </div>

                    </div>
                    <input type="hidden" name="trangthaipacket" value="Đã tạo đơn" required>
                    <input type="hidden" name="tencuahangtao" value="<?php echo $_SESSION['username']; ?>" required>
                    <div class=" contaniner">
                        <input type="reset" class="btn" id="refresh" value="Refresh">
                        <input type="submit" class="btn" value="Accept">
                    </div>
                </form>
            </section>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js" type="text/javascript"></script>
    <script src="js/jsstore.js" type="text/javascript"></script>
    <!-- js khác thì đc cũ thì ko -->

</body>



<!-- php
    if (isset($_GET['login_message'])) {
    echo "<script>alert('" . $_GET['login_message'] . "');</script>";
}
-->

</html>