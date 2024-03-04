<?php
require '../../elements/mod/staffCls.php';
if (isset($_GET['reqact'])) {
    $requsetAction = $_GET['reqact'];
    switch ($requsetAction) {
        case 'addnew':
            $TEN_NV = $_POST['tenstaff'];
            $SDT_NV = $_POST['sdtstaff'];
            $EMAIL = $_POST['emailstaff'];
            $CCCD = $_POST['cccdstaff'];
            $TENTK = $_POST['taikhoandangnhanstaff'];
            $MATKHAU = $_POST['matkhaustaff'];
            $LOAITK = $_POST['loaitaikhoanstaff'];
            $TRANGTHAI = $_POST['trangthaistaff'];
            $staff = new staff();
            $rs = $staff->staffAdd($TEN_NV, $SDT_NV, $EMAIL, $CCCD, $TENTK, $MATKHAU, $LOAITK, $TRANGTHAI);
            if ($rs) {
                header('location:../../index.php?req=staffview');
            } else {
                header('location:../../index.php?req=staffview');
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
            $staff = new staff();
            $rs = $staff->staffUpdate($TEN_NV, $SDT_NV, $EMAIL, $CCCD, $TENTK, $MATKHAU, $LOAITK, $TRANGTHAI, $ID_NV);
            if ($rs) {
                header('location:../../index.php?req=staffview');
            } else {
                header('location:../../index.php?req=staffvew');
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
        default:
            header('location:../../index.php?req=staffview');
    }
} else {
    header('location:../../index.php?req=staffrview');
}
