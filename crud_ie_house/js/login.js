"use strict"

let form = document.querySelector("form");
let inputs = document.querySelectorAll("input");
let error = document.querySelectorAll(".error");
let errores = [];

inputs[0].focus();


for (let i = 0; i < inputs.length - 1; i++) {
    inputs[i].addEventListener("keypress", function(e) {
        if (e.keyCode == 13) {
            e.preventDefault();
            inputs[i+1].focus();
        } else {
            error[i].style.display = "none";
            inputs[i].style.borderBottom = "3px solid #385898";
            inputs[i].style.marginTop = "7px";
            inputs[i].style.marginBottom = "7px";
        }
    });
}


form.addEventListener("submit", function(e){
    e.preventDefault();
    
    let usuario = (document.querySelector("#usuario").value).trim();
    let pass = (document.querySelector("#pass").value).trim();


    if (usuario.length == 0) {
        errores[0] = "Por favor ingrese un nombre de usuario";
    } 

    if (pass.length == 0) {
        errores[1] = "Por favor ingrese una contraseña";
    }

    
    if (errores.length > 0) {
        
        console.log(error);
        e.preventDefault();
        console.log(errores);
        console.log(inputs);
        for (let i = 0; i < inputs.length; i++) {
            if (errores[i] != undefined) {
                error[i].style.display = "block";
                inputs[i].style.borderBottom = "3px solid red";
                inputs[i].style.marginTop = "3px";
                inputs[i].style.marginBottom = "1px";
                error[i].innerHTML = errores[i];
            }
        }
        errores = [];
        inputs[0].focus();
    } else {
        e.preventDefault();
        let datosFormulario = new FormData(this);
        
        fetch("../controller/loginController.php", {
            method: "POST",
            body: datosFormulario
        })
        .then(res => res.json())
        .then(data => {
            if (data == true) {
                let modal_container = document.querySelector(".modal_container");
                modal_container.classList.remove("modal_container_none");
                setTimeout(function(){
                    window.location.href = "../view/contenido.php";
                }, 1000);
            } else {
                errores[0] = "El usuario ingresado no existe";
                error[0].style.display = "block";
                inputs[0].style.borderBottom = "3px solid red";
                inputs[0].style.marginTop = "3px";
                inputs[0].style.marginBottom = "1px";
                error[0].innerHTML = errores[0];
            }
        })
    }

});