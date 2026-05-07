<?php
$conexion = mysqli_connect("localhost","root","","inmobiliaria");

if(!$conexion){
    die("No es posible la conexión" . mysqli_connect_error());
}

$creado = false;

if(isset($_POST[""]))





?>


<html>
<head>
    <title>Crear piso</title>
<head>
    <h1>Crear piso</h1>
<body>
    <form action="" method="POST" ENCTYPE="multipart/form-data">
        <input type="text" name="calle" placeholder="Calle" required>
        <input type="number" name="numero" placeholder="Número" required>
        <input type="number" name="piso" placeholder="Piso" required>
        <input type="text" name="puerta" placeholder="Puerta" required>
        <input type="number" name="cp" placeholder="C.P" required>
        <input type="number" name="metros" placeholder="Metros" required>
        <input type="text" name="zona" placeholder="Zona" required>
        <input type="number" name="precio" placeholder="Precio" required>
        <input type="file" name="imagen" placeholder="Imagen" required>
        <input type="text" name="puerta" placeholder="Puerta" required>
        <input type="submit" name="crear" value="Crear piso">
    </form>
<body>
<html>


