$(document).ready(function () {


    $(".icon_wrap").click(function () {
        $(this).parent().toggleClass("active");

    });

    $(".show_all .link").click(function () {
        $(".notifications").removeClass("active");
        $(".popup").show();
    });

    $(".close").click(function () {
        $(".popup").hide();
    });
});

document.addEventListener('mouseup', function(e) {
    var container = document.getElementById('popup-id');
    if (!container.contains(e.target)) {
        container.style.display = 'none';
    }
});

document.addEventListener('mouseup', function(e) {
    var container = document.getElementById('popup-id-2');
    if (!container.contains(e.target)) {
        container.style.display = 'none';
    }
});