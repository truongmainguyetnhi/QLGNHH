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
        $getAll = $this->connect->prepare("SELECT * FROM cuahang");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        return $getAll->fetchAll();
    }
    public function StoreAdd($TEN_CH, $SDT_CH, $TRANGTHAI, $EMAIL, $TAIKHOAN, $TENTK, $MATKHAU, $LOAITK)
    {
        $add = $this->connect->prepare("INSERT INTO cuahang (TEN_CH, SDT_CH, TRANGTHAI, EMAIL, TAIKHOAN, TENTK, MATKHAU, LOAITK)
        VALUES(?, ?, ?, ?, ?, ?, ?, ?) ");
        $add->execute(array($TEN_CH, $SDT_CH, $TRANGTHAI, $EMAIL, $TAIKHOAN, $TENTK, $MATKHAU, $LOAITK));
        return $add->rowCount();
    }
    public function StoreDel($ID_CH)
    {
        $del = $this->connect->prepare("DELETE FROM cuahang WHERE ID_CH = ? ");
        $del->execute(array($ID_CH));
        return $del->rowCount();
    }
    public function StoreUpdate($TEN_CH, $SDT_CH, $EMAIL, $TAIKHOAN, $TENTK, $MATKHAU, $LOAITK, $ID_CH)
    {
        $update = $this->connect->prepare("UPDATE cuahang SET TEN_CH = ?, SDT_CH = ?, EMAIL = ?, TAIKHOAN = ?, TENTK = ?, MATKHAU = ?, LOAITK = ? WHERE ID_CH = ? ");
        $update->execute(array($TEN_CH, $SDT_CH, $EMAIL, $TAIKHOAN, $TENTK, $MATKHAU, $LOAITK, $ID_CH));
        return $update->rowCount();
    }
    public function StoreGetById($ID_CH)
    {
        $getId = $this->connect->prepare("SELECT * FROM cuahang WHERE ID_CH = ?");
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
}
