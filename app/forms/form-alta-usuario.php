<!-- FORMULARIO DE ALTA DE USUARIOS -->
<form action="">
    <div class="campos-alta-usuario">
        <label class="label" for="nombreJugador">Nombre</label>
        <input class="input" type="text" placeholder="Ingrese un nombre" name="nombreUsuario" autocomplete="off"
            required>
        <label class="label" for="apellido">Apellido</label>
        <input class="input" type="text" placeholder="Nombre el apellido" name="apellidoUsuario" autocomplete="off"
            required>
        <label class="label" for="usuario">Username (Nombre de usuario)</label>
        <input class="input" type="text" placeholder="Elija un nombre de usuario" name="usuario" autocomplete="off"
            required>
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
</form> <!-- FIN Sección Alta de Usuarios -->