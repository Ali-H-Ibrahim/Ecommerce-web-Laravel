
//slideshow

$(function () {
    'use strict'
    var winH = $(window).height();
    $('.slider-head, .carousel-item').height(winH);



});
//for smart mobile phone
$('.small-image img').click(function () {

    $(this).addClass('image-active').siblings().removeClass('image-active');

    let image = $(this).attr('src');

    $('.big-image img').attr('src', image);
});







function openSideNav() {
    document.getElementById("mySidenav").style.width = "250px";
}
function closeSideNav() {
    document.getElementById("mySidenav").style.width = "0";
}


function openSearchNav() {
    document.getElementById("mySearchnav").style.width = "100%";
}
function closeSearchNav() {
    document.getElementById("mySearchnav").style.width = "0";
}


function openCategoryNav() {
    document.getElementsByClassName("category-nav")[0].style.width = "100%";
}
function closeCategoryNav() {
    document.getElementsByClassName("category-nav")[0].style.width = "0";
}

// drop down header lap
$(document).ready(function(){
    $('.dropdown-submenu a.test').on("click", function(e){
      $(this).next('ul').toggle();
      e.stopPropagation();
      e.preventDefault();
    });
  });