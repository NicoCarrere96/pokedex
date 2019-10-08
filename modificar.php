<?php
include('validar.php');
include('pokemon.php');

if(isset($_GET['modificar'])){
    $conn = getConexion();
    
    $sql = "SELECT * FROM pokemon WHERE nro =". $_GET['modificar'];
    $result = mysqli_query($conn, $sql);
    $pokemon = mysqli_fetch_assoc($result);
    
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="recursos/styles/w3.css">
    <title>Modificar</title>
</head>
<body class="w3-container w3-teal">
<form  class="w3-container" action="pokemon.php" method="post">
<h2 class="w3-text-yellow">MODIFICAR</h2>
        <label for="nro">NUMERO: </label>
        <input class="w3-input" type="number" name="nro" id="nro" value="<?= $pokemon['nro'] ?>" readonly>
        
        <label for="nombre">NOMBRE: </label>
        <input class="w3-input" type="text" name="nombre" id="nombre" value="<?=  $pokemon['nombre'] ?>">
        
        <label for="tipo">TIPO: </label>
        <select class="w3-select" name="tipo" id="tipo" >
            <?php

             $tipos = getTipos();

              foreach( $tipos as $tipo ){
                  if($pokemon['tipo'] == $tipo['id']){
                    echo "<option value=". $tipo['id']. " selected>". $tipo['descripcion'] . "</option>";
                  } else {
                    echo "<option value=". $tipo['id']. ">". $tipo['descripcion'] . "</option>";
                  }
             } 
            ?>
        </select>
        <br><br>    
        <input class="w3-btn w3-yellow" type="submit" value="Actualizar" name="actualizar" id="actualizar">
    </form>
</body>
</html>