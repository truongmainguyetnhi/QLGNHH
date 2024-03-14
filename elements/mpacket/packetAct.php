<?php
require '../../elements/mod/packetCls.php';
if (isset($_GET['reqact'])) {
    $requsetAction = $_GET['reqact'];
    switch ($requsetAction) {
        case 'addnew':
            $TRANGTHAI = $_POST['trangthaipacket'];
            $TRONGLUONG = $_POST['khoiluongpacket'];
            $MOTA = $_POST['motapacket'];
            $TEN_HH = $_POST['tenpacket'];
            $THOIGIANTAO = $_POST['ngaytaopacket'];
            $GHICHU = $_POST['ghichupacket'];
            $TEN_NN = $_POST['tennn'];
            $SDT_NN = $_POST['sdtnn'];
            $TINH_TP = $_POST['tinhnn'];
            $PHUONG_XA = $_POST['phuongnn'];
            $DUONG_SONHA = $_POST['duongnn'];
            $HINHTHUC_TT = $_POST['loaithanhtoan'];
            $PHISHIP = $_POST['loaiphiship'];
            $THUHO = $_POST['thuho'];
            $TONGTIENHANG = $_POST['tongtien'];
            $TENTK = $_POST['tencuahangtao'];
            $packet = new packet();
            $rs = $packet->packetAdd($TRANGTHAI, $TRONGLUONG, $MOTA, $TEN_HH, $THOIGIANTAO, $GHICHU, $TEN_NN, $SDT_NN, $TINH_TP, $PHUONG_XA, $DUONG_SONHA, $HINHTHUC_TT, $PHISHIP, $THUHO, $TONGTIENHANG, $TENTK);
            if ($rs) {
                header('location:../../facesto.php');
            } else {
                header('location:../../facesto.php');
            }
            break;

        case 'updatepacket':
            // Xử lý cập nhật thông tin gói hàng
            $ID_DH = $_POST['idpacket'];
            $TEN_SP = $_POST['tenship'];
            $idSP = $packet->checkShipperExist($TEN_SP);
            if ($idSP !== false) {
                $rs = $packet->packetUpdate($TEN_SP, $ID_DH);
                if ($rs) {
                    header('location:../../index.php?req=packetview');
                } else {
                    header('location:../../index.php?req=packetview');
                }
            } else {
                // Hiển thị thông báo lỗi về sự không tồn tại của shipper
                echo "Shipper không tồn tại.";
            }
            break;
        default:
            header('location:../../index.php?req=shipperview');
    }
} else {
    header('location:../../index.php?req=staffrview');
}
