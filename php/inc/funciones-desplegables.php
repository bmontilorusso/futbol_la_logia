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
    $estadiosListado = []; // Creo un array vacío.
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

// Región:
function obtenerRegion() {
    global $conn;
    $sql = "Select * from REGION;";
    $resultado = mysqli_query($conn, $sql);
    $regionListado = [];
    while( $filaRegion = mysqli_fetch_assoc($resultado)) {
        $regionListado[] = $filaRegion;
    }
    return $regionListado;
}

// Posición del jugador:
function obtenerPosicion() {
    global $conn;
    $sql = "Select * from POSICIONES_JUGADOR;";
    $resultado = mysqli_query($conn, $sql);
    $posicionesListado = [];
    While( $filaPosiciones = mysqli_fetch_assoc($resultado)) {
        $posicionesListado[] = $filaPosiciones;
    }
    return $posicionesListado;
}

// Motivo de baja de Jugadores:
function obtenerMotivoBajaJugadores() {
    global $conn;
    $sql = "Select * from MOTIVO_BAJA_JUGADOR;";
    $restulado = mysqli_query($conn, $sql);
    $motivoBajaListado = [];
    while($filaMotivosBaja = mysqli_fetch_assoc($restulado)) {
        $motivoBajaListado[] = $filaMotivosBaja; 
    }
    return $motivoBajaListado;
}

// Clima:
function obtenerClima() {
    global $conn;
    $sql = "Select * from CLIMA;";
    $resultado = mysqli_query($conn, $sql);
    $climaListado = [];
    while($filaClima = mysqli_fetch_assoc($resultado)) {
        $climaListado[] = $filaClima;
    }
    return $climaListado;
}

// Motivos de NO jugado:
function obtenerMotivoNoJugado() {
    global $conn;
    $sql = "Select * from MOTIVO_NO_JUGADO;";
    $resultado = mysqli_query($conn, $sql);
    $motivoNoJugadoListado = [];
    while($filaMotivoNoJugado = mysqli_fetch_assoc($restulado)) {
        $motivoNoJugadoListado[] = $filaMotivoNoJugado;
    }
    return $motivoNoJugadoListado;
}

// Estado del partido:
function obtenerEstadoPartido() {
    global $conn;
    $sql = "Select * from ESTADO_PARTIDO;";
    $restulado = mysqli_query($conn, $sql);
    $estadoPartidoListado = [];
    while($filaEstadoPartido = mysqli_fetch_assoc($restulado)) {
        $estadoPartidoListado[] = $filaEstadoPartido;
    }
    return $estadoPartidoListado;
}


?>