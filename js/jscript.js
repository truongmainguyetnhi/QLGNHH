const body = document.querySelector("body"),
    sidebar = body.querySelector(".sidebar"),
    toggle = body.querySelector(".toggle"),
    searchBtn = body.querySelector(".search-box"),
    modeSwitch = body.querySelector(".toggle-switch"),
    modeText = body.querySelector(".mode-text");

toggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");
});
modeSwitch.addEventListener("click", () => {
    body.classList.toggle("dark");
});
//btnupdate
$("temps").click(function() {
    var iduser = $(this).attr("value");
    $("#right_inner").load("./elements_TMNN/mUser/userUpdate.php?iduser=" + iduser);
});
//btnupdateloaihang
$("tempstore").click(function() {
    var idstore = $(this).attr("value");
    $("#center").load("./elements/mstore/storeUpdate.php?&idstore=" + idstore);
});