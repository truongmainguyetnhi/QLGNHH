<div>
    <div class="body_them">
        <section class="them_header">
            <h1>Thêm Shipper mới</h1>
        </section>
        <section class="them_body">
            <form onsubmit="alert('Thành công')" name="newship" id="formadd_ship" method="post"
                enctype="multipart/form-data" action="./elements/mshipper/shipperAct.php?reqact=addnew">
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
                    <div class="phanloai">
                        <label for="loaitaikhoanship">Loại tài khoản:</label>
                        <select class="chonphanloai" name="loaitaikhoanship">
                            <option value="Cửa hàng">Cửa hàng</option>
                            <option value="Shipper">Shipper</option>
                            <option value="Nhân viên">Nhân viên</option>
                            <option value="Quản lý">Quản lý</option>
                        </select>
                    </div>
                    <div class="radio_group">
                        <div class="input_container">
                            <input type="radio" name="trangthaiship" value="on">
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
                    <div class="contaniner">
                        <input type="reset" class="btn" id="refresh" value="Refresh">
                        <input type="submit" class="btn" value="Accept">
                    </div>
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
                            <th class="th_table">Tên Shipper</th>
                            <th class="th_table">Số điện thoại</th>
                            <th class="th_table">Email</th>
                            <th class="th_table">Số căn cước</th>
                            <th class="th_table">Trạng thái</th>
                            <th class="th_table">Tên đăng nhập</th>
                            <th class="th_table">Mật khẩu</th>
                            <th class="th_table">Loại tài khoản</th>
                            <th class="th_table">Tùy chọn</th>
                        </tr>
                    </thead>
                    <tbody class="tbody_table">
                        <?php
                        foreach ($list_ship as $n) {
                        ?>
                        <tr class="tr_table">
                            <td class="td_table"><?php echo $n->TEN_SP; ?></td>
                            <td class="td_table"><?php echo $n->SDT_SP; ?></td>
                            <td class="td_table"><?php echo $n->EMAIL; ?></td>
                            <td class="td_table"><strong><?php echo $n->CCCD; ?></strong></td>
                            <td class="td_table">
                                <?php
                                    if ($n->TRANGTHAI == "on") {
                                    ?>
                                <a href="./elements/mshipper/shipperAct.php?reqact=setlock&idship=<?php echo $n->ID_SP; ?> 
                                    &trangthaiship=<?php echo $n->TRANGTHAI; ?>">
                                    <img class="iconimgstw" src="./img/switch-on.png" />
                                </a>
                                <?php
                                    } else {
                                    ?>
                                <a href="./elements/mshipper/shipperAct.php?reqact=setlock&idship=<?php echo $n->ID_SP; ?>
                                    &trangthaiship=<?php echo $n->TRANGTHAI; ?>">
                                    <img class="iconimgstw" src="./img/switch-off.png" />
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
                            <td class="td_table">
                                <div class="xoa">
                                    <a
                                        href="./elements/mshipper/shipperAct.php?reqact=deleteship&idship=<?php echo $n->ID_SP; ?>">
                                        <img class="iconimg" src="./img/trash.png">
                                    </a>
                                </div>
                                <tempship class="btnup" value="<?php echo $n->ID_SP; ?>">
                                    <img class="iconimg" src="./img/edit.png" />
                                </tempship>

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