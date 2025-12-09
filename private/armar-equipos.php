<?php
    require '../app/inc/validacion_sesion.php';
    require '../app/inc/conexion_db.php';
    require '../app/inc/validacion-partido.php'
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Logia Fútbol - Home</title>
    <!-- Conexiones Locales: -->
    <link rel="icon" type="img/png" href="../assets/img/ico/favicon-32x32.png">
    <link rel="preload" href="../assets/css/style.css" as="style">
    <link rel="stylesheet" href="../assets/css/normalize.css" as="style">
    <link rel="stylesheet" href="../assets/css/style.css" as="style">
    <!-- Conexiones Externas: -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&family=Rubik:ital,wght@0,300..900;1,300..900&family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
</head>

<body>

    <!-- VENTANA APLICACIÓN -->
    <div class="ventana-aplicacion">

        <header class="header">
            <h1>La Logia Fútbol</h1>
        </header>

        <main class="main">

            <!-- Armar equipos: -->
            <div class="formulario-convocatoria visible" id="popup-armar-equipos">
                <form class="armar-equipos" id="form-armar-equipos">
                    <h2>Armar equipos</h2>

                    <button type="button" class="boton" id="boton-full-random">Full random</button>
                    <button type="button" class="boton">Random + POS</button>
                    <button type="button" class="boton">Random + POS + VG</button>

                    <?php
                        $sqlPartidoActivo = "Select * from VISTA_PARTIDOS where ID_ESTADO_PARTIDO = 2 order by ID_PARTIDO DESC;";
                        $resultadoPartidoActivo = mysqli_query($conn, $sqlPartidoActivo);
                        $fila = mysqli_fetch_assoc($resultadoPartidoActivo);
                    ?>
                    <?php
                        $idPartidoActivo = $fila['ID_PARTIDO'];
                        $sqlJugadoresConvocados = "Select * from VISTA_PARTIDOS_JUGADORES Where ID_PARTIDO = $idPartidoActivo AND JUEGA = 'SI' ORDER BY RAND();";
                        $resultadoJugadoresConvocados = mysqli_query($conn, $sqlJugadoresConvocados);
                        $sqlJugadoresOut = "Select * from VISTA_PARTIDOS_JUGADORES Where ID_PARTIDO = $idPartidoActivo AND JUEGA = 'NO';";
                        $resultadoJugadoresOut = mysqli_query($conn, $sqlJugadoresOut);
                        $cantidadJugadoresConvocados = mysqli_num_rows($resultadoJugadoresConvocados);                        
                    ?>

                    <div class="grilla-jugadores-convocados">
                        <div class="nombre-pos-grilla-convocados cabezal">
                            <p>Equipo Local</p>
                        </div>
                        <div class="nombre-pos-grilla-convocados cabezal">
                            <p>Equipo Visitante</p>
                        </div>
                        <?php while ($filaResultadoJugadoresConvocados = mysqli_fetch_assoc($resultadoJugadoresConvocados)):?>
                        <div class="nombre-pos-grilla-convocados">
                            <p><?php echo $filaResultadoJugadoresConvocados['NOMBRE'] . " " . $filaResultadoJugadoresConvocados['APELLIDO']; ?>
                            </p>
                            <?php
                                $clasePOS = '';
                                switch($filaResultadoJugadoresConvocados['POS_PRINCIPAL']) {
                                case 'POR':
                                $clasePOS = "color-por";
                                break;
                                case 'DEF':
                                $clasePOS = "color-def";
                                break;
                                case 'MED':
                                $clasePOS = "color-med";
                                break;
                                case 'DEL':
                                $clasePOS = "color-del";
                                break;
                                default:
                                $clasePOS = "color-por";
                                break;                                            
                                }
                            ?>
                            <p class="posicion-grilla <?php echo $clasePOS ?>">
                                <?php echo $filaResultadoJugadoresConvocados['POS_PRINCIPAL']; ?></p>
                        </div>
                        <?php endwhile; ?>
                    </div>

                    <button class="boton boton-invitar-amigo" name="juega" value="SI" type="submit">Registrar
                        amigo</button>
                    <button class="boton cancelar-invitar-amigo" id="boton-Cancelar-armar-equipos"
                        type="button">Cancelar</button>

                </form>
            </div>



        </main>
    </div> <!-- Fin de la Ventana-aplicación -->

    <!-- BOTONERA HOME-->
    <div class="botonera-home">
        <a href="form-jugadores.php" class="boton botones-home">
            <img src="assets/img/ico/jugadores.png" alt="Jugadores">
            <h2>Jugadores</h2>
        </a>
        <div class="boton botones-home">
            <img src="assets/img/ico/MVP.png" alt="MVP">
            <h2>MVP</h2>
        </div>
        <div class="boton botones-home">
            <img src="assets/img/ico/stats.png" alt="Stats">
            <h2>Estadísticas</h2>
        </div>
    </div> <!-- FIN Botonera Home -->

    <footer class="footer">
        <p>© 2025 Holly Molly Studios • Desarrollado con 💾, ❤️ y mucho ☕</p>
    </footer> <!-- Fin del Footer -->

    <!-- Script: -->
    <script src="../assets/js/script.js"></script>

</body>

</html>