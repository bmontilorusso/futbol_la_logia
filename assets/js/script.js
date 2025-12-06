// FORMULARIO DE ALTA DE PARTIDOS(Convocatoria):

const formularioAltaPartidos = document.getElementById("formulario-convocatoria");
const popupAltaConvocatoria = document.getElementById("popUp-convocatoria");
const mensajepopupAltaConvocatoria = document.getElementById("mensaje-popup-convocatoria");
const cerrarPopUpAltaConvocatoria = document.getElementById("boton-cerrar-convocatoria");

// Formulario:
if (formularioAltaPartidos) {

    formularioAltaPartidos.addEventListener("submit", function(evento) {
    
    evento.preventDefault(); // Para evitar el pantallazo blanco (porque el evento por defecto del submit es "cambiar a la pantalla blanca")

    const datosDelFormulario = new FormData(formularioAltaPartidos);

    // Envío de datos del form, vía POST:
    fetch("convocatoria.php", {
        method: "POST",
        body: datosDelFormulario
    })
    .then(respuestaServer => respuestaServer.text()) // Acá guardo la respuesta del server y la convierto en texto plano.
    .then(respuestaParaNavegador => {
        // console.log("Respuesta del server capturado con var_dump: ", respuestaParaNavegador); // Para debugear.
        mensajepopupAltaConvocatoria.textContent = respuestaParaNavegador;
        popupAltaConvocatoria.classList.remove('oculto');
        popupAltaConvocatoria.classList.add('visible');
        formularioAltaPartidos.reset();
        formularioAltaPartidos.querySelector("input").blur(); // Para que no se posicione en el prmier input y NO arroje el required de golpe al cerrar PopUp.
    })
    .catch(error => {
        mensajepopupAltaConvocatoria.textContent = "Error al enviar datos";
        popupAltaConvocatoria.classList.remove('oculto');
        popupAltaConvocatoria.classList.add('visible');
    });
});

}

// Botón de cerrar el Popup:
if(cerrarPopUpAltaConvocatoria) {

    cerrarPopUpAltaConvocatoria.addEventListener("click", function(){
    popupAltaConvocatoria.classList.remove('visible');
    popupAltaConvocatoria.classList.add('oculto');
    location.reload();
    });
}

//***********************************************************************************************************************/

// FORMULARIO DE CONFIRMACIÓN DE ASISTENCIA:

const formularioAsistencia = document.getElementById('formulario-asistencia');
const popupAsistencia = document.getElementById('popupAsistencia');
const mensajePopupAsistencia = document.getElementById('mensaje-popup-asistencia');
const cerrarPopupAsistencia = document.getElementById('boton-cerrar-asistencia');
const botonConfirmoAsistencia = document.getElementById("confirmo-asistencia");
const botonNoVoy = document.getElementById("no-voy");

// Formulario:
if (formularioAsistencia) {
    formularioAsistencia.addEventListener("submit", function(evento){
    
    // console.log(">>> SUBMIT ASISTENCIA DISPARADO");
    // console.log("Contenido del POST:", new FormData(formularioAsistencia)); // Para debugear.

    evento.preventDefault(); // Para prevenir "pantallazo" Blanco.

    const datosDelFormularioAsistencia = new FormData(formularioAsistencia);

    // Agregamos el valor (name y value) del botón submit:
    if (evento.submitter && evento.submitter.name) {
        datosDelFormularioAsistencia.append(evento.submitter.name, evento.submitter.value);
    }

    // Envío de los datos capturados, por POST:
    fetch("app/actions/action-asistencia.php", {
        method: "POST",
        body: datosDelFormularioAsistencia
    })
    .then(respuestaServer => respuestaServer.text()) // Para guardar larespuesta del Server...
    .then(respuestaParaNavegador => {
        // console.log("Respuesta del server capturado con var_dump: ", respuestaParaNavegador); // Para debugear. 
        mensajePopupAsistencia.textContent = respuestaParaNavegador;
        popupAsistencia.classList.remove('oculto');
        popupAsistencia.classList.add('visible');
        formularioAsistencia.reset();
        botonConfirmoAsistencia.classList.add('boton-disabled');
        botonConfirmoAsistencia.classList.remove('boton');
        botonConfirmoAsistencia.disabled = true;
        botonNoVoy.classList.add('boton-disabled');
        botonNoVoy.classList.remove('boton');
        botonNoVoy.disabled = true;

    })
    .catch(error => {
        mensajePopupAsistencia.textContent = "Error al enviar datos";
        popupAsistencia.classList.remove('oculto');
        popupAsistencia.classList.add('visible');
    });
    });
}

// Botón para cerrar PopUp (Asistencia): 
if (cerrarPopupAsistencia){
    cerrarPopupAsistencia.addEventListener("click", function(){
    popupAsistencia.classList.remove('visible');
    popupAsistencia.classList.add('oculto');
    location.reload();
    });
}

//***********************************************************************************************************************/

// INVITAR A UN AMIGO:

const botonAbrirPopupAmigo = document.getElementById('llevo-un-amigo');
const popupAmigo = document.getElementById('popup-amigo');
const botonCancelarPopupAmigo = document.getElementById('boton-Cancelar-Popup-Amigo');
const formLlevoAmigo = document.getElementById('form-llevo-amigo');

botonAbrirPopupAmigo.addEventListener("click", function() {
    popupAmigo.classList.remove('oculto');
    popupAmigo.classList.add('visible-flex');
});

botonCancelarPopupAmigo.addEventListener("click", function() {
    popupAmigo.classList.remove('visible-flex');
    popupAmigo.classList.add('oculto');
});

formLlevoAmigo.addEventListener("submit", function(evento) {
    
    evento.preventDefault();

    const datosDelFormularioLlevoUnAmigo = new FormData(formLlevoAmigo);

    if (evento.submitter && evento.submitter.name) {
        datosDelFormularioLlevoUnAmigo.append(evento.submitter.name, evento.submitter.value);
    }

    fetch("asistencia-amigo.php", {
        method: "POST",
        body: datosDelFormularioLlevoUnAmigo
    })
    .then(respuestaServer => respuestaServer.text())
    .then(respuestaParaNavegador => {
        popupAmigo.classList.add('oculto');
        popupAmigo.classList.remove('visible-flex');        
        popupAsistencia.classList.remove('oculto');
        popupAsistencia.classList.add('visible-flex');
        mensajePopupAsistencia.textContent = respuestaParaNavegador;

    })
    .catch(error => {
        mensajePopupAsistencia.textContent = "Error al enviar datos";
        // console.log(error); Para debuggear.
        popupAsistencia.classList.remove('oculto');
        popupAsistencia.classList.add('visible-flex');
    });
});

//***********************************************************************************************************************/

// BAJARME DEL PARTIDO:

const botonMeBajo = document.getElementById('me-bajo');
const formBaja = document.getElementById('form-baja');
const popupBaja = document.getElementById('popup-baja');
const botonConfirmarBaja = document.getElementById('boton-confirmar-baja');
const botonCancelarBaja = document.getElementById('boton-cancelar-baja');

botonMeBajo.addEventListener('click', function(){
    popupBaja.classList.remove('oculto');
    popupBaja.classList.add('visible');
});

botonCancelarBaja.addEventListener('click', function(){
    popupBaja.classList.remove('visible');
    popupBaja.classList.add('oculto');
});

// Formulario (Ventana):
if (botonConfirmarBaja) {
    botonConfirmarBaja.addEventListener('click', function() {

    fetch('app/actions/action-me-bajo.php') // Sin enviar datos del form (Sin Method ni body)
        .then(respuestaServer => respuestaServer.text())
        .then(respuestaParaNavegador => {
            popupBaja.classList.remove('visible');
            popupBaja.classList.add('oculto');
            popupAsistencia.classList.remove('oculto');
            popupAsistencia.classList.add('visible');
            mensajePopupAsistencia.textContent = respuestaParaNavegador;            
        })
        .catch(error => {
            mensajePopupAsistencia.textContent = "Error al enviar datos! Pruebe nuevamente en unos segundos.";
            // console.log(error); // Para debuggear.
            popupAsistencia.classList.remove('oculto');
            popupAsistencia.classList.add('visible-flex');
    });
    });
}

//***********************************************************************************************************************/

// ARMAR LOS EQUIPOS:

//***********************************************************************************************************************/

// FORMULARIO PARA CERRAR PARTIDOS (Convocatorias):

const formularioCerrarPartidos = document.getElementById("formulario-cerrar-partido");
const botonCerrarPartidos = document.getElementById("boton-cerrar-partidos");
const botonCancelarCerrarPartidos = document.getElementById("boton-cancelar-cerrar-partidos");

// Formulario:
if (formularioCerrarPartidos) {

    formularioCerrarPartidos.addEventListener("submit", function() {

    formularioCerrarPartidos.preventDefault();

    const datosdelFormulario = new FormData(formularioCerrarPartidos);
    
    // Envío de datos del form, vía POST:
    fetch("app/actions/action-cerrar-partido.php"), {
        method: "POST",
        body: datosdelFormulario
    })
    .then(respuestaServer => respuestaServer.text())
    .then(respuestaParaNavegador => {
        

    })


    })
}
