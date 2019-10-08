<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="recursos/styles/w3.css">
    <title>Login</title>
</head>
<body class="w3-container w3-teal">
    <form action="login_accion.php" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin" style="width: 50%;" method="post"> 
        <h2 class="w3-center">LOGIN - POKEDEX</h2>
        <?php

        if(isset($_GET["error"])){
            echo "<div class='w3-panel w3-pale-red w3-border'>
                    <p>Usuario o contrase&ntilde;a incorrectos.</p>
                </div>"; 
        }

        ?>
        <div class="w3-row w3-section">

            <div class="w3-rest">
                <input class="w3-input w3-border" name="usuario" type="text" placeholder="Usuario">
            </div>
        </div>

        <div class="w3-row w3-section">
            <div class="w3-rest">
                <input class="w3-input w3-border" name="password" type="password" placeholder="Contrase&ntilde;a">
            </div>
        </div>

        <button name="login" class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding">Ingresar</button>

    </form>

</body>
</html>