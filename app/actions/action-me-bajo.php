<?php

// BAJAR MI ASISTENCIA

// Imports:
session_start();
include('../inc/conexion_db.php');

// Variables:

// ID del partido:
$sqlPartido = "Select * from PARTIDOS Where ID_ESTADO_PARTIDO = 2;";
$resultadoPartido = mysqli_query($conn, $sqlPartido);
$filaResultadoPartido = mysqli_fetch_assoc($resultadoPartido);
$idPartidoActivo = $filaResultadoPartido['ID_PARTIDO']; // ID_PARTIDO

// ID del jugador:
$idJugador = $_SESSION['id_jugador']; // ID_JUGADOR

// Validación previa:
$sqlValidacionPrevia = "Select * from PARTIDOS_JUGADORES Where ID_PARTIDO = $idPartidoActivo AND ID_JUGADOR = $idJugador;";
$resultadoValidacionPrevia = mysqli_query($conn, $sqlValidacionPrevia);
$filaResultadoValidacionPrevia = mysqli_fetch_assoc($resultadoValidacionPrevia);
$juega = $filaResultadoValidacionPrevia['JUEGA'];

// BAJA:
if($juega == 'NO') {
    echo "El jugador ya fue dado de baja";
} else {

    $sqlBaja = "UPDATE PARTIDOS_JUGADORES SET JUEGA = 'NO' Where ID_PARTIDO = $idPartidoActivo AND ID_JUGADOR = $idJugador;";
    $resultadoBaja = mysqli_query($conn, $sqlBaja);

    // Validación de éxito:
    if($sqlBaja) {
        echo "Baja del partido confirmada. Y si sos el cabe CHUPAME LA PIJA!!! ";
    } else {
        echo "Error al intentar realizar la baja. Pruebe en unos minutos. Detalle del error: " . mysqli_error($sqlBaja);
    };

}

?>