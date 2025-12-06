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
        <h2>Confirmados (<?php echo $cantidadJugadoresConvocados . "/" . $fila['LIMITE DE JUGADORES']; ?>)
        </h2>

        <div class="grilla-jugadores-convocados">
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
        <h2>OUT</h2>
        <div class="grilla-jugadores-out">
            <?php while ($filaResultadoJugadoresOut = mysqli_fetch_assoc($resultadoJugadoresOut)):?>
            <div class="nombre-pos-grilla-out">
                <p><?php echo $filaResultadoJugadoresOut['NOMBRE'] . " " . $filaResultadoJugadoresOut['APELLIDO']; ?>
                </p>
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
                <p class="posicion-grilla <?php echo $clasePOS ?>">
                    <?php echo $filaResultadoJugadoresOut['POS_PRINCIPAL']; ?></p>
            </div>
            <?php endwhile; ?>
        </div>

        <button type="button" onclick="window.location.href='sorteo-equipos.php'" class="boton">Armar
            equipos</button>
        <button type="button" class="boton">Cerrar Partido</button>

        <div class="pie-cabeza-ventana-convocatoria">
            <button id="confirmo-asistencia" type="submit" name="juega" value="SI" class="boton">Confirmo
                Asistencia</button>
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

            <button class="boton boton-invitar-amigo" name="juega" value="SI" type="submit">Registrar
                amigo</button>
            <button class="boton cancelar-invitar-amigo" id="boton-Cancelar-Popup-Amigo" type="button">Cancelar</button>

        </form>
    </div>

    <!-- Me Bajo -->
    <div class="popUp-convocatoria ventana-convocatoria oculto" id="popup-baja">
        <form class="invitar-amigo" id="form-baja">
            <h2>Conrirmá: ¿Te querés dar de baja?</h2>
            <button class="boton boton-invitar-amigo" id="boton-confirmar-baja" type="button">Si, confirmo
                BAJA</button>
            <select class="input" name="" id="" required>
                <option disabled selected>-Seleccione una opción-</option>
                <?php foreach($motivosBajaJugador as $motivoBajaJugador): ?>
                <option value=" <?= $motivoBajaJugador['ID_MOTIVO_BAJA_JUGADOR']; ?>">
                    <?= $motivoBajaJugador['DETALLE']; ?> </option>
                <?php endforeach; ?>
            </select>
            <button class="boton cancelar-invitar-amigo" id="boton-cancelar-baja" type="button">Cancelar</button>
        </form>
    </div>

    <!-- PopUp final (notificación) -->
    <div class="popUp-convocatoria oculto ventana-convocatoria" id="popupAsistencia">
        <p id="mensaje-popup-asistencia"></p>
        <button type="button" id="boton-cerrar-asistencia" class="boton">Cerrar</button>
    </div>

</div> <!-- FIN Sección Convocatoria Activa -->