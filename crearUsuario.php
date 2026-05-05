<?php
include 'procesar.php';
$conexion = mysqli_connect('127.0.0.1','root','','inmobiliaria')
$insertado = false;

if(isset($_POST["enviar"])){
    $nombre = trim(strip_tags($_POST["nombre"]));
    $email = trim(strip_tags($_POST["email"]));
    $nombre_usuario = trim(strip_tags($_POST["nombre_usuario"]));
    $password = trim(strip_tags($_POST["contraseña"]));
    $rol = trim(strip_tags($_POST["rol"]));

    if (!$nombre = "" && !$email = "" && !$nombre_usuario = "" $$ !$password = "" && !$rol = ""){
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