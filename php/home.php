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

                <div class="info-proximo-partido oculto">
                    <p>Fecha y HORA</p>
                    <p>Estadio</p>
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
            </form>

            <!-- SECCIÓN TARJETAS -->
            <section class="seccion-tarjetas-jugadores oculto">
                <?php
                    $sqlTarjetasJugador = "Select * from VISTA_TARJETAS_JUGADORES;";
                    $resultadoJugadores = mysqli_query($conn, $sqlTarjetasJugador);                    
                ?>
                <?php while ($fila = mysqli_fetch_assoc($resultadoJugadores)): ?>
                    <div class="tarjetas">                    
                        <h2 class="valoracion"> <?php echo $fila['VALORACION_GENERAL'] ?> </h2>
                        <h3 class="posicion"> <?php echo $fila['POSICION'] ?> </h3>
                            <?php $avatar = "../img/avatar/" . $fila['ID_JUGADOR'] . ".png";
                                if (!file_exists($avatar)) {
                                    $avatar = "../img/avatar/default.png";
                                }
                            ?>
                        <img class="avatar-jugador-tarjeta" src="<?php echo $avatar ?>" alt="imagen_jugador">
                        <h2 class="nombre-jugador"> <?php echo $fila['NOMBRE'] . " " . $fila['APELLIDO'] ?> </h2>
                        <h3 class="dato_1"> <?php echo "MVP" . " " . $fila['MVP'] ?> </h3>
                        <h3 class="dato_2"> <?php echo "VOT" . " " . $fila['VOT'] ?> </h3>
                        <h3 class="dato_3"> <?php echo "ASIS" . " " . $fila['ASIS'] ?> </h3>
                        <h3 class="dato_4">VAR 75</h3>
                    </div>
                <?php endwhile; ?>

            </section> <!-- FIN Sección Tarjetas -->

        </main>
    </div> <!-- Fin de la Ventana-aplicación -->
    
    <!-- BOTONERA GOME-->
    <div class="botonera-home">
        <div class="boton botones-home">
            <img src="../img/ico/jugadores.png" alt="Jugadores">
            <h2>Jugadores</h2>
        </div>
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