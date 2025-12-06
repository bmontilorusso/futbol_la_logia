<?php

// CONFIRMACIÓN DE ASISTENCIA:

// Importaciones:
session_start();
include('../inc/conexion_db.php');

/***********************************************************************************************************/

// Para debugear:
// var_dump($_POST); // Registro de lo que llega vía POST (lo uso en el JS para imprimirlo en consola):

/***********************************************************************************************************/

// PASO 1: VALIDACIÓN DE PREVIO REGISTRO:

// Para traer el ID del partido y el techo (máximo) de jugadores:
$sqlIdPartido = "Select * from PARTIDOS where ID_ESTADO_PARTIDO = 2;";
$resultadoIdPartido = mysqli_query($conn, $sqlIdPartido);
$filaResultadoIdPartido = mysqli_fetch_assoc($resultadoIdPartido);
$idPartido = $filaResultadoIdPartido['ID_PARTIDO']; // ID_PARTIDO
$maxJugadores = $filaResultadoIdPartido['MAX_JUGADORES']; // MAX_JUGADORES

// Para traer los datos del Jugador:
$idJugador = $_SESSION['id_jugador'];
$juega = $_POST['juega'];

// Para verificar en relación JUGADOR-PARTIDO:
$sqlPartidosJugadores = "Select * from VISTA_PARTIDOS_JUGADORES Where ID_JUGADOR = $idJugador AND ID_PARTIDO = $idPartido;";
$resultadoPartidosJugadores = mysqli_query($conn, $sqlPartidosJugadores);
$filaPartidosJugadores = mysqli_fetch_assoc($resultadoPartidosJugadores);
$inscripcionPrevia = $filaPartidosJugadores['JUEGA'];

// Validación de Jugadores anotados hasta el momento:
$sqlJugadoresAnotados = "Select * from PARTIDOS_JUGADORES Where ID_PARTIDO = $idPartido AND JUEGA = 'SI';";
$resultadoJugadoresAnotados = mysqli_query($conn, $sqlJugadoresAnotados);
$cantidadResultadoJugadoresAnotados = mysqli_num_rows($resultadoJugadoresAnotados);

if ($cantidadResultadoJugadoresAnotados >= $maxJugadores) {

    echo "Ya no quedan lugares";

} else {
    
    if ($inscripcionPrevia == 'NO') {

        // Para cuando el jugador estuvo inscripto pero se bajó:
        $sql = "UPDATE PARTIDOS_JUGADORES SET JUEGA = 'SI' WHERE ID_JUGADOR = $idJugador AND ID_PARTIDO = $idPartido;";
        $resultado = mysqli_query($conn, $sql);

        if ($resultado) {
            echo "Éxito al re-confirmar asistencia";
        } else {
            echo "Error al intentar re-confirmar asistencia. Error:" . mysqli_error($conn);
        }

    } else {

        if ($inscripcionPrevia == 'SI') {

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

    }    

}




?>