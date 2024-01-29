<div>
    <div class="body_them">
        <section class="them_header">
            <h1>Thêm của hàng mới</h1>
        </section>
        <section class="them_body">
            <form name="newstore" id="formadd_store" method="post" enctype="multipart/form-data"
                action="./elements/mstore/storeAct.php?reqact=addnew">
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
                    <input type="text" name="taikhoanstore" required>
                    <label for="taikhoanstore">Số dư tài khoản</label>
                    <span class="border"></span>
                </div>
                <div class="radio_group">
                    <div class="input_container">
                        <input type="radio" name="trangthaistore" value="on">
                        <div class="radio_tile">
                            <img class="iconbtn" src="./img/switch-on.png" />
                        </div>
                    </div>
                    <div class="input_container">
                        <input type="radio" name="trangthaistore" value="off">
                        <div class="radio_tile">
                            <img class="iconbtn" src="./img/switch-off.png" />
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
                            <th class="th_table">Tên cửa hàng</th>
                            <th class="th_table">Số điện thoại</th>
                            <th class="th_table">Email</th>
                            <th class="th_table">Số dư tài khoản</th>
                            <th class="th_table">Trạng thái</th>
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
                            <td class="td_table"><strong><?php echo $n->TAIKHOAN; ?> VND</strong></td>
                            <td class="td_table">
                                <?php
                                    if ($n->TRANGTHAI == "on") {
                                    ?>
                                <a href="./elements/mstore/storeAct.php?reqact=setlock&idstore=<?php echo $n->ID_CH; ?> 
                                    &trangthaistore=<?php echo $n->TRANGTHAI; ?>">
                                    <img class="iconimgstw" src="./img/switch-on.png" />
                                </a>
                                <?php
                                    } else {
                                    ?>
                                <a href="./elements/mstore/storeAct.php?reqact=setlock&idstore=<?php echo $n->ID_CH; ?>
                                    &trangthaistore=<?php echo $n->TRANGTHAI; ?>">
                                    <img class="iconimgstw" src="./img/switch-off.png" />
                                </a>
                                <?php
                                    }
                                    ?>
                            </td>
                            <td class="td_table">
                                <a
                                    href="./elements/mstore/storeAct.php?reqact=deletestore&idstore=<?php echo $n->ID_CH; ?>">
                                    <img class="iconimg" src="./img/delete.png">
                                </a>
                                <tempstore class="btnupdatestore" value="<?php echo $n->ID_CH; ?>">
                                    <img class="iconimg" src="./img/pencil.png" />
                                </tempstore>
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