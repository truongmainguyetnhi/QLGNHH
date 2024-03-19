<?php
session_start();
require '../../elements/mod/khoCls.php';
if (isset($_GET['reqact'])) {
    $requsetAction = $_GET['reqact'];
    switch ($requsetAction) {
        case 'addnew':
            $TEN_NV = $_POST['tenkho'];
            $TINH_TP = $_POST['tinhkho'];
            $PHUONG_XA = $_POST['phuongkho'];
            $DUONG_SONHA = $_POST['duongkho'];
            $TRANGTHAI_KHO = $_POST['trangthaikho'];
            $kho = new kho();
            $rs = $kho->khoAdd($TEN_NV, $TRANGTHAI_KHO, $TINH_TP, $PHUONG_XA, $DUONG_SONHA);
            if ($rs) {
                header('location:../../index.php?req=khoview');
            } else {
                header('location:../../index.php?req=khoview');
            }
            break;
        case 'setlock':
            $ID_KHO = $_REQUEST['idkho'];
            $TRANGTHAI_KHO = $_REQUEST['trangthaikho'];
            $kho = new kho();
            if ($TRANGTHAI_KHO == "on") {
                $rs = $kho->khoSetActive($ID_KHO, "off");
            } else {
                $rs = $kho->khoSetActive($ID_KHO, "on");
            }
            if ($rs) {
                header('location:../../index.php?req=khoview');
            } else {
                header('location:../../index.php?req=khoview');
            }
            break;
        default:
            header('location:../../index.php?req=khoview');
            break;
    }
} else {
    header('location:../../index.php?req=khoview');
} ?>
<script src="js/jscript.js" type="text/javascript"></script>