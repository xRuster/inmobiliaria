<?php
$conexion = mysqli_connect("127.0.0.1","root","","inmobiliaria");

if(!$conexion){
    die ("No se puede conectar con el servidor: " . mysqli_connect_error());
}

$sql = "SELECT * FROM usuario ORDER BY usuario_id DESC";
$result = mysqli_query($conexion,$sql);

$nfilas = mysqli_num_rows($consulta);
?>
<html>
<head>
    <title>Listado de usuarios</title>
</head>
<body>
    <h1>Listado de usuarios</h1>

    <?php if ($nfilas == 0): ?>
        <p>No hay usuarios en la base de datos.</p>
        <p><a href="crearUsuario.php">Añadir el primer coche</a></p>
    <?php else: ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Tipo de usuario:</th>
            </tr>
            <?php

            for ($i = 0; $i < $nfilas; $i++) {
                $fila = mysqli_fetch_assoc($consulta);
                echo "<tr>";
                echo "<td>" . $fila["usuario_id"] . "</td>";
                echo "<td>" . $fila["nombre"] . "</td>";
                echo "<td>" . $fila["correo"] . "</td>";
                echo "<td>" . $fila["tipo_usuario"] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    <?php endif; ?>

    <br>
    <a href="menu.html"> Volver al menú </a>
</body>
</html>
<?php
mysli_close($conexion);
?>