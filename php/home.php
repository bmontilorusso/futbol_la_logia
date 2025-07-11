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

    <div class="ventana-aplicacion">

        <header class="header">
            <h1>La Logia Fútbol</h1>
        </header>

        <main class="main">

            <button class="boton">Abrir convocatoria ⚽</button>

            <form class="formulario-convocatoria" action="php/convocatoria.php" method="POST">
                <div class="campos">
                    <label class="label" for="">Fecha</label>
                    <input class="input" type="date" placeholder="Fecha" autocomplete="off" required>

                    <label class="label" for="">hora</label>
                    <input class="input" type="time" placeholder="Hora" autocomplete="off" required>

                    <label class="label" for="">Estadio</label>
                    <select class="input" name="estadio" id="" required>
                        <option value="" disabled selected>-Seleccione un Estadio-</option>
                        <?php
                            // Conexión a la DB, al comienzo.
                            $sqlEstadios = "Select * from ESTADIOS;";
                            $resultadoEstadios = mysqli_query($conn, $sqlEstadios);
                        ?>
                        <?php while($fila = mysqli_fetch_assoc($resultadoEstadios)): ?>
                            <option value="<?php echo $fila['ID_ESTADIO'] ?>">
                                <?php echo $fila['NOMBRE']; ?>
                            </option>
                        <?php endwhile; ?>
                    </select>

                    <label for="">¿Confirmo asistencia?</label>
                    <input type="checkbox" name="" id="">


                </div>
            </form>           

        </main>
    </div> <!-- Fin de la Ventana-aplicación -->
    
    <footer class="footer">
        <p>© 2025 Holly Molly Studios • Desarrollado con 💾, ❤️ y mucho ☕</p>
    </footer>

    <!-- Script: -->
    <script src="js/script.js"></script>    
    
</body>
</html>