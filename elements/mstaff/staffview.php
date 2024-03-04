<div>
    <div class="body_them">
        <section class="them_header">
            <h1>Thêm nhân viên mới</h1>
        </section>
        <section class="them_body">
            <form onsubmit="alert('Thành công')" name="newstaff" id="formadd_staff" method="post" enctype="multipart/form-data" action="./elements/mstaff/staffAct.php?reqact=addnew">
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
                    <div class="phanloai">
                        <label for="loaitaikhoanstaff">Loại tài khoản:</label>
                        <select class="chonphanloai" name="loaitaikhoanstaff">
                            <option value="Cửa hàng">Cửa hàng</option>
                            <option value="Shipper">Shipper</option>
                            <option value="Nhân viên">Nhân viên</option>
                            <option value="Quản lý">Quản lý</option>
                        </select>
                    </div>
                    <div class="radio_group">
                        <div class="input_container">
                            <input type="radio" name="trangthaistaff" value="on">
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
                            <th class="th_table">Tên nhân viên</th>
                            <th class="th_table">Số điện thoại</th>
                            <th class="th_table">Email</th>
                            <th class="th_table">Số căn cước</th>
                            <th class="th_table">Tên đăng nhập</th>
                            <th class="th_table">Mật khẩu</th>
                            <th class="th_table">Loại tài khoản</th>
                            <th class="th_table">Tùy chọn</th>
                        </tr>
                    </thead>
                    <tbody class="tbody_table">
                        <?php
                        foreach ($list_staff as $n) {
                        ?>
                            <tr class="tr_table">
                                <td class="td_table"><?php echo $n->TEN_NV; ?></td>
                                <td class="td_table"><?php echo $n->SDT_NV; ?></td>
                                <td class="td_table"><?php echo $n->EMAIL; ?></td>
                                <td class="td_table"><strong><?php echo $n->CCCD; ?></strong></td>
                                <td class="td_table">
                                    <?php
                                    if ($n->TRANGTHAI == "on") {
                                    ?>
                                        <a href="./elements/mstaff/staffAct.php?reqact=setlock&idstaff=<?php echo $n->ID_NV; ?> 
                                    &trangthaistaff=<?php echo $n->TRANGTHAI; ?>">
                                            <img class="iconimgstw" src="./img/switch-on.png" />
                                        </a>
                                    <?php
                                    } else {
                                    ?>
                                        <a href="./elements/mstaff/staffAct.php?reqact=setlock&idstaff=<?php echo $n->ID_NV; ?>
                                    &trangthaistaff=<?php echo $n->TRANGTHAI; ?>">
                                            <img class="iconimgstw" src="./img/switch-off.png" />
                                        </a>
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td class="td_table"><?php echo $n->TENTK; ?></td>
                                <td class="td_table"><?php echo $n->MATKHAU; ?></td>
                                <td class="td_table">
                                    <p class="status staff"><?php echo $n->LOAITK; ?></p>
                                </td>
                                <td class="td_table">
                                    <div class="xoa">
                                        <a href="./elements/mstaff/staffrAct.php?reqact=deletestaff&idstaff=<?php echo $n->ID_NV; ?>">
                                            <img class="iconimg" src="./img/trash.png">
                                        </a>
                                    </div>
                                    <tempstaff class="btnup" value="<?php echo $n->ID_NV; ?>">
                                        <img class="iconimg" src="./img/edit.png" />
                                    </tempstaff>

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