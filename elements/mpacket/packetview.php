<div>
    <?php
    require './elements/mod/packetCls.php';
    ?>
    <div class="btn_container">
        <button id="btnphandon" class="btn share">
            <ion-icon name="funnel-outline"></ion-icon>
            <span>Phân đơn</span>
        </button>
    </div>
    <div class="table_khu" id="chualoc">
        <main class="vung_table">
            <section class="table_header">
                <h1>Danh sách đơn hàng</h1>
            </section>
            <section class="table_body">
                <?php
                $obj = new packet();
                $list_packet = $obj->packetGetAll2();
                ?>
                <table class="table_view">
                    <thead class="thead_table">
                        <tr align="left" class="tr_table">
                            <th class="th_table">Mã đơn hàng</th>
                            <th class="th_table">Tên đơn hàng</th>
                            <th class="th_table">Trạng thái</th>
                            <th class="th_table">Tên Shipper</th>
                            <th class="th_table">Chỉ định</th>
                            <th class="th_table">Tên cửa hàng</th>
                            <th class="th_table">Thời gian tạo</th>
                            <th class="th_table">Trọng lượng</th>
                            <th class="th_table">Mô tả</th>
                            <th class="th_table">Ghi chú</th>
                            <th class="th_table">Tên người nhận</th>
                            <th class="th_table">Số điện thoại</th>
                            <th class="th_table">Địa chỉ</th>
                            <th class="th_table">Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody class="tbody_table">
                        <?php
                        foreach ($list_packet as $n) {
                        ?>
                        <tr class="tr_table">
                            <td class="td_table"><?php echo $n->MA_DH; ?></td>
                            <td class="td_table"><?php echo $n->TEN_HH; ?></td>
                            <td class="td_table">
                                <?php
                                    $nhi = $n->TRANGTHAI_DH;
                                    if ('Đã tạo đơn' === $nhi) {
                                    ?>
                                <p class="status DTD"><?php echo $n->TRANGTHAI_DH; ?></p>
                                <?php
                                    } elseif ('Đang vận chuyển' === $nhi) {
                                    ?>
                                <p class="status DVC"><?php echo $n->TRANGTHAI_DH; ?></p>
                                <?php } elseif ('Giao thành công' === $nhi) {
                                    ?>
                                <p class="status GTC"><?php echo $n->TRANGTHAI_DH; ?></p>
                                <?php } elseif ('Đã hủy' === $nhi) {
                                    ?>
                                <p class="status DH"><?php echo $n->TRANGTHAI_DH; ?></p>
                                <?php } elseif ('Hoàn trả' === $nhi) {
                                    ?>
                                <p class="status HT"><?php echo $n->TRANGTHAI_DH; ?></p>
                                <?php } ?>
                            </td>
                            <td class="td_table"><strong><?php echo $n->TEN_SP ?? 'Chưa có'; ?></strong></td>
                            <td class="td_table"><?php echo $n->TEN_CH; ?></td>
                            <td class="td_table"><?php echo $n->THOIGIANTAO; ?></td>
                            <td class="td_table"><?php echo $n->TRONGLUONG; ?></td>
                            <td class="td_table"><?php echo $n->MOTA; ?></td>
                            <td class="td_table"><?php echo $n->GHICHU; ?></td>
                            <td class="td_table"><?php echo $n->TEN_NN; ?></td>
                            <td class="td_table"><?php echo $n->SDT_NN; ?></td>
                            <td class="td_table"><?php echo $n->TINH_TP; ?></td>
                            <td class="td_table"><strong><?php echo $n->TONGTIENHANG; ?></strong></td>

                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </section>
        </main>
    </div>

    <div class="table_khu" id="loc">
        <main class="vung_table">
            <section class="table_header">
                <h1 id="chuacoship">Đơn hàng chưa có shipper</h1>
            </section>
            <section class="table_body">
                <?php
                $obj = new packet();
                $list_packet = $obj->packetGetAll();
                ?>
                <table class="table_view">
                    <thead class="thead_table">
                        <tr align="left" class="tr_table">
                            <th class="th_table">Mã đơn hàng</th>
                            <th class="th_table">Tên đơn hàng</th>
                            <th class="th_table">Trạng thái</th>
                            <th class="th_table">Tên Shipper</th>
                            <th class="th_table">Chỉ định</th>
                            <th class="th_table">Tên cửa hàng</th>
                            <th class="th_table">Thời gian tạo</th>
                            <th class="th_table">Trọng lượng</th>
                            <th class="th_table">Mô tả</th>
                            <th class="th_table">Ghi chú</th>
                            <th class="th_table">Tên người nhận</th>
                            <th class="th_table">Số điện thoại</th>
                            <th class="th_table">Địa chỉ</th>
                            <th class="th_table">Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody class="tbody_table">
                        <?php
                        foreach ($list_packet as $n) {
                        ?>
                        <tr class="tr_table">
                            <td class="td_table"><?php echo $n->MA_DH; ?></td>
                            <td class="td_table"><?php echo $n->TEN_HH; ?></td>
                            <td class="td_table">
                                <?php
                                    $nhi = $n->TRANGTHAI_DH;
                                    if ('Đã tạo đơn' === $nhi) {
                                    ?>
                                <p class="status DTD"><?php echo $n->TRANGTHAI_DH; ?></p>
                                <?php
                                    } elseif ('Đang vận chuyển' === $nhi) {
                                    ?>
                                <p class="status DVC"><?php echo $n->TRANGTHAI_DH; ?></p>
                                <?php } elseif ('Giao thành công' === $nhi) {
                                    ?>
                                <p class="status GTC"><?php echo $n->TRANGTHAI_DH; ?></p>
                                <?php } elseif ('Đã hủy' === $nhi) {
                                    ?>
                                <p class="status DH"><?php echo $n->TRANGTHAI_DH; ?></p>
                                <?php } elseif ('Hoàn trả' === $nhi) {
                                    ?>
                                <p class="status HT"><?php echo $n->TRANGTHAI_DH; ?></p>
                                <?php } ?>
                            </td>
                            <td class="td_table"><strong><?php echo $n->TEN_SP ?? 'Chưa có'; ?></strong></td>
                            <td class="td_table set">
                                <temppacket class="btnup" value="<?php echo $n->ID_DH; ?>">
                                    <ion-icon name="pencil"></ion-icon>
                                </temppacket>
                            </td>
                            <td class="td_table"><?php echo $n->TEN_CH; ?></td>
                            <td class="td_table"><?php echo $n->THOIGIANTAO; ?></td>
                            <td class="td_table"><?php echo $n->TRONGLUONG; ?></td>
                            <td class="td_table"><?php echo $n->MOTA; ?></td>
                            <td class="td_table"><?php echo $n->GHICHU; ?></td>
                            <td class="td_table"><?php echo $n->TEN_NN; ?></td>
                            <td class="td_table"><?php echo $n->SDT_NN; ?></td>
                            <td class="td_table"><?php echo $n->TINH_TP; ?></td>
                            <td class="td_table"><strong><?php echo $n->TONGTIENHANG; ?></strong></td>

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
    <script>
    //dongmopacket
    var isOpenP = true; // Ban đầu chualoc mở

    document.getElementById('btnphandon').addEventListener('click', function() {
        var bodychualoc = document.getElementById('chualoc');
        var bodyloc = document.getElementById('loc');
        var ionIcon = document.querySelector('#btnphandon ion-icon');
        var span = document.querySelector('#btnphandon span');

        if (isOpenP) {
            bodyloc.style.display = 'block';
            bodychualoc.style.display = 'none';

            ionIcon.setAttribute('name', 'layers-outline');
            span.innerHTML = 'Tổng quát';
            isOpenP = false;
        } else {
            bodyloc.style.display = 'none';
            bodychualoc.style.display = 'block';
            ionIcon.setAttribute('name', 'funnel-outline');
            span.innerHTML = 'Phân đơn';
            isOpenP = true;
        }
    });
    </script>
</div>