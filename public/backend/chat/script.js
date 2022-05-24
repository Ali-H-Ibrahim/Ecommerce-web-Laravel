$(document).ready(function () {
    $(".popup-bar").click(function () {
        $(".window-content-wrapper").toggle();
    });
    $(".window-content>.cc1").click(function () {
        $(".window-main").toggle();
    });
    $(".close-window-icon").click(function () {
        $(".window-main").hide();
    });
});
