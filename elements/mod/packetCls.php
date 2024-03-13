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
        $getAll = $this->connect->prepare("SELECT * FROM donhang 
        INNER JOIN phai ON donhang.ID_DH = phai.ID_DH 
        INNER JOIN thanhtoan ON phai.ID_TT = thanhtoan.ID_TT 
        INNER JOIN co ON thanhtoan.ID_TT = co.ID_TT 
        INNER JOIN nguoinhan ON co.ID_NN = nguoinhan.ID_NN 
        LEFT JOIN giao ON donhang.ID_DH = giao.ID_DH 
        LEFT JOIN shipper ON giao.ID_SP = shipper.ID_SP");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        return $getAll->fetchAll();
    }
    public function packetAdd($TRANGTHAI, $TRONGLUONG, $MOTA, $TEN_HH, $THOIGIANTAO, $GHICHU, $TEN_NN, $SDT_NN, $TINH_TP, $PHUONG_XA, $DUONG_SONHA, $HINHTHUC_TT, $PHISHIP, $THUHO, $TONGTIENHANG, $TENTK)
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

        $add = $this->connect->prepare("INSERT INTO donhang (MA_DH, TRANGTHAI, TRONGLUONG, MOTA, TEN_HH, THOIGIANTAO, GHICHU, ID_CH) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $add->execute(array($MA_DH, $TRANGTHAI, $TRONGLUONG, $MOTA, $TEN_HH, $THOIGIANTAO, $GHICHU, $idCH));
        $idDH = $this->connect->lastInsertId();

        $addphai = $this->connect->prepare("INSERT INTO phai (ID_DH, ID_TT) VALUES (?, ?)");
        $addphai->execute(array($idDH, $idTT));

        return $addKH->rowCount() + $addDC->rowCount() + $addTT->rowCount() + $addco->rowCount() + $addcua1->rowCount() + $add->rowCount() + $addphai->rowCount();
    }


    public function packetDel($ID_NV)
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

    public function packetUpdate($TEN_NV, $SDT_NV, $EMAIL, $CCCD, $TENTK, $MATKHAU, $LOAITK, $TINH_TP, $PHUONG_XA, $DUONG_SONHA, $NGAYNHAP, $ID_NV)
    {
        $update = $this->connect->prepare("UPDATE nhanvien SET TEN_NV = ?, SDT_NV = ?, EMAIL = ?, CCCD = ?, TENTK = ?, MATKHAU = ?, LOAITK = ? WHERE ID_NV = ? ");
        $update->execute(array($TEN_NV, $SDT_NV, $EMAIL, $CCCD, $TENTK, $MATKHAU, $LOAITK, $ID_NV));

        $updatedc = $this->connect->prepare("UPDATE diachi SET TINH_TP = ?, PHUONG_XA = ?, DUONG_SONHA = ? WHERE ID_DC IN (SELECT ID_DC FROM cua3 WHERE ID_NV = ?)");
        $updatedc->execute(array($TINH_TP, $PHUONG_XA, $DUONG_SONHA, $ID_NV));

        $updatengay = $this->connect->prepare("UPDATE cua3 SET NGAYNHAP = ? WHERE ID_NV = ?");
        $updatengay->execute(array($NGAYNHAP, $ID_NV));

        return $update->rowCount() + $updatedc->rowCount() + $updatengay->rowCount();
    }
    public function packetGetById($ID_NV)
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
    public function packetSetActive($ID_NV, $TRANGTHAI)
    {
        $update = $this->connect->prepare("UPDATE nhanvien SET TRANGTHAI = ? WHERE ID_NV = ? ");
        $update->execute(array($TRANGTHAI, $ID_NV));
        return $update->rowCount();
    }
}
