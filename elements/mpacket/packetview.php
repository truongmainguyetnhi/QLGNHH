<div>
    <?php
    require './elements/mod/packetCls.php';
    ?>
    <div class="table_khu">
        <main class="vung_table">
            <section class="table_header">
                <h1>Danh sách đơn hàng</h1>
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
                            <th class="th_table">Tên cửa hàng</th>
                            <th class="th_table">Thời gian tạo</th>
                            <th class="th_table">Trọng lượng</th>
                            <th class="th_table">Mô tả</th>
                            <th class="th_table">Ghi chú</th>
                        </tr>
                    </thead>
                    <tbody class="tbody_table">
                        <?php
                        foreach ($list_packet as $n) {
                        ?>
                            <tr class="tr_table">
                                <td class="td_table"><?php echo $n->MA_DH; ?></td>
                                <td class="td_table"><?php echo $n->TEN_DH; ?></td>
                                <td class="td_table">
                                    <?php
                                    $nhi = $n->TRANGTHAI;
                                    if ('Đã tạo đơn' === $nhi) {
                                    ?>
                                        <p class="status DTD"><?php echo $n->TRANGTHAI; ?></p>
                                    <?php
                                    } elseif ('Đang vận chuyển' === $nhi) {
                                    ?>
                                        <p class="status DVC"><?php echo $n->TRANGTHAI; ?></p>
                                    <?php } elseif ('Giao thành công' === $nhi) {
                                    ?>
                                        <p class="status GTC"><?php echo $n->TRANGTHAI; ?></p>
                                    <?php } elseif ('Đã hủy' === $nhi) {
                                    ?>
                                        <p class="status DH"><?php echo $n->TRANGTHAI; ?></p>
                                    <?php } elseif ('Hoàn trả' === $nhi) {
                                    ?>
                                        <p class="status HT"><?php echo $n->TRANGTHAI; ?></p>
                                    <?php } ?>
                                </td>
                                <td class="td_table"><strong><?php echo $n->TEN_SP; ?></strong></td>
                                <td class="td_table"><?php echo $n->TEN_CH; ?></td>
                                <td class="td_table"><?php echo $n->THOIGIANTAO; ?></td>
                                <td class="td_table"><?php echo $n->TRONGLUONG; ?></td>
                                <td class="td_table"><?php echo $n->MOTA; ?></td>
                                <td class="td_table"><?php echo $n->GHICHU; ?></td>
                                <td class="td_table set">
                                    <temppacket class="btnup" value="<?php echo $n->ID_DH; ?>">
                                        <ion-icon name="pencil"></ion-icon>
                                    </temppacket>
                                    <div class="xoa">
                                        <a href="./elements/mpacket/packetaffAct.php?reqact=deletepacket&idpacket=<?php echo $n->ID_DH; ?>">
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
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
</div>