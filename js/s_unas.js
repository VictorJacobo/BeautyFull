const id = document.getElementById('principal')
function cargarUnas() {
    fetch('js/json/servicio_unas.json')
        .then(respuesta => respuesta.json())
        .then(respuesta =>{
            var i,j, aux, obj;
            for (i=0; i<3; i++){
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
        })
}

cargarUnas()