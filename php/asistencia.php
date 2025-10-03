<?php

// CONFIRMACIÓN DE ASISTENCIA:

// Importaciones:
session_start();
include('conexion_db.php');

/***********************************************************************************************************/

// Para debugear:
// var_dump($_POST); // Registro de lo que llega vía POST (lo uso en el JS para imprimirlo en consola):

/***********************************************************************************************************/

// PASO 1: VALIDACIÓN DE PREVIO REGISTRO:

// Para traer el ID del partido:
$sqlIdPartido = "Select * from VISTA_PARTIDOS where ID_ESTADO_PARTIDO = 2;";
$resultadoIdPartido = mysqli_query($conn, $sqlIdPartido);
$filaResultadoIdPartido = mysqli_fetch_assoc($resultadoIdPartido);

// Para traer los datos del Jugador:
$idJugador = $_SESSION['id_jugador'];
$idPartido = $filaResultadoIdPartido['ID_PARTIDO'];
$juega = $_POST['juega'];

// Para verificar en relación JUGADOR-PARTIDO:
$sqlPartidosJugadores = "Select * from VISTA_PARTIDOS_JUGADORES Where ID_JUGADOR = $idJugador AND ID_PARTIDO = $idPartido;";
$resultadoPartidosJugadores = mysqli_query($conn, $sqlPartidosJugadores);
$filaPartidosJugadores = mysqli_fetch_assoc($resultadoPartidosJugadores);

if ($filaPartidosJugadores) {

    // El jugadore NO SE TIENE QUE PODER INGRESAR!
    echo "El jugador ya está registrado.";

} else {
    
    // CONFIRMACIÓN DE ASISTENCIA:
    // Creación de Querys:
    $sql = "INSERT INTO PARTIDOS_JUGADORES (ID_PARTIDO, ID_JUGADOR, JUEGA) VALUES ($idPartido, $idJugador, '$juega');";
    $resultado = mysqli_query($conn, $sql);
    // Validación del éxito:
    if ($resultado) {
        echo "Éxito al confirmar asistencia";
    } else {
        echo "Error al intentar confirmar asistencia. Error:" . mysqli_error($conn);
    }
}



?>