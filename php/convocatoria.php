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
$asistenciaUsuario = isset($_POST['asistencia-usuario']) ? $_POST['asistencia-usuario'] : 'NO'; // Si trae valor, lo guardamos (configuré para que venga directamente con un "SI". Si el User no lo marca, entonces guarda "NO").
// Arrastramos de la SESION:
$IDusuarioAltaConvocatoria = $_SESSION['id_usuario'];

// Para conocer el límite de jugadores:
$sqlMaxJugadores = "Select * from ESTADIOS Where ID_ESTADIO = $estadio;";
$resultadoMaxJugadores = mysqli_query($conn, $sqlMaxJugadores);
$filaMaxJugadores= mysqli_fetch_assoc($resultadoMaxJugadores);
$maxJugadores = ($filaMaxJugadores['CANCHA_DE'])*2;

/* ALTA DE PARTIDO: */
// Creación de Query:
$sql = "INSERT INTO PARTIDOS (ID_ESTADIO, MAX_JUGADORES, FECHA, HORA, ID_TIPO_PARTIDO, ID_ESTADO_PARTIDO, ID_ESTADO_VOTACION_MVP, ID_USUARIO_ALTA) VALUES ($estadio, $maxJugadores, '$fecha', '$hora', $tipoPartido, 2, 1, $IDusuarioAltaConvocatoria);";
$resultado = mysqli_query($conn, $sql);

/* INSERSIÓN de JUGADOR en CONVOCATORIA: */



// Validación de Alta de Partido Exitosa:

if ($resultado) {
    echo "Alta de Partido Existosa!";
} else {
    echo "Error al intentar hacer alta, debido a: " . mysqli_error($conn);
}


?>