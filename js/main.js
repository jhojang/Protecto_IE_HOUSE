/* global fetch */

"use strict";
var agregar_cuarto = document.querySelector(".agregar_cuarto");
var form_cuarto = document.querySelector("#form_cuarto");
var cuarto_item = document.querySelector("#cuarto_item");
var bombillos_content = document.querySelector(".bombillos_content");



cargarBombillos();
cargarCuartos();

//BOTÓN REDONDO PEQUEÑO (AGREGA CUARTOS)
agregar_cuarto.addEventListener("click", function(e){
    e.preventDefault();
    form_cuarto.classList.toggle("form_cuarto_visible");
    cuarto_item.focus();
    agregar_cuarto.style.display = "none";
});

//FORMULARIO AGREGAR CUARTOS
form_cuarto.addEventListener("submit", function(e){
    e.preventDefault();
        
    var datos = new FormData(form_cuarto);
    console.log(...datos);
    fetch("../../controller/cuartoController/setCuarto.php", {
        method: "POST",
        body: datos
    })
    .then(res => res.json())
    .then(data => {
        if (data == true) {
            console.log("Cuarto agregado correctamente");
        } else if (data == false) {
            alert("El cuarto ya existe");
        } else {
            alert("Por favor ingrese el nombre del cuarto");
        }
        cargarCuartos()
    });

    form_cuarto.classList.toggle("form_cuarto_visible");
    agregar_cuarto.style.display = "block";

});




//___________________________________MODAL AGREGAR BOMBILLOS  (INICIA)___________________________________________

//AGREGAR BOMBILLOS
var formAddBombillo = document.querySelector("#formAddBombillo");
formAddBombillo.addEventListener("submit", function(e){
    e.preventDefault();

    var datos = new FormData(this);

    fetch("../../controller/bombilloController/setBombillo.php", {
        method: "POST",
        body: datos
    })
    .then(res => res.json())
    .then(data => {
        console.log(data);
        if (data == true) {
            console.log("Bombillo agregado correctamente");
            cargarBombillos();
        } else if (data == false) {
            alert("El bombillo ya existe");
        } else {
            console.log(data);
        }
        
    });

    this.reset();

});

//BOTÓN AZUL REDONDO CON EL + (ABRE EL MODAL)
var modal_content = document.querySelector(".modal_content");
var modal = document.querySelector(".modal");
var agregar_bombillo = document.querySelector(".agregar_bombillo");



agregar_bombillo.addEventListener("click", function(){
    
    //modal.classList.toggle("modal_cerrar");
    modal_content.style.display = "block";
    modal.style.transform = "translateX(0%)";
    document.querySelector("#formAddBombillo").style.display = "flex";
        
    
    

    //OBTENER CUARTOS PARA AGREGAR BOMBILLO
    fetch("../../controller/cuartoController/getCuartos.php", {
        method: "GET"
    })
    .then(res => res.json())
    .then(data => {
            var cuarto_bombillo = document.querySelector("#set_cuarto_bombillo");
            let elementosHijos = document.querySelectorAll("#set_cuarto_bombillo > option");
            
            borrarHijos(elementosHijos, cuarto_bombillo)
            for (let i in data) {
                let option = document.createElement("option");
                option.setAttribute("value", data[i].id_cuarto);
                option.innerHTML = data[i].nombre_cuarto;
                cuarto_bombillo.appendChild(option);
            }
    })



    //OBTENER USUARIOS PARA AGREGAR BOMBILLO
    //Obtener usuarios: 1
    //Insert usuarios: 2
    //Obtener usuario por Nombre: 3
    //Obtener usuario por correo: 4
    //Eliminar usuario: 5
    //Editar usuario: 6
    let query = 1;
    let data = new FormData();
    data.append("query", query)
    fetch("../../controller/usuarioController.php", {
        method: "POST",
        body: data
    })
    .then(res => res.json())
    .then(data => {
        console.log(data);

        let select_usuarios_add = document.querySelector(".select_usuarios_add");
        let divs_hijos = document.querySelectorAll(".select_usuarios_add > div");

        if (divs_hijos != null) {
            borrarHijos(divs_hijos, select_usuarios_add);
        }

        for (let i in data) {
            if (data[i].id_rol == 1) {
                continue;
            } else {
                let div = document.createElement("div");
            let plantilla = `
                            <input type="checkbox" class="usuario_checkbox" id="${data[i].nombre_de_usuario}" name="usuario[]" value="${data[i].id_usuario}">
                            <label class="usuario_checkbox_label" for="${data[i].nombre_de_usuario}"><div><img src="../../image/face.png">${data[i].nombre_de_usuario}</div></label>
                            `;
            div.innerHTML = plantilla;
            select_usuarios_add.appendChild(div);
            }
            
        }

    })
    
});

//___________________________________MODAL AGREGAR BOMBILLOS  (TERMINA)___________________________________________





//CERRAR MODAL
var cerrar_modal = document.querySelector(".boton_cerrar_modal");
cerrar_modal.addEventListener("click", function(e){
    cerrarModal(e);
});
modal_content.addEventListener("click", function(e){
    cerrarModal(e);
});
function cerrarModal(evento){
    evento.preventDefault();
    modal.style.transform = "translateX(150%)";
    modal_content.style.display = "none";
    document.querySelector("#formAddBombillo").style.display = "none";
    document.querySelector("#formUpdateBombillo").style.display = "none";
}





//____________________________________ELIMINAR, ACTUALIZAR Y ENCENDER BOMBILLOS (INICIA)________________________________
var bombillos = document.querySelector(".bombillos");

bombillos.addEventListener("click", function(e){
    //ENCENDER
    if (e.target && e.target.className == "botonBombillo" || e.target && e.target.className == "botonBombillo botonBombilloActivo" || e.target && e.target.className == "far fa-lightbulb" || e.target && e.target.nodeName == "SPAN") {
        var botonBombillo;
        var estado;
        for (let i in e.path) {
            if (e.path[i].className == "botonBombillo") {
                botonBombillo = e.path[i];
                botonBombillo.classList.add("botonBombilloActivo");
                estado = 1;
            } else if (e.path[i].className == "botonBombillo botonBombilloActivo") {
                botonBombillo = e.path[i];
                botonBombillo.classList.remove("botonBombilloActivo");
                estado = 0;
            }
        }
        var datos = {
            id: botonBombillo.getAttribute("id"),
            state: estado 
        }
        var data = new FormData();

        for (let i in datos ) {
            data.append(i, datos[i]);
        }

        fetch("../../controller/bombilloController/setEstadoBombillo.php", {
            method: "POST",
            body: data
        })
        .then(res => res.json())
        .then(data => {
            if (data == true) {
                console.log("Bombillo encendido");
            } else {
                console.log("Bombillo apagado");
            }
        });
    }

    //ELIMINAR
    if (e.target.className == "far fa-trash-alt") {
        
        var id_bombillo = (e.path[3].firstChild).getAttribute("id");
        

        var data = new FormData();
        data.append("id_bombillo",id_bombillo);
                   
        fetch("../../controller/bombilloController/eliminarBombillo.php", {
        method: "POST",
        body: data
        })
        .then(res =>res.json())
        .then(data => {
            console.log(data);
            cargarBombillos();
        });
    }


    //ACTUALIZAR
    if (e.target.className == "far fa-edit") {
        var idCuarto = e.path[3].firstChild.firstChild.className;
        modal.style.transform = "translateX(0%)"
        document.querySelector("#formUpdateBombillo").style.display = "flex";
        var nombre_bombillo = document.querySelector("#get_nombre_bombillo");
        var id_bombillo = document.querySelector("#id_bombillo")
        nombre_bombillo.setAttribute("value", e.path[3].firstChild.innerText);
        id_bombillo.setAttribute("value", e.path[3].firstChild.id);
        modal_content.style.display = "block";


        console.log(e.path[3].firstChild.getAttribute("id"));

        //OBTENER CUARTOS
        fetch("../../controller/cuartoController/getCuartos.php", {
            method: "GET"
        })
        .then(res => res.json())
        .then(data => {
            var cuarto_bombillo = document.querySelector("#get_cuarto_bombillo");
            let elementosHijos = document.querySelectorAll("#get_cuarto_bombillo > option");
            
            borrarHijos(elementosHijos, cuarto_bombillo)

            for (let i in data) {
                let option = document.createElement("option");
                option.setAttribute("value", data[i].id_cuarto);
                if (data[i].id_cuarto == idCuarto) {
                    option.setAttribute("selected", true);
                }
                option.innerHTML = data[i].nombre_cuarto;
                cuarto_bombillo.appendChild(option);
            }            
        })

        //OBTENER USUARIOS PARA AGREGAR BOMBILLO
        //Obtener usuarios: 1
        //Insert usuarios: 2
        //Obtener usuario por Nombre: 3
        //Obtener usuario por correo: 4
        //Eliminar usuario: 5
        //Editar usuario: 6
        let query = 1;
        let data = new FormData();
        data.append("query", query);
        fetch("../../controller/usuarioController.php", {
            method: "POST",
            body: data
        })
        .then(res => res.json())
        .then(lista_de_usuarios => {
            

            let data = new FormData();
            let id_bombillo = e.path[3].firstChild.getAttribute("id");
            data.append("id_bombillo", id_bombillo);
            fetch("../../controller/bombilloController/getTableBombilloUsuario.php", {
                method: "POST",
                body: data
            })
            .then(res => res.json())
            .then(tabla_bombillo_usuario => {
                console.log(tabla_bombillo_usuario);
                console.log(lista_de_usuarios);


                

                let usuarios_permitidos = document.querySelector(".usuarios_permitidos");
                let divs_hijos = document.querySelectorAll(".usuarios_permitidos > .permiso");

                if (divs_hijos != null) {
                    borrarHijos(divs_hijos, usuarios_permitidos);
                }

                let usuarioSi = [];

                for (let i in lista_de_usuarios) {
                    for (let j in tabla_bombillo_usuario) {
                        if (lista_de_usuarios[i].id_usuario == tabla_bombillo_usuario[j].id_usuario && lista_de_usuarios[i].id_rol != 1) {
                            let div = document.createElement("div");
                            div.classList.add("permiso");
                            div.classList.add("permitido");
                            let plantilla = `
                                        <div><img src="../../image/face.png">${lista_de_usuarios[i].nombre_de_usuario}</div><a href="" value="${lista_de_usuarios[i].id_usuario}" class="quitar_permiso">-</a>   
                                            `;
                            div.innerHTML = plantilla;
                            usuarios_permitidos.appendChild(div);
                            usuarioSi[i] = lista_de_usuarios[i].id_usuario;
                        } 
                    }
                }


                
                let usuarios_no_permitidos = document.querySelector(".usuarios_no_permitidos");
                let divs_hijos2 = document.querySelectorAll(".usuarios_no_permitidos > .permiso");

                if (divs_hijos2 != null) {
                    borrarHijos(divs_hijos2, usuarios_no_permitidos);
                }

                for (let i in lista_de_usuarios) {
                    let flag = true;
                    for (let j in usuarioSi) {
                        if (!isNaN(usuarioSi[j])) {
                            if (lista_de_usuarios[i].id_usuario === usuarioSi[j]) {
                                flag = false;
                            }
                        }
                    }
                    if (flag == true  && lista_de_usuarios[i].id_rol != 1) {
                        let div = document.createElement("div");
                            div.classList.add("permiso");
                            div.classList.add("no_permitido");
                            let plantilla = `
                                        <div><img src="../../image/face.png">${lista_de_usuarios[i].nombre_de_usuario}</div><a href="" value="${lista_de_usuarios[i].id_usuario}" class="dar_permiso">+</a>   
                                            `;
                            div.innerHTML = plantilla;
                            usuarios_no_permitidos.appendChild(div);
                    }
                }

                let quitar_permiso = document.querySelectorAll(".quitar_permiso");
                for (let i = 0; i < quitar_permiso.length; i++) {
                    quitar_permiso[i].addEventListener("click", function(e){
                        e.preventDefault();
                        
                        let username = e.path[1].firstElementChild.innerText;

                        let data = new FormData();
                        data.append("id_bombillo", id_bombillo);
                        data.append("id_usuario", this.getAttribute("value"));
                        fetch("../../controller/bombilloController/deleteBombilloUsuario.php", {
                            method: "POST",
                            body: data
                        })
                        .then(res => res.json())
                        .then(respuesta => {
                            if (respuesta == true) {
                                alert("Cambio con exito: " + username + " ya no tiene permisos para este bombillo");
                            }
                        })

                    });
                }


                let dar_permiso = document.querySelectorAll(".dar_permiso");
                for (let i = 0; i < dar_permiso.length; i++) {
                    dar_permiso[i].addEventListener("click", function(e){
                        e.preventDefault();

                        let username = e.path[1].firstElementChild.innerText;

                        let data = new FormData();
                        data.append("id_bombillo", id_bombillo);
                        data.append("id_usuario", this.getAttribute("value"));
                        fetch("../../controller/bombilloController/setBombilloUsuario.php", {
                            method: "POST",
                            body: data
                        })
                        .then(res => res.json())
                        .then(respuesta => {
                            if (respuesta == true) {
                                alert("Cambio con exito: Ahora " + username + " tiene permisos para este bombillo");
                            }
                        })


                    });
                }
                

            })


            


        })
    }
});

//____________________________________ELIMINAR, ACTUALIZAR Y ENCENDER BOMBILLOS (TERMINA)________________________________





//_____________________________________FORMUALRIO ACTUALIZAR BOBMILLO (INCIA)________________________________________________

var formUpdateBombillo = document.querySelector("#formUpdateBombillo");
formUpdateBombillo.addEventListener("submit", function(e){
    e.preventDefault();

    var datos = new FormData(this);

    fetch("../../controller/bombilloController/actualizarBombillo.php", {
        method: "POST",
        body: datos
    })
    .then(res => res.json())
    .then(data => {
        if (data == true) {
            console.log("Bombillo agregado correctamente");
            var nombre_bombillo = document.querySelector("#get_nombre_bombillo");
            nombre_bombillo.setAttribute("value", datos.get("get_nombre_bombillo"));
            cargarBombillos();
        } else if (data == false) {
            alert("El bombillo ya existe");
        } else {
            alert(data);
        }
    });

    this.reset();

});

//____________________________________FORMULARIO ACTUALIZAR BOBMILLO (TERMINA)________________________________________________



var lista_de_cuartos = document.querySelector(".lista_de_cuartos");
lista_de_cuartos.addEventListener("click", function(e){
    if (e.path[0].className == "active") {
        var id_cuarto = e.target.id;
        var data = new FormData();
        data.append("id_cuarto", id_cuarto);
        console.log(data.get("id_cuarto"));

        fetch("../../controller/bombilloController/getBombillos.php", {method: "GET" })
        .then(res => res.json())
        .then(data => {
            var bombillos = document.querySelector(".bombillos");
            var botonBombilloDiv = document.querySelectorAll(".bombillos > .botonBombilloDiv");
            for (let k = 0; k < botonBombilloDiv.length; k++) {
                bombillos.removeChild(botonBombilloDiv[k]);
            }


            for (let i in data) {
                if (data[i].id_cuarto == id_cuarto || id_cuarto == "todos") {
                    let div = document.createElement("div");
                    div.className = "botonBombilloDiv";

                    let button = document.createElement("button");
                    button.setAttribute("id", data[i].id_bombillo);
                    button.className = "botonBombillo";

                    let bombilloOpc = document.createElement("div");
                    bombilloOpc.className = "bombilloOpc";
                        
                    if (data[i].estado_bombillo == 0) {
                        button.classList.remove("botonBombilloActivo");
                    } else {
                        button.classList.add("botonBombilloActivo");
                    }
                    let template = `<span class="${data[i].id_cuarto}">${data[i].nombre_bombillo}</span>
                                    <div><i class="far fa-lightbulb"></i></div>
                                    `;
                    button.innerHTML = template;
                    let template2 = `
                                    <button class="btnEliminarBombillo"><i class="far fa-trash-alt"></i></button>
                                    <button class="btnEditarBombillo"><i class="far fa-edit"></i></button>
                                    `;
                    bombilloOpc.innerHTML = template2;
                    div.append(button);
                    div.append(bombilloOpc);
                    bombillos.prepend(div);
                } 
            }       
        });

    }
    
});




/*SE CARGAN LOS CUARTOS*/
function cargarCuartos(){
    fetch("../../controller/cuartoController/getCuartos.php", {
        method: "GET"
    })
    .then(res => res.json())
    .then(data => {
        console.log(data);
        var ul = document.querySelector(".bombillos_content .cuarto ul");
        let elementosHijos = document.querySelectorAll(".cuarto > ul > li");

        if (elementosHijos.length > 1) {
            for (let k = 1; k < elementosHijos.length; k++) {
                ul.removeChild(elementosHijos[k]);
            }
        }
            
        for (let i in data) {
            let li = document.createElement("li");
            let plantilla = `<a href="" id="${data[i].id_cuarto}" class="link_cuarto">${data[i].nombre_cuarto}</a>`;
            li.innerHTML = plantilla;
            ul.appendChild(li);
        }
        
        var array_cuarto_item = document.querySelectorAll(".link_cuarto");
        for (let i = 0; i < array_cuarto_item.length; i++) {
            array_cuarto_item[i].addEventListener("click", function(e){
                e.preventDefault();
                this.className = "active";
                for (let j = 0; j < array_cuarto_item.length; j++) {
                    if (this == array_cuarto_item[j]) {
                        continue;
                    } else {
                        array_cuarto_item[j].classList.remove("active");
                    }
                }
            });
        }
        
    });
}

function borrarHijos(elementosHijos, elementoPadre){
    for (let k = 0; k < elementosHijos.length; k++) {
        elementoPadre.removeChild(elementosHijos[k]);
    }
}


//SE CARGAN LOS BOMBILLOS
function cargarBombillos() {
    fetch("../../controller/bombilloController/getBombillos.php", {method: "GET" })
    .then(res => res.json())
    .then(data => {
        console.log(data);
        var bombillos = document.querySelector(".bombillos");
        var botonBombilloDiv = document.querySelectorAll(".bombillos > .botonBombilloDiv");
        for (let k = 0; k < botonBombilloDiv.length; k++) {
           bombillos.removeChild(botonBombilloDiv[k]);
        }

        for (let i in data) {
            let div = document.createElement("div");
            div.className = "botonBombilloDiv";

            let button = document.createElement("button");
            button.setAttribute("id", data[i].id_bombillo);
            button.className = "botonBombillo";

            let bombilloOpc = document.createElement("div");
            bombilloOpc.className = "bombilloOpc";
               
            if (data[i].estado_bombillo == 0) {
                   button.classList.remove("botonBombilloActivo");
            } else {
                button.classList.add("botonBombilloActivo");
            }
            let template = `<span class="${data[i].id_cuarto}">${data[i].nombre_bombillo}</span>
                            <div><i class="far fa-lightbulb"></i></div>
                            `;
            button.innerHTML = template;
            let template2 = `
                            <button class="btnEliminarBombillo"><i class="far fa-trash-alt"></i></button>
                            <button class="btnEditarBombillo"><i class="far fa-edit"></i></button>
                            `;
            bombilloOpc.innerHTML = template2;
            div.append(button);
            div.append(bombilloOpc);
            bombillos.prepend(div);
               
        }
        
    });
}



