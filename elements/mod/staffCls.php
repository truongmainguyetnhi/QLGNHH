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
        $getAll = $this->connect->prepare("SELECT * FROM nhanvien");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        return $getAll->fetchAll();
    }
    public function staffAdd($TEN_NV, $SDT_NV, $EMAIL, $CCCD, $TENTK, $MATKHAU, $LOAITK, $TRANGTHAI)
    {
        $add = $this->connect->prepare("INSERT INTO nhanvien (TEN_NV, SDT_NV, EMAIL, CCCD, TENTK, MATKHAU, LOAITK, TRANGTHAI)
        VALUES(?, ?, ?, ?, ?, ?, ?, ?) ");
        $add->execute(array($TEN_NV, $SDT_NV, $EMAIL, $CCCD, $TENTK, $MATKHAU, $LOAITK, $TRANGTHAI));
        return $add->rowCount();
    }
    public function staffDel($ID_NV)
    {
        $del = $this->connect->prepare("DELETE FROM nhanvien WHERE ID_NV = ? ");
        $del->execute(array($ID_NV));
        return $del->rowCount();
    }
    public function staffUpdate($TEN_NV, $SDT_NV, $EMAIL, $CCCD, $TENTK, $MATKHAU, $LOAITK, $TRANGTHAI, $ID_NV)
    {
        $update = $this->connect->prepare("UPDATE nhanvien SET TEN_NV = ?, SDT_NV = ?, EMAIL = ?, CCCD = ?, TENTK = ?, MATKHAU = ?, LOAITK = ?, TRANGTHAI = ? WHERE ID_NV = ? ");
        $update->execute(array($TEN_NV, $SDT_NV, $EMAIL, $CCCD, $TENTK, $MATKHAU, $LOAITK, $TRANGTHAI, $ID_NV));
        return $update->rowCount();
    }
    public function staffGetById($ID_NV)
    {
        $getId = $this->connect->prepare("SELECT * FROM nhanvien WHERE ID_NV = ?");
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
}
