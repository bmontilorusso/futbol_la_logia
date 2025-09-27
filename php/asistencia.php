<?php

// CONFIRMACIÓN DE ASISTENCIA:

// Importaciones:
session_start();
include('conexion_db.php');

// Para traer el ID del partido:
$sqlIdPartido = "Select * from VISTA_PARTIDOS where ID_ESTADO_PARTIDO = 2;";
$resultadoIdPartido = mysqli_query($conn, $sqlIdPartido);
$filaResultadoIdPartido = mysqli_fetch_assoc($resultadoIdPartido);

// Para debugear:
// var_dump($_POST); //Registro de lo que llega vía POST (lo uso en el JS para imprimirlo en consola):

// Declaración y almacenamiento de Variables:
$idJugador = $_SESSION['id_jugador'];
$idPartido = $filaResultadoIdPartido['ID_PARTIDO'];

// Confirmación de Asistencia:

// Creación de Querys:
$sql = "INSERT INTO PARTIDOS_JUGADORES (ID_PARTIDO, ID_JUGADOR) VALUES ($idPartido, $idJugador);";
$resultado = mysqli_query($conn, $sql);

// Validación del éxito:

if ($resultado) {
    echo "Éxito al confirmar asistencia";
} else {
    echo "Error al intentar confirmar asistencia. Error:" . mysqli_error($conn);
}

?>