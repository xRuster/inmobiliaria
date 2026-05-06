<?php

$conexion = mysqli_connect("127.0.0.1", "root", "", "inmobiliaria");

if (!$conexion) {
    die ("No se puede conectar con el servidor: " . mysqli_connect_error());
}

$mensaje = "";
$mostrar_busqueda = true;

if (isset($GET["id"]) && isset($POST["confirmar"])){
    $id = trim(strip_tags($_GET["id"]));

    $sql = "SELECT * FROM usuario WHERE id = '$id'"
    $consulta = mysqli_query($conexion,$sql);
    $nfilas = mysqli_num_rows($consulta);

    if ($nfilas == 1) {
        $fila = mysqli_fetch_assoc($consulta);
        $mostrar_busqueda = false;
        ?>
        <html>
        <head>
            <title>Eliminar usuario</title>
        </head>
        <body>
            <h1>Eliminar usuario</h1>
            <p>¿Estás seguro de que quieres eliminar el siguiente usuario?</p>
            <p><strong>ID:<strong><?php echo $fila["id"]; ?></p>
            <p><strong>Nombre:<strong><?php echo $fila["nombre"]; ?></p>
            <p><strong>Correo:<strong><?php echo $fila["correo"]; ?></p>
            <p><strong>Tipo de Usuario:<strong><?php echo $fila["tipo_usuario"]; ?></p>
            
            <form method="POST" action="">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" name="confirmar" value="Si, eliminar">
                <input type="button" value="Cancelar" onclick="location.href='listar.php'">
            </form>
            <br><a href="listar.php"> Volver al listado</a>
        </body>
        </html>
        <?php
        mysqli_close($conexion);
        exit;
    
    }else {
        $mensaje = "No se encontró el usuario con ID: $id</p>";
    }      
}

if (isset($_POST["confirmar"])) {
    $id = trim(strip_tags($_POST["id"]));

    $sql = "DELETE FROM usuario WHERE id = $id";
    $resultado = mysqli_query($conexion,$sql);

    if ($resultado) {
        $mensaje = "<p>Usuario eliminado correctamente.</p>";
        $mostrar_busqueda = false;
    } else {
        $mensaje = "<p>Error al eliminar: " . mysqli_error($conexion) . "</p>";
    }
}
?>
<html>
<head>
    <title>Eliminar usuario</title>
</head>
<body>
    <h1>Eliminar usuario</h1>

    <?php echo $mensaje; ?>

    <?php if($mostrar_busqueda): ?>
        <form method="GET" action="">
            <label>ID del usuario a eliminar:</label>
            <input type="number" name="id" required>
            <input type="submit" value="Buscar y eliminar">
        </form>
    <?php endif; ?>

    <br>
    <a href ="menu.html">Volver al menu</a>
</body>
</html>
<?php mysqli_close($conexion); ?>