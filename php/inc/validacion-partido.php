<?php

// VALIDACIÓN DE PARTIDO ABIERTO:

require 'conexion_db.php';

// Variables para Forms:
$mostrarAbrirConvocatoria = false;
$mostrarAltaJugador = false;
$mostrarAltaUsuario = false;
$mostrarConvocatoriaActiva = false;
$mostrarCerrarPartido = false;

function validacionPartidoAbierto ($conn) {
    $sql = "Select * from PARTIDOS Where ID_ESTADO_PARTIDO = 2;";
    $resultado = mysqli_query($conn, $sql);
    $detallePartido = mysqli_fetch_assoc($resultado) ?? null;
    return $detallePartido;
}



?>