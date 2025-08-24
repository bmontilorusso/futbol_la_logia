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
    <link rel="icon" type="img/png" href="img/ico/favicon-32x32.png">
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

            <button class="boton">Abrir convocatoria ⚽</button>
            
            <!-- SECCIÓN ABRIR CONVOCATORIAS -->
            <form id="formulario-convocatoria" class="formulario-convocatoria oculto" action="convocatoria.php" method="POST">
                <div class="campos-convocatoria">
                    <label class="label" for="">Fecha</label>
                    <input class="input" type="date" placeholder="Fecha" name="fecha" value="2025-07-31" autocomplete="off" required>

                    <label class="label" for="">hora</label>
                    <input class="input" name="time" type="time" value="22:00" autocomplete="off" required>

                    <label class="label" for="">Estadio</label>
                    <select class="input" name="estadio" id="estadio" required>
                        <option value="" disabled selected>-Seleccione un Estadio-</option>
                        <?php
                            // Conexión a la DB, al comienzo.
                            $sqlEstadios = "Select * from ESTADIOS ORDER BY NOMBRE ASC;";
                            $resultadoEstadios = mysqli_query($conn, $sqlEstadios);
                        ?>
                        <?php while($fila = mysqli_fetch_assoc($resultadoEstadios)): ?>
                            <option value="<?php echo $fila['ID_ESTADIO'] ?>">
                                <?php echo $fila['NOMBRE']; ?>
                            </option>
                        <?php endwhile; ?>
                    </select>

                    <label class="label" for="">Tipo de Partido</label>
                    <select class="input" name="tipo-partido" id="">
                    <option value="" disabled selected>-Tipo de Partido-</option>
                    <?php
                        $sqlTipopartido = "Select * from TIPO_PARTIDO;";
                        $resultadoTipopartido = mysqli_query($conn, $sqlTipopartido);
                    ?>
                    <?php while($fila = mysqli_fetch_assoc($resultadoTipopartido)): ?>
                        <option value="<?php echo $fila['ID_TIPO_PARTIDO'] ?>">
                            <?php echo $fila['DETALLE']; ?>
                        </option>
                    <?php endwhile ?>
                    </select>

                    <label for="">¿Confirmo asistencia?</label>
                    <input type="checkbox" name="asistencia-usuario" id="" autocomplete="off" value="SI">

                    <button class="boton">Confirmar</button>

                </div>
            </form> <!-- FIN Sección Abrir Convocatorias -->
            
            <form class="formulario-alta-jugadores" action="alta-jugador.php" method="POST">
                <div class="campos-alta-jugador">
                    <label class="label" for="">Nombre</label>
                    <input class="input" type="text" placeholder="Nombre del jugador" name="nombreJugador" autocomplete="off" required>
                    <label class="label" for="">Apellido</label>
                    <input class="input" type="text" placeholder="Apellido del jugador" name="apellidoJugador" autocomplete="off" required>
                    <label class="label" for="">Región de origen</label>
                    <input class="input" type="text" placeholder="Origen del Jugador" name="regionOrigenJugador" autocomplete="off" required>
                    <label class="label" for="">Posición Principal</label>
                    <input class="input" type="text" placeholder="Posición natural" name="posicionPrincipalJugador" autocomplete="off" required>
                    <label class="label" for="">Posición alternativa</label>
                    <input class="input" type="text" placeholder="Posición alternativa" name="posicionAlternativaJugador" autocomplete="off" required>
                    <button class="boton">Registrar jugador</button>
                </div>
            </form>

            <!-- SECCIÓN TARJETAS -->
            <section class="seccion-tarjetas-jugadores">
                <?php
                    $sqlTarjetasJugador = "Select * from JUGADORES;";
                    $resultadoJugadores = mysqli_query($conn, $sqlTarjetasJugador);                    
                ?>
                <?php while ($fila = mysqli_fetch_assoc($resultadoJugadores)): ?>
                    <div class="tarjetas">                    
                        <h2 class="valoracion">87</h2>
                        <h3 class="posicion">DEL</h3>
                        <?php $avatar = "../img/avatar/" . $fila['ID_JUGADOR'] . ".png";
                            if (!file_exists($avatar)) {
                                $avatar = "../img/avatar/default.png";
                            }
                        ?>
                        <img class="avatar-jugador-tarjeta" src="<?php echo $avatar ?>" alt="imagen_jugador">
                        <h2 class="nombre-jugador"> <?php echo $fila['NOMBRE'] . " " . $fila['APELLIDO'] ?> </h2>
                        <h3 class="dato_1">MVP 88</h3>
                        <h3 class="dato_2">VOT 89</h3>
                        <h3 class="dato_3">ASIS 70</h3>
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
    <script src="js/script.js"></script>    
    
</body>
</html>