<?php

// ALTA DE JUGADOR:

// Importaciones:
include('conexion_db.php');

// Declaración de variables:
$nombreJugador = trim($_POST['nombreJugador']);
$apellidoJugador = trim($_POST['apellidoJugador']);
$regionOrigenJugador = $_POST['regionOrigenJugador'];
$posicionPrincipalJugador = $_POST['posicionPrincipalJugador'];
$posicionAlternativaJugador = $_POST['posicionAlternativaJugador'];

// Generación de Querys:

// Para Insertar en Tabla JUGADORES:
$sql = "INSERT INTO JUGADORES (NOMBRE, APELLIDO, ID_REGION, ID_POSICION_PRINCIPAL, ID_POSICION_ALT) VALUES ('$nombreJugador', '$apellidoJugador', '$regionOrigenJugador', '$posicionPrincipalJugador', '$posicionAlternativaJugador');";

// Resultados ALTA JUGADORES:
$resultadoAltaJugadores = mysqli_query($conn, $sql);

// Para insertar en la tabla MEDIA_JUGADORES:
$nuevoIDjugadorIngresado = mysqli_insert_id($conn); // para obtener el el ID recientemente generado. Necesita SI O SI que el ID sea PK auto_INCREMENT. Sempre se debe llamar inmediatamente después del INSERT.

// Para Insertar en la tabla MEDIA_JUGADORES:
$sqlMediaJugadores = "INSERT INTO MEDIA_JUGADORES (ID_JUGADOR, VALORACION_GENERAL, CANT_MVP_ORO, CANT_MVP_PLATA, CANT_MVP_BRONCE, MEDALLERO, CANT_PUNTOS, CANT_VOTOS, PROMEDIO, PARTIDOS_JUGADOS, PROMEDIO_PARTIDOS_JUGADOS) VALUES ('$nuevoIDjugadorIngresado', 70, 0, 0, 0, 0, 0, 0, 0, 0, 0);";

// Resultados ALTA MEDIA_JUGADORES:
$resultadoMediaJugadores = mysqli_query($conn, $sqlMediaJugadores);

// validación de éxito en Alta:

if ($resultadoAltaJugadores) {
    echo "Éxito al crear al jugador: " . $nombreJugador . $apellidoJugador . ".";
} else {
    echo "Error al hacer alta: " . mysqli_error($conn);
}

if ($resultadoMediaJugadores) {
    echo "Éxito al crear al jugador: " . $nombreJugador . $apellidoJugador . ".";
} else {
    echo "Error al hacer alta: " . mysqli_error($conn);
}


?>
