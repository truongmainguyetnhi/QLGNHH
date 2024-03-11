<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PANICLOGIS</title>
    <link rel="stylesheet" href="stylecss/css.css" type="text/css" />
    <link rel="shortcut icon" href="img/logo.png" type="image/png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div>
        <div class="btn_container">
            <button id="btnOpenForm" class="btn">ADD NEW</button>
        </div>
        <div class="body_them">
            <section class="them_header">
                <h1>Thêm đơn hàng mới</h1>
            </section>
            <section class="them_body">
                <form onsubmit="alert('Thành công')" name="newpacket" id="formadd_packet" method="post"
                    enctype="multipart/form-data" action="./elements/mpacket/packetAct.php?reqact=addnew">
                    <div class="station">
                        <label for="station">Thông tin đơn hàng</label>
                        <div class="fields">
                            <div class="input_group type-md">
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
                                <input type="datetime-local" name="ngaytaopacket" required placeholder="Ngày tạo đơn"
                                    value="<?php echo $currentDateTime; ?>">
                                <label for="ngaytaopacket" style="top: -0.5rem;">Ngày tạo đơn</label>
                                <span class="border"></span>
                            </div>
                            <div class="input_group type-md">
                                <input type="text" name="ghichupacket" required>
                                <label for="ghichupacket">Ghi chú</label>
                                <span class="border"></span>
                            </div>
                            <div class="input_group type-md">
                                <select name="trangthaipacket" required>
                                    <option value="" disabled selected>Chọn trạng thái</option>
                                    <option value="Đã tạo đơn">Đã tạo đơn</option>
                                    <option value="Đang vận chuyển">Đang vận chuyển</option>
                                    <option value="Giao thành công">Giao thành công</option>
                                    <option value="Đã hủy">Đã hủy</option>
                                    <option value="Hoàn trả">Hoàn trả</option>
                                </select>
                                <span class="border"></span>
                            </div>
                        </div>
                        <div class="station">
                            <label for="station">Thông tin người nhận</label>
                            <div class="input_group type-md">
                                <input type="text" name="tennn" required readonly>
                                <label for="tennn">Tên người nhân</label>
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
                        <div class="station">
                            <label for="station">Thông tin thanh toán</label>
                            <div class="input_group type-md">
                                <input type="text" name="thuho" required>
                                <label for="thuho">Thu hộ</label>
                                <span class="border"></span>
                            </div>
                            <div class="radio_group">
                                <label for="loaiphiship">Phí ship</label>
                                <div class="input_container">
                                    <input type="radio" name="loaiphiship" value=0 checked>
                                    <div class="radio_tile">
                                        <label for="0">0 VND</label>
                                    </div>
                                </div>
                                <div class="input_container">
                                    <input type="radio" name="loaiphiship" value=30000>
                                    <div class="radio_tile">
                                        <label for="30000">30K VND</label>
                                    </div>
                                </div>
                            </div>
                            <div class="input_group type-md">
                                <input type="text" name="tongtien" required>
                                <label for="tongtien">Tổng tiền hàng</label>
                                <span class="border"></span>
                            </div>
                            <div class="radio_group">
                                <label for="loaithanhtoan">Loại thanh toán</label>
                                <div class="input_container">
                                    <input type="radio" name="loaithanhtoan" value="Tiền mặt" checked>
                                    <div class="radio_tile">
                                        <ion-icon name="cash-outline"></ion-icon>
                                        <label for="Tiền mặt">Trực tiếp</label>
                                    </div>
                                </div>
                                <div class="input_container">
                                    <input type="radio" name="loaithanhtoan" value="Chuyển khoản">
                                    <div class="radio_tile">
                                        <ion-icon name="card-outline"></ion-icon>
                                        <label for="Chuyển khoản">Trực tuyến</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="contaniner">
                            <input type="reset" class="btn" id="refresh" value="Refresh">
                            <input type="submit" class="btn" value="Accept">
                        </div>
                    </div>
                </form>
            </section>
        </div>
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
                                <th class="th_table">Tên đơn hàng</th>
                                <th class="th_table">Trạng thái</th>
                                <th class="th_table">Tên Shipper</th>
                                <th class="th_table">Tên cửa hàng</th>
                                <th class="th_table">Thời gian tạo</th>
                                <th class="th_table">Trọng lượng</th>
                                <th class="th_table">Mô tả</th>
                                <th class="th_table">Ghi chú</th>
                            </tr>
                        </thead>
                        <tbody class="tbody_table">
                            <?php
                            foreach ($list_packet as $n) {
                            ?>
                            <tr class="tr_table">
                                <td class="td_table"><?php echo $n->MA_DH; ?></td>
                                <td class="td_table"><?php echo $n->TEN_DH; ?></td>
                                <td class="td_table">
                                    <?php
                                        $nhi = $n->TRANGTHAI;
                                        if ('Đã tạo đơn' === $nhi) {
                                        ?>
                                    <p class="status DTD"><?php echo $n->TRANGTHAI; ?></p>
                                    <?php
                                        } elseif ('Đang vận chuyển' === $nhi) {
                                        ?>
                                    <p class="status DVC"><?php echo $n->TRANGTHAI; ?></p>
                                    <?php } elseif ('Giao thành công' === $nhi) {
                                        ?>
                                    <p class="status GTC"><?php echo $n->TRANGTHAI; ?></p>
                                    <?php } elseif ('Đã hủy' === $nhi) {
                                        ?>
                                    <p class="status DH"><?php echo $n->TRANGTHAI; ?></p>
                                    <?php } elseif ('Hoàn trả' === $nhi) {
                                        ?>
                                    <p class="status HT"><?php echo $n->TRANGTHAI; ?></p>
                                    <?php } ?>
                                </td>
                                <td class="td_table"><strong><?php echo $n->TEN_SP; ?></strong></td>
                                <td class="td_table"><?php echo $n->TEN_CH; ?></td>
                                <td class="td_table"><?php echo $n->THOIGIANTAO; ?></td>
                                <td class="td_table"><?php echo $n->TRONGLUONG; ?></td>
                                <td class="td_table"><?php echo $n->MOTA; ?></td>
                                <td class="td_table"><?php echo $n->GHICHU; ?></td>
                                <td class="td_table set">
                                    <temppacket class="btnup" value="<?php echo $n->ID_DH; ?>">
                                        <ion-icon name="pencil"></ion-icon>
                                    </temppacket>
                                    <div class="xoa">
                                        <a
                                            href="./elements/mpacket/packetaffAct.php?reqact=deletepacket&idpacket=<?php echo $n->ID_DH; ?>">
                                            <ion-icon name="trash"></ion-icon>
                                        </a>
                                    </div>

                                </td>
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
<script src="js/jsstore.js" type="text/javascript"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.js" type="text/javascript"></script>



</html>