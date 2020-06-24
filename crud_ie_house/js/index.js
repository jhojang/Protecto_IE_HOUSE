let boton_menu = document.querySelector(".boton_menu i");
let small_screen = document.querySelector(".small_screen");
let out_menu = document.querySelector(".out_menu");

let flag = false;

boton_menu.addEventListener("click", function(){
    
    if (flag == false) {
        small_screen.style.transform = "translateX(0%)";
        flag = true;
        out_menu.style.display = "block";
    } else {
        small_screen.style.transform = "translateX(-100%)";
        out_menu.style.display = "none";
        flag = false;
    }
    
});

out_menu.addEventListener("click", function(){
    small_screen.style.transform = "translateX(-100%)";
        out_menu.style.display = "none";
        flag = false;
});

window.addEventListener("resize", function(){
    if (screen.width > 768) {
        small_screen.style.transform = "translateX(-100%)";
        flag = false;
    }
});