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
$(".koxoa").click(() => {
    alert("KHÔNG THỂ XÓA bằng tài khoản này");
})
$(".koup").click(() => {
    alert("KHÔNG THỂ UPDATE bằng tài khoản này");
})
$(".kolock").click(() => {
    alert("KHÔNG THỂ THAY ĐỔI bằng tài khoản này");
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
    var ionIcon = document.querySelector('#btnOpenForm ion-icon');

    if (!isOpen) {
        bodyThem.style.display = 'block';
        ionIcon.setAttribute('name', 'close');
        isOpen = true;
    } else {
        bodyThem.style.display = 'none';
        ionIcon.setAttribute('name', 'add');
        isOpen = false;
    }
});