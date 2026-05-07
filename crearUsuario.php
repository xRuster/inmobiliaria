<?php

$conexion = mysqli_connect('127.0.0.1','root','','inmobiliaria')
$insertado = false;

if(isset($_POST["enviar"])){
    $nombre = trim(strip_tags($_POST["nombre"]));
    $email = trim(strip_tags($_POST["email"]));
    $password = trim(strip_tags($_POST["contraseña"]));
    $rol = trim(strip_tags($_POST["rol"]));

    if (!$nombre = "" && !$email = "" && !$password = "" && !$rol = ""){
        $sql = "INSERT INTO usuario (nombre,correo,clave,tipo_usuario) VALUES
        ('$nombre','$correo','$password','$rol')";

        $resultado = mysqli_query($conexion,$sql);
        if($resultado){
            $insertado = true;
        }else{
            echo "<p>Error al insertar: " . mysqli_error($conexion) . "</p>";
        }
    } else {
        echo "<p>Todos los campos son obligatorios.</p>"
    }
} 

?>

<html>
<head>
    <title>Crear nuevo usuario</title>
</head>
<body>
    <h1>Añadir nuevo usuario</h1>
    
    <?php if ($insertado): ?>
        <p> Usuario insertado correctamente.</p>
        <p><a href="listarUsuario.php">Ver listado de usuarios</a></p>
        <p><a href="crearUsuario.php">Añadir otro usuario</a></p>
    <?php else: ?>
        <form method="POST" action="">
            <label>Nombre:</label>
            <input type="text" name="nombre" required><br><br>
            
            <label>Email:</label>
            <input type="text" name="email" required><br><br>
            
            <label>Contraseña:</label>
            <input type="text" name="password" required><br><br>
            
            <label>Tipo Usuario:</label>
            <select name="rol" required>
                <option value="comprador">Comprador</option>
                <option value="vendedor">Vendedor</option>
            </select>
            <br><br>
            
            
            <input type="submit" name="enviar" value="Guardar usuario">
            <input type="button" value="Cancelar" onclick="location.href='menu.html'">
        </form>
    <?php endif; ?>
    
    <br>
    <a href="menu.html">← Volver al menú</a>
</body>
</html>
<?php mysqli_close($conexion); ?>
