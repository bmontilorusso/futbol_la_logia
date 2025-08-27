<?php

// Includes:
include('conexion_db.php');

// FUNCIONES PARA UTILIZAR DESPLEGABLES:

// Estadios:
function obtenerEstadios() {
    // Creación de Querys y variables:
    global $conn; // Si no la declaramos como global, la función no la "trae"
    $sql = "Select * from ESTADIOS order by NOMBRE ASC;";
    $resultado = mysqli_query($conn, $sql);
    $estadiosListado = [];
    // Bucle While para ir llenando el Array EstadiosListado:
    while($filaEstadios = mysqli_fetch_assoc($resultado)) {
        $estadiosListado[] = $filaEstadios; // Agrego el último estadio a cada iteración.
    }
    // Retorno de Listado completo:
    return $estadiosListado;
}

// Tipo de Partido:
function obtenerTipoPartido() {
    global $conn;
    $sql = "Select * from TIPO_PARTIDO;";
    $resultado = mysqli_query($conn, $sql);
    $tipoPartidoListado = [];
    while( $filaTipoPartido = mysqli_fetch_assoc($resultado)) {
        $tipoPartidoListado[] = $filaTipoPartido;
    }
    return $tipoPartidoListado;
}


?>