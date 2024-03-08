<?php
session_start();
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
            $TINH_TP = $_POST['tinhstaff'];
            $PHUONG_XA = $_POST['phuongstaff'];
            $DUONG_SONHA = $_POST['duongstaff'];
            $NGAYNHAP = $_POST['ngaystaff'];
            $staff = new staff();
            $rs = $staff->staffAdd($TEN_NV, $SDT_NV, $EMAIL, $CCCD, $TENTK, $MATKHAU, $LOAITK, $TRANGTHAI, $TINH_TP, $PHUONG_XA, $DUONG_SONHA, $NGAYNHAP);
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
        case 'checklogin':
            $TENTK = $_POST['username'];
            $MATKHAU = $_POST['password'];
            $LOAITK = $_POST['loaitk'];
            $staff = new staff();
            $rs = $staff->CheckLogin($TENTK, $MATKHAU, $LOAITK);
            if ($rs) {
                if ($LOAITK == "Quản lý") {
                    $_SESSION['Quản lý'] = $LOAITK;
                } else {
                    $_SESSION['Nhân viên'] = $LOAITK;
                }
                header('location:../../index.php?login_message=Đăng nhập thành công!');
            } else {
                header('location:../../login.php?login_message=Đăng nhập không thành công!');
            }
            break;
        case 'logout':
            session_destroy();
            header('location: ../../login.php');
            break;
        default:
            header('location:../../index.php?req=staffview');
            break;
    }
} else {
    header('location:../../index.php?req=staffrview');
} ?>
<script src="js/jscript.js" type="text/javascript"></script>