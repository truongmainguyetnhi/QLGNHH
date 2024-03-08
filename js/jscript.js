const body = document.querySelector("body"),
    sidebar = body.querySelector(".sidebar"),
    toggle = body.querySelector(".toggle"),
    searchBtn = body.querySelector(".search-box"),
    modeSwitch = body.querySelector(".toggle-switch"),
    modeText = body.querySelector(".mode-text");

toggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");
});
searchBtn.addEventListener("click", () => {
    sidebar.classList.remove("close");
});
modeSwitch.addEventListener("click", () => {
    body.classList.toggle("dark");
    if (body.classList.contains("dark")) {
        modeText.innerText = "Light"
    } else {
        modeText.innerText = "Dark"

    }
});
//btnupdate
$("temps").click(function() {
    var iduser = $(this).attr("value");
    $("#right_inner").load("./elements_TMNN/mUser/userUpdate.php?iduser=" + iduser);
});
//btnupdatestore
$("tempstore").click(function() {
    var idstore = $(this).attr("value");
    $("#center").load("./elements/mstore/storeUpdate.php?&idstore=" + idstore);
});
$("tempship").click(function() {
    var idship = $(this).attr("value");
    $("#center").load("./elements/mshipper/shipperUpdate.php?&idship=" + idship);
});
$("tempstaff").click(function() {
    var idstaff = $(this).attr("value");
    $("#center").load("./elements/mstaff/staffUpdate.php?&idstaff=" + idstaff);
});
$("temppacket").click(function() {
    var idpacket = $(this).attr("value");
    $("#center").load("./elements/mpacket/packetUpdate.php?&idpacket=" + idpacket);
});
$(".xoa").click(() => {
    alert("ĐÃ XÓA");
})

//Mở form
document.getElementById('btnOpenForm').addEventListener('click', function() {
    var bodyThem = document.querySelector('.body_them');

    if (bodyThem.style.display === 'none') {
        bodyThem.style.display = 'block';
    } else {
        bodyThem.style.display = 'none';
    }
});


//Thay dổi nhãn
var isOpen = false;
document.getElementById('btnOpenForm').addEventListener('click', function() {
    var bodyThem = document.querySelector('.body_them');
    var btnOpenForm = document.getElementById('btnOpenForm');

    if (!isOpen) {
        bodyThem.style.display = 'block';
        btnOpenForm.innerText = 'CLOSE';
        isOpen = true;
    } else {
        bodyThem.style.display = 'none';
        btnOpenForm.innerText = 'ADD NEW';
        isOpen = false;
    }
});

// Hàm tạo mã đơn hàng tự động
function generateOrderCode(orderCount) {
    // Lấy ngày hiện tại
    var date = new Date();
    var year = date.getFullYear().toString().substr(-2); // Lấy hai số cuối của năm
    var month = ('0' + (date.getMonth() + 1)).slice(-2); // Lấy tháng, có thể thêm 1 vì tháng bắt đầu từ 0
    var day = ('0' + date.getDate()).slice(-2); // Lấy ngày

    // Tạo số thứ tự với 7 chữ số
    var paddedNumber = ('0000000' + orderCount).slice(-7); // Chèn số 0 vào phía trước để có 7 chữ số

    // Kết hợp thành mã đơn hàng
    var orderCode = 'PNL' + year + month + day + paddedNumber;

    return orderCode;
}

// Số thứ tự ban đầu
var orderCount = 1;

// Gán mã đơn hàng cho input khi trang được tải
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('mapacket').value = generateOrderCode(orderCount);
    orderCount += 1;
});

//login

document.getElementById('nhilogin').addEventListener('submit', function(e) {
    // Ngăn chặn hành vi mặc định của form
    e.preventDefault();

    // Kiểm tra logic đăng nhập ở đây
    // Nếu đăng nhập đúng, hiển thị thông báo
    var isLoginSuccessful = true; // Thay bằng logic kiểm tra đăng nhập của bạn

    if (isLoginSuccessful) {
        alert('Đăng nhập thành công!');
        var radioValue = document.querySelector('input[name="loaitk"]:checked').value;
        if (radioValue === 'Nhân viên' || radioValue === 'Quản lý') {
            this.action = 'elements/mstaff/staffAct.php?reqact=checklogin';
        } else if (radioValue === 'Cửa hàng') {
            this.action = 'elements/mstore/storeAct.php?reqact=checklogin';
        } else if (radioValue === 'Shipper') {
            this.action = 'elements/mshipper/shipperAct.php?reqact=checklogin';
        }
    } else {
        alert('Đăng nhập không thành công!');

    }
    this.submit();
});