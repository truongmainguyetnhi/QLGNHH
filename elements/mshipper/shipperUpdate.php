<?php
require '../mod/shipperCls.php';
$idship = $_GET['idship'];
$ship = new ship();
$getship = $ship->ShipGetById($idship);
?>
<div class="body_update">
    <div class="body_them_up">
        <section class="them_body">
            <form name="updateship" id="update_ship" class="test" onsubmit="alert('Thành công')" method="post" enctype="multipart/form-data" action="./elements/mshipper/shipperAct.php?reqact=updateship">
                <span class="title">Cập nhật thông tin shipper</span>
                <div class="fields">
                    <input type="hidden" name="idship" value="<?php echo $idship; ?>">
                    <div class="input_group type-md">
                        <input type="text" name="tenship" value="<?php echo $getship->TEN_SP; ?>" required>
                        <label for="tenship">Tên Shipper</label>
                        <span class="border"></span>
                    </div>
                    <div class="input_group type-md">
                        <input type="text" name="sdtship" value="<?php echo $getship->SDT_SP; ?>" required>
                        <label for=" sdtship">Số điện thoại</label>
                        <span class="border"></span>
                    </div>
                    <div class="input_group type-md">
                        <input type="text" name="emailship" value="<?php echo $getship->EMAIL; ?>" required>
                        <label for=" emailship">Email</label>
                        <span class="border"></span>
                    </div>
                    <div class="input_group type-md">
                        <input type="text" name="tinhship" value="<?php echo $getship->TINH_TP; ?>" required>
                        <label for="tinhship">Tỉnh/Thành phố</label>
                        <span class="border"></span>
                    </div>
                    <div class="input_group type-md">
                        <input type="text" name="phuongship" value="<?php echo $getship->PHUONG_XA; ?>" required>
                        <label for=" phuongship">Phường/Xã</label>
                        <span class="border"></span>
                    </div>
                    <div class="input_group type-md">
                        <input type="text" name="duongship" value="<?php echo $getship->DUONG_SONHA; ?>" required>
                        <label for=" duongship">Đường, số nhà</label>
                        <span class="border"></span>
                    </div>
                    <div class="input_group type-md">
                        <input type="text" name="cccdship" value="<?php echo $getship->CCCD; ?>" required>
                        <label for=" cccdship">Số căn cước</label>
                        <span class="border"></span>
                    </div>
                    <div class="input_group type-md">
                        <input type="text" name="taikhoandangnhapship" value="<?php echo $getship->TENTK; ?>" required>
                        <label for=" taikhoandangnhapship">Tên đăng nhập</label>
                        <span class="border"></span>
                    </div>
                    <div class="input_group type-md">
                        <input type="text" name="matkhauship" value="<?php echo $getship->MATKHAU; ?>" required>
                        <label for=" matkhauship">Mật khẩu</label>
                        <span class="border"></span>
                    </div>
                </div>
                <input type="hidden" name="loaitaikhoanship" value="<?php echo $getship->LOAITK; ?>">
                <div class="contaniner">
                    <input type="submit" class="btn" value="Accept">
                </div>
            </form>
        </section>
    </div>
</div>


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
                        <th class="th_table">Loại tài khoản</th>
                        <th class="th_table">Tên Shipper</th>
                        <th class="th_table">Số điện thoại</th>
                        <th class="th_table">Tùy chọn</th>
                        <th class="th_table">Email</th>
                        <th class="th_table">Tỉnh/Thành phố</th>
                        <th class="th_table">Phường/Xã</th>
                        <th class="th_table">Đường, số nhà</th>
                        <th class="th_table">Số căn cước</th>
                        <th class="th_table">Trạng thái</th>
                        <th class="th_table">Tên đăng nhập</th>
                        <th class="th_table">Mật khẩu</th>
                    </tr>
                </thead>
                <tbody class="tbody_table">
                    <?php
                    foreach ($list_ship as $n) {
                    ?>
                        <tr class="tr_table">
                            <td class="td_table">
                                <p class="status ship"><?php echo $n->LOAITK; ?></p>
                            </td>
                            <td class="td_table"><?php echo $n->TEN_SP; ?></td>
                            <td class="td_table"><?php echo $n->SDT_SP; ?></td>
                            <td class="td_table">
                                <tempship1 class="btnup" value="<?php echo $n->ID_SP; ?>">
                                    <ion-icon name="pencil"></ion-icon>
                                </tempship1>
                                <!--<div class="xoa" align="center">
                                    <a href="./elements/mshipper/shipperAct.php?reqact=deleteship&idship=<?php echo $n->ID_SP; ?>">
                                        <ion-icon name="trash"></ion-icon>
                                    </a>
                                </div>-->
                            </td>
                            <td class="td_table"><?php echo $n->EMAIL; ?></td>
                            <td class="td_table"><?php echo $n->TINH_TP; ?></td>
                            <td class="td_table"><?php echo $n->PHUONG_XA; ?></td>
                            <td class="td_table"><?php echo $n->DUONG_SONHA; ?></td>
                            <td class="td_table"><strong><?php echo $n->CCCD; ?></strong></td>
                            <td class="td_table">
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
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </main>
    <script>
        $("tempship1").click(function() {
            var idship = $(this).attr("value");
            $("#center").load("./elements/mshipper/shipperUpdate.php?&idship=" + idship);
        });
    </script>
</div>