<div>
    <div class="btn_container">
        <button id="btnOpenForm" class="btn add">
            <ion-icon name="add"></ion-icon>
        </button>
    </div>
    <div class="body_them">
        <section class="them_body">
            <form onsubmit="alert('Thành công')" name="newkho" id="formadd_kho" method="post"
                enctype="multipart/form-data" action="./elements/mkho/khoAct.php?reqact=addnew">
                <span class="title">Thông tin kho hàng</span>
                <div class="fields">
                    <div class="input_group type-md">
                        <input type="text" name="tenkho" required>
                        <label for="tenkho">Tên kho hàng</label>
                        <span class="border"></span>
                    </div>
                    <div class="input_group type-md">
                        <input type="text" name="tinhkho" required>
                        <label for="tinhkho">Tỉnh/Thành phố</label>
                        <span class="border"></span>
                    </div>
                    <div class="input_group type-md">
                        <input type="text" name="phuongkho" required>
                        <label for="phuongkho">Phường/Xã</label>
                        <span class="border"></span>
                    </div>
                    <div class="input_group type-md">
                        <input type="text" name="duongkho" required>
                        <label for="duongkho">Đường/Số nhà</label>
                        <span class="border"></span>
                    </div>
                    <div class="radio_group">
                        <label for="trangthaikho">Status</label>
                        <div class="input_container">
                            <input type="radio" name="trangthaikho" value="on" checked>
                            <div class="radio_tile">
                                <ion-icon name="flash-outline"></ion-icon>
                                <label for="on">on</label>
                            </div>
                        </div>
                        <div class="input_container">
                            <input type="radio" name="trangthaikho" value="off">
                            <div class="radio_tile">
                                <ion-icon name="flash-off-outline"></ion-icon>
                                <label for="off">off</label>
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
    require './elements/mod/khoCls.php';
    ?>

    <div class="table_khu">
        <main class="vung_table ">
            <section class="table_header">
                <h1>Danh sách kho hàng</h1>
            </section>
            <section class="table_body">
                <?php
                $obj = new kho();
                $list_kho = $obj->khoGetAll();
                ?>
                <table class="table_view">
                    <thead class="thead_table">
                        <tr align="left" class="tr_table">
                            <th class="th_table">Tên kho hàng</th>
                            <th class="th_table">Tỉnh/Thành phố</th>
                            <th class="th_table">Phường/Xã</th>
                            <th class="th_table">Đường/Số nhà</th>
                            <th class="th_table">Trạng thái</th>

                        </tr>
                    </thead>
                    <tbody class="tbody_table">
                        <?php
                        foreach ($list_kho as $n) {
                        ?>
                        <tr class="tr_table">
                            <td class="td_table"><strong><?php echo $n->TEN_KHO; ?></strong></td>
                            <td class="td_table"><?php echo $n->TINH_TP; ?></td>
                            <td class="td_table"><?php echo $n->PHUONG_XA; ?></td>
                            <td class="td_table"><?php echo $n->DUONG_SONHA; ?></td>
                            <td class="td_table tt">
                                <?php
                                    if ($n->TRANGTHAI_KHO == "on") {
                                    ?>
                                <a href="./elements/mkho/khoAct.php?reqact=setlock&idkho=<?php echo $n->ID_KHO; ?> 
                                    &trangthaikho=<?php echo $n->TRANGTHAI_KHO; ?>">
                                    <ion-icon name="lock-open"></ion-icon>
                                </a>
                                <?php
                                    } else {
                                    ?>
                                <a href="./elements/mkho/khoAct.php?reqact=setlock&idkho=<?php echo $n->ID_KHO; ?>
                                    &trangthaikho=<?php echo $n->TRANGTHAI_KHO; ?>">
                                    <ion-icon name="lock-closed"></ion-icon>
                                </a>
                                <?php
                                    }
                                    ?>
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