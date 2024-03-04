<?php
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
            $ship = new ship();
            $rs = $ship->ShipAdd($TEN_SP, $SDT_SP, $TRANGTHAI, $EMAIL, $CCCD, $TENTK, $MATKHAU, $LOAITK);
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
            $ship = new ship();
            $rs = $ship->ShipUpdate($TEN_SP, $SDT_SP, $EMAIL, $CCCD, $TENTK, $MATKHAU, $LOAITK, $ID_SP);
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
        default:
            header('location:../../index.php?req=shipperview');
    }
} else {
    header('location:../../index.php?req=shipperview');
}
