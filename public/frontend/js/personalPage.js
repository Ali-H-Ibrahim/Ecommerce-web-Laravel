
// Get the button that opens the modal
var IDIdPer = document.getElementById("id-per");

// Get the <span> element that closes the modal
var CLASSClose = document.getElementsByClassName("close-info-modal")[0];

// When the user clicks the button, open the modal 
IDIdPer.onclick = function() {
    var modal = document.getElementById("myModal");
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
CLASSClose.onclick = function() {
    var modal = document.getElementById("myModal");
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    var modal = document.getElementById("myModal");
    if (event.target == modal) {
        modal.style.display = "none";
    }
}



function openANDclosePersonalInfo() {
    var v = document.getElementsByClassName("personal-info")[0];
    var c1 = document.getElementsByClassName("open-icon-person")[0];
    var c2 = document.getElementsByClassName("close-icon-person")[0];
    if(v.style.display === "block") {
        v.style.display = "none";
        c1.style.display = "block";
        c2.style.display = "none";
    }
    else {
        v.style.display = "block";
        c1.style.display = "none";
        c2.style.display = "block";
    }
        

}

function openANDcloseTypesOrder() {
    var v = document.getElementsByClassName("types-order")[0];
    var c1 = document.getElementsByClassName("open-icon-order")[0];
    var c2 = document.getElementsByClassName("close-icon-order")[0];
    if(v.style.display === "block") {
        v.style.display = "none";
        c1.style.display = "block";
        c2.style.display = "none";
    }
    else {
        v.style.display = "block";
        c1.style.display = "none";
        c2.style.display = "block";
    }
}