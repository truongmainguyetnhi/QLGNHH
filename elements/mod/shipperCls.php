<?php
$s = 'database.php';
if (file_exists($s)) {
    $f = $s;
} else {
    $f = 'database.php';
}
require_once $f;
class ship extends Database
{
    public function ShipGetAll()
    {
        $getAll = $this->connect->prepare("SELECT * FROM shipper INNER JOIN cua6 ON shipper.ID_SP = cua6.ID_SP INNER JOIN diachi ON cua6.ID_DC = diachi.ID_DC");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        return $getAll->fetchAll();
    }
    public function ShipAdd($TEN_SP, $SDT_SP, $TRANGTHAI, $EMAIL, $CCCD, $TENTK, $MATKHAU, $LOAITK, $TINH_TP, $PHUONG_XA, $DUONG_SONHA)
    {
        $add = $this->connect->prepare("INSERT INTO shipper (TEN_SP, SDT_SP, TRANGTHAI, EMAIL, CCCD, TENTK, MATKHAU, LOAITK)
        VALUES(?, ?, ?, ?, ?, ?, ?, ?) ");
        $add->execute(array($TEN_SP, $SDT_SP, $TRANGTHAI, $EMAIL, $CCCD, $TENTK, $MATKHAU, $LOAITK));
        $idshipper = $this->connect->lastInsertId();

        $addDiachi = $this->connect->prepare("INSERT INTO diachi (TINH_TP, PHUONG_XA, DUONG_SONHA) 
        VALUES(?, ?, ?)");
        $addDiachi->execute(array($TINH_TP, $PHUONG_XA, $DUONG_SONHA));
        $idDiachi = $this->connect->lastInsertId();

        $addCua6 = $this->connect->prepare("INSERT INTO cua6 (ID_SP, ID_DC) VALUES (?, ?)");
        $addCua6->execute(array($idshipper, $idDiachi));

        return $add->rowCount() + $addDiachi->rowCount() + $addCua6->rowCount();
    }
    public function ShipDel($ID_SP)
    {
        $id = $this->connect->prepare("SELECT ID_DC FROM cua6 WHERE ID_SP = ?");
        $id->execute(array($ID_SP));
        $ID_DC_result = $id->fetch(PDO::FETCH_ASSOC);
        $ID_DC = $ID_DC_result['ID_DC'];

        $delCua6 = $this->connect->prepare("DELETE FROM cua6 WHERE ID_SP = ?");
        $delCua6->execute(array($ID_SP));

        $delDiachi = $this->connect->prepare("DELETE FROM diachi WHERE ID_DC = ?");
        $delDiachi->execute(array($ID_DC));

        $del = $this->connect->prepare("DELETE FROM shipper WHERE ID_SP = ? ");
        $del->execute(array($ID_SP));

        return $del->rowCount();
    }
    public function ShipUpdate($TEN_SP, $SDT_SP, $EMAIL, $CCCD, $TENTK, $MATKHAU, $LOAITK, $TINH_TP, $PHUONG_XA, $DUONG_SONHA, $ID_SP)
    {
        $update = $this->connect->prepare("UPDATE shipper SET TEN_SP = ?, SDT_SP = ?, EMAIL = ?, CCCD = ?, TENTK = ?, MATKHAU = ?, LOAITK = ? WHERE ID_SP = ? ");
        $update->execute(array($TEN_SP, $SDT_SP, $EMAIL, $CCCD, $TENTK, $MATKHAU, $LOAITK, $ID_SP));

        $updatedc = $this->connect->prepare("UPDATE diachi SET TINH_TP = ?, PHUONG_XA = ?, DUONG_SONHA = ? WHERE ID_DC IN (SELECT ID_DC FROM cua6 WHERE ID_SP = ?)");
        $updatedc->execute(array($TINH_TP, $PHUONG_XA, $DUONG_SONHA, $ID_SP));

        return $update->rowCount() + $updatedc->rowCount();
    }
    public function ShipGetById($ID_SP)
    {
        $getId = $this->connect->prepare("SELECT shipper.*, diachi.*
        FROM shipper
        INNER JOIN cua6 ON shipper.ID_SP = cua6.ID_SP
        INNER JOIN diachi ON cua6.ID_DC = diachi.ID_DC
        WHERE shipper.ID_SP = ?");
        $getId->setFetchMode(PDO::FETCH_OBJ);
        $getId->execute(array($ID_SP));
        return $getId->fetch();
    }
    public function ShipSetActive($ID_SP, $TRANGTHAI)
    {
        $update = $this->connect->prepare("UPDATE shipper SET TRANGTHAI = ? WHERE ID_SP = ? ");
        $update->execute(array($TRANGTHAI, $ID_SP));
        return $update->rowCount();
    }
    public function UserChangePassword($TENTK, $MATKHAU, $LOAITK, $MATKHAUNEW)
    {
        $selectMK = $this->connect->prepare(" SELECT password FROM shipper WHERE TENTK = ? and LOAITK = ? and TRANGTHAI = 'on' ");
        $selectMK->setFetchMode(PDO::FETCH_OBJ);
        $selectMK->execute(array($TENTK, $LOAITK));
        if (count($selectMK->fetch()) == 1) {
            $temp = $selectMK->fetch();
            if ($MATKHAU == $temp->MATKHAU) {
                $update = $this->connect->prepare(" UPDATE shipper SET MATKHAU = ? WHERE TENTK = ? and LOAITK = ? ");
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
        $select = $this->connect->prepare(" SELECT * FROM shipper WHERE TENTK = ? and MATKHAU = ? and LOAITK = ? and TRANGTHAI = 'on' ");
        $select->setFetchMode(PDO::FETCH_OBJ);
        $select->execute(array($TENTK, $MATKHAU, $LOAITK));
        if (count($select->fetchAll()) == 1) {
            return true;
        } else {
            return false;
        }
    }
}
