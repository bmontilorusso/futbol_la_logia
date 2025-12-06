<?php
    include('inc/validacion_sesion.php');
    include('inc/conexion_db.php');
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
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&family=Rubik:ital,wght@0,300..900;1,300..900&family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
</head>

<body>

    <!-- SECCIÓN TARJETAS -->
    <section class="seccion-tarjetas-jugadores visible-grid">
        <?php
                $sqlTarjetasJugador = "Select * from VISTA_TARJETAS_JUGADORES;";
                $resultadoJugadores = mysqli_query($conn, $sqlTarjetasJugador);                    
            ?>
        <div class="tarjetas">
            <h2 class="valoracion">93</h2>
            <h3 class="posicion">DEF</h3>
            <img class="gato-avatar" src="../img/avatar/gato.png" alt="imagen_jugador">
            <h2 class="gato-nombre">GATO E.</h2>
            <h3 class="dato_1">MVP 95</h3>
            <h3 class="dato_2">VOT 88</h3>
            <h3 class="dato_3">ASIS 85</h3>
            <h3 class="dato_4">VAR 89</h3>
        </div>
        <div class="tarjetas">
            <h2 class="valoracion">89</h2>
            <h3 class="posicion">DEL</h3>
            <img class="gato-avatar" src="../img/avatar/kaiser.png" alt="imagen_jugador">
            <h2 class="gato-nombre">KAISER</h2>
            <h3 class="dato_1">MVP 89</h3>
            <h3 class="dato_2">VOT 90</h3>
            <h3 class="dato_3">ASIS 87</h3>
            <h3 class="dato_4">VAR 88</h3>
        </div>
        <div class="tarjetas">
            <h2 class="valoracion">87</h2>
            <h3 class="posicion">DEL</h3>
            <img class="gato-avatar" src="../img/avatar/monti.png" alt="imagen_jugador">
            <h2 class="gato-nombre">B. MONTI</h2>
            <h3 class="dato_1">MVP 91</h3>
            <h3 class="dato_2">VOT 89</h3>
            <h3 class="dato_3">ASIS 82</h3>
            <h3 class="dato_4">VAR 88</h3>
        </div>
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

</body>

</html>