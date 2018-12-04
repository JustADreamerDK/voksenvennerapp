// Menu
var menu = document.querySelector(".menu");
var menuLille = document.querySelector(".menu-lille");


var showMenuBtn = document.querySelector("#showMenu");

showMenuBtn.addEventListener("click", function(event){
    menu.style.display = "block";
    menuLille.style.display = "none";
});

var closeMenuBtn = document.querySelector("#menuLuk");
closeMenuBtn.addEventListener("click", function(event){
    menu.style.display = "none";
    menuLille.style.display = "flex";
});

// Minimenu
var aabenMinimenu = document.querySelector(".minimenu");

var showMinimenuBtn = document.querySelector("#aaben");

showMinimenuBtn.addEventListener("click", function(event){
    aabenMinimenu.style.display = "block";
});

// Slideshow
// var slideIndex = 1;
//     showDivs(slideIndex);
//
//     function plusDivs(n) {
//       showDivs(slideIndex += n);
//     }
//
//     function showDivs(n) {
//       var i;
//       var x = document.getElementsByClassName("slide");
//       if (n > x.length) {slideIndex = 1}
//       if (n < 1) {slideIndex = x.length}
//       for (i = 0; i < x.length; i++) {
//          x[i].style.display = "none";
//       }
//       x[slideIndex-1].style.display = "block";
//     }
