// Khai báo biến isOpen để theo dõi trạng thái mở / đóng của form
var isOpen = false;

// Lắng nghe sự kiện "click" trên phần tử có id là "btnOpenForm"
document.getElementById('btnOpenForm').addEventListener('click', function() {
    var bodyThem = document.querySelector('.body_them');
    var ionIcon = document.querySelector('#btnOpenForm ion-icon');

    // Nếu form đang được đóng, mở nó và thay đổi biểu tượng
    if (!isOpen) {
        bodyThem.style.display = 'block';
        ionIcon.setAttribute('name', 'close');
        isOpen = true;
    } else {
        // Nếu form đang mở, đóng nó và thay đổi biểu tượng
        bodyThem.style.display = 'none';
        ionIcon.setAttribute('name', 'add');
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

});
document.addEventListener("DOMContentLoaded", function() {
    document.querySelector('.nutdx').addEventListener('click', function() {
        window.location.href = 'login.php';
    });
});



//btnupdate
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
$(".koxoa").click(() => {
    alert("KHÔNG THỂ XÓA bằng tài khoản này");
})
$(".koup").click(() => {
    alert("KHÔNG THỂ UPDATE bằng tài khoản này");
})
$(".kolock").click(() => {
    alert("KHÔNG THỂ THAY ĐỔI bằng tài khoản này");
})