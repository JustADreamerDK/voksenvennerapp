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
