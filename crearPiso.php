<?php
$conexion = mysqli_connect("localhost","root","","inmobiliaria");

if(!$conexion){
    die("No es posible la conexión" . mysqli_connect_error());
}

$insertado = false;

if(isset($_POST["enviar"])){
    $calle = trim(strip_tags($_POST["calle"]));
    $numero = trim(strip_tags($_POST["numero"]));
    $piso = trim(strip_tags($_POST["piso"]));
    $puerta = trim(strip_tags($_POST["puerta"]));
    $cp = trim(strip_tags($_POST["cp"]));
    $metros = trim(strip_tags($_POST["metros"]));
    $zona = trim(strip_tags($_POST["zona"]));
    $precio = trim(strip_tags($_POST["precio"]));
    $imagen = trim(strip_tags($_FILES["imagen"]["name"]));
    
    $inputs = [$calle,$numero,$piso,$puerta,$cp,$metros,$zona,$precio,$imagen];
    $vacio = false;
    foreach ($inputs as $input){
        if ($input == ""){
            $vacio=true;
        }
    }
    if(!$vacio){

    
            $sql = "INSERT INTO pisos (calle,numero,piso,puerta,cp,metros,zona,precio,imagen) 
            VALUES ('$calle','$numero','$piso','$puerta','$cp','$metros','$zona','$precio','$imagen')";

            $result = mysqli_query($conexion,$sql);

            if($result){
                $insertado=true; 
                echo "<p>Insertado correctamente.</p>";
            } else {
                echo "<p>Error al insertar: " . mysqli_error($conexion) . "</p>";
            }
        } else {
            echo "<p>Todos los campos son obligatorios.</p>";
        }
}







?>


<html>
<head>
    <title>Crear nuevo piso</title>
</head>
<body>
    <h1>Añadir nuevo piso</h1>

    <?php if ($insertado): ?>
        <p>Piso insertado correctamente.</p>
        <p><a href="listarPisos.php">Ver listado de pisos</a></p>
        <p><a href="crearPisos.php">Añadir otro piso</a></p>
    <?php else: ?>
        <form action="" method="POST" enctype="multipart/form-data">

            <label>Calle:</label>
            <input type="text" name="calle" required>
            <br><br>

            <label>Número:</label>
            <input type="number" name="numero" required>
            <br><br>

            <label>Piso:</label>
            <input type="number" name="piso" required>
            <br><br>

            <label>Puerta:</label>
            <input type="text" name="puerta" required>
            <br><br>

            <label>Código Postal:</label>
            <input type="number" name="cp" required>
            <br><br>

            <label>Metros:</label>
            <input type="number" name="metros" required>
            <br><br>

            <label>Zona:</label>
            <input type="text" name="zona" required>
            <br><br>

            <label>Precio (€):</label>
            <input type="number" name="precio" required>
            <br><br>

            <label>Imagen:</label>
            <input type="file" name="imagen" required>
            <br><br>

            <input type="submit" name="enviar" value="Guardar inmueble">

            <input type="button" value="Cancelar" onclick="location.href='menu.html'">
        </form>
    <?php endif; ?>

    <br>
    <a href="menu.html"> Volver al menú</a>
</body>
</html>
<?php mysqli_close($conexion); ?>





    
        



