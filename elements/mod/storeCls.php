<?php
$s = 'database.php';
if (file_exists($s)) {
    $f = $s;
} else {
    $f = 'database.php';
}
require_once $f;
class store extends Database
{
    public function StoreGetAll()
    {
        $getAll = $this->connect->prepare("SELECT * FROM cuahang INNER JOIN cua2 ON cuahang.ID_CH = cua2.ID_CH INNER JOIN diachi ON cua2.ID_DC = diachi.ID_DC");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        return $getAll->fetchAll();
    }
    public function StoreAdd($TEN_CH, $SDT_CH, $TRANGTHAI, $EMAIL, $TAIKHOAN, $TENTK, $MATKHAU, $LOAITK, $TINH_TP, $PHUONG_XA, $DUONG_SONHA)
    {
        $addCuahang = $this->connect->prepare("INSERT INTO cuahang (TEN_CH, SDT_CH, TRANGTHAI, EMAIL, TAIKHOAN, TENTK, MATKHAU, LOAITK) 
        VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
        $addCuahang->execute(array($TEN_CH, $SDT_CH, $TRANGTHAI, $EMAIL, $TAIKHOAN, $TENTK, $MATKHAU, $LOAITK));
        $idCuahang = $this->connect->lastInsertId();

        $addDiachi = $this->connect->prepare("INSERT INTO diachi (TINH_TP, PHUONG_XA, DUONG_SONHA) 
        VALUES(?, ?, ?)");
        $addDiachi->execute(array($TINH_TP, $PHUONG_XA, $DUONG_SONHA));
        $idDiachi = $this->connect->lastInsertId();

        $addCua2 = $this->connect->prepare("INSERT INTO cua2 (ID_CH, ID_DC) VALUES (?, ?)");
        $addCua2->execute(array($idCuahang, $idDiachi));

        return $addCuahang->rowCount() + $addDiachi->rowCount() + $addCua2->rowCount();
    }
    public function StoreDel($ID_CH)
    {
        $id = $this->connect->prepare("SELECT ID_DC FROM cua2 WHERE ID_CH = ?");
        $id->execute(array($ID_CH));
        $ID_DC_result = $id->fetch(PDO::FETCH_ASSOC);
        $ID_DC = $ID_DC_result['ID_DC'];

        $delCua2 = $this->connect->prepare("DELETE FROM cua2 WHERE ID_CH = ?");
        $delCua2->execute(array($ID_CH));

        $delDiachi = $this->connect->prepare("DELETE FROM diachi WHERE ID_DC = ?");
        $delDiachi->execute(array($ID_DC));

        $delCuahang = $this->connect->prepare("DELETE FROM cuahang WHERE ID_CH = ?");
        $delCuahang->execute(array($ID_CH));

        return $delCuahang->rowCount();
    }
    public function StoreUpdate($TEN_CH, $SDT_CH, $EMAIL, $TAIKHOAN, $TENTK, $MATKHAU, $LOAITK, $TINH_TP, $PHUONG_XA, $DUONG_SONHA, $ID_CH)
    {
        $update = $this->connect->prepare("UPDATE cuahang SET TEN_CH = ?, SDT_CH = ?, EMAIL = ?, TAIKHOAN = ?, TENTK = ?, MATKHAU = ?, LOAITK = ? WHERE ID_CH = ? ");
        $update->execute(array($TEN_CH, $SDT_CH, $EMAIL, $TAIKHOAN, $TENTK, $MATKHAU, $LOAITK, $ID_CH));

        $updatedc = $this->connect->prepare("UPDATE diachi SET TINH_TP = ?, PHUONG_XA = ?, DUONG_SONHA = ? WHERE ID_DC IN (SELECT ID_DC FROM cua2 WHERE ID_CH = ?)");
        $updatedc->execute(array($TINH_TP, $PHUONG_XA, $DUONG_SONHA, $ID_CH));

        return $update->rowCount() + $updatedc->rowCount();
    }
    public function StoreGetById($ID_CH)
    {
        $getId = $this->connect->prepare(" SELECT cuahang.*, diachi.*
        FROM cuahang
        INNER JOIN cua2 ON cuahang.ID_CH = cua2.ID_CH
        INNER JOIN diachi ON cua2.ID_DC = diachi.ID_DC
        WHERE cuahang.ID_CH = ?
    ");
        $getId->setFetchMode(PDO::FETCH_OBJ);
        $getId->execute(array($ID_CH));
        return $getId->fetch();
    }
    public function StoreSetActive($ID_CH, $TRANGTHAI)
    {
        $update = $this->connect->prepare("UPDATE cuahang SET TRANGTHAI = ? WHERE ID_CH = ? ");
        $update->execute(array($TRANGTHAI, $ID_CH));
        return $update->rowCount();
    }
    public function UserChangePassword($TENTK, $MATKHAU, $LOAITK, $MATKHAUNEW)
    {
        $selectMK = $this->connect->prepare(" SELECT password FROM nhancuahangvien WHERE TENTK = ? and LOAITK = ? and TRANGTHAI = 'on' ");
        $selectMK->setFetchMode(PDO::FETCH_OBJ);
        $selectMK->execute(array($TENTK, $LOAITK));
        if (count($selectMK->fetch()) == 1) {
            $temp = $selectMK->fetch();
            if ($MATKHAU == $temp->MATKHAU) {
                $update = $this->connect->prepare(" UPDATE cuahang SET MATKHAU = ? WHERE TENTK = ? and LOAITK = ? ");
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
        $select = $this->connect->prepare(" SELECT * FROM cuahang WHERE TENTK = ? and MATKHAU = ? and LOAITK = ? and TRANGTHAI = 'on' ");
        $select->setFetchMode(PDO::FETCH_OBJ);
        $select->execute(array($TENTK, $MATKHAU, $LOAITK));
        if (count($select->fetchAll()) == 1) {
            return true;
        } else {
            return false;
        }
    }
}
