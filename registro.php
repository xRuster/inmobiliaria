<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hogarea</title>
</head>
<header>
    <h1 class="title-header">hogarea</h1>
</header>

<body>
    <form action="crearUsuario.php" method="post">
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="nombre_usuario" placeholder="Nombre de usuario" required>
        <input type="password" name="contraseña" placeholder="Contraseña" required>
        <select name="rol">
            <option value="comprador"> Comprador</option>
            <option value="vendedor"> Vendedor</option>
        <button type="submit" name="enviar" value="Registrarme"></button> 
    </form>
</body>
</html>
