
function openOrderAll() {
    var v1 = document.getElementsByClassName("table-orders-all")[0];
    v1.style.display = "block";

    var v2 = document.getElementsByClassName("table-orders-received")[0];
    v2.style.display = "none";

    var v3 = document.getElementsByClassName("table-orders-shipping")[0];
    v3.style.display = "none";

    var v4 = document.getElementsByClassName("table-orders-return")[0];
    v4.style.display = "none";
    
    
    //////////////////////////////// color

    v1 = document.getElementsByClassName("all-order")[0];
    v1.style.background = "#fc9e57";
    v1.style.color = "black";
    
    v2 = document.getElementsByClassName("recived-order")[0];
    v2.style.background = "#537ec8";
    v2.style.color = "white";
    
    v3 = document.getElementsByClassName("shipping-order")[0];
    v3.style.background = "#537ec8";
    v3.style.color = "white";
    
    v4 = document.getElementsByClassName("return-order")[0];
    v4.style.background = "#537ec8";
    v4.style.color = "white";
}

function openOrderReceived() {
    var v1 = document.getElementsByClassName("table-orders-all")[0];
    v1.style.display = "none";

    var v2 = document.getElementsByClassName("table-orders-received")[0];
    v2.style.display = "block";

    var v3 = document.getElementsByClassName("table-orders-shipping")[0];
    v3.style.display = "none";

    var v4 = document.getElementsByClassName("table-orders-return")[0];
    v4.style.display = "none";

    //////////////////////////////// color

    v1 = document.getElementsByClassName("all-order")[0];
    v1.style.background = "#537ec8";
    v1.style.color = "white";
    
    v2 = document.getElementsByClassName("recived-order")[0];
    v2.style.background = "#fc9e57";
    v2.style.color = "black";
    
    v3 = document.getElementsByClassName("shipping-order")[0];
    v3.style.background = "#537ec8";
    v3.style.color = "white";
    
    v4 = document.getElementsByClassName("return-order")[0];
    v4.style.background = "#537ec8";
    v4.style.color = "white";
}

function openOrderShipping() {
    var v1 = document.getElementsByClassName("table-orders-all")[0];
    v1.style.display = "none";

    var v2 = document.getElementsByClassName("table-orders-received")[0];
    v2.style.display = "none";

    var v3 = document.getElementsByClassName("table-orders-shipping")[0];
    v3.style.display = "block";

    var v4 = document.getElementsByClassName("table-orders-return")[0];
    v4.style.display = "none";

    //////////////////////////////// color

    v1 = document.getElementsByClassName("all-order")[0];
    v1.style.background = "#537ec8";
    v1.style.color = "white";
    
    v2 = document.getElementsByClassName("recived-order")[0];
    v2.style.background = "#537ec8";
    v2.style.color = "white";
    
    v3 = document.getElementsByClassName("shipping-order")[0];
    v3.style.background = "#fc9e57";
    v3.style.color = "black";
    
    v4 = document.getElementsByClassName("return-order")[0];
    v4.style.background = "#537ec8";
    v4.style.color = "white";
}

function openOrderReturn() {
    var v1 = document.getElementsByClassName("table-orders-all")[0];
    v1.style.display = "none";

    var v2 = document.getElementsByClassName("table-orders-received")[0];
    v2.style.display = "none";

    var v3 = document.getElementsByClassName("table-orders-shipping")[0];
    v3.style.display = "none";

    var v4 = document.getElementsByClassName("table-orders-return")[0];
    v4.style.display = "block";

    //////////////////////////////// color

    v1 = document.getElementsByClassName("all-order")[0];
    v1.style.background = "#537ec8";
    v1.style.color = "white";
    
    v2 = document.getElementsByClassName("recived-order")[0];
    v2.style.background = "#537ec8";
    v2.style.color = "white";
    
    v3 = document.getElementsByClassName("shipping-order")[0];
    v3.style.background = "#537ec8";
    v2.style.color = "white";
    
    v4 = document.getElementsByClassName("return-order")[0];
    v4.style.background = "#fc9e57";
    v4.style.color = "black";
}


//////////////////////////////////////////////// Mobile

function openOrderAllMobile() {
    var v = document.getElementsByClassName("table-mobile-orders-all")[0];
    var v1 = document.getElementsByClassName("open-order-all")[0];
    var v2 = document.getElementsByClassName("close-order-all")[0];
    if(v.style.display === "none") {
        v.style.display = "block";
        v1.style.display = "none";
        v2.style.display = "block";
    }
    else {
        v.style.display = "none";
        v1.style.display = "block";
        v2.style.display = "none";
    }
}

function openOrderReceivedMobile() {
    var v = document.getElementsByClassName("table-mobile-orders-received")[0];
    var v1 = document.getElementsByClassName("open-recived-order")[0];
    var v2 = document.getElementsByClassName("close-recived-order")[0];
    if(v.style.display === "none") {
        v.style.display = "block";
        v1.style.display = "none";
        v2.style.display = "block";
    }
    else {
        v.style.display = "none";
        v1.style.display = "block";
        v2.style.display = "none";
    }
}

function openOrderShippingMobile() {
    var v = document.getElementsByClassName("table-mobile-orders-shipping")[0];
    var v1 = document.getElementsByClassName("open-shipping-order")[0];
    var v2 = document.getElementsByClassName("close-shipping-order")[0];
    if(v.style.display === "none") {
        v.style.display = "block";
        v1.style.display = "none";
        v2.style.display = "block";
    }
    else {
        v.style.display = "none";
        v1.style.display = "block";
        v2.style.display = "none";
    }
}

function openOrderReturnMobile() {
    var v = document.getElementsByClassName("table-mobile-orders-return")[0];
    var v1 = document.getElementsByClassName("open-return-order")[0];
    var v2 = document.getElementsByClassName("close-return-order")[0];
    if(v.style.display === "none") {
        v.style.display = "block";
        v1.style.display = "none";
        v2.style.display = "block";
    }
    else {
        v.style.display = "none";
        v1.style.display = "block";
        v2.style.display = "none";
    }
}