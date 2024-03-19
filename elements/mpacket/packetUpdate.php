<div>
    <?php
    require '../mod/packetCls.php';
    $idpacket = $_GET['idpacket'];
    $packet = new packet();
    $getpacket = $packet->packetGetById($idpacket);
    ?>
    <div class="body_update">
        <div class=" phanchi ">
            <section class="them_body">
                <form name="updatepacket" id="update_packet" class="test" onsubmit="alert('Thành công')" method="post"
                    enctype="multipart/form-data" action="./elements/mpacket/packetAct.php?reqact=updatepacket_shipper">
                    <span class="title">Chỉ định shipper giao hàng: <?php echo $getpacket->MA_DH; ?></span>
                    <div class="fields">
                        <input type="hidden" name="idpacket" value="<?php echo $idpacket; ?>">
                        <div class="input_group type-md">
                            <input type="text" name="tenship" value="<?php echo $getpacket->TEN_SP ?? 'Chưa có'; ?>"
                                required>
                            <label for="tenship">Tên Shipper</label>
                            <span class="border"></span>
                        </div>
                        <div class="input_group type-md read">
                            <input type="text" name="dcship" value="<?php echo $getpacket->TINH_TP; ?>" readonly>
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

        <div class="table_khu">
            <main class="vung_table">
                <section class="table_header">
                    <h1>Danh sách Shipper</h1>
                </section>
                <section class="table_body">
                    <?php
                    $obj = new shipper();
                    $list_ship = $obj->ShipGetAll();
                    ?>
                    <table class="table_view">
                        <thead class="thead_table">
                            <tr align="left" class="tr_table">
                                <th class="th_table">Tên Shipper</th>
                                <th class="th_table">Địa chỉ</th>
                            </tr>
                        </thead>
                        <tbody class="tbody_table">
                            <?php
                            foreach ($list_ship as $n) {
                            ?>
                            <tr class="tr_table">
                                <td class="td_table"><?php echo $n->TEN_SP; ?></td>
                                <td class="td_table"><?php echo $n->TINH_TP; ?></td>
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
</div>


<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script>
document.getElementById('btnOpenForm1').addEventListener('click', function() {
    var bodyds = document.getElementById('dsdh');
    if (bodyds.style.display === 'none') {
        bodyds.style.display = 'block';
    } else {
        bodyds.style.display = 'none';
    }
});
</script>

</div>