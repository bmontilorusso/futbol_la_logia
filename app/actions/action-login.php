<?php

/************** Login: ***************/

// Importaciones:
include('../inc/conexion_db.php');

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

    // JSON para generar redireccionamiento:
    
    // header("Location: /home.php");
    // exit(); // Lo que usé en un comienzo, antes de usar Fetch + JSON.

    echo json_encode([
        "status" => "ok",
        "redirect" => "/home.php"
    ]);
    exit;

} else {

    echo json_encode([
        "status" => "Error",
        "mensaje" => "Usuario y/o contraseña incorrecta."
    ]);

    // echo "Usuario y/o contraseña incorrecta."; // Lo que usé en un comienzo, antes de usar Fetch + JSON.

};

?>