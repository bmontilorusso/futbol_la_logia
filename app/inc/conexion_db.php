<?php

/************** Conexión a la Base de Datos: ***************/

// Declaración de variables para los parámetros de acceso a la DB:

$servidor = 'localhost';
$usurioServidor = 'root';
$passServidor = ''; // vacío por defecto.
$nombreDB = 'futbol_la_logia';

// Creación de la conexión:

$conn = mysqli_connect($servidor, $usurioServidor, $passServidor, $nombreDB);

// Validación de conexión exitosa:

if (!$conn) {
    die ("Algo salió mal al intentar conectar con la base de datos del servidor" . mysqli_connect_error());
};

?>