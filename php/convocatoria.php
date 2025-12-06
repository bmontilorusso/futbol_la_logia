<?php

/************** Convocatoria: ***************/

// Importaciones:

session_start();
include('conexion_db.php');

// Para debugear:
// var_dump($_POST); //Registro de lo que llega vía POST (lo uso en el JS para imprimirlo en consola):


// Declaración y almacenamiento de Variables:
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$estadio = $_POST['estadio'];
$tipoPartido = $_POST['tipo-partido'];
// Conversiones de Checkbox:
$asistenciaUsuario = $_POST['asistencia-usuario'];
// Arrastramos de la SESION:
$IDusuarioAltaConvocatoria = $_SESSION['id_usuario'];

// Para conocer el límite de jugadores:
$sqlMaxJugadores = "Select * from ESTADIOS Where ID_ESTADIO = $estadio;";
$resultadoMaxJugadores = mysqli_query($conn, $sqlMaxJugadores);
$filaMaxJugadores= mysqli_fetch_assoc($resultadoMaxJugadores);
$maxJugadores = ($filaMaxJugadores['CANCHA_DE'])*2;

// Validación de Partido abierto previamente:
$sqlPartidoPrevio = "Select * from VISTA_PARTIDOS Where ID_ESTADO_PARTIDO = 2;";
$resultadoPartidoPrevio = mysqli_query($conn, $sqlPartidoPrevio);
$filaResultadoPartidoPRevio = mysqli_fetch_assoc($resultadoPartidoPrevio);

if ($filaResultadoPartidoPRevio) {

    echo "Ya hay una convocatoria abierta!";
    
} else {

    /* ALTA DE PARTIDO: */
    // Creación de Query:
    $sql = "INSERT INTO PARTIDOS (ID_ESTADIO, MAX_JUGADORES, FECHA, HORA, ID_TIPO_PARTIDO, ID_ESTADO_PARTIDO, ID_ESTADO_VOTACION_MVP, ID_USUARIO_ALTA, ESTADO_CONVOCATORIA) VALUES ($estadio, $maxJugadores, '$fecha', '$hora', $tipoPartido, 2, 1, $IDusuarioAltaConvocatoria, 1);";
    $resultado = mysqli_query($conn, $sql);

    /* INSERSIÓN de JUGADOR en CONVOCATORIA: */
    $partidoCreado = "Select * from VISTA_PARTIDOS where ID_ESTADO_PARTIDO = 2 LIMIT 1";
    $resultadoPartidoCreado = mysqli_query($conn, $partidoCreado);
    $filaPartidoCreado = mysqli_fetch_assoc($resultadoPartidoCreado);
    $idPartido = $filaPartidoCreado['ID_PARTIDO'];

    $sqlAsistencia = "INSERT INTO PARTIDOS_JUGADORES (ID_PARTIDO, ID_JUGADOR, JUEGA) VALUES ($idPartido, $IDusuarioAltaConvocatoria, '$asistenciaUsuario');";
    $resultadoAsistencia = mysqli_query($conn, $sqlAsistencia);

    // Validación de Alta de Partido Exitosa:

    if ($resultado) {
        echo "Alta de Partido Existosa!";
        if ($resultadoAsistencia) {
            echo "Éxito al cargar la Asistencia del Jugador!";
        }
    } else {
        echo "Error al intentar hacer alta, debido a: " . mysqli_error($conn);
    }

}

?>