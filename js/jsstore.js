document.getElementById('btnOpenForm').addEventListener('click', function() {
    var bodyThem = document.querySelector('.body_them');

    if (bodyThem.style.display === 'none') {
        bodyThem.style.display = 'block';
    } else {
        bodyThem.style.display = 'none';
    }
});
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
//tính tổng tiền hàng
document.addEventListener('DOMContentLoaded', () => {
    var phishipInputs = document.querySelectorAll('input[name="loaiphiship"]');
    var phithuhoInput = document.getElementById('phithuho');
    var tongtienInput = document.getElementById('tongtien');
    var thanhtoanInputs = document.querySelectorAll('input[name="loaithanhtoan"]');
    //money
    calculateTotal();
    phishipInputs.forEach((radio) => {
        radio.addEventListener('input', () => {
            calculateTotal();
        });
    });
    phithuhoInput.addEventListener('input', () => {
        calculateTotal();
    });

    function calculateTotal() {
        var phiship = 0;
        phishipInputs.forEach((radio) => {
            if (radio.checked) {
                phiship = parseFloat(radio.value);
            }
        });
        var phithuho = parseFloat(phithuhoInput.value);
        var tongtien = phiship + phithuho;
        tongtienInput.value = tongtien;
    }
    //online
    thanhtoanInputs.forEach((radio) => {
        radio.addEventListener('change', function() {
            if (this.value === 'Chuyển khoản') {
                phishipInputs.forEach(input => {
                    if (input.value === '0') {
                        input.checked = true;
                    } else {
                        input.checked = false;
                    }
                    input.disabled = true;
                });
                phithuhoInput.value = '0';
                phithuhoInput.disabled = true;
                tongtienInput.value = '0';
                truTienKhoiTaiKhoan(30000);
            } else {
                phishipInputs.forEach(input => {
                    input.disabled = false;
                    phithuhoInput.disabled = false;
                })
            }
        });
    });

    // Hàm để trừ tiền từ tài khoản của cửa hàng
    function truTienKhoiTaiKhoan(soTien) {
        // Thực hiện logic để trừ tiền từ tài khoản của cửa hàng ở đây
        // Ví dụ: gửi yêu cầu AJAX hoặc gọi hàm xử lý trên server
        console.log('Trừ ' + soTien + ' từ tài khoản của cửa hàng');
    }
});