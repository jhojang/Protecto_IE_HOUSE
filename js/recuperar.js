"use strict"

let form = document.querySelector("form");
const error = document.querySelector(".error");
let errores = "";

form.addEventListener("submit", (e) => {
    e.preventDefault();

    let email = document.querySelector("#email").value.trim();

    
    if (email.length == 0) {
        errores = "Por favor ingrese el correo electrónico";
    }

    if (errores.length > 0) {
        e.preventDefault();
        error.innerHTML = errores;
        document.querySelector("#email").focus();
    } else {

        const data = new FormData(form);
        fetch("../controller/recuperarController.php", {
            method: "POST",
            body: data
        })
        .then(respuesta => respuesta.json())
        .then(data => {
            console.log(data);
        })
    }

});