<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý đơn hàng</title>
    <style>
    /* CSS cho giao diện */
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }

    h1 {
        text-align: center;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    .button {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 5px;
    }
    </style>
</head>

<body>

    <div class="container">
        <h1>Quản lý đơn hàng</h1>
        <table>
            <thead>
                <tr>
                    <th>Mã ĐH</th>
                    <th>Trạng thái</th>
                    <th>Trọng lượng</th>
                    <th>Mô tả</th>
                    <th>Tên hàng hóa</th>
                    <th>Thời gian tạo</th>
                    <th>Ghi chú</th>
                    <th>Kho</th>
                    <th>Shipper</th>
                    <th>Cửa hàng</th>
                </tr>
            </thead>
            <tbody>
                <!-- Dữ liệu từ bảng DONHANG được lặp lại ở đây -->
                <tr>
                    <td>MA_DH</td>
                    <td>TRANGTHAI</td>
                    <td>TRONGLUONG</td>
                    <td>MOTO</td>
                    <td>TEN_HH</td>
                    <td>THOIGIANTAO</td>
                    <td>GHICHU</td>
                    <td>TEN_KHO</td>
                    <td>TEN_SP</td>
                    <td>TEN_CH</td>
                </tr>
            </tbody>
        </table>
        <a href="#them_don_hang" class="button">Thêm đơn hàng mới</a>
    </div>

</body>

</html>