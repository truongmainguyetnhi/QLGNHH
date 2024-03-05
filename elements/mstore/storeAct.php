<?php
require '../../elements/mod/storeCls.php';
if (isset($_GET['reqact'])) {
    $requsetAction = $_GET['reqact'];
    switch ($requsetAction) {
        case 'addnew':
            $TEN_CH = $_POST['tenstore'];
            $SDT_CH = $_POST['sdtstore'];
            $TRANGTHAI = $_POST['trangthaistore'];
            $EMAIL = $_POST['emailstore'];
            $TAIKHOAN = $_POST['taikhoanstore'];
            $TENTK = $_POST['taikhoandangnhanstore'];
            $MATKHAU = $_POST['matkhaustore'];
            $LOAITK = $_POST['loaitaikhoanstore'];
            $TINH_TP = $_POST['tinhstore'];
            $PHUONG_XA = $_POST['phuongstore'];
            $DUONG_SONHA = $_POST['duongstore'];
            $store = new store();
            $rs = $store->StoreAdd($TEN_CH, $SDT_CH, $TRANGTHAI, $EMAIL, $TAIKHOAN, $TENTK, $MATKHAU, $LOAITK, $TINH_TP, $PHUONG_XA, $DUONG_SONHA);
            if ($rs) {
                header('location:../../index.php?req=storeview');
            } else {
                header('location:../../index.php?req=storeview');
            }
            break;
        case 'deletestore':
            $ID_CH = $_GET['idstore'];
            $store = new store();
            $rs = $store->StoreDel($ID_CH);
            if ($rs) {
                header('location:../../index.php?req=storeview');
            } else {
                header('location:../../index.php?req=storeview');
            }
            break;
        case 'updatestore':
            $ID_CH = $_POST['idstore'];
            $TEN_CH = $_POST['tenstore'];
            $SDT_CH = $_POST['sdtstore'];
            $EMAIL = $_POST['emailstore'];
            $TAIKHOAN = $_POST['taikhoanstore'];
            $TENTK = $_POST['taikhoandangnhapstore'];
            $MATKHAU = $_POST['matkhaustore'];
            $LOAITK = $_POST['loaitaikhoanstore'];
            $TINH_TP = $_POST['tinhstore'];
            $PHUONG_XA = $_POST['phuongstore'];
            $DUONG_SONHA = $_POST['duongstore'];
            $store = new store();
            $rs = $store->StoreUpdate($TEN_CH, $SDT_CH, $EMAIL, $TAIKHOAN, $TENTK, $MATKHAU, $LOAITK, $TINH_TP, $PHUONG_XA, $DUONG_SONHA, $ID_CH);
            if ($rs) {
                header('location:../../index.php?req=storeview');
            } else {
                header('location:../../index.php?req=storeview');
            }
            break;
        case 'setlock':
            $ID_CH = $_REQUEST['idstore'];
            $TRANGTHAI = $_REQUEST['trangthaistore'];
            $store = new store();
            if ($TRANGTHAI == "on") {
                $rs = $store->StoreSetActive($ID_CH, "off");
            } else {
                $rs = $store->StoreSetActive($ID_CH, "on");
            }
            if ($rs) {
                header('location:../../index.php?req=storeview');
            } else {
                header('location:../../index.php?req=storeview');
            }
            break;
        default:
            header('location:../../index.php?req=storeview');
    }
} else {
    header('location:../../index.php?req=storeview');
}
