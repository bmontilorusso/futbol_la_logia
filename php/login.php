<?php

/************** Login: ***************/

// Importaciones:
include('conexion_db.php');

// Declaración y almacenamiento de Variables:
$usuario = trim($_POST['usuario']);
$pass = $_POST['pass'];

// Creación de Query:
$sql = "Select * from USUARIOS Where BINARY USUARIO = '$usuario' AND PASS = '$pass';";
$resultado = mysqli_query($conn, $sql);

if (mysqli_num_rows($resultado) == 1) {

    // Iniciamos sesión:
    session_start();

    // Creación de Variables de USUARIO:
    $_SESSION['usuario'] = $usuario;
    $fila = mysqli_fetch_assoc($resultado);
    $_SESSION['id_usuario'] = $fila['ID_USUARIO'];
    $_SESSION['nombre'] = $fila['NOMBRE'];
    $_SESSION['id_jugador'] = $fila['ID_JUGADOR'];

    // Redireccionamiento:
    header("Location: home.php");
    exit();

} else {

    echo "Usuario y/o contraseña incorrecta.";

};

?>