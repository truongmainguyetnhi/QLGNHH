<div>
    <div class="btn_container">
        <button id="btnOpenForm" class="btn add">
            <ion-icon name="add"></ion-icon>
        </button>
    </div>
    <div class="body_them">
        <section class="them_body">
            <form onsubmit="alert('Thành công')" name="newship" id="formadd_ship" method="post" enctype="multipart/form-data" action="./elements/mshipper/shipperAct.php?reqact=addnew">
                <span class="title">Thông tin shipper</span>
                <div class="fields">
                    <div class="input_group type-md">
                        <input type="text" name="tenship" required>
                        <label for="tenship">Tên shipper</label>
                        <span class="border"></span>
                    </div>
                    <div class="input_group type-md">
                        <input type="text" name="sdtship" required>
                        <label for="sdtship">Số điện thoại</label>
                        <span class="border"></span>
                    </div>
                    <div class="input_group type-md">
                        <input type="text" name="emailship" required>
                        <label for="emailship">Email</label>
                        <span class="border"></span>
                    </div>
                    <div class="input_group type-md">
                        <input type="text" name="tinhship" required>
                        <label for="tinhship">Tỉnh/Thành phố</label>
                        <span class="border"></span>
                    </div>
                    <div class="input_group type-md">
                        <input type="text" name="phuongship" required>
                        <label for="phuongship">Phường/Xã</label>
                        <span class="border"></span>
                    </div>
                    <div class="input_group type-md">
                        <input type="text" name="duongship" required>
                        <label for="duongship">Số nhà, đường</label>
                        <span class="border"></span>
                    </div>
                    <div class="input_group type-md">
                        <input type="text" name="cccdship" required>
                        <label for="cccdship">Số căn cước</label>
                        <span class="border"></span>
                    </div>
                    <div class="input_group type-md">
                        <input type="text" name="taikhoandangnhanship" required>
                        <label for="taikhoandangnhapship">Tên đăng nhập</label>
                        <span class="border"></span>
                    </div>
                    <div class="input_group type-md">
                        <input type="text" name="matkhauship" required>
                        <label for="matkhauship">Mật khẩu</label>
                        <span class="border"></span>
                    </div>
                    <div class="radio_group">
                        <label for="trangthaistore">Status</label><br>
                        <div class="input_container">
                            <input type="radio" name="trangthaiship" value="on" checked>
                            <div class="radio_tile">
                                <ion-icon name="flash-outline"></ion-icon>
                                <label for="on">on</label>
                            </div>
                        </div>
                        <div class="input_container">
                            <input type="radio" name="trangthaiship" value="off">
                            <div class="radio_tile">
                                <ion-icon name="flash-off-outline"></ion-icon>
                                <label for="off">off</label>
                            </div>
                        </div>
                    </div>
                    <div class="radio_group">
                        <label for="loaitaikhoanship">Loại tài khoản</label><br>
                        <div class="input_container loai">
                            <input type="radio" name="loaitaikhoanship" value="Shipper" checked>
                            <div class="radio_tile">
                                <ion-icon name="bicycle"></ion-icon>
                                <label for="Shipper">Shipper</label>
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
    require './elements/mod/shipperCls.php';
    ?>

    <div class="table_khu">
        <main class="vung_table">
            <section class="table_header">
                <h1>Danh sách Shipper</h1>
            </section>
            <section class="table_body">
                <?php
                $obj = new ship();
                $list_ship = $obj->ShipGetAll();
                ?>
                <table class="table_view">
                    <thead class="thead_table">
                        <tr align="left" class="tr_table">
                            <th class="th_table">Tùy chọn</th>
                            <th class="th_table">Tên Shipper</th>
                            <th class="th_table">Số điện thoại</th>
                            <th class="th_table">Email</th>
                            <th class="th_table">Tỉnh/Thành phố</th>
                            <th class="th_table">Phường/Xã</th>
                            <th class="th_table">Đường, số nhà</th>
                            <th class="th_table">Số căn cước</th>
                            <th class="th_table">Trạng thái</th>
                            <th class="th_table">Tên đăng nhập</th>
                            <th class="th_table">Mật khẩu</th>
                            <th class="th_table">Loại tài khoản</th>
                        </tr>
                    </thead>
                    <tbody class="tbody_table">
                        <?php
                        foreach ($list_ship as $n) {
                        ?>
                            <tr class="tr_table">
                                <td class="td_table set">
                                    <tempship class="btnup" value="<?php echo $n->ID_SP; ?>">
                                        <ion-icon name="pencil"></ion-icon>
                                    </tempship>
                                    <div class="xoa">
                                        <a href="./elements/mshipper/shipperAct.php?reqact=deleteship&idship=<?php echo $n->ID_SP; ?>">
                                            <ion-icon name="trash"></ion-icon>
                                        </a>
                                    </div>
                                </td>
                                <td class="td_table"><?php echo $n->TEN_SP; ?></td>
                                <td class="td_table"><?php echo $n->SDT_SP; ?></td>
                                <td class="td_table"><?php echo $n->EMAIL; ?></td>
                                <td class="td_table"><?php echo $n->TINH_TP; ?></td>
                                <td class="td_table"><?php echo $n->PHUONG_XA; ?></td>
                                <td class="td_table"><?php echo $n->DUONG_SONHA; ?></td>
                                <td class="td_table"><strong><?php echo $n->CCCD; ?></strong></td>
                                <td class="td_table tt">
                                    <?php
                                    if ($n->TRANGTHAI == "on") {
                                    ?>
                                        <a href="./elements/mshipper/shipperAct.php?reqact=setlock&idship=<?php echo $n->ID_SP; ?> 
                                    &trangthaiship=<?php echo $n->TRANGTHAI; ?>">
                                            <ion-icon name="lock-open"></ion-icon>
                                        </a>
                                    <?php
                                    } else {
                                    ?>
                                        <a href="./elements/mshipper/shipperAct.php?reqact=setlock&idship=<?php echo $n->ID_SP; ?>
                                    &trangthaiship=<?php echo $n->TRANGTHAI; ?>">
                                            <ion-icon name="lock-closed"></ion-icon>
                                        </a>
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td class="td_table"><?php echo $n->TENTK; ?></td>
                                <td class="td_table"><?php echo $n->MATKHAU; ?></td>
                                <td class="td_table">
                                    <p class="status ship"><?php echo $n->LOAITK; ?></p>
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
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
</div>