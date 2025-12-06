<?php

// VALIDACIÓN DE PARTIDO ABIERTO:

require 'conexion_db.php';

// Variables para Forms:
$mostrarAbrirConvocatoria = false;
$mostrarConvocatoriaActiva = false;
$mostrarCerrarPartido = false;

function validacionPartidoAbierto ($conn) {
    $sql = "Select * from PARTIDOS Where ID_ESTADO_PARTIDO = 2;";
    $resultado = mysqli_query($conn, $sql);
    $detallePartido = mysqli_fetch_assoc($resultado) ?? null;
    return $detallePartido;
}

$partidoAbierto = validacionPartidoAbierto($conn);

if ($partidoAbierto) {
    $mostrarAbrirConvocatoria = false;
    $mostrarConvocatoriaActiva = true;
    $mostrarCerrarPartido = true;
} else {
    $mostrarAbrirConvocatoria = true;
    $mostrarConvocatoriaActiva = false;
    $mostrarCerrarPartido = false;
}



?>