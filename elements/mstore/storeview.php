<div class="ql">Quản lý cửa hàng đối tác</div>
<hr>
<div>Thêm cửa hàng</div>
<div class="content_mod">
    <form name="newstore" id="formadd_store" method="post" enctype="multipart/form-data"
        action="./elements/mstore/storeAct.php?reqact=addnew">
        <table class="table_input">
            <tr>
                <td>Tên cửa hàng: </td>
                <td><input type="text" name="tenstore"></td>
            </tr>
            <tr>
                <td>Số điện thoại: </td>
                <td><input type="text" name="sdtstore"></td>
            </tr>
            <tr>
                <td>Email: </td>
                <td><input type="email" name="emailstore"></td>
            </tr>
            <tr>
                <td>Số dư tài khoản: </td>
                <td><input type="text" name="taikhoanstore"></td>
            </tr>
            <tr>
                <td>Trạng thái: </td>
                <td><input type="radio" name="trangthaistore" value="on">Hoạt động</td>
                <td><input type="radio" name="trangthaistore" value="off">Không hoạt động</td>
            </tr>
            <tr>
                <td><input type="submit" class="btn" value="Tạo mới"></td>
                <td><input type="reset" class="btn" value="Điền mới"></td>
            </tr>
        </table>
    </form>
    <hr />
    <?php
    require './elements/mod/storeCls.php';
    ?>
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
                <thead>
                    <tr align="left" class="tr_table">
                        <th class="table_view">Tên cửa hàng</th>
                        <th class="table_view">Số điện thoại</th>
                        <th class="table_view">Email</th>
                        <th class="table_view">Số dư tài khoản</th>
                        <th class="table_view">Trạng thái</th>
                        <th class="table_view">Tùy chọn</th>
                    </tr>
                </thead>
                <tbody class="tbody_table">
                    <?php
                    foreach ($list_store as $n) {
                    ?>
                    <tr class="tr_table">
                        <td class="table_view"><?php echo $n->TEN_CH; ?></td>
                        <td class="table_view"><?php echo $n->SDT_CH; ?></td>
                        <td class="table_view"><?php echo $n->EMAIL; ?></td>
                        <td class="table_view"><strong><?php echo $n->TAIKHOAN; ?> VND</strong></td>
                        <td class="table_view">
                            <?php
                                if ($n->TRANGTHAI == "on") {
                                ?>
                            <a href="./elements/mstore/storeAct.php?reqact=setlock&idstore=<?php echo $n->ID_CH; ?> 
                                    &trangthaistore=<?php echo $n->TRANGTHAI; ?>">
                                <img class="iconimg" src="./img/switch-on.png" />
                            </a>
                            <?php
                                } else {
                                ?>
                            <a href="./elements/mstore/storeAct.php?reqact=setlock&idstore=<?php echo $n->ID_CH; ?>
                                    &trangthaistore=<?php echo $n->TRANGTHAI; ?>">
                                <img class="iconimg" src="./img/switch-off.png" />
                            </a>
                            <?php
                                }
                                ?>
                        </td>
                        <td class="table_view">
                            <a
                                href="./elements/mstore/storeAct.php?reqact=deletestore&idstore=<?php echo $n->ID_CH; ?>">
                                <img class="iconimg" src="./img/delete-button.png">
                            </a>
                            <tempstore class="btnupdatestore" value="<?php echo $n->ID_CH; ?>">
                                <img class="iconimg" src="./img/pen-edit.png" />
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