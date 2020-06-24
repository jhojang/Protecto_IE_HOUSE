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
    let nombre = (document.querySelector("#nombre").value).trim();
    let apellido = (document.querySelector("#apellido").value).trim();
    let email = (document.querySelector("#email").value).trim();
    let pass1 = (document.querySelector("#pass1").value).trim();
    let pass2 = (document.querySelector("#pass2").value).trim();
    

    var regEx = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (usuario.length == 0) {
        errores[0] = "Por favor ingrese un nombre de usuario";
    } else if ((usuario.trim()).length > 25 || (usuario.trim()).length < 3){
        errores[0] = "El usuario debe contener entre 3 y 25 carácteres";
    }

    if (nombre.length == 0) {
        errores[1] = "Por favor ingrese un nombre";
    } else if ((nombre.trim()).length > 25){
        errores[1] = "El nombre no debe tener más de 20 carácteres";
    }

    if (apellido.length == 0) {
        errores[2] = "Por favor ingrese un apellido";
    } else if ((nombre.trim()).length > 25){
        errores[2] = "El apellido no debe tener más de 20 carácteres";
    }

    if (email.length == 0) {
        errores[3] = "El campo de email está vacío";
    } else if (!regEx.test(email)) {
        errores[3] = "El email ingresado no es válido";
    }

    if (pass1.length == 0) {
        errores[4] = "El campo de la contraseña está vacío";
    } else if (pass1.length > 25 || pass1.length < 6){
        errores[4] = "La contraseña debe contener entre 6 y 25 carácteres";
    } 
    if (pass2.length == 0) {
        errores[5] = "Debe confirmar la contraseña";
    } else {
        if (pass1 != pass2) {
            errores[5] = "Las contraseñas no coinciden";
        }
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
        console.log(...datosFormulario);
        
        fetch("../controller/registroController.php", {
            method: "POST",
            body: datosFormulario
        })
        .then(res => res.json())
        .then(data => {
            if (data == "exito") {
                let modal_container = document.querySelector(".modal_container");
                modal_container.classList.remove("modal_container_none");
                setTimeout(function(){
                    window.location.href="login.php";
                }, 1000);
            } else if (data == "error") {
                alert("Revisa los campos");
            } else {
                if (data == 0) {
                    errores[data] = "Este usuario ya se encuentra registrado";
                } else if (data == 3) {
                    errores[data] = "Este correo electrónico ya se encuentra registrado";
                }
                    error[data].style.display = "block";
                    inputs[data].style.borderBottom = "3px solid red";
                    inputs[data].style.marginTop = "3px";
                    inputs[data].style.marginBottom = "1px";
                    error[data].innerHTML = errores[data];
            }
        })

    }

});