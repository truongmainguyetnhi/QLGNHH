<?php
$s = 'database.php';
if (file_exists($s)) {
    $f = $s;
} else {
    $f = 'database.php';
}
require_once $f;
class packet extends Database
{
    public function packetGetAll()
    {
        $getAll = $this->connect->prepare("SELECT donhang.*, phai.*, thanhtoan.*, co.*, nguoinhan.*, cua1.*, diachi.*, cuahang.*, shipper.*
        FROM donhang 
        INNER JOIN phai ON donhang.ID_DH = phai.ID_DH 
        INNER JOIN thanhtoan ON phai.ID_TT = thanhtoan.ID_TT 
        INNER JOIN co ON thanhtoan.ID_TT = co.ID_TT 
        INNER JOIN nguoinhan ON co.ID_NN = nguoinhan.ID_NN 
        INNER JOIN cua1 ON nguoinhan.ID_NN = cua1.ID_NN
        INNER JOIN diachi ON cua1.ID_DC = diachi.ID_DC
        INNER JOIN cuahang ON donhang.ID_CH = cuahang.ID_CH 
        LEFT JOIN giao ON donhang.ID_DH = giao.ID_DH
        LEFT JOIN shipper ON giao.ID_SP = shipper.ID_SP
        WHERE giao.ID_SP IS NULL;");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        return $getAll->fetchAll();
    }
    public function packetGetAll2()
    {
        $getAll = $this->connect->prepare("SELECT donhang.*, phai.*, thanhtoan.*, co.*, nguoinhan.*, cua1.*, diachi.*, cuahang.*, shipper.*
        FROM donhang 
        INNER JOIN phai ON donhang.ID_DH = phai.ID_DH 
        INNER JOIN thanhtoan ON phai.ID_TT = thanhtoan.ID_TT 
        INNER JOIN co ON thanhtoan.ID_TT = co.ID_TT 
        INNER JOIN nguoinhan ON co.ID_NN = nguoinhan.ID_NN 
        INNER JOIN cua1 ON nguoinhan.ID_NN = cua1.ID_NN
        INNER JOIN diachi ON cua1.ID_DC = diachi.ID_DC
        INNER JOIN cuahang ON donhang.ID_CH = cuahang.ID_CH 
        LEFT JOIN giao ON donhang.ID_DH = giao.ID_DH
        LEFT JOIN shipper ON giao.ID_SP = shipper.ID_SP;");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        return $getAll->fetchAll();
    }
    public function packetGetforStore($TENTK)
    {
        $getAll = $this->connect->prepare("SELECT * FROM donhang 
        INNER JOIN phai ON donhang.ID_DH = phai.ID_DH 
        INNER JOIN thanhtoan ON phai.ID_TT = thanhtoan.ID_TT 
        INNER JOIN co ON thanhtoan.ID_TT = co.ID_TT 
        INNER JOIN nguoinhan ON co.ID_NN = nguoinhan.ID_NN 
        INNER JOIN cua1 ON nguoinhan.ID_NN = cua1.ID_NN
        INNER JOIN diachi ON cua1.ID_DC = diachi.ID_DC
        INNER JOIN cuahang ON donhang.ID_CH = cuahang.ID_CH
        LEFT JOIN giao ON donhang.ID_DH = giao.ID_DH 
        LEFT JOIN shipper ON giao.ID_SP = shipper.ID_SP
        WHERE cuahang.TENTK = ?");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute([$TENTK]);
        return $getAll->fetchAll();
    }
    public function packetGetforShipper($TENTK)
    {
        $getAll = $this->connect->prepare("SELECT * FROM donhang 
        INNER JOIN phai ON donhang.ID_DH = phai.ID_DH 
        INNER JOIN thanhtoan ON phai.ID_TT = thanhtoan.ID_TT 
        INNER JOIN co ON thanhtoan.ID_TT = co.ID_TT 
        INNER JOIN nguoinhan ON co.ID_NN = nguoinhan.ID_NN 
        INNER JOIN cua1 ON nguoinhan.ID_NN = cua1.ID_NN
        INNER JOIN diachi ON cua1.ID_DC = diachi.ID_DC
        INNER JOIN cuahang ON donhang.ID_CH = cuahang.ID_CH
        LEFT JOIN giao ON donhang.ID_DH = giao.ID_DH 
        LEFT JOIN shipper ON giao.ID_SP = shipper.ID_SP
        WHERE shipper.TENTK = ?");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute([$TENTK]);
        return $getAll->fetchAll();
    }
    public function donGetAll($noidung)
    {
        $getOrders = $this->connect->prepare("SELECT * FROM donhang 
INNER JOIN phai ON donhang.ID_DH = phai.ID_DH 
INNER JOIN thanhtoan ON phai.ID_TT = thanhtoan.ID_TT 
INNER JOIN co ON thanhtoan.ID_TT = co.ID_TT 
INNER JOIN nguoinhan ON co.ID_NN = nguoinhan.ID_NN 
INNER JOIN cuahang ON donhang.ID_CH = cuahang.ID_CH
LEFT JOIN giao ON donhang.ID_DH = giao.ID_DH 
LEFT JOIN shipper ON giao.ID_SP = shipper.ID_SP 
WHERE MA_DH LIKE :noidung");
        $getOrders->bindParam(':noidung', $noidung, PDO::PARAM_STR);
        $getOrders->setFetchMode(PDO::FETCH_OBJ);
        $getOrders->execute();
        return $getOrders->fetchAll();
    }


    public function packetAdd($TRANGTHAI_DH, $TRONGLUONG, $MOTA, $TEN_HH, $THOIGIANTAO, $GHICHU, $TEN_NN, $SDT_NN, $TINH_TP, $PHUONG_XA, $DUONG_SONHA, $HINHTHUC_TT, $PHISHIP, $THUHO, $TONGTIENHANG, $TENTK)
    {
        $addKH = $this->connect->prepare("INSERT INTO nguoinhan (TEN_NN, SDT_NN) VALUES (?, ?)");
        $addKH->execute(array($TEN_NN, $SDT_NN));
        $idKH = $this->connect->lastInsertId();

        $addDC = $this->connect->prepare("INSERT INTO diachi (TINH_TP, PHUONG_XA, DUONG_SONHA) VALUES (?, ?, ?)");
        $addDC->execute(array($TINH_TP, $PHUONG_XA, $DUONG_SONHA));
        $idDiachi = $this->connect->lastInsertId();

        $addTT = $this->connect->prepare("INSERT INTO thanhtoan (HINHTHUC_TT, PHISHIP, THUHO, TONGTIENHANG) VALUES (?, ?, ?, ?)");
        $addTT->execute(array($HINHTHUC_TT, $PHISHIP, $THUHO, $TONGTIENHANG));
        $idTT = $this->connect->lastInsertId();

        $addco = $this->connect->prepare("INSERT INTO co (ID_TT, ID_NN) VALUES (?, ?)");
        $addco->execute(array($idTT, $idKH));

        $addcua1 = $this->connect->prepare("INSERT INTO cua1 (ID_NN, ID_DC) VALUES (?, ?)");
        $addcua1->execute(array($idKH, $idDiachi));

        $getCH = $this->connect->prepare("SELECT ID_CH FROM cuahang WHERE TENTK = ?");
        $getCH->execute([$TENTK]);
        $idCH = $getCH->fetchColumn();

        // Lấy mã đơn hàng cuối cùng
        $get_last_order_code = $this->connect->prepare("SELECT MA_DH FROM donhang ORDER BY ID_DH DESC LIMIT 1");
        $get_last_order_code->execute();
        $last_order_code = $get_last_order_code->fetchColumn();

        // Hàm tăng giá trị của mã đơn hàng
        function tangmadh($last_order_code)
        {
            //chuyển chuỗi ma_dh thành số loại bỏ ký tự là chữ
            $madhcu = preg_replace("/[^0-9]/", "", $last_order_code);
            $sodh = substr($madhcu, 6); //lấy 7 số đuôi tăng giá trị
            $ntn = date('ymd'); //lấy 6 số ngày tháng năm
            $socuoimadhnew = intval($sodh) + 1; //tăng giá trị 
            $lapday = str_pad($socuoimadhnew, 7, '0', STR_PAD_LEFT); //thêm số 0 trước
            $madhnew = 'PNL' . $ntn .  $lapday;
            return $madhnew;
        }
        // Gọi hàm tăng giá trị của mã đơn hàng
        $MA_DH = tangmadh($last_order_code);

        $add = $this->connect->prepare("INSERT INTO donhang (MA_DH, TRANGTHAI_DH, TRONGLUONG, MOTA, TEN_HH, THOIGIANTAO, GHICHU, ID_CH) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $add->execute(array($MA_DH, $TRANGTHAI_DH, $TRONGLUONG, $MOTA, $TEN_HH, $THOIGIANTAO, $GHICHU, $idCH));
        $idDH = $this->connect->lastInsertId();

        $addphai = $this->connect->prepare("INSERT INTO phai (ID_DH, ID_TT) VALUES (?, ?)");
        $addphai->execute(array($idDH, $idTT));

        return $addKH->rowCount() + $addDC->rowCount() + $addTT->rowCount() + $addco->rowCount() + $addcua1->rowCount() + $add->rowCount() + $addphai->rowCount();
    }

    public function packetUpdate($TEN_SP, $ID_DH)
    {
        $getSP = $this->connect->prepare("SELECT ID_SP FROM shipper WHERE TEN_SP = ?");
        $getSP->execute([$TEN_SP]);
        $idSP = $getSP->fetchColumn();

        $insert = $this->connect->prepare("INSERT INTO giao (ID_DH, ID_SP) VALUES (?, ?)");
        $insert->execute([$ID_DH, $idSP]);

        return $insert->rowCount();
    }

    public function packetGetById($ID_DH)
    {
        $getId = $this->connect->prepare("SELECT * FROM donhang
        INNER JOIN phai ON donhang.ID_DH = phai.ID_DH 
        INNER JOIN thanhtoan ON phai.ID_TT = thanhtoan.ID_TT 
        INNER JOIN co ON thanhtoan.ID_TT = co.ID_TT 
        INNER JOIN nguoinhan ON co.ID_NN = nguoinhan.ID_NN 
        INNER JOIN cua1 ON nguoinhan.ID_NN = cua1.ID_NN
        INNER JOIN diachi ON cua1.ID_DC = diachi.ID_DC
        LEFT JOIN giao ON donhang.ID_DH = giao.ID_DH
        LEFT JOIN shipper ON giao.ID_SP = shipper.ID_SP
        WHERE donhang.ID_DH = ?");
        $getId->setFetchMode(PDO::FETCH_OBJ);
        $getId->execute(array($ID_DH));
        return $getId->fetch();
    }

    public function checkShipperExist($TEN_SP)
    {
        $getSP = $this->connect->prepare("SELECT ID_SP FROM shipper WHERE TEN_SP = ?");
        $getSP->execute([$TEN_SP]);
        return $getSP->fetchColumn();
    }
}
class shipper extends Database
{
    public function ShipGetAll()
    {
        $getAll = $this->connect->prepare("SELECT * FROM shipper INNER JOIN cua6 ON shipper.ID_SP = cua6.ID_SP INNER JOIN diachi ON cua6.ID_DC = diachi.ID_DC");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        return $getAll->fetchAll();
    }
}
