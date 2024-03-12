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
        case 'deletestaff':
            $ID_NV = $_GET['idstaff'];
            $staff = new staff();
            $rs = $staff->staffDel($ID_NV);
            if ($rs) {
                header('location:../../index.php?req=staffview');
            } else {
                header('location:../../index.php?req=staffview');
            }
            break;
        case 'updatestaff':
            $ID_NV = $_POST['idstaff'];
            $TEN_NV = $_POST['tenstaff'];
            $SDT_NV = $_POST['sdtstaff'];
            $EMAIL = $_POST['emailstaff'];
            $CCCD = $_POST['cccdstaff'];
            $TENTK = $_POST['taikhoandangnhapstaff'];
            $MATKHAU = $_POST['matkhaustaff'];
            $LOAITK = $_POST['loaitaikhoanstaff'];
            $TINH_TP = $_POST['tinhstaff'];
            $PHUONG_XA = $_POST['phuongstaff'];
            $DUONG_SONHA = $_POST['duongstaff'];
            $NGAYNHAP = $_POST['ngaystaff'];
            $store = new staff();
            $rs = $store->staffUpdate($TEN_NV, $SDT_NV, $EMAIL, $CCCD, $TENTK, $MATKHAU, $LOAITK, $TINH_TP, $PHUONG_XA, $DUONG_SONHA, $NGAYNHAP, $ID_NV);
            if ($rs) {
                header('location:../../index.php?req=staffview');
            } else {
                header('location:../../index.php?req=staffview');
            }
            break;
        case 'setlock':
            $ID_NV = $_REQUEST['idstaff'];
            $TRANGTHAI = $_REQUEST['trangthaistaff'];
            $staff = new staff();
            if ($TRANGTHAI == "on") {
                $rs = $staff->staffSetActive($ID_NV, "off");
            } else {
                $rs = $staff->staffSetActive($ID_NV, "on");
            }
            if ($rs) {
                header('location:../../index.php?req=staffview');
            } else {
                header('location:../../index.php?req=staffview');
            }
            break;
        case 'userlogout':
            $timelogin = date('h:i - d/m/Y', strtotime('-7hours'));
            if (isset($_SESSION['username'])) {
                $namelogin = $_SESSION['username'];
            }
            setcookie($namelogin, $timelogin, time() + (86400 * 30), "/");
            session_destroy();
            header('location: ../../login.php');
            break;
        default:
            header('location:../../index.php?req=staffview');
    }
} else {
    header('location:../../index.php?req=staffrview');
}
