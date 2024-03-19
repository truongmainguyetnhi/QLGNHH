<?php
$s = 'database.php';
if (file_exists($s)) {
    $f = $s;
} else {
    $f = 'database.php';
}
require_once $f;
class kho extends Database
{
    public function khoGetAll()
    {
        $getAll = $this->connect->prepare("SELECT * FROM kho INNER JOIN diachi ON kho.ID_DC = diachi.ID_DC ");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        return $getAll->fetchAll();
    }
    public function khoAdd($TEN_KHO, $TRANGTHAI_KHO, $TINH_TP, $PHUONG_XA, $DUONG_SONHA)
    {
        $addDiachi = $this->connect->prepare("INSERT INTO diachi (TINH_TP, PHUONG_XA, DUONG_SONHA) 
        VALUES(?, ?, ?)");
        $addDiachi->execute(array($TINH_TP, $PHUONG_XA, $DUONG_SONHA));
        $idDiachi = $this->connect->lastInsertId();

        $add = $this->connect->prepare("INSERT INTO kho (TEN_KHO, TRANGTHAI_KHO, ID_DC)
        VALUES(?, ?, ?) ");
        $add->execute(array($TEN_KHO, $TRANGTHAI_KHO, $idDiachi));

        return $add->rowCount() + $addDiachi->rowCount();
    }

    public function khoSetActive($ID_KHO, $TRANGTHAI_KHO)
    {
        $update = $this->connect->prepare("UPDATE kho SET TRANGTHAI_KHO = ? WHERE ID_KHO = ? ");
        $update->execute(array($TRANGTHAI_KHO, $ID_KHO));
        return $update->rowCount();
    }
}
