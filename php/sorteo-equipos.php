<?php

// Imports:
session_start();
include('conexion_db.php');

// Traer el ID del partido:
$sqlPartidoActivo = "Select * from PARTIDOS Where ID_ESTADO_PARTIDO = 2;";
$resultadoPartidoActivo = mysqli_query($conn, $sqlPartidoActivo);
$filaPartidoActivo = mysqli_fetch_assoc($resultadoPartidoActivo);
$idPartidoActivo = $filaPartidoActivo['ID_PARTIDO'];

// Traer lista de convocados:
$sqlConvocados = "Select * from PARTIDOS_JUGADORES Where ID_PARTIDO = $idPartidoActivo;";
$resultadoConvocados = mysqli_query($conn, $sqlConvocados);





?>