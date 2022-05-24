
const sizes = document.querySelectorAll('.size');
const colors = document.querySelectorAll('.color');


let animationEnd = true;

function changeSize() {
    sizes.forEach(size => size.classList.remove('active'));
    this.classList.add('active');
}

function changeColor() {

    colors.forEach(color => color.classList.remove('active'));
    this.classList.add('active');


}


sizes.forEach(size => size.addEventListener('click', changeSize));
colors.forEach(c => c.addEventListener('click', changeColor));

let x = window.matchMedia("(max-width: 1000px)");


// Product Detail Slider
$('.product-slider-single').slick({
    infinite: true,
    autoplay: true,
    dots: false,
    fade: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    asNavFor: '.product-slider-single-nav'
});
$('.product-slider-single-nav').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    dots: false,
    centerMode: true,
    focusOnSelect: true,
    asNavFor: '.product-slider-single'
});

//follow button
$(document).ready(function () {

    $("#follow-button").click(function () {
        if ($("#follow-button").text() == "+ Follow") {
            // *** State Change: To Following ***      
            // We want the button to squish (or shrink) by 10px as a reaction to the click and for it to last 100ms    
            $("#follow-button").animate({ width: '-=10px' }, 100, 'easeInCubic', function () { });

            // then now we want the button to expand out to it's full state
            // The left translation is to keep the button centred with it's longer width
            $("#follow-button").animate({ width: '+=45px', left: '-=15px' }, 600, 'easeInOutBack', function () {
                $("#follow-button").css("color", "#3399FF");
                $("#follow-button").text("Following");

                // Animate the background transition from white to green. Using JQuery Color
                $("#follow-button").animate({
                    backgroundColor: "#2EB82E",
                    borderColor: "#2EB82E"
                }, 1000);
            });
        } else {

            // *** State Change: Unfollow ***     
            // Change the button back to it's original state
            $("#follow-button").animate({ width: '-=25px', left: '+=15px' }, 600, 'easeInOutBack', function () {
                $("#follow-button").text("+ Follow");
                $("#follow-button").css("color", "#3399FF");
                $("#follow-button").css("background-color", "#ffffff");
                $("#follow-button").css("border-color", "#3399FF");
            });
        }
    });
});