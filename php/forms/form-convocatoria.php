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