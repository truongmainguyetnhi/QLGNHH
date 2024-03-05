<?php
require '../mod/staffCls.php';
$idstaff = $_GET['idstaff'];
$staff = new staff();
$getstaff = $staff->staffGetById($idstaff);
?>
<div class="body_update">
    <div class="body_them">
        <section class="them_header">
            <h1>Cập nhật thông tin</h1>
        </section>
        <section class="them_body">
            <form name="updatestaff" id="update_staff" class="test" onsubmit="alert('Thành công')" method="post"
                enctype="multipart/form-data" action="./elements/mstaff/staffAct.php?reqact=updatestaff">
                <div class="fields">
                    <input type="hidden" name="idstaff" value="<?php echo $idstaff; ?>">
                    <div class="input_group type-md">
                        <input type="text" name="tenstaff" value="<?php echo $getstaff->TEN_NV; ?>" required>
                        <label for="tenstaff">Tên nhân viên</label>
                        <span class="border"></span>
                    </div>
                    <div class="input_group type-md">
                        <input type="text" name="sdtstaff" value="<?php echo $getstaff->SDT_NV; ?>" required>
                        <label for=" sdtstaff">Số điện thoại</label>
                        <span class="border"></span>
                    </div>
                    <div class="input_group type-md">
                        <input type="text" name="emailstaff" value="<?php echo $getstaff->EMAIL; ?>" required>
                        <label for=" emailstaff">Email</label>
                        <span class="border"></span>
                    </div>
                    <div class="input_group type-md">
                        <input type="text" name="cccdstaff" value="<?php echo $getstaff->CCCD; ?>" required>
                        <label for=" cccdstaff">Số căn cước</label>
                        <span class="border"></span>
                    </div>
                    <div class="input_group type-md">
                        <input type="text" name="taikhoandangnhapstaff" value="<?php echo $getstaff->TENTK; ?>"
                            required>
                        <label for=" taikhoandangnhapstaff">Tên đăng nhập</label>
                        <span class="border"></span>
                    </div>
                    <div class="input_group type-md">
                        <input type="text" name="matkhaustaff" value="<?php echo $getstaff->MATKHAU; ?>" required>
                        <label for=" matkhaustaff">Mật khẩu</label>
                        <span class="border"></span>
                    </div>
                    <div class="input_group type-md">
                        <input type="date" name="ngaystaff" required placeholder="Ngày nhập">
                        <label for="ngaystaff" style="top: -0.5rem;">Ngày nhập</label>
                        <span class="border"></span>
                    </div>
                    <input type="hidden" name="loaitaikhoanstaff" value="<?php echo $getstaff->LOAITK; ?>">
                    <div class="contaniner">
                        <input type="submit" class="btn" value="Accept">
                    </div>
                </div>
            </form>
        </section>
    </div>
</div>


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
                        <th class="th_table">Tỉnh/Thành phố</th>
                        <th class="th_table">Phường/Xã</th>
                        <th class="th_table">Đường, số nhà</th>
                        <th class="th_table">Số căn cước</th>
                        <th class="th_table">Trạng thái</th>
                        <th class="th_table">Ngày nhập</th>
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
                        <td class="td_table"><?php echo $n->TINH_TP; ?></td>
                        <td class="td_table"><?php echo $n->PHUONG_XA; ?></td>
                        <td class="td_table"><?php echo $n->DUONG_SONHA; ?></td>
                        <td class="td_table"><strong><?php echo $n->CCCD; ?></strong></td>
                        <td class="td_table">
                            <?php
                                if ($n->TRANGTHAI == "on") {
                                ?>
                            <a href="./elements/mstaff/staffAct.php?reqact=setlock&idstaff=<?php echo $n->ID_NV; ?> 
                                    &trangthaistaff=<?php echo $n->TRANGTHAI; ?>">
                                <ion-icon name="lock-open"></ion-icon>
                            </a>
                            <?php
                                } else {
                                ?>
                            <a href="./elements/mstaff/staffAct.php?reqact=setlock&idstaffp=<?php echo $n->ID_NV; ?>
                                    &trangthaistaffp=<?php echo $n->TRANGTHAI; ?>">
                                <ion-icon name="lock-closed"></ion-icon>
                            </a>
                            <?php
                                }
                                ?>
                        </td>
                        <td class="td_table"><?php echo $n->NGAYNHAP; ?></td>
                        <td class="td_table"><?php echo $n->TENTK; ?></td>
                        <td class="td_table"><?php echo $n->MATKHAU; ?></td>
                        <td class="td_table">
                            <?php
                                if ($n->LOAITK === 'Nhân viên') { ?>
                            <p class="status staff"><?php echo $n->LOAITK; ?></p>
                            <?php
                                } else if (similar_text($n->LOAITK, 'Quản lý')) { ?>
                            <p class="status qly"><?php echo $n->LOAITK; ?></p>
                            <?php
                                }
                                ?>
                        </td>
                        <td class="td_table">
                            <div class="xoa">
                                <a
                                    href="./elements/mstaff/staffAct.php?reqact=deletestaff&idstaff=<?php echo $n->ID_NV; ?>">
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