<?php

/************** Validación constante de credencailes de Usuario: ***************/

// Validamos que la sesión no esté interrumpida o inactiva. Si lo está, la inicia de nuevo.
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Validamos si la variable usuario tiene valor. Si no lo tiene, redirije al index/login.
if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.html");
    exit();
}

?>