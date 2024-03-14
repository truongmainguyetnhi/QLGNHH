<?php
require '../mod/packetCls.php';
$idpacket = $_GET['idpacket'];
$packet = new packet();
$getpacket = $packet->packetGetById($idpacket);
?>
<div class="body_update">
    <div class="body_them_up">
        <section class="them_body">
            <form name="updatepacket" id="update_packet" class="test" onsubmit="alert('Thành công')" method="post"
                enctype="multipart/form-data" action="./elements/mpacket/packetAct.php?reqact=updatepacket">
                <span class="title">Chỉ định shipper giao hàng</span>
                <div class="fields">
                    <input type="text" name="idpacket" value="<?php echo $idpacket; ?>">
                    <div class="input_group type-md">
                        <input type="text" name="tenship" value="<?php echo $getpacket->TEN_SP ?? 'Chưa có'; ?>"
                            required>
                        <label for="tenship">Tên Shipper</label>
                        <span class="border"></span>
                    </div>
                    <div class="input_group type-md">
                        <input type="text" name="dcship" value="<?php echo $getpacket->TINH_TP; ?>" required>
                        <label for="dcship">Địa chỉ giao hàng</label>
                        <span class="border"></span>
                    </div>
                </div>
                <div class="contaniner">
                    <input type="submit" class="btn" value="Accept" id="acceptBtn">
                </div>
            </form>
        </section>
    </div>
</div>

<div>

    <div class="table_khu">
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
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
</div>