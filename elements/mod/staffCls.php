<?php
$s = 'database.php';
if (file_exists($s)) {
    $f = $s;
} else {
    $f = 'database.php';
}
require_once $f;
class staff extends Database
{
    public function staffGetAll()
    {
        $getAll = $this->connect->prepare("SELECT * FROM nhanvien INNER JOIN cua3 ON nhanvien.ID_NV = cua3.ID_NV INNER JOIN diachi ON cua3.ID_DC = diachi.ID_DC");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        return $getAll->fetchAll();
    }
    public function staffAdd($TEN_NV, $SDT_NV, $EMAIL, $CCCD, $TENTK, $MATKHAU, $LOAITK, $TRANGTHAI, $TINH_TP, $PHUONG_XA, $DUONG_SONHA, $NGAYNHAP)
    {
        // Kiểm tra xem TENTK đã tồn tại trong cơ sở dữ liệu chưa
        $checkExist = $this->connect->prepare("SELECT COUNT(*) FROM nhanvien WHERE TENTK = ?");
        $checkExist->execute(array($TENTK));
        $count = $checkExist->fetchColumn();

        // Nếu TENTK đã tồn tại, hiển thị thông báo lỗi và ngăn thêm mới
        if ($count > 0) {
            return false;
        }

        $add = $this->connect->prepare("INSERT INTO nhanvien (TEN_NV, SDT_NV, EMAIL, CCCD, TENTK, MATKHAU, LOAITK, TRANGTHAI) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $add->execute(array($TEN_NV, $SDT_NV, $EMAIL, $CCCD, $TENTK, $MATKHAU, $LOAITK, $TRANGTHAI));
        $idnhanvien = $this->connect->lastInsertId();

        $addDiachi = $this->connect->prepare("INSERT INTO diachi (TINH_TP, PHUONG_XA, DUONG_SONHA) VALUES (?, ?, ?)");
        $addDiachi->execute(array($TINH_TP, $PHUONG_XA, $DUONG_SONHA));
        $idDiachi = $this->connect->lastInsertId();

        $addCua2 = $this->connect->prepare("INSERT INTO cua3 (ID_NV, ID_DC, NGAYNHAP) VALUES (?, ?, ?)");
        $addCua2->execute(array($idnhanvien, $idDiachi, $NGAYNHAP));

        return $add->rowCount() + $addDiachi->rowCount() + $addCua2->rowCount();
    }

    public function staffDel($ID_NV)
    {
        $id = $this->connect->prepare("SELECT ID_DC FROM cua3 WHERE ID_NV = ?");
        $id->execute(array($ID_NV));
        $ID_DC_result = $id->fetch(PDO::FETCH_ASSOC);
        $ID_DC = $ID_DC_result['ID_DC'];

        $delCua3 = $this->connect->prepare("DELETE FROM cua3 WHERE ID_NV = ?");
        $delCua3->execute(array($ID_NV));

        $delDiachi = $this->connect->prepare("DELETE FROM diachi WHERE ID_DC = ?");
        $delDiachi->execute(array($ID_DC));

        $del = $this->connect->prepare("DELETE FROM nhanvien WHERE ID_NV = ? ");
        $del->execute(array($ID_NV));

        return $del->rowCount();
    }

    public function staffUpdate($TEN_NV, $SDT_NV, $EMAIL, $CCCD, $TENTK, $MATKHAU, $LOAITK, $TINH_TP, $PHUONG_XA, $DUONG_SONHA, $NGAYNHAP, $ID_NV)
    {
        $update = $this->connect->prepare("UPDATE nhanvien SET TEN_NV = ?, SDT_NV = ?, EMAIL = ?, CCCD = ?, TENTK = ?, MATKHAU = ?, LOAITK = ? WHERE ID_NV = ? ");
        $update->execute(array($TEN_NV, $SDT_NV, $EMAIL, $CCCD, $TENTK, $MATKHAU, $LOAITK, $ID_NV));

        $updatedc = $this->connect->prepare("UPDATE diachi SET TINH_TP = ?, PHUONG_XA = ?, DUONG_SONHA = ? WHERE ID_DC IN (SELECT ID_DC FROM cua3 WHERE ID_NV = ?)");
        $updatedc->execute(array($TINH_TP, $PHUONG_XA, $DUONG_SONHA, $ID_NV));

        $updatengay = $this->connect->prepare("UPDATE cua3 SET NGAYNHAP = ? WHERE ID_NV = ?");
        $updatengay->execute(array($NGAYNHAP, $ID_NV));

        return $update->rowCount() + $updatedc->rowCount() + $updatengay->rowCount();
    }
    public function staffGetById($ID_NV)
    {
        $getId = $this->connect->prepare("SELECT nhanvien.*, diachi.*
        FROM nhanvien
        INNER JOIN cua3 ON nhanvien.ID_NV = cua3.ID_NV
        INNER JOIN diachi ON cua3.ID_DC = diachi.ID_DC
        WHERE nhanvien.ID_NV = ?");
        $getId->setFetchMode(PDO::FETCH_OBJ);
        $getId->execute(array($ID_NV));
        return $getId->fetch();
    }
    public function staffSetActive($ID_NV, $TRANGTHAI)
    {
        $update = $this->connect->prepare("UPDATE nhanvien SET TRANGTHAI = ? WHERE ID_NV = ? ");
        $update->execute(array($TRANGTHAI, $ID_NV));
        return $update->rowCount();
    }
    public function UserChangePassword($TENTK, $MATKHAU, $LOAITK, $MATKHAUNEW)
    {
        $selectMK = $this->connect->prepare(" SELECT password FROM nhanvien WHERE TENTK = ? and LOAITK = ? and TRANGTHAI = 'on' ");
        $selectMK->setFetchMode(PDO::FETCH_OBJ);
        $selectMK->execute(array($TENTK, $LOAITK));
        if (count($selectMK->fetch()) == 1) {
            $temp = $selectMK->fetch();
            if ($MATKHAU == $temp->MATKHAU) {
                $update = $this->connect->prepare(" UPDATE nhanvien SET MATKHAU = ? WHERE TENTK = ? and LOAITK = ? ");
                $update->execute(array($MATKHAUNEW, $TENTK, $LOAITK));
                return $update->rowCount();
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function CheckLogin($TENTK, $MATKHAU, $LOAITK)
    {
        $select = $this->connect->prepare(" SELECT * FROM nhanvien WHERE TENTK = ? and MATKHAU = ? and LOAITK = ? and TRANGTHAI = 'on' ");
        $select->setFetchMode(PDO::FETCH_OBJ);
        $select->execute(array($TENTK, $MATKHAU, $LOAITK));
        if (count($select->fetchAll()) == 1) {
            return true;
        } else {
            return false;
        }
    }
}
