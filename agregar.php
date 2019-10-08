<?php
include('validar.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="recursos/styles/w3.css">
    <title>Agregar Pokemon</title>
</head>
<body class="w3-container w3-teal">
    <form class="w3-container" action="pokemon.php" method="post" enctype="multipart/form-data">
    <h2 class="w3-text-white">AGREGAR</h2>
        <label for="nro">NUMERO: </label>
        <input class="w3-input" type="number" name="nro" id="nro">
        <br>  
        <label for="nombre">NOMBRE: </label>
        <input class="w3-input" type="text" name="nombre" id="nombre">
        <br>    
        <label for="tipo">TIPO: </label>
        <select class="w3-select" name="tipo" id="tipo" >
            <?php
            include('pokemon.php');

            $tipos = getTipos();

            foreach( $tipos as $tipo ){
                echo "<option value=". $tipo['id']. ">". $tipo['descripcion'] . "</option>";
            }
            ?>
        </select>
        
        <label for="imagen">IMAGEN: </label>
        <input class="w3-file w3-margin-top" type="file" name="imagen" id="imagen">
        <br> <br>   
        <input class="w3-btn w3-blue" type="submit" value="Agregar" name="boton" id="boton">
    </form>
</body>
</html>