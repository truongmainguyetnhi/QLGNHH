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