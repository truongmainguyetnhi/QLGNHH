$(document).ready(function() {
    //    alert("JS đã chạy");
    //});
    $("p").mouseenter(function() {
        $(this).css("color", "aqua");

    });
    $("p").mouseleave(function() {
        $(this).css("color", "black");
    });
    $(".cls01").mouseenter(function() {
        $(this).css("color", "orange");
    });
    $(".cls01").mouseleave(function() {
        $(this).css("color", "pink");
    });
    $("#id01").mouseenter(function() {
        $(this).css("font-weight", "bold");
    });
    $("#id01").mouseleave(function() {
        $(this).css("font-weight", "normal");
    });
});
//menu
$(".itemOrder").hide();
$(".cateOrder").click(function() {
    $(this).next().slideDown(300);
});
$(".itemOrder").mouseleave(function() {
    $(this).slideUp("fast");
});
//slide image
$(".imgcls").mouseover(function() {
    var s = $(this).attr('src');
    $("#imgView").attr('src', s);
});
var s = $("#DivList").children();
var l = s.length;
var i = 1;
setInterval(function() {
    if (i === l)
        i = 0;
    var p = $(s[i]).attr('src');
    $("#imgView").attr('src', p);
    i++;
}, 3000);
//jq ajax
$(".linkpage").click(function() {
    var v = $(this).attr('value');
    $("#getContent").load('./pageJS/' + v + '.php');
});
//Form
$("#formreg").submit(function() {
    var username = $("input[name*='username']").val();
    if (username.length === 0 || username.lenght < 6) {
        $("input[name*='username']").focus();
        $('#noteForm').html("Username chưa hợp lệ!");
        return false;
    }
    var password = $("input[name*='password']").val();
    if (password.length === 0 || password.lenght < 6) {
        $("input[name*='password']").focus();
        $('#noteForm').html("Password chưa hợp lệ!");
        return false;
    }
    var hoten = $("input[name*='hoten']").val();
    if (hoten.length === 0 || hoten.lenght < 6) {
        $("input[name*='hoten']").focus();
        $('#noteForm').html("Họ tên chưa hợp lệ!");
        return false;
    }
    var ngaysinh = $("input[name*='ngaysinh']").val();
    if (ngaysinh.length === 0) {
        $("input[name*='ngaysinh']").focus();
        $('#noteForm').html("Ngày sinh chưa hợp lệ!");
        return false;
    }
    var diachi = $("input[name*='diachi']").val();
    if (diachi.length === 0) {
        $("input[name*='diachi']").focus();
        $('#noteForm').html("Địa chỉ chưa hợp lệ!");
        return false;
    }
    var dienthoai = $("input[name*='dienthoai']").val();
    if (dienthoai.length === 0) {
        $("input[name*='dienthoai']").focus();
        $('#noteForm').html("Điện thoại chưa hợp lệ!");
        return false;
    }
    return true;
});
//btnupdate
$("temps").click(function() {
    var iduser = $(this).attr("value");
    $("#right_inner").load("./elements_TMNN/mUser/userUpdate.php?iduser=" + iduser);
});
//btnupdateloaihang
$("temploaihang").click(function() {
    var idloaihang = $(this).attr("value");
    $("#right_inner").load("./elements_TMNN/mLoaihang/loaihangUpdate.php?idloaihang=" + idloaihang);
});