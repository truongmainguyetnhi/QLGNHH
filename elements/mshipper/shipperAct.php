<?php
session_start();
require '../../elements/mod/shipperCls.php';
if (isset($_GET['reqact'])) {
    $requsetAction = $_GET['reqact'];
    switch ($requsetAction) {
        case 'addnew':
            $TEN_SP = $_POST['tenship'];
            $SDT_SP = $_POST['sdtship'];
            $TRANGTHAI = $_POST['trangthaiship'];
            $EMAIL = $_POST['emailship'];
            $CCCD = $_POST['cccdship'];
            $TENTK = $_POST['taikhoandangnhanship'];
            $MATKHAU = $_POST['matkhauship'];
            $LOAITK = $_POST['loaitaikhoanship'];
            $TINH_TP = $_POST['tinhship'];
            $PHUONG_XA = $_POST['phuongship'];
            $DUONG_SONHA = $_POST['duongship'];
            $ship = new ship();
            $rs = $ship->ShipAdd($TEN_SP, $SDT_SP, $TRANGTHAI, $EMAIL, $CCCD, $TENTK, $MATKHAU, $LOAITK, $TINH_TP, $PHUONG_XA, $DUONG_SONHA);
            if ($rs) {
                header('location:../../index.php?req=shipperview');
            } else {
                header('location:../../index.php?req=shipperview');
            }
            break;
        case 'deleteship':
            $ID_SP = $_GET['idship'];
            $ship = new ship();
            $rs = $ship->ShipDel($ID_SP);
            if ($rs) {
                header('location:../../index.php?req=shipperview');
            } else {
                header('location:../../index.php?req=shipperview');
            }
            break;
        case 'updateship':
            $ID_SP = $_POST['idship'];
            $TEN_SP = $_POST['tenship'];
            $SDT_SP = $_POST['sdtship'];
            $EMAIL = $_POST['emailship'];
            $CCCD = $_POST['cccdship'];
            $TENTK = $_POST['taikhoandangnhapship'];
            $MATKHAU = $_POST['matkhauship'];
            $LOAITK = $_POST['loaitaikhoanship'];
            $TINH_TP = $_POST['tinhship'];
            $PHUONG_XA = $_POST['phuongship'];
            $DUONG_SONHA = $_POST['duongship'];
            $ship = new ship();
            $rs = $ship->ShipUpdate($TEN_SP, $SDT_SP, $EMAIL, $CCCD, $TENTK, $MATKHAU, $LOAITK, $TINH_TP, $PHUONG_XA, $DUONG_SONHA, $ID_SP);
            if ($rs) {
                header('location:../../index.php?req=shipperview');
            } else {
                header('location:../../index.php?req=shippervew');
            }
            break;
        case 'setlock':
            $ID_SP = $_REQUEST['idship'];
            $TRANGTHAI = $_REQUEST['trangthaiship'];
            $ship = new ship();
            if ($TRANGTHAI == "on") {
                $rs = $ship->ShipSetActive($ID_SP, "off");
            } else {
                $rs = $ship->ShipSetActive($ID_SP, "on");
            }
            if ($rs) {
                header('location:../../index.php?req=shipperview');
            } else {
                header('location:../../index.php?req=shipperview');
            }
            break;
        case 'checklogin':
            $TENTK = $_POST['username'];
            $MATKHAU = $_POST['password'];
            $LOAITK = $_POST['loaitk'];
            $ship = new ship();
            $rs = $ship->CheckLogin($TENTK, $MATKHAU, $LOAITK);
            if ($rs) {
                if ($LOAITK == "Shipper") {
                    $_SESSION['Shipper'] = $LOAITK;
                    $_SESSION['username'] = $TENTK;
                    header('location:../../faceship.php?login_message=Đăng nhập thành công!');
                } else {
                    header('location:../../login.php?login_message=Đăng nhập không thành công!');
                }
            }
            break;
        case 'logout':
            session_destroy();
            header('location: ../../login.php');
            break;
        default:
            header('location:../../index.php?req=shipperview');
    }
} else {
    header('location:../../index.php?req=shipperview');
}
