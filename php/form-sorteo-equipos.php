<?php
    include('validacion_sesion.php');
    include('conexion_db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Logia Fútbol - Home</title>
    <!-- Conexiones Locales: -->
    <link rel="icon" type="img/png" href="../img/ico/favicon-32x32.png">
    <link rel="preload" href="../css/style.css" as="style">
    <link rel="stylesheet" href="../css/normalize.css" as="style">
    <link rel="stylesheet" href="../css/style.css" as="style">    
    <!-- Conexiones Externas: -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&family=Rubik:ital,wght@0,300..900;1,300..900&family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body>

    <!-- VENTANA APLICACIÓN -->
    <div class="ventana-aplicacion">

        <main class="main">

            <!-- Armar equipos: -->
            <header class="header">
                <h1>Armar equipos:</h1>
            </header>            
            <div class="botonera-home">
                <button class="boton">Full Random</button>
                <button class="boton">Random + POS</button>
                <button class="boton">Random + POS + VAL</button>
            </div>
            
            <!-- PopUp final (notificación) -->
            <div class="popUp-convocatoria oculto ventana-convocatoria" id="popupAsistencia">
                <p id="mensaje-popup-asistencia"></p>
                <button type="button" id="boton-cerrar-asistencia" class="boton">Cerrar</button>
            </div>

            </div> <!-- Fin de la Ventana-aplicación -->

        </main>
        
        <!-- BOTONERA HOME-->
        <div class="botonera-home">
            <a href="form-jugadores.php" class="boton botones-home">
                <img src="../img/ico/jugadores.png" alt="Jugadores">
                <h2>Jugadores</h2>
            </a>
            <div class="boton botones-home">
                <img src="../img/ico/MVP.png" alt="MVP">
                <h2>MVP</h2>
            </div>
            <div class="boton botones-home">
                <img src="../img/ico/stats.png" alt="Stats">
                <h2>Estadísticas</h2>
            </div>
        </div> <!-- FIN Botonera Home -->

    </div>

    <footer class="footer">
        <p>© 2025 Holly Molly Studios • Desarrollado con 💾, ❤️ y mucho ☕</p>
    </footer> <!-- Fin del Footer -->

    <!-- Script: -->
    <script src="../js/script.js"></script>    
    
</body>
</html>