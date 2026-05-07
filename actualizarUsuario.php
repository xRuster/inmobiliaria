<?php

$conexion = mysqli_connect("localhost","root","","inmobiliaria");

if(!$conexion){
    die("No se puede conectar con el servidor" . mysqli_connect_error());
}

$mensaje ="";
$usuario_encontrado = false;
$id = "";

if (isset($_GET["id"])) {
    $id = trim(strip_tags($_GET["id"]));

    $sql = "SELECT * FROM usuario WHERE usuario_id = $id";
    $consulta = mysqli_query($conexion,$sql);
    $nfilas = mysqli_num_rows($consulta);

    if ($nfilas == 1) {
        $usuario_encontrado = true;
        $fila = mysqli_fetch_assoc($consulta);
        $nombre = $fila["nombre"];
        $correo = $fila["correo"];
        $tipo_usuario = $fila["tipo_usuario"];
        
    } else {
        $mensaje = "No se encontró el usuario con ID: $id";
    }
}

if (isset($_POST["actualizar"])) {
    $id = trim(strip_tags($_POST["id"]));
    $nombre = trim(strip_tags($_POST["nombre"]));
    $correo = trim(strip_tags($_POST["correo"]));
    $tipo_usuario = trim(strip_tags($_POST["tipo_usuario"]));

    if ($nombre != "" && $correo != "" && $tipo_usuario != "") {
        $sql = "UPDATE usuario
                SET nombre = '$nombre
                    correo = '$correo'
                    tipo_usuario = '$tipo_usuario'
                WHERE usuario_id = $id";
        $resultado = mysqli_query($conexion, $sql);

        if($resultado) {
            $mensaje ="<p>Usuario actualizado correctamente.</p>";
            $usuario_encontrado = false;
        } else {
            $mensaje = "<p> Error al actualizar: " . mysqli_error($conexion) . "</p>";
        }
    } else {
        $mensaje = "<p> Todos los campos son obligatorios.</p>";
    }
}
?>
<html>
<head>
    <title> Editar usuario </title>
</head>
<body>
    <h1> Editar usuario </h1>

    <?php echo $mensaje; ?>

    <?php if (!$usuario_encontrado $$ !isset($_POST["actualizar"])); ?>

        <form method="GET" action="">
            <label>ID del usuario a editar: </label>
            <input type="number" name="id" required>
            <input type="submit" value="Buscar">
        </form>
    
    <?php endif; ?>

    <?php if($usuario_encontrado): ?>
        <form method="POST" action="">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <label>Nombre:</label>
            <input type="text" name="nombre" value="<?php echo $nombre; ?>" required><br><br>
            
            <label>Correo:</label>
            <input type="text" name="correo" value="<?php echo $correo; ?>" required><br><br>

            <label>Tipo usuario:</label>
            <input type="text" name="tipo_usuario" value="<?php echo $tipo_usuario; ?>" required><br><br>

            <input type="submit" name="actualizar" value="Actualizar usuario">
            <input type="button" value="Cancelar" onclick="location.href='listar.php'">
        </form>
    <?php endif; ?>

    <br>
    <a href="listar.php"> Ver listado de usuarios</a><br>
    <a href="menu.html"> Volver al menu</a>
</body>
</html>
<?php mysqli_close($conexion); ?>

