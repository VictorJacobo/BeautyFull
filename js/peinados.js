const id = document.getElementById('principal')
function cargarPeinados() {
    fetch('js/json/peinados.json')
        .then(respuesta => respuesta.json())
        .then(respuesta =>{
            var i,j;
            for (i=0; i<3; i++){
                var aux = document.createElement('div')
                aux.classList.add("row");
                for(j=0; j<4; j++){
                    var obj = document.createElement('div')
                    obj.classList.add("col-lg-3")
                    obj.innerHTML = `<div class="card">
                        <img src="${respuesta[4*i+j].img}" alt="peinado">
                        <p>${respuesta[4*i+j].nombre}</p>
                        <hr>
                        <p>
                            ${respuesta[4*i+j].descrip}
                        </p>
                        <hr>
                        <div>
                            <p>Precio:</p>
                            <p>$${respuesta[4*i+j].precio}</p>
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

cargarPeinados()