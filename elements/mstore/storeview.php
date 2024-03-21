<div>
    <div class="btn_container">
        <button id="btnOpenForm" class="btn add">
            <ion-icon name="add"></ion-icon>
        </button>
    </div>
    <div class="body_them">
        <section class="them_body">
            <form name="newstore" id="formadd_store" method="post" enctype="multipart/form-data"
                action="./elements/mstore/storeAct.php?reqact=addnew">
                <span class="title">Thông tin cửa hàng</span>
                <div class="fields">
                    <div class="input_group type-md">
                        <input type="text" name="tenstore" required>
                        <label for="tenstore">Tên cửa hàng</label>
                        <span class="border"></span>
                    </div>
                    <div class="input_group type-md">
                        <input type="text" name="sdtstore" required>
                        <label for="sdtstore">Số điện thoại</label>
                        <span class="border"></span>
                    </div>
                    <div class="input_group type-md">
                        <input type="text" name="emailstore" required>
                        <label for="emailstore">Email</label>
                        <span class="border"></span>
                    </div>
                    <div class="input_group type-md">
                        <input type="text" name="tinhstore" required>
                        <label for="tinhstore">Tỉnh/Thành phố</label>
                        <span class="border"></span>
                    </div>
                    <div class="input_group type-md">
                        <input type="text" name="phuongstore" required>
                        <label for="phuongstore">Phường/Xã</label>
                        <span class="border"></span>
                    </div>
                    <div class="input_group type-md">
                        <input type="text" name="duongstore" required>
                        <label for="duongstore">Số nhà, đường</label>
                        <span class="border"></span>
                    </div>
                    <div class="input_group type-md">
                        <input type="text" name="taikhoanstore" required>
                        <label for="taikhoanstore">Số dư tài khoản</label>
                        <span class="border"></span>
                    </div>
                    <div class="input_group type-md">
                        <input type="text" name="taikhoandangnhanstore" required>
                        <label for="taikhoandangnhapstore">Tên đăng nhập</label>
                        <span class="border"></span>
                    </div>
                    <div class="input_group type-md">
                        <input type="text" name="matkhaustore" required>
                        <label for="matkhaustore">Mật khẩu</label>
                        <span class="border"></span>
                    </div>
                    <div class="radio_group">
                        <label for="trangthaistore">Status</label>
                        <div class="input_container">
                            <input type="radio" name="trangthaistore" value="on" checked>
                            <div class="radio_tile">
                                <ion-icon name="flash-outline"></ion-icon>
                                <label for="on">on</label>
                            </div>
                        </div>
                        <div class="input_container">
                            <input type="radio" name="trangthaistore" value="off">
                            <div class="radio_tile">
                                <ion-icon name="flash-off-outline"></ion-icon>
                                <label for="off">off</label>
                            </div>
                        </div>
                    </div>
                    <div class="radio_group loai">
                        <label for="loaitaikhoanstore">Loại tài khoản</label>
                        <div class="input_container">
                            <input type="radio" name="loaitaikhoanstore" value="Cửa hàng" checked>
                            <div class="radio_tile">
                                <ion-icon name="storefront"></ion-icon>
                                <label for="Cửa hàng">store</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="contaniner">
                    <input type="reset" class="btn" id="refresh" value="Refresh">
                    <input type="submit" class="btn" value="Accept">
                </div>
            </form>
        </section>
    </div>
    <?php
    require './elements/mod/storeCls.php';
    ?>

    <div class="table_khu">
        <main class="vung_table">
            <section class="table_header">
                <h1>Danh sách cửa hàng</h1>
            </section>
            <section class="table_body">
                <?php
                $obj = new store();
                $list_store = $obj->StoreGetAll();
                ?>
                <table class="table_view">
                    <thead class="thead_table">
                        <tr align="left" class="tr_table">
                            <th class="th_table">Loại tài khoản</th>
                            <th class="th_table">Tên cửa hàng</th>
                            <th class="th_table">Số điện thoại</th>
                            <th class="th_table">Tùy chọn</th>
                            <th class="th_table">Email</th>
                            <th class="th_table">Tỉnh/Thành phố</th>
                            <th class="th_table">Phường/Xã</th>
                            <th class="th_table">Đường, số nhà</th>
                            <th class="th_table">Số dư tài khoản</th>
                            <th class="th_table">Trạng thái</th>
                            <th class="th_table">Tên đăng nhập</th>
                            <th class="th_table">Mật khẩu</th>
                        </tr>
                    </thead>
                    <tbody class="tbody_table">
                        <?php
                        foreach ($list_store as $n) {
                        ?>
                        <tr class="tr_table">
                            <td class="td_table">
                                <p class="status store"><?php echo $n->LOAITK; ?></p>
                            </td>
                            <td class="td_table"><?php echo $n->TEN_CH; ?></td>
                            <td class="td_table"><?php echo $n->SDT_CH; ?></td>
                            <td class="td_table set">
                                <tempstore class="btnup" value="<?php echo $n->ID_CH; ?>">
                                    <ion-icon name="pencil"></ion-icon>
                                </tempstore>
                            </td>
                            <td class="td_table"><?php echo $n->EMAIL; ?></td>
                            <td class="td_table"><?php echo $n->TINH_TP; ?></td>
                            <td class="td_table"><?php echo $n->PHUONG_XA; ?></td>
                            <td class="td_table"><?php echo $n->DUONG_SONHA; ?></td>
                            <td class="td_table"><strong><?php echo $n->TAIKHOAN . "VND"; ?></strong></td>
                            <td class="td_table tt">
                                <?php
                                    if ($n->TRANGTHAI == "on") {
                                    ?>
                                <a href="./elements/mstore/storeAct.php?reqact=setlock&idstore=<?php echo $n->ID_CH; ?> 
                                    &trangthaistore=<?php echo $n->TRANGTHAI; ?>">
                                    <ion-icon name="lock-open"></ion-icon>

                                </a>
                                <?php
                                    } else {
                                    ?>
                                <a href="./elements/mstore/storeAct.php?reqact=setlock&idstore=<?php echo $n->ID_CH; ?>
                                    &trangthaistore=<?php echo $n->TRANGTHAI; ?>">
                                    <ion-icon name="lock-closed"></ion-icon>
                                </a>
                                <?php
                                    }
                                    ?>
                            </td>
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
    <?php
    if (isset($_GET['tb_message'])) {
        echo "<script>alert('" . $_GET['tb_message'] . "');</script>";
    } ?>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
</div>