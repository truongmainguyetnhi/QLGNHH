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
        btnOpenForm.innerText = 'Đóng form';
        isOpen = true;
    } else {
        bodyThem.style.display = 'none';
        btnOpenForm.innerText = 'Tạo đơn hàng mới';
        isOpen = false;
    }
});
//chọn thanh toán
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
        if (isNaN(tongtien)) {
            tongtienInput.value = 'Chưa điền số tiền';
        } else {
            tongtienInput.value = tongtien;
        }
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
                calculateTotal();
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
document.addEventListener("DOMContentLoaded", function() {
    document.querySelector('.nutdx').addEventListener('click', function() {
        window.location.href = 'login.php';
    });
});