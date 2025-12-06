<!-- SECCIÓN CERRAR PARTIDO -->
<div class="ventana-convocatoria">
    <div class="pie-cabeza-ventana-convocatoria">
        <h2 class="titulo-convocatoria">Cerrar Partido</h2>
    </div>

    <form class="campos-alta-usuario" action="actions/action-cerrar-partido.php" method="POST">
        <div class="grilla-goles">
            <div class="grilla-goles-marcador">
                <input class="input goles" name="golesLocal" id="golesLocal" type="number" min=0 max=99 required>
                <label for="golesLocal">Local</label>
            </div>
            <div class="grilla-goles-marcador">
                <input class="input goles" name="golesVisitante" id="golesVisitante" type="number" min=0 required>
                <label for="golesVisitante">Visitante</label>
            </div>
        </div>

        <label for="">Clima</label>
        <select class="input" name="idClima" id="idClima">
            <option value="" selected disabled>-Seleccione-</option>
            <?php foreach ($climas as $clima): ?>
            <option value="<?= $clima['ID_CLIMA'];?> "><?= $clima['DETALLE']; ?></option>
            <?php endforeach; ?>
        </select>
        <label for="">Estado del partido</label>
        <select class="input" name="idEstadoPartido" id="idEstadoPartido">
            <option value="" selected disabled>-Seleccione-</option>
            <?php foreach($estadosPartido as $estadoPartido): ?>
            <option value="<?= $estadoPartido['ID_ESTADO_PARTIDO']; ?>"><?= $estadoPartido['DETALLE'];?>
            </option>
            <?php endforeach; ?>
        </select>
        <label for="">Motivo de no jugarse</label>
        <select class="input" name="idMotivoNoJugado" id="idMotivoNoJugado">
            <option value="" selected disabled>-Seleccione-</option>
            <?php foreach($motiosNoJugado as $motivoNoJugado): ?>
            <option value="<?= $motivoNoJugado['ID_MOTIVO_NO_JUGADO'];?>"><?= $motivoNoJugado['DETALLE']; ?>
            </option>
            <?php endforeach; ?>
        </select>
        <label for="">Gol de Oro</label>
        <select class="input" name="idGolDeOro" id="idGolDeOro">
            <option value="" disabled selected>-No hubo-</option>
            <?php foreach($jugadoresGolDeOro as $jugadorGolDeOro): ?>
            <option value="<?= $jugadorGolDeOro['ID_JUGADOR'];?>">
                <?= $jugadorGolDeOro['NOMBRE'] . " " . $jugadorGolDeOro['APELLIDO']; ?></option>
            <?php endforeach; ?>
        </select>
        <label for="">Habilitar votación del MVP</label>
        <select class=" input" name="habilitarMVP" id="habilitarMVP">
            <option value="SI" selected>SI</option>
            <option value="NO">NO</option>
        </select>

        <button class="boton" type="button">Cancelar</button>
        <button class="boton" type="submit">Cerrar partido</button>

    </form>
</div>