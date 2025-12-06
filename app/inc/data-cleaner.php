<?php

// Limpiador de datos:
function limpiadorDatos($dato) {
    // Si no viene el key o si viene como null:
    if (!isset($dato)) {
        return null;
    }
    // Quitar espacios:
    $dato = trim($dato);
    // Si queda vacío:
    if($dato === "") {
        return null;
    }
    return $dato;
}

// convertir a null:
function isNull($valor) {
    $valorLimpio = is_null($valor) ? "null" : $valor;
    return $valorLimpio;
}

?>