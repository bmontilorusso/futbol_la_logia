<?php

// ANOTAR A UN AMIGO:

// Imports:
session_start();
include('conexion_db.php');

$nombreAmigo = $_POST['nombreAmigo'];
$nombreUsuario = $_SESSION['nombre'];
$posicionPrincipalAmigo = $_POST['posicionPrincipalAmigo'];
$idUsuario = $_SESSION['id_usuario'];
$juega = $_POST['juega'];

// Inserción en Tabla JUGADORES y retorno de datos:
$sql = "INSERT INTO JUGADORES (NOMBRE, APELLIDO, ID_POSICION_PRINCIPAL, TIENE_USUARIO, ID_USUARIO_ALTA) VALUES ('$nombreAmigo', '(Amigo de " . $nombreUsuario . ")', $posicionPrincipalAmigo, 'NO', $idUsuario);";
$resultado = mysqli_query($conn, $sql);

$sqlAmigoJugadorNuevo = "Select ID_JUGADOR from JUGADORES Where ID_USUARIO_ALTA = $idUsuario ORDER BY ID_JUGADOR DESC LIMIT 1;";
$resultadoAmigoJugadorNuevo = mysqli_query($conn, $sqlAmigoJugadorNuevo);
$filaResltadoAmigoJugadorNuevo = mysqli_fetch_assoc($resultadoAmigoJugadorNuevo);
$idJugadorAmigo = $filaResltadoAmigoJugadorNuevo['ID_JUGADOR'];

// Traer los datos del partido:
$sqlPartido = "Select * from PARTIDOS Where ID_ESTADO_PARTIDO = 2;";
$resultadoPartido = mysqli_query($conn, $sqlPartido);
$filaResultadoPartido = mysqli_fetch_assoc($resultadoPartido);
$idPartido = $filaResultadoPartido['ID_PARTIDO'];
$maxJugadores = $filaResultadoPartido['MAX_JUGADORES'];

// Consultar cuántos jugadores hay anotados:
$sqlJugadoresAnotados = "Select * FROM PARTIDOS_JUGADORES Where ID_PARTIDO = $idPartido AND JUEGA = 'SI';";
$resultadoJugadoresAnotados = mysqli_query($conn, $sqlJugadoresAnotados);
$cantidadResultadoJugadoresAnotados = mysqli_num_rows($resultadoJugadoresAnotados);

if ($cantidadResultadoJugadoresAnotados >= $maxJugadores) {
    echo "Ya no hay lugares";
    echo "límite: " . $maxJugadores;
    echo "Jugadores anotados hasta ahora: " . $cantidadResultadoJugadoresAnotados;
} else {

    // Inserción en la Tabla PARTIDOS_JUGADORES:
    $sqlPartido = "INSERT INTO PARTIDOS_JUGADORES (ID_PARTIDO, ID_JUGADOR, JUEGA) VALUES ($idPartido, $idJugadorAmigo, '$juega');";
    $resultadoPartido = mysqli_query($conn, $sqlPartido);

    // Validación del éxito:
    if ($resultadoPartido) {
        echo "Éxito al confirmar a tu amigo!";
    } else {
        echo "Error al intentar confirmar asistencia. Error:" . mysqli_error($conn);
}

}


?>