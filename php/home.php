<?php
    include('validacion_sesion.php');
    include('conexion_db.php');
    include('funciones-desplegables.php');    
        $estadios = obtenerEstadios();
        $tipoPartido = obtenerTipoPartido();
        $regiones = obtenerRegion();
        $posiciones = obtenerPosicion();

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

        <header class="header">
            <h1>La Logia Fútbol</h1>
        </header>

        <main class="main">

            <div class="ventana-convocatoria">
                <div class="pie-cabeza-ventana-convocatoria">
                    <h2 class="titulo-convocatoria">Próximo Partido</h2>
                </div>

                <!-- SECCIÓN ABRIR CONVOCATORIAS -->
                <form class="formulario-convocatoria" id="formulario-convocatoria">
                    <div class="campos-convocatoria">
                        
                        <label class="label" for="fecha">Fecha</label>
                        <input class="input" type="date" placeholder="Fecha" name="fecha" id="fecha" autocomplete="off" required>

                        <label class="label" for="hora">hora</label>
                        <input class="input" name="hora" type="time" value="22:00" ide="hora" autocomplete="off" required>

                        <label class="label" for="estadio">Estadio</label>
                        <select class="input" name="estadio" id="estadio" required>
                            <option disabled selected>-Seleccione un Estadio-</option>
                            <?php foreach($estadios as $estadio):?>
                                <option value="<?= $estadio['ID_ESTADIO']; ?>"> <?= $estadio['NOMBRE']; ?> </option>
                            <?php endforeach; ?>
                        </select>

                        <label class="label" for="tipoPartido">Tipo de Partido</label>
                        <select class="input" name="tipo-partido" id="tipoPartido">
                            <option disabled selected>-Tipo de Partido-</option>
                            <?php foreach($tipoPartido as $tipo): ?>
                                <option value="<?= $tipo['ID_TIPO_PARTIDO']; ?>"> <?= $tipo['DETALLE']; ?> </option>
                            <?php endforeach; ?>
                        </select>

                        <label for="asistencia">¿Confirmo asistencia?</label>
                        <input type="checkbox" name="asistencia-usuario" id="asistencia" autocomplete="off" value="SI">

                        <button type="reset" class="boton vaciar">Vaciar</button>
                        <button type="submit" class="boton">Confirmar</button>

                        <div class="popUp-convocatoria oculto ventana-convocatoria" id="popUp-convocatoria">
                            <p id="mensaje-popup-convocatoria"></p>
                            <button id="boton-cerrar-convocatoria" class="boton">Cerrar</button>
                        </div>

                    </div>
                </form>
                <div class="pie-cabeza-ventana-convocatoria">
                    <button class="boton">Abrir convocatoria ⚽</button>
                </div>
            </div> <!-- FIN Sección Abrir Convocatorias -->
            
            <!-- FORMULARIO DE ALTA DE JUGADORES -->
            <form class="formulario-alta-jugadores visible" action="alta-jugador.php" method="POST">
                <div class="campos-alta-jugador">

                    <label class="label" for="nombreJugador">Nombre</label>
                    <input class="input" type="text" placeholder="Nombre del jugador" name="nombreJugador" id="nombreJugador" autocomplete="off" required>

                    <label class="label" for="apellidoJugador">Apellido</label>
                    <input class="input" type="text" placeholder="Apellido del jugador" name="apellidoJugador" id="apellidoJugador" autocomplete="off" required>

                    <label class="label" for="regionOrigenJugador">Región de origen</label>
                    <select class="input" name="regionOrigenJugador" id="regionOrigenJugador" required>
                        <option disabled selected>-Seleccione una opción-</option>
                        <?php foreach($regiones as $region): ?>
                            <option value=" <?= $region['ID_REGION']; ?> "> <?= $region['DETALLE']; ?> </option>
                        <?php endforeach; ?>
                    </select>

                    <label class="label" for="posicionPrincipalJugador">Posición Principal</label>
                    <select class="input" name="posicionPrincipalJugador" id="posicionPrincipalJugador" required>
                        <option disabled selected>-Seleccione una opción-</option>
                        <?php foreach($posiciones as $posicion): ?>
                            <option value=" <?= $posicion['ID_POSICION']; ?>"> <?= $posicion['DETALLE']; ?> </option>
                        <?php endforeach; ?>
                    </select>

                    <label class="label" for="posicionAlternativaJugador">Posición alternativa</label>
                    <select class="input" name="posicionAlternativaJugador" id="posicionAlternativaJugador">
                        <option disabled selected>-Seleccione una opción-</option>
                        <?php foreach($posiciones as $posicion): ?>
                            <option value=" <?= $posicion['ID_POSICION']; ?>"> <?= $posicion['DETALLE']; ?> </option>
                        <?php endforeach; ?>
                    </select>

                    <button type="submit" class="boton">Registrar jugador</button>
                    
                </div>
            </form> <!-- FIN Sección Alta de Jugadores -->

            <!-- SECCIÓN CONVOCATORIA ACTIVA -->
            <div class="ventana-convocatoria-activa">
                <?php
                    $sqlPartidoActivo = "Select * from VISTA_PARTIDOS where ID_ESTADO_PARTIDO = 2 order by ID_PARTIDO DESC;";
                    $resultadoPartidoActivo = mysqli_query($conn, $sqlPartidoActivo);
                    $fila = mysqli_fetch_assoc($resultadoPartidoActivo);
                ?>

                <div class="pie-cabeza-ventana-convocatoria">
                    <h2 class="titulo-convocatoria">Próximo Partido</h2>
                </div>
                
                <form class="formulario-convocatoria-activa" id="formulario-asistencia">

                    <div class="campos-convocatoria">

                        <div class="info-proximo-partido visible">
                            
                            <p>Fecha y HORA: <?php echo $fila['FECHA'] . $fila['HORA']; ?></p>
                            <p>Estadio: <?php echo $fila['ESTADIO']; ?> </p>
                        </div>

                        <div class="popUp-convocatoria oculto ventana-convocatoria" id="popupAsistencia">
                            <p id="mensaje-popup-asistencia"></p>
                            <button id="boton-cerrar-asistencia" class="boton">Cerrar</button>
                        </div>

                    </div>

                    <?php
                        $sqlJugadoresConvocados = "Select * from VISTA_PARTIDOS_JUGADORES Where JUEGA = 'SI';";
                        $resultadoJugadoresConvocados = mysqli_query($conn, $sqlJugadoresConvocados);
                        $sqlJugadoresOut = "Select * from VISTA_PARTIDOS_JUGADORES Where JUEGA = 'NO';";
                        $resultadoJugadoresOut = mysqli_query($conn, $sqlJugadoresOut);
                        $cantidadJugadoresConvocados = mysqli_num_rows($resultadoJugadoresConvocados);
                    ?>
                    <h2>Confirmados (<?php echo $cantidadJugadoresConvocados . "/" . $fila['LIMITE DE JUGADORES']; ?>)</h2>
                    <div class="grilla-jugadores-convocados">
                        <?php while ($filaResultadoJugadoresConvocados = mysqli_fetch_assoc($resultadoJugadoresConvocados)):?>
                        <p><?php echo $filaResultadoJugadoresConvocados['NOMBRE'] . " " . $filaResultadoJugadoresConvocados['APELLIDO']; ?></p>
                    <?php endwhile; ?>                        
                    </div>
                    <h2>OUT</h2>
                    <div class="grilla-jugadores-convocados">
                        <?php while ($filaResultadoJugadoresOut = mysqli_fetch_assoc($resultadoJugadoresOut)):?>
                        <p><?php echo $filaResultadoJugadoresOut['NOMBRE'] . " " . $filaResultadoJugadoresOut['APELLIDO']; ?></p>
                    <?php endwhile; ?>

                    <div class="pie-cabeza-ventana-convocatoria">
                        <button type="submit" name="juega" value="SI" class="boton">Confirmo Asistencia</button>
                        <button type="submit" name="juega" value="SI" class="boton">Llevo un amigo</button>
                        <button type="submit" name="juega" value="NO" class="boton">No voy</button>
                    </div>                    

                </form>
            </div> <!-- FIN Sección Convocatoria Activa -->
            
        </main>
    </div> <!-- Fin de la Ventana-aplicación -->
    
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
    
    <footer class="footer">
        <p>© 2025 Holly Molly Studios • Desarrollado con 💾, ❤️ y mucho ☕</p>
    </footer> <!-- Fin del Footer -->

    <!-- Script: -->
    <script src="../js/script.js"></script>    
    
</body>
</html>