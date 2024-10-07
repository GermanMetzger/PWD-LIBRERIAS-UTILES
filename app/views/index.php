<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CINEMA</title>
</head>
<body>
    <h1>CINEMA</h1>
    <h2>$8300 x ticket</h2>
    <form action="actionMail.php" method="POST">
        <label for="username">Nombre:</label>
        <input type="text" id="username" name="username"><br>
        <label for="mail">Mail:</label>
        <input type="text" id="mail" name="mail"><br>
        <label for="pelicula">pelicula:</label>
        <select  id="pelicula" name="pelicula">
            <option value="Volver al futuro">Volver al futuro</option>
            <option value="Harry potter">Harry potter</option>
            <option value="Los ilusionistas">Los ilusionistas</option>
        </select><br>
        <label for="cantidadTickets">Cantidad de tickets:</label>
        <input type="number" id="cantidadTickets" name="cantidadTickets" min="1" max="10" value="1"><br>
        <input type="submit" value="Comprar">
    </form>
    <?php if(isset($_GET['error'])) {
        echo "<p>".$_GET['error']."</p>";
    }?>
    
</body>
</html>