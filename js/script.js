// FORMULARIO DE ALTA DE PARTIDOS(Convocatoria):

const formularioAltaPartidos = document.getElementById("formulario-convocatoria");
const popupAltaConvocatoria = document.getElementById("popUp-convocatoria");
const mensajepopupAltaConvocatoria = document.getElementById("mensaje-popup-convocatoria");
const cerrarPopUpAltaConvocatoria = document.getElementById("boton-cerrar-convocatoria");

formularioAltaPartidos.addEventListener("submit", function(e) {
    e.preventDefault(); // Para evitar el pantallazo blanco.

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