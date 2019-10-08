<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="recursos/styles/w3.css">
    <title>Pokedex</title>
</head>
<body class="w3-container w3-teal">
    <div class="w3-container w3-teal">
        <div class="w3-row">
            <div class="w3-col m9 l10">
                <h2>Listado de Pokemons</h2>
            </div>
            <?php
                session_start();
                if(isset($_SESSION["logueado"])){
                    echo "<div class='w3-col w3-margin-top m3 l2'>
                        <a class='w3-button w3-block w3-black' href='login_accion.php'>Cerrar Sesion</a>
                    </div>";
                } else {
                    echo "<div class='w3-col w3-margin-top m3 l2'>
                            <a class='w3-button w3-block w3-green' href='login.php'>Login</a>
                        </div>";
                }
            ?>

        </div>

        <form class="w3-container" action="index.php" method="post">
            <div class="w3-col" style="width:50%">
                <input class="w3-input" type="text" name="filtroNombre" id="filtroNombre" placeholder="Buscar por nombre" />
            </div>
            <div class="w3-rest">
                <button class="w3-btn w3-khaki" type="submit" name="filtro">Buscar</button>
            </div>
        </form>
        <Table class="w3-table w3-bordered">
            <thead>
                <tr>
                    <th class='w3-center'>Nro</th>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('pokemon.php');
                
                if(isset($_POST['filtro'])){
                    $lista = getPokemonsAsArray($_POST['filtroNombre']);
                } else {
                    $lista = getPokemonsAsArray();
                }
                
                if(empty($lista)){
                    echo "<tr>
                            <td class='w3-center' colspan='6' >NO SE ENCONTRARON POKEMONS</td>
                        </tr>";
                } else {
                    foreach( $lista as $pokemon ){
                        echo "<tr>
                        <td class='w3-center'>". $pokemon['nro'] . "</td>
                        <td><img src='recursos/upload/". $pokemon['img'] ."' alt='". $pokemon['nombre'] ."' height='150'></td>
                        <td>". $pokemon['nombre'] . "</td>
                        <td>". $pokemon['tipo'] . "</td>
                        <td>";
                        if(isset($_SESSION["logueado"])){
                            echo "<a class='w3-button w3-block w3-amber' style='width:50%'  href='modificar.php?modificar=". $pokemon['nro'] ."'>
                                Modificar
                            </a>
                            <a class='w3-button w3-block w3-red' style='width:50%' 
                            href='pokemon.php?nro=". $pokemon['nro'] ." '>
                            Eliminar
                            </a>
                            </td>
                            
                            </tr>";
                        }
                    }

                }

                ?>
            </tbody>
        </Table>
        <?php
        if(isset($_SESSION["logueado"])){
            echo "<a class='w3-btn w3-block w3-khaki' href='agregar.php'>
                Agregar
                </a>";
                }

            ?>
    </div>

</body>
</html>