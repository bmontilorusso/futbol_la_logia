<?php

/************** Convocatoria: ***************/

// Importaciones:

include('conexion_db.php');

// Declaración y almacenamiento de Variables:
$fecha = $_POST['fecha'];
$hora = $_POST['time'];
$estadio = $_POST['estadio'];
$tipoPartido = $_POST['tipo-partido'];
// Conversiones de Checkbox:
$asistenciaUsuario = isset($_POST['asistencia-usuario']) ? $_POST['asistencia-usuario'] : 'NO'; // Si trae valor, lo guardamos (configuré para que venga directamente con un "SI". Si el User no lo marca, entonces guarda "NO").

/* ALTA DE PARTIDO: */
// Creación de Query:
$sql = "INSERT INTO PARTIDOS (ID_ESTADIO, FECHA, HORA, ID_TIPO_PARTIDO, ID_ESTADO_PARTIDO) VALUES ($estadio, '$fecha', '$hora', $estadio, $tipoPartido);";
$resultado = mysqli_query($conn, $sql);

/* INSERSIÓN de JUGADOR en CONVOCATORIA: */



// Validación de Alta de Partido Exitosa:

if ($resultado) {
    echo "Alta de Partido Existosa!";
} else {
    echo "Error al intentar hacer alta, debido a: " . mysqli_error();
}


?>