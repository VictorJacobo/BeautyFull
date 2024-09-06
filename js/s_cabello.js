const id = document.getElementById('principal')
function cargarCabello() {
    fetch('js/json/servicio_cab.json')
        .then(respuesta => respuesta.json())
        .then(respuesta =>{
            var i,j, aux, obj;
            for (i=0; i<2; i++){
                aux = document.createElement('div')
                aux.classList.add("row");
                for(j=0; j<2; j++){
                    obj = document.createElement('div')
                    obj.classList.add("col-lg-6")
                    obj.innerHTML = `<div class="card">
                        <img src="${respuesta[2*i+j].img}" alt="peinado">
                        <p>${respuesta[2*i+j].nombre}</p>
                        <hr>
                        <p>
                            ${respuesta[2*i+j].descrip}
                        </p>
                        <hr>
                        <div>
                            <p>Precio:</p>
                            <p>$${respuesta[2*i+j].precio}</p>
                        </div>
                        <a href="./cita.php">
                            <button class="btn btn-sm">Agendar cita</button>
                        </a>
                    </div>`
                    aux.appendChild(obj)
                }
                id.appendChild(aux)
            }
            aux = document.createElement('div')
            aux.classList.add("row");
            aux.classList.add("justify-content-center");
            obj = document.createElement('div')
            obj.classList.add("col-lg-6")
            obj.innerHTML = `<div class="card">
                        <img src="${respuesta[4].img}" alt="peinado">
                        <p>${respuesta[4].nombre}</p>
                        <hr>
                        <p>
                            ${respuesta[4].descrip}
                        </p>
                        <hr>
                        <div>
                            <p>Precio:</p>
                            <p>$${respuesta[4].precio}</p>
                        </div>
                        <a href="./cita.php">
                            <button class="btn btn-sm">Agendar cita</button>
                        </a>
                    </div>`
            aux.appendChild(obj)
            id.appendChild(aux)
        })
}

cargarCabello()