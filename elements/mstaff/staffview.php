<div>
    <?php if (isset($_SESSION['Quản lý'])) { ?>
    <div class="btn_container">
        <button id="btnOpenForm" class="btn add">
            <ion-icon name="add"></ion-icon>
        </button>
    </div>
    <?php } else { ?>
    <div class="btn_container">
    </div>
    <?php } ?>
    <div class="body_them">
        <section class="them_body">
            <form name="newstaff" id="formadd_staff" method="post" enctype="multipart/form-data"
                action="./elements/mstaff/staffAct.php?reqact=addnew">
                <span class="title">Thông tin nhân viên</span>
                <div class="fields">
                    <div class="input_group type-md">
                        <input type="text" name="tenstaff" required>
                        <label for="tenstaff">Tên nhân viên</label>
                        <span class="border"></span>
                    </div>
                    <div class="input_group type-md">
                        <input type="text" name="sdtstaff" required>
                        <label for="sdtstaff">Số điện thoại</label>
                        <span class="border"></span>
                    </div>
                    <div class="input_group type-md">
                        <input type="text" name="emailstaff" required>
                        <label for="emailstaff">Email</label>
                        <span class="border"></span>
                    </div>
                    <div class="input_group type-md">
                        <input type="text" name="tinhstaff" required>
                        <label for="tinhstaff">Tỉnh/Thành phố</label>
                        <span class="border"></span>
                    </div>
                    <div class="input_group type-md">
                        <input type="text" name="phuongstaff" required>
                        <label for="phuongstaff">Phường/Xã</label>
                        <span class="border"></span>
                    </div>
                    <div class="input_group type-md">
                        <input type="text" name="duongstaff" required>
                        <label for="duongstaff">Số nhà, đường</label>
                        <span class="border"></span>
                    </div>
                    <div class="input_group type-md">
                        <input type="text" name="cccdstaff" required>
                        <label for="cccdstaff">Số căn cước</label>
                        <span class="border"></span>
                    </div>
                    <div class="input_group type-md">
                        <input type="text" name="taikhoandangnhanstaff" required>
                        <label for="taikhoandangnhapstaff">Tên đăng nhập</label>
                        <span class="border"></span>
                    </div>
                    <div class="input_group type-md">
                        <input type="text" name="matkhaustaff" required>
                        <label for="matkhaustaff">Mật khẩu</label>
                        <span class="border"></span>
                    </div>
                    <div class="radio_group">
                        <label for="loaitaikhoanstaff">Loại</label>
                        <div class="input_container">
                            <input type="radio" name="loaitaikhoanstaff" value="Nhân viên" checked>
                            <div class="radio_tile">
                                <ion-icon name="person"></ion-icon>
                                <label for="Nhân viên">staff</label>
                            </div>
                        </div>
                        <div class="input_container">
                            <input type="radio" name="loaitaikhoanstaff" value="Quản lý">
                            <div class="radio_tile">
                                <ion-icon name="sad"></ion-icon>
                                <label for="Quản lý">Quản lý</label>
                            </div>
                        </div>
                    </div>
                    <div class="radio_group">
                        <label for="trangthaistore">Status</label>
                        <div class="input_container">
                            <input type="radio" name="trangthaistaff" value="on" checked>
                            <div class="radio_tile">
                                <ion-icon name="flash-outline"></ion-icon>
                                <label for="on">on</label>
                            </div>
                        </div>
                        <div class="input_container">
                            <input type="radio" name="trangthaistaff" value="off">
                            <div class="radio_tile">
                                <ion-icon name="flash-off-outline"></ion-icon>
                                <label for="off">off</label>
                            </div>
                        </div>
                    </div>
                    <?php
                    // Cấu hình múi giờ cho máy chủ
                    date_default_timezone_set('Asia/Ho_Chi_Minh');

                    // Lấy thời gian hiện tại
                    $currentDateTime = date('Y-m-d\TH:i');
                    ?>
                    <div class="input_group type-md">
                        <input type="datetime-local" name="ngaystaff" required placeholder="Ngày nhập"
                            value="<?php echo $currentDateTime; ?>">
                        <label for="ngaystaff" style="top: -0.5rem;">Ngày nhập</label>
                        <span class="border"></span>
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
    require './elements/mod/staffCls.php';
    ?>

    <div class="table_khu">
        <main class="vung_table">
            <section class="table_header">
                <h1>Danh sách nhân viên</h1>
            </section>
            <section class="table_body">
                <?php
                $obj = new staff();
                $list_staff = $obj->staffGetAll();
                ?>
                <table class="table_view">
                    <thead class="thead_table">
                        <tr align="left" class="tr_table">
                            <th class="th_table">Loại tài khoản</th>
                            <th class="th_table">Tên nhân viên</th>
                            <th class="th_table">Số điện thoại</th>
                            <th class="th_table">Tùy chọn</th>
                            <th class="th_table">Email</th>
                            <th class="th_table">Tỉnh/Thành phố</th>
                            <th class="th_table">Phường/Xã</th>
                            <th class="th_table">Đường, số nhà</th>
                            <th class="th_table">Số căn cước</th>
                            <th class="th_table">Trạng thái</th>
                            <th class="th_table">Ngày nhập</th>
                            <th class="th_table">Tên đăng nhập</th>
                            <th class="th_table">Mật khẩu</th>
                        </tr>
                    </thead>
                    <tbody class="tbody_table">
                        <?php
                        foreach ($list_staff as $n) {
                        ?>
                        <tr class="tr_table">
                            <td class="td_table">
                                <?php
                                    $nhi = $n->LOAITK;
                                    if ('Nhân viên' === $nhi) {
                                    ?>
                                <p class="status staff"><?php echo $n->LOAITK; ?></p>
                                <?php
                                    } elseif ('Quản lý' === $nhi) {
                                    ?>
                                <p class="status qly"><?php echo $n->LOAITK; ?></p>
                                <?php } ?>
                            </td>
                            <td class="td_table"><?php echo $n->TEN_NV; ?></td>
                            <td class="td_table"><?php echo $n->SDT_NV; ?></td>
                            <td class="td_table set">
                                <?php
                                    //tài khoản admin ko được xóa tk admin
                                    if (isset($_SESSION['Quản lý']) and $n->LOAITK == 'Quản lý') {
                                    ?>
                                <div class="koxoa">
                                    <ion-icon name="trash"></ion-icon>
                                </div>
                                <ion-icon class="koup" name="pencil"></ion-icon>
                                <?php
                                    } else if (isset($_SESSION['Quản lý'])) {
                                    ?>
                                <div class="xoa">
                                    <a
                                        href="./elements/mstaff/staffAct.php?reqact=deletestaff&idstaff=<?php echo $n->ID_NV; ?>">
                                        <ion-icon name="trash"></ion-icon>
                                    </a>
                                </div>
                                <tempstaff class="btnup" value="<?php echo $n->ID_NV; ?>">
                                    <ion-icon name="pencil"></ion-icon>
                                </tempstaff>
                                <?php
                                    } else {
                                    ?>
                                <ion-icon name="ban-outline"></ion-icon>
                                <?php } ?>
                            </td>
                            <td class="td_table"><?php echo $n->EMAIL; ?></td>
                            <td class="td_table"><?php echo $n->TINH_TP; ?></td>
                            <td class="td_table"><?php echo $n->PHUONG_XA; ?></td>
                            <td class="td_table"><?php echo $n->DUONG_SONHA; ?></td>
                            <td class="td_table"><strong><?php echo $n->CCCD; ?></strong></td>
                            <td class="td_table">
                                <?php
                                    if ($n->TRANGTHAI == "on") {
                                        if (isset($_SESSION['Quản lý'])) {
                                    ?>
                                <div>
                                    <a href="./elements/mstaff/staffAct.php?reqact=setlock&idstaff=<?php echo $n->ID_NV; ?>
                                    &trangthaistaff=<?php echo $n->TRANGTHAI; ?>">
                                        <ion-icon name="lock-open"></ion-icon>
                                    </a>
                                </div>
                                <?php
                                        } else { ?>
                                <div class="kolock">
                                    <ion-icon name="lock-open"></ion-icon>
                                </div>
                                <?php }
                                    } else if ($n->TRANGTHAI == "off") {
                                        if (isset($_SESSION['Quản lý'])) { ?>
                                <div>
                                    <a href="./elements/mstaff/staffAct.php?reqact=setlock&idstaff=<?php echo $n->ID_NV; ?>
                                    &trangthaistaff=<?php echo $n->TRANGTHAI; ?>">
                                        <ion-icon name="lock-closed"></ion-icon>
                                    </a>
                                </div>
                                <?php } else { ?>
                                <div class="kolock">
                                    <ion-icon name="lock-closed"></ion-icon>
                                </div>
                                <?php }
                                    } ?>
                            </td>
                            <td class="td_table"><?php echo $n->NGAYNHAP; ?></td>
                            <td class="td_table"><?php echo $n->TENTK; ?></td>
                            <td class="td_table"><?php echo $n->MATKHAU; ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
</div>