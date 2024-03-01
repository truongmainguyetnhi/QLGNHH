<?php
require '../mod/shipperCls.php';
$idship = $_GET['idship'];
$ship = new ship();
$getship = $ship->ShipGetById($idship);
?>
<div class="body_update">
    <div class="body_them">
        <section class="them_header">
            <h1>Cập nhật thông tin</h1>
        </section>
        <section class="them_body">
            <form name="updateship" id="update_ship" class="test" onsubmit="alert('Thành công')" method="post" enctype="multipart/form-data" action="./elements/mshipper/shipperAct.php?reqact=updateship">
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
                <input type="hidden" name="loaitaikhoanship" value="<?php echo $LOAITK; ?>">
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
                                <div class="xoa" align="center">
                                    <a href="./elements/mshipper/shipperAct.php?reqact=deleteship&idship=<?php echo $n->ID_SP; ?>">
                                        <img class="iconimg" src="./img/trash.png">
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