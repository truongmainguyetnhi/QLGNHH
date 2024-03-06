<?php
require '../mod/storeCls.php';
$idstore = $_GET['idstore'];
$store = new store();
$getstore = $store->StoreGetById($idstore);
?>

<div class="body_update">
    <div class="body_them_up">
        <section class="them_header">
            <h1>Cập nhật thông tin</h1>
        </section>
        <section class="them_body">
            <form name="updatestore" id="update_store" class="test" onsubmit="alert('Thành công')" method="post" enctype="multipart/form-data" action="./elements/mstore/storeAct.php?reqact=updatestore">
                <div class="fields">
                    <input type="hidden" name="idstore" value="<?php echo $idstore; ?>">
                    <div class="input_group type-md">
                        <input type="text" name="tenstore" value="<?php echo $getstore->TEN_CH; ?>" required>
                        <label for="tenstore">Tên cửa hàng</label>
                        <span class="border"></span>
                    </div>
                    <div class="input_group type-md">
                        <input type="text" name="sdtstore" value="<?php echo $getstore->SDT_CH; ?>" required>
                        <label for=" sdtstore">Số điện thoại</label>
                        <span class="border"></span>
                    </div>
                    <div class="input_group type-md">
                        <input type="text" name="emailstore" value="<?php echo $getstore->EMAIL; ?>" required>
                        <label for=" emailstore">Email</label>
                        <span class="border"></span>
                    </div>
                    <div class="input_group type-md">
                        <input type="text" name="tinhstore" value="<?php echo $getstore->TINH_TP; ?>" required>
                        <label for="tinhstore">Tỉnh/Thành phố</label>
                        <span class="border"></span>
                    </div>
                    <div class="input_group type-md">
                        <input type="text" name="phuongstore" value="<?php echo $getstore->PHUONG_XA; ?>" required>
                        <label for=" phuongstore">Phường/Xã</label>
                        <span class="border"></span>
                    </div>
                    <div class="input_group type-md">
                        <input type="text" name="duongstore" value="<?php echo $getstore->DUONG_SONHA; ?>" required>
                        <label for=" duongstore">Đường, số nhà</label>
                        <span class="border"></span>
                    </div>
                    <div class="input_group type-md">
                        <input type="text" name="taikhoanstore" value="<?php echo $getstore->TAIKHOAN; ?>" required>
                        <label for=" taikhoanstore">Số dư tài khoản</label>
                        <span class="border"></span>
                    </div>
                    <div class="input_group type-md">
                        <input type="text" name="taikhoandangnhapstore" value="<?php echo $getstore->TENTK; ?>" required>
                        <label for=" taikhoandangnhapstore">Tên đăng nhập</label>
                        <span class="border"></span>
                    </div>
                    <div class="input_group type-md">
                        <input type="text" name="matkhaustore" value="<?php echo $getstore->MATKHAU; ?>" required>
                        <label for=" matkhaustore">Mật khẩu</label>
                        <span class="border"></span>
                    </div>
                    <input type="hidden" name="loaitaikhoanstore" value="<?php echo $getstore->LOAITK; ?>">
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
                        <th class="th_table">Tên cửa hàng</th>
                        <th class="th_table">Số điện thoại</th>
                        <th class="th_table">Email</th>
                        <th class="th_table">Tỉnh/Thành phố</th>
                        <th class="th_table">Phường/Xã</th>
                        <th class="th_table">Đường, số nhà</th>
                        <th class="th_table">Số dư tài khoản</th>
                        <th class="th_table">Trạng thái</th>
                        <th class="th_table">Tên đăng nhập</th>
                        <th class="th_table">Mật khẩu</th>
                        <th class="th_table">Loại tài khoản</th>
                        <th class="th_table">Tùy chọn</th>
                    </tr>
                </thead>
                <tbody class="tbody_table">
                    <?php
                    foreach ($list_store as $n) {
                    ?>
                        <tr class="tr_table">
                            <td class="td_table"><?php echo $n->TEN_CH; ?></td>
                            <td class="td_table"><?php echo $n->SDT_CH; ?></td>
                            <td class="td_table"><?php echo $n->EMAIL; ?></td>
                            <td class="td_table"><?php echo $n->TINH_TP; ?></td>
                            <td class="td_table"><?php echo $n->PHUONG_XA; ?></td>
                            <td class="td_table"><?php echo $n->DUONG_SONHA; ?></td>
                            <td class="td_table"><strong><?php echo $n->TAIKHOAN . "VND"; ?></strong></td>
                            <td class="td_table">
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
                            <td class="td_table">
                                <p class="status store"><?php echo $n->LOAITK; ?></p>
                            </td>
                            <td class="td_table">
                                <div class="xoa" align="center">
                                    <a href="./elements/mstore/storeAct.php?reqact=deletestore&idstore=<?php echo $n->ID_CH; ?>">
                                        <ion-icon name="trash"></ion-icon>
                                    </a>
                                </div>
                                <!-- <tempstore class="btnup" value="<?php echo $n->ID_CH; ?>">
                                    <img class="iconimg" src="./img/edit.png" />
                                </tempstore> -->


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