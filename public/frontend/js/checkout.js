
// Shipping address show hide
$('.checkout #payment-1').change(function () {
    if ($(this).is(':checked')) {
        $('.checkout .shipping-address').slideDown();
    }
});
$('.checkout #payment-2').change(function () {
    if ($(this).is(':checked')) {

        $('.checkout .shipping-address').slideUp();
    }
});

$('.show-btn').click(function () {
    $('.modal').toggleClass("show");
    $('.show-btn').addClass("disabled");
});
$('.close-icon').click(function () {
    $('.modal').toggleClass("show");
    $('.show-btn').removeClass("disabled");
});
$('.close-btn').click(function () {
    $('.modal').toggleClass("show");
    $('.show-btn').removeClass("disabled");
});
//alert
var ALERT_TITLE = "The Transaction Was Completed";
var ALERT_BUTTON_TEXT = "Ok";

if (document.getElementById) {
    window.alert = function (txt) {
        createCustomAlert(txt);
    }
}


function createCustomAlert(txt) {
    d = document;

    if (d.getElementById("modalContainer")) return;

    mObj = d.getElementsByTagName("body")[0].appendChild(d.createElement("div"));
    mObj.id = "modalContainer";
    mObj.style.height = d.documentElement.scrollHeight + "px";

    alertObj = mObj.appendChild(d.createElement("div"));
    alertObj.id = "alertBox";
    if (d.all && !window.opera) alertObj.style.top = document.documentElement.scrollTop + "px";
    alertObj.style.left = (d.documentElement.scrollWidth - alertObj.offsetWidth) / 2 + "px";
    alertObj.style.visiblity = "visible";

    h1 = alertObj.appendChild(d.createElement("h1"));
    h1.appendChild(d.createTextNode(ALERT_TITLE));

    msg = alertObj.appendChild(d.createElement("p"));
    //msg.appendChild(d.createTextNode(txt));
    msg.innerHTML = txt;

    btn = alertObj.appendChild(d.createElement("a"));
    btn.id = "closeBtn";
    btn.appendChild(d.createTextNode(ALERT_BUTTON_TEXT));
    btn.href = "#";
    btn.focus();
    btn.onclick = function () { removeCustomAlert(); return false; }

    alertObj.style.display = "block";

}

function removeCustomAlert() {
    document.getElementsByTagName("body")[0].removeChild(document.getElementById("modalContainer"));
}
function ful() {
    alert('Alert this pages');
}

// payment-button
const btn = document.querySelector(".place-order");

btn.addEventListener("click", () => {
    btn.classList.remove("place-order--default");
    btn.classList.add("place-order--placing");
    setTimeout(() => {
        btn.classList.remove("place-order--placing");
        btn.classList.add("place-order--done");
    }, 4000);
    setTimeout(() => {
        btn.classList.remove("place-order--done");
        btn.classList.add("place-order--default");
    }, 6000);
})




