<?php
    include('validacion_sesion.php');
    include('conexion_db.php');
    include('funciones-desplegables.php');    
        $estadios = obtenerEstadios();
        $tipoPartido = obtenerTipoPartido();
        $regiones = obtenerRegion();
        $posiciones = obtenerPosicion();
        $motivosBajaJugador = obtenerMotivoBajaJugadores();

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

                        <label class="label" for="asistencia">¿Confirmo asistencia?</label>
                        <select class="input" name="asistencia-usuario" id="asistencia" required autocomplete="">
                            <option disabled selected>-Seleccione una opción-</option>
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                        </select>

                        <button type="reset" class="boton vaciar">Vaciar</button>
                        <button type="submit" class="boton">Confirmar</button>

                    </div>
                </form>

                <div class="popUp-convocatoria oculto ventana-convocatoria" id="popUp-convocatoria">
                    <p id="mensaje-popup-convocatoria"></p>
                    <button type="button" id="boton-cerrar-convocatoria" class="boton">Cerrar</button>
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

            <!-- FORMULARIO DE ALTA DE USUARIOS -->
            <form action="">
                <div class="campos-alta-usuario">
                    <label class="label" for="nombreJugador">Nombre</label>
                    <input class="input" type="text" placeholder="Ingrese un nombre" name="nombreUsuario"autocomplete="off" required>
                    <label class="label" for="apellido">Apellido</label>
                    <input class="input" type="text" placeholder="Nombre el apellido" name="apellidoUsuario" autocomplete="off" required>
                    <label class="label" for="usuario">Username (Nombre de usuario)</label>
                    <input class="input" type="text" placeholder="Elija un nombre de usuario" name="usuario" autocomplete="off" required>
                    <label class="label" for="pass">Contraseña</label>
                    <input class="input" type="text" placeholder="Elija una contraseña" name="pass1" autocomplete="off" required>
                    <label class="label" for="pass">Confirme Contraseña</label>
                    <input class="input" type="text" placeholder="Confirme la contraseña" name="pass2" autocomplete="off" required>
                    <label class="label" for="pass">Vincular usuario a Jugador</label>
                    <select class="input" name="" id="">
                        <option disabled selected>-Seleccione un jugador-</option>
                        <option value="">No jugó nunca</option>
                        <option value="">Listado de jugadores SIN USUARIO</option>
                    </select>
                    <button type="submit" class="boton">Regisrar Usuario</button>

                </div>
            </form>

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
                
                <?php if ($fila): ?>
                    <form class="formulario-convocatoria-activa" id="formulario-asistencia">

                        <div class="campos-convocatoria">

                            <div class="info-proximo-partido visible">
                                
                                <p>Fecha y HORA: <?php echo $fila['FECHA'] . $fila['HORA']; ?></p>
                                <p>Estadio: <?php echo $fila['ESTADIO']; ?> </p>
                            </div>

                        </div>

                        <?php
                            $idPartidoActivo = $fila['ID_PARTIDO'];
                            $sqlJugadoresConvocados = "Select * from VISTA_PARTIDOS_JUGADORES Where ID_PARTIDO = $idPartidoActivo AND JUEGA = 'SI';";
                            $resultadoJugadoresConvocados = mysqli_query($conn, $sqlJugadoresConvocados);
                            $sqlJugadoresOut = "Select * from VISTA_PARTIDOS_JUGADORES Where ID_PARTIDO = $idPartidoActivo AND JUEGA = 'NO';";
                            $resultadoJugadoresOut = mysqli_query($conn, $sqlJugadoresOut);
                            $cantidadJugadoresConvocados = mysqli_num_rows($resultadoJugadoresConvocados);                        
                        ?>
                        <h2>Confirmados (<?php echo $cantidadJugadoresConvocados . "/" . $fila['LIMITE DE JUGADORES']; ?>)</h2>
                        <div class="grilla-jugadores-convocados">
                            <?php while ($filaResultadoJugadoresConvocados = mysqli_fetch_assoc($resultadoJugadoresConvocados)):?>
                                <div class="nombre-pos-grilla-convocados">
                                    <p><?php echo $filaResultadoJugadoresConvocados['NOMBRE'] . " " . $filaResultadoJugadoresConvocados['APELLIDO']; ?></p>
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
                                    <p class="posicion-grilla <?php echo $clasePOS ?>"><?php echo $filaResultadoJugadoresConvocados['POS_PRINCIPAL']; ?></p>
                                </div>
                            <?php endwhile; ?>
                        </div>
                        <h2>OUT</h2>
                        <div class="grilla-jugadores-out">
                            <?php while ($filaResultadoJugadoresOut = mysqli_fetch_assoc($resultadoJugadoresOut)):?>
                                <div class="nombre-pos-grilla-out">
                                    <p><?php echo $filaResultadoJugadoresOut['NOMBRE'] . " " . $filaResultadoJugadoresOut['APELLIDO']; ?></p>
                                    <?php
                                        $clasePOS = '';
                                        switch($filaResultadoJugadoresOut['POS_PRINCIPAL']) {
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
                                    <p class="posicion-grilla <?php echo $clasePOS ?>"><?php echo $filaResultadoJugadoresOut['POS_PRINCIPAL']; ?></p>
                                </div>
                            <?php endwhile; ?>
                        </div>

                        <div class="pie-cabeza-ventana-convocatoria">
                            <button id="confirmo-asistencia" type="submit" name="juega" value="SI" class="boton">Confirmo Asistencia</button>
                            <button id="no-voy" type="submit" name="juega" value="NO" class="boton">No voy</button>
                            <button id="llevo-un-amigo" class="boton" type="button">Llevo un amigo</button>                            
                            <button id="me-bajo" class="boton" type="button">Me bajo</button>
                        </div>

                    </form>
                <?php else: ?>
                    <p>No hay convocatoria activa aún.</p>
                    <div class="pie-cabeza-ventana-convocatoria">
                        <button class="boton">Abrir convocatoria ⚽</button>
                    </div>
                <?php endif; ?>

                <!-- Llevo un amigo: -->
                <div class="popUp-convocatoria ventana-convocatoria oculto" id="popup-amigo">
                    <form class="invitar-amigo" id="form-llevo-amigo">
                        <h2>Ingresar a un amigo</h2>
                        <label class="label" for="">Nombre o apodo del amigo (provisorio):</label>
                        <input class="input" name="nombreAmigo" type="text" placeholder="Nombre o apodo de tu amigo">
                        <label class="label" for="">Posición Principal</label>
                        <select class="input" name="posicionPrincipalAmigo" id="posicionPrincipalAmigo" required>
                                <option disabled selected>-Seleccione una opción-</option>
                            <?php foreach($posiciones as $posicion): ?>
                                <option value=" <?= $posicion['ID_POSICION']; ?>"> <?= $posicion['DETALLE']; ?> </option>
                            <?php endforeach; ?>
                        </select>

                        <button class="boton boton-invitar-amigo" name="juega" value="SI" type="submit">Registrar amigo</button>
                        <button class="boton cancelar-invitar-amigo" id="boton-Cancelar-Popup-Amigo" type="button">Cancelar</button>

                    </form>
                </div>

                <!-- Me Bajo -->
                <div class="popUp-convocatoria ventana-convocatoria oculto" id="popup-baja">
                    <form class="invitar-amigo" id="form-baja">
                        <h2>Conrirmá: ¿Te querés dar de baja?</h2>
                        <button class="boton boton-invitar-amigo" id="boton-confirmar-baja" type="button">Si, confirmo BAJA</button>
                        <select class="input" name="" id="" required>
                                <option disabled selected>-Seleccione una opción-</option>
                            <?php foreach($motivosBajaJugador as $motivoBajaJugador): ?>
                                <option value=" <?= $motivoBajaJugador['ID_MOTIVO_BAJA_JUGADOR']; ?>"> <?= $motivoBajaJugador['DETALLE']; ?> </option>
                                <?php endforeach; ?>
                        </select>
                        <button class="boton cancelar-invitar-amigo" id="boton-cancelar-baja" type="button">Cancelar</button>
                    </form>
                </div>

                <!-- Armar equipos: -->
                <div class="popUp-convocatoria ventana-convocatoria">
                    <h2>Armar equipos:</h2>
                    <button class="boton">Full Random</button>
                    <button class="boton">Random + POS</button>
                    <button class="boton">Random + POS + VAL</button>
                </div>
                
                <!-- PopUp final (notificación) -->
                <div class="popUp-convocatoria oculto ventana-convocatoria" id="popupAsistencia">
                    <p id="mensaje-popup-asistencia"></p>
                    <button type="button" id="boton-cerrar-asistencia" class="boton">Cerrar</button>
                </div>

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