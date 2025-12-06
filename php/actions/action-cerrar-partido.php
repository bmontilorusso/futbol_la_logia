<?php

// CERRAR PARTIDO:

// Importaciones:
session_start();
include('../inc/conexion_db.php');
include('../inc/data-cleaner.php');

// Datos y Variables:
$golesLocal = trim($_POST['golesLocal']);
$golesVisitante = trim($_POST['golesVisitante']);
$idClima = limpiadorDatos($_POST['idClima'] ?? null);
$idEstadoPartido = trim($_POST['idEstadoPartido']);
$idMotivoNoJugado = limpiadorDatos($_POST['idMotivoNoJugado'] ?? null);
$idGolDeOro = limpiadorDatos($_POST['idGolDeOro'] ?? null);
$habilitarMVP = trim($_POST['habilitarMVP']);

// Limpieza de los NO null:
$idClima = isNull($idClima);
$idMotivoNoJugado = isNull($idMotivoNoJugado);
$idGolDeOro = isNull($idGolDeOro);


// Datos del partido abierto:
$sqlPartidoAbierto = "Select ID_PARTIDO from PARTIDOS Where ID_ESTADO_PARTIDO = 2;";
$resultadoPartidoAbierto = mysqli_query($conn, $sqlPartidoAbierto);
$filaResultadoPartidoAbierto = mysqli_fetch_assoc($resultadoPartidoAbierto);
$idPartidoAbierto = $filaResultadoPartidoAbierto['ID_PARTIDO'];

// Cambio de estado y resultado del partido:
$sqlCambioEstadoPartido = "UPDATE PARTIDOS SET ID_ESTADO_PARTIDO = $idEstadoPartido, GOLES_LOCAL = $golesLocal, GOLES_VISITANTE = $golesVisitante, ID_CLIMA = $idClima, ID_MOTIVO_NO_JUGADO = $idMotivoNoJugado, ESTADO_CONVOCATORIA = 0 Where ID_PARTIDO = $idPartidoAbierto;";

$resultadoCambioEstadoPartido = mysqli_query($conn, $sqlCambioEstadoPartido);

if($resultadoCambioEstadoPartido) {
    echo "Éxito al cerrar Partido";
} else {
    echo "Hubo algún error. Probar nuevamente. Detalle del error: " . mysqli_error($conn);
}

// Para la votación del MVP:







?>