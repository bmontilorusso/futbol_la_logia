<!-- FORMULARIO DE ALTA DE JUGADORES -->
<form class="formulario-alta-jugadores visible" action="alta-jugador.php" method="POST">
    <div class="campos-alta-jugador">

        <label class="label" for="nombreJugador">Nombre</label>
        <input class="input" type="text" placeholder="Nombre del jugador" name="nombreJugador" id="nombreJugador"
            autocomplete="off" required>

        <label class="label" for="apellidoJugador">Apellido</label>
        <input class="input" type="text" placeholder="Apellido del jugador" name="apellidoJugador" id="apellidoJugador"
            autocomplete="off" required>

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