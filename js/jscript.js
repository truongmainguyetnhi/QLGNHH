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
    var idship = $(this).attr("value");
    $("#center").load("./elements/mshipper/shipperUpdate.php?&idship=" + idship);
});

/*$("form").submit(() => {
    alert("Thành công");
    swal("Are you sure you want to do this?", {
        buttons: ["Oh noez!", true],
    });
})*/
$(".xoa").click(() => {
    alert("ĐÃ XÓA");
})