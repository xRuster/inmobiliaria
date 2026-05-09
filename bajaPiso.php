<?php

$conexion = mysqli_connect("127.0.0.1","root","","inmobiliaria");

if(!$conexion){
    die("No se puede conectar con el servidor: " . mysqli_connect_error());
}

$mensaje = "";
$mostrar_busqueda = true;

if(isset($_GET["id"]) && !isset($_POST["confirmar"])){
    $id = trim(strip_tags($_GET["id"]));

    $sql ="SELECT * FROM coches WHERE id= $id";
    $consulta = mysqli_query($conexion,$sql);
    $nfilas = mysqli_num_rows($consulta);

    if ($nfilas == 1) {
        $fila = mysqli_fetch_assoc($consulta);
        $mostrar_busqueda = false;
        ?>
        <html>
        <head>
            <title>Eliminar piso</title>
        </head>
        <body>
            <h1>Eliminar piso</h1>
        <p>¿Estás seguro de que quires eliminar el siguiente coche?</p>
        <p><strong>ID:</strong> <?php echo $fila["id"]; ?></p>
        <p><strong>Calle:</strong> <?php echo $fila["calle"]; ?></p>
        <p><strong>Numero:</strong> <?php echo $fila["numero"]; ?></p>
        <p><strong>Piso:</strong> <?php echo $fila["piso"]; ?></p>
        <p><strong>Puerta:</strong> <?php echo $fila["puerta"]; ?></p>
        <p><strong>CP:</strong> <?php echo $fila["cp"]; ?></p>
        <p><strong>Metros:</strong> <?php echo $fila["metros"]; ?></p>
        <p><strong>Zona:</strong> <?php echo $fila["zona"]; ?></p>
        <p><strong>Precio:</strong> <?php echo $fila["precio"]; ?> €</p>
        <p><strong>Imagen:</strong> <?php echo $fila["imagen"]; ?></p>

        <form method="POST" action="">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" name="confirmar" value="Si,eliminar">
            <input type="button" value="Cancelar" onclick="location.href='listar.php'">
        </form>
        <br><a href="listar.php">Volver al listado</a>
        </body>
        </html>
        <?php
        mysqli_close($conexion);
        exit;

        
    } else {
        $mensaje = "<p>No se encontró el coche con ID: $id</p>";
    }
}

if (isset($_POST["confirmar"])) {
    $id = trim(strip_tags($_POST["id"]));

    $sql = "DELETE FROM pisos WHERE id = $id";
    $resultado = mysqli_query($conexion,$sql);

    if ($resultado) {
        $mensaje = "<p>Piso eliminado correctamente.</p>";
        $mostrar_busqueda = false;
    } else {
        $mensaje = "<p>Error al eliminar: " . mysqli_error($conexion) . "</p";
    }
}
?>
<html>
<head>
    <title>Eliminar piso</title>
</head>
<body>
    <h1>Eliminar piso</h1>
    <?php echo $mensaje; ?>

    <?php if($mostrar_busqueda): ?>
        <form method = "GET" action="">
            <label>ID del piso a eliminar:</label>
            <input type="number" name="id" required>
            <input type="submit" value="Buscar y eliminar">
        </form>
    <?php endif; ?>

    <br>
    <a href="listar.php">Ver listado de pisos</a><br>
    <a href="menu.hmtl">Volver al menú</a>
</body>
</html>
<?php mysqli_close($conexion); ?>



