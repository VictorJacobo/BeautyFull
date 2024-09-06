const Micita = {
    horaI: 0,
    minI: 0,
    horaF: 0,
    minF: 0,
    costo: 0,
    costoD: 0,
    tiempo: 0,
    desc: 0
};

var antTiempo = 0
var antPrecio = 0

function creaCalendario() {
    const meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    const dias = ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"];
    const id = document.getElementById('calendar');
    const fechaActual = new Date();

    const hoy = fechaActual.getDate();
    const anio = fechaActual.getFullYear();
    const mes = fechaActual.getMonth();
    const ultimoDia = new Date(anio, mes + 1, 0);
    const numDias = ultimoDia.getDate();
    fechaActual.setDate(1);

    const primerDia = fechaActual.getDay();


    var filas;
    switch (numDias) {
        case 28: if (primerDia == 0) {
            filas = 4;
        } else {
            filas = 5;
        }
            break;
        case 29: filas = 5;
            break;
        case 30: if (primerDia == 6) {
            filas = 6;
        } else {
            filas = 5;
        }
            break;
        default: if (primerDia < 5) {
            filas = 5;
        } else {
            filas = 6;
        }
    }

    var i, j;
    var r_titulo = document.createElement('div');
    r_titulo.classList.add('row');
    var c_titulo = document.createElement('div');
    c_titulo.classList.add('col-7');
    c_titulo.classList.add('text-center');
    var titulo = document.createElement('p');
    titulo.classList.add('mes')
    titulo.textContent = meses[mes];
    c_titulo.appendChild(titulo);
    r_titulo.appendChild(c_titulo);
    id.appendChild(r_titulo);

    conta = 1;
    for (i = 0; i < filas + 1; i++) {
        var aux = document.createElement('div')
        aux.classList.add("row");
        for (j = 0; j < 7; j++) {
            var col = document.createElement('div')
            var texto = document.createElement('p');
            col.classList.add("col-1");
            col.classList.add('text-center');
            if (i == 0) {
                texto.textContent = dias[j];
            } else {
                if (!(i == 1 && j < primerDia) && conta <= numDias) {
                    if (conta >= hoy) {
                        var texto = document.createElement('button');
                        texto.setAttribute('id', 'btn-' + conta);
                        texto.setAttribute('onclick', 'buscar(' + conta + ')');
                        texto.addEventListener('click', function () {
                            var botonAnterior = document.querySelector('.active');
                            if (botonAnterior) {
                                botonAnterior.classList.remove('active');
                            }
                            this.classList.add('active');
                        });
                        if (conta == hoy) {
                            texto.classList.add('btn', 'btn-sm', 'active');
                        } else {
                            texto.classList.add('btn', 'btn-sm');
                        }
                    }
                    texto.textContent = conta;
                    conta += 1;
                }
            }
            col.appendChild(texto);
            aux.appendChild(col)
        }
        id.appendChild(aux);
    }
    buscar(hoy)
}

function cargarCabello() {
    const id = document.getElementById('s_cabello')
    fetch('js/json/servicio_cab.json')
        .then(respuesta => respuesta.json())
        .then(respuesta => {
            var i, aux;
            for (i = 0; i < 5; i++) {
                aux = document.createElement('div');
                aux.classList.add("col-sm-2", 's-card');
                aux.innerHTML = `<img src="${respuesta[i].img}" alt="peinado">
                <p>${respuesta[i].nombre}</p>
                <hr>
        
                <div>
                    <p>Precio:</p>
                    <p>$${respuesta[i].precio}</p>
                </div>
                <div>
                    <p>Tiempo:</p>
                    <p>${respuesta[i].tiempo} min.</p>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="${respuesta[i].nombre}" id="s_c${respuesta[i].id}" name="c_${respuesta[i].id}">
                </div>`
                const check = aux.querySelector(`#s_c${respuesta[i].id}`);
                const tiempo = respuesta[i].tiempo
                const precio = respuesta[i].precio
                check.addEventListener('change', function () {
                    cambia(check.checked, tiempo, precio);
                });
                id.appendChild(aux)
            }
        })
}

function cargarUnas() {
    const id = document.getElementById('s_unas')
    fetch('js/json/servicio_unas.json')
        .then(respuesta => respuesta.json())
        .then(respuesta => {
            var i, aux;
            for (i = 0; i < 4; i++) {
                aux = document.createElement('div');
                aux.classList.add("col-sm-2", 's-card');
                aux.innerHTML = `<img src="${respuesta[i].img}" alt="unas">
                <p>${respuesta[i].nombre}</p>
                <hr>
                <div>
                    <p>Precio:</p>
                    <p>$${respuesta[i].precio}</p>
                </div>
                <div>
                    <p>Tiempo:</p>
                    <p>${respuesta[i].tiempo} min.</p>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="${respuesta[i].nombre}" id="s_u${respuesta[i].id}" name="u_${respuesta[i].id}">
                </div>`
                const check = aux.querySelector(`#s_u${respuesta[i].id}`);
                const tiempo = respuesta[i].tiempo
                const precio = respuesta[i].precio
                check.addEventListener('change', function () {
                    cambia(check.checked, tiempo, precio);
                });
                id.appendChild(aux)
            }
        })
}

function cargarPint() {
    const id = document.getElementById('s_pint')
    fetch('js/json/servicio_unas.json')
        .then(respuesta => respuesta.json())
        .then(respuesta => {
            var i, aux;
            for (i = 4; i < 6; i++) {
                aux = document.createElement('div');
                aux.classList.add("col-sm-3", 's-card');
                aux.innerHTML = `<img src="${respuesta[i].img}" alt="unas">
                <p>${respuesta[i].nombre}</p>
                <hr>
                <div>
                    <p>Precio:</p>
                    <p>$${respuesta[i].precio}</p>
                </div>
                <div>
                    <p>Tiempo:</p>
                    <p>${respuesta[i].tiempo} min.</p>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="${respuesta[i].nombre}" name="pinta" id="s_p${respuesta[i].id}">
                </div>`
                const check = aux.querySelector(`#s_p${respuesta[i].id}`);
                const tiempo = respuesta[i].tiempo
                const precio = respuesta[i].precio
                check.addEventListener('change', function () {
                    cambiaR(check.checked, tiempo, precio);
                });
                id.appendChild(aux)
            }
            aux = document.createElement('div');
            aux.classList.add("col-sm-2", 's-card');
            aux.innerHTML = `
            <p>Ninguno</p>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="Ninguno" name="pinta" id="s_p7" checked>
            </div>
            `
            const check = aux.querySelector(`#s_p7`);
            check.addEventListener('change', function () {
                cambiaR(check.checked, 0, 0);
            });
            id.appendChild(aux)
        })
}

function cambia(checado, tiempo, precio) {
    const hora = document.getElementById('hora');
    const time = document.getElementById('tiempo');
    const costo = document.getElementById('costo');
    const btn = document.getElementById('agendar');
    const free = document.getElementById('desc');

    const hora_i = document.getElementById('hor');
    const costo_i = document.getElementById('cost')
    const hf = document.getElementById('hora_f')
    const mf = document.getElementById('min_f')
    if (checado) {
        Micita.tiempo += tiempo;
        Micita.costo += precio;
        if (ExcedeHora(Micita.tiempo, Micita.horaI, Micita.minI)) {
            console.log(horario(Micita.tiempo, Micita.horaI, Micita.minI));
            if (Micita.desc != 0){
                var aux = Micita.costo * Micita.desc
                Micita.costoD = Micita.costo - aux;
                costo.innerHTML = '$' + Micita.costoD;
                costo_i.setAttribute("value", Micita.costoD)
                free.innerHTML = `<p>Descuento de:</p>
                <p>${Micita.desc*100}%</p>`
            } else {
                costo.innerHTML = '$' + Micita.costo;
                costo_i.setAttribute("value", Micita.costo)
            }
            time.innerHTML = minToText(Micita.tiempo);
            hora.innerHTML = horario(Micita.tiempo, Micita.horaI, Micita.minI);
            Micita.horaF = getHora(Micita.tiempo, Micita.horaI, Micita.minI);
            Micita.minF = getMinutos(Micita.tiempo, Micita.horaI, Micita.minI);
            hora_i.setAttribute("value", horario(Micita.tiempo, Micita.horaI, Micita.minI))
            hf.setAttribute("value", Micita.horaF)
            mf.setAttribute("value", Micita.minF)
            btn.disabled = false
        } else {
            console.log(horario(Micita.tiempo, Micita.horaI, Micita.minI));
            hora.innerHTML = "Fuera de horario";
            time.innerHTML = "Elimine un servicio";
            costo.innerHTML = "O elija otro dia";
            free.innerHTML = " "
            btn.disabled = true
        }
    } else {
        Micita.costo -= precio;
        Micita.tiempo -= tiempo;
        if (Micita.tiempo == 0) {
            time.innerHTML = '0 min';
            hora.innerHTML = 'Elija algun servicio'
            free.innerHTML = " "
            costo.innerHTML = '$' + Micita.costo;
            Micita.horaF = 0
            Micita.minF = 0
            btn.disabled = true
        } else {
            if (Micita.desc != 0){
                var aux = Micita.costo * Micita.desc
                Micita.costoD = Micita.costo - aux;
                costo.innerHTML = '$' + Micita.costoD;
                costo_i.setAttribute("value", Micita.costoD)
                free.innerHTML = `<p>Descuento de:</p>
                <p>${Micita.desc*100}%</p>`
            } else {
                costo.innerHTML = '$' + Micita.costo;
                costo_i.setAttribute("value", Micita.costo)
            }
            time.innerHTML = minToText(Micita.tiempo);
            hora.innerHTML = horario(Micita.tiempo, Micita.horaI, Micita.minI);
            Micita.horaF = getHora(Micita.tiempo, Micita.horaI, Micita.minI);
            Micita.minF = getMinutos(Micita.tiempo, Micita.horaI, Micita.minI);
            hora_i.setAttribute("value", horario(Micita.tiempo, Micita.horaI, Micita.minI))
            hf.setAttribute("value", Micita.horaF)
            mf.setAttribute("value", Micita.minF)
            btn.disabled = false
        }
    }
}


function cambiaR(checado, tiempo, precio) {
    const hora = document.getElementById('hora');
    const time = document.getElementById('tiempo');
    const costo = document.getElementById('costo');
    const btn = document.getElementById('agendar');
    const free = document.getElementById('desc');

    const hora_i = document.getElementById('hor');
    const costo_i = document.getElementById('cost')
    const hf = document.getElementById('hora_f')
    const mf = document.getElementById('min_f')
    if (checado) {
        Micita.costo -= antPrecio;
        Micita.tiempo -= antTiempo;
        Micita.costo += precio;
        Micita.tiempo += tiempo;
        antPrecio = precio;
        antTiempo = tiempo;

        if (ExcedeHora(Micita.tiempo, Micita.horaI, Micita.minI)) {
            console.log(horario(Micita.tiempo, Micita.horaI, Micita.minI));
            if (Micita.tiempo == 0) {
                time.innerHTML = '0 min';
                hora.innerHTML = 'Elija algun servicio'
                free.innerHTML = " "
                costo.innerHTML = '$' + Micita.costo;
                btn.disabled = true
            } else {
                if (Micita.desc != 0){
                    var aux = Micita.costo * Micita.desc
                    Micita.costoD = Micita.costo - aux;
                    costo.innerHTML = '$' + Micita.costoD;
                    costo_i.setAttribute("value", Micita.costoD)
                    free.innerHTML = `<p>Descuento de:</p>
                    <p>${Micita.desc*100}%</p>`
                } else {
                    costo.innerHTML = '$' + Micita.costo;
                    costo_i.setAttribute("value", Micita.costo)
                }
                time.innerHTML = minToText(Micita.tiempo);
                hora.innerHTML = horario(Micita.tiempo, Micita.horaI, Micita.minI);
                Micita.horaF = getHora(Micita.tiempo, Micita.horaI, Micita.minI);
                Micita.minF = getMinutos(Micita.tiempo, Micita.horaI, Micita.minI);
                hora_i.setAttribute("value", horario(Micita.tiempo, Micita.horaI, Micita.minI))
                hf.setAttribute("value", Micita.horaF)
                mf.setAttribute("value", Micita.minF)
                btn.disabled = false
            }
        } else {
            console.log(horario(Micita.tiempo, Micita.horaI, Micita.minI));
            hora.innerHTML = "Fuera de horario";
            time.innerHTML = "Elimine un servicio";
            costo.innerHTML = "O elija otro dia";
            free.innerHTML = " "
            btn.disabled = true
        }
    }
}

function minToText(minutos) {
    let horas = Math.floor(minutos / 60);
    let minutosRestantes = minutos % 60;
    let resultado = "";

    if (horas === 1) {
        resultado += "1 h";
    } else if (horas > 1) {
        resultado += horas + " h";
    }

    if (minutosRestantes === 1) {
        resultado += " 1 min";
    } else if (minutosRestantes > 1) {
        resultado += " " + minutosRestantes + " min";
    }
    return resultado.trim();
}

function horario(minutos, horaInicio, minutosInicio) {
    let inicio = new Date(2023, 0, 1, horaInicio, minutosInicio); // Inicio a la hora y minutos especificados
    let final = new Date(2023, 0, 1, horaInicio, minutosInicio); // Final también a la hora y minutos especificados
    final.setMinutes(final.getMinutes() + minutos); // Agregamos la cantidad de minutos al horario final

    let inicioHora = inicio.getHours();
    let inicioMinutos = inicio.getMinutes();
    let finalHora = final.getHours();
    let finalMinutos = final.getMinutes();

    let resultado = "";

    if (inicioHora === 0) {
        resultado += "12:";
    } else if (inicioHora > 12) {
        resultado += (inicioHora - 12) + ":";
    } else {
        resultado += inicioHora + ":";
    }

    if (inicioMinutos < 10) {
        resultado += "0";
    }
    resultado += inicioMinutos + " " + (inicioHora >= 12 ? "PM" : "AM") + " - ";

    if (finalHora === 0) {
        resultado += "12:";
    } else if (finalHora > 12) {
        resultado += (finalHora - 12) + ":";
    } else {
        resultado += finalHora + ":";
    }

    if (finalMinutos < 10) {
        resultado += "0";
    }
    resultado += finalMinutos + " " + (finalHora >= 12 ? "PM" : "AM");

    return resultado;
}

function getHora(cantidadMinutos, horaInicio, minutosInicio) {
    // Convertimos la hora de inicio y los minutos de inicio a minutos totales
    const minutosTotalesInicio = horaInicio * 60 + minutosInicio;

    // Sumamos los minutos de duración a los minutos totales de inicio
    const minutosTotalesFinal = minutosTotalesInicio + cantidadMinutos;

    // Calculamos la hora final a partir de los minutos totales finales
    const horaFinal = Math.floor(minutosTotalesFinal / 60);

    // Retornamos la hora final como un número entero
    return horaFinal;
}

function getMinutos(cantidadMinutos, horaInicio, minutosInicio) {
    // Convertimos la hora de inicio y los minutos de inicio a minutos totales
    const minutosTotalesInicio = horaInicio * 60 + minutosInicio;

    // Sumamos los minutos de duración a los minutos totales de inicio
    const minutosTotalesFinal = minutosTotalesInicio + cantidadMinutos;

    // Calculamos los minutos finales a partir de los minutos totales finales
    const minutosFinal = minutosTotalesFinal % 60;

    // Retornamos los minutos finales como un número entero
    return minutosFinal;
}

function ExcedeHora(minutos, horaInicio, minutosInicio) {
    
    // Convertir hora de inicio y minutos a minutos totales
    const minutosTotalesInicio = horaInicio * 60 + minutosInicio;
    console.log("Minutos Totales Inicio: "+ minutosTotalesInicio)
    // Sumar los minutos que se quieren agregar
    const minutosTotalesFinal = minutosTotalesInicio + minutos;
    // Convertir los minutos totales finales a hora y minutos
    const horaFinal = Math.floor(minutosTotalesFinal / 60);
    const minutosFinal = minutosTotalesFinal % 60;
    // Verificar si la hora final es posterior a las 8:00 p.m.
    console.log("Hora Final: " +horaFinal)
    console.log("Minutos Final: " +minutosFinal)
    if (horaFinal > 20 || (horaFinal === 20 && minutosFinal > 0)) {
        return false;
    } else {
        return true;
    }
}

function buscar(valor) {
    // Enviar la consulta a través de AJAX
    fetch("./php/buscar.php?q=" + valor)
        .then(respuesta => respuesta.json())
        .then(respuesta => {
            const reserva = document.getElementById('reserva')
            if (respuesta.hasOwnProperty('mensaje')) {
                reserva.innerHTML = "<h1>No hay citas para este dia</h1>"
                Micita.horaI = 8;
                Micita.minI = 0;
            } else {
                var filas, elem, i, j, cont;
                elem = respuesta.length
                filas = Math.ceil(elem / 4);
                cont = 0;
                reserva.innerHTML = `<h1>Citas del dia ${respuesta[0].dia}</h1>`;
                for (i = 0; i < filas; i++) {
                    var aux = document.createElement('div');
                    aux.classList.add("row", "justify-content-center");
                    for (j = 0; j < 4; j++) {
                        if (elem > 0) {
                            var obj = document.createElement('div');
                            obj.classList.add("col-lg-2", "r");
                            obj.innerHTML = `<p>Cita de: ${respuesta[cont].horario}</p>
                                            <p>Cliente: ${respuesta[cont].cliente}</p>`
                            aux.appendChild(obj)
                            cont += 1;
                            elem -= 1;
                        }
                    }
                    reserva.appendChild(aux);
                }
                Micita.horaI = parseInt(respuesta[respuesta.length - 1].hora_f);
                Micita.minI = parseInt(respuesta[respuesta.length - 1].min_f);
            }
            const day = document.getElementById('dia')
            day.setAttribute("value", valor)
            reset();
        })
        .catch(function (error) {
            console.error(error);
        });
}

function infoCliente() {
    var elem = document.getElementById('user');
    var user = elem.innerHTML;
    console.log(user)
    if (user) {
        fetch("./php/client.php?q=" + user)
            .then(respuesta => respuesta.json())
            .then(respuesta => {
                console.log("Exito");
                const cliente = document.getElementById('client')
                cliente.setAttribute("value", user)
                if(respuesta[0].nCitas < 4){
                    Micita.desc = 0
                } else {
                    if(respuesta[0].nCitas < 8){
                        Micita.desc = 0.1
                    } else {
                        Micita.desc = 0.15
                    }
                }
            })
            .catch(function (error) {
                console.error(error);
            });
    } else {
        console.log("No hay una sesion iniciada");
    }
}

function reset() {
    Micita.horaF = 0;
    Micita.minF = 0;
    Micita.costo = 0;
    Micita.tiempo = 0;
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var i = 0; i < checkboxes.length; i++) {
        checkboxes[i].checked = false;
    }
    var rad = document.getElementById('s_p7');
    rad.checked = true;
    const hora = document.getElementById('hora');
    const time = document.getElementById('tiempo');
    const costo = document.getElementById('costo');
    var btn = document.getElementById('agendar');
    time.innerHTML = '0 min';
    hora.innerHTML = 'Elija algun servicio'
    costo.innerHTML = '$0'
    btn.disabled = true;
}

creaCalendario()
cargarCabello()
cargarUnas()
cargarPint()
infoCliente()
