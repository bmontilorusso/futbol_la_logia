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
            <form id="formulario-convocatoria" class="formulario-convocatoria" action="convocatoria.php" method="POST">
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
            
            
            
            <!-- SECCIÓN TARJETAS -->
            <section class="seccion-tarjetas-jugadores oculto">
                <div class="tarjetas">                    
                    <h2 class="valoracion">87</h2>
                    <h3 class="posicion">DEL</h3>
                    <img class="avatar-jugador-tarjeta" src="../img/avatar/monti.png" alt="imagen_jugador">
                    <h2 class="nombre-jugador">Bruno Monti</h2>
                    <h3 class="dato_1">MVP 88</h3>
                    <h3 class="dato_2">VOT 89</h3>
                    <h3 class="dato_3">ASIS 70</h3>
                    <h3 class="dato_4">VAR 75</h3>
                </div>
            </section> <!-- FIN Sección Tarjetas -->            

        </main>
    </div> <!-- Fin de la Ventana-aplicación -->
    
    <footer class="footer">
        <p>© 2025 Holly Molly Studios • Desarrollado con 💾, ❤️ y mucho ☕</p>
    </footer> <!-- Fin del Footer -->

    <!-- Script: -->
    <script src="js/script.js"></script>    
    
</body>
</html>