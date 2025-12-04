<?php

// CERRAR PARTIDO:

// Importaciones:
session_start();
include('../inc/conexion_db.php');

var_dump($_POST);

// Datos y Variables:
$golesLocal = $_POST['golesLocal'];
$golesVisitante = $_POST['golesVisitante'];
$idClima = $_POST['idClima'];
$idEstadoPartido = $_POST['idEstadoPartido'];
$idMotivoNoJugarse = $_POST['idMotivoNoJugarse'];
$idGolDeOro = $_POST['idGolDeOro'];
$habilitarMVP = $_POST['habilitarMVP'];

// Datos del partido abierto:
$sqlPartidoAbierto = "Select ID_PARTIDO from PARTIDOS Where ID_ESTADO_PARTIDO = 2;";
$resultadoPartidoAbierto = mysqli_query($conn, $sqlPartidoAbierto);
$filaResultadoPartidoAbierto = mysqli_fetch_assoc($resultadoPartidoAbierto);
$idPartidoAbierto = $filaResultadoPartidoAbierto['ID_PARTIDO'];

// Cambio de estado y resultado del partido:
$sqlCambioEstadoPartido = "UPDATE PARTIDOS SET ID_ESTADO_PARTIDO = $idEstadoPartido, GOLES_LOCAL = $golesLocal, GOLES_VISITANTE = $golesVisitante, ID_CLIMA = $idClima, ID_MOTIVO_NO_JUGADO Where ID_PARTIDO = $idPartidoAbierto;";



// Para la votación del MVP:





?>