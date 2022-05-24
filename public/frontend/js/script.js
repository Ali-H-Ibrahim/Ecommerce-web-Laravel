const imgs = document.querySelectorAll('.img-select a');
const imgBtns = [...imgs];
let imgId = 1;

imgBtns.forEach((imgItem) => {
    imgItem.addEventListener('click', (event) => {
        event.preventDefault();
        imgId = imgItem.dataset.id;
        slideImage();
    });
});

function slideImage() {
    const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;

    document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
}

window.addEventListener('resize', slideImage);

////////////////////////////////////////

const sizes = document.querySelectorAll('.size');
const colors = document.querySelectorAll('.color');

let prevColor = "blue";
let animationEnd = true;

function changeSize() {
    sizes.forEach(size => size.classList.remove('active'));
    this.classList.add('active');
}

function changeColor() {


    colors.forEach(color => color.classList.remove('active'));
    this.classList.add('active');
    prevColor = color;



}


sizes.forEach(size => size.addEventListener('click', changeSize));
colors.forEach(c => c.addEventListener('click', changeColor));

let x = window.matchMedia("(max-width: 1000px)");




const viewBtn = document.querySelector(".view-modal"),
    popup = document.querySelector(".popup"),
    close = popup.querySelector(".close"),
    field = popup.querySelector(".field"),
    input = field.querySelector("input"),
    copy = field.querySelector("button");

viewBtn.onclick = () => {
    popup.classList.toggle("show");
}
close.onclick = () => {
    viewBtn.click();
}

copy.onclick = () => {
    input.select(); //select input value
    if (document.execCommand("copy")) { //if the selected text copy
        field.classList.add("active");
        copy.innerText = "Copied";
        setTimeout(() => {
            window.getSelection().removeAllRanges(); //remove selection from document
            field.classList.remove("active");
            copy.innerText = "Copy";
        }, 3000);
    }
}
