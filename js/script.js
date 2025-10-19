// FORMULARIO DE ALTA DE PARTIDOS(Convocatoria):

const formularioAltaPartidos = document.getElementById("formulario-convocatoria");
const popupAltaConvocatoria = document.getElementById("popUp-convocatoria");
const mensajepopupAltaConvocatoria = document.getElementById("mensaje-popup-convocatoria");
const cerrarPopUpAltaConvocatoria = document.getElementById("boton-cerrar-convocatoria");

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
        formularioAltaPartidos.querySelector("input").blur(); // Para que no se posición en el prmier input y NO arroje el required de golpe al cerrar PopUp.
    })
    .catch(error => {
        mensajepopupAltaConvocatoria.textContent = "Error al enviar datos";
        popupAltaConvocatoria.classList.remove('oculto');
        popupAltaConvocatoria.classList.add('visible');
    });
});

// Botón de cerrar el Popup:
cerrarPopUpAltaConvocatoria.addEventListener("click", function(){
    popupAltaConvocatoria.classList.remove('visible');
    popupAltaConvocatoria.classList.add('oculto');
});

//***********************************************************************************************************************/

// FORMULARIO DE CONFIRMACIÓN DE ASISTENCIA:

const formularioAsistencia = document.getElementById('formulario-asistencia');
const popupAsistencia = document.getElementById('popupAsistencia');
const mensajePopupAsistencia = document.getElementById('mensaje-popup-asistencia');
const cerrarPopupAsistencia = document.getElementById('boton-cerrar-asistencia');

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
    fetch("asistencia.php", {
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
    })
    .catch(error => {
        mensajePopupAsistencia.textContent = "Error al enviar datos";
        popupAsistencia.classList.remove('oculto');
        popupAsistencia.classList.add('visible');
    });
});

// Botón para cerrar PopUp (Asistencia):
cerrarPopupAsistencia.addEventListener("click", function(){
    popupAsistencia.classList.remove('visible');
    popupAsistencia.classList.add('oculto');
});

//***********************************************************************************************************************/

// Invitar a un amigo:

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
        datosDelFormularioLlevoUnAmigo.append(evento.submitter.name, evento.submitter.vale);
    }

    fetch("asistencia-amigo.php", {
        method: "POST",
        body: datosDelFormularioLlevoUnAmigo
    })
    .then(respuestaServer => respuestaServer.text())
    .then(respuestaParaNavegador => {
        popupAmigo.classList.add('oculto');
        popupAmigo.classList.remove('visible');
        mensajePopupAsistencia.textContent = "Amigo Registrado con éxito";
        popupAltaConvocatoria.classList.remove('oculto');
        popupAltaConvocatoria.classList.add('visible');

    })
    .catch(error => {
        mensajePopupAsistencia.textContent = "Error al enviar datos";
        console.log(error);
        popupAsistencia.classList.remove('oculto');
        popupAsistencia.classList.add('visible');
    });
});



