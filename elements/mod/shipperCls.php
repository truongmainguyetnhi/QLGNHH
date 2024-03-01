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
        $getAll = $this->connect->prepare("SELECT * FROM shipper");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        return $getAll->fetchAll();
    }
    public function ShipAdd($TEN_SP, $SDT_SP, $TRANGTHAI, $EMAIL, $CCCD, $TENTK, $MATKHAU, $LOAITK)
    {
        $add = $this->connect->prepare("INSERT INTO shipper (TEN_SP, SDT_SP, TRANGTHAI, EMAIL, CCCD, TENTK, MATKHAU, LOAITK)
        VALUES(?, ?, ?, ?, ?, ?, ?, ?) ");
        $add->execute(array($TEN_SP, $SDT_SP, $TRANGTHAI, $EMAIL, $CCCD, $TENTK, $MATKHAU, $LOAITK));
        return $add->rowCount();
    }
    public function ShipDel($ID_SP)
    {
        $del = $this->connect->prepare("DELETE FROM shipper WHERE ID_SP = ? ");
        $del->execute(array($ID_SP));
        return $del->rowCount();
    }
    public function ShipUpdate($TEN_SP, $SDT_SP, $EMAIL, $CCCD, $TENTK, $MATKHAU, $LOAITK, $ID_SP)
    {
        $update = $this->connect->prepare("UPDATE shipper SET TEN_SP = ?, SDT_SP = ?, EMAIL = ?, CCCD = ?, TENTK = ?, MATKHAU = ?, LOAITK = ? WHERE ID_SP = ? ");
        $update->execute(array($TEN_SP, $SDT_SP, $EMAIL, $CCCD, $TENTK, $MATKHAU, $LOAITK, $ID_SP));
        return $update->rowCount();
    }
    public function ShipGetById($ID_SP)
    {
        $getId = $this->connect->prepare("SELECT * FROM shipper WHERE ID_SP = ?");
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
}
